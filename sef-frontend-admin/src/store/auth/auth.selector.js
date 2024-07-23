export const getUserSelector = (state) =>
    state.auth.user;
export const getUserRolesSelector = (state) =>
    state.auth.roles;
export const getHipsToken = (state) =>
    state.auth.HIPS_token;
export const getLoggedInSelector = (state) =>
    state.auth.loggedIn;