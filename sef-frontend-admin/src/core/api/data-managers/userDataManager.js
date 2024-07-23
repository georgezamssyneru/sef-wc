import { Api } from '../api';

const sanctumCsrfToken = () => {
    const url = `${ process.env.REACT_APP_BACKEND_URL_BASE }/sanctum/csrf-cookie`;
    return Api.get(
        url,
        {
            credentials: 'include'
        }
    );
};

/**
 * Test endpoint
 * @returns {*}
 */
const usersWithRoles = ( sort ) => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/users/usersWithRoles?${sort}`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};

/**
 *
 * @param userSearch
 * @returns {*}
 */
const usersSearchWithRoles = ( userSearch ) => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/users/usersSearch?userSearch=${userSearch}`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};

/**
 *
 * @param sort
 * @returns {*}
 */
const getRoles = ( sort ) => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/users/getRoles`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};

/**
 *
 * @returns {*}
 */
const getUserStatus = (  ) => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/getUserStatus`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};


/**
 * Assign status on user
 * @param status
 */
const assignStatus = ( status ) =>{

    const url = `${process.env.REACT_APP_BACKEND_URL}/assignUserStatus`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify( status ),
            headers: { 'Content-Type': 'application/json' },
        }
    );

}

export const userDataManager = {
    usersWithRoles, assignStatus, getRoles, usersSearchWithRoles, getUserStatus };

export default userDataManager;