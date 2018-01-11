<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdCategory;
use Modules\Models\CdSubcategory;
use Phalcon\Http\Request;

include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";


class CategoryController extends ControllerBase{
    public function indexAction(){
        $consulta = CdCategory::find();
        $this->view->setVar("consulta",$consulta);
    }

    public function newcategoryAction(){
        $request = new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        $category = new CdCategory();
        $category->save([
            "name"=>$request->getPost('category'),
            "permalink"=>$request->getPost('categoryPermalink'),
            "date_creation"=>date('Y:m:d H:i:s')
        ]);
        $consulta=CdCategory::find();
        $id=0;
        foreach ($consulta as $key):
            $id=$key->getCatid();
        endforeach;
        $this->response(array("message"=>"correcto",
                              "id"=>$id,
                               "name"=>$request->getPost('category'),
                               "permalink"=>$request->getPost('categoryPermalink')
                               ),200);
    }

    public function newsubcategoryAction(){
        $request = new Request();
        if(!($request->isPost() and $request->isAjax()))$this->response(array("message"=>"error"),404);
        $subcategory = new CdSubcategory();
        $subcategory->save([
            "name"=>$request->getPost('subcategory'),
            "permalink"=>$request->getPost('subcategoryPermalink'),
            "date_creation"=>date('Y:m:d H:i:s'),
            "catid"=>$request->getPost('catid')
        ]);
        $consulta=CdSubcategory::find();
        $id=0;
        foreach ($consulta as $key):
            $id=$key->getSubid();
        endforeach;
        $this->response(array("message"=>"correcto",
            "id"=>$id,
            "name"=>$request->getPost('subcategory'),
            "permalink"=>$request->getPost('subcategoryPermalink')
        ),200);
    }

    public function seecategoryAction(){
        $request=new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        if($request->getPost('idcategory')){
            $consulta=CdCategory::findFirst("catid=".$request->getPost('idcategory'));
            $this->response(array("message"=>"correcto",
                                  "name"=>$consulta->getName(),
                                  "permalink"=>$consulta->getPermalink()),200);
        }elseif ($request->getPost('idsubcategory')){
            $consulta=CdSubcategory::findFirst("subid=".$request->getPost('idsubcategory'));
            $this->response(array("message"=>"correcto",
                "name"=>$consulta->getName(),
                "permalink"=>$consulta->getPermalink()),200);
        }
    }

    public function editcategoryAction(){
        $request=new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
            $consulta=CdCategory::findFirst("catid=".$request->getPost('idCategory'));
            $consulta->setName($request->getPost('editCategory'));
            $consulta->setPermalink($request->getPost('editCategoryPermalink'));
            $consulta->save();
            $this->response(array("message"=>"correcto",
                                  "id"=>$request->getPost('idCategory'),
                                  "name"=>$request->getPost('editCategory'),
                                  "permalink"=>$request->getPost('editCategoryPermalink')),200);
    }
    public function editsubcategoryAction(){
        $request=new Request();
        if(!($request->isAjax() and $request->isPost()))$this->response(array("message"=>"error"),404);
        $consulta=CdSubcategory::findFirst("subid=".$request->getPost('idSubcategory'));
        $consulta->setName($request->getPost('editSubCategory'));
        $consulta->setPermalink($request->getPost('editSubCategoryPermalink'));
        $consulta->save();
        $this->response(array("message"=>"correcto",
            "id"=>$request->getPost('idSubcategory'),
            "name"=>$request->getPost('editSubCategory'),
            "permalink"=>$request->getPost('editSubCategoryPermalink')),200);
    }

    public function subcategoryAction(){
       $catid= $this->dispatcher->getParam('catid');
       $subcategory= CdSubcategory::find("catid=".$catid);
       $this->view->setVar("subcategory",$subcategory);
       $this->view->setVar("catid",$catid);

    }

}