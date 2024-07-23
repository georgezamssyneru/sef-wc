import { createSlice } from '@reduxjs/toolkit';

let initialState = {
    user: {},
    loggedIn: false,
    HIPS_token: '',
    hasError: false,
};

const authSlice = createSlice({
    name: 'auth',
    initialState,
    reducers: {
        setAuthDetails(state, action) {
            state.user = action.payload;
        },
        setLoggedIn(state,action){
            state.loggedIn = action.payload;
        },
        setHipsToken(state, action) {
            state.HIPS_token = action.payload;
        },
        setHasError(state,action){
            state.hasError = action.payload;
        }
    },
});

export const getAuth = (state) =>
    state.auth.user;
export const authActions = authSlice.actions;
export const authReducer = authSlice.reducer;
