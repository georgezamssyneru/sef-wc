import Cookies from 'js-cookie';

const isLoggedIn = () => {

    const auth = Cookies.get('XSRF-TOKEN');

    console.log('token', auth);

    if( auth ){
        return true;
    }else{
        return false
    }

}

const logout = () => {

    Cookies.remove('XSRF-TOKEN');
    Cookies.remove('laravel_session');

}

export const sessionCookieAccess = {
    isLoggedIn,
    logout
};