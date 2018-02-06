<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdCategory;
use Modules\Models\CdCourse;
use Modules\Models\CdSubtemary;
use Modules\Models\CdTemary;
use Modules\Models\CdVideos;
use Phalcon\Http\Request;

include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";


class IndexController extends ControllerBase{
    public function indexAction(){

    }

    public function validateurlAction(){
        $request = new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        $post = new CdCategory();
        $name_post = $request->getPost("title");
        $new_url = $this->url_clean($name_post);
        $check_url = $post->find("permalink = '$new_url'");
        $count = 1;
        while(count($check_url)){
            $generate_url = $new_url."-".$count;
            $check_url = $post->find("permalink = '$generate_url'");
            if(count($check_url)==0){
                $new_url = $generate_url;
            }
            $count++;
        }
        $this->response(array("message"=>"SUCCESS","new_url"=>$new_url,"code"=>"200","data"=>"url generated"),200);
    }

    public function extrasoperationsAction(){
        $request  = new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        if($request->getPost('id_courses')){
           $consulta = CdCourse::findFirst("couid=".$request->getPost('id_courses'));
           $consulta->setStatus('ACTIVE');
           $consulta->save();
           $this->response(array("message"=>"correcto","id"=>$consulta->getCouid()),200);
        }elseif ($request->getPost('id_courses_delete')){
            $id=$request->getPost('id_courses_delete');
            $cursos=CdCourse::findFirst("couid=".$id);
            $temary =CdTemary::find("couid=".$id);
            foreach ($temary as $cnv):
                $subtemary=CdSubtemary::find("temid=".$cnv->getTemid());
                foreach ($subtemary as $key):
                  $videos=CdVideos::findFirst('sutemid='.$key->getSutemid());
                  unlink("./front/courses_images/".$videos->getVideo());
                  $videos->delete();
                  $key->delete();
                endforeach;
              $cnv->delete();
            endforeach;
            unlink('./front/courses_images/'.$cursos->getMainImage());
            $cursos->delete();
            $this->response(array("message"=>"correcto",
                                  "id"=>$request->getPost('id_courses_delete'))
                                  ,200);
        }
    }
}
