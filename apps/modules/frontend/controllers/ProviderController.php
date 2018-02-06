<?php
namespace Modules\Frontend\Controllers;


use Modules\Models\CdCategory;
use Modules\Models\CdClient;
use Modules\Models\CdCourse;
use Modules\Models\CdFiles;
use Modules\Models\CdLearning;
use Modules\Models\CdRequeriments;
use Modules\Models\CdSubcategory;
use Modules\Models\CdSubtemary;
use Modules\Models\CdTemary;
use Modules\Models\CdVideos;
use Phalcon\Exception;
use Phalcon\Http\Request;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Auth.php";
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Endpoint.php";

class ProviderController extends ControllerBase {
    public function indexAction(){
        $consulta = CdCourse::find("status='ACTIVE'");
        $this->view->setVar("cursos",$consulta);
    }

    public function crearcursoAction(){
        $auth= $this->session->get('authfront');
        $course= CdCourse::find("clieid=".$auth['clieid']);
        $this->view->setVar("course",$course);
    }

    public function editcourseAction(){
       $category= CdCategory::find();
       $this->view->setVar("category",$category);
       $id=$this->dispatcher->getParam('courid');
       $this->view->setVar("courseid",$id);
       $course= CdCourse::findFirst("couid=".$id);
       if($course){
           $this->view->setVar("course",$course);
           if(count($course->getSubid())>0){
               $subcategory = CdSubcategory::findFirst("subid=".$course->getSubid());
               if($subcategory){
                   $subcategory2= CdSubcategory::find("catid=".$subcategory->getCatid());
                   $this->view->setVar("subcategory",$subcategory2);
               }
           }
       }
       $learning= CdLearning::find('couid='.$id);
       $requeriments=CdRequeriments::find("couid=".$id);
       $this->view->setVar("learning",$learning);
       $this->view->setVar("requeriments",$requeriments);
    }
    public function newcourseAction(){
        $request= new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        $auth= $this->session->get('authfront');
        $newcourse= new CdCourse();
        $newcourse->save([
            'clieid'=>$auth['clieid'],
            'status'=>'INACTIVE'
        ]);
        $id=0;
        $consulta= CdCourse::find();
        foreach ($consulta as $key):
          $id=$key->getCouid();
        endforeach;
        $this->response(array("message"=>"correcto","id"=>$id),200);
    }

    public function updatecourseAction(){
         $request = new Request();
         if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
          $course= CdCourse::findFirst("couid=".$request->getPost('couid'));
          $course->setName($request->getPost('courseTitle'));
          $course->setPermalink($request->getPost('coursePermalink'));
          $course->setDescription($request->getPost('description2'));
          $course->setMainImage($request->getPost('image-2'));
          $course->setDuration($request->getPost('duration'));
          $course->setPrice($request->getPost('price'));
          $course->setSubid($request->getPost('subid'));
          $course->setSummary($request->getPost('sumary2'));
          $course->setIntroductionVideo($request->getPost('video_introduction'));
          $course->setLenguage($request->getPost('lenguage'));
          $course->save();
          $aprendizaje=$request->getPost('aprendizaje');
          for($i=0;$i<count($aprendizaje);$i++){
              $consulta = CdLearning::findFirst("name='$aprendizaje[$i]'");
              if(!$consulta){
                  $learning = new CdLearning();
                  $learning->save([
                     "name"=>$aprendizaje[$i],
                     "date_creation"=>date("Y:m:d H:i:s"),
                     "couid"=> $request->getPost('couid')
                  ]);
              }
          }
        $requerimientos = $request->getPost('requerimiento');
        for($j=0;$j<count($requerimientos);$j++){
            $consulta2 = CdRequeriments::findFirst("requeriments='$requerimientos[$j]'");
            if(!$consulta2){
                $requirements = new CdRequeriments();
                $requirements->save([
                    "requeriments"=>$requerimientos[$j],
                    "date_creation"=>date("Y:m:d H:i:s"),
                    "couid"=> $request->getPost('couid')
                ]);
            }
        }
        $this->response(array("message"=>"correcto","id"=>$aprendizaje),200);
    }

    public function consultsubcategoryAction(){
        $request= new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        $consulta = CdSubcategory::find('catid='.$request->getPost('catid'));
        $html=array();
        $html[]="<option value=''>Seleccionar subcategoria</option>";
        foreach ($consulta as $key):
          $html[]="<option value=".$key->getSubid().">".$key->getName()."</option>";
        endforeach;

        $this->response(array("message"=>"correcto","html"=>$html),200);
    }

    public function temaryAction(){
        $couid= $this->dispatcher->getParam('couid');
        $temario = CdTemary::find("couid=".$couid);
        $this->view->setVar("temario",$temario);
        $this->view->setVar("couid",$couid);
    }

