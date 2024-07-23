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
import {ReportingDevExpressComponent} from "../../shared/components/reporting/ReportingDevExpressComponent";

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
export function Reporting( props ) {

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


    }, []);

    return (
        <AuthenticatedLayout
            title={'HIPS Adminstrator V1.0'}
            {...props}
        >

            <Container maxWidth={'xl'} sx={{
                width: '98vw',
                paddingLeft: ['100px', '80px', '80px'],
                maxWidth: [ 'inherit', '100%', '100%'],
                height: '100%'
            }}>

                <ReportingDevExpressComponent />

            </Container>

        </AuthenticatedLayout>
    );

}
