<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Baseadmin extends Controller_Template {

	public		$template ;
	protected	$__JS__ ;
	protected	$__CSS__ ;
	protected	$__IMG__ ;
	protected	$_script;
	protected 	$_style;
	
    public function before()
	{
	$this->template 	= "admin/template";
	parent::before();
	//$this->__adm_dir__	= URL::base(true).'public/admin/';
	$this->__JS__	= URL::base(true).'public/admin/js/';
	$this->__CSS__	= URL::base(true).'public/admin/css/';
	$this->__IMG__	= URL::base(true).'public/admin/images/';
	$this->_script = array();
	$this->_style = array();
}
    
    public function after()
    {
    $session = Session::instance();// Get the session instance    
	$username = $session->get('username');
	if (isset($username)) 
	{

		$this->_script = array_merge(array(  
			$this->__JS__.'jquery-2.0.0.min.js',
        ),$this->_script);

		$this->_style = array_merge(array(
			$this->__CSS__.'all.css',
        
        ),$this->_style);

	
		$this->template->style		= $this->_style; 
        $this->template->script		= $this->_script; 
		$this->template->username 	= $username; 
		$this->template->topmenu 	= $this->gen_top_menu();
	
		$this->template->menu = $this->gen_menu();
	}
	else
	{
		// niezalogowany
		header('Location: '.URL::base(true)); exit();
	}
		parent::after();
		
    }    
    
    function gen_state($type,$message)
    { // error / warning / succes
    
		$states = "<ul class=\"states\"><li class=\"".$type."\">".$message.".</li></ul>";
		return $states;						
	}
    
    function gen_menu()
    {
			$adm_path = URL::base(true)."admin/";
			$modelAdmin = new Model_Admin();
			$pobrane = $modelAdmin->get_menu();
			$menu = "";

			foreach ($pobrane as $i)
			{
				$menu .= "<li ";
				if ( strtolower($this->request->controller()) == $i['path']) { $menu .= "class=\"active\"" ; }
				$menu .= "><a href=\"".$adm_path."".$i['path']."\" class=\"ico".$i['id']."\"><span>".$i['name']."</span><em></em></a><span class=\"tooltip\"><span>".$i['name']."</span></span></li>";
				
			}
			
/*				
<li class=\"active\">
<a href="#tab-2" class="ico2"><span>Gallery</span><em></em></a>
<span class="tooltip"><span>Gallery</span></span>
</li>
*/
		return $menu;
	}
    
    function gen_top_menu()
	{
		// $topmenu = '<li><a href="#" class="ico1">Wiadomości <span class="num">26</span></a></li> <li><a href="#" class="ico2">Błędy <span class="num">5</span></a></li> <li><a href="#" class="ico3">Dokumenty <span class="num">3</span></a></li>';
		$topmenu = '';

		return $topmenu;
	}
}

