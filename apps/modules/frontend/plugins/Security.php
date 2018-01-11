<?php
namespace Modules\Frontend\Plugins;
use \Phalcon\Events\Event,
    \Phalcon\Mvc\User\Plugin,
    \Phalcon\Mvc\Dispatcher,
    \Phalcon\Acl;

/**
 * Security
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */

class Security extends Plugin {
    public function __construct($dependencyInjector){
        $this->_dependencyInjector = $dependencyInjector;
    }
    public function getAcl(){

        if(!isset($this->persistent->acl)){ /* update values here */
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(Acl::DENY);

            $roles = array(
                "GUEST" => new Acl\Role("GUEST"),
                "USER" => new Acl\Role("USER"),
                "PROVIDER" => new Acl\Role("PROVIDER")
            );
            foreach($roles as $key => $role){
                switch($key){
                    case "GUEST" : $acl->addRole($role);
                        break;
                    case "USER" : $acl->addRole($role,$roles['GUEST']);
                        break;
                    case "PROVIDER" : $acl->addRole($role,$roles['USER']);
                        break;
                }
            }
            //Resources of admin (cms)
            $userResources = array(
                "user"=>array("index","changestatus")
            );
            foreach($userResources as $resource => $actions){
                $acl->addResource(new \Phalcon\Acl\Resource($resource),$actions);
            };
            $providerResources = array(
                "provider"=>array("index",
                    "crearcurso",
                    "editcourse",
                    "consultsubcategory",
                    "validateurl",
                    "updatecourse",
                    "newcourse","temary","newtemary","consulttemary","edittemary","deletescourses",
                    "subtemary","newsubtemary","editsubtemary","vervideos","changestatus"),

            );
            foreach($providerResources as $resource => $actions){
                $acl->addResource(new \Phalcon\Acl\Resource($resource),$actions);
            };
            $publicResources = array(
                "index"=>array('index',"logoutclient","session","authsocial","hybridauth","newclient","loginclient","uploadimage","deleteimage","validateemail"),
            );
            foreach($publicResources as $resource => $actions){
                $acl->addResource(new \Phalcon\Acl\Resource($resource),$actions);
            }
            foreach($publicResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow("GUEST",$resource,$action);
                }
            };
            foreach($userResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow("USER",$resource,$action);
                    $acl->deny("USER","index","index");
                }
            };
            foreach($providerResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow("PROVIDER",$resource,$action);
                    $acl->deny("PROVIDER","index","index");
                    $acl->deny("PROVIDER","user","index");
                }
            };
            //The acl is stored in session, APC would be useful here too
            $this->persistent->acl = $acl;
        }
        return $this->persistent->acl;
    }

    /**
     * This action is executed before execute any action in the application
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get('authfront');
        switch($auth["rol"]){
            case "PROVIDER" : $role = 'PROVIDER';
                break;
            case "USER" : $role = 'USER';
                break;
            default : $role = 'GUEST';
            break;
        }
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        $acl = $this->getAcl();
        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            $this->flash->error("You don't have access to this module");
            if($role==="GUEST"){
                $this->response->redirect("");
            }
            elseif($role==="USER"){
                $this->response->redirect("user");
            }elseif($role==="PROVIDER"){
                $this->response->redirect("instructor");
            }
            return false;
        }
    }
}
