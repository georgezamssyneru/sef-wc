import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import { Providers } from './providers';

export function DataManagerProviders( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <Providers
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

