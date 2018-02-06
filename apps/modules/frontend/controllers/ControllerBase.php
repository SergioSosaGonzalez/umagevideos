<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdCategory;
use Phalcon\Mvc\Controller;
class ControllerBase extends Controller
{
    public function initialize()
    {
        $categorias= CdCategory::find();
        $this->view->setVar("categorias",$categorias);
    }
    public function suma($a,$b)
    {
    	return $a+$b;
    }

    public function response($dataArray,$status)
    {
        $this->view->disable();
        if($status==200){
            $this->response->setStatusCode($status, "OK");
        }else{
            $this->response->setStatusCode($status, "ERROR");
        }
        $this->response->setJsonContent($dataArray);
        $this->response->send();
        exit();
    }

    protected function url_clean($string) {
        $string = mb_strtolower(str_replace(' ', '-',str_replace('-','',$string)), 'UTF-8');
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºö]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-',
            '/:/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/!/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/¡/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/@/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/,/'           =>   '', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚¿?]/u'    => '', // Literally a single quote
            '/[“”«»„""]/u'    => '', // Double quote
            '/ /'           =>   '', // nonbreaking space (equiv. to 0x160)
        );
        $string = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\-!¡¿?@]/', '', $string); // Removes special chars.
        return preg_replace(array_keys($utf8),array_values($utf8),$string); // Removes special chars.
        //'/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\-!¡¿?@]/', '',
    }
}
