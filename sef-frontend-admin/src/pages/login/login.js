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
        marginLeft: 'auto',
        marginRight: 'auto',
        display: 'flex',
        flexDirection: 'column',
        background: 'white',
        padding: '20px',
        justifyConent: 'center',
        marginTop: '12%'
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

export function Login() {

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
    const [ notAuthorized, setNotAuthorized ] = React.useState( {
        display: false
    } );

    React.useEffect(function () {

        //  -----   CHECK TO SEE IF EMAIL VALIDATED
        const queryParams = new URLSearchParams(location.search);
        const term = queryParams.get("verified");

        if( term === '1'){
            setEmailVerified({
                display: true,
                success: true,
                error: false
            });
        }else if(term === '0'){
            setEmailVerified({
                display: true,
                success: false,
                error: true
            });
        }

    }, []);

    const onSubmit = React.useCallback(
        (data) => {

            setLoaded( true );

            setSystemError( false );

            authDataManager.login( data.email, data.password ).then((data) => {

                //  --------------- IF NOT AUTHORIZED
                if( data.hasOwnProperty("success") ){

                    if( data.success === false && data.message === 'NOT_AUTHORIZED') {

                        setLoaded( false );

                        setNotAuthorized({ display: true });

                        return;

                    };

                }

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

                    dispatch( authActions.setLoggedIn(true) );

                    localStorage.setItem('auth', JSON.stringify(data));

                    ( data.components.length != 0 && data.user.email_verified_at ) ? navigate('/roles') : navigate('/noaccess');

                }

            });

        },
        [fetch]
    );

    return (
        <Container sx={{width: '100vw', height: '100%'}} >

            <Box className={classes.fullContain}>

                <form className={classes.loginMain} onSubmit={handleSubmit(onSubmit)}>

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

                    { /**** ACTIVE NOT AUTHORIZED ****/ }
                    { notAuthorized.display &&
                    <Alert sx={{ mb: 1 }} severity="error">You have not been authorized to use this app.
                        <br></br>
                        <small>* Once you are approved you shall receive an email confirmation.</small></Alert>
                    }

                    <p>Username: </p>
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
                                type="text"
                            />
                        )}
                    />
                    { errors.email?.type === 'required' &&
                        <div className={ classes.error }>Email is required.</div>
                    }

                    <p>Password: </p>

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
                                type="password"
                                autoComplete="current-password"
                            />
                        )}
                    />
                    { errors.password?.type === 'required' &&
                        <div className={ classes.error }>Password is required.</div>
                    }

                    { !loading &&
                    <Stack sx={{ mt: 3 }} direction="row" spacing={2}>
                        <Button type="submit" className={ classes.loginBtn } variant="outlined" fullWidth>Login</Button>
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
