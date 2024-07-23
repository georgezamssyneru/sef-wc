import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';
import { Login } from './login';

export const loginRoutes = (

    <Route key={"login_route"} exact path={ROUTES.HOME} element={<Login/>}/>

);