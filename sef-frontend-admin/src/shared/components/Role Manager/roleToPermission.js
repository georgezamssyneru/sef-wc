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
export function RoleToPermission(props){

    const {register, handleSubmit, formState: {errors}, control} = useForm();

    const classes = useStyles();

    const dispatch = useDispatch();

    const userSelector = useSelector(getUserSelector);

    const [loading, setLoaded] = React.useState(false);

    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;

    const [fullWidth, setFullWidth] = React.useState(true);

    const [open, setOpen] = React.useState(false);

    const [storeExpress, setStoreExpress] = React.useState(null);

    const [backdropLoadingLoader, setBackdropLoadingLoader] = React.useState(false);

    const gridExtreme = useRef(null);

    const [backdropSelectGrid, setBackdropSelectGrid] = React.useState(false);

    const [sureDelete, setSureDelete] = React.useState(false);

    const [selectedAppClass, setSelectedAppClass] = React.useState({});

    const [revokeAccessUser, setRevokeAccessUser] = React.useState({});

    const [selectedItemKeys, setSelectedItemKeys] = React.useState([]);

    const [selectedUser, setSelectedUser] = React.useState([]);

    const [users, setUsers] = React.useState([]);

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

        console.log('fired!!!');

        //  --------------------    FIRE UP STORE
        runStore('permission_id');

    }, [ props.roleId, props.p_link_id ] );

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

    const handleClickOpen = () => {
        setOpen(true);
    };

    const handleClose = () => {
        setOpen(false);
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

                return securedDataManager.putPermission(key,values).then((data) => {

                }).finally(() => {

                });

            },
            insert: (values) => {

                // //  ----------------    CREATE APP CLASS
                return securedDataManager.createPermission(values).then((data) => {

                });

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

                return securedDataManager.getPermissionsFromRole( loadOptions.isLoadingAll
                    ? getOptions(recentUrl, true)
                    : getOptions(loadOptions, false))
                    .then((data) => {

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

        setRevokeAccessUser(e.row.data);

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

            return securedDataManager.revokePermissionRole({
                'permission_id': revokeAccessUser['permission_id'],
                'role_id': props.roleId
            }).then((data) => {

                setSureDelete(false);

                runStore('permission_id');

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

        // return securedDataManager.assignUserRole({
        //     'user_id': selectedUser['sec_user_id'],
        //     'role_id': props.roleId
        // }).then((data) => {
        //
        //     setOpen(false);
        //
        //     setLoaded(false)
        //
        //     runStore('sec_user_id');
        //
        // });

    };

    /**
     *  ON SELECT
     * */
    const onChangeSelectedOption = (e) => {

        setSelectedUser( e.value );

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

                    <Box sx={{ width: '100%', typography: 'body1', marginTop: '12px' }}>
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
                                      keyExpr={ 'permission_id' }
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
                                    allowUpdating={ true }
                                    allowAdding={ true }
                                    allowDeleting={ false }
                                />

                                <Column
                                    dataField={'permission_name'}
                                    fixed={true}
                                    caption={'Permission name'}
                                    width={200}
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
                                    dataField={'class_id'}
                                    caption={'Class Id'}
                                    width={200}
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
                                    dataField={'can_view'}
                                    caption={'Can view'}
                                    width={100}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={false}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    calculateCellValue = { (rowData) => {
                                        let _val;
                                        rowData.can_view === 1 ? _val = true : _val = false;
                                        return _val;
                                    }}
                                    setCellValue = {(newData, value, currentRowData) =>  {
                                        value ? newData.can_view = 1 : newData.can_view = 0;
                                    }}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'can_edit'}
                                    caption={'Can edit'}
                                    width={100}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={false}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    calculateCellValue = { (rowData) => {
                                        let _val;
                                        rowData.can_edit === 1 ? _val = true : _val = false;
                                        return _val;
                                    }}
                                    setCellValue = {(newData, value, currentRowData) =>  {
                                        value ? newData.can_edit = 1 : newData.can_edit = 0;
                                    }}
                                >
                                </Column>

                                <Column
                                    dataField={'can_delete'}
                                    caption={'Can delete'}
                                    width={100}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={false}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    calculateCellValue = { (rowData) => {
                                        let _val;
                                        rowData.can_delete === 1 ? _val = true : _val = false;
                                        return _val;
                                    }}
                                    setCellValue = {(newData, value, currentRowData) =>  {
                                        value ? newData.can_delete = 1 : newData.can_delete = 0;
                                    }}
                                >
                                </Column>

                                <Column
                                    dataField={'can_execute'}
                                    caption={'Can execute'}
                                    width={100}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={false}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    calculateCellValue = { (rowData) => {
                                        let _val;
                                        rowData.can_execute === 1 ? _val = true : _val = false;
                                        return _val;
                                    }}
                                    setCellValue = {(newData, value, currentRowData) =>  {
                                        value ? newData.can_execute = 1 : newData.can_execute = 0;
                                    }}
                                >
                                </Column>

                                <Column
                                    dataField={'can_custom'}
                                    caption={'Can custom'}
                                    width={100}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={false}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    calculateCellValue = { (rowData) => {
                                        let _val;
                                        rowData.can_custom === 1 ? _val = true : _val = false;
                                        return _val;
                                    }}
                                    setCellValue = {(newData, value, currentRowData) =>  {
                                        value ? newData.can_custom = 1 : newData.can_custom = 0;
                                    }}
                                >
                                </Column>

                                <Column
                                    dataField={'ref1'}
                                    caption={'ref 1'}
                                    width={150}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['contains']}
                                    dataType={'string'}
                                >
                                </Column>

                                <Column
                                    dataField={'ref2'}
                                    caption={'ref 2'}
                                    width={150}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['contains']}
                                    dataType={'string'}
                                >
                                </Column>

                                <Column
                                    dataField={'ref3'}
                                    caption={'ref 3'}
                                    width={150}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['contains']}
                                    dataType={'string'}
                                >
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
                    </Box>
                </section>
            }

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
                        Are you sure you want to remove the permission from role.
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

        </React.Fragment>
    );

}