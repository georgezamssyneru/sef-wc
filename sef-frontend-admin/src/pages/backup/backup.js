import React, {useEffect, useState, useRef} from 'react';
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
import {authActions, getUserSelector} from '../../store/auth';

import {authDataManager, securedDataManager} from "../../core/api/data-managers";
import {BackdropLoader} from "../../shared/components/backdrop-loader/BackdropLoader";
import 'devextreme/dist/css/dx.light.css';
import VisibilityIcon from '@mui/icons-material/Visibility';
import 'devextreme/dist/css/dx.light.css';
import parse from "html-react-parser";

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
import GridViewIcon from '@mui/icons-material/GridView';
import CustomStore from "devextreme/data/custom_store";
import LinearProgress from '@mui/material/LinearProgress';
import EditIcon from '@mui/icons-material/Edit';
import CloseIcon from '@mui/icons-material/Close';

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
export function Backup(props) {

    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;

    const classes = useStyles();

    const dispatch = useDispatch();

    const userSelector = useSelector(getUserSelector);

    //  ------- BACKDROP LOADING
    const [backdropLoading, setBackdropLoading] = React.useState(false);

    const [facilityMetaData, setFacilityMetaData] = React.useState({});

    const [rowsEdited, setRowsEdited] = React.useState([]);

    const [selectedItemKeys, setSelectedItemKeys] = React.useState([]);

    const [dataSource, setDataSource] = React.useState({});

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

    // create a ref to element to be used as the map's container
    const mapEl = useRef(null);

    const [webmap, setWebmap] = React.useState();

    const [allowInsertGrid, setAllowInsertGrid] = React.useState(false);

    const [allowDeleteGrid, setAllowDeleteGrid] = React.useState(false);

    const [whatTypeOfEditing, setWhatTypeOfEditing] = React.useState();

    const [isSlideOpen, setIsSlideOpen] = React.useState(false);

    const [viewer, setViewer] = React.useState();

    const [dynamicTypes, setDynamicTypes] = React.useState();

    const [dataGrids, setDataGrids] = React.useState();

    const [storeExpress, setStoreExpress] = React.useState(null);

    const [selectedValue, setSelectedValue] = React.useState({});

    const [selectedGridAttributes, setSelectedGridAttributes] = React.useState([]);

    const [selectedAppClass, setSelectedAppClass] = React.useState({});

    const [facilityType, setFacilityType] = React.useState([]);

    const [historyLoadOptions, setHistoryLoadOptions] = React.useState([]);

    const [backdropSelectGrid, setBackdropSelectGrid] = React.useState(false);

    const [backdropLoadingLoader, setBackdropLoadingLoader] = React.useState(false);

    const [isHipsFacility, setIsHipsFacility] = React.useState(false);

    const [notes, setNotes] = React.useState();

    const [mapId, setmasetFacilityTypepId] = React.useState('0139d08674fa4b23baa4e19cb38549a6');

    const gridExtreme = useRef(null);

    const [isFacilityEditor, setIsFacilityEditor] = React.useState(false);

    const [latLong, setLatLong] = React.useState({
        active: false,
        allData:{},
        longitude: '',
        latitude: ''
    });

    const [open, setOpen] = React.useState(false);

    const [fullWidth, setFullWidth] = React.useState(true);

    React.useEffect(() => {

        //  --------------------    FIRE UP STORE
        runStore('backup_id');

    }, []);

    const handleClickOpen = () => {
        setOpen(true);
    };

    const handleClose = () => {
        setOpen(false);
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

                return securedDataManager.putAppVersion(key,values).then((data) => {

                }).finally(() => {

                });

            },
            insert: (values) => {

                //  ----------------    CREATE APP CLASS

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

                return securedDataManager.getBackup( loadOptions.isLoadingAll
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

        setOpen(true);

        setNotes(e?.row?.data?.notes);

    };

    //  --------------------
    //  --------------------    INIT DATA GRID
    //  --------------------
    const initDataGrid = () =>{

        return(
            <Grid container spacing={2} sx={{
                padding: '0px'
            }}>

                <Grid
                    container
                    direction="row"
                    justifyContent="flex-start"
                    alignItems="center"
                    sx={{
                        marginTop: '15px',
                        padding: '5px'
                    }}
                >

                    <div style={{ maxWidth: '100%' }}>

                        <h3 style={{ textAlign: 'center', width: '100%',  }}>BACKUPS</h3>

                        <DataGrid id="grid"
                                  ref={gridExtreme}
                                  style={{
                                      height: '90vh',
                                      zIndex: 0,
                                      paddingTop: '19px',
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
                                allowAdding={ false }
                                allowDeleting={ false }
                            />

                            <Column
                                dataField={'backup_id'}
                                fixed={true}
                                caption={'Backup ID'}
                                width={100}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'string'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'backup_state'}
                                fixed={true}
                                caption={'Backup State'}
                                width={100}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'string'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'backup_dt'}
                                fixed={true}
                                caption={'Backup Date'}
                                width={100}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'date'}
                                format={'dd/MM/yyyy'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'message'}
                                fixed={true}
                                caption={'Message'}
                                width={150}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'string'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'filepath'}
                                fixed={true}
                                caption={'File path'}
                                width={200}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'string'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'filename'}
                                fixed={true}
                                caption={'File name'}
                                width={150}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'string'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            <Column
                                dataField={'remotepath'}
                                fixed={true}
                                caption={'Remote path'}
                                width={150}
                                headerCellRender={renderTitleHeader}
                                alignment="center"
                                allowFiltering={true}
                                allowEditing={true}
                                allowSorting={true}
                                filterOperations={['=']}
                                dataType={'string'}
                                // calculateFilterExpression={
                            >
                                <RequiredRule/>
                            </Column>

                            {/*<Column width={100} fixed={true} type="buttons" >*/}

                                {/*<Button name="delete" />*/}

                            {/*</Column>*/}

                            <Scrolling mode="virtual" rowRenderingMode="virtual" />

                            <Paging defaultPageSize={30}/>

                            <Export enabled={true}
                                    allowExportSelectedData={true}
                                //excelFilterEnabled={true}
                            />

                        </DataGrid>

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
                    open={open}
                    onClose={handleClose}
                >
                    <BootstrapDialogTitle id="customized-dialog-title" onClose={handleClose}>
                    </BootstrapDialogTitle>
                    <DialogContent>
                        <DialogContentText>

                            {
                                notes &&
                                parse(notes)
                            }

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
