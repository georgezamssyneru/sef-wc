import React, {useRef, useState, useEffect} from 'react';
import Button from '@mui/material/Button';
import Snackbar from '@mui/material/Snackbar';
import IconButton from '@mui/material/IconButton';
import CloseIcon from '@mui/icons-material/Close';

export function ErrorResponseAlert( props ) {

    const [open, setOpen] = React.useState(false);

    React.useEffect(() => {

        if(props.active){
            setOpen(true);
        }else{
            setOpen(false);
        }

    },[ props.active ]);

    const handleClose = () => {
        setOpen(false);
    };

    const action = (
        <React.Fragment>
            <IconButton
                size="small"
                aria-label="close"
                color="inherit"
                onClick={handleClose}
            >
                <CloseIcon fontSize="small" />
            </IconButton>
        </React.Fragment>
    );

    return (
        <React.Fragment>
            <Snackbar
                open={open}
                anchorOrigin={ { vertical: 'bottom', horizontal: 'right' } }
                autoHideDuration={6000}
                onClose={handleClose}
                action={action}
                message={props.message}
                ContentProps={{
                    sx: {
                        background: "#B23726"
                    }
                }}
            />
        </React.Fragment>
    );

}