    public function deletecourseAction(){
        $request= new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
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
        $this->response(array("message"=>"correcto","id"=>$id),200);

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

    public function newtemaryAction(){
       $request = new Request();
       if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
           $temary= new CdTemary();
           $temary->save([
                "title"=>$request->getPost('temtitle'),
                "permalink"=>$request->getPost('titlePermalink'),
                "date_creation"=>date("Y:m:d H:i:s"),
                "couid"=>$request->getPost('couid'),
           ]);
           $id=0;
           $consulta = CdTemary::find();
           foreach ($consulta as $key):
               $id=$key->getTemid();
           endforeach;
       $this->response(array("message"=>"correcto","id"=>$id,"title"=>$request->getPost('temtitle')),200);
    }

    public function consulttemaryAction(){
        $request= new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        if($request->getPost('temid')){
            $consulta = CdTemary::findFirst("temid=".$request->getPost('temid'));
            $this->response(array("message"=>"correcto","title"=>$consulta->getTitle(),"permalink"=>$consulta->getPermalink()),200);
        }elseif($request->getPost('subtemid')){
            $consulta=CdSubtemary::findFirst("sutemid=".$request->getPost('subtemid'));
            $video= CdVideos::findFirst("sutemid=".$request->getPost('subtemid'));
            $this->response(array("message"=>"correcto",
                                  "subtitle"=>$consulta->getSubtitle(),
                                  "permalink"=>$consulta->getPermalink(),
                                  "video"=>$video->getVideo())
                                  ,200);
        }
    }

    public function edittemaryAction(){
        $request= new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        $consulta = CdTemary::findFirst("temid=".$request->getPost('temid'));
         $consulta->setTitle($request->getPost('temtitleEdit'));
         $consulta->setPermalink($request->getPost('titlePermalinkEdit'));
         $consulta->save();
        $this->response(array("message"=>"correcto",
                              "id"=>$consulta->getTemid(),
                              "title"=>$request->getPost('temtitleEdit')),
                              200);

    }

    public function deletescoursesAction(){
        $request= new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        if($request->getPost('temid')){
           $consulta = CdTemary::findFirst('temid='.$request->getPost('temid'));
           $consulta->delete();
           $this->response(array("message"=>"correcto","id"=>$request->getPost('temid')),200);
        }elseif ($request->getPost('subtemid')){
            $videos = CdVideos::findFirst("sutemid=".$request->getPost('subtemid'));
            $videos->delete();
            $consulta = CdSubtemary::findFirst('sutemid='.$request->getPost('subtemid'));
            $consulta->delete();
            $this->response(array("message"=>"correcto","id"=>$request->getPost('subtemid')),200);
        }
        $this->response(array("message"=>"correcto"),200);

    }

    public function subtemaryAction(){
        $id=$this->dispatcher->getParam('temid');
        $this->view->setVar("temid",$id);
        $subtemary= CdSubtemary::find("temid=".$id);
        $this->view->setVar("subtemary",$subtemary);
        $videos = CdVideos::find();
        $this->view->setVar("videos",$videos);


    }

    public function newsubtemaryAction(){
        $request = new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        $subtemary= new CdSubtemary();
        $subtemary->save([
            "subtitle"=>$request->getPost('subtemtitle'),
            "permalink"=>$request->getPost('subtitlePermalink'),
            "date_creation"=>date("Y:m:d H:i:s"),
            "temid"=>$request->getPost('temid'),
        ]);
        $id=0;
        $consulta = CdSubtemary::find();
        foreach ($consulta as $key):
            $id=$key->getSutemid();
        endforeach;
        $videos=new CdVideos();
        $videos->save([
            "title"=>$request->getPost('subtemtitle'),
            "video"=>$request->getPost("image-2"),
            "date_creation"=>date("Y:m:d H:i:s"),
            "sutemid"=>$id
        ]);
        $this->response(array("message"=>"correcto","id"=>$id,"title"=>$request->getPost('subtemtitle'),"video"=>$request->getPost("image-2")),200);
    }

    public function editsubtemaryAction(){
        $request= new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
         $subtemary= CdSubtemary::findFirst('sutemid='.$request->getPost('subtemid'));
         $subtemary->setSubtitle($request->getPost('subtemtitleEdit'));
         $subtemary->setPermalink($request->getPost('subtitlePermalinkEdit'));
         $subtemary->save();
         $videos=CdVideos::findFirst("sutemid=".$request->getPost('subtemid'));
         $videos->setVideo($request->getPost('image-2'));
         $videos->save();
        $this->response(array("message"=>"correcto"),200);
    }

    public function vervideosAction(){
         $id=$this->dispatcher->getParam('subtemid');
         $videos= CdVideos::findFirst("sutemid=".$id);
         $this->view->setVar("videos",$videos);
    }

    public function changestatusAction(){
        $request= new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        $couid=explode("_",$request->getPost('id'));
        $curso= CdCourse::findFirst("couid=".$couid[1]);
        $curso->setStatus('SEND');
        $curso->save();
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