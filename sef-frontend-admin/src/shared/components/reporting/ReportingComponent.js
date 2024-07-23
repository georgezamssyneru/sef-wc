import React, {useEffect, useState} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider,
    Card,
    CardActions,
    CardContent,
    CardMedia,
    Grid,
    Stack
} from '@mui/material';
import DashboardIcon from '@mui/icons-material/Dashboard';
import LocationSearchingIcon from '@mui/icons-material/LocationSearching';

import {loadModules} from 'esri-loader';

import {createUseStyles} from 'react-jss';
import {AuthenticatedLayout} from "../../../shared/components/layouts/AuthenticatedLayout";
import {authDataManager} from "../../../core/api/data-managers";
import {
    useMap, useScene, useWebMap, useWebScene, // create a map or scene
    useFeatureTable, useEvent, useEvents, useWatch, useWatches, // handle events or property changes
    useGraphic, useGraphics // add graphics to a map/scene
} from 'esri-loader-hooks';
import {sessionCookieAccess} from "../../../core/security";
import {authActions, getHipsToken, getUserSelector} from '../../../store/auth';
import {useForm, Controller} from 'react-hook-form';
import {useNavigate, Link, useLocation} from 'react-router-dom';
import LoadingButton from '@mui/lab/LoadingButton';
import Select from 'react-select'
import AsyncSelect from "react-select/async";
import Swal from 'sweetalert2';
import withReactContent from 'sweetalert2-react-content';

const useStyles = createUseStyles((theme) => ({

    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    bg: {
        height: '100%',
        background: 'url(./build.jpg) no-repeat',
        backgroundSize: '100% auto ',
        backgroundPosition: 'center',
        position: 'absolute'
    },
    fullContain: {},
    loginMain: {
        border: '1px solid #F0F0F0',
        display: 'flex',
        flexDirection: 'column',
        background: 'white',
        padding: '20px',
        justifyConent: 'center'
    },
    '&.MuiOutlinedInput-input': {
        padding: '15px !important',
    },
    title: {
        textAlign: 'center',
    },
    loginBtn: {
        margin: '5px 0 0 0'
    },
    texInput: {
        margin: '5px 0 0 0'
    },
    error: {
        fontSize: '12px',
        color: 'red',
        padding: ' 10px 0 10px 0'
    }
}));

/**
 * REPORTING COMPONENT
 * @param props
 * @returns {*}
 * @constructor
 */
