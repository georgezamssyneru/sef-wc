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
    Button as ButtonMat,
    Stack,
    TextField
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
import Select from 'react-select';
import DataGrid, {
    Button,
} from 'devextreme-react/data-grid';
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";
import CloseIcon from '@mui/icons-material/Close';
import {RolesToUser} from "../../shared/components/Role Manager/rolesToUser";
import AddIcon from '@mui/icons-material/Add';
import {useForm, Controller} from 'react-hook-form';
import LoadingButton from '@mui/lab/LoadingButton';
import { TreeList, Column, Selection } from 'devextreme-react/tree-list';
import SelectBox from 'devextreme-react/select-box';

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
        padding: '5px !important',
    },
    title: {
        textAlign: 'center',
    },
    loginBtn: {
        margin: '5px 0 0 0'
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
 * DASHBOARD COMPONENT
 * @param props
 * @returns {*}
 * @constructor
 */
export function RoleManager(props) {

    const MySwal = (withReactContent(Swal)) ? withReactContent(Swal) : null;

    const classes = useStyles();

    const {register, handleSubmit, formState: {errors}, control} = useForm();

    const [backdropLoadingLoader, setBackdropLoadingLoader] = React.useState(false);

    const [options, setOptions] = React.useState([]);

    const [roleStructure, setRoleStructure] = React.useState([]);

    const [roleTypes, setRoleTypes] = React.useState([]);

    const [ selectedRole, setSelectedRole ] = React.useState();

    const [ isGroup, setIsGroup ] = React.useState({});

    const [open, setOpen] = React.useState(false);

    const [fullWidth, setFullWidth] = React.useState(true);

    const [loading, setLoaded] = React.useState(false);

    React.useEffect(() => {

         //  ------- ROLE STRUCTURE
         securedDataManager.getRoleStructure()
            .then((data) => {

                if(data.success){
                    setRoleStructure(data.structure);
                }

            })
            .catch((e) => {
                console.log(e);
                throw new Error('No data.');
            });

         //  ------- GET ROLE TYPES
         securedDataManager.getRoleTypes().then((data) => {

                if(data.success){

                    let allRoleTypes = [];

                    let getAll = data.data.map((roleI,i) =>{

                        let roleId = { value: roleI['role_type_id'], label: roleI['role_type_name'] }

                        return roleId;

                    });

                    setRoleTypes(getAll);

                }

         });

         //  ------- GET ROLES
         securedDataManager.getRoles()
            .then((data) => {

                let getAllRoles = [];

                data.data.map(( role, index ) => {

                    let temp = {
                        value: role.role_id,
                        label: role.role_name
                    }

                    getAllRoles.push( temp );

                });

                setOptions( getAllRoles );

            })
            .catch((e) => {
                console.log(e);
                throw new Error('No data.');
            });

    }, []);

    //  ------- GET ROLES
    //  ------- RERUN STRUCTURE
    const reRunStructureTree = () => {

        //  ------- ROLE STRUCTURE
        securedDataManager.getRoleStructure()
            .then((data) => {

                if(data.success){
                    setRoleStructure(data.structure);
                }

            })
            .catch((e) => {
                console.log(e);
                throw new Error('No data.');
            });

    }

    const handleClickOpen = () => {

        if(selectedRole || isGroup.isGroup){
            setOpen(true);
        }else{
            MySwal.fire({
                title: <strong>Select the group or role.</strong>,
                html:  <strong>You need to select the group or role to create a role.</strong>,
                icon: 'error'
            });
        }

    };

    const handleClose = () => {
        setOpen(false);
    };


    let loadStore = () =>{

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

    const handleChangeViewer = (event) => {

        setSelectedRole(event.value)

    };

    /**
     * ASSIGN ROLE TO USER
     * @param data
     */
    const onSubmit = (data) => {

        setLoaded(false);

        const found = roleStructure.find(element => element.role_id == selectedRole);

        if(data.role_name){
            return securedDataManager.createRole({
                'role_name': data.role_name,
                'isGroup' : ( isGroup.isGroup ) ? true : false,
                'role_type_id': ( isGroup.isGroup ) ? isGroup.groupId : null,
                'parent_role' : ( !isGroup.isGroup ) ? found.Head_ID : null,
                'role_id': selectedRole
            }).then((data) => {

                setOpen(false);

                setLoaded(false);

                if(data.success){

                    reRunStructureTree();

                    return securedDataManager.getRoles()
                        .then((data) => {

                            let getAllRoles = [];

                            data.data.map(( role, index ) => {

                                let temp = {
                                    value: role.role_id,
                                    label: role.role_name
                                }

                                getAllRoles.push( temp );

                            });

                            setOptions( getAllRoles );

                        })
                        .catch((e) => {
                            console.log(e);
                            throw new Error('No data.');
                        });

                }

            });
        }

    };

    const expandedRowKeys = [0];

    let selectionChanged = (data) => {

        console.log('selected', data.selectedRowKeys[0]);

        if(!data.selectedRowKeys)
            return;

        if(data.selectedRowKeys.length > 0){

            //  -------------   CHECK IF PROPER UUID
            const regexExp = /^[0-9a-fA-F]{8}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{12}$/gi;

            if(regexExp.test(data.selectedRowKeys[0])){
                setIsGroup({
                    isGroup: false,
                    groupId: null
                });
                setSelectedRole(data.selectedRowKeys[0])
            }else{
                setIsGroup({
                    isGroup: true,
                    groupId: data.selectedRowKeys[0]
                });
            }

        }

    };

    //  ----------------------- STYLING
    const customStyles = {
        control: base => ({
            ...base,
            height: 35,
            minHeight: 35
        })
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

                <Grid container spacing={2}>
                    <Grid sx={{ marginTop: '60px'}} item xs={3}>

                        <TreeList
                            id="employees"
                            dataSource={roleStructure}
                            rootValue={-1}
                            defaultExpandedRowKeys={expandedRowKeys}
                            showRowLines={true}
                            showBorders={true}
                            columnAutoWidth={true}
                            keyExpr="role_id"
                            parentIdExpr="Head_ID"
                            onSelectionChanged={selectionChanged}
                        >

                            <Selection mode="single"
                                       allowSelectAll={false}
                            />

                            <Column
                                dataField="role_name"
                                caption="Roles"
                            />

                        </TreeList>

                        {/*<label>Choose your role:</label>*/}
                        {/*<Select options={ options } onChange={ (event) => { handleChangeViewer(event) } } />*/}
                        <ButtonMat fullWidth onClick={ handleClickOpen } sx={{float:'right', marginTop: '20px'}} variant="outlined" startIcon={<AddIcon />}>
                            Create role
                        </ButtonMat>

                    </Grid>
                    <Grid item xs={9}>

                        {   /* --------------------------- FIRE OFF THE COMPOENENT ROLE TO USER    */  }
                        <RolesToUser
                            roleId={selectedRole}
                        />

                    </Grid>

                </Grid>

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

                            <form style={{marginTop: '30px'}} onSubmit={handleSubmit(onSubmit)}>

                                <section>
                                    <label>Role name:</label>
                                    <Controller
                                        name={"role_name"}
                                        control={control}
                                        rules={{ required: true }}
                                        render={(
                                            {
                                                field: { onChange, onBlur, defaultValue, name, ref },
                                                fieldState: { invalid, isTouched, isDirty, error },
                                                formState
                                            }) => (
                                            <TextField
                                                onChange={onChange}
                                                value={defaultValue}
                                                className={classes.texInput}
                                                type="text"
                                            />
                                        )}
                                    />
                                    { errors.role_name?.type === 'required' &&
                                    <div className={ classes.error }>Role name is required.</div>
                                    }
                                </section>

                                {!loading &&
                                <Stack sx={{mt: 3}} direction="row" spacing={2}>
                                    <ButtonMat type="submit" className={classes.loginBtn} variant="outlined" fullWidth>CREATE ROLE</ButtonMat>
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
                    <DialogActions>
                        <Button onClick={handleClose}>Close</Button>
                    </DialogActions>
                </Dialog>
            </section>

        </AuthenticatedLayout>
    );

}
