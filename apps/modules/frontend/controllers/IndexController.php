<?php
namespace Modules\Frontend\Controllers;


use Modules\Models\CdClient;
use Modules\Models\CdCourse;
use Modules\Models\CdFiles;
use Modules\Models\CdLearning;
use Modules\Models\CdRequeriments;
use Modules\Models\CdSubcategory;
use Modules\Models\CdTemary;
use Modules\Models\CdVideos;
use Phalcon\Exception;
use Phalcon\Http\Request;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Auth.php";
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Endpoint.php";

class IndexController extends ControllerBase {
    public function indexAction(){
        $consulta = CdCourse::find("status='ACTIVE'");
        $this->view->setVar("cursos",$consulta);
    }
    public function extrasoperationfrontAction(){
        $request=new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        if($request->getPost('idRequeriment')){
            $requeriments=CdRequeriments::findFirst("reqid=".$request->getPost('idRequeriment'));
            $requeriments->delete();
            $this->response(array("message"=>"correcto","id"=>$request->getPost('idRequeriment')),200);
        }elseif ($request->getPost('idlearning')){
            $learning=CdLearning::findFirst("learid=".$request->getPost('idlearning'));
            $learning->delete();
            $this->response(array("message"=>"correcto","id"=>$request->getPost('idlearning')),200);
        }
     }
    public function newclientAction(){
        $request= new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        $clients= new CdClient();
        $pass=$request->getPost('password');
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        $clients->setNames($request->getPost('names'));
        $clients->setLastName($request->getPost('lastnames'));
        $clients->setEmail($request->getPost('email'));
        $clients->setUsername($request->getPost('username'));
        $clients->setPassword($passHash);
        $clients->setTypeUser("USER");
        $clients->save();
        $id=0;
        $consulta = CdClient::find();
        foreach ($consulta as $key):
        $id=$key->getClieid();
        endforeach;
        $consulta2=CdClient::findFirst("clieid=".$id);
        $this->registerSessions($consulta2);
        $this->session->remove("session");
        $this->response(array("message"=>"correcto"),200);
    }

    public function loginclientAction(){
        $request= new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
         $user=$request->getPost('user_login');
         $password=$request->getPost('user_password');
         $consulta = CdClient::findFirst("email='$user'");
         if($consulta)
         {
             if($this->security->checkHash($password,$consulta->getPassword())){
                 $this->registerSessions($consulta);
                 $this->session->remove("session");
                 $this->response(array("message"=>"correcto"),200);
             }
         }else{
             $this->response(array("message"=>"error"),200);
         }
        $this->response(array("message"=>"error"),200);
    }

