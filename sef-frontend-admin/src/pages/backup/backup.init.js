import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import { Backup } from './backup';

export function BackupComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <Backup
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

