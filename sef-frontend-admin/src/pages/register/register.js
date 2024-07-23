import React, { useRef } from 'react';
import { useDispatch } from 'react-redux';
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
import { authDataManager } from '../../core/api/data-managers';
import { authActions, getUserSelector } from '../../store/auth';
import { useNavigate, Link } from 'react-router-dom';
import LoadingButton from '@mui/lab/LoadingButton';
import SaveIcon from '@mui/icons-material/Save';
import Stack from '@mui/material/Stack';

const useStyles = createUseStyles((theme) => ({
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    fullContain:{

    },
    bg:{
        height: '100vh',
        background: 'url(./architecture.jpg) no-repeat',
        backgroundSize: '100% auto ',
        backgroundPosition: '0',
        position: 'absolute'
    },
    loginMain: {
        maxWidth: '400px',
        margin: '5% auto',
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
        padding: ' 10px 0 10px 0',
        fontWeight: 'bolder'
    }
}));

export function Register() {

    const classes = useStyles();
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const { data, isLoading, fetch } = {};

    const { register, handleSubmit, formState: { errors }, control, watch, setError } = useForm();

    const [ registered, setRegistered] = React.useState({
        display: false,
        success: false
    });
    const [ loading, setLoaded ] = React.useState( false );
    const [ systemError, setSystemError ] = React.useState( false );

    React.useEffect(function () {

    }, []);

    const onSubmit = React.useCallback(
        (data) => {

            setLoaded( true );

            setSystemError( false );

            authDataManager.register( data ).then((data) => {

                if(data.hasOwnProperty("error")){

                    setSystemError( true );

                    setLoaded( false );

                    return;

                }

                if( data.success ){

                    setLoaded( false );

                    setRegistered({
                        display: true,
                        success: true
                    });

                }else{

                    //  SERVER ERRORS ON REGISTER
                    if(data.hasOwnProperty('email')){

                        //  SET FORM ERROR
                        setError("email", {
                            type: "emailExists",
                            message: "Email already exists",
                        });

                    }

                    setLoaded( false );

                }

            });

        },
        [fetch]
    );

    const password = useRef({});
    password.current = watch("password", "");

    return (
        <Container maxWidth="xl" className={ classes.bg }>
            <Box className={classes.fullContain}>
                {/*<h1>{process.env.REACT_APP_TITLE} llll</h1>*/}

                {
                    !registered.display &&
                    <form className={classes.loginMain} onSubmit={handleSubmit(onSubmit)}>

                        <h3 style={{ textAlign: 'center' }}>Register</h3>

                        { /**** SYSTEM ERRORS ****/ }
                        { systemError &&
                        <Alert sx={{ mb: 1 }} severity="error">Looks like there is an issue with the system. Please try again later.</Alert>
                        }

                        { /**** FIRST NAME ****/ }
                        <Controller
                            name={"first_name"}
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
                                    label={"First name"}
                                    variant="filled"
                                    type="text"
                                />
                            )}
                        />
                        { errors.first_name?.type === 'required' &&
                        <div className={ classes.error }>First name is required.</div>
                        }

                        { /**** LAST NAME ****/ }
                        <Controller
                            name={"last_name"}
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
                                    label={"Last name"}
                                    variant="filled"
                                    type="text"
                                />
                            )}
                        />
                        { errors.last_name?.type === 'required' &&
                        <div className={ classes.error }>Last name is required.</div>
                        }

                        { /**** EMAIL ****/ }
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
                                    sx={{ mt: 1 }}
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

                        { errors.email?.type === 'emailExists' &&
                        <div className={ classes.error }>{ errors.email.message }</div>
                        }

                        { /**** PASSWORD ****/ }
                        <Controller
                            name={"password"}
                            control={control}
                            rules={{
                                required: true,
                                minLength: {
                                    value: 8,
                                    message: "Password must have at least 8 characters"
                                }
                            }}
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
                        { errors.password &&
                        <div className={ classes.error }>{errors.password.message}</div>
                        }

                        { /**** PASSWORD REPEAT ****/ }
                        <Controller
                            name={"password_repeat"}
                            control={control}
                            rules={{
                                required: true,
                                validate: value =>
                                    value === password.current || "The passwords do not match"
                            }}
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
                                    label="Confirm Password"
                                    type="password"
                                    autoComplete="current-password"
                                    variant="filled"
                                />
                            )}
                        />
                        { errors.password_repeat &&
                        <div className={ classes.error }>{errors.password_repeat.message}</div>
                        }

                        { !loading &&
                        <Stack sx={{ mt: 3 }} direction="row" spacing={2}>
                            <Button type="submit" className={ classes.loginBtn } variant="outlined" fullWidth>Submit</Button>
                        </Stack>
                        }

                        { loading &&
                        <LoadingButton sx={{ mt: 3 }} loading variant="outlined">
                            Submit
                        </LoadingButton>
                        }

                        <Link to={ '/' }>
                            <Button color="success" sx={{ mt: 1 }} className={ classes.loginBtn } variant="outlined" fullWidth>Go to login</Button>
                        </Link>

                    </form>

                }

                {
                    (registered.display && registered.success === true) &&
                        <section className={classes.loginMain} >
                            <Alert sx={{ mb: 1 }} severity="success">You have registered successfully, you shall soon be sent an email to verify your email.</Alert>
                            <Link to={ '/' }>
                                <Button color="success" sx={{ mt: 1 }} className={ classes.loginBtn } variant="outlined" fullWidth>Go to login</Button>
                            </Link>
                        </section>
                }


            </Box>
        </Container>
    );

}
