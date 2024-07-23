import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';
import { Register } from './register';

export const register = (

    <Route key={"register_route"} exact path={ROUTES.REGISTER} element={<Register/>}/>

);