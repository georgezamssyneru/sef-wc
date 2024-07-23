import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import { AppVersion } from './appVersion';

export function AppVersionComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <AppVersion
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

