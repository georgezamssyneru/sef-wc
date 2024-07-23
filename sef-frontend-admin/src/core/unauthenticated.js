import React from 'react';
import { Routes, Redirect, Route, Navigate } from 'react-router-dom';

import { loginRoutes } from '../pages/login';
import {NotFound} from "../pages/404/notFound";

function Unauthenticated(){
    return (
        <Routes>
            <React.Fragment>
                {/* ALLOWED ROUTES AND COMPONENTS TO LOAD IF NOT AUTHENTICATED */}
                { [ loginRoutes ] }

                {/* NOT FOUND ROUTE PATH AND COMPONENT */}
                <Route path="*" element={ <NotFound/> } />
            </React.Fragment>
        </Routes>
    );
}

export default Unauthenticated;
