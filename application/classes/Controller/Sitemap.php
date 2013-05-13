<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sitemap extends Controller_Template {
public $template = 'sitemap/xml';   
	public function before(){    		
		parent::before();
	
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function action_index(){    
$this->response->headers('Content-Type', 'text/xml');
$modelSitemap = new Model_Sitemap();
$post = $modelSitemap->get();
$this->template = View::factory('sitemap/xml')
		->set('post',$post);
    	} // end action index

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function after(){     
		parent::after();
	}
} // end Blog Show

