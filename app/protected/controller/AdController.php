<?php
Doo::loadController('SiteController');

class AdController extends SiteController{

    public function index()
    {
    	$this->h1 = 'ListAds';
    	$this->pageTitle = 'Ads';
    	
    	Doo::loadModel('Ad');
    	$ad = new Ad();
    	$options['desc'] = 'id';
    	$options['limit'] = '2';
    	
    	$this->ads = Doo::db()->find($ad, $options);
    	
//     	$this->r('ads_index', $ads);
    }
    
    public function addTest()
    {
    	for($i = 1; $i <= 4; $i++)
    	{
	    	Doo::loadModel('Ad');
	    	$ad = new Ad();
	    	$ad->title = 'Test'.$i;
	    	$ad->text = 'text';
	    	$ad->created = date('Y-m-d H:i');
	    	Doo::db()->insert( $ad );
    	}
    	
    	$this->index();
    	$this->r('ad/index');
    }
    
    public function add()
    {
    	$this->_h1 = 'Add Ad';
    }
    
    public function listAds()
    {
    	$this->_h1 = 'ListAds';
    	$this->pageTitle = 'Ads';
    	 
    	Doo::loadModel('Ad');
    	$ad = new Ad();
    	$options['desc'] = 'id';
    	$options['limit'] = '2';
    	 
    	$ads = Doo::db()->find($ad, $options);
    	 
    	$this->r('ads_index', $ads);
//     	$this->view()->renderLayout('layout', 'ads_index', $ads);
    	 
//     	$this->r();
    }
}