import React, {useRef, useState, useEffect} from 'react';
import { useDispatch, useSelector } from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Backdrop,
    Box,
    CircularProgress,
    TextField,
    Divider,
    Grid,
    Breadcrumbs,
    CardActionArea,
    CardActions,
    Card,
    CardContent,
    CardMedia,
    Stack,
    Skeleton,
    List,
    ListItem,
    Avatar,
    ListItemText,
    ListItemAvatar,
    TextareaAutosize
} from '@mui/material';

import {createUseStyles} from 'react-jss';

import {authDataManager} from "../../../core/api/data-managers";
import {getUserSelector, getHipsToken, authActions} from "../../../store/auth";
import {sessionCookieAccess} from "../../../core/security";
import {useLocation, useNavigate,Link} from "react-router-dom";
import {DataGridComponent} from "../../../shared/components/DataGridComponent";

import { useForm, Controller } from 'react-hook-form';
import BatteryFullIcon from '@mui/icons-material/BatteryFull';
import LoadingButton from '@mui/lab/LoadingButton';

const useStyles = createUseStyles((theme) => ({
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    loginMain: {
        margin: '0 0 15px 0',
        display: 'flex',
        flexDirection: 'column',
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

/**
 * BACKDROP LOADER
 * @param props
 * @returns {*}
 * @constructor
 */
export function BackdropLoader( props ) {

    const [open, setOpen] = React.useState(false);
    const handleClose = () => {
        setOpen(false);
    };
    const handleToggle = () => {
        setOpen(!open);
    };

    // use a side effect to create the map after react has rendered the DOM
    useEffect(
        () => {

            setOpen(props.open);

        },
        // only re-load the map if the id has changed
        [ props ]
    );

    return (
        <Backdrop
            sx={{ color: '#fff', zIndex: '99999', backgroundColor: '#000', opacity: '0.5 !important' }}
            open={open}
            onClick={handleClose}
        >
            { props.children }
        </Backdrop>
    );

}
