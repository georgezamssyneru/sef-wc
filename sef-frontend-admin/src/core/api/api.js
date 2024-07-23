import { store } from '../../app/store';
import Cookies from 'js-cookie'
import { prepareRequestConfig } from '../../core/api/api.utlis';
import { authActions, getUserSelector } from '../../store/auth';

let csrfToken = null;
let Token = null;

const checkCsrfHeaders = () => {
    if (Cookies.get('XSRF-TOKEN')) {
        csrfToken = Cookies.get('XSRF-TOKEN');
    }
};

const checkTokenHeaders = () => {

    if (localStorage.getItem('auth')) {
        let token = JSON.parse(localStorage.getItem('auth'));
        Token = token['access_token'];
    }
};

const parseResponse = (response) => {

    const contentType = response.headers.get('Content-Type');

    //  ----------- DONT ALLOW ANY HTML RESPONSES AS CONTENT TYPE
    if (response.status === 401 || response.status === 403 || ( contentType.indexOf('text/html') == 0  )  ) {

        Cookies.remove('XSRF-TOKEN');
        Cookies.remove('laravel_session');
        Cookies.remove();

        // REMOVE TOKEN ON LOGOUT
        localStorage.removeItem('auth');

        //  --------  NAVIGATE USER TO LOGIN PAGE
        window.location.href = '/?loggedOut=true';

        dispatch( authActions.setLoggedIn(false) );

    }

    checkCsrfHeaders();

    if (!response.ok) return response;

    if (/json/.test(contentType)) {
        return response.json();
    } else if (/multipart/.test(contentType)) {
        return response.formData();
    } else if (/pdf|xml|octet/.test(contentType)) {
        return response.blob();
    } else {
        return response.text();
    }

};

const request = (endpoint, payload, options = {}) => {
    checkCsrfHeaders();
    checkTokenHeaders();
    let requestConfig = payload
        ? prepareRequestConfig(payload, options)
        : options;
    if (csrfToken) {
        requestConfig.headers = {
            ...requestConfig.headers,
            'X-XSRF-TOKEN' : csrfToken,
        };
    }
    //  If token
    if (Token) {
        requestConfig.headers = {
            ...requestConfig.headers,
            'Authorization' : `Bearer ${Token}`,
        };
    }
    const controller = new AbortController();
    const signal = controller.signal;
    requestConfig.signal = signal;

    const endpointUrl = `${endpoint}`;

    const requestPromise = fetch(endpointUrl, requestConfig);
    requestPromise.cancel = () => controller.abort();

    return requestPromise
        .then((response) => {
            return parseResponse(response);
        })
        .catch((ex) => {
            return { error: { code: 500, description: ex.message } };
        });
};

const get = (endpoint, options) => {
    return request(endpoint, null, options);
};

const post = (endpoint, payload, options) => {
    return request(endpoint, payload, options);
};

const put = (endpoint, payload, options = {}) => {
    const putOptions = { ...options, method: 'PUT' };
    return request(endpoint, payload, putOptions);
};

const remove = (endpoint, options) => {
    const removeOptions = { ...options, method: 'DELETE' };
    return request(endpoint, null, removeOptions);
};

export const Api = {
    get,
    post,
    put,
    remove,
};

export default Api;
