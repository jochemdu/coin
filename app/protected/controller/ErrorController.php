<?php
Doo::loadController('SiteController');
class ErrorController extends SiteController{

    public function index(){
        $this->r('error');
    }
	

}
?>