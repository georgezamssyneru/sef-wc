<?php

namespace Hip\PackageTree\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppTree;
use App\Models\SecCache;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Http\Request;

class TreeController extends Controller
{

    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function treeTest(Request $request)
    {

        return response()->json([
            'success' => true
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTreeView(Request $request){

        try{

            $treeStructure = array();

            $getTreeArray = array();

            switch ($request->type) {

                case 'grid':

                    $getTreeArray = AppTree::whereIn('tree_id', json_decode( $request->tree_id ) )
                        ->with(
                            'appTreeNode.appTreeNodeContent.contentTypeId',
                            'appTreeNode.appTreeNodeContent.appGrid')
                        ->get()
                        ->toArray();

                    foreach($getTreeArray as &$getTree){

                        foreach($getTree['app_tree_node'] as &$value){

                            if($value['tree_parent_node_id'] == null){

                                $s1 = array(
                                    'tree_id' => $value['tree_node_id'],
                                    'parent_id' => 0,
                                    'name'  => $value['node_name'],
                                    'grid_id' => null
                                );

                                array_push($treeStructure, $s1);

                            }else{

                                $s1 = array(
                                    'tree_id' => $value['tree_node_id'],
                                    'parent_id' => $value['tree_parent_node_id'],
                                    'name'  => $value['node_name'],
                                    'grid_id' => null
                                );

                                array_push($treeStructure, $s1);

                            }

                            foreach($value['app_tree_node_content'] as $vContent){

                                if($vContent['app_grid']){

                                    $s2 = array(
                                        'tree_id' => $vContent['tree_node_content_id'],
                                        'parent_id' => $value['tree_node_id'],
                                        'name'  => ($vContent['app_grid']['grid_name']),
                                        'grid_id' => $vContent['content_id']
                                    );

                                    array_push($treeStructure, $s2);

                                }

                            }

                        };

                    }
                    break;

                case 'dashboard':

                    //  ------------------  CHECK ALL PERMISSIONS
                    $getPermissions = ExternalHelper::getAllPermissions();

                    $getTreeArray = AppTree::whereIn('tree_id', json_decode( $request->tree_id ) )
                         ->with([

                            'appTreeNode.appTreeNodeContent.contentTypeId','appTreeNode.appTreeNodeContent.appDashboard' => function ($query) use($getPermissions) {

                                $query->whereIn('dashboard_id', $getPermissions);

                            }
                        ])
                        ->get()
                        ->toArray();

                    foreach($getTreeArray as &$getTree){

                        foreach($getTree['app_tree_node'] as &$value){

                            if($value['tree_parent_node_id'] == null){

                                $s1 = array(
                                    'tree_id' => $value['tree_node_id'],
                                    'parent_id' => 0,
                                    'name'  => $value['node_name'],
                                    'grid_id' => null
                                );

                                //array_push($treeStructure, $s1);

                            }else{

                                $s1 = array(
                                    'tree_id' => $value['tree_node_id'],
                                    'parent_id' => $value['tree_parent_node_id'],
                                    'name'  => $value['node_name'],
                                    'grid_id' => null
                                );

                                //array_push($treeStructure, $s1);

                            }

                            foreach($value['app_tree_node_content'] as $vContent){

                                if($vContent['app_dashboard']){

                                    $s2 = array(
                                        'tree_id' => $vContent['tree_node_content_id'],
                                        'parent_id' => $value['tree_node_id'],
                                        'name'  => $value['node_name'],
                                        'label'  => $vContent['app_dashboard']['dash_name'],
                                        'description' => $vContent['app_dashboard']['dash_description'] ? $vContent['app_dashboard']['dash_description'] : $value['node_description'],
                                        'dash_type_id' => $vContent['app_dashboard']['dash_type_id'],
                                        'sort_order' => $vContent['app_dashboard']['sort_order'],
                                        'value' => $vContent['app_dashboard']['dash_esri_id'],
                                        'thumbnail_base' => $vContent['thumbnail'],
                                        'thumbnail' => 'https://picsum.photos/200/300'
                                    );

                                    array_push($treeStructure, $s2);

                                }

                            }

                        };

                    }
                    break;

            }

            return response()->json([
                'success' => true,
                'data'=> $treeStructure,
                'tree' => $getTreeArray
            ]);

        }catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                //'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch(\Exception $e){

            //  LOG TO DB
            event( new EventHistory( array(
                //'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);

        }catch (\Throwable $e) {

            //  LOG TO DB
            event( new EventHistory( array(
                //'email'     => auth('sanctum')->user()->sec_user_id,
                'url '      => $request->fullUrl(),
                'error'     => $e->getMessage()
            ),'API_ENDPOINT_ERROR') );

            return response()->json([
                'success' => false,
                'message'=> $e->getMessage()
            ]);
        }

    }

}