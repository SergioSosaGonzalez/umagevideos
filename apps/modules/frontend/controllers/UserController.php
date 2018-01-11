<?php
namespace Modules\Frontend\Controllers;


use Modules\Models\CdClient;
use Phalcon\Exception;
use Phalcon\Http\Request;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Auth.php";
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Endpoint.php";

class UserController extends ControllerBase {
    public function indexAction(){
        $auth=$this->session->get('authfront');
        $this->view->setVar("username",$auth['username']);
    }

    public function changestatusAction(){
      $request= new Request();
        $auth=$this->session->get('authfront');
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
         $consulta = CdClient::findFirst("clieid=".$request->getPost('id'));
         $consulta->setTypeUser('PROVIDER');
         $consulta->save();
        $this->session->set("authfront",array(
                "clieid" => $consulta->getClieid(),
                "username"=>$consulta->getUsername(),
                "rol"=>'PROVIDER',
                "name"=>$consulta->getNames()
            )
        );
        $this->response(array("message"=>"correcto"),200);
    }





}