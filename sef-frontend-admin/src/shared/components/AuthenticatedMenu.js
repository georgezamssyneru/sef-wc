import React from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { localStorageAccess, sessionCookieAccess } from '../../core/security';
import { Navigate, useNavigate, Link, useLocation } from 'react-router-dom';

import Paper from '@mui/material/Paper';
import MenuList from '@mui/material/MenuList';
import MenuItem from '@mui/material/MenuItem';
import CottageIcon from '@mui/icons-material/Cottage';
import LogoutIcon from '@mui/icons-material/Logout';
import Menu from '@mui/material/Menu';
import { styled, useTheme } from '@mui/material/styles';
import Box from '@mui/material/Box';
import MuiDrawer from '@mui/material/Drawer';
import MuiAppBar from '@mui/material/AppBar';
import Toolbar from '@mui/material/Toolbar';
import List from '@mui/material/List';
import CssBaseline from '@mui/material/CssBaseline';
import Typography from '@mui/material/Typography';
import Divider from '@mui/material/Divider';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';
import ChevronLeftIcon from '@mui/icons-material/ChevronLeft';
import ChevronRightIcon from '@mui/icons-material/ChevronRight';
import ListItem from '@mui/material/ListItem';
import ListItemIcon from '@mui/material/ListItemIcon';
import ListItemText from '@mui/material/ListItemText';
import Avatar from '@mui/material/Avatar';
import Tooltip from '@mui/material/Tooltip';
import InboxIcon from '@mui/icons-material/MoveToInbox';
import MailIcon from '@mui/icons-material/Mail';
import Settings from '@mui/icons-material/Settings';
import Logout from '@mui/icons-material/Logout';
import DashboardIcon from '@mui/icons-material/Dashboard';
import AssessmentIcon from '@mui/icons-material/Assessment';
import AdminPanelSettingsIcon from '@mui/icons-material/AdminPanelSettings';
import {authActions, getUserSelector} from "../../store/auth";

import {createUseStyles} from 'react-jss';

const drawerWidth = 240;

const theme = '';

/**
 *
 * @param theme
 * @returns {{width: number, transition: string, overflowX: string}}
 */
const openedMixin = (theme) => ({
    width: drawerWidth,
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.enteringScreen,
    }),
    overflowX: 'hidden',
});

/**
 *
 * @param theme
 * @returns {{transition: string, overflowX: string, width: string}}
 */
const closedMixin = (theme) => ({
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen,
    }),
    overflowX: 'hidden',
    width: `calc(${theme.spacing(7)} + 1px)`,
    [theme.breakpoints.up('sm')]: {
        width: `calc(${theme.spacing(9)} + 1px)`,
    },
});

/**
 *
 * @type {StyledComponent<PropsOf<string> & MUIStyledCommonProps<Theme> & {}, {}, {}>}
 */
const DrawerHeader = styled('div')(({ theme }) => ({
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'flex-end',
    padding: theme.spacing(0, 1),
    // necessary for content to be below app bar
    ...theme.mixins.toolbar,
}));

/**
 *
 * @type {StyledComponent<Pick<PropsOf<C>, ForwardedProps> & MUIStyledCommonProps<Theme> & {}, {}, {ref?: React.Ref<InstanceType<C>>}>}
 */
const AppBar = styled(MuiAppBar, {
    shouldForwardProp: (prop) => prop !== 'open',
})(({ theme, open }) => ({
    zIndex: theme.zIndex.drawer + 1,
    transition: theme.transitions.create(['width', 'margin'], {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen,
    }),
    ...(open && {
        marginLeft: drawerWidth,
        width: `calc(100% - ${drawerWidth}px)`,
        transition: theme.transitions.create(['width', 'margin'], {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.enteringScreen,
        }),
    }),
}));