export function ReportingComponent(props) {

    const classes = useStyles();

    const dispatch = useDispatch();

    const userSelector = useSelector(getUserSelector);

    const hipsToken = useSelector(getHipsToken);

    const [loading, setLoaded] = React.useState(false);

    const {register, handleSubmit, formState: {errors}, control} = useForm();

    const [report, setReport] = React.useState();

    const [districts, setDistricts] = React.useState([]);

    const [facilities, setFacilities] = React.useState([]);

    const [selectedDistrict, setSelectedDistrict] = React.useState([]);

    const [selectedFacility, setSelectedFacility] = React.useState([]);

    const [searchFacility, setSearchFacility] = React.useState(false);

    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;

    const [hasDistrictAndFacility, setHasDistrictAndFacility] = React.useState(false);

    React.useEffect(() => {

        //  CHECK TO SEE IF WE HAVE DISTRICT AND FACILITY
        if( props.district && props.facility ){

            setSelectedDistrict(props.district);

            setSelectedFacility( [props.facility]);

            setHasDistrictAndFacility(true);

        }

    }, []);

    /**
     * SUBMIT TO GENERATE FORM
     */
    const onSubmit = (data) => {

        console.log('Data sent', selectedDistrict, selectedFacility);

        if( selectedDistrict.length === 0 || selectedFacility.length === 0){

            MySwal.fire({
                title: <strong>Something went wrong</strong>,
                html:  <strong>Please select the district and facility to generate report.</strong>,
                icon: 'error'
            });

            return;

        }

        if (selectedDistrict && !hasDistrictAndFacility ) {

            let getFacilities = [];

            selectedFacility.forEach(val => {
                getFacilities.push(val.value);
            });

            openPDF(selectedDistrict.value, getFacilities, '100');

        }else{

            console.log(selectedDistrict, selectedFacility);

            openPDF(selectedDistrict, selectedFacility, '100');

        }

    };

    /**
     * GENERATE PDF REPORT FROM BACKEND
     */
    const openPDF = (district, facilities, limit) => {

        setLoaded(true);

        //  ------- API GET PROFILE FROM SERVICE
        authDataManager.getReport(district, facilities, limit).then((data) => {

            let blob = new Blob([data], {type: 'application/pdf'});
            let link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.target = '_blank';
            link.download = 'report.pdf'
            // link.click()

            setLoaded(false);

            setSearchFacility( false );

            window.open(link, '_blank').focus();

        });

    };

    /**
     *  LOAD OPTIONS FROM BACKEND SERVICE
     * */
    const loadOptions = (inputValue, callback) => {

        if (!inputValue) {
            return callback([]);
        }

        let countChar = inputValue.length;

        //  ONLY FIRE IF OVER 3 CHARACTERS
        if ( countChar > 0 ) {

            //  Lets mark as EMPTY so that we can wait for response
            setFacilities([]);

            //  ------- API GET ALL DISTRICTS
            authDataManager.getDistricts(inputValue).then((data) => {

                callback(data.districts);

            });

        }

    }

    /**
     *  ON SELECT
     * */
    const onChangeSelectedOption = (e) => {

        const selectedOption = e.value; // <--- you can get value from object directly

        setSearchFacility(true);

        //  ------- API GET ALL DISTRICTS
        authDataManager.getFacilities(selectedOption).then((data) => {

            setSearchFacility(false);

            setFacilities(data.facilities);

        });

        setSelectedDistrict(e);

    };

    return (
        // AUTHENTICATED LAYOUT
        <Container maxWidth={'xl'} sx={{
            width: (!hasDistrictAndFacility) ? '98vw' : '100%',
            paddingLeft: ['38px', '38px', '38px'],
            maxWidth: [ 'inherit', '100%', '100%'],
            height: '100%'
        }}>

            <Box sx={{ marginLeft: ['0px', '30px', '30px']}}>

                <form onKeyPress={e => {
                    if (e.key == "Enter") {
                        e.preventDefault();
                    }
                }}
                      style={{
                          maxWidth: (!hasDistrictAndFacility) ? '400px' : '100%',
                      }}
                      className={classes.loginMain}
                      onSubmit={handleSubmit(onSubmit)}>

                    <h3 style={{textAlign: 'center', fontWeight: 'bolder'}}>Report Generator</h3>

                    { !hasDistrictAndFacility &&
                        <React.Fragment>
                            <p>Choose your district</p>
                            <Controller
                                name={"district"}
                                control={control}
                                value={selectedDistrict}
                                render={({onChange, onBlur, value, name, ref}) => (
                                    <AsyncSelect
                                        defaultInputValue={' '}
                                        autoFocus
                                        defaultOptions
                                        loadOptions={loadOptions}
                                        value={value}
                                        onChange={onChangeSelectedOption}
                                    />

                                )}
                            />
                            {errors.district?.type === 'required' &&
                            <div className={classes.error}>District is required.</div>
                            }

                            {/* ONLY SHOW FACILITIES IF WE HAVE FACILITIES */}
                            {
                                (facilities.length !== 0) &&
                                <section>
                                    <p>Choose your facility by district</p>
                                    <Controller
                                        name={"facility"}
                                        control={control}
                                        value={ selectedFacility }
                                        render={({onChange, onBlur, value, name, ref}) => (
                                            <Select
                                                isClearable
                                                isMulti
                                                name="facility"
                                                options={facilities}
                                                value={value}
                                                onChange={e => {
                                                    setSelectedFacility(e);
                                                }}
                                            />

                                        )}
                                    />
                                </section>

                            }
                        </React.Fragment>
                    }


                    {
                        ( facilities.length === 0 && searchFacility) &&
                        <LoadingButton sx={{mt: 3}} loading variant="outlined">
                            Submit
                        </LoadingButton>
                    }

                    {!loading &&
                    <Stack sx={{mt: 3}} direction="row" spacing={2}>
                        <Button type="submit" className={classes.loginBtn} variant="outlined" fullWidth>Generate
                            Report</Button>
                    </Stack>
                    }

                    {loading &&
                    <LoadingButton sx={{mt: 3}} loading variant="outlined">
                        Submit
                    </LoadingButton>
                    }

                </form>

            </Box>

        </Container>
    );

}
