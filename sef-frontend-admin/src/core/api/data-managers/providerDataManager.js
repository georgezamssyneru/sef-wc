import { Api } from '../api';

/*** GET PROVIDERS ERRORS */
const getErrorAPI = ( data ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/providers`;
    return Api.post(
        url,
        {},
        {
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' },
        }
    );

};

/*** SEARCH PROVIDERS ERRORS */
const getSearchErrorApi = ( dateFrom, dateTo ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/providersReportingDatePicker?dateFrom=${dateFrom}&dateTo=${dateTo}`;
    return Api.get(
        url,
        {}
    );

};

/*** GET IMPORT ENTITY  */
const getImportEntity = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/getImportEntity?ImportId=${id}`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/*** GET IMPORT DETAIL  */
const getImportDetail = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/getImportDetail?ImportId=${id}`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/*** GET IMPORT DETAIL CSIR */
const getImportDetailCSIR = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/getImportDetailCSIR?ImportId=${id}`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

/*** GET IMPORT FACILITY FOR CSIR  */
const getImportFacility = ( id ) => {

    const url = `${process.env.REACT_APP_BACKEND_URL}/reporting/getImportFacility?ImportId=${id}`;
    //  GET CSRF TOKEN
    return Api.get(
        url,
        {}
    );

};

export const providerDataManager = {
    getErrorAPI,
    getSearchErrorApi,
    getImportEntity,
    getImportDetail,
    getImportDetailCSIR,
    getImportFacility
};

export default providerDataManager;