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

import {createUseStyles} from 'react-jss';
import {AuthenticatedLayout} from "../../shared/components/layouts/AuthenticatedLayout";
import { rolesDataManager, userDataManager } from "../../core/api/data-managers";
import {sessionCookieAccess} from "../../core/security";
import {authActions, getUserSelector} from '../../store/auth';
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
 * DASHBOARD COMPONENT
 * @param props
 * @returns {*}
 * @constructor
 */
export function Roles(props) {

    const classes = useStyles();

    const dispatch = useDispatch();

    const userSelector = useSelector(getUserSelector);

    const [loading, setLoaded] = React.useState(false);

    const {register, handleSubmit, formState: {errors}, control} = useForm();

    const [report, setReport] = React.useState();

    const [districts, setDistricts] = React.useState([]);

    const [users, setUsers] = React.useState([]);

    const [selectedUser, setSelectedUser] = React.useState([]);

    const [roles, setRoles] = React.useState([]);

    const [selectedRoles, setSelectedRoles] = React.useState([]);

    const [searchRoles, setSearchRoles] = React.useState(false);

    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;

    React.useEffect(() => {

    }, []);

    /**
     * CREATE ROLE
     */
    const onSubmitCreateRole = (data) => {

        console.log('Data sent', data);

    };

    /**
     * ASSIGN ROLE TO USER
     * @param data
     */
    const onSubmit = (data) => {

        setLoaded(true);

        let dataPackage = {
            user: selectedUser.sec_user_id,
            roles: selectedRoles
        }

        rolesDataManager.assignRoles(dataPackage).then((data) => {

            if(data.success){

                MySwal.fire({
                    title: <strong>Success</strong>,
                    html: <i>Roles have been added to user.</i>,
                    icon: 'success'
                });

            }

            setLoaded(false);

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
        if (countChar > 1) {

            //  RESET ROLES
            setSelectedRoles([]);

            setRoles([]);

            //  Lets mark as EMPTY so that we can wait for response
            setUsers([]);

            let allUsers = [];

            setTimeout(() => {

                //  ------- API GET ALL DISTRICTS
                rolesDataManager.getUserWithRoles(inputValue).then((data) => {

                    if(data.success){

                        data.users.map((value,i) =>{

                            let user = { value: value, label: value['first_name'].toUpperCase() + ' ' + value['last_name'].toUpperCase() + ' - ' + value['email'] }

                            allUsers.push(user);

                        });

                    }

                    callback( allUsers );

                });

            }, 2000);

        }

    };

    /**
     *  ON SELECT
     * */
    const onChangeSelectedOption = (e) => {

        setSelectedUser( e.value );

        setSearchRoles(true);

        //  ------- API GET ALL DISTRICTS
        userDataManager.getRoles().then((data) => {

            let assignedRoles = [];

            let getAllRoles = [];

            e.value.sec_role_user.map((role,i) =>{

                let getRole = role['sec_role'][0];

                let user = { value: getRole['role_id'], label: getRole['role_name'] }

                assignedRoles.push(user);

            });

            if(data.success){

                data.roles.map((getRoleAPI,i) =>{

                    let user = { value: getRoleAPI['role_id'], label: getRoleAPI['role_name'] }

                    getAllRoles.push( user );

                });

                setSearchRoles(false);

            }

            setSelectedRoles( assignedRoles );

            setRoles( getAllRoles );

        });

    };

    return (
        // AUTHENTICATED LAYOUT
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

                <Grid container spacing={2}>

                    {/*<Grid item xs={5}>*/}
                        {/*<Box sx={{ }}>*/}

                            {/*<form className={classes.loginMain} onSubmit={ handleSubmit( onSubmitCreateRole ) }>*/}

                                {/*<h3 style={{textAlign: 'center', fontWeight: 'bolder'}}>Create Role</h3>*/}

                                {/*<Controller*/}
                                    {/*name={"role_name"}*/}
                                    {/*control={control}*/}
                                    {/*rules={{ required: true }}*/}
                                    {/*render={(*/}
                                        {/*{*/}
                                            {/*field: { onChange, onBlur, defaultValue, name, ref },*/}
                                            {/*fieldState: { invalid, isTouched, isDirty, error },*/}
                                            {/*formState*/}
                                        {/*}) => (*/}
                                        {/*<TextField*/}
                                            {/*onChange={onChange}*/}
                                            {/*value={defaultValue}*/}
                                            {/*className={classes.texInput}*/}
                                            {/*placeholder={'Place role name.'}*/}
                                            {/*type="text"*/}
                                        {/*/>*/}
                                    {/*)}*/}
                                {/*/>*/}
                                {/*{ errors.role_name?.type === 'required' &&*/}
                                {/*<div className={ classes.error }>Role name is required.</div>*/}
                                {/*}*/}

                                {/*{!loading &&*/}
                                {/*<Stack sx={{mt: 3}} direction="row" spacing={2}>*/}
                                    {/*<Button type="submit" className={classes.loginBtn} variant="outlined" fullWidth>CREATE ROLE</Button>*/}
                                {/*</Stack>*/}
                                {/*}*/}

                                {/*{loading &&*/}
                                {/*<LoadingButton sx={{mt: 3}} loading variant="outlined">*/}
                                    {/*Submit*/}
                                {/*</LoadingButton>*/}
                                {/*}*/}

                            {/*</form>*/}

                        {/*</Box>*/}
                    {/*</Grid>*/}

                    <Grid item xs={7}>
                        <Box sx={{ }}>

                            <form className={classes.loginMain} onSubmit={handleSubmit(onSubmit)}>

                                <h3 style={{textAlign: 'center', fontWeight: 'bolder'}}>Assign Roles</h3>

                                <p>Find User:</p>
                                <Controller
                                    name={"user"}
                                    control={control}
                                    value={ selectedUser }
                                    render={({onChange, onBlur, value, name, ref}) => (
                                        <AsyncSelect
                                            defaultOptions
                                            loadOptions={loadOptions}
                                            value={value}
                                            onChange={onChangeSelectedOption}
                                        />

                                    )}
                                />
                                {errors.name?.type === 'required' &&
                                <div className={classes.error}>User is required.</div>
                                }

                                {
                                    ( searchRoles ) &&
                                    <LoadingButton sx={{mt: 3}} loading variant="outlined">
                                        Submit
                                    </LoadingButton>
                                }

                                {/* ONLY SHOW FACILITIES IF WE HAVE FACILITIES */}
                                {
                                    (selectedRoles.length !== 0) &&
                                    <section>
                                        <p>Assign Roles to the user:</p>
                                        <Controller
                                            name={"facility"}
                                            control={control}
                                            render={({onChange, onBlur, value, name, ref}) => (
                                                <Select
                                                    isClearable
                                                    isMulti
                                                    name="facility"
                                                    options={ roles }
                                                    value={ selectedRoles }
                                                    onChange={e => {
                                                        setSelectedRoles(e);
                                                    }}
                                                />
                                            )}
                                        />
                                    </section>

                                }

                                {!loading &&
                                <Stack sx={{mt: 3}} direction="row" spacing={2}>
                                    <Button type="submit" className={classes.loginBtn} variant="outlined" fullWidth>ASSIGN ROLE</Button>
                                </Stack>
                                }

                                {loading &&
                                <LoadingButton sx={{mt: 3}} loading variant="outlined">
                                    Submit
                                </LoadingButton>
                                }

                            </form>

                        </Box>
                    </Grid>
                </Grid>

            </Container>

        </AuthenticatedLayout>
    );

}
