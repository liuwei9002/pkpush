<?php
/**
 * User: Peter Wang
 * Date: 16/12/9
 * Time: 下午10:15
 */

namespace App\Lib\Handle;


class RouteHandle
{
    public function perform($configAll)
    {
        foreach ($configAll as &$config) {
            $routes = array_isset($config, 'routes');
            if ($routes) {
                $newRoutes = [];
                foreach ($routes as $v) {
                    $method = array_isset($v, 0);
                    $path = array_isset($v, 1);
                    $uses = array_isset($v, 2);
                    $middleware = array_isset($v, 3);
                    $tmp = [];
                    $tmp['method'] = $method;

                    list($modules, $controller, $action) = explode("/", $uses);

                    $controllerTmp = explode("@", $controller);
                    $controllerGroup = array_isset($controllerTmp,0);
                    $controllerSelf = end($controllerTmp);
                    if($controllerSelf != $controllerGroup){
                        $controllerArrTmp = array_map(function($v){
                            return ucwords($v);
                        },$controllerTmp);
                        $controllerStr = implode("\\", $controllerArrTmp);
                    }else{
                        $controllerStr = ucwords($controllerGroup);
                    }

                    if(strtolower($modules) == 'glob'){
                        $realUses = "\\App\\" . ucwords($modules) . "\\Controller\\" . $controllerStr."Controller@" . $action;
                    }else{
                        $realUses = "\\App\\Modules\\" . ucwords($modules) . "\\Controller\\" . $controllerStr."Controller@" . $action;
                    }

                    $tmp['path'] = $path;
                    $tmp['uses'] = $realUses;
                    $tmp['name'] = $uses;
                    $tmp['middleware'] = $middleware;
                    $newRoutes[] = $tmp;
                }
                $config['routes'] = $newRoutes;
            }
        }
        return $configAll;
    }
}