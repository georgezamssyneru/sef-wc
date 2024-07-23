import { call, put, takeLatest } from 'redux-saga/effects'
import { getProfile } from '../shared/service'
import { useNavigate, Link, useLocation } from 'react-router-dom';

/**
 * Authentication Process
 * @param {*} action
 */
function* getAuthUser() {

    //  MAKE THE CALL TO BACKEND
    const data = yield call( getProfile, null );

    if( data.success ){

        if( data.user ){

            //  PLACE LOADING TO TRUE
            yield put({ type: `auth/setAuthDetails`, payload: data.user });

        }

    }

}

function* fetchProfile() {
    yield call( getAuthUser, null);
}

export {
    fetchProfile
}