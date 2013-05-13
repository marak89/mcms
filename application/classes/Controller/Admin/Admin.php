<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Admin extends Controller_Admin_Baseadmin {

	
	public function before(){
		parent::before();       
	

	}

public function action_index(){   
	
//$this->template->content = "<h3>Treść panelu głównego</h3>";
//$this->template->states = $this->gen_state("warning","Sprawdź ustawienia SEO");

}


	public function after(){     
		
		
	$this->template->title = "Pulpit";
	$this->template->desc = "Tutaj znajduje się podsumowanie działania strony";

		
		
		parent::after();
	}

}
