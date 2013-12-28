<?php
Doo::loadController('SiteController');
Doo::loadModel('ad');

class AdController extends SiteController{

    public function index()
    {
    	$this->h1 = 'ListAds';
    	$this->pageTitle = 'Ads';
    	
    	$ad = new Ad();
    	$options['desc'] = 'created';
    	$options['limit'] = '2';
    	
    	$this->ads = Doo::db()->find($ad, $options);
    	
//     	$this->r('ads_index', $ads);
    }
    
    public function addTest()
    {
    	for($i = 1; $i <= 4; $i++)
    	{
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
    	$this->pageTitle = 'Add Your Own Ad';
    	$this->_h1 = 'Add Ad';
    }
    
    public function listAds()
    {
    	$this->_h1 = 'ListAds';
    	$this->pageTitle = 'Ads';
    	 
    	$ad = new Ad();
    	$options['desc'] = 'id';
    	$options['limit'] = '2';
    	 
    	$ads = Doo::db()->find($ad, $options);
    	 
    	$this->r('ads_index', $ads);
//     	$this->view()->renderLayout('layout', 'ads_index', $ads);
    	 
//     	$this->r();
    }
}