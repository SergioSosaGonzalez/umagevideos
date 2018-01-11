<?php
namespace Modules\Dashboard\Controllers;
use Phalcon\Assets\Filters\Cssmin;
use Phalcon\Assets\Filters\Jsmin;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller{
   public function initialize(){
       $this->assets->collection('CssDash')
                    ->setTargetPath('dash/css/general.min.css')
                    ->setTargetUri('dash/css/general.min.css')
                    ->addCss('dash/css/bootstrap.min.css')
                    ->addCss('dash/css/font-awesome.min.css')
                    ->addCss('dash/css/main.min.css')
                    ->addCss('dash/css/metisMenu.min.css')
                    ->addCss('dash/css/fullcalendar.min.css')
                    ->addCss('dash/css/style-switcher.css')
                    ->join(true)
                    ->addFilter(new Cssmin());

       $this->assets->collection('JsDash')
           ->setTargetPath('dash/js/general.min.js')
           ->setTargetUri('dash/js/general.min.js')
           ->addJs('dash/js/jquery.min.js')
           ->addJs('dash/js/moment.min.js')
           ->addJs('dash/js/jquery-ui.min.js')
           ->addJs('dash/js/fullcalendar.min.js')
           ->addJs('dash/js/jquery.tablesorter.min.js')
           ->addJs('dash/js/jquery.sparkline.min.js')
           ->addJs('dash/js/jquery.flot.min.js')
           ->addJs('dash/js/jquery.flot.selection.min.js')
           ->addJs('dash/js/jquery.flot.resize.min.js')
           ->addJs('dash/js/bootstrap.min.js')
           ->addJs('dash/js/metisMenu.min.js')
           ->addJs('dash/js/screenfull.min.js')
           ->addJs('dash/js/core.min.js')
           ->addJs('dash/js/app.js')
           ->addJs('dash/js/style-switcher.min.js')
           ->join(true)
           ->addFilter(new Jsmin());
        $this->view->setLayout("index");
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
