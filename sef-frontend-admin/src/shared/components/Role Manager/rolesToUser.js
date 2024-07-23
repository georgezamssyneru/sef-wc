import React, {useEffect, useState, useRef} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {
    Container,
    Typography,
    Box,
    Tab,
    Skeleton,
    IconButton,
    CircularProgress,
    Stack
} from '@mui/material';
import {
    Button as Button2
} from '@mui/material';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import DialogTitle from '@mui/material/DialogTitle';
import TabContext from '@mui/lab/TabContext';
import TabList from '@mui/lab/TabList';
import TabPanel from '@mui/lab/TabPanel';
import CloseIcon from '@mui/icons-material/Close';
import DeleteIcon from '@mui/icons-material/Delete';
import {createUseStyles} from 'react-jss';
import { getUserSelector } from '../../../store/auth';
import Swal from 'sweetalert2';
import withReactContent from 'sweetalert2-react-content';
import AddIcon from '@mui/icons-material/Add';
import {rolesDataManager, securedDataManager, userDataManager} from "../../../core/api/data-managers";
import CustomStore from "devextreme/data/custom_store";
import {BackdropLoader} from "../../../shared/components/backdrop-loader/BackdropLoader";
import VisibilityIcon from '@mui/icons-material/Visibility';
import {useForm, Controller} from 'react-hook-form';
import LoadingButton from '@mui/lab/LoadingButton';

