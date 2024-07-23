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
const test = () => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/test`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};

/*** REGISTER */
const register = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/register`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/*** LOGIN */
const login = (username, password) => {

    //  ----------------- CSRF LOGIN
    return sanctumCsrfToken().then(( response ) => {
        const url = `${process.env.REACT_APP_BACKEND_URL}/login`;
        return Api.post(
            url,
            {},
            {
                body: `email=${username}&password=${password}&type=admin`,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            }
        );
    });

    //  ----------------- TOKEN LOGIN
    // const url = `${process.env.REACT_APP_BACKEND_URL_BASE}/login`;
    // return Api.post(
    //     url,
    //     {},
    //     {
    //         body: `email=${username}&password=${password}`,
    //         headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    //     }
    // );

};

/*** PROFILE */
const profile = () => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/profile`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};

/**
 * Authentication Tree for components on authenticated user
 * @returns {*}
 */
const tree = () => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/tree?type=admin`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );
};

const componentInstance = ( props ) => {
    const url = `${process.env.REACT_APP_BACKEND_URL}/componentInstance?component_id=${props['component_id']}&type=admin`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        props
    );
};

const logout = (username, password) => {
    const url = `${process.env.BACKEND_APP}/logout`;
    return Api.get(url).then(() => {
        window.location = `/`;
    });
};

const checkUser = (admKey) => {
    // const url = !admKey ? `${process.env.BACKEND_APP}/me` : `${process.env.BACKEND_APP}/me?admkey=${admKey}`;
    // return Api.get(url);
};

/**
 *
 * @param options
 * @returns {*}
 */
const getReportLayout = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/reportLayout`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 * Resource CRUD for App Class.
 * @returns {*}
 */
const getGridAppClassEditing = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppClassEditing?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 * Resource CRUD for App Class Attribute, selected by class.
 * @returns {*}
 */
const getGridAppClassAttribute = ( options ) => {

    console.log('firing endpoint --->', options);

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppClassAttribute?${params}`;

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
const getGridAppGrid = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGrid?${params}`;

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
const getGridAppForm = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppForm?${params}`;

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
const getGridAppReporting = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridReporting?${params}`;

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
const createAppReporting = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridReporting`;
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
 * @param data
 * @returns {*}
 */
const putGridEditingReporting = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridReporting/${id}`;

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
const deleteGridAppReporting = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGrid/${id}`;

    //  GET CSRF TOKEN
    return Api.remove(
        url,
        {}
    );

};

/**
 *
 * @param options
 * @returns {*}
 */
const getGridAppFormAttribute = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppFormAttribute?${params}`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 *
 * @param id
 * @param data
 * @returns {*}
 */
const putGridEditingForm = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppForm/${id}`;

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
const deleteGridEditingForm = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppForm/${id}`;

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
const createAppForm = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppForm`;
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
const getGridAppGridAttribute = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGridAttribute?${params}`;

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
const getGridAttributeFromClassAttribute = ( options ) => {

    let params = new URLSearchParams(options).toString();

    const url = `${process.env.REACT_APP_BACKEND_URL}/getGridAttributeFromClassAttribute?${params}`;

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
const getGridClasses = ( options ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/getAllClasses`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 * GET THE TYPE OF EDITING ON GRID
 * @param options
 * @returns {*}
 */
const getGridTypeEditing = ( options ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/getGridTypeEditing`;

    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/**
 * CREATE APP CLASS
 * @param data
 */
const createAppClass = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppClassEditing`;
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
const createAppClassAttribute = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppClassAttribute`;
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
const createAppGrid = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGrid`;
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
const createAppGridAttribute = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGridAttribute`;
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
const createAppFormAttribute = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppFormAttribute`;
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
const putGridEditingAppClass = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppClassEditing/${id}`;

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
 * App Attribute Class
 * @param id
 * @param data
 * @returns {*}
 */
const putGridEditingAppAttributeClass = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppClassAttribute/${id}`;

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
const putGridEditingAppFormAttributeClass = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppFormAttribute/${id}`;

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
const putGridEditingAppGridAttributeClass = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGridAttribute/${id}`;

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
const putGridEditingAppGridClass = ( id, data ) => {

    let getData = { ...data };

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGrid/${id}`;

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
const deleteGridAppGrid = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGrid/${id}`;

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
const deleteGridAppFormAttribute = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppFormAttribute/${id}`;

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
const deleteGridAppGridAttribute = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/gridAppGridAttribute/${id}`;

    //  GET CSRF TOKEN
    return Api.remove(
        url,
        {}
    );

};

export const authDataManager = {
    login,
    checkUser,
    logout,
    profile,
    register,
    tree,
    componentInstance,
    test,
    getReportLayout,
    getGridAppClassEditing,
    getGridAppClassAttribute,
    createAppFormAttribute,
    putGridEditingAppFormAttributeClass,
    deleteGridAppFormAttribute,
    getGridAppReporting,
    createAppReporting,
    putGridEditingReporting,
    deleteGridAppReporting,
    getGridAppForm,
    getGridAppFormAttribute,
    putGridEditingForm,
    deleteGridEditingForm,
    createAppForm,
    getGridAppGrid,
    getGridAppGridAttribute,
    getGridAttributeFromClassAttribute,
    getGridClasses,
    getGridTypeEditing,
    createAppClass,
    createAppClassAttribute,
    createAppGridAttribute,
    createAppGrid,
    putGridEditingAppClass,
    putGridEditingAppAttributeClass,
    putGridEditingAppGridClass,
    putGridEditingAppGridAttributeClass,
    deleteGridAppGrid,
    deleteGridAppGridAttribute
};
export default authDataManager;