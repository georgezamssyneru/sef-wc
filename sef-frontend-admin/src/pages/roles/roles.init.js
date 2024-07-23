import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import { Roles } from './roles';

export function RolesComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <Roles
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

