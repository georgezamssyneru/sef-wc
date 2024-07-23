import { Api } from '../api';

/**
 * Authentication Tree for components on authenticated user
 * @returns {*}
 */
const getUserWithRoles = ( userSearch ) => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/getUsersWithRoles?userSearch=${userSearch}`;
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
const getPermissionsByRole = ( role_id ) => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/getPermissionsByRole?role_id=${role_id}`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};

/*** REGISTER */
const assignRoles = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/assignRoles`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

export const rolesDataManager = {
    getUserWithRoles,
    assignRoles,
    getPermissionsByRole
};
export default rolesDataManager;