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
export function GridAttributeManager(props) {

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
    const [selectedItemKeys, setSelectedItemKeys] = React.useState([]);
    const [lookUpAttributeIds, setLookUpAttributeIds] = React.useState([]);

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

        if(props.gridId)
            runStoreAppGridAttribute();

    }, [props]);

    //  ----------------    GET CLASS ATTRIBUTES FOR LOOKUP
    React.useEffect(() => {

        authDataManager.getGridAttributeFromClassAttribute({ classId : props.gridId.class_id }).then((data) => {

            //  -------------   PLACE LOOKUPS FOR ATTRIBUTES
            if(data.success)
                setLookUpAttributeIds( data.data );

        });

    }, [props.gridId.class_id]);

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
        runStoreAppGridAttribute();

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
    const runStoreAppGridAttribute = () => {

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
            params += `gridId=${ JSON.stringify( props.gridId['grid_id'] ) }&`;

            params.slice(0, -1);

            return params;

        };

        //  --------------------
        //  --------------------    CUSTOM STORE FOR DATAGRID
        //  --------------------
        const storeAppGridAttribute = new CustomStore({
            key: 'grid_attribute_id',
            cacheRawData: false,
            insert: (values) => {

                //  CREATE NEW CLASS ID.
                // values['attribute_id'] = uuidv4();

                values['grid_id'] = props.gridId['grid_id'];

                //  ----------------    CREATE APP CLASS
                return authDataManager.createAppGridAttribute(values).then((data) => {

                });

            },
            update: (key, values) => {

                return authDataManager.putGridEditingAppGridAttributeClass(key, values).then((data) => {

                }).finally(() => {

                });

            },
            remove: (key) => {


                //  DELETE GRID
                return authDataManager.deleteGridAppGridAttribute(key).then((data) => {

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

                return authDataManager.getGridAppGridAttribute(loadOptions.isLoadingAll
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

        setStoreClassesAppAttributeExpress(storeAppGridAttribute);

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

            <Grid container spacing={1}>

                <Grid sx={{  marginTop: '10px'}} item xl={12} xs={12}
                      md={12}>

                    <h3 style={{ textAlign: 'center' }}>GRID ATTRIBUTES</h3>

                    {
                        storeClassesAppAttributeExpress &&

                        <Grid sx={{background: '#ECECEC', marginTop: '10px'}} item xl={12} xs={12}
                              md={12}>

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
                                      onSelectionChanged={selectionChanged}
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

                                <Column
                                    dataField={'display_name'}
                                    fixed={true}
                                    caption={'Display Name'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="left"
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
                                    dataField={'grid_id'}
                                    fixed={false}
                                    caption={'Grid Id'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="left"
                                    allowFiltering={true}
                                    allowEditing={false}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    // cellRender={ renderGridCellFacilityName }
                                    allowGrouping={false}
                                    dataType={'string'}
                                    // calculateFilterExpression={
                                    //     (filterValue, selectedFilterOperation, target) => {
                                    //         return calculateFilterExpressiongeneric(filterValue, selectedFilterOperation, target, (v.lk_display && !v.get_lookup) ? v.lk_display : v.field_name );
                                    //     }
                                    // }
                                ></Column>

                                <Column
                                    dataField={'attribute_id'}
                                    fixed={false}
                                    caption={'Attribute Id'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="left"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    // cellRender={ renderGridCellFacilityName }
                                    allowGrouping={false}
                                    dataType={'string'}
                                    // calculateFilterExpression={
                                    //     (filterValue, selectedFilterOperation, target) => {
                                    //         return calculateFilterExpressiongeneric(filterValue, selectedFilterOperation, target, (v.lk_display && !v.get_lookup) ? v.lk_display : v.field_name );
                                    //     }
                                    // }
                                >
                                    <Lookup
                                        dataSource={lookUpAttributeIds}
                                        valueExpr="attribute_id"
                                        displayExpr="display_name"
                                    />
                                </Column>

                                <Column
                                    dataField={'sort_order'}
                                    fixed={false}
                                    caption={'Sort Order'}
                                    sortOrder={'asc'}
                                    width={100}
                                    headerCellRender={renderTitleHeader}
                                    alignment="left"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'number'}
                                    // calculateFilterExpression={
                                >
                                    <RequiredRule/>
                                </Column>

                                <Column
                                    dataField={'filteroptions'}
                                    fixed={false}
                                    caption={'Filter Options'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="left"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'string'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'width'}
                                    fixed={false}
                                    caption={'Width'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="left"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'number'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'allow_sorting'}
                                    fixed={false}
                                    caption={'Allow Sorting'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'allow_filtering'}
                                    fixed={false}
                                    caption={'Allow Filtering'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'allow_grouping'}
                                    fixed={false}
                                    caption={'Allow Grouping'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'get_lookup'}
                                    fixed={false}
                                    caption={'Get LookUp'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'is_pinned'}
                                    fixed={false}
                                    caption={'is Pinned'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                <Column
                                    dataField={'allow_edit'}
                                    fixed={false}
                                    caption={'Allow Edit'}
                                    width={200}
                                    headerCellRender={renderTitleHeader}
                                    alignment="center"
                                    allowFiltering={true}
                                    allowEditing={true}
                                    allowSorting={true}
                                    filterOperations={['=']}
                                    dataType={'boolean'}
                                    // calculateFilterExpression={
                                >
                                </Column>

                                {/*<Scrolling mode="virtual" rowRenderingMode="virtual"/>*/}

                                <Paging defaultPageSize={10}/>

                                <Pager
                                    visible={true}
                                    allowedPageSizes={true}
                                    displayMode={'full'}
                                    showPageSizeSelector={true}
                                    showInfo={true}
                                    showNavigationButtons={true} />

                                {/*<Export enabled={true}*/}
                                {/*allowExportSelectedData={true}*/}
                                {/*//excelFilterEnabled={true}*/}
                                {/*/>*/}

                            </DataGrid>

                        </Grid>

                    }

                </Grid>

            </Grid>

        </React.Fragment>

    );

}