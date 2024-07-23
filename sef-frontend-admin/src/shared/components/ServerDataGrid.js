import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
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
import {AuthenticatedLayout} from "../../shared/components/layouts/AuthenticatedLayout";
import {authDataManager, userDataManager} from "../../core/api/data-managers";
import {sessionCookieAccess} from "../../core/security";
import { authActions, getUserSelector } from '../../store/auth';
import { DataGrid } from '@mui/x-data-grid';
import {filterUrlString} from "../../shared/helper";
import EditIcon from '@mui/icons-material/Edit';

const VISIBLE_FIELDS = [ 'first_name', 'last_name', 'email', 'user_status_id' ];

const useStyles = createUseStyles((theme) => ({
    '&.MuiDataGrid-root':{
        '&.MuiDataGrid-cell':{
            align:'center'
        }
    },
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    loginMain: {
        maxWidth: '400px',
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

export function ServerDataGrid( props ) {

    const classes = useStyles();
    const dispatch = useDispatch();
    const userSelector = useSelector( getUserSelector );

    const [sortModel, setSortModel] = React.useState([
        { field: 'first_name', sort: 'asc' },
    ]);

    const [rows, setRows] = React.useState([]);
    const [loading, setLoading] = React.useState(false);
    const [userLoad, setUserLoad] = React.useState(false);
    const [editRowsModel, setEditRowsModel] = React.useState({});

    const inEditMode = (newModel) => {

        console.log('EDIT MODE', newModel );
    };

    const handleSortModelChange = (newModel) => {

        console.log('THE MODEL', newModel );
        setSortModel(newModel);

    };

    React.useEffect(() => {

        console.log('SORT MODEL', sortModel );

        let active = true;

        let sort = filterUrlString( sortModel );

        setLoading(true);

        //  ------- API GET PROFILE
        userDataManager.usersWithRoles(sort).then(( data ) => {

            if (!active) {
                return;
            }

            if( data.hasOwnProperty('users')){

                let placeIds = data['users'];
                placeIds.forEach( (v, i) => { v.id = i });

                setRows( placeIds || [] );

                setLoading(false);

            }

        });

        return () => {
            active = false;
        };

    }, [ sortModel ] );


    const handleEditRowsModelChange = React.useCallback((model) => {

        setEditRowsModel(model);

        props.rowEdit(model);

    }, []);

    return (

        <React.Fragment>

            {
                loading &&
                <CircularProgress style={{position: 'fixed', top: '50%', left: '50%', transform: 'translate(-50%, -50%)'}} disableShrink />
            }

            {
                !loading &&
                <div style={{ height: 600, width: '100%' }}>
                    <DataGrid
                        rows={ props.rows || [] }
                        columns={ props.columns || [] }
                        sortingMode="server"
                        sortModel={sortModel}
                        onSortModelChange={handleSortModelChange}
                        onEditRowsModelChange={handleEditRowsModelChange}
                        loading={loading}
                    />
                </div>
            }

        </React.Fragment>

    );

}
