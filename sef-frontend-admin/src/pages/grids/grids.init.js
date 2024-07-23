import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import {GridManager} from "./gridManager";

export function GridsComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <GridManager
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

