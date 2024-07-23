import React, {useCallback, Component} from 'react';
import { useDispatch, useSelector } from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider,
    Grid,
    Card,
    CardContent,
    CardMedia,
    CardActionArea,
    CardActions,
    Stack
} from '@mui/material';

import {createUseStyles} from 'react-jss';
import {AuthenticatedLayout} from "../../shared/components/layouts/AuthenticatedLayout";
import {authDataManager, userDataManager,providerDataManager} from "../../core/api/data-managers";
import { authActions, getUserSelector } from '../../store/auth';
import {filterUrlString} from "../../shared/helper";
import Swal from 'sweetalert2';
import withReactContent from 'sweetalert2-react-content';
import { useForm, Controller } from 'react-hook-form';
import Stepper from '@mui/material/Stepper';
import Step from '@mui/material/Step';
import StepLabel from '@mui/material/StepLabel';
import StepContent from '@mui/material/StepContent';
import {LogDataGrid} from "../../shared/components/LogDataGrid";
import Breadcrumbs from '@mui/material/Breadcrumbs';
import {sessionCookieAccess} from "../../core/security";
import DatePicker from 'react-datepicker';
import "react-datepicker/dist/react-datepicker.css";
import LoadingButton from '@mui/lab/LoadingButton';

const VISIBLE_FIELDS = [ 'first_name', 'last_name', 'email', 'user_status_id' ];

const useStyles = createUseStyles((theme) => ({
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    '&.MuiOutlinedInput-input': {
        padding: '15px !important',
    },
    title: {
        textAlign: 'center',
    },
    loginBtn: {
        marginLeft: '10px',
        height: '100%'
    },
    inputFields:{
        padding: 12,
        marginLeft: '10px',

    },
    texInput: {
        margin: '0px 0 0 0',
        width: '100%'
    },
    error:{
        fontSize: '12px',
        color: 'red',
        padding: ' 10px 0 10px 0'
    }
}));

/**
 * ADMININSTRATOR COMPONENT
 * @param props
 * @returns {*}
 * @constructor
 */
