import React from 'react';
import { Routes, Route } from 'react-router-dom';
import { ROUTES } from '../../core/router';

import {FormManager} from "./formManager";

export function FormsComponent( obj ){

    return(
        <Route key={ obj['key'] } exact path={ obj['url'] } element={
            <FormManager
                route={ obj['url'] }
                menu={ obj['menu'] }
                compId={ obj['app_component_id'] }
            />
        }/>
    );
}

