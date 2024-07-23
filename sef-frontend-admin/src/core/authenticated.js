import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
import {Routes, Navigate, Route} from 'react-router-dom';
import DashboardIcon from '@mui/icons-material/Dashboard';
import AssessmentIcon from '@mui/icons-material/Assessment';
import AdminPanelSettingsIcon from '@mui/icons-material/AdminPanelSettings';
import LockOpenIcon from '@mui/icons-material/LockOpen';
import LibraryBooksIcon from '@mui/icons-material/LibraryBooks';
import Grid4x4Icon from '@mui/icons-material/Grid4x4';
import AddchartIcon from '@mui/icons-material/Addchart';
//  Protected Route Components
import { DataManagerComponent } from '../pages/data-manager';
import { BackupComponent } from '../pages/backup';
import { DataManagerProviders } from '../pages/data-manager-providers';
import { RolesComponent } from '../pages/roles';
import {NotFound} from "../pages/404/notFound";
import {authDataManager} from "./api/data-managers";
import { authActions, getUserSelector } from '../store/auth';
import { useLocation } from 'react-router-dom';
import ManageHistoryIcon from '@mui/icons-material/ManageHistory';
import PermDataSettingIcon from '@mui/icons-material/PermDataSetting';
import {
    Container,
    Typography,
    Button,
    Box,
    CircularProgress,
    TextField,
    Divider
} from '@mui/material';
import {NoAccessComponent} from "../pages/noAccess";
import {useNavigate} from "react-router-dom";
import {ReportingComponent} from "../pages/reporting";
import {ClassesComponent} from "../pages/classes";
import {GridsComponent} from "../pages/grids";
import {FormsComponent} from "../pages/forms";
import {AppVersionComponent} from "../pages/appVersion";
import {RoleManagerComponent} from "../pages/roleManager";
import {DashboardTreeComponent} from "../pages/dashboardTree";
import CloseFullscreenIcon from '@mui/icons-material/CloseFullscreen';
import BackupIcon from '@mui/icons-material/Backup';
import AssignmentIcon from '@mui/icons-material/Assignment';
import {ReportingManagerComponent} from "../pages/reportingManager";

function Authenticated(){

    const location = useLocation();

    const navigate = useNavigate();

    const userSelector = useSelector( getUserSelector );

    //  ------- ICON COMPONENTS {PLACE HERE}
    //  IF YOU PLACE NEW ICONDS FROM DATABASE BE SURE TO LOAD THE COMPONENT HERE
    const iconComponents = {
        dashboard: <DashboardIcon/>,
        map: <AssessmentIcon/>,
        userManager: <AdminPanelSettingsIcon/>,
        roles: <LockOpenIcon/>,
        reporting: <AddchartIcon/>,
        classes: <LibraryBooksIcon />,
        grids: <Grid4x4Icon />,
        appVersion: <ManageHistoryIcon />,
        dataManager: <PermDataSettingIcon />,
        roleManager: <CloseFullscreenIcon />,
        backupManager: <BackupIcon />,
        formsManager: <AssignmentIcon />,
        reportsManager: <AssessmentIcon />,
        dashboardTree: <DashboardIcon />
    };

    //  ------- MAIN COMPONENTS {PLACE HERE}
    //  LAOD THE COMPONENT THA COMES FROM SERVICE
    const mainComponents = ( comp, params ) => {

        if(!comp){
            return;
        }

        //  --------------  SWITCH TO HOOK REACT COMPONENT TO APP FRO DB
        switch(comp) {
            case 'userManager':
                return DataManagerComponent( params );
                break;
            case 'dataManager':
                return DataManagerProviders( params );
                break;
            case 'backupManager':
                return BackupComponent( params );
                break;
            case 'roleManager':
                return RoleManagerComponent( params );
                break;
            case 'roles':
                return RolesComponent( params );
                break;
            case 'reporting':
                return ReportingComponent( params );
                break;
            case 'noAccess':
                return NoAccessComponent({ key: 'noaccess', url: '/noaccess', menu: [], description: 'You have not been granted access.'});
                break;
            case 'emailNotVerified':
                return NoAccessComponent({ key: 'noaccess', url: '/noaccess', menu: [], description: 'You have not verified your email, please verify and login again.'});
                break;
            case 'classes':
                return ClassesComponent( params );
                break;
            case 'grids':
                return GridsComponent( params );
                break;
            case 'formsManager':
                return FormsComponent( params );
                break;
            case 'reportsManager':
                return ReportingManagerComponent( params );
                break;
            case 'appVersion':
                return AppVersionComponent( params );
                break;
            case 'dashboardTree':
                return DashboardTreeComponent( params );
                break;
            case 'notFound':
                return NotFound;
                break;
        }

    };

    const [menu, setMenu] = React.useState([]);

    const [allowedComponents, setCreateEdit] = React.useState({
        allowed: [],
        message: null,
        error: false,
        loaded: false
    });

    React.useEffect(() => {

        //  ------- API CALL TO GET TREE VIEW OF THE USER FROM SERVICE
        authDataManager.tree().then(( data ) => {

            //  ----------  EMAIL NOT VERIFIED
            if( !userSelector.email_verified_at ){

                //  ------- LOAD ALLOWED COMPONENTS
                setCreateEdit({
                    allowed: [ mainComponents('emailNotVerified', null) ],
                    message: null,
                    error: false,
                    loaded: true
                });

                return;
            }

            let allowedComponents= [];

            let tempMenu = data.data;

            if( tempMenu ){

                //  ------- BUILD MENU
                tempMenu.map(( menu, index ) => {

                    let changeToComponent = iconComponents[ menu['icon'] ] ;

                    tempMenu[index]['icon'] = changeToComponent;

                });

                //  --------- ORDER MENU COMPONENTS
                tempMenu.sort(function(a, b){return a['json_params']['order'] - b['json_params']['order']});

                //  ------- BUILD ALLOWED COMPONENT
                tempMenu.map(( menu, index ) => {

                    //  ------- BUILD ALLOWED COMPONENTS
                    menu['json_params']['menu'] = tempMenu;
                    menu['json_params']['app_component_id'] = menu['app_component_id'];

                    let tempComp = mainComponents( menu['json_params']['key'], menu['json_params'] )

                    if( tempComp ){
                        allowedComponents.push( tempComp );
                    }

                });

            }

            //  ------- LOAD ALLOWED COMPONENTS
            setCreateEdit({
                allowed: ( allowedComponents.length > 0 ) ? allowedComponents : [ mainComponents('noAccess', null) ],
                message: null,
                error: false,
                loaded: true
            });

            if( allowedComponents.length > 0 ){

                const urlNavigate = tempMenu[0]['json_params']['url'];

                //  ---------   GO TO A SECURE PAGE COMPONENT
                //  ----------- IF LOGGED IN AND ON INDEX PAGE GO STRAIGHT TO SECURE PAGE
                if( window.location.pathname === "/"){

                    //  ---------   GO TO A SECURE PAGE COMPONENT
                    navigate( urlNavigate );

                }

            }else{

                //  SHOW NO ACCESS
                navigate( '/noaccess' );

            }

        });

    }, []);

    return (
        <React.Fragment>

            {( allowedComponents['allowed'].length === 0 && !allowedComponents.loaded) &&
            <CircularProgress style={{position: 'fixed', top: '50%', left: '50%', transform: 'translate(-50%, -50%)'}} disableShrink />
            }

            <Routes>
                <React.Fragment>
                    { allowedComponents['allowed'] }
                </React.Fragment>
            </Routes>

        </React.Fragment>
    );

}

export default Authenticated;