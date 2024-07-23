import React, {useCallback, Component, useRef} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider,
    Grid,
    Card,
    CardContent,
    CardMedia,
    CardActionArea,
    CardActions,
    Stack
} from '@mui/material';

import {createUseStyles} from 'react-jss';
import {AuthenticatedLayout} from "../../shared/components/layouts/AuthenticatedLayout";
import {authDataManager, userDataManager, providerDataManager} from "../../core/api/data-managers";
import {authActions, getUserSelector} from '../../store/auth';
import {filterUrlString} from "../../shared/helper";
import Swal from 'sweetalert2';
import withReactContent from 'sweetalert2-react-content';
import {useForm, Controller} from 'react-hook-form';
import Stepper from '@mui/material/Stepper';
import Step from '@mui/material/Step';
import StepLabel from '@mui/material/StepLabel';
import StepContent from '@mui/material/StepContent';
import {LogDataGrid} from "../../shared/components/LogDataGrid";
import Breadcrumbs from '@mui/material/Breadcrumbs';
import {sessionCookieAccess} from "../../core/security";
import DatePicker from 'react-datepicker';
import "react-datepicker/dist/react-datepicker.css";
import LoadingButton from '@mui/lab/LoadingButton';
import CustomStore from "devextreme/data/custom_store";

const VISIBLE_FIELDS = ['first_name', 'last_name', 'email', 'user_status_id'];
import DataGrid, {
    Column,
    Editing,
    Paging,
    Lookup,
    Scrolling,
    RequiredRule,
    FilterRow,
    RemoteOperations,
    Export,
    Selection,
    Pager
} from 'devextreme-react/data-grid';
import {v4 as uuidv4} from "uuid";

const useStyles = createUseStyles((theme) => ({
    '&.MuiTypography-h5': {
        textAlign: 'center',
    },
    '&.MuiOutlinedInput-input': {
        padding: '15px !important',
    },
    title: {
        textAlign: 'center',
    },
    loginBtn: {
        marginLeft: '10px',
        height: '100%'
    },
    inputFields: {
        padding: 12,
        marginLeft: '10px',

    },
    texInput: {
        margin: '0px 0 0 0',
        width: '100%'
    },
    error: {
        fontSize: '12px',
        color: 'red',
        padding: ' 10px 0 10px 0'
    }
}));

/**
 * CLASSES ATTRIBUTE COMPONENT
 * @param props
 * @returns {*}
 * @constructor
 */
