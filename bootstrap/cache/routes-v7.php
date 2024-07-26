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
            '_route' => 'generated::ZUGq1PWnO87475cg',
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
            '_route' => 'generated::n1D9rnGRlADNU56x',
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
            '_route' => 'generated::IUFjk7x9ORkql4aI',
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
            '_route' => 'generated::KSbwKVwYLit3iPFC',
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
            '_route' => 'generated::n9DPuhL6231fIL6K',
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
            '_route' => 'generated::fSyBcrkqFXiMwsqE',
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
            '_route' => 'generated::kx86AmhuZWtsFTk4',
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
            '_route' => 'generated::WUfABG4SHwW5dTjb',
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
            '_route' => 'generated::ZXqb69qrf7IITI3R',
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
            '_route' => 'generated::xB0ngwboUZJrlwkp',
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
            '_route' => 'generated::MKcJ6KQAAn2lZ7Vg',
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
            '_route' => 'generated::5GiAtEiVHGIaidKJ',
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
            '_route' => 'generated::3JYqqajyYv8MAIfw',
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
            '_route' => 'generated::G37nvRBS8UrQFORk',
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
            '_route' => 'generated::SgikiRA2PjGuyWB0',
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
            '_route' => 'generated::DvQG9zX2lfAEnRDP',
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
            '_route' => 'generated::rbDUMpB7CU2ZbUAL',
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
            '_route' => 'generated::uGxvikxbehDdQeZn',
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
            '_route' => 'generated::PQYgErjiVzX69QnE',
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
            '_route' => 'generated::OM1XsOkjZmozdfWL',
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
            '_route' => 'generated::Y1Z97OOoBWN39NQx',
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
            '_route' => 'generated::IVNEuOs8ozFw4VRg',
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
            '_route' => 'generated::sKlUxJAnZwe3r9MP',
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
            '_route' => 'generated::E5MbLsvu9deDtIyr',
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
            '_route' => 'generated::pZh8O5C4MSt4IoWU',
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
            '_route' => 'generated::mJExNvJbkIidRwM6',
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
            '_route' => 'generated::iVJIKNIQZeT1XRKl',
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
            '_route' => 'generated::mjVQ02zWAqEkYqSc',
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
            '_route' => 'generated::zaUqflRvyMNm4AlA',
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
            '_route' => 'generated::5dm7GjuZV04K6gF3',
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
            '_route' => 'generated::6iXQ3Cd0UE7GSiON',
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
            '_route' => 'generated::noxO5a8Bwv7dYVga',
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
            '_route' => 'generated::6gnb3wRKS2ngpi5Y',
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
            '_route' => 'generated::v9dJ1uPPZ3vc7SEc',
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
            '_route' => 'generated::yELd9OxiR6kRPF12',
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
            '_route' => 'generated::uEwxD9s1oJ1qcBoj',
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
            '_route' => 'generated::c0fLTL5EnM7AeeoQ',
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
            '_route' => 'generated::Xr04tMfGIlcGhI2N',
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
            '_route' => 'generated::YFgI5h1yfweeCKEc',
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
            '_route' => 'generated::ly1LLO64hS2uqf1n',
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
            '_route' => 'generated::8x5RoKP9S0ppGaUw',
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
            '_route' => 'generated::HAZ0k1fr7P5kcNcB',
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
            '_route' => 'generated::n39wUXcClCWvEEKM',
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
    'generated::ZUGq1PWnO87475cg' => 
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
        'as' => 'generated::ZUGq1PWnO87475cg',
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
    'generated::n1D9rnGRlADNU56x' => 
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
        'as' => 'generated::n1D9rnGRlADNU56x',
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
    'generated::IUFjk7x9ORkql4aI' => 
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
        'as' => 'generated::IUFjk7x9ORkql4aI',
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
    'generated::KSbwKVwYLit3iPFC' => 
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
        'as' => 'generated::KSbwKVwYLit3iPFC',
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
    'generated::n9DPuhL6231fIL6K' => 
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
        'as' => 'generated::n9DPuhL6231fIL6K',
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
    'generated::fSyBcrkqFXiMwsqE' => 
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
        'as' => 'generated::fSyBcrkqFXiMwsqE',
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
    'generated::kx86AmhuZWtsFTk4' => 
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
        'as' => 'generated::kx86AmhuZWtsFTk4',
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
    'generated::WUfABG4SHwW5dTjb' => 
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
        'as' => 'generated::WUfABG4SHwW5dTjb',
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
    'generated::ZXqb69qrf7IITI3R' => 
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
        'as' => 'generated::ZXqb69qrf7IITI3R',
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
    'generated::xB0ngwboUZJrlwkp' => 
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
        'as' => 'generated::xB0ngwboUZJrlwkp',
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
    'generated::MKcJ6KQAAn2lZ7Vg' => 
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
        'as' => 'generated::MKcJ6KQAAn2lZ7Vg',
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
    'generated::5GiAtEiVHGIaidKJ' => 
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
        'as' => 'generated::5GiAtEiVHGIaidKJ',
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
    'generated::3JYqqajyYv8MAIfw' => 
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
        'as' => 'generated::3JYqqajyYv8MAIfw',
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
    'generated::G37nvRBS8UrQFORk' => 
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
        'as' => 'generated::G37nvRBS8UrQFORk',
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
    'generated::SgikiRA2PjGuyWB0' => 
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
        'as' => 'generated::SgikiRA2PjGuyWB0',
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
    'generated::DvQG9zX2lfAEnRDP' => 
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
        'as' => 'generated::DvQG9zX2lfAEnRDP',
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
    'generated::rbDUMpB7CU2ZbUAL' => 
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
        'as' => 'generated::rbDUMpB7CU2ZbUAL',
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
    'generated::uGxvikxbehDdQeZn' => 
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
        'as' => 'generated::uGxvikxbehDdQeZn',
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
    'generated::PQYgErjiVzX69QnE' => 
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
        'as' => 'generated::PQYgErjiVzX69QnE',
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
    'generated::OM1XsOkjZmozdfWL' => 
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
        'as' => 'generated::OM1XsOkjZmozdfWL',
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
    'generated::Y1Z97OOoBWN39NQx' => 
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
        'as' => 'generated::Y1Z97OOoBWN39NQx',
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
    'generated::IVNEuOs8ozFw4VRg' => 
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
        'as' => 'generated::IVNEuOs8ozFw4VRg',
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
    'generated::sKlUxJAnZwe3r9MP' => 
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
        'as' => 'generated::sKlUxJAnZwe3r9MP',
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
    'generated::E5MbLsvu9deDtIyr' => 
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
        'as' => 'generated::E5MbLsvu9deDtIyr',
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
    'generated::pZh8O5C4MSt4IoWU' => 
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
        'as' => 'generated::pZh8O5C4MSt4IoWU',
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
    'generated::mJExNvJbkIidRwM6' => 
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
        'as' => 'generated::mJExNvJbkIidRwM6',
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
    'generated::iVJIKNIQZeT1XRKl' => 
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
        'as' => 'generated::iVJIKNIQZeT1XRKl',
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
    'generated::mjVQ02zWAqEkYqSc' => 
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
        'as' => 'generated::mjVQ02zWAqEkYqSc',
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
    'generated::zaUqflRvyMNm4AlA' => 
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
        'as' => 'generated::zaUqflRvyMNm4AlA',
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
    'generated::5dm7GjuZV04K6gF3' => 
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
        'as' => 'generated::5dm7GjuZV04K6gF3',
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
    'generated::6iXQ3Cd0UE7GSiON' => 
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
        'as' => 'generated::6iXQ3Cd0UE7GSiON',
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
    'generated::noxO5a8Bwv7dYVga' => 
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
        'as' => 'generated::noxO5a8Bwv7dYVga',
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
    'generated::6gnb3wRKS2ngpi5Y' => 
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
        'as' => 'generated::6gnb3wRKS2ngpi5Y',
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
    'generated::v9dJ1uPPZ3vc7SEc' => 
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
        'as' => 'generated::v9dJ1uPPZ3vc7SEc',
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
    'generated::yELd9OxiR6kRPF12' => 
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
        'as' => 'generated::yELd9OxiR6kRPF12',
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
    'generated::uEwxD9s1oJ1qcBoj' => 
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
        'as' => 'generated::uEwxD9s1oJ1qcBoj',
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
    'generated::c0fLTL5EnM7AeeoQ' => 
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
        'as' => 'generated::c0fLTL5EnM7AeeoQ',
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
    'generated::Xr04tMfGIlcGhI2N' => 
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
        'as' => 'generated::Xr04tMfGIlcGhI2N',
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
    'generated::YFgI5h1yfweeCKEc' => 
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
        'as' => 'generated::YFgI5h1yfweeCKEc',
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
    'generated::ly1LLO64hS2uqf1n' => 
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
        'as' => 'generated::ly1LLO64hS2uqf1n',
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
    'generated::8x5RoKP9S0ppGaUw' => 
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
        'as' => 'generated::8x5RoKP9S0ppGaUw',
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
    'generated::HAZ0k1fr7P5kcNcB' => 
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
        'as' => 'generated::HAZ0k1fr7P5kcNcB',
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
    'generated::n39wUXcClCWvEEKM' => 
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
        'as' => 'generated::n39wUXcClCWvEEKM',
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
