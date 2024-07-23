/**
 * SORT FILTER SEARCHING
 * @param sortParams
 * @returns {{}}
 */
export const filterUrlString = ( sortParams ) => {

    //  ------- MAKE STRING PARAMETERS
    let sortParamsNew = {}

    sortParams.map((val,i) => {

        sortParamsNew[val['field']] = val['sort'].toUpperCase();

    });

    return new URLSearchParams(sortParamsNew).toString();

};

/**
 * GET ROLE
 * @param roles
 * @param whichRole
 * @returns {boolean}
 */
export const isRole = ( roles, whichRole ) => {

    //  ------- MAKE STRING PARAMETERS
    let checkRoles =  roles.filter(function(r) {
        return r['sec_role'][0]['role_name'] === whichRole
    });

    if( checkRoles.length > 0 )
        return true;

    return false;

};

/**
 * Check if Valid UUID
 * @param str
 * @returns {boolean}
 */
export const checkIfValidUUID = (str) =>  {
    // Regular expression to check if string is a valid UUID
    const regexExp = /^[0-9a-fA-F]{8}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{12}$/gi;

    return regexExp.test(str);
};

/**
 *
 * @returns {string}
 */
export const create_UUID = () => {
    let dt = new Date().getTime();
    let uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        let r = (dt + Math.random()*16)%16 | 0;
        dt = Math.floor(dt/16);
        return (c=='x' ? r :(r&0x3|0x8)).toString(16);
    });
    return uuid;
};