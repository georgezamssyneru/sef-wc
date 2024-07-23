import { Api } from '../api';

/**
 * Authentication Tree for components on authenticated user
 * @returns {*}
 */
const getGridEditing = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridEditing?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getAppVersion = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/version?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const gridAppTreeDashboard = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeDashboard?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const gridAppTreeNode = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeNode?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 * GET ALL USERS
 * @param options
 * @returns {*}
 */
const getSecUsers = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/getSecUsers?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getBackup = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/backup?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getUsersFromRole = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/users?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getPermissionsFromRole = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/permissions?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const putGridEditing = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridEditing/${id}`;

    //  GET CSRF TOKEN
    return Api.put(
        url,
        {},
        {
            body: new URLSearchParams( getData ).toString(),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }
    );

};

/**
 *
 * @param id
 * @param data
 * @returns {*}
 */
const putAppVersion = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/version/${id}`;

    //  GET CSRF TOKEN
    return Api.put(
        url,
        {},
        {
            body: new URLSearchParams( getData ).toString(),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }
    );

};

/**
 *
 * @param id
 * @param data
 * @returns {*}
 */
const putAppDashboard = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeDashboard/${id}`;

    //  GET CSRF TOKEN
    return Api.put(
        url,
        {},
        {
            body: new URLSearchParams( getData ).toString(),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }
    );

};

/**
 *
 * @param id
 * @param data
 * @returns {*}
 */
const putAppTreeNode = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeNode/${id}`;

    //  GET CSRF TOKEN
    return Api.put(
        url,
        {},
        {
            body: new URLSearchParams( getData ).toString(),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }
    );

};

/**
 *
 * @param id
 * @param data
 * @returns {*}
 */
const putBackup = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/backup/${id}`;

    //  GET CSRF TOKEN
    return Api.put(
        url,
        {},
        {
            body: new URLSearchParams( getData ).toString(),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }
    );

};

/**
 *
 * @param id
 * @param data
 * @returns {*}
 */
const putPermission = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/permissions/${id}`;

    //  GET CSRF TOKEN
    return Api.put(
        url,
        {},
        {
            body: new URLSearchParams( getData ).toString(),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }
    );

};

/**
 *
 * @param id
 * @returns {*}
 */
const deleteGridAppGridAttribute = ( id, gridId ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridEditing/${id}?gridId=${gridId}&frontGrid=true`;

    //  GET CSRF TOKEN
    return Api.remove(
        url,
        {}
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const createAppGridAttribute = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridEditing`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const createReportingVersion = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/version`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const createDashboard = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeDashboard`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const createAppTreeNode = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeNode`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param id
 * @returns {*}
 */
const deleteReporting = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/version/${id}`;

    //  GET CSRF TOKEN
    return Api.remove(
        url,
        {}
    );

};

/**
 *
 * @param id
 * @returns {*}
 */
const deleteDashboard = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeDashboard/${id}`;

    //  GET CSRF TOKEN
    return Api.remove(
        url,
        {}
    );

};

/**
 *
 * @param id
 * @returns {*}
 */
const deleteAppTreeNode = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppTreeNode/${id}`;

    //  GET CSRF TOKEN
    return Api.remove(
        url,
        {}
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const createAppVersion = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/version`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const createPermission = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/permissions`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const revokeUserRole = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/revokeUserRole`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const revokePermissionRole = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/revokePermissionRole`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const assignUserRole = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/assignUserRole`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param data
 * @returns {*}
 */
const assignRoleToPermission = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/assignRoleToPermission`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

const createRole = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/createRole`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getRoles = ( options ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/getRoles`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getRoleStructure = ( options ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/tree`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getRoleTypes = ( ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/roles/getRoleTypes`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

export const securedDataManager = {
    getAppVersion,
    gridAppTreeDashboard,
    gridAppTreeNode,
    getSecUsers,
    getBackup,
    putAppVersion,
    createReportingVersion,
    createDashboard,
    createAppTreeNode,
    deleteReporting,
    deleteDashboard,
    deleteAppTreeNode,
    putBackup,
    putPermission,
    createAppVersion,
    createPermission,
    getGridEditing,
    putGridEditing,
    putAppDashboard,
    putAppTreeNode,
    deleteGridAppGridAttribute,
    createAppGridAttribute,
    getRoles,
    getUsersFromRole,
    getPermissionsFromRole,
    revokeUserRole,
    revokePermissionRole,
    assignUserRole,
    assignRoleToPermission,
    createRole,
    getRoleStructure,
    getRoleTypes
};
export default securedDataManager;