/**
 *
 * @type {StyledComponent<Pick<PropsOf<C>, ForwardedProps> & MUIStyledCommonProps<Theme> & {}, {}, {ref?: React.Ref<InstanceType<C>>}>}
 */
const Drawer = styled(MuiDrawer, { shouldForwardProp: (prop) => prop !== 'open' })(
    ({ theme, open }) => ({
        width: drawerWidth,
        flexShrink: 0,
        whiteSpace: 'nowrap',
        boxSizing: 'border-box',
        ...(open && {
            ...openedMixin(theme),
            '& .MuiDrawer-paper': openedMixin(theme),
        }),
        ...(!open && {
            ...closedMixin(theme),
            '& .MuiDrawer-paper': closedMixin(theme),
        }),
    }),
);

const useStyles = createUseStyles(() => ({

}));

/**
 * AUTHENTICATED MENU
 * @param props
 * @returns {*}
 * @constructor
 */
export function AuthenticatedMenu( props ) {

    const [anchorEl, setAnchorEl] = React.useState(null);

    const classes = useStyles();
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const location = useLocation();

    const [open, setOpen] = React.useState(false);
    const [menuClicked, setMenuClicked] = React.useState();
    const openSmall = Boolean(anchorEl);

    const userSelector = useSelector( getUserSelector );

    React.useEffect(function () {

        // console.log('location --->', location);
        //
        // console.log('---> menu', props.menu);

    });

    const handleClose = () => {
        setAnchorEl(null);
    };

    const handleDrawerOpen = () => {
        setOpen(true);
    };

    const handleDrawerClose = () => {

        ( open ) ? setOpen(false) : setOpen(true);
        //setOpen(false);
    };

    const settingMenuClick = ( setting ) => {

        switch(setting) {
            case 'logout':
                sessionCookieAccess.logout();
                //  REMOVE TOKEN ON LOGOUT
                localStorage.removeItem('auth');
                dispatch( authActions.setLoggedIn(false) );
                navigate('/', { replace: true });
                break;
        }

    }

    //  --------------------
    //  --------------------    TAKE ADMIN TO ADMIN AREA
    //  --------------------
    const goToAdmin = () => {

        switch(window.location.hostname) {
            case 'localhost':
                window.open('http://10.73.1.3:1338/', '_blank');
                break;
            case 'hipsonline':
                window.open('http://10.73.1.3:1338/', '_blank');
                break;
            case '10.73.1.3':
                window.open('http://10.73.1.3:1338/', '_blank');
                break;
            case '10.73.1.6':
                window.open('http://10.73.1.6:1338/', '_blank');
                break;
            default:
                window.open('http://10.73.1.3:1338/', '_blank');
                break;

        }

    };

    const handleClick = (event) => {
        setAnchorEl(event.currentTarget);
    };

    return (

        <React.Fragment>

            <Box sx={{ display: 'flex'}}>

                <Drawer sx={{ }} variant="permanent" open={open}>

                    <DrawerHeader sx={{ width: (!open) ? '51%': '51%'}}>

                        { open &&
                        <IconButton onClick={handleDrawerClose}>
                            <ChevronLeftIcon sx={{color: '#CA8F31'}}/>
                        </IconButton>
                        }

                        { !open &&
                        <MenuIcon sx={{ cursor: 'pointer', color: '#CA8F31'}}  onClick={handleDrawerClose} />
                        }

                    </DrawerHeader>

                    {

                        <List sx={{ }}>
                            {/* -------------- PRINT OUT THE AUTHENTICATED MENU */ }
                            {props.menu.map((menu, i) => (
                                <Link style={{ color: 'inherit', textDecoration: 'inherit'}} to={ menu.url }>
                                    <ListItem button key={i} sx={{

                                        backgroundColor: ( location.pathname == menu.url ) ? "#F6F6E8" : 'transparent',

                                    }}>

                                        <ListItemIcon sx={{ color: '#CA8F31', paddingLeft: '5px'}}>
                                            { menu.icon }
                                        </ListItemIcon>

                                        <Link style={{ color: 'inherit', textDecoration: 'inherit'}} to={ menu.url }>
                                            <ListItemText >{menu.displayName}</ListItemText>
                                        </Link>

                                    </ListItem>
                                </Link>
                            ))}

                        </List>
                    }
                    <Divider />
                    <List>
                        {['Logout'].map((text, index) => (
                            <ListItem button key={text}>

                                <ListItemIcon sx={{ color: '#CA8F31', paddingLeft: '5px'}}>
                                    <LogoutIcon onClick={ () => { settingMenuClick('logout') }} fontSize="medium" />
                                </ListItemIcon>

                                <ListItemText id="logout" onClick={ () => { settingMenuClick('logout') } }>Logout</ListItemText>
                            </ListItem>
                        ))}
                    </List>

                    <Box sx={{
                        display: 'flex', alignItems: 'center',
                        textAlign: 'center',
                        flexDirection: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        marginTop: '15px'
                    }}>
                        <Tooltip title="Account settings">
                            <IconButton
                                onClick={handleClick}
                                size="small"
                                sx={{ backgroundColor: '#CA8F31' }}
                                aria-controls={ openSmall ? 'account-menu' : undefined}
                                aria-haspopup="true"
                                aria-expanded={ openSmall ? 'true' : undefined}
                            >
                                <Avatar sx={{
                                    width: 25,
                                    height: 25,
                                    backgroundColor: '#CA8F31'
                                }}>{ userSelector['first_name'][0] + userSelector['last_name'][0]}</Avatar>
                            </IconButton>
                        </Tooltip>
                    </Box>
                    <Menu
                        anchorEl={anchorEl}
                        id="account-menu"
                        open={openSmall}
                        onClose={handleClose}
                        onClick={handleClose}
                        PaperProps={{
                            elevation: 0,
                            sx: {
                                overflow: 'visible',
                                filter: 'drop-shadow(0px 2px 8px rgba(0,0,0,0.32))',
                                mt: 1.5,
                                '& .MuiAvatar-root': {
                                    width: 32,
                                    height: 32,
                                    ml: -0.5,
                                    mr: 1,
                                },
                                '&:before': {
                                    content: '""',
                                    display: 'block',
                                    position: 'absolute',
                                    top: 0,
                                    right: 14,
                                    width: 10,
                                    height: 10,
                                    bgcolor: 'background.paper',
                                    transform: 'translateY(50%) rotate(45deg)',
                                    zIndex: 0,
                                },

                            },
                        }}
                        transformOrigin={{ horizontal: 'right', vertical: 'top' }}
                        anchorOrigin={{ horizontal: 'right', vertical: 'bottom' }}
                    >
                        {/*<MenuItem>*/}
                        {/*<Avatar />*/}
                        {/*</MenuItem>*/}

                        {/*<Divider />*/}

                        {/*<MenuItem>*/}
                        {/*<ListItemIcon>*/}
                        {/*<Settings fontSize="small" />*/}
                        {/*</ListItemIcon>*/}
                        {/*Settings*/}
                        {/*</MenuItem>*/}

                        <MenuItem onClick={ () => { settingMenuClick('logout') } }>
                            <ListItemIcon>
                                <Logout fontSize="small" />
                            </ListItemIcon>
                            Logout
                        </MenuItem>

                    </Menu>

                </Drawer>

                <Box component="main" sx={{
                    flexGrow: 1,
                    paddingTop: '20px',
                    position: 'absolute',
                    left: '10px',
                    ['@media (max-width:780px)']: { // eslint-disable-line no-useless-computed-key
                        left: '0px'
                    },
                    height: '57em',
                    width: '97.8%',
                    //zIndex: '0'
                    //overflow: 'hidden'
                }}>
                    { props.children }
                </Box>

            </Box>

        </React.Fragment>
    );

}