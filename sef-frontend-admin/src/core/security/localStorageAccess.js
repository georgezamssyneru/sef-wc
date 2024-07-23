const isLoggedIn = () => {

    const auth = JSON.parse( localStorage.getItem('auth') );

    if( auth ){
        return (auth.access_token) ? true : false;
    }else{
        return false
    }

}

const logout = () => {

    localStorage.removeItem('auth');

}

export const localStorageAccess = {
    isLoggedIn,
    logout
};