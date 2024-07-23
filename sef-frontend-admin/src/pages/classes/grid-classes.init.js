import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import {ClassesManager} from "./classesManager";

export function ClassesComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <ClassesManager
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

