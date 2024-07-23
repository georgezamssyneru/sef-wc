import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import {ReportingManager} from "./reportingManager";

export function ReportingManagerComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <ReportingManager
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

