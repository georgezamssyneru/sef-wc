import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import {DashboardTree} from "./dashboardTree";

export function DashboardTreeComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <DashboardTree
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

