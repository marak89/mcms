<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

	public		$template ;
	public		$template_name ;
	protected	$_title ;
	protected	$_logo ;
	protected	$_motto ;
	protected	$_keywords ;
	protected	$_description ;
	protected	$_author ;
	protected	$_robots ;
	protected	$_copyright ;
	protected	$_reply_to ;
	protected	$__JS__ ;
	protected	$__CSS__ ;
	protected	$__IMG__ ;
	protected	$__ADM_JS__ ;
	protected	$__ADM_CSS__ ;
	protected	$__ADM_IMG__ ;
    
    public function before()
	{
	
	$modelBase = new Model_Base();

	$this->template_name	= $modelBase->get('template');
	$this->template 	= $this->template_name ."/template";
	parent::before();

	$this->_title		= $modelBase->get('title');
	$this->_logo		= $modelBase->get('logo');
	$this->_motto		= $modelBase->get('motto');
	$this->_keywords	= $modelBase->get('keywords');
	$this->_description 	= $modelBase->get('description');
	$this->_author		= $modelBase->get('author');
	$this->_robots		= $modelBase->get('robots');
	$this->_copyright	= $modelBase->get('copyright');
	$this->_reply_to	= $modelBase->get('reply-to');

	$this->__JS__	= URL::base(true).'public/'.$this->template_name.'/js/';
	$this->__CSS__	= URL::base(true).'public/'.$this->template_name.'/css/';
	$this->__IMG__	= URL::base(true).'public/'.$this->template_name.'/images/';

	$this->__ADM_JS__	= URL::base(true).'public/admin/js/';
	$this->__ADM_CSS__	= URL::base(true).'public/admin/css/';
	$this->__ADM_IMG__	= URL::base(true).'public/admin/images/';
}
    

	

    public function after()
    {
	$_script = array(  
	 	$this->__JS__.'jquery-2.0.0.min.js',
	 	$this->__JS__.'html5.js',
	 	$this->__JS__.'lytebox.js',
	 	$this->__JS__.'cookies.js'
        );

        $_style = array(
		$this->__CSS__.'styles.css',
		$this->__CSS__.'html5.css',
		$this->__CSS__.'cookies.css',
		$this->__CSS__.'lytebox.css'
        );

	$this->template->title		= $this->_title;
	$this->template->logo		= $this->_logo;
	$this->template->motto		= $this->_motto	;
	$this->template->keywords	= $this->_keywords;
	$this->template->description	= $this->_description;
	$this->template->author		= $this->_author;
	$this->template->robots		= $this->_robots;
	$this->template->copyright	= $this->_copyright;
	$this->template->reply_to	= $this->_reply_to;


	$this->template->style		= $_style; 
        $this->template->script		= $_script; 

	$this->template->dir_css	= $this->__CSS__;
	$this->template->dir_js		= $this->__JS__;
	$this->template->dir_img	= $this->__IMG__;

    	$session = Session::instance();// Get the session instance    
	$username = $session->get('username');
	if (isset($username)) 
	{
	$this->template->userAdmBar = View::factory('admin/menu');

        $_adm_style = array(
		$this->__ADM_CSS__.'adminmenu.css'
        );

	$_adm_script = array(  
        );

	$this->template->adm_style		= $_adm_style; 
        $this->template->adm_script		= $_adm_script; 

//"Witaj ".$username.". <a href=\"". url::base()."login/logout\">Wyloguj się</a>.";
	}
	else
	{
	$this->template->userLogBar = "<div id=\"register\"><p>Widzę że nie jesteś zalogowany <a href=\"". url::base()."login\">Zaloguj się</a>.</p></div>";	
	}




	parent::after();
    }    
}