import DataGrid, {
    Column,
    Editing,
    Paging,
    Lookup,
    Scrolling,
    RequiredRule,
    FilterRow,
    Button,
    RemoteOperations,
    Export,
    Selection,
    Grouping,
    GroupPanel,
    StateStoring
} from 'devextreme-react/data-grid';
import {exportDataGrid} from "devextreme/excel_exporter";
import AsyncSelect from "react-select/async";
import {RoleToPermission} from "./roleToPermission";
import Select from 'react-select';

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
export function RolesToUser(props){

    const {register, handleSubmit, formState: {errors}, control} = useForm();

    const classes = useStyles();

    const dispatch = useDispatch();

    const userSelector = useSelector(getUserSelector);

    const [loading, setLoaded] = React.useState(false);

    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;

    const [fullWidth, setFullWidth] = React.useState(true);

    const [open, setOpen] = React.useState(false);

    const [openPermission, setOpenPermission] = React.useState(false);

    const [storeExpress, setStoreExpress] = React.useState(null);

    const [backdropLoadingLoader, setBackdropLoadingLoader] = React.useState(false);

    const gridExtreme = useRef(null);

    const [backdropSelectGrid, setBackdropSelectGrid] = React.useState(false);

    const [sureDelete, setSureDelete] = React.useState(false);

    const [selectedAppClass, setSelectedAppClass] = React.useState({});

    const [revokeAccessUser, setRevokeAccessUser] = React.useState({});

    const [selectedItemKeys, setSelectedItemKeys] = React.useState([]);

    const [selectedUser, setSelectedUser] = React.useState([]);

    const [selectedPermission, setSelectedPermission] = React.useState([]);

    const [users, setUsers] = React.useState([]);

    const [permissionsAll, setPermissions] = React.useState([]);

    const [pLinkId, setPLinkId] = React.useState();

    //  ------- FILTERS DATAGRID
    const [showFilterRow, setShowFilterRow] = React.useState(true);
    const [applyFilterTypes, setApplyFilterTypes] = React.useState([{
        key: 'auto',
        name: 'Immediately',
    }, {
        key: 'onClick',
        name: 'On Button Click',
    }]);
    const [currentFilter, setCurrentFilter] = React.useState(applyFilterTypes[0].key);

    React.useEffect(() => {

        //  --------------------    FIRE UP STORE
        runStore('sec_user_id');

        //  --------------------    GET PERMISSIONS OF ROLE
        //  ------- API GET ALL DISTRICTS
        if(props.roleId){

            rolesDataManager.getPermissionsByRole(props.roleId).then((data) => {

                if(data.success){

                    let getAllPermissions = [];

                    data.data.map((value,i) =>{

                        let permission = { value: value['permission_id'], label: value['permission_name'].toUpperCase() + ' - [CLASS]: ' + value['app_class']['class_name'] + ' [REF1]: ' + value['ref1'] + ' [REF2]: ' + value['ref2'] }

                        getAllPermissions.push(permission);

                    });

                    setPermissions(getAllPermissions);

                }

            });

        }


    }, [ props.roleId ] );

    const [value, setValue] = React.useState('1');

    const handleChange = (event, newValue) => {
        setValue(newValue);
    };

    //  ------- DIALOG TITLE ITH CLOSE BUTTON
    const BootstrapDialogTitle = (props) => {
        const { children, onClose, ...other } = props;

        return (
            <DialogTitle sx={{ m: 0, p: 2 }} {...other}>
                {children}
                {onClose ? (
                    <IconButton
                        aria-label="close"
                        onClick={onClose}
                        sx={{
                            position: 'absolute',
                            right: 8,
                            top: 8,
                            color: (theme) => theme.palette.grey[500],
                        }}
                    >
                        <CloseIcon />
                    </IconButton>
                ) : null}
            </DialogTitle>
        );
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
        if (countChar > 3) {

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
     * CREATE USER TO ROLE
     */
    const handleClickOpen = () => {
        setOpen(true);
    };

    /**
     * CLOSE USER TO ROLE
     */
    const handleClose = () => {
        setOpen(false);
    };

    /**
     * CREATE PERMISSION TO ROLE
     */
    const handleClickOpenPermission = () => {
        setOpenPermission(true);
    };

    /**
     * CLOSE USER TO ROLE
     */
    const handleClosePermission = () => {
        setOpenPermission(false);
    };

    //  --------------------
    //  --------------------    IS NOT EMPTY
    //  --------------------
    const isNotEmpty = (value) => {
        return value !== undefined && value !== null && value !== '';
    };

    //  --------------------
    //  --------------------    PARAMS TO OBJECT
    //  --------------------
    const paramsToObject = (entries) => {
        const result = {}
        for(const [key, value] of entries) { // each 'entry' is a [key, value] tupple
            result[key] = value;
        }
        return result;
    };

    //  --------------------
    //  --------------------    RUN STORE
    //  --------------------
    const runStore = ( primaryKey ) => {

        //  --------------------
        //  --------------------    LATEST HISTORY FOR DOWNLOADING EXCEL
        //  --------------------
        let recentUrl;

        let totalTake = 0;

        //  --------------------
        //  --------------------    GET OPTIONS
        //  --------------------
        const getOptions = ( loadOptions, isExport ) =>{

            let params = '?';
            [
                'skip',
                'take',
                'requireTotalCount',
                'requireGroupCount',
                'sort',
                'filter',
                'totalSummary',
                'group',
                'groupSummary',
                'extent'
            ].forEach((i) => {
                if (i in loadOptions && isNotEmpty(loadOptions[i])) {

                    if(isExport && i == 'skip'){
                        params += `${i}=0&`;
                    }else if(isExport && i == 'take'){

                        totalTake = (totalTake + parseInt(loadOptions[i]));
                        params += `${i}=${totalTake}&`;

                    }else{
                        params += `${i}=${JSON.stringify(loadOptions[i])}&`;
                    }

                }

            });

            //  ------- PLACE GRID ID
            params += `role_id=${ props.roleId }&`;

            if(!loadOptions.isLoadingAll){

                params.slice(0, -1)

                recentUrl =  paramsToObject(new URLSearchParams(params));

                return params;

            }else{

                params.slice(0, -1);

                return params;

            }

        };

        //  --------------------
        //  --------------------    CUSTOM STORE FOR DATAGRID
        //  --------------------
        let store = new CustomStore({
            key: primaryKey,
            cacheRawData: false,
            update: (key, values) => {

                // return securedDataManager.putAppVersion(key,values).then((data) => {
                //
                // }).finally(() => {
                //
                // });

            },
            insert: (values) => {

                // //  ----------------    CREATE APP CLASS
                // return securedDataManager.createAppGridAttribute(values).then((data) => {
                //
                // });

            },
            remove: (key) => {


            },
            onLoaded: function (result) {

            },
            onUpdated: function (k,v) {

            },
            load(loadOptions) {

                // //  ------------ DONT ALLOW CALL IF TAKE 1 - BUG IN DEVEXTREME
                // if( loadOptions.take === 1  ){
                //     return;
                // }

                return securedDataManager.getUsersFromRole( loadOptions.isLoadingAll
                    ? getOptions(recentUrl, true)
                    : getOptions(loadOptions, false))
                    .then((data) => {

                        console.log('IN HERE');

                        if(!data.success)
                            return;

                        let tempStore = [];

                        tempStore = data.data;

                        //  ----------  REMOVE BACKDROP
                        setBackdropLoadingLoader(false);

                        return {
                            data: tempStore,
                            totalCount: data.totalCount,
                            summary: data.summary,
                            groupCount: data.groupCount,
                        };

                    })
                    .catch((e) => {
                        throw new Error('No data.');
                    });

            }

        });

        setStoreExpress(store);

    };

    //  ------------    SHOW DIALOG IF SURE TO REMOVE ACCESS FROM USER
    const revokeAccessControl = (e) => {

        setRevokeAccessUser(e.row.data)

        setSureDelete( true );

    };

    //  ------------    RENDER TITLE HEADER
    const renderTitleHeader = (data) => {
        return <div style={{
            color: '#000',
            fontWeight: 'bold',
        }}>{data.column.caption}</div>;
    };

    const onRowInserted = (e) => {

        e.component.navigateToRow(e.key);

    };

    const onRowUpdated = (e) => {

        // e.component.state();

        // console.log('updated --->', e);

    };

    //  --------------------
    //  --------------------    SELECTION CHANGE
    //  --------------------
    let selectionChanged = (data) => {
        setSelectedItemKeys(data.selectedRowKeys);
    };

    //  --------------------
    //  --------------------    EXPORT TO CSV
    //  --------------------
    const onExporting = (e) =>{

        const workbook = new Workbook();
        const worksheet = workbook.addWorksheet('Main sheet');

        return exportDataGrid({
            component: e.component,
            worksheet,
            autoFilterEnabled: true,
        }).then(() => {

            workbook.xlsx.writeBuffer().then((buffer) => {
                saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'DataGrid.xlsx');
            });
        });
        e.cancel = true;

    };

    //  --------------------
    //  --------------------    REVOKE USER ACCESS
    //  --------------------
    const revokeAccess = () =>{

        if(revokeAccessUser){

            return securedDataManager.revokeUserRole({
                'user_id': revokeAccessUser['sec_user_id'],
                'role_id': props.roleId
            }).then((data) => {

                setSureDelete(false);

                runStore('sec_user_id');

            });

        }else{
            setSureDelete(false)
        }

    };

    /**
     * ASSIGN ROLE TO USER
     * @param data
     */
    const onSubmit = (data) => {

        setLoaded(true);

        return securedDataManager.assignUserRole({
            'user_id': selectedUser['sec_user_id'],
            'role_id': props.roleId
        }).then((data) => {

            setOpenPermission(false);

            setLoaded(false)

            runStore('sec_user_id');

        });

    };

    /**
     *
     * @param data
     */
    const onSubmitPermission = (data) => {

        setLoaded(true);

        return securedDataManager.assignRoleToPermission({
            'permission_id': selectedPermission,
            'role_id': props.roleId
        }).then((data) => {

            setOpenPermission(false);

            if(data.success){

                //  ---------   NOTIFY COMPONENT WITH NEW CREATED ID
                setPLinkId(data.data.p_link_id);

            }

            setLoaded(false);

        });

    };

    /**
     *  ON SELECT
     * */
    const onChangeSelectedOption = (e) => {

        setSelectedUser( e.value );

    };

    const onChangeSelectedPermissionOption = (e) => {

        setSelectedPermission( e.value );

    };

    return (

        <React.Fragment>

            {
                !props.roleId &&
                <Skeleton variant="rounded" width={'100%'} height={'90vh'} />
            }

            {
                props.roleId &&
                <section>
                    { value == 1 &&
                        <Button2  onClick={ handleClickOpen } sx={{float:'right'}} variant="outlined" startIcon={<AddIcon />}>
                            Add user to role
                        </Button2>
                    }

                    { value == 2 &&
                    <Button2  onClick={ handleClickOpenPermission } sx={{float:'right'}} variant="outlined" startIcon={<AddIcon />}>
                        Add permission to role
                    </Button2>
                    }

                    <Box sx={{ width: '100%', typography: 'body1', marginTop: '12px' }}>
                        <TabContext value={value}>
                            <Box sx={{ borderBottom: 1, borderColor: 'divider' }}>
                                <TabList onChange={handleChange} aria-label="lab API tabs example">
                                    <Tab label="Users" value="1" />
                                    <Tab label="Permissions" value="2" />
                                </TabList>
                            </Box>
                            <TabPanel sx={{ backgroundColor: '#fff'}} value="1">

                                <div style={{ maxWidth: '100%' }}>

                                    <DataGrid id="grid"
                                              ref={ gridExtreme }
                                              style={{
                                                  height: '80vh',
                                                  zIndex: 0,
                                                  paddingTop: '10px'
                                              }}
                                              onRowInserted={onRowInserted}
                                              onRowUpdated={onRowUpdated}
                                              focusedRowEnabled={true}
                                              dataSource={(!backdropSelectGrid) ? storeExpress : null}
                                              rowAlternationEnabled={true}
                                              showRowLines={true}
                                              showBorders={true}
                                              keyExpr={ 'sec_user_id' }
                                              selectedRowKeys={selectedItemKeys}
                                              allowColumnReordering={true}
                                              allowColumnResizing={true}
                                              columnAutoWidth={true}
                                              remoteOperations={true}
                                              wordWrapEnabled={true}
                                              onSelectionChanged={selectionChanged}
                                              onExporting={onExporting}
                                              syncLookupFilterValues={false}
                                              dateSerializationFormat={'yyyy-MM-dd'}
                                    >
                                        {/*<Selection mode="multiple"*/}
                                        {/*allowSelectAll={true}*/}
                                        {/*selectAllMode="page"*/}
                                        {/*/>*/}

                                        <FilterRow visible={showFilterRow}
                                                   applyFilter={currentFilter}
                                        />

                                        <RemoteOperations />

                                        {/*<Grouping autoExpandAll={false} isExpanded={false}/>*/}

                                        {/*<GroupPanel visible={true} />*/}

                                        {/*<HeaderFilter visible={true} allowSearch={true}/>*/}

                                        {/*<SearchPanel visible={true} />*/}

                                        {/*<StateStoring enabled={true} type="localStorage" storageKey="storageGrid" />*/}

                                        {/*todo become dynamic*/}
                                        <Editing
                                            mode={ 'batch' }
                                            allowUpdating={ false }
                                            allowAdding={ false }
                                            allowDeleting={ false }
                                        />

                                        <Column
                                            dataField={'first_name'}
                                            fixed={true}
                                            caption={'First name'}
                                            width={100}
                                            headerCellRender={renderTitleHeader}
                                            alignment="center"
                                            allowFiltering={true}
                                            allowEditing={true}
                                            allowSorting={true}
                                            filterOperations={['contains']}
                                            dataType={'string'}
                                            // calculateFilterExpression={
                                        >
                                            <RequiredRule/>
                                        </Column>

                                        <Column
                                            dataField={'last_name'}
                                            fixed={true}
                                            caption={'Last name'}
                                            width={100}
                                            headerCellRender={renderTitleHeader}
                                            alignment="center"
                                            allowFiltering={true}
                                            allowEditing={true}
                                            allowSorting={true}
                                            filterOperations={['contains']}
                                            dataType={'string'}
                                            // calculateFilterExpression={
                                        >
                                            <RequiredRule/>
                                        </Column>

                                        <Column
                                            dataField={'email'}
                                            fixed={true}
                                            caption={'Email'}
                                            width={100}
                                            headerCellRender={renderTitleHeader}
                                            alignment="center"
                                            allowFiltering={true}
                                            allowEditing={true}
                                            allowSorting={true}
                                            filterOperations={['contains']}
                                            dataType={'string'}
                                            // calculateFilterExpression={
                                        >
                                            <RequiredRule/>
                                        </Column>

                                        <Column width={100} fixed={true} type="buttons" >

                                            <Button onClick={revokeAccessControl}>
                                                <DeleteIcon sx={{ cursor:'pointer', marginRight: '20px'}} />
                                            </Button>

                                        </Column>

                                        <Scrolling mode="virtual" rowRenderingMode="virtual" />

                                        <Paging defaultPageSize={30}/>

                                        <Export enabled={true}
                                                allowExportSelectedData={true}
                                            //excelFilterEnabled={true}
                                        />

                                    </DataGrid>

                                </div>

                            </TabPanel>

                            <TabPanel sx={{ backgroundColor: '#fff'}} value="2">

                                {/* --------------- ROLE TO PERMISSION  */}
                                <RoleToPermission
                                    {...props}
                                    p_link_id = { pLinkId }
                                />

                            </TabPanel>

                        </TabContext>
                    </Box>
                </section>

            }

            {/*//  --------------------   USER TO ROLE  */}
            <section>
                <Dialog
                    fullWidth={fullWidth}
                    maxWidth={'md'}
                    open={open}
                    onClose={handleClose}
                >
                    <BootstrapDialogTitle id="customized-dialog-title" onClose={handleClose}>
                    </BootstrapDialogTitle>
                    <DialogContent sx={{ height: 300}}>
                        <DialogContentText>

                            <form style={{marginTop: '30px'}} className={classes.loginMain} onSubmit={handleSubmit(onSubmit)}>

                                <label>Find User:</label>

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

                                )}/>

                                {errors.name?.type === 'required' &&
                                    <div className={classes.error}>User is required.</div>
                                }

                                {!loading &&
                                <Stack sx={{mt: 3}} direction="row" spacing={2}>
                                    <Button2 type="submit" className={classes.loginBtn} variant="outlined" fullWidth>ASSIGN ROLE</Button2>
                                </Stack>
                                }

                                {loading &&
                                <Stack sx={{mt: 3}} direction="row" spacing={2}>
                                    <LoadingButton sx={{mt: 3}} loading variant="outlined" fullWidth>
                                        Submit
                                    </LoadingButton>
                                </Stack>
                                }

                            </form>

                        </DialogContentText>
                    </DialogContent>
                    {/*<DialogActions>*/}
                        {/*<Button onClick={handleClose}>Close</Button>*/}
                    {/*</DialogActions>*/}
                </Dialog>
            </section>

            {/*//  --------------------   PERMISSION TO ROLE  */}
            <section>
                <Dialog
                    fullWidth={fullWidth}
                    maxWidth={'md'}
                    open={openPermission}
                    onClose={handleClosePermission}
                >
                    <BootstrapDialogTitle id="customized-dialog-title" onClose={handleClosePermission}>
                    </BootstrapDialogTitle>
                    <DialogContent sx={{ height: 500}}>
                    <DialogContentText>

                    <form style={{marginTop: '30px'}} className={classes.loginMain} onSubmit={handleSubmit(onSubmitPermission)}>

                    <label>Find Permission:</label>

                    <Controller
                        name={"permissions"}
                        control={control}
                        value={ selectedPermission }
                        render={({onChange, onBlur, value, name, ref}) => (
                        <Select
                            options={permissionsAll}
                            value={value}
                            onChange={onChangeSelectedPermissionOption}
                        />
                    )}/>

                    {errors.name?.type === 'required' &&
                        <div className={classes.error}>User is required.</div>
                    }

                    {!loading &&
                    <Stack sx={{mt: 3}} direction="row" spacing={2}>
                        <Button2 type="submit" className={classes.loginBtn} variant="outlined" fullWidth>ASSIGN PERMISSION</Button2>
                    </Stack>
                    }

                    {loading &&
                    <Stack sx={{mt: 3}} direction="row" spacing={2}>
                        <LoadingButton sx={{mt: 3}} loading variant="outlined" fullWidth>
                            Submit
                        </LoadingButton>
                    </Stack>
                    }

                    </form>

                    </DialogContentText>
                    </DialogContent>
                    {/*<DialogActions>*/}
                    {/*<Button onClick={handleClose}>Close</Button>*/}
                    {/*</DialogActions>*/}
                </Dialog>
            </section>

            {/*//  --------------------   DELETE  */}
            <section>
                <Dialog
                    fullWidth={fullWidth}
                    maxWidth={'xs'}
                    open={sureDelete}
                    onClose={() => { setSureDelete(false) }}
                >
                    <BootstrapDialogTitle id="customized-dialog-title" onClose={() => { setSureDelete(false)}}>
                    </BootstrapDialogTitle>

                    <DialogTitle id="responsive-dialog-title">
                        Are you sure you want to revoke this role frorm the user?
                    </DialogTitle>

                    <DialogActions>
                        <Button2  onClick={() => { setSureDelete(false)}}>
                            Disagree
                        </Button2>
                        <Button2 onClick={ revokeAccess }>
                            Agree
                        </Button2>
                    </DialogActions>
                </Dialog>
            </section>

            {/*//  --------------------*/}
            {/*//  --------------------    LOADING */}
            {/*//  --------------------*/}
            <section>
                <BackdropLoader
                    open={backdropLoadingLoader}
                >
                    <CircularProgress color="inherit" />
                </BackdropLoader>
            </section>

        </React.Fragment>

    );

}