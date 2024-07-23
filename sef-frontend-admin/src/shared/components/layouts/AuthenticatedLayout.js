import React from 'react';
import { useDispatch } from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider,
    Grid
} from '@mui/material';

import {createUseStyles} from 'react-jss';

import { AuthenticatedHeader, AuthenticatedMenu } from "../../../shared/components";

const useStyles = createUseStyles((theme) => ({
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    loginMain: {
        maxWidth: '400px',
        margin: '0 auto',
        display: 'flex',
        flexDirection: 'column',
        backgorund: 'white',
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
    },
    grid:{

    },
    fullContain:{

    }
}));

export function AuthenticatedLayout( props ) {

    const classes = useStyles();
    const dispatch = useDispatch();

    return (
        <Container className={classes.fullContain} maxWidth={'xl'} >

            {/* HEADER */}
            {/*<AuthenticatedHeader  />*/}

            <AuthenticatedMenu  {...props} />

        </Container>
    );

}
