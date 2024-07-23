import React from 'react';
import { useDispatch } from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider
} from '@mui/material';

import {createUseStyles} from 'react-jss';
import { useNavigate, Link, useLocation } from 'react-router-dom';

const useStyles = createUseStyles((theme) => ({
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    loginMain: {
        '& small':{
            fontSize: '14px !important',
            display: 'block'
        },
        maxWidth: '800px',
        margin: '0 auto',
        display: 'flex',
        flexDirection: 'column',
        marginTop: '30px',
        background: 'white'
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

export function NotFound( props ) {

    const classes = useStyles();
    const dispatch = useDispatch();

    const navigate = useNavigate();
    const location = useLocation();

    const goBack = () => {
        navigate.goBack
    }

    React.useEffect(() => {

        // navigate('/');

    }, []);

    return (
        <Container maxWidth="xl" className={ classes.bg }>

            <Box className={classes.fullContain}>

                <section className={classes.loginMain}>

                    <h1 style={{ textAlign: 'center', fontSize: '80px', fontWeight: 'bold' }}>404<small>Not Found.</small></h1>

                </section>
            </Box>
        </Container>
    );

}
