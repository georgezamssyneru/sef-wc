import React from 'react';
import { BrowserRouter as Router, useLocation, Navigate, useNavigate } from 'react-router-dom';
import logo from './logo.svg';
import './App.css';
import { Container, Box } from '@mui/material';
import { localStorageAccess, sessionCookieAccess } from './core/security';
import CircularProgress from '@mui/material/CircularProgress';
import { useDispatch, useSelector } from 'react-redux';
import {authActions, getUserSelector, getLoggedInSelector} from "./store/auth";
import {authDataManager, userDataManager} from "./core/api/data-managers";
import {filterUrlString} from "./shared/helper";
import Cookies from "js-cookie";
import 'devextreme/dist/css/dx.light.css';

const Unauthenticated = React.lazy(() => import('./core/unauthenticated'));
const Authenticated = React.lazy(() => import('./core/authenticated'));

const AppRender = () => {

    const dispatch = useDispatch();

    const location = useLocation();

    const navigate = useNavigate();

    const userSelector = useSelector( getUserSelector );

    const loggedInSelector = useSelector( getLoggedInSelector );

    const [ loaded, setLoaded ] = React.useState(false);

    const [ loggedInuser, setLoggedInUser ] = React.useState(false);

    const [ term, setTerm ] = React.useState(false);

    React.useEffect(() => {

        const queryParams = new URLSearchParams(location.search);
        const term = queryParams.get("loggedOut");

        //  ----------------    RUN IF NOT LOADED OR LOGGEDIN SELECTOR DOES NOT EXIST
        if( loaded === false && !term && loggedInSelector === false ){

            //  SEND API CALL TO GET USERS PROFILE FROM BACKEND
            authDataManager.profile().then(( data ) => {

                //  ------- DONT ALLOW IF ERROR
                if(!data.hasOwnProperty('error')){

                    dispatch( authActions.setAuthDetails(data.user) );

                    dispatch( authActions.setLoggedIn(true) );

                    setLoggedInUser(true);

                }

                //  SET LOADED AND AUTHENTICATED
                setLoaded(true);

            });
        }

        if(term){
            setTerm(term);
            setLoaded(true);
        }

    }, []);

    React.useEffect(() => {

        if(loggedInSelector){
            setLoggedInUser(true);
        }else{
            setLoggedInUser(false);
        }

    }, [loggedInSelector]);

   return (
        <React.Fragment>
            <React.Suspense fallback={
                <CircularProgress style={{position: 'fixed', top: '50%', left: '50%', transform: 'translate(-50%, -50%)'}} disableShrink />
            }>
                {
                    //  LOADED AND LOGGEDIN
                    ( ( loaded && loggedInuser ) &&
                        <Authenticated/>
                    )
                }
                {
                    //  LOADED AND NOT LOGGEDIN
                    ( ((loaded && !loggedInuser ) ) &&
                        <Unauthenticated/>
                    )
                }

                {
                    //  LOADED WITH TERM AND ON HOMEPAGE
                    // ( ( loaded && term && location.pathname === '/' ) &&
                    //     <Unauthenticated/>
                    // )
                }

                {
                    //  LOADING....
                    ( (!loaded) &&
                        <CircularProgress style={{position: 'fixed', top: '50%', left: '50%', transform: 'translate(-50%, -50%)'}} disableShrink />
                    )
                }

                {/*{ ( sessionCookieAccess.isLoggedIn() && Object.keys( userSelector ).length > 0  )  ? <Authenticated/> : <Unauthenticated/> }*/}
            </React.Suspense>
        </React.Fragment>
    );

};

function App() {

  return (
      <Router>
        <AppRender />
      </Router>
  );
}

export default App;
