<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Config extends Controller_Admin_Baseadmin {

	
	public function before(){
	parent::before();       
	

	}

	public function action_index()
	{
		$this->template->content = "<h3>Konfiguracja </h3>";
	}

	private function settingsMenu()
	{
			$adminPath = URL::base(true)."admin/";
			$menu  = "";
			$menu .= "<a href= \"".$adminPath."config/\" >Index</a>";
			$menu .= " | ";
			$menu .= "<hr>";
	return $menu;
	}


	public function after()
	{     
	$this->template->title = "Konfiguracja";
	$this->template->desc = "Podstawowe ustawienia systemu zarządzania treścią - mCMS";
	$this->template->settings_menu = $this->settingsMenu();
		
	parent::after();
	}
}
?>
