import {authDataManager} from "../core/api/data-managers";

/**
 * USED FOR SAGA
 * @returns {Promise<any>}
 */
export const getProfile = () => {

    return new Promise((resolve) =>
        setTimeout(() => {

            authDataManager.profile().then(( data ) => {

                return resolve(data);

            });

        }, 1)
    );

};