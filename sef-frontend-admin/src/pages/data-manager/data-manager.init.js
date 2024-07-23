import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import {DataManager} from "./data-manager";

export function DataManagerComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <DataManager
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

