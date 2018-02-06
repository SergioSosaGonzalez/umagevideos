<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdCategory;
use Modules\Models\CdCourse;
use Modules\Models\CdSubcategory;
use Modules\Models\CdTemary;
use Phalcon\Http\Request;

include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";


class CoursesController extends ControllerBase{
    public function indexAction(){
       $cursos= CdCourse::find("status='SEND'");
       $this->view->setVar("cursos",$cursos);
    }

    public function vistatemarioAction(){
        $id=$this->dispatcher->getParam('couid');
        $cursosTemary=CdTemary::find("couid=".$id);
        $this->view->setVar("temario",$cursosTemary);
        $curso= CdCourse::findFirst("couid=".$id);
        $this->view->setVar("nombreCurso",$curso->getName());
    }

    public function authorizedcourseAction(){
       $cursos = CdCourse::find("status='ACTIVE'");
       $this->view->setVar("cursos",$cursos);

    }
}