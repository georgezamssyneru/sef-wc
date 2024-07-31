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
            '_route' => 'generated::5NO66M2UdNC64Pf1',
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
            '_route' => 'generated::90rHupGzyvsbGQ1W',
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
            '_route' => 'generated::37qvMMnKVZ2UpkCJ',
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
            '_route' => 'generated::nHzclPpkOdKzEZmr',
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
            '_route' => 'generated::MCieJOn1AFr3WZlv',
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
            '_route' => 'generated::Buw279l0kTmsQX61',
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
            '_route' => 'generated::oGxdSyTJQNsr9sYW',
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
            '_route' => 'generated::XMRcGAk17bv2xEzt',
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
            '_route' => 'generated::hNUxqilvp8N8Ytjk',
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
            '_route' => 'generated::7q8FSODO4HPqk7aT',
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
            '_route' => 'generated::ygfKDOVAjYjrjyww',
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
            '_route' => 'generated::5SFO5W6vpXl3pgRP',
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
            '_route' => 'generated::JJTqpKG6dSabKByE',
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
            '_route' => 'generated::UkrwkoUP6SqPntBB',
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
            '_route' => 'generated::uex3NXQiRfFwFmWY',
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
      '/api/getGridAppClass' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::drbh3Om1moaIeMey',
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
      '/api/getDataSources' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vqTfoVruclH1j2db',
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
      '/api/getAllClasses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ddJvFRWYIBVUp8hf',
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
      '/api/getGridAttributeFromClassAttribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ot0N64mfA5vZGhdN',
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
      '/api/getGridTypeEditing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::88RvxpFgdn0PhRPu',
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
      '/api/gridEditing/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GFbN4yr3vEQvP1UN',
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
      '/api/getAllMetaDataTypesFromLookups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DbJUzwqEmm2m14lX',
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
      '/api/data/getFacilityType' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::p6KpCyDIyHQSYRWt',
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
      '/api/data/getMunicipalities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2lEMkxFQk5MkYDLy',
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
      '/api/gridItems' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7s64bkFDyeSigUM6',
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
      '/api/gridItems/beds' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4tB5pF8e2xmi8wQ4',
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
      '/api/gridItems/maintenance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tC0s6gLLTNhph9Ml',
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
      '/api/gridAttributes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OjDbXkJL3J7X8EV5',
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
      '/api/gridEditing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridEditing.index',
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
            '_route' => 'gridEditing.store',
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
      '/api/gridEditing/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridEditing.create',
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
      '/api/gridFacilityRequestByUser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacilityRequestByUser.index',
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
            '_route' => 'gridFacilityRequestByUser.store',
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
      '/api/gridFacilityRequestByUser/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacilityRequestByUser.create',
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
      '/api/gridFacility' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacility.index',
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
            '_route' => 'gridFacility.store',
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
      '/api/gridFacility/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacility.create',
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
      '/api/gridScenarioFacilityStage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenarioFacilityStage.index',
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
            '_route' => 'gridScenarioFacilityStage.store',
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
      '/api/gridScenarioFacilityStage/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenarioFacilityStage.create',
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
      '/api/data/updateFacilityCoordinates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M7l6d6TWrSjoIGe3',
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
      '/api/gridScenario' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenario.index',
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
            '_route' => 'gridScenario.store',
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
      '/api/gridScenario/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenario.create',
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
      '/api/getScenario' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mO2m0vG0exK8SRGd',
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
      '/api/getScenarioPlain' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xZL3YvGJizDAOiKu',
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
      '/api/gridAppClassEditing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassEditing.index',
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
            '_route' => 'gridAppClassEditing.store',
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
      '/api/gridAppClassEditing/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassEditing.create',
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
      '/api/gridAppClassAttribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassAttribute.index',
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
            '_route' => 'gridAppClassAttribute.store',
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
      '/api/gridAppClassAttribute/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassAttribute.create',
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
      '/api/gridAppGrid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGrid.index',
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
            '_route' => 'gridAppGrid.store',
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
      '/api/gridAppGrid/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGrid.create',
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
      '/api/gridAppGridAttribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGridAttribute.index',
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
            '_route' => 'gridAppGridAttribute.store',
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
      '/api/gridAppGridAttribute/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGridAttribute.create',
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
      '/api/gridAppForm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppForm.index',
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
            '_route' => 'gridAppForm.store',
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
      '/api/gridAppForm/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppForm.create',
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
      '/api/gridAppFormAttribute' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppFormAttribute.index',
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
            '_route' => 'gridAppFormAttribute.store',
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
      '/api/gridAppFormAttribute/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppFormAttribute.create',
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
      '/api/gridAppTreeNode' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeNode.index',
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
            '_route' => 'gridAppTreeNode.store',
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
      '/api/gridAppTreeNode/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeNode.create',
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
      '/api/gridAppTreeDashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeDashboard.index',
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
            '_route' => 'gridAppTreeDashboard.store',
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
      '/api/gridAppTreeDashboard/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeDashboard.create',
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
      '/api/uploadDashboardImage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WKLWqkBuEKiLDynu',
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
      '/api/dimtest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QJtcLogUuZpIos6I',
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
      '/api/map/getAppMapLink' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getAppMapLink.index',
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
            '_route' => 'getAppMapLink.store',
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
      '/api/map/getAppMapLink/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getAppMapLink.create',
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
      '/api/map/mapStyles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapStyles.index',
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
            '_route' => 'mapStyles.store',
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
      '/api/map/mapStyles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapStyles.create',
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
      '/api/map/getAppMapStyles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ax5oUyOlMhXNQgJg',
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
      '/api/map/mapLayers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapLayers.index',
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
            '_route' => 'mapLayers.store',
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
      '/api/map/mapLayers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapLayers.create',
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
      '/api/map/tree' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HvUiQM0ZR3MXbItk',
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
      '/api/map/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OQu8tSy2DkQjEqOt',
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
            '_route' => 'generated::Bq7hqWMttdEep2uk',
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
            '_route' => 'generated::SZYN1XWDW4fMsEmR',
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
            '_route' => 'generated::yGdJ4tlApJeoAPWY',
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
            '_route' => 'generated::AfqLqLGHJmlkyEgi',
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
            '_route' => 'generated::IXbKkKg6Pkr85HO3',
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
            '_route' => 'generated::LaueSuxjGZZYnyON',
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
            '_route' => 'generated::NANfjK6rrMa7Ne0m',
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
            '_route' => 'generated::B4Nk4FiXrCaylipS',
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
            '_route' => 'generated::Zk8jV6J84J1xyKfd',
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
            '_route' => 'generated::Z4VLC9Q3If6DzyWO',
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
            '_route' => 'generated::04uTdasJ140i7vV5',
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
            '_route' => 'generated::x1T4UHxltNlA2Iu0',
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
            '_route' => 'generated::8nqiJ8Jk29JYFVwU',
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
            '_route' => 'generated::1TUspdbCLtkmSswI',
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
            '_route' => 'generated::0lsoEHK2b83DaDMa',
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
            '_route' => 'generated::K3BTBiPa55Z4DBt6',
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
            '_route' => 'generated::vzpez9U9t6E7XwlQ',
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
            '_route' => 'generated::bwZhULrDQXtvsixf',
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
            '_route' => 'generated::KIYhaGbguABa1VRx',
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
            '_route' => 'generated::jIIjrs7LWu9eqzhj',
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
            '_route' => 'generated::45NnZyP6V1U2OLb9',
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
            '_route' => 'generated::CYNJrXbdfFoRsVDc',
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
            '_route' => 'generated::YHhPa9eYhZcsVIGH',
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
            '_route' => 'generated::QxB28I1qoh6rtFNc',
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
            '_route' => 'generated::0w4gjQEyKKh3mAfW',
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
            '_route' => 'generated::lznJc5EeY6M4Pgj4',
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
      0 => '{^(?|/email/verify/([^/]++)/([^/]++)(*:38)|/api/(?|g(?|rid(?|Editing/([^/]++)(?|(*:82)|/edit(*:94)|(*:101))|Facility(?|RequestByUser/([^/]++)(?|(*:146)|/edit(*:159)|(*:167))|/([^/]++)(?|(*:188)|/edit(*:201)|(*:209)))|Scenario(?|FacilityStage/([^/]++)(?|(*:255)|/edit(*:268)|(*:276))|/([^/]++)(?|(*:297)|/edit(*:310)|(*:318)))|App(?|Class(?|Editing/([^/]++)(?|(*:361)|/edit(*:374)|(*:382))|Attribute/([^/]++)(?|(*:412)|/edit(*:425)|(*:433)))|Grid(?|/([^/]++)(?|(*:462)|/edit(*:475)|(*:483))|Attribute/([^/]++)(?|(*:513)|/edit(*:526)|(*:534)))|Form(?|/([^/]++)(?|(*:563)|/edit(*:576)|(*:584))|Attribute/([^/]++)(?|(*:614)|/edit(*:627)|(*:635)))|Tree(?|Node/([^/]++)(?|(*:668)|/edit(*:681)|(*:689))|Dashboard/([^/]++)(?|(*:719)|/edit(*:732)|(*:740)))))|etSecUsers/([^/]++)(?|(*:774)|/edit(*:787)|(*:795)))|map/(?|getAppMapLink/([^/]++)(?|(*:837)|/edit(*:850)|(*:858))|map(?|Styles/([^/]++)(?|(*:891)|/edit(*:904)|(*:912))|Layers/([^/]++)(?|(*:939)|/edit(*:952)|(*:960)))|tree/([^/]++)(*:983))|roles/(?|users/([^/]++)(?|(*:1018)|/edit(*:1032)|(*:1041))|permissions/([^/]++)(?|(*:1074)|/edit(*:1088)|(*:1097))))|/_dusk/(?|log(?|in/([^/]++)(?:/([^/]++))?(*:1150)|out(?:/([^/]++))?(*:1176))|user(?:/([^/]++))?(*:1204))|/password/reset/([^/]++)(*:1238)|/superset/([^/]++)(*:1265)|/uamp/([^/]++)(*:1288))/?$}sDu',
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
      82 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridEditing.show',
          ),
          1 => 
          array (
            0 => 'gridEditing',
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
      94 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridEditing.edit',
          ),
          1 => 
          array (
            0 => 'gridEditing',
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
      101 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridEditing.update',
          ),
          1 => 
          array (
            0 => 'gridEditing',
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
            '_route' => 'gridEditing.destroy',
          ),
          1 => 
          array (
            0 => 'gridEditing',
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
      146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacilityRequestByUser.show',
          ),
          1 => 
          array (
            0 => 'gridFacilityRequestByUser',
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
      159 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacilityRequestByUser.edit',
          ),
          1 => 
          array (
            0 => 'gridFacilityRequestByUser',
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
      167 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacilityRequestByUser.update',
          ),
          1 => 
          array (
            0 => 'gridFacilityRequestByUser',
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
            '_route' => 'gridFacilityRequestByUser.destroy',
          ),
          1 => 
          array (
            0 => 'gridFacilityRequestByUser',
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
      188 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacility.show',
          ),
          1 => 
          array (
            0 => 'gridFacility',
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
      201 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacility.edit',
          ),
          1 => 
          array (
            0 => 'gridFacility',
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
      209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridFacility.update',
          ),
          1 => 
          array (
            0 => 'gridFacility',
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
            '_route' => 'gridFacility.destroy',
          ),
          1 => 
          array (
            0 => 'gridFacility',
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
            '_route' => 'gridScenarioFacilityStage.show',
          ),
          1 => 
          array (
            0 => 'gridScenarioFacilityStage',
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
      268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenarioFacilityStage.edit',
          ),
          1 => 
          array (
            0 => 'gridScenarioFacilityStage',
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
      276 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenarioFacilityStage.update',
          ),
          1 => 
          array (
            0 => 'gridScenarioFacilityStage',
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
            '_route' => 'gridScenarioFacilityStage.destroy',
          ),
          1 => 
          array (
            0 => 'gridScenarioFacilityStage',
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
      297 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenario.show',
          ),
          1 => 
          array (
            0 => 'gridScenario',
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
      310 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenario.edit',
          ),
          1 => 
          array (
            0 => 'gridScenario',
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
      318 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridScenario.update',
          ),
          1 => 
          array (
            0 => 'gridScenario',
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
            '_route' => 'gridScenario.destroy',
          ),
          1 => 
          array (
            0 => 'gridScenario',
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
      361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassEditing.show',
          ),
          1 => 
          array (
            0 => 'gridAppClassEditing',
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
      374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassEditing.edit',
          ),
          1 => 
          array (
            0 => 'gridAppClassEditing',
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
      382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassEditing.update',
          ),
          1 => 
          array (
            0 => 'gridAppClassEditing',
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
            '_route' => 'gridAppClassEditing.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppClassEditing',
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
      412 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassAttribute.show',
          ),
          1 => 
          array (
            0 => 'gridAppClassAttribute',
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
      425 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassAttribute.edit',
          ),
          1 => 
          array (
            0 => 'gridAppClassAttribute',
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
      433 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppClassAttribute.update',
          ),
          1 => 
          array (
            0 => 'gridAppClassAttribute',
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
            '_route' => 'gridAppClassAttribute.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppClassAttribute',
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
      462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGrid.show',
          ),
          1 => 
          array (
            0 => 'gridAppGrid',
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
      475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGrid.edit',
          ),
          1 => 
          array (
            0 => 'gridAppGrid',
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
      483 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGrid.update',
          ),
          1 => 
          array (
            0 => 'gridAppGrid',
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
            '_route' => 'gridAppGrid.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppGrid',
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
      513 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGridAttribute.show',
          ),
          1 => 
          array (
            0 => 'gridAppGridAttribute',
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
      526 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGridAttribute.edit',
          ),
          1 => 
          array (
            0 => 'gridAppGridAttribute',
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
      534 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppGridAttribute.update',
          ),
          1 => 
          array (
            0 => 'gridAppGridAttribute',
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
            '_route' => 'gridAppGridAttribute.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppGridAttribute',
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
      563 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppForm.show',
          ),
          1 => 
          array (
            0 => 'gridAppForm',
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
      576 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppForm.edit',
          ),
          1 => 
          array (
            0 => 'gridAppForm',
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
      584 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppForm.update',
          ),
          1 => 
          array (
            0 => 'gridAppForm',
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
            '_route' => 'gridAppForm.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppForm',
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
      614 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppFormAttribute.show',
          ),
          1 => 
          array (
            0 => 'gridAppFormAttribute',
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
      627 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppFormAttribute.edit',
          ),
          1 => 
          array (
            0 => 'gridAppFormAttribute',
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
      635 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppFormAttribute.update',
          ),
          1 => 
          array (
            0 => 'gridAppFormAttribute',
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
            '_route' => 'gridAppFormAttribute.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppFormAttribute',
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
      668 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeNode.show',
          ),
          1 => 
          array (
            0 => 'gridAppTreeNode',
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
      681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeNode.edit',
          ),
          1 => 
          array (
            0 => 'gridAppTreeNode',
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
      689 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeNode.update',
          ),
          1 => 
          array (
            0 => 'gridAppTreeNode',
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
            '_route' => 'gridAppTreeNode.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppTreeNode',
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
      719 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeDashboard.show',
          ),
          1 => 
          array (
            0 => 'gridAppTreeDashboard',
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
      732 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeDashboard.edit',
          ),
          1 => 
          array (
            0 => 'gridAppTreeDashboard',
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
      740 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gridAppTreeDashboard.update',
          ),
          1 => 
          array (
            0 => 'gridAppTreeDashboard',
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
            '_route' => 'gridAppTreeDashboard.destroy',
          ),
          1 => 
          array (
            0 => 'gridAppTreeDashboard',
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
      774 => 
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
      787 => 
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
      795 => 
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
      837 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getAppMapLink.show',
          ),
          1 => 
          array (
            0 => 'getAppMapLink',
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
      850 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getAppMapLink.edit',
          ),
          1 => 
          array (
            0 => 'getAppMapLink',
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
      858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getAppMapLink.update',
          ),
          1 => 
          array (
            0 => 'getAppMapLink',
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
            '_route' => 'getAppMapLink.destroy',
          ),
          1 => 
          array (
            0 => 'getAppMapLink',
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
      891 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapStyles.show',
          ),
          1 => 
          array (
            0 => 'mapStyle',
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
      904 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapStyles.edit',
          ),
          1 => 
          array (
            0 => 'mapStyle',
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
      912 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapStyles.update',
          ),
          1 => 
          array (
            0 => 'mapStyle',
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
            '_route' => 'mapStyles.destroy',
          ),
          1 => 
          array (
            0 => 'mapStyle',
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
      939 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapLayers.show',
          ),
          1 => 
          array (
            0 => 'mapLayer',
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
      952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapLayers.edit',
          ),
          1 => 
          array (
            0 => 'mapLayer',
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
      960 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mapLayers.update',
          ),
          1 => 
          array (
            0 => 'mapLayer',
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
            '_route' => 'mapLayers.destroy',
          ),
          1 => 
          array (
            0 => 'mapLayer',
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
      983 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sQswoQz844O2VZq3',
          ),
          1 => 
          array (
            0 => 'map_id',
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
      1018 => 
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
      1032 => 
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
      1041 => 
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
      1074 => 
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
      1088 => 
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
      1097 => 
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
      1150 => 
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
      1176 => 
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
      1204 => 
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
      1238 => 
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
      1265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q4j4BHTNRJaCBU2q',
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
      1288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k7og7cfqoaV80pIL',
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
    'generated::5NO66M2UdNC64Pf1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oracle',
      'action' => 
      array (
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:941:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:725:"function () {

    try {
        
        // Execute the stored procedure within the specified schema
        $results = \\DB::executeProcedure(\'MASTER_APP.POP_ALL_SEC_CACHE\');

    
        // Return true if the procedure executes successfully
        return \\response([
            \'success\'   => \'ffff\',
            // \'message\'   => App::get()
        ]);

    } catch (\\Exception $e) {

       
        // Log the error message
        \\Log::error(\'Error executing stored procedure MASTER_APP.POP_ALL_SEC_CACHE: \' . $e->getMessage());
        
        // Optionally, handle the exception (e.g., return false or throw the exception)
        return false; // or throw $e; if you want to propagate the exception
    }
    
}";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000006c80000000000000000";}";s:4:"hash";s:44:"4uNew5LCzeX7MXZZcYJue795R2WcJGoZ+XpNoUZxaiQ=";}}',
        'as' => 'generated::5NO66M2UdNC64Pf1',
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
    'generated::90rHupGzyvsbGQ1W' => 
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
        'as' => 'generated::90rHupGzyvsbGQ1W',
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

}";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000006cd0000000000000000";}";s:4:"hash";s:44:"gnv9v59/yxU0Nnsw5XAMAhJ0fKeWaNwFEzo+FnWvJD4=";}}',
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
    'generated::37qvMMnKVZ2UpkCJ' => 
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
        'as' => 'generated::37qvMMnKVZ2UpkCJ',
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
    'generated::nHzclPpkOdKzEZmr' => 
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
        'as' => 'generated::nHzclPpkOdKzEZmr',
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
    'generated::MCieJOn1AFr3WZlv' => 
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
        'as' => 'generated::MCieJOn1AFr3WZlv',
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
    'generated::Buw279l0kTmsQX61' => 
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
        'as' => 'generated::Buw279l0kTmsQX61',
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
    'generated::oGxdSyTJQNsr9sYW' => 
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
        'as' => 'generated::oGxdSyTJQNsr9sYW',
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
    'generated::XMRcGAk17bv2xEzt' => 
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
        'as' => 'generated::XMRcGAk17bv2xEzt',
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
    'generated::hNUxqilvp8N8Ytjk' => 
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
        'as' => 'generated::hNUxqilvp8N8Ytjk',
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
    'generated::7q8FSODO4HPqk7aT' => 
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
        'as' => 'generated::7q8FSODO4HPqk7aT',
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
    'generated::ygfKDOVAjYjrjyww' => 
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
        'as' => 'generated::ygfKDOVAjYjrjyww',
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
    'generated::5SFO5W6vpXl3pgRP' => 
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
        'as' => 'generated::5SFO5W6vpXl3pgRP',
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
    'generated::JJTqpKG6dSabKByE' => 
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
        'as' => 'generated::JJTqpKG6dSabKByE',
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
    'generated::UkrwkoUP6SqPntBB' => 
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
        'as' => 'generated::UkrwkoUP6SqPntBB',
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
    'generated::uex3NXQiRfFwFmWY' => 
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
        'as' => 'generated::uex3NXQiRfFwFmWY',
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
    'generated::drbh3Om1moaIeMey' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getGridAppClass',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridAppClass',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridAppClass',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::drbh3Om1moaIeMey',
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
    'generated::vqTfoVruclH1j2db' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getDataSources',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getDataSources',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getDataSources',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vqTfoVruclH1j2db',
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
    'generated::ddJvFRWYIBVUp8hf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getAllClasses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getAllClasses',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getAllClasses',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ddJvFRWYIBVUp8hf',
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
    'generated::Ot0N64mfA5vZGhdN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getGridAttributeFromClassAttribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridAttributeFromClassAttribute',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridAttributeFromClassAttribute',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Ot0N64mfA5vZGhdN',
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
    'generated::88RvxpFgdn0PhRPu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getGridTypeEditing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridTypeEditing',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridTypeEditing',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::88RvxpFgdn0PhRPu',
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
    'generated::GFbN4yr3vEQvP1UN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridEditing/test',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@gridTest',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@gridTest',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GFbN4yr3vEQvP1UN',
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
    'generated::DbJUzwqEmm2m14lX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getAllMetaDataTypesFromLookups',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getAllMetaDataTypesFromLookups',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getAllMetaDataTypesFromLookups',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::DbJUzwqEmm2m14lX',
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
    'generated::p6KpCyDIyHQSYRWt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/data/getFacilityType',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getFacilityType',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getFacilityType',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::p6KpCyDIyHQSYRWt',
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
    'generated::2lEMkxFQk5MkYDLy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/data/getMunicipalities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getMunicipalities',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getMunicipalities',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2lEMkxFQk5MkYDLy',
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
    'generated::7s64bkFDyeSigUM6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridItems',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridItems',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridItems',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::7s64bkFDyeSigUM6',
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
    'generated::4tB5pF8e2xmi8wQ4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridItems/beds',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridItemsBeds',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridItemsBeds',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4tB5pF8e2xmi8wQ4',
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
    'generated::tC0s6gLLTNhph9Ml' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridItems/maintenance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridItemsMaintenance',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridItemsMaintenance',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::tC0s6gLLTNhph9Ml',
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
    'generated::OjDbXkJL3J7X8EV5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAttributes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridAttributes',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@getGridAttributes',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OjDbXkJL3J7X8EV5',
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
    'gridEditing.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridEditing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridEditing.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@index',
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
    'gridEditing.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridEditing/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridEditing.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@create',
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
    'gridEditing.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridEditing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridEditing.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@store',
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
    'gridEditing.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridEditing/{gridEditing}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridEditing.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@show',
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
    'gridEditing.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridEditing/{gridEditing}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridEditing.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@edit',
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
    'gridEditing.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridEditing/{gridEditing}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridEditing.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@update',
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
    'gridEditing.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridEditing/{gridEditing}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridEditing.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@destroy',
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
    'gridFacilityRequestByUser.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacilityRequestByUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacilityRequestByUser.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@index',
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
    'gridFacilityRequestByUser.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacilityRequestByUser/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacilityRequestByUser.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@create',
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
    'gridFacilityRequestByUser.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridFacilityRequestByUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacilityRequestByUser.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@store',
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
    'gridFacilityRequestByUser.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacilityRequestByUser/{gridFacilityRequestByUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacilityRequestByUser.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@show',
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
    'gridFacilityRequestByUser.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacilityRequestByUser/{gridFacilityRequestByUser}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacilityRequestByUser.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@edit',
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
    'gridFacilityRequestByUser.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridFacilityRequestByUser/{gridFacilityRequestByUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacilityRequestByUser.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@update',
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
    'gridFacilityRequestByUser.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridFacilityRequestByUser/{gridFacilityRequestByUser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacilityRequestByUser.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityRequestByUserController@destroy',
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
    'gridFacility.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacility',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacility.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@index',
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
    'gridFacility.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacility/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacility.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@create',
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
    'gridFacility.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridFacility',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacility.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@store',
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
    'gridFacility.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacility/{gridFacility}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacility.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@show',
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
    'gridFacility.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridFacility/{gridFacility}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacility.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@edit',
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
    'gridFacility.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridFacility/{gridFacility}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacility.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@update',
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
    'gridFacility.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridFacility/{gridFacility}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridFacility.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridFacilityController@destroy',
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
    'gridScenarioFacilityStage.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenarioFacilityStage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridScenarioFacilityStage.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@index',
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
    'gridScenarioFacilityStage.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenarioFacilityStage/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridScenarioFacilityStage.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@create',
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
    'gridScenarioFacilityStage.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridScenarioFacilityStage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridScenarioFacilityStage.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@store',
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
    'gridScenarioFacilityStage.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenarioFacilityStage/{gridScenarioFacilityStage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridScenarioFacilityStage.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@show',
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
    'gridScenarioFacilityStage.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenarioFacilityStage/{gridScenarioFacilityStage}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridScenarioFacilityStage.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@edit',
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
    'gridScenarioFacilityStage.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridScenarioFacilityStage/{gridScenarioFacilityStage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridScenarioFacilityStage.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@update',
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
    'gridScenarioFacilityStage.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridScenarioFacilityStage/{gridScenarioFacilityStage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
        ),
        'as' => 'gridScenarioFacilityStage.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioFacilityStageController@destroy',
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
    'generated::M7l6d6TWrSjoIGe3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/data/updateFacilityCoordinates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureFacilityEditor',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@updateFacilityCoordinates',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridEditingController@updateFacilityCoordinates',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::M7l6d6TWrSjoIGe3',
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
    'gridScenario.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'as' => 'gridScenario.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@index',
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
    'gridScenario.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenario/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'as' => 'gridScenario.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@create',
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
    'gridScenario.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridScenario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'as' => 'gridScenario.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@store',
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
    'gridScenario.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenario/{gridScenario}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'as' => 'gridScenario.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@show',
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
    'gridScenario.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridScenario/{gridScenario}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'as' => 'gridScenario.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@edit',
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
    'gridScenario.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridScenario/{gridScenario}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'as' => 'gridScenario.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@update',
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
    'gridScenario.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridScenario/{gridScenario}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'as' => 'gridScenario.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@destroy',
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
    'generated::mO2m0vG0exK8SRGd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getScenario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@getScenario',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@getScenario',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mO2m0vG0exK8SRGd',
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
    'generated::xZL3YvGJizDAOiKu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getScenarioPlain',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureIsInfrastructurePlannerAndStrategicPlanner',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@getScenarioPlain',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridScenarioPlanningController@getScenarioPlain',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xZL3YvGJizDAOiKu',
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
    'gridAppClassEditing.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassEditing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassEditing.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@index',
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
    'gridAppClassEditing.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassEditing/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassEditing.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@create',
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
    'gridAppClassEditing.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppClassEditing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassEditing.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@store',
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
    'gridAppClassEditing.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassEditing/{gridAppClassEditing}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassEditing.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@show',
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
    'gridAppClassEditing.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassEditing/{gridAppClassEditing}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassEditing.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@edit',
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
    'gridAppClassEditing.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppClassEditing/{gridAppClassEditing}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassEditing.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@update',
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
    'gridAppClassEditing.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppClassEditing/{gridAppClassEditing}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassEditing.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassController@destroy',
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
    'gridAppClassAttribute.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassAttribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassAttribute.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@index',
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
    'gridAppClassAttribute.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassAttribute/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassAttribute.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@create',
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
    'gridAppClassAttribute.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppClassAttribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassAttribute.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@store',
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
    'gridAppClassAttribute.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassAttribute/{gridAppClassAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassAttribute.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@show',
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
    'gridAppClassAttribute.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppClassAttribute/{gridAppClassAttribute}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassAttribute.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@edit',
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
    'gridAppClassAttribute.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppClassAttribute/{gridAppClassAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassAttribute.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@update',
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
    'gridAppClassAttribute.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppClassAttribute/{gridAppClassAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppClassAttribute.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppClassAttributeController@destroy',
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
    'gridAppGrid.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGrid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGrid.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@index',
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
    'gridAppGrid.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGrid/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGrid.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@create',
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
    'gridAppGrid.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppGrid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGrid.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@store',
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
    'gridAppGrid.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGrid/{gridAppGrid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGrid.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@show',
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
    'gridAppGrid.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGrid/{gridAppGrid}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGrid.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@edit',
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
    'gridAppGrid.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppGrid/{gridAppGrid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGrid.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@update',
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
    'gridAppGrid.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppGrid/{gridAppGrid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGrid.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridController@destroy',
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
    'gridAppGridAttribute.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGridAttribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGridAttribute.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@index',
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
    'gridAppGridAttribute.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGridAttribute/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGridAttribute.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@create',
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
    'gridAppGridAttribute.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppGridAttribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGridAttribute.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@store',
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
    'gridAppGridAttribute.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGridAttribute/{gridAppGridAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGridAttribute.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@show',
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
    'gridAppGridAttribute.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppGridAttribute/{gridAppGridAttribute}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGridAttribute.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@edit',
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
    'gridAppGridAttribute.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppGridAttribute/{gridAppGridAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGridAttribute.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@update',
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
    'gridAppGridAttribute.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppGridAttribute/{gridAppGridAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppGridAttribute.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppGridAttributesController@destroy',
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
    'gridAppForm.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppForm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppForm.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@index',
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
    'gridAppForm.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppForm/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppForm.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@create',
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
    'gridAppForm.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppForm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppForm.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@store',
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
    'gridAppForm.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppForm/{gridAppForm}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppForm.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@show',
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
    'gridAppForm.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppForm/{gridAppForm}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppForm.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@edit',
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
    'gridAppForm.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppForm/{gridAppForm}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppForm.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@update',
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
    'gridAppForm.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppForm/{gridAppForm}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppForm.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormController@destroy',
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
    'gridAppFormAttribute.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppFormAttribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppFormAttribute.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@index',
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
    'gridAppFormAttribute.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppFormAttribute/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppFormAttribute.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@create',
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
    'gridAppFormAttribute.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppFormAttribute',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppFormAttribute.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@store',
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
    'gridAppFormAttribute.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppFormAttribute/{gridAppFormAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppFormAttribute.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@show',
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
    'gridAppFormAttribute.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppFormAttribute/{gridAppFormAttribute}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppFormAttribute.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@edit',
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
    'gridAppFormAttribute.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppFormAttribute/{gridAppFormAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppFormAttribute.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@update',
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
    'gridAppFormAttribute.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppFormAttribute/{gridAppFormAttribute}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppFormAttribute.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppFormAttributesController@destroy',
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
    'gridAppTreeNode.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeNode',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeNode.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@index',
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
    'gridAppTreeNode.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeNode/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeNode.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@create',
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
    'gridAppTreeNode.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppTreeNode',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeNode.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@store',
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
    'gridAppTreeNode.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeNode/{gridAppTreeNode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeNode.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@show',
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
    'gridAppTreeNode.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeNode/{gridAppTreeNode}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeNode.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@edit',
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
    'gridAppTreeNode.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppTreeNode/{gridAppTreeNode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeNode.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@update',
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
    'gridAppTreeNode.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppTreeNode/{gridAppTreeNode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeNode.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeNode@destroy',
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
    'gridAppTreeDashboard.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeDashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeDashboard.index',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@index',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@index',
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
    'gridAppTreeDashboard.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeDashboard/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeDashboard.create',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@create',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@create',
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
    'gridAppTreeDashboard.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/gridAppTreeDashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeDashboard.store',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@store',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@store',
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
    'gridAppTreeDashboard.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeDashboard/{gridAppTreeDashboard}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeDashboard.show',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@show',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@show',
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
    'gridAppTreeDashboard.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gridAppTreeDashboard/{gridAppTreeDashboard}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeDashboard.edit',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@edit',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@edit',
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
    'gridAppTreeDashboard.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/gridAppTreeDashboard/{gridAppTreeDashboard}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeDashboard.update',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@update',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@update',
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
    'gridAppTreeDashboard.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/gridAppTreeDashboard/{gridAppTreeDashboard}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'gridAppTreeDashboard.destroy',
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@destroy',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@destroy',
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
    'generated::WKLWqkBuEKiLDynu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/uploadDashboardImage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@uploadDashboardImage',
        'controller' => 'Hip\\GridEditing\\Http\\Controllers\\GridAppTreeDashboard@uploadDashboardImage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::WKLWqkBuEKiLDynu',
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
    'generated::QJtcLogUuZpIos6I' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/dimtest',
      'action' => 
      array (
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:548:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:332:"function () {
    // SQL query using INFORMATION_SCHEMA
    $query = "
        SELECT COLUMN_NAME, DATA_TYPE
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = ?
    ";

    // Execute the query
    $columns = \\DB::connection(\'oracleSpatial\')->select($query, [\'DIM_Road\']);

    return \\response()->json($columns);
}";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000006d40000000000000000";}";s:4:"hash";s:44:"igGjycXCxC1lY1+8a8juChuFMagLuFRQ13oYxEolLJ0=";}}',
        'as' => 'generated::QJtcLogUuZpIos6I',
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
    'getAppMapLink.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/getAppMapLink',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getAppMapLink.index',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@index',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@index',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'getAppMapLink.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/getAppMapLink/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getAppMapLink.create',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@create',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@create',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'getAppMapLink.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/map/getAppMapLink',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getAppMapLink.store',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@store',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@store',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'getAppMapLink.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/getAppMapLink/{getAppMapLink}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getAppMapLink.show',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@show',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@show',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'getAppMapLink.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/getAppMapLink/{getAppMapLink}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getAppMapLink.edit',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@edit',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@edit',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'getAppMapLink.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/map/getAppMapLink/{getAppMapLink}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getAppMapLink.update',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@update',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@update',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'getAppMapLink.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/map/getAppMapLink/{getAppMapLink}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'getAppMapLink.destroy',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@destroy',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapLinkController@destroy',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapStyles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapStyles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapStyles.index',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@index',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@index',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapStyles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapStyles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapStyles.create',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@create',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@create',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapStyles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/map/mapStyles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapStyles.store',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@store',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@store',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapStyles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapStyles/{mapStyle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapStyles.show',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@show',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@show',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapStyles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapStyles/{mapStyle}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapStyles.edit',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@edit',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@edit',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapStyles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/map/mapStyles/{mapStyle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapStyles.update',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@update',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@update',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapStyles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/map/mapStyles/{mapStyle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapStyles.destroy',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@destroy',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@destroy',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'generated::Ax5oUyOlMhXNQgJg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/getAppMapStyles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@getAppMapStyles',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\AppMapStyleController@getAppMapStyles',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Ax5oUyOlMhXNQgJg',
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
    'mapLayers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapLayers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapLayers.index',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@index',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@index',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapLayers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapLayers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapLayers.create',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@create',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@create',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapLayers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/map/mapLayers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapLayers.store',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@store',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@store',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapLayers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapLayers/{mapLayer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapLayers.show',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@show',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@show',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapLayers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/mapLayers/{mapLayer}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapLayers.edit',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@edit',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@edit',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapLayers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/map/mapLayers/{mapLayer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapLayers.update',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@update',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@update',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'mapLayers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/map/mapLayers/{mapLayer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'as' => 'mapLayers.destroy',
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@destroy',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\MapLayerController@destroy',
        'namespace' => NULL,
        'prefix' => '/api/map',
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
    'generated::HvUiQM0ZR3MXbItk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/tree',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\PackageMapsController@getStructure',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\PackageMapsController@getStructure',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HvUiQM0ZR3MXbItk',
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
    'generated::sQswoQz844O2VZq3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/map/tree/{map_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\PackageMapsController@removeMap',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\PackageMapsController@removeMap',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::sQswoQz844O2VZq3',
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
    'generated::OQu8tSy2DkQjEqOt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/map/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'auth:sanctum',
          1 => 'ensureAdmin',
        ),
        'uses' => 'Hip\\PackageMapManagement\\Http\\Controllers\\PackageMapsController@createMap',
        'controller' => 'Hip\\PackageMapManagement\\Http\\Controllers\\PackageMapsController@createMap',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OQu8tSy2DkQjEqOt',
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
    'generated::Bq7hqWMttdEep2uk' => 
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
        'as' => 'generated::Bq7hqWMttdEep2uk',
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
    'generated::SZYN1XWDW4fMsEmR' => 
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
        'as' => 'generated::SZYN1XWDW4fMsEmR',
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
    'generated::yGdJ4tlApJeoAPWY' => 
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
        'as' => 'generated::yGdJ4tlApJeoAPWY',
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
    'generated::AfqLqLGHJmlkyEgi' => 
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
        'as' => 'generated::AfqLqLGHJmlkyEgi',
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
    'generated::IXbKkKg6Pkr85HO3' => 
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
        'as' => 'generated::IXbKkKg6Pkr85HO3',
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
    'generated::LaueSuxjGZZYnyON' => 
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
        'as' => 'generated::LaueSuxjGZZYnyON',
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
    'generated::NANfjK6rrMa7Ne0m' => 
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
        'as' => 'generated::NANfjK6rrMa7Ne0m',
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
    'generated::B4Nk4FiXrCaylipS' => 
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
        'as' => 'generated::B4Nk4FiXrCaylipS',
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
    'generated::Zk8jV6J84J1xyKfd' => 
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
        'as' => 'generated::Zk8jV6J84J1xyKfd',
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
    'generated::Z4VLC9Q3If6DzyWO' => 
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
        'as' => 'generated::Z4VLC9Q3If6DzyWO',
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
    'generated::04uTdasJ140i7vV5' => 
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
        'as' => 'generated::04uTdasJ140i7vV5',
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
    'generated::x1T4UHxltNlA2Iu0' => 
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
        'as' => 'generated::x1T4UHxltNlA2Iu0',
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
    'generated::8nqiJ8Jk29JYFVwU' => 
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
        'as' => 'generated::8nqiJ8Jk29JYFVwU',
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
    'generated::1TUspdbCLtkmSswI' => 
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
        'as' => 'generated::1TUspdbCLtkmSswI',
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
    'generated::0lsoEHK2b83DaDMa' => 
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
        'as' => 'generated::0lsoEHK2b83DaDMa',
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
    'generated::K3BTBiPa55Z4DBt6' => 
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
        'as' => 'generated::K3BTBiPa55Z4DBt6',
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
    'generated::vzpez9U9t6E7XwlQ' => 
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
        'as' => 'generated::vzpez9U9t6E7XwlQ',
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
    'generated::bwZhULrDQXtvsixf' => 
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
        'as' => 'generated::bwZhULrDQXtvsixf',
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
    'generated::KIYhaGbguABa1VRx' => 
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
        'as' => 'generated::KIYhaGbguABa1VRx',
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
    'generated::jIIjrs7LWu9eqzhj' => 
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
        'as' => 'generated::jIIjrs7LWu9eqzhj',
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
    'generated::45NnZyP6V1U2OLb9' => 
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
        'as' => 'generated::45NnZyP6V1U2OLb9',
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
    'generated::CYNJrXbdfFoRsVDc' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000b660000000000000000";}";s:4:"hash";s:44:"Jd35gSRDUArNbRTM3ugUemxGXt+31GaEDUefOIHdVn0=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CYNJrXbdfFoRsVDc',
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
    'generated::YHhPa9eYhZcsVIGH' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000b680000000000000000";}";s:4:"hash";s:44:"Hc+FKsbzrkfPaANEoM6alQXWhVcoJFx6lLRhuLcEsEE=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YHhPa9eYhZcsVIGH',
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
    'generated::QxB28I1qoh6rtFNc' => 
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
        'as' => 'generated::QxB28I1qoh6rtFNc',
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
    'generated::0w4gjQEyKKh3mAfW' => 
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
        'as' => 'generated::0w4gjQEyKKh3mAfW',
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
    'generated::lznJc5EeY6M4Pgj4' => 
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
        'as' => 'generated::lznJc5EeY6M4Pgj4',
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
    'generated::Q4j4BHTNRJaCBU2q' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000b6a0000000000000000";}";s:4:"hash";s:44:"7+UC1XLfGZE0k3QeNb+dxwu5e/sP9M8Fawnsa1szF0I=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Q4j4BHTNRJaCBU2q',
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
    'generated::k7og7cfqoaV80pIL' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000b710000000000000000";}";s:4:"hash";s:44:"o58tRjXpfyZ6VV8n7vGuueyYr8RLjX0+FdLnSAjkfxU=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::k7og7cfqoaV80pIL',
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
