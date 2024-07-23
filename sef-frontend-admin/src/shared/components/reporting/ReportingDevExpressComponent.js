import React, {useEffect, useState, useRef} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider,
    Card,
    CardActions,
    CardContent,
    CardMedia,
    Grid,
    Stack,
    Skeleton
} from '@mui/material';
import {createUseStyles} from 'react-jss';
import Select from 'react-select'
import AsyncSelect from "react-select/async";
import Swal from 'sweetalert2';
import withReactContent from 'sweetalert2-react-content';
import ko from 'knockout';
import 'devexpress-reporting/dx-reportdesigner';
import 'devexpress-reporting/dx-webdocumentviewer';
import '../../../App.css';
import {authDataManager} from "../../../core/api/data-managers";


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
export function ReportingDevExpressComponent(props) {

    const [reportsViewer, setReportsViewer] = React.useState([]);

    const [showSkeleton, setShowSkeleton ] = React.useState( true );

    const [requestOptionsAdmin, setRequestOptionsAdmin] = React.useState({
        host: `${process.env.REACT_APP_REPORT_DESIGNER}/`,
        getDesignerModelAction: "DXXRD/GetDesignerModel"
    });

    const [requestOptionsUser, setRequestOptionsUser] = React.useState({
        host: `${process.env.REACT_APP_REPORT_VIEWER}/`,
        invokeAction: "DXXRDV"
    });

    let reports = useRef(null);

    let viewer = useRef(null);

    const options = [
        { value: 'Demo', label: 'Demo' },
        { value: 'Report1_beds_test', label: 'Report1_beds_test' },
        { value: 'Report1_test', label: 'Report1_test' },
        { value: 'Parameter_demo', label: 'Parameter_demo' }
    ]

    React.useEffect(() => {

        let objectBuild = JSON.stringify({
            'report': 'Demo',
            'param1': 'test1',
            'param2': 'test2'
        });

        ko.cleanNode(reports.current);

        ko.applyBindings({
                reportUrl: ko.observable(objectBuild),
                requestOptions: requestOptionsAdmin
            },
            reports.current);

    }, []);

    /**
     *
     * @param event
     */
    const handleChangeViewer = (event) => {

        // if(event.target.value === '')
        //     return;
        //
        // setState({value: event.target.value});
        //
        // ko.cleanNode(viewer.current);
        //
        // // setReportUrluser( ko.observable(event.target.value) );
        //
        // ko.applyBindings({
        //     reportUrl: ko.observable(event.target.value),
        //     requestOptions: requestOptionsUser
        // }, viewer.current);

        if(event.value === '')
            return;

        ko.cleanNode(viewer.current);

        ko.applyBindings({
            reportUrl: ko.observable(event.value),
            requestOptions: requestOptionsUser
        }, viewer.current);

    };

    /**
     *
     * @param event
     */
    const handleChangeViewerAdmin = (event) => {

        if(event.value === '')
            return;

        let objectBuild = JSON.stringify({
            'report': event.value,
            'param1': 'test1',
            'param2': 'test2'
        })

        ko.cleanNode(reports.current);

        ko.applyBindings({
                reportUrl: ko.observable(objectBuild),
                requestOptions: requestOptionsAdmin
            },
            reports.current);

    };

    /**
     * -------- VIEWER CALLBACK
     */
    const viewerCallback = ( s, e ) => {

        console.log('----------> CALLBACK E');
        console.log(e);

        console.log('----------> CALLBACK S');
        console.log(s);

    };

    /**
     * handleSubmit
     * @param event
     */
    const handleSubmit = (event) => {

        event.preventDefault();

    };

    return (
        // AUTHENTICATED LAYOUT
        <Container maxWidth={'xl'} sx={{
            width: '98vw',
            paddingLeft: ['38px', '38px', '38px'],
            maxWidth: [ 'inherit', '100%', '100%'],
            height: '100%'
        }}>

            <Box sx={{ marginLeft: ['0px', '30px', '30px']}}>

                <Grid container spacing={2}>
                    <Grid item xs={12}>
                        <div style={{ width: "100%", height: "800px" }} ref={reports}  data-bind="dxReportDesigner: $data">

                        </div>
                    </Grid>
                </Grid>

            </Box>

        </Container>
    );

}
