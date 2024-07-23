import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import { Reporting } from './reporting';

export function ReportingComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <Reporting
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