export function Providers( props ) {

    const classes = useStyles();
    const dispatch = useDispatch();
    const userSelector = useSelector( getUserSelector );

    const [sortModel, setSortModel] = React.useState([
        { field: 'first_name', sort: 'asc' },
    ]);

    const [rows, setRows] = React.useState();
    const [rowsImport, setRowsImport] = React.useState();
    const [stepsPPO, setStepsPPO] = React.useState([]);
    const [stepsMFL, setStepsMFL] = React.useState([]);
    const [inActiveCount, setInActiveCount] = React.useState();
    const [loading, setLoading] = React.useState(false);
    const [userLoad, setUserLoad] = React.useState(false);
    const [checkRowEdit, setCheckRowEdit] = React.useState(false);
    const [userModify, setUserModify] = React.useState(false);
    const [userRoles, setUserRoles] = React.useState();
    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;
    const { register, handleSubmit, formState: { errors }, control } = useForm();
    const { data, isLoading, fetch } = {};
    const [activeStep, setActiveStep] = React.useState(0);
    const [activeStepMFL, setActiveStepMFL] = React.useState(0);
    const [showDetail, setShowDetail] = React.useState(false);
    const [isErrorLog, setIsErrorLog] = React.useState(false);
    const [ppo, setPPO] = React.useState(false);
    const [csir, setCSIR] = React.useState(false);
    const [startDate, setStartDate] = React.useState(new Date());

    const handleSortModelChange = (newModel) => {

        console.log('THE MODEL', newModel );
        setSortModel(newModel);
    };

    React.useEffect(() => {

        let active = true;

        let sort = filterUrlString( sortModel );

        setLoading(true);

        //  ------- GET LAST SEVEN DAYS OF IMPORTS FROM PPO
        providerDataManager.getErrorAPI({ provider: 'PPO' }).then(( data ) => {

            setLoading(false);

            if( data.success ){
                console.log('PPO SYNC DATA', data);

                const steps = [];

                const stepsCSIR = [];

                //  -------------   PPO
                for (const key in data.ppo) {

                    let provBreakdown = [];

                    let alertPPO = false;

                    data.ppo[key].map((breakdown) =>{

                        //  IF THERE IS NO IMPORT END DATE, ALERT ERROR
                        if( !breakdown['ImportEndDate'] ){
                            alert = true;
                        }

                        switch(breakdown['EntityTypeId']) {
                            case 9:
                                provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Budget', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG'] })
                                break;
                            case 50:
                                provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Benefit', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                break;
                            case 8:
                                provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Document', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                break;
                            case 15:
                                provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Facility', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                break;
                            case 53:
                                provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Package', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                break;
                            case 2:
                                provBreakdown.push({ 'id': breakdown['ImportId'], 'name': 'Project', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                break;

                        }

                    });

                    steps.push({
                        label: key,
                        alertProv: alertPPO,
                        description: provBreakdown
                    });

                }

                //  ----------- CSIR
                for (const key in data.csir) {

                    let provBreakdownCSIR = [];

                    let alertCSIR = false;

                    data.csir[key].map((breakdownCsir) =>{

                        //  IF THERE IS NO IMPORT END DATE, ALERT ERROR
                        if( !breakdownCsir['ImportEndDate'] ){
                            alert = true;
                        }

                    });

                    //  ------------------- CSIR
                    data.csir[key].map((breakdownCsir) =>{

                        //  IF THERE IS NO IMPORT END DATE, ALERT ERROR
                        if( !breakdownCsir['ImportEndDate'] ){
                            alert = true;
                        }

                        provBreakdownCSIR.push({
                            'id': breakdownCsir['ImportId'],
                            success: breakdownCsir['FacilitiesImported'],
                            failed: breakdownCsir['FacilitiesFailed'],
                            isOK: (!breakdownCsir['ExceptionMSG']) ? true : false,
                            errorMessage: breakdownCsir['ExceptionMSG']
                        })

                    });

                    stepsCSIR.push({
                        label: key,
                        alertProv: alertCSIR,
                        description: provBreakdownCSIR
                    });

                }

                //  SET PPO
                setStepsPPO( steps );

                //  SET CSIR
                setStepsMFL( stepsCSIR );


            }

        });

        return () => {
            active = false;
        };

    }, []);

    const handleNext = () => {
        setActiveStep((prevActiveStep) => prevActiveStep + 1);
    };

    const handleBack = () => {
        setActiveStep((prevActiveStep) => prevActiveStep - 1);
    };

    const handleReset = () => {
        setActiveStep(0);
    };

    //  --------------  MFL STEPS
    const handleNextMFL = () => {
        setActiveStepMFL((prevActiveStep) => prevActiveStep + 1);
    };

    const handleBackMFL = () => {
        setActiveStepMFL((prevActiveStep) => prevActiveStep - 1);
    };

    const handleResetMFL = () => {
        setActiveStepMFL(0);
    };

    //  ---------   GET LOG ENTITY FOR IMPORT
    const getLogEntity = useCallback((id) => {

        //  IS NOT ERROR
        setIsErrorLog(false);

        //  PPO
        setPPO(true);

        //  CSIR
        setCSIR(false);

        window.scrollTo(0, 0);

        setLoading(true);

        setRowsImport([]);

        /** Import Entity */
        providerDataManager.getImportEntity( id ).then(( data ) => {

            setLoading(false);

            let getAllImportEntity = [];

            if( !data.success ){
                return;
            }

            data['data'].map((ent, index) => {

                getAllImportEntity.push( ent['log_import_entity'] );

            });

            setRowsImport(getAllImportEntity[0]);

        });

        setShowDetail(true);

    });

    //  ---------   GET LOG ENTITY DETAILS FOR IMPORT
    const getLogDetail = useCallback(( id, type ) => {

        //  IS ERROR
        setIsErrorLog(true);

        window.scrollTo(0, 0);

        setLoading(true);

        setRowsImport([]);

        if( type === 'CSIR' ){

            /** Import Entity */
            providerDataManager.getImportDetailCSIR( id ).then(( data ) => {

                setLoading(false);

                let getAllImportEntity = [];

                if( !data.success ){
                    return;
                }

                data['data'].map(( ent, index) => {

                    ent['log_import_detail'].map(( entLogImportDetail, index) => {
                        getAllImportEntity.push( entLogImportDetail );
                    });

                });

                setRowsImport(getAllImportEntity);

            });

        }else{

            /** Import Entity */
            providerDataManager.getImportDetail( id ).then(( data ) => {

                setLoading(false);

                let getAllImportEntity = [];

                if( !data.success ){
                    return;
                }

                data['data'].map((ent, index) => {

                    getAllImportEntity.push( ent['log_import_detail'] );

                });

                setRowsImport(getAllImportEntity[0]);

            });

        }

        setShowDetail(true);

    });

    //  ---------   GET LOG ENTITY DETAILS FOR IMPORT
    const getLogFacility = useCallback((id) => {

        //  IS ERROR
        setIsErrorLog(false);

        setPPO(false);

        setCSIR(true);

        window.scrollTo(0, 0);

        setLoading(true);

        setRowsImport([]);

        /** Import Entity */
        providerDataManager.getImportFacility( id ).then(( data ) => {

            setLoading(false);

            let getAllImportFacility = [];

            if( !data.success ){
                return;
            }

            data['data'].map((ent, index) => {

                getAllImportFacility.push( ent['log_import_facility'] );

            });

            setRowsImport(getAllImportFacility[0]);

        });

        setShowDetail(true);

    });

    /**
     *  Go back to time tracer.
     * */
    const goBack = () => {

        setShowDetail(false);

    };

    const onSubmit = React.useCallback(
        (data) => {

            setLoading(true);

            //  ------- GET LAST SEVEN DAYS OF IMPORTS FROM PPO
            providerDataManager.getSearchErrorApi( data['dateFrom'].toLocaleDateString(), data['dateTo'].toLocaleDateString()).then(( data ) => {

                setLoading(false);

                if( data.success ){

                    const steps = [];

                    const stepsCSIR = [];

                    //  -------------   PPO
                    for (const key in data.ppo) {

                        let provBreakdown = [];

                        let alertPPO = false;

                        data.ppo[key].map((breakdown) =>{

                            //  IF THERE IS NO IMPORT END DATE, ALERT ERROR
                            if( !breakdown['ImportEndDate'] ){
                                alert = true;
                            }

                            switch(breakdown['EntityId']) {
                                case 9:
                                    provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Budget', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG'] })
                                    break;
                                case 50:
                                    provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Benefit', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                    break;
                                case 8:
                                    provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Document', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                    break;
                                case 15:
                                    provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Facility', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                    break;
                                case 53:
                                    provBreakdown.push({ 'id': breakdown['ImportId'],'name': 'Package', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                    break;
                                case 2:
                                    provBreakdown.push({ 'id': breakdown['ImportId'], 'name': 'Project', success: breakdown['EntitiesImported'], failed: breakdown['EntitiesFailed'], isOK: (!breakdown['ExceptionMSG']) ? true : false, errorMessage: breakdown['ExceptionMSG']})
                                    break;

                            }

                        });

                        steps.push({
                            label: key,
                            alertProv: alertPPO,
                            description: provBreakdown
                        });

                    }

                    //  ----------- CSIR
                    for (const key in data.csir) {

                        let provBreakdownCSIR = [];

                        let alertCSIR = false;

                        data.csir[key].map((breakdownCsir) =>{

                            //  IF THERE IS NO IMPORT END DATE, ALERT ERROR
                            if( !breakdownCsir['ImportEndDate'] ){
                                alert = true;
                            }

                        });

                        //  ------------------- CSIR
                        data.csir[key].map((breakdownCsir) =>{

                            //  IF THERE IS NO IMPORT END DATE, ALERT ERROR
                            if( !breakdownCsir['ImportEndDate'] ){
                                alert = true;
                            }

                            provBreakdownCSIR.push({ 'id': breakdownCsir['ImportId'],success: breakdownCsir['FacilitiesImported'], failed: breakdownCsir['FacilitiesFailed'], isOK: (breakdownCsir['FacilitiesImported']) ? true : false})

                        });

                        stepsCSIR.push({
                            label: key,
                            alertProv: alertCSIR,
                            description: provBreakdownCSIR
                        });

                    }

                    //  SET PPO
                    setStepsPPO( steps );

                    //  SET CSIR
                    setStepsMFL( stepsCSIR );


                }

            });

        },
        [fetch]
    );

    return (
        <AuthenticatedLayout
            title={'HIPS Adminstrator V1.0'}
            {...props}
        >

            <Container maxWidth={'xl'} sx={{
                width: '98vw',
                paddingLeft: ['80px', '80px', '80px'],
                maxWidth: [ 'inherit', '100%', '100%'],
                height: '100%'
            }}>

                {
                    !userLoad &&
                    <div style={{ height: 800, width: '100%' }}>

                        {!showDetail &&
                        <Grid sx={{ backgroundColor: '#f6f4fb', paddingBottom: 2, marginLeft: '3px'}} container spacing={2}>

                            { /* --------------------    SEARCH FOR DATES    */ }
                            <Grid item xs={8}>

                                <form onSubmit={handleSubmit(onSubmit)}>

                                    <div style={{ display: 'inline-flex' }}>

                                        <div>
                                            <Controller
                                                name={"dateFrom"}
                                                control={control}
                                                rules={{ required: true }}
                                                render={({ field }) => (
                                                    <DatePicker
                                                        className={ classes.inputFields }
                                                        placeholderText='Select date FROM'
                                                        onChange={(date) => {field.onChange(date)}}
                                                        selected={field.value}
                                                    />
                                                )}
                                            />
                                            { errors.dateFrom?.type === 'required' &&
                                            <div className={ classes.error }>Date from is required.</div>
                                            }
                                        </div>

                                        <div>
                                            <Controller
                                                name={"dateTo"}
                                                control={control}
                                                rules={{ required: true }}
                                                render={({ field }) => (
                                                    <DatePicker
                                                        className={ classes.inputFields }
                                                        placeholderText='Select date TO'
                                                        onChange={(date) => {field.onChange(date)}}
                                                        selected={field.value}
                                                    />
                                                )}
                                            />
                                            { errors.dateTo?.type === 'required' &&
                                            <div className={ classes.error }>DateTo is required.</div>
                                            }
                                        </div>

                                        <div>
                                            { !loading &&
                                            <Button type="submit" className={ classes.loginBtn } variant="outlined" fullWidth>Search</Button>
                                            }

                                            { loading &&
                                            <LoadingButton sx={{ ml: '10px', height: '100%' }} loading variant="outlined">
                                                Submit
                                            </LoadingButton>
                                            }
                                        </div>

                                    </div>

                                </form>

                            </Grid>

                        </Grid>
                        }

                        <Grid container spacing={2}>

                            { !showDetail &&

                            <React.Fragment>

                                <Grid item xs={5}>

                                    {/* PPO INFORMATION */}
                                    <h3>PPO</h3>
                                    <Box sx={{ width: '100%' }}>
                                        <Stepper activeStep={activeStep} orientation="vertical">

                                            { stepsPPO.map((step, index) => {

                                                const labelProps = {};

                                                if (step.alertProv) {

                                                    labelProps.error = true;

                                                }

                                                return(

                                                    <Step key={step.label}>
                                                        <StepLabel
                                                            {...labelProps}
                                                            optional={
                                                                index === 2 ? (
                                                                    <Typography variant="caption">Last step</Typography>
                                                                ) : null
                                                            }
                                                        >
                                                            { step.label }
                                                        </StepLabel>

                                                        <StepContent>
                                                            { step['description'].map((info, key) => (

                                                                <Grid sx={{ fontSize: '11px' }} key={key+'PPO'} container spacing={2}>
                                                                    <Grid item xs={3}>
                                                                        <p style={{ fontWeight: 'bold', textTransform: 'uppercase', color: `${ !info['isOK'] ? "red" : "green"}`}}>{ info['name']}</p>
                                                                    </Grid>
                                                                    <Grid item xs={9}>

                                                                        { (!info['isOK']) &&
                                                                        <p style={{ color: "red", padding: '5px', border: 'thin solid red', overflow: "hidden"}}>{info['errorMessage']}</p>
                                                                        }

                                                                        { (info['isOK']) &&
                                                                        <React.Fragment>
                                                                            <p onClick={ () => getLogEntity(info['id']) } style={{ color: `${ !info['isOK'] ? "red" : "green"}`, cursor: 'pointer', textDecoration: 'underline' }}>Success: { (info['success'] !== null ) ? info['success'] : '0' }</p>
                                                                            <p onClick={ () => getLogDetail(info['id'], 'PPO') } style={{ color: `${ !info['isOK'] ? "red" : "green"}`, cursor: 'pointer', textDecoration: 'underline'}}>Failed: { (info['failed'] !== null ) ? info['failed'] : '0' }</p>
                                                                        </React.Fragment>
                                                                        }

                                                                    </Grid>
                                                                </Grid>

                                                            ))}
                                                            <Box sx={{ mb: 2 }}>
                                                                <div>
                                                                    <Button
                                                                        variant="contained"
                                                                        onClick={handleNext}
                                                                        sx={{ mt: 1, mr: 1 }}
                                                                    >
                                                                        Continue
                                                                    </Button>
                                                                    <Button
                                                                        disabled={index === 0}
                                                                        onClick={handleBack}
                                                                        sx={{ mt: 1, mr: 1 }}
                                                                    >
                                                                        Back
                                                                    </Button>
                                                                </div>
                                                            </Box>

                                                        </StepContent>

                                                    </Step>

                                                )

                                            })}

                                        </Stepper>

                                    </Box>

                                </Grid>

                                <Grid item xs={6}>

                                    {/* MFL INFORMATION */}
                                    <h3>MFL(CSIR)</h3>
                                    <Box sx={{ width: '100%' }}>
                                        <Stepper activeStep={activeStepMFL} orientation="vertical">

                                            { stepsMFL.map((step, index) => {

                                                const labelProps = {};

                                                if (step.alertProv) {

                                                    labelProps.error = true;

                                                }

                                                return(

                                                    <Step key={step.label}>
                                                        <StepLabel
                                                            {...labelProps}
                                                            optional={
                                                                index === 2 ? (
                                                                    <Typography variant="caption">Last step</Typography>
                                                                ) : null
                                                            }
                                                        >
                                                            { step.label }
                                                        </StepLabel>

                                                        <StepContent>
                                                            { step['description'].map((info, key) => (

                                                                <Grid sx={{ fontSize: '11px' }} key={key+'MFL'} container spacing={2}>

                                                                    { (!info['isOK']) &&
                                                                    <p style={{ color: "red", padding: '5px', border: 'thin solid red', overflow: "hidden"}}>{info['errorMessage']}</p>
                                                                    }

                                                                    { (info['isOK']) &&
                                                                    <Grid item xs={9}>
                                                                        <p onClick={ () => getLogFacility(info['id']) } style={{ color: `${ !info['isOK'] ? "red" : "green"}`, cursor: 'pointer', textDecoration: 'underline' }}>Success: { (info['success'] !== null ) ? info['success'] : '0' }</p>
                                                                        <p onClick={ () => getLogDetail(info['id'], 'CSIR') } style={{ color: `${ !info['isOK'] ? "red" : "green"}`, cursor: 'pointer', textDecoration: 'underline'}}>Failed: { (info['failed'] !== null ) ? info['failed'] : '0' }</p>
                                                                    </Grid>
                                                                    }

                                                                </Grid>

                                                            ))}
                                                            <Box sx={{ mb: 2 }}>
                                                                <div>
                                                                    <Button
                                                                        variant="contained"
                                                                        onClick={handleNextMFL}
                                                                        sx={{ mt: 1, mr: 1 }}
                                                                    >
                                                                        Continue
                                                                    </Button>
                                                                    <Button
                                                                        disabled={index === 0}
                                                                        onClick={handleBackMFL}
                                                                        sx={{ mt: 1, mr: 1 }}
                                                                    >
                                                                        Back
                                                                    </Button>
                                                                </div>
                                                            </Box>

                                                        </StepContent>

                                                    </Step>

                                                )

                                            })}

                                        </Stepper>

                                    </Box>

                                </Grid>
                            </React.Fragment>

                            }

                            { loading &&
                            <Stack sx={{ mt: 3 }} direction="row" spacing={2}>
                                <CircularProgress style={{position: 'fixed', top: '50%', left: '50%', transform: 'translate(-50%, -50%)'}} disableShrink />
                            </Stack>
                            }

                            { (showDetail && !loading ) &&
                            <React.Fragment>

                                <Breadcrumbs sx={{ padding: '20px'}} aria-label="breadcrumb">
                                    <Typography sx={{ cursor: 'pointer', textDecoration: 'underline'}} onClick={ () =>  goBack() } key="1" color="text.primary">
                                        Back to date tracer
                                    </Typography>
                                    <Typography sx={{ color: '#000', fontWeight: 'bold' }} key="2" color="text.primary">
                                        Details
                                    </Typography>
                                </Breadcrumbs>

                                { (!isErrorLog && ppo ) &&
                                <LogDataGrid rows={ rowsImport || [] } columns={[
                                    {
                                        field: 'DateCreated', headerName: 'Date Created',flex: 1, minWidth: 0
                                    },
                                    {
                                        field: 'ImportStatus', headerName: 'Import Status',flex: 1, minWidth: 0
                                    },
                                    {
                                        field: 'EntityIDPayload', headerName: 'Entity Row Imported',flex: 1, minWidth: 400
                                    }
                                ]} />
                                }

                                { (!isErrorLog && csir ) &&
                                <LogDataGrid rows={ rowsImport || [] } columns={[
                                    {
                                        field: 'DateCreated', headerName: 'Date Created',flex: 1, minWidth: 0
                                    },
                                    {
                                        field: 'ImportStatus', headerName: 'Import Status',flex: 1, minWidth: 0
                                    },
                                    {
                                        field: 'FacilityPayload', headerName: 'Facility Payload',flex: 1, minWidth: 400
                                    }
                                ]} />
                                }

                                { isErrorLog &&
                                <LogDataGrid rows={ rowsImport || [] } columns={[
                                    {
                                        field: 'LogMessage', headerName: 'Log Message',flex: 1, minWidth: 400
                                    }
                                ]} />
                                }

                            </React.Fragment>
                            }

                        </Grid>

                    </div>

                }

            </Container>

        </AuthenticatedLayout>
    );

}
