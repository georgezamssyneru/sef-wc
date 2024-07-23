import React, {useEffect, useState, useRef, useCallback} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useParams
} from "react-router-dom";
import {
    Container,
    Typography,
    Box,
    CircularProgress,
    Grid,
    Chip,
    IconButton,
    Button as ButtonMat
} from '@mui/material';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import DialogTitle from '@mui/material/DialogTitle';

import {createUseStyles} from 'react-jss';
import {AuthenticatedLayout} from "../../shared/components/layouts/AuthenticatedLayout";
import {authActions, getHipsToken, getUserSelector} from '../../store/auth';

import {userDataManager, securedDataManager} from "../../core/api/data-managers";
import {BackdropLoader} from "../../shared/components/backdrop-loader/BackdropLoader";
import 'devextreme/dist/css/dx.light.css';
import VisibilityIcon from '@mui/icons-material/Visibility';
import 'devextreme/dist/css/dx.light.css';
import parse from "html-react-parser";
import { confirm } from 'devextreme/ui/dialog';

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
import { exportDataGrid } from 'devextreme/excel_exporter';
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
import {isRole} from "../../shared/helper";
import GridViewIcon from '@mui/icons-material/GridView';
import CustomStore from "devextreme/data/custom_store";
import LinearProgress from '@mui/material/LinearProgress';
import EditIcon from '@mui/icons-material/Edit';
import CloseIcon from '@mui/icons-material/Close';
import {ErrorResponseAlert} from "../../shared/components/Alerting/ErrorResponseAlert";

const useStyles = createUseStyles((theme) => ({
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    tableRow:{
        fontWeight: 'bold',
        fontSize: '14px',
        textTransform: 'uppercase'
    },
    '&.MuiOutlinedInput-input': {
        padding: '15px !important',
    },
    overlay:{
        zIndex: '999 !important'
    }

}));

/**
 * DASHBOARD COMPONENT
 * @param props
 * @returns {*}
 * @constructor
 */
