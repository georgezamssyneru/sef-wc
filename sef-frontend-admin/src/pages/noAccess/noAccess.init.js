import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import { NoAccess } from './noAccess';

export function NoAccessComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <NoAccess
                route={ obj['url'] }
                menu={ obj['menu'] }
                description={ obj['description'] }
            />
        }/>
    );
}

