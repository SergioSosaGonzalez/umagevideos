<?php
namespace Modules\Frontend\Controllers;


use Modules\Models\CdClient;
use Modules\Models\CdCourse;
use Modules\Models\CdLearning;
use Modules\Models\CdRequeriments;
use Modules\Models\CdSubcategory;
use Modules\Models\CdTemary;
use Phalcon\Exception;
use Phalcon\Http\Request;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Auth.php";
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Endpoint.php";

class UserController extends ControllerBase {
    public function indexAction(){
        $auth=$this->session->get('authfront');
        $this->view->setVar("username",$auth['username']);
        $consulta = CdCourse::find("status='ACTIVE'");
        $this->view->setVar("cursos",$consulta);
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

    public function coursesAction(){
        $permalink=$this->dispatcher->getParam('permalink');
        $curso= CdCourse::findFirst("permalink='$permalink'");
        $this->view->setVar("curso",$curso);
        $instructor=CdClient::findFirst("clieid=".$curso->getClieid());
        $this->view->setVar("instructor",$instructor);
        $subcategory=CdSubcategory::findFirst("subid=".$curso->getSubid());
        $this->view->setVar("subcategory",$subcategory);
        $learning= CdLearning::find("couid=".$curso->getCouid());
        $requeriments= CdRequeriments::find("couid=".$curso->getCouid());
        $this->view->setVar("learning",$learning);
        $this->view->setVar("requeriments",$requeriments);
        $temario = CdTemary::find("couid=".$curso->getCouid());
        $this->view->setVar("temario",$temario);
    }




}