export function DataManager(props) {

    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;

    const classes = useStyles();

    const dispatch = useDispatch();

    const userSelector = useSelector(getUserSelector);

    const hipsToken = useSelector(getHipsToken);

    //  ------- BACKDROP LOADING
    const [backdropLoading, setBackdropLoading] = React.useState(false);

    const [facilityMetaData, setFacilityMetaData] = React.useState({});

    const [rowsEdited, setRowsEdited] = React.useState([]);

    const [selectedItemKeys, setSelectedItemKeys] = React.useState([]);

    const [dataSource, setDataSource] = React.useState({});

    const [userStatus, setUserStatus] = React.useState();

    const [isPaneOpen, setIsPaneOpen] = React.useState(false);

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

    const [storeExpress, setStoreExpress] = React.useState(null);

    const [selectedValue, setSelectedValue] = React.useState({});

    const [selectedGridAttributes, setSelectedGridAttributes] = React.useState([]);

    const [selectedAppClass, setSelectedAppClass] = React.useState({});

    const [facilityType, setFacilityType] = React.useState([]);

    const [historyLoadOptions, setHistoryLoadOptions] = React.useState([]);

    const [backdropSelectGrid, setBackdropSelectGrid] = React.useState(false);

    const [backdropLoadingLoader, setBackdropLoadingLoader] = React.useState(false);

    const [isHipsFacility, setIsHipsFacility] = React.useState(false);

    const gridExtreme = useRef(null);

    const [isFacilityEditor, setIsFacilityEditor] = React.useState(false);

    const [latLong, setLatLong] = React.useState({
        active: false,
        allData:{},
        longitude: '',
        latitude: ''
    });

    const [open, setOpen] = React.useState({
        active: false,
        key: null,
        value: null
    });

    const [fullWidth, setFullWidth] = React.useState(true);

    const [updateData, setUpdateData] = React.useState({});

    const [apiErrorDetails, setApiErrorDetails] = React.useState({ active: false });

    const inputEl = useRef(null);

    React.useEffect(() => {

        setBackdropLoadingLoader(true);

        //  ---------   FIRE UP STORE
        runStore('sec_user_id');

        //  ---------   GET ALL USERS STATUS
        getUserStatus();

    }, []);


    const handleClose = () => {
        setOpen({
            active: false,
            key: null,
            value: null
        });
    };


    let loadStore = () =>{

    };

    let deleteRecords = () => {
        selectedItemKeys.forEach((key) => {
            dataSource.store().remove(key);
        });
        setSelectedItemKeys({
            selectedItemKeys: [],
        });
        dataSource.reload();
    };

    //  --------------------
    //  --------------------    SELECTION CHANGE
    //  --------------------
    let selectionChanged = (data) => {
        setSelectedItemKeys(data.selectedRowKeys);
    };

    const changeLatLong = (latLongChange) =>{

        setLatLong(latLongChange);

    };

    //  --------------------
    //  --------------------    CELL TEMPLATE - DATA GRID
    //  --------------------
    const cellTemplate = (container, options) => {
        const noBreakSpace = '\u00A0';
        const text = (options.value || []).map((element) => options.column.lookup.calculateCellValue(element)).join(', ');
        container.textContent = text || noBreakSpace;
        container.title = text;
    };

    //  --------------------
    //  --------------------    CALCULTAE FILTER EXPRESSION - DATA GRID
    //  --------------------
    const calculateFilterExpressiongeneric = (filterValue, selectedFilterOperation, target, field) => {

        return [ field, selectedFilterOperation, filterValue];

    };

    const onRowInserted = (e) => {
        e.component.navigateToRow(e.key);
    };

    const onRowUpdated = (e) => {

        // e.component.state();

        // console.log('updated --->', e);

    };

    const renderTitleHeader = (data) => {
        return <div style={{
            color: '#000',
            fontWeight: 'bold',
        }}>{data.column.caption}</div>;
    };

    const renderTitleHeaderBeds = (data) => {
        return <div style={{
            color: '#CE8500',
        }}>{data.column.caption}</div>;
    };

    const renderGridCell = (data) => {
        return <div style={{
            fontSize: '12px'
        }}>{data.text}</div>;
    };

    const renderGridCellFacilityName = (data) => {
        return <div style={{

            fontWeight: 'bold'
        }}>{data.text}</div>;
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

    const customStyles = {
        option: (provided, state) => ({
            ...provided,
            borderBottom: '1px dotted #1976D2',
            color: state.isSelected ? '#fff' : '#000',
            fontSize: '12px',
            zIndex: '99999',
        }),
        singleValue: (provided, state) => ({
            ...provided,
            fontSize: '14px',
            zIndex: '99999',
        }),
        control: (provided, state) => ({
            ...provided,

            zIndex: '99999'
        }),

    };

    //  --------------------
    //  --------------------    PARAMS TO OBJECT
    //  --------------------
    const paramsToObject = (entries) => {
        const result = {}
        for(const [key, value] of entries) { // each 'entry' is a [key, value] tupple
            result[key] = JSON.parse(value);
        }
        return result;
    };

    //  --------------------
    //  --------------------    IS NOT EMPTY
    //  --------------------
    const isNotEmpty = (value) => {
        return value !== undefined && value !== null && value !== '';
    };

    //  --------------------
    //  --------------------    EDITOR PREPARING
    //  --------------------
    const onEditorPreparing = (e) => {

        //  ------------    EDITOR
        if (e.parentType === "dataRow" && e.dataField === "user_status_id") {

            const getTemp = [...userStatus];

            // change the dataSource option. You can pass a different array, or modify the existing lookup items
            e.editorOptions.dataSource = {
                test: userStatus,
                store: {
                    type: "array",
                    data: getTemp
                },
                // specify postProcess
                postProcess: function(data) {
                    // modify items. Here, all IDs divisible by 2 are disabled
                    let newDataTest = data.map((x) => {

                        console.log('dataRow', x );
                        console.log('dataRow', e.editorOptions.dataSource);

                        if ( x.disabled ) {
                            x.disabled = true;
                        }

                        return x;

                    });

                    return newDataTest;
                }
            }
        }

        //  ------------    FILTER
        if (e.parentType === "filterRow" && e.dataField === "user_status_id") {

            const getTempFilterRow = [...userStatus];

            // change the dataSource option. You can pass a different array, or modify the existing lookup items
            e.editorOptions.dataSource = {
                test: userStatus,
                store: {
                    type: "array",
                    data: getTempFilterRow
                },
                // specify postProcess
                postProcess: function(data) {
                    // modify items. Here, all IDs divisible by 2 are disabled
                    let newData = data.map((x) => {

                        console.log('filterRow', x );
                        console.log('filterRow', e.editorOptions.dataSource );

                        if ( x.disabled ) {
                            x.disabled = false;
                        }

                        return x;
                    });

                    return newData;
                }
            }
        }

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

                return userDataManager.assignStatus(values).then((data) => {

                    if(data.success)
                        setOpen({
                            active: false,
                            value: {}
                        })

                });

            },
            insert: (values) => {

                //  ----------------    CREATE APP CLASS
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

                //  ------------ DONT ALLOW CALL IF TAKE 1 - BUG IN DEVEXTREME
                if( loadOptions.take === 1  ){
                    return;
                }

                return securedDataManager.getSecUsers( loadOptions.isLoadingAll
                    ? getOptions(recentUrl, true)
                    : getOptions(loadOptions, false))
                    .then((data) => {

                        if(!data.success){

                            //  ----------  SET THE ERROR
                            setApiErrorDetails({
                                active: true,
                                message: 'We had a problem loading the users.',
                                type: 'INFO'
                            });

                        }

                        if(!data.success)
                            return;

                        let tempStore = [];

                        tempStore = data.data;

                        // if( "key" in data.data[0] == false ){
                        //
                        //     tempStore.map((row, index) => {
                        //
                        //     });
                        //
                        // }

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
                        console.log(e);
                        throw new Error('No data.');
                    });

            }

        });

        setStoreExpress(store);

    };

    //  ------------    WORK OUT TYPE TO DEVEXTREME
    const getType = (type) => {

        let whatTypeisIt;

        switch(type){
            case 'integer':
                whatTypeisIt = 'number'
                break;
            case 'numeric':
                whatTypeisIt = 'number'
                break;
            default:
                return type
        }

        return whatTypeisIt;

    };

    const renderSelectBoxItem = (item) => {
        return <div>{item.toUpperCase()}</div>;
    };

    //  ------------    DO WE HAVE LAT/LONG
    const isIconVisible = (e) =>{

        if(e.row.data.latitude && e.row.data.longitude){
            return true;
        }else{
            return false;
        }

    }

    const isIconDisabled = (e) => {
        return this.isChief(e.row.data.Position);
    }

    //  ------------    GO TO ESRI MAP
    const IconClick = (e) => {

        setOpen({ active: true });

        setUpdateData(e?.row?.data);

    };

    //  --------------------
    //  --------------------    CELL PREPARED
    //  --------------------
    const cellPrepared = (e) => {

        if (e.rowType === "data") {

            if ( e.column.dataField === "user_status_id" && e.data.user_status_id  == 1 ) {
                e.cellElement.style.cssText = "background-color: #F9BBBB; font-weight: bold; text-align:center; color: #000";
                // or
                //e.cellElement.classList.add("my-class");
            }

            if ( e.column.dataField === "user_status_id" && e.data.user_status_id  == 2 ) {
                e.cellElement.style.cssText = "background-color: #B2D5B0; font-weight: bold; text-align:center; color: #000";
                // or
                //e.cellElement.classList.add("my-class");
            }

        }

        //console.log( 'Row ---->',e.data, e.column.dataField );
        //console.log( 'Row ---->', e.column.dataField );

    };

    //  --------------------
    //  --------------------   COMMENT
    //  --------------------
    const handleChange = useCallback(e => {

        // 👇 Store the input value to local state
        return e.target.value;

    });

    //  --------------------
    //  --------------------   ON UPDATE ROW
    //  --------------------
    const updateRow = (e) => {
        const isCanceled = new Promise((resolve, reject) => {

            setOpen( {
                active: true,
                value: e
            } );

            return resolve(true);

        });
        e.cancel = isCanceled;
    };

    //  --------------------
    //  --------------------   GET USER STATUS
    //  --------------------
    const getUserStatus = () => {

        return userDataManager.getUserStatus().then((data) => {

            if(data.success)
                console.log('user status', data.data);
                setUserStatus( data.data )

        });

    }

    //  --------------------
    //  --------------------    INIT DATA GRID
    //  --------------------
    const initDataGrid = () => {

        return(
            <Grid container spacing={2} sx={{
                padding: '0px'
            }}>

                <h3 style={{ textAlign: 'center', width: '100%',  }}>USER MANAGER</h3>

                <Grid
                    container
                    direction="row"
                    justifyContent="flex-start"
                    alignItems="center"
                    sx={{
                        backgroundColor: '#F5F5F5',

                        padding: '5px'
                    }}
                >

                    <div style={{ maxWidth: '100%' }}>

                        <DataGrid id="grid"
                                  ref={gridExtreme}
                                  style={{
                                      height: '90vh',
                                      zIndex: 0,
                                      overflow: 'scroll',
                                      paddingLeft: '18px'
                                  }}
                                  onRowInserted={onRowInserted}
                                  onRowUpdated={onRowUpdated}
                                  focusedRowEnabled={true}
                                  dataSource={(!backdropSelectGrid) ? storeExpress : null}
                                  rowAlternationEnabled={true}
                                  showRowLines={true}
                                  showBorders={true}
                                  keyExpr={ selectedAppClass['pk_field_name']}
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
                                  onCellPrepared={cellPrepared}
                                  onRowUpdating={updateRow}
                                  //onEditorPreparing={onEditorPreparing}
                            >
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

                            <StateStoring enabled={true} type="localStorage" storageKey="storageUserManager" />

                            {/*todo become dynamic*/}
                            <Editing
                                mode={ 'row' }
                                allowUpdating={true}
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
                                allowEditing={false}
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
                                width={100}
                                caption={'Last Name'}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={false}
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
                                allowEditing={false}
                                allowSorting={true}
                                filterOperations={['contains']}
                                dataType={'string'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'user_status_id'}
                                fixed={true}
                                caption={'User status'}
                                width={100}
                                headerCellRender={renderTitleHeader}
                                alignment="left"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['contains']}
                                allowGrouping={false}
                                dataType={'string'}
                            >

                                <Lookup
                                    dataSource={
                                        userStatus
                                    }
                                    valueExpr="sec_user_status_id"
                                    displayExpr="user_status"
                                    disabled="is_system_status"
                                />

                            </Column>

                            <Column
                                dataField={'created_at'}
                                fixed={true}
                                caption={'Created Date'}
                                width={100}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={false}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'date'}
                                format={'dd/MM/yyyy'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'updated_at'}
                                fixed={true}
                                caption={'Updated Date'}
                                width={100}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={false}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'date'}
                                format={'dd/MM/yyyy'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                caption={'Actions'}
                                headerCellRender={renderTitleHeader}
                                width={100}
                                fixed={true}
                                type="buttons"
                            >

                                {/*<Button onClick={IconClick}>*/}
                                    {/*<EditIcon sx={{ cursor:'pointer'}} />*/}
                                {/*</Button>*/}

                                <Button name="edit" />

                            </Column>

                            <Scrolling mode="virtual" rowRenderingMode="virtual" />

                            <Paging defaultPageSize={30}/>

                            <Export enabled={false}
                                    allowExportSelectedData={true}
                                //excelFilterEnabled={true}
                            />

                        </DataGrid>

                        <ErrorResponseAlert
                            active={ apiErrorDetails.active }
                            message={ apiErrorDetails.message }
                            type={apiErrorDetails.type}
                        />

                    </div>

                </Grid>

            </Grid>

        );

    };

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

    return (
        // AUTHENTICATED LAYOUT
        <AuthenticatedLayout
            title={'HIPS (Facility grid editing) '}
            {...props}
        >

            <Container maxWidth={'xl'} sx={{
                width: '98vw',
                paddingLeft: ['100px', '80px', '80px'],
                maxWidth: [ 'inherit', '100%', '100%'],
                height: '100%'
            }}>

                { initDataGrid() }

            </Container>

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

            <section>
                <Dialog
                    fullWidth={fullWidth}
                    maxWidth={'md'}
                    open={open.active}
                    onClose={handleClose}
                >
                    <BootstrapDialogTitle id="customized-dialog-title" onClose={handleClose}>

                    </BootstrapDialogTitle>
                    <DialogContent>
                        <DialogContentText>

                            <label>Please place your comment:</label>

                            <textarea cols="40" rows="5" style={{width: '100%', marginBottom: '20px'}} ref={inputEl}  onChange={ handleChange  }  required />

                            <ButtonMat sx={{ float: 'right'}} onClick={()=>{

                                //console.log(open);

                                //  --------    CHECK THAT YOU HAVE A COMMENT
                                if(!inputEl?.current?.value){

                                    MySwal.fire({
                                        title: <strong>You need to comment on your action.</strong>,
                                        icon: 'error'
                                    });

                                    return;

                                }

                                setBackdropLoadingLoader(true);

                                const dataSource = gridExtreme.current.instance;

                                storeExpress.update( open.value.key, {
                                    user_status_id: open.value.newData?.user_status_id,
                                    sec_user_id: open.value.oldData?.sec_user_id,
                                    comment:  inputEl?.current?.value
                                })
                                    .then(
                                        (dataObj) => {

                                            dataSource.cancelEditData();
                                            dataSource.refresh();
                                            setOpen( { active: false} );

                                        },
                                        (error) => { /* ... */ }
                                    );

                            }} variant="outlined">SUBMIT</ButtonMat>


                        </DialogContentText>
                    </DialogContent>
                    <DialogActions>
                        <Button onClick={handleClose}>Close</Button>
                    </DialogActions>
                </Dialog>
            </section>

        </AuthenticatedLayout>
    );

}
