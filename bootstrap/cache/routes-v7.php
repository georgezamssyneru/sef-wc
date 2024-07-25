<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/api/oracle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3UTmC0gNVjrfPpym',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cenHXOoCwIg5bc1f',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::911evH6DX6iMXpXQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aNOG1CLQaphzdqlN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1U4mx8GiFHhcJO7D',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/secure/encrypt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kpe0yxTlD2nrSexg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getSupersetGuestTokenForDashboardId' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ES5zYTYyKAK4CRmW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/resendEmailConfirmation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pWHRyyUpQBtQ5tmT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bXWVhQniqiOi1AUw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/tree' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::x3u3LSgSzQgPXBJZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/componentInstance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xJRlR45YWkQYoPiU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/resetPassword' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8l1yJvlc4PnSkJbG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::buRJrxLA8Nv6MWvb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getSupersetGuestToken' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4rqdYBtCzBQGMk4t',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getSupersetGuestTokenWithFilters' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VfqSRKVBr5bAynsT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/getRoleTypes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DtN3DUfQu4VL3Yyt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/getRoles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rN8OGwZgkqa56buP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/getUsersWithRoles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HN7edN65TCnN8xaA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/getPermissionsByRole' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1WQXz5JcPhjRnyAG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/assignRoles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PtglyeB7W1pdHPY4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/assignRoleToPermission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZitZjfsrkgH0q61n',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/assignPermission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3oq7HuLA6U4Vl7jA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/revokeUserRole' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::x87giA6uOsJk8DZK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/revokePermissionRole' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gKGPWZihYPNDTT2V',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/assignUserRole' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yXPdoT2Wcvagjyyj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/createRole' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::46QMSgc6CuU7Uvxb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/permissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/roles/tree' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qZYcOrWJRXlo2jH3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getDistricts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FKAJuzyfO3BYp9cE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getFacilities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JpgvGPIL82CFvbrp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getUserStatus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8OH682nfFSmiiZUP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/users/usersWithRoles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HR2SLsLBrSymuSSg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/users/usersSearch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e9OKa8v4vDbqDenb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/assignRole' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oUKcsQNi3MBfcQpc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/assignUserStatus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Afrx4lt9RKFXkRIV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/users/getRoles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R3U06nbfrFzF8YZN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getSecUsers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getSecUsers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'getSecUsers.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getSecUsers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getSecUsers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BueGoNcp1gR13UkA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rjcbyjTyVU6Tx6vn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ukn2NWHZZo7dpzKA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P7mIJ4SzPEq6GRuY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::233U6fxdf7LlEpJQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NhRp8oZvaK4bEu99',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/email/verify/([^/]++)/([^/]++)(*:38)|/api/(?|roles/(?|users/([^/]++)(?|(*:79)|/edit(*:91)|(*:98))|permissions/([^/]++)(?|(*:129)|/edit(*:142)|(*:150)))|getSecUsers/([^/]++)(?|(*:183)|/edit(*:196)|(*:204)))|/_dusk/(?|log(?|in/([^/]++)(?:/([^/]++))?(*:255)|out(?:/([^/]++))?(*:280))|user(?:/([^/]++))?(*:307))|/password/reset/([^/]++)(*:340)|/superset/([^/]++)(*:366)|/uamp/([^/]++)(*:388))/?$}sDu',
    ),
    3 => 
    array (
      38 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.verify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      79 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      91 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      98 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      129 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.show',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.edit',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      150 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.update',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.destroy',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      183 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getSecUsers.show',
          ),
          1 => 
          array (
            0 => 'getSecUser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      196 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getSecUsers.edit',
          ),
          1 => 
          array (
            0 => 'getSecUser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getSecUsers.update',
          ),
          1 => 
          array (
            0 => 'getSecUser',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'getSecUsers.destroy',
          ),
          1 => 
          array (
            0 => 'getSecUser',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dusk.login',
            'guard' => NULL,
          ),
          1 => 
          array (
            0 => 'userId',
            1 => 'guard',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      280 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dusk.logout',
            'guard' => NULL,
          ),
          1 => 
          array (
            0 => 'guard',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      307 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dusk.user',
            'guard' => NULL,
          ),
          1 => 
          array (
            0 => 'guard',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      340 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      366 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iGVWb0t0ZWA2gA1p',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::E28NHp7GpcNrpGPD',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::3UTmC0gNVjrfPpym' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oracle',
      'action' => 
      array (
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:337:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:121:"function () {
    return \\response([
        \'success\'   => true,
        \'message\'   => \\App\\Models\\App::get()
    ]);
}";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000006d00000000000000000";}";s:4:"hash";s:44:"CBx9cx+QaPyscH8bwd5dCUw3rmBBGuMjtbjw/NTSkpQ=";}}',
        'as' => 'generated::3UTmC0gNVjrfPpym',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cenHXOoCwIg5bc1f' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/register',
      'action' => 
      array (
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@register',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@register',
        'as' => 'generated::cenHXOoCwIg5bc1f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/verify/{id}/{hash}',
      'action' => 
      array (
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:773:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:557:"function (\\Illuminate\\Http\\Request $request) {

    $user = \\App\\Models\\User::find($request->route(\'id\'));

    if (!\\hash_equals((string) $request->route(\'hash\'), \\sha1($user->getEmailForVerification()))) {
        throw new \\AuthorizationException;
    }

    if ($user->markEmailAsVerified()){
        \\event(new \\Illuminate\\Auth\\Events\\Verified($user));
        return \\redirect(\\env(\'REDIRECT_URL_APP\').\'?verified=1\')->with(\'verified\', true);
    }else{
        return \\redirect(\\env(\'REDIRECT_URL_APP\').\'?verified=0\')->with(\'verified\', true);
    }

}";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000006d50000000000000000";}";s:4:"hash";s:44:"+vvZ3pRE2iu5Jv1iQDnuW844r6l0rA6LtBZPpY1uphM=";}}',
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::911evH6DX6iMXpXQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/forgot-password',
      'action' => 
      array (
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@forgotPassword',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@forgotPassword',
        'as' => 'generated::911evH6DX6iMXpXQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aNOG1CLQaphzdqlN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/reset-password',
      'action' => 
      array (
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@reset',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@reset',
        'as' => 'generated::aNOG1CLQaphzdqlN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1U4mx8GiFHhcJO7D' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@login',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@login',
        'as' => 'generated::1U4mx8GiFHhcJO7D',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Kpe0yxTlD2nrSexg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/secure/encrypt',
      'action' => 
      array (
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@encrypt',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@encrypt',
        'as' => 'generated::Kpe0yxTlD2nrSexg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ES5zYTYyKAK4CRmW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/getSupersetGuestTokenForDashboardId',
      'action' => 
      array (
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@getSupersetGuestTokenForDashboardId',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@getSupersetGuestTokenForDashboardId',
        'as' => 'generated::ES5zYTYyKAK4CRmW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pWHRyyUpQBtQ5tmT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/resendEmailConfirmation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@resendEmailConfirmation',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@resendEmailConfirmation',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pWHRyyUpQBtQ5tmT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bXWVhQniqiOi1AUw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@profile',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@profile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::bXWVhQniqiOi1AUw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::x3u3LSgSzQgPXBJZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@authenticatedTreeComponents',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@authenticatedTreeComponents',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::x3u3LSgSzQgPXBJZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xJRlR45YWkQYoPiU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/componentInstance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@authenticatedComponentInstance',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@authenticatedComponentInstance',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xJRlR45YWkQYoPiU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8l1yJvlc4PnSkJbG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/resetPassword',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@resetPassword',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@resetPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8l1yJvlc4PnSkJbG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::buRJrxLA8Nv6MWvb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@logout',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::buRJrxLA8Nv6MWvb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4rqdYBtCzBQGMk4t' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/getSupersetGuestToken',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@getSupersetGuestToken',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@getSupersetGuestToken',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4rqdYBtCzBQGMk4t',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VfqSRKVBr5bAynsT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/getSupersetGuestTokenWithFilters',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@getSupersetGuestTokenWithFilters',
        'controller' => 'Hip\\CustomAuth\\Http\\Controllers\\AuthController@getSupersetGuestTokenWithFilters',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VfqSRKVBr5bAynsT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DtN3DUfQu4VL3Yyt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/getRoleTypes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getRoleTypes',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getRoleTypes',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::DtN3DUfQu4VL3Yyt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rN8OGwZgkqa56buP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/getRoles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getRoles',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getRoles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::rN8OGwZgkqa56buP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HN7edN65TCnN8xaA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/getUsersWithRoles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getUsersWithRoles',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getUsersWithRoles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HN7edN65TCnN8xaA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1WQXz5JcPhjRnyAG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/getPermissionsByRole',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getPermissionsByRole',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getPermissionsByRole',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::1WQXz5JcPhjRnyAG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PtglyeB7W1pdHPY4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/assignRoles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignRoles',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignRoles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::PtglyeB7W1pdHPY4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZitZjfsrkgH0q61n' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/assignRoleToPermission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignRoleToPermission',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignRoleToPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZitZjfsrkgH0q61n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3oq7HuLA6U4Vl7jA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/assignPermission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignPermission',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignPermission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::3oq7HuLA6U4Vl7jA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::x87giA6uOsJk8DZK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/revokeUserRole',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@revokeUserRole',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@revokeUserRole',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::x87giA6uOsJk8DZK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gKGPWZihYPNDTT2V' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/revokePermissionRole',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@revokePermissionRole',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@revokePermissionRole',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gKGPWZihYPNDTT2V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yXPdoT2Wcvagjyyj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/assignUserRole',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignUserRole',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@assignUserRole',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::yXPdoT2Wcvagjyyj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::46QMSgc6CuU7Uvxb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/createRole',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@createRole',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@createRole',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::46QMSgc6CuU7Uvxb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'users.index',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@index',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@index',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'users.create',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@create',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@create',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'users.store',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@store',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@store',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'users.show',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@show',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@show',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/users/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'users.edit',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@edit',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@edit',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/roles/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'users.update',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@update',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@update',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/roles/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'users.destroy',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@destroy',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\UserRoleController@destroy',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'permissions.index',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@index',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@index',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/permissions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'permissions.create',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@create',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@create',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/roles/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'permissions.store',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@store',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@store',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'permissions.show',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@show',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@show',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/permissions/{permission}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'permissions.edit',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@edit',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@edit',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/roles/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'permissions.update',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@update',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@update',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/roles/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'permissions.destroy',
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@destroy',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\RolePermissionController@destroy',
        'namespace' => NULL,
        'prefix' => '/api/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qZYcOrWJRXlo2jH3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/roles/tree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getStructure',
        'controller' => 'Hip\\PackageRoleManagement\\Http\\Controllers\\PackageRolesController@getStructure',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::qZYcOrWJRXlo2jH3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FKAJuzyfO3BYp9cE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/getDistricts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getDistricts',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getDistricts',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::FKAJuzyfO3BYp9cE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JpgvGPIL82CFvbrp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/getFacilities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getFacilities',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getFacilities',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::JpgvGPIL82CFvbrp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8OH682nfFSmiiZUP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getUserStatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getUserStatus',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getUserStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8OH682nfFSmiiZUP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HR2SLsLBrSymuSSg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/users/usersWithRoles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@usersWithRoles',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@usersWithRoles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HR2SLsLBrSymuSSg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e9OKa8v4vDbqDenb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/users/usersSearch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@usersSearchWithRoles',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@usersSearchWithRoles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::e9OKa8v4vDbqDenb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oUKcsQNi3MBfcQpc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/assignRole',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@assign',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@assign',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::oUKcsQNi3MBfcQpc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Afrx4lt9RKFXkRIV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/assignUserStatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@assignUserStatus',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@assignUserStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Afrx4lt9RKFXkRIV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R3U06nbfrFzF8YZN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/users/getRoles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getRoles',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\PackageUserController@getRoles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::R3U06nbfrFzF8YZN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSecUsers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getSecUsers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getSecUsers.index',
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@index',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@index',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSecUsers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getSecUsers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getSecUsers.create',
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@create',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@create',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSecUsers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/getSecUsers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getSecUsers.store',
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@store',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@store',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSecUsers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getSecUsers/{getSecUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getSecUsers.show',
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@show',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@show',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSecUsers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getSecUsers/{getSecUser}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getSecUsers.edit',
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@edit',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@edit',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSecUsers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/getSecUsers/{getSecUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getSecUsers.update',
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@update',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@update',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSecUsers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/getSecUsers/{getSecUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getSecUsers.destroy',
        'uses' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@destroy',
        'controller' => 'Hip\\PackageUserManagement\\Http\\Controllers\\SecUsersController@destroy',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dusk.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_dusk/login/{userId}/{guard?}',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'Laravel\\Dusk\\Http\\Controllers\\UserController@login',
        'as' => 'dusk.login',
        'controller' => 'Laravel\\Dusk\\Http\\Controllers\\UserController@login',
        'namespace' => NULL,
        'prefix' => '_dusk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dusk.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_dusk/logout/{guard?}',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'Laravel\\Dusk\\Http\\Controllers\\UserController@logout',
        'as' => 'dusk.logout',
        'controller' => 'Laravel\\Dusk\\Http\\Controllers\\UserController@logout',
        'namespace' => NULL,
        'prefix' => '_dusk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dusk.user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_dusk/user/{guard?}',
      'action' => 
      array (
        'middleware' => 'web',
        'uses' => 'Laravel\\Dusk\\Http\\Controllers\\UserController@user',
        'as' => 'dusk.user',
        'controller' => 'Laravel\\Dusk\\Http\\Controllers\\UserController@user',
        'namespace' => NULL,
        'prefix' => '_dusk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BueGoNcp1gR13UkA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::BueGoNcp1gR13UkA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rjcbyjTyVU6Tx6vn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:262:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:44:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ae70000000000000000";}";s:4:"hash";s:44:"dGh10ubTMYEqbpyK/KvFiRaPbway0yrPSUSSJKAv/AA=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::rjcbyjTyVU6Tx6vn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ukn2NWHZZo7dpzKA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:259:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:41:"function () {
    return \\view(\'esri\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ae90000000000000000";}";s:4:"hash";s:44:"iwxeZx6MYKhN1kxDXJLncixN27wv03LVP151n9bj2d0=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Ukn2NWHZZo7dpzKA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P7mIJ4SzPEq6GRuY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::P7mIJ4SzPEq6GRuY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::233U6fxdf7LlEpJQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::233U6fxdf7LlEpJQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NhRp8oZvaK4bEu99' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::NhRp8oZvaK4bEu99',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iGVWb0t0ZWA2gA1p' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'superset/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:628:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:409:"function ($filename)
{

    $path = \\storage_path(\'public/superset/\' . $filename);

    if (!\\Illuminate\\Support\\Facades\\File::exists($path)) {
        \\abort(404);
    }

    $file = \\Illuminate\\Support\\Facades\\File::get($path);
    $type = \\Illuminate\\Support\\Facades\\File::mimeType($path);

    $response = \\Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000aeb0000000000000000";}";s:4:"hash";s:44:"r/g4aJjF0XUYISBAgvl4ZEMVcXr6Vc/rDxEYwZviOQ0=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::iGVWb0t0ZWA2gA1p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::E28NHp7GpcNrpGPD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'uamp/{filename}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:624:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:405:"function ($filename)
{

    $path = \\storage_path(\'public/uamp/\' . $filename);

    if (!\\Illuminate\\Support\\Facades\\File::exists($path)) {
        \\abort(404);
    }

    $file = \\Illuminate\\Support\\Facades\\File::get($path);
    $type = \\Illuminate\\Support\\Facades\\File::mimeType($path);

    $response = \\Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000af20000000000000000";}";s:4:"hash";s:44:"xBJwwGKlXyXMIxH9+E5cRTyFooFjrQxTFTQxVLJ8j9I=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::E28NHp7GpcNrpGPD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
