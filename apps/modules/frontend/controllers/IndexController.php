<?php
namespace Modules\Frontend\Controllers;


use Modules\Models\CdClient;
use Phalcon\Exception;
use Phalcon\Http\Request;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Auth.php";
include dirname(dirname(dirname(dirname(__FILE__))))."/library/hybridauth-2.9.5/hybridauth/Hybrid/Endpoint.php";

class IndexController extends ControllerBase {
    public function indexAction(){
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
    }