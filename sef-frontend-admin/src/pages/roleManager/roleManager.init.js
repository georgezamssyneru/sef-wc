import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import { RoleManager } from './roleManager';

export function RoleManagerComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <RoleManager
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}
