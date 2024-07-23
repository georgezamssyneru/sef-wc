import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider,
    Alert
} from '@mui/material';

import { useForm, Controller } from 'react-hook-form';

import {createUseStyles} from 'react-jss'
import Stack from '@mui/material/Stack';
import { authDataManager } from '../../core/api/data-managers';
import { authActions, getUserSelector } from '../../store/auth';
import { useNavigate, Link, useLocation } from 'react-router-dom';
import LoadingButton from '@mui/lab/LoadingButton';
import { localStorageAccess, sessionCookieAccess } from '../../core/security';

const useStyles = createUseStyles((theme) => ({

    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    bg:{
        height: '100vh',
        backgroundSize: '50% auto ',
        backgroundPosition: '0',
        position: 'absolute'
    },
    fullContain:{

    },
    loginMain: {
        maxWidth: '400px',
        margin: '13% auto',
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
    error:{
        fontSize: '12px',
        color: 'red',
        padding: ' 10px 0 10px 0'
    }
}));

export function UserEditor( props ) {

    const userSelector = useSelector( getUserSelector );
    const classes = useStyles();
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const location = useLocation();
    const { data, isLoading, fetch } = {};
    const [ emailVerified, setEmailVerified] = React.useState({
        display: false,
        success: false,
        error: false
    });

    const { register, handleSubmit, formState: { errors }, control } = useForm();
    const [ loading, setLoaded ] = React.useState( false );
    const [ systemError, setSystemError ] = React.useState( false );
    const [ loginError, setLoginError ] = React.useState( false );

    React.useEffect(function () {

       console.log('user info', props.userInfo);

    }, []);

    const onSubmit = React.useCallback(
        (data) => {

            setLoaded( true );

            setSystemError( false );

            authDataManager.login( data.email, data.password ).then((data) => {

                //  SYSTEM ERROR STATUS 401
                if( data.status === 401 ){

                    setLoginError( true );

                    setLoaded( false );

                    //  REMOVE SESSION COOKIE
                    sessionCookieAccess.logout();

                    return;

                }

                //  SYSTEM ERROR STATUS 500
                if( data.hasOwnProperty("error") ){

                    setSystemError( true );

                    setLoaded( false );

                    //  REMOVE SESSION COOKIE
                    sessionCookieAccess.logout();

                    return;

                }

                if( data.success ){

                    //  ----------  DISPATCH TO REDUX STATE
                    dispatch( authActions.setAuthDetails(data.user) );

                    localStorage.setItem('auth', JSON.stringify(data));

                    ( data.components.length != 0 && data.user.email_verified_at ) ? navigate('/administrator') : navigate('/noaccess');

                }

            });

        },
        [fetch]
    );

    return (
        <Container maxWidth="xl" className={ classes.bg }>

            <Box>

                <form onSubmit={handleSubmit(onSubmit)}>

                    <h3 style={{ textAlign: 'center' }}>Admininstrator Area Version 1.0</h3>

                    {/*EMAIL VERIFIED*/}
                    { ( emailVerified.display && emailVerified.success ) &&
                    <Alert sx={{ mb: 1 }} severity="success">Your email has been verified. Please login.</Alert>
                    }

                    { ( emailVerified.display && emailVerified.error ) &&
                    <Alert sx={{ mb: 1 }} severity="error">Your email verification has expired.</Alert>
                    }

                    { /**** SYSTEM ERRORS ****/ }
                    { systemError &&
                    <Alert sx={{ mb: 1 }} severity="error">Looks like there is an issue with the system. Please try again later.</Alert>
                    }

                    { /**** STATUS 401 ERRORS ****/ }
                    { loginError &&
                    <Alert sx={{ mb: 1 }} severity="error">Your username or password are wrong.</Alert>
                    }

                    <Controller
                        name={"email"}
                        control={control}
                        rules={{ required: true }}
                        render={(
                            {
                                field: { onChange, onBlur, defaultValue, name, ref },
                                fieldState: { invalid, isTouched, isDirty, error },
                                formState
                            }) => (
                            <TextField
                                onChange={onChange}
                                value={defaultValue}
                                className={classes.texInput}
                                label={"Email"}
                                variant="filled"
                                type="text"
                            />
                        )}
                    />
                    { errors.email?.type === 'required' &&
                    <div className={ classes.error }>Email is required.</div>
                    }

                    <Controller
                        name={"password"}
                        control={control}
                        rules={{ required: true }}
                        render={(
                            {
                                field: { onChange, onBlur, defaultValue, name, ref },
                                fieldState: { invalid, isTouched, isDirty, error },
                                formState
                            }) => (
                            <TextField
                                sx={{ mt: 1 }}
                                onChange={onChange}
                                value={defaultValue}
                                className={classes.texInput}
                                id="filled-password-input"
                                label="Password"
                                type="password"
                                autoComplete="current-password"
                                variant="filled"
                            />
                        )}
                    />
                    { errors.password?.type === 'required' &&
                    <div className={ classes.error }>Password is required.</div>
                    }

                    { !loading &&
                    <Stack sx={{ mt: 3 }} direction="row" spacing={2}>
                        <Button type="submit" className={ classes.loginBtn } variant="outlined">Login</Button>
                    </Stack>
                    }

                    { loading &&
                    <LoadingButton sx={{ mt: 3 }} loading variant="outlined">
                        Submit
                    </LoadingButton>
                    }

                    {/*<Link to={ '/register' }>*/}
                    {/*<Button color="success" sx={{ mt: 1 }} className={ classes.loginBtn } variant="outlined" fullWidth>Register</Button>*/}
                    {/*</Link>*/}

                </form>
            </Box>
        </Container>
    );

}