export function ReportingManager(props) {

    const gridExtremeAppClass = useRef(null);
    const gridExtremeAppAttributeClass = useRef(null);
    const classes = useStyles();
    const dispatch = useDispatch();
    const userSelector = useSelector(getUserSelector);

    const [sortModel, setSortModel] = React.useState([
        {field: 'first_name', sort: 'asc'},
    ]);

    const [rows, setRows] = React.useState();
    const [loading, setLoading] = React.useState(false);
    const [userLoad, setUserLoad] = React.useState(false);
    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;
    const {register, handleSubmit, formState: {errors}, control} = useForm();
    const {data, isLoading, fetch} = {};
    const [storeClassesAppAttributeExpress, setStoreClassesAppAttributeExpress] = React.useState(null);
    const [selectedGrid, setSelectedGrid] = React.useState();
    const [lookupClasses, setLookUpClasses] = React.useState([]);
    const [lookupGridTypeEditing, setLookupGridTypeEditing] = React.useState([]);
    const [selectedItemKeys, setSelectedItemKeys] = React.useState([]);
    const [reportLayout, setReportLayout] = React.useState([]);

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

        runStoreAppGrid()

    }, [props]);

    React.useEffect(() => {

        authDataManager.getGridClasses().then((data) => {

            //  -------------   PLACE LOOKUPS FOR ATTRIBUTES
            if(data.success)
                setLookUpClasses( data.data );

        });

        authDataManager.getGridTypeEditing().then((data) => {

            console.log('Grid Type', data);

            //  -------------   PLACE LOOKUPS FOR ATTRIBUTES
            if(data.success)
                setLookupGridTypeEditing( data.data );

        });

        //    ------------------    GET REPORT LAYOUT
        authDataManager.getReportLayout().then((data) => {

            if(data.success){

                setReportLayout(data.data);

            }

        });

    }, []);

    const onSubmit = React.useCallback(
        (data) => {

        },
        [fetch]
    );

    //  --------------------
    //  --------------------    GRID ITEM INSERT
    //  --------------------
    const onRowInserted = (e) => {
        //  e.component.navigateToRow(e.key);
    };

    //  --------------------
    //  --------------------    GRID ITEM UPDATED
    //  --------------------
    const onRowUpdated = (e) => {

        // e.component.state();

        console.log('updated --->', e);

        //  RUN THE STORE
        // runStoreAppGrid();

    };

    //  --------------------
    //  --------------------    PARAMS TO OBJECT
    //  --------------------
    const paramsToObject = (entries) => {
        const result = {}
        for (const [key, value] of entries) { // each 'entry' is a [key, value] tupple
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
    //  --------------------    CUSTOM STORE FOR APP CLASS ATTRIBUTE.
    //  --------------------
    const runStoreAppGrid = () => {

        //  --------------------
        //  --------------------    LATEST HISTORY FOR DOWNLOADING EXCEL
        //  --------------------
        let recentUrl;

        let totalTake = 0;

        //  --------------------
        //  --------------------    GET OPTIONS CLASS ATTRIBUTE
        //  --------------------
        const getOptions = (loadOptions, isExport) => {

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

                    if (isExport && i == 'skip') {
                        params += `${i}=0&`;
                    } else if (isExport && i == 'take') {

                        totalTake = (totalTake + parseInt(loadOptions[i]));
                        params += `${i}=${totalTake}&`;

                    } else {
                        params += `${i}=${JSON.stringify(loadOptions[i])}&`;
                    }

                }

            });

            //  ------- PLACE GRID ID
            // params += `classId=${ JSON.stringify(props.classId) }&`;

            params.slice(0, -1);

            return params;

        };

        //  --------------------
        //  --------------------    CUSTOM STORE FOR DATAGRID
        //  --------------------
        const storeAppGrid = new CustomStore({
            key: 'report_id',
            cacheRawData: false,
            insert: (values) => {

                //  CREATE NEW CLASS ID.
                values['report_id'] = uuidv4();

                //  ----------------    CREATE APP CLASS
                return authDataManager.createAppReporting(values).then((data) => {

                });

            },
            update: (key, values) => {

                console.log( '--->', key, values);

                // //  ------  PASS WHICH GRID
                //values['gridId'] = JSON.stringify(selectedValueAttr);

                return authDataManager.putGridEditingReporting(key, values).then((data) => {

                });

            },
            remove: (key) => {

                //  DELETE GRID
                return authDataManager.deleteGridAppReporting(key).then((data) => {

                });

            },
            onLoaded: function (result) {

            },
            onUpdated: function (k, v) {

            },
            load(loadOptions) {

                //  ------------ DONT ALLOW CALL IF TAKE 1 - BUG IN DEVEXTREME
                if (loadOptions.take === 1 || loadOptions.group) {
                    return;
                }

                return authDataManager.getGridAppReporting(loadOptions.isLoadingAll
                    ? getOptions(recentUrl, true)
                    : getOptions(loadOptions, false))
                    .then((data) => {

                        if (!data.success)
                            return;

                        let tempStore = [];

                        tempStore = data.data;

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

        setStoreClassesAppAttributeExpress(storeAppGrid);

    };

    //  --------------------
    //  --------------------    STYLING HEADERS
    //  --------------------
    const renderTitleHeader = (data) => {
        return <div style={{
            color: '#000',
            fontWeight: 'bold',
        }}>{data.column.caption}</div>;
    };

    //  --------------------
    //  --------------------    GRID SELECTION CHANGED
    //  --------------------
    let selectionChanged = (data) => {

        if(!data.selectedRowKeys)
            return;

        if(data.selectedRowKeys.length > 0){

            console.log('selected grid', data);

            //  -----------------   SET SELECTED ATTRIBUTE CLASS
            setSelectedGrid({
                report_id: data.selectedRowKeys[0],
                class_id: data.selectedRowsData[0]?.class_id
            });

        }

    };

    //  --------------------
    //  --------------------    EXPORT TO CSV
    //  --------------------
    const onExporting = (e) => {
        const workbook = new Workbook();
        const worksheet = workbook.addWorksheet('Main sheet');

        exportDataGrid({
            component: e.component,
            worksheet,
            autoFilterEnabled: true,
        }).then(() => {
            workbook.xlsx.writeBuffer().then((buffer) => {
                saveAs(new Blob([buffer], {type: 'application/octet-stream'}), 'DataGrid.xlsx');
            });
        });
        e.cancel = true;
    };

    return (
        <React.Fragment>

            <AuthenticatedLayout
                title={'HIPS Adminstrator V1.0'}
                {...props}
            >

                <Container maxWidth={'xl'} sx={{
                    width: '95vw',
                    marginLeft: ['55px', '55px', '55px'],
                    maxWidth: [ 'inherit', '100%', '100%'],
                    height: '100%'
                }}>

                    <Grid container spacing={1}>

                        {
                            storeClassesAppAttributeExpress &&

                            <Grid sx={{ }} item xl={12} xs={12}
                                  md={12}>

                                <h3 style={{ textAlign: 'center' }}>Report Manager</h3>

                                <DataGrid id="gridAttributeClass"
                                          ref={gridExtremeAppAttributeClass}
                                          style={{
                                              zIndex: 0,
                                              overflow: 'scroll',
                                              marginRight: '30px',
                                              marginBottom: '10px'
                                          }}
                                          onRowInserted={onRowInserted}
                                          onRowUpdated={onRowUpdated}
                                          focusedRowEnabled={true}
                                          dataSource={storeClassesAppAttributeExpress}
                                          rowAlternationEnabled={true}
                                          showRowLines={true}
                                          showBorders={true}
                                          selectedRowKeys={selectedItemKeys}
                                          allowColumnReordering={true}
                                          allowColumnResizing={true}
                                          columnAutoWidth={true}
                                          remoteOperations={true}
                                          wordWrapEnabled={true}
                                          onExporting={onExporting}
                                          syncLookupFilterValues={false}
                                          dateSerializationFormat={'yyyy-MM-dd'}
                                >
                                    <Selection mode="single"
                                               allowSelectAll={false}
                                    />

                                    <FilterRow visible={showFilterRow}
                                               applyFilter={currentFilter}
                                    />

                                    <RemoteOperations/>

                                    {/*<Grouping autoExpandAll={false} />*/}

                                    {/*<GroupPanel visible={true} />*/}

                                    {/*<HeaderFilter visible={true} allowSearch={true}/>*/}

                                    {/*<SearchPanel visible={true} />*/}

                                    <Editing
                                        mode="batch"
                                        allowUpdating={true}
                                        allowAdding={true}
                                        allowDeleting={true}/>

                                    {/*<Column*/}
                                        {/*dataField={'report_id'}*/}
                                        {/*fixed={true}*/}
                                        {/*caption={'Report Ids'}*/}

                                        {/*headerCellRender={renderTitleHeader}*/}
                                        {/*alignment="left"*/}
                                        {/*allowFiltering={true}*/}
                                        {/*allowEditing={false}*/}
                                        {/*allowSorting={true}*/}
                                        {/*filterOperations={['contains']}*/}
                                        {/*dataType={'string'}*/}
                                        {/*// calculateFilterExpression={*/}
                                    {/*>*/}
                                    {/*</Column>*/}

                                    <Column
                                        dataField={'report_name'}
                                        fixed={true}
                                        caption={'Report Name'}

                                        headerCellRender={renderTitleHeader}
                                        alignment="left"
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
                                        dataField={'layout_id'}
                                        fixed={true}
                                        caption={'Layout Id'}

                                        headerCellRender={renderTitleHeader}
                                        alignment="left"
                                        allowFiltering={true}
                                        allowEditing={true}
                                        allowSorting={true}
                                        filterOperations={['=']}
                                        // cellRender={ renderGridCellFacilityName }
                                        allowGrouping={false}
                                        dataType={'integer'}
                                        // calculateFilterExpression={
                                        //     (filterValue, selectedFilterOperation, target) => {
                                        //         return calculateFilterExpressiongeneric(filterValue, selectedFilterOperation, target, (v.lk_display && !v.get_lookup) ? v.lk_display : v.field_name );
                                        //     }
                                        // }
                                    >
                                            <Lookup
                                                dataSource={reportLayout}
                                                valueExpr="ReportId"
                                                displayExpr="DisplayName"
                                            />
                                     </Column>

                                    <Column
                                        dataField={'created_at'}
                                        fixed={true}
                                        caption={'Created at'}

                                        headerCellRender={renderTitleHeader}
                                        alignment="left"
                                        allowFiltering={true}
                                        allowEditing={false}
                                        allowSorting={true}
                                        filterOperations={['=']}
                                        // cellRender={ renderGridCellFacilityName }
                                        allowGrouping={false}
                                        dataType={'date'}
                                        // calculateFilterExpression={
                                        //     (filterValue, selectedFilterOperation, target) => {
                                        //         return calculateFilterExpressiongeneric(filterValue, selectedFilterOperation, target, (v.lk_display && !v.get_lookup) ? v.lk_display : v.field_name );
                                        //     }
                                        // }
                                    ></Column>

                                    <Column
                                        dataField={'updated_at'}
                                        fixed={true}
                                        caption={'Updated at'}

                                        headerCellRender={renderTitleHeader}
                                        alignment="left"
                                        allowFiltering={true}
                                        allowEditing={false}
                                        allowSorting={true}
                                        filterOperations={['=']}
                                        // cellRender={ renderGridCellFacilityName }
                                        allowGrouping={false}
                                        dataType={'date'}
                                    ></Column>

                                    {/*<Scrolling rowRenderingMode='virtual' />*/}

                                    <Paging defaultPageSize={10}/>

                                    <Pager
                                        visible={true}
                                        allowedPageSizes={true}
                                        displayMode={'full'}
                                        showPageSizeSelector={true}
                                        showInfo={true}
                                        showNavigationButtons={true} />

                                </DataGrid>

                            </Grid>

                        }

                    </Grid>

                </Container>

            </AuthenticatedLayout>

        </React.Fragment>

    );

}