    public function uploadvideoAction(){
        $request=new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        if($request->hasFiles()==true){
            foreach ($request->getUploadedFiles() as $file){
                $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '', $file->getName());
                $new_image =$image_replace;
                $contador=0;
                while(file_exists("./media/videos/".$new_image)){
                    $contador++;
                    $new_image=$image_replace."_video_$contador";
                }
                if ($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/media/videos/".$new_image)) {
                    $id_image=0;
                    $this->response(array("name" => $new_image,"idGal"=>$id_image ,"message" => "SUCCESS", "code" => "200"), 200);
                } else {
                    $this->response(array("name" => $new_image, "message" => "error try again", "code" => "404"), 200);
                }
            }
        }
    }

    public function uploadfilesAction(){
        $request=new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        if($request->hasFiles()==true){
            foreach ($request->getUploadedFiles() as $file){
                $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '', $file->getName());
                $new_image =$image_replace;
                $contador=0;
                while(file_exists("./media/archivos/".$new_image)){
                    $contador++;
                    $new_image=$image_replace."_archivo_$contador";
                }
                if ($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/media/archivos/".$new_image)) {
                    $id_image=0;
                    $sutemid=0;
                    $archivos=new CdFiles();
                    $archivos->save([
                        "name"=>$new_image,
                        "date_creation"=>date("Y:m:d H:i:s"),
                        "sutemid"=>$request->getPost('file-post')
                    ]);
                    $consulta = CdFiles::find();
                    foreach ($consulta as $key):
                      $id_image=$key->getFilid();
                      $sutemid=$key->getSutemid();
                    endforeach;
                    $this->response(array("name" => $new_image,"idGal"=>$id_image ,'sutemid'=>$sutemid,"message" => "SUCCESS", "code" => "200"), 200);
                } else {
                    $this->response(array("name" => $new_image, "message" => "error try again", "code" => "404"), 200);
                }
            }
        }
    }

    public function uploadimageAction(){
        $request= new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
           if($request->hasFiles()==true){
               foreach ($request->getUploadedFiles() as $file){
                   $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '', $file->getName());
                   $new_image =$image_replace;
                   if ($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/courses_images/".$new_image)) {
                       $id_image=0;
                       $this->response(array("name" => $new_image,"idGal"=>$id_image ,"message" => "SUCCESS", "code" => "200"), 200);
                   } else {
                       $this->response(array("name" => $new_image, "message" => "error try again", "code" => "404"), 200);
                   }
               }
           }
    }
    public function deleteimageAction(){

        $request = $this->request;
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        $image = $request->getPost("image");
        $imagePrincipal = $request->getPost("imagePrincipal");
        $videoIntroduction = $request->getPost("videoIntroduction");
        $material_didactico=$request->getPost('fileid');
        if($image){
            $consulta = CdGallery::findFirst($image);
            $name_image = $consulta->getImg();
            if($consulta->delete()){
                if(file_exists('./dash/courses_images/'.$name_image)){
                    unlink("./dash/courses_images/".$name_image);
                    $this->response(array("message"=>"SUCCESS","code"=>"200"),200);
                }else{
                    $this->response(array("message"=>"error: No se ha encontrado una imagen","code"=>"200"),200);
                }
            }
        }elseif($imagePrincipal){
            $name_image=$imagePrincipal;
            if(file_exists('./front/courses_images/'.$name_image)){
                unlink("./front/courses_images/".$name_image);
                $this->response(array("message"=>"SUCCESS","code"=>"200"),200);
            }else{
                $this->response(array("message"=>"error: No se ha encontrado una imagen","code"=>"200"),200);
            }

        }elseif ($videoIntroduction){
            $name_image=$videoIntroduction;
            if(file_exists('./media/videos/'.$name_image)){
                unlink("./media/videos/".$name_image);
                $this->response(array("message"=>"SUCCESS","code"=>"200"),200);
            }else{
                $this->response(array("message"=>"error: No se ha encontrado una imagen","code"=>"200"),200);
            }
        }elseif ($material_didactico){
            $files= CdFiles::findFirst("filid=".$material_didactico);
            if(file_exists('./media/archivos/'.$files->getName())){
                  unlink('./media/archivos/'.$files->getName());
                  $files->delete();
                  $this->response(array("message"=>"SUCCESS","filid"=>$material_didactico,"code"=>"200"),200);
            }else{
                $this->response(array("message"=>"error: No se ha encontrado una imagen","code"=>"200"),200);
            }
        }elseif($request->getPost('videoEdit')){
            $videos = CdVideos::findFirst("vidid=".$request->getPost('videoEdit'));
            if(file_exists("./media/videos/".$videos->getVideo())){
                unlink('./media/videos/'.$videos->getVideo());
                $videos->setVideo('');
                $this->response(array("message"=>"SUCCESS",
                    "vidid"=>$request->getPost('videoEdit'),
                    "code"=>"200"),200);
            }else{
                $this->response(array("message"=>"ERROR",
                    "vidid"=>$request->getPost('videoEdit'),
                    "code"=>"200"),200);
            }

        }else{
            $this->response(array("message"=>"file null","code"=>"200"),200);
        }
    }


    public function authsocialAction(){
        $login= $this->dispatcher->getParam('login');
        $allow=['Facebook','Google'];
        try{
        if(isset($login)){
            if(in_array($login,$allow)){

                $config=array(
                   "base_url"=>"http://local.umaevideos.com/hybridauth",
                    "providers"=>array(
                        "Facebook"=>array("enabled"=>true, "keys"=>array( "id"=>"326132744545127","secret"=>"0585e51de314dfc9e477f4080f24314a"),
                            "scope"=>"email"),
                        "Google" => array("enabled" => true,"keys" => array("id" => "94948126693-mtp1hamglji4i90ef608vo2bnp12aobb.apps.googleusercontent.com", "secret" => "CPhvRDHOShNa5rEFEaux4FHB"),
                        ),
                    )
                );
                $hybridauth= new \Hybrid_Auth($config);
                $adapter=$hybridauth->authenticate($login);
                $userProfile=$adapter->getUserProfile();

                $consulta= CdClient::findFirst("email='$userProfile->email'");
                if(!$consulta){
                    $client= new CdClient();
                    $client->save([
                       "names"=> $userProfile->firstName,
                       "last_name"=>$userProfile->lastName,
                       "username"=>$userProfile->displayName,
                        "email"=>$userProfile->email,
                        "type_user"=>"USER"
                    ]);
                    $consulta2=CdClient::findFirst("email='$userProfile->email'");
                    $this->registerSessions($consulta2);
                    echo "Reedireccionando...";
                    $this->response->redirect("user");
                    
                }else{
                    echo "Reedireccionando...";
                    $this->registerSessions($consulta);
                    $this->response->redirect("user");
                    //exit();
                }
            }
        }
        }catch(Exception $e){

        }
    }

    public function getUserAuth($service){
    }
    public function hybridauthAction(){

         if(isset($_REQUEST['hauth_start']) || isset($_REQUEST['hauth_done'])){
             \Hybrid_Endpoint::process();
         }
    }

    public function registerSessions($user){
        $this->session->set("authfront",array(
                "clieid" => $user->getClieid(),
                "username"=>$user->getUsername(),
                "rol"=>$user->getTypeUser(),
                "name"=>$user->getNames()
           )
        );
    }

    public function logoutclientAction(){
        $this->session->remove("authfront");
        $this->session->remove("session");
        $this->response->redirect("");
        $this->flash->success('Goodbye!');
    }

public function validateemailAction(){
    $request= new Request();
    if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        if($request->getPost('email')){
            $correo=$request->getPost('email');
            $consulta = CdClient::findFirst("email='$correo'");
            if(!$consulta){
                echo json_encode(true);
                exit();
            }else{
                echo json_encode(false);
                exit();
            }
        }elseif ($request->getPost('username')){
            $username=$request->getPost('username');
            $consulta = CdClient::findFirst("username='$username'");
            if(!$consulta){
                echo json_encode(true);
                exit();
            }else{
                echo json_encode(false);
                exit();
            }
        }
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