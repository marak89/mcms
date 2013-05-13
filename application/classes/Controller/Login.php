<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Base {

	public function before(){
		parent::before();        
	}

	public function action_index(){    
		$this->action_login();
    	}

	public function action_login(){
		$modelLogin = new Model_Login();  //tworzymy model
		$err = false;
		if($this->request->post()){ //jesli formularz przesłał dane
			$username = $_POST['username'];			
			$userDetails = 	$modelLogin->login($username); //pobieramy wszystkie dane do widoku			
				if (!isset($userDetails['username'])) 
				{
					$this->template->content = View::factory('login/form')
											->set('error',"Nie znaleziono użytkownika");  
					$err = true;
				}

				if ((md5($_POST['password']) == $userDetails['password']) && (!$err)){
					// pass ok
					$session = Session::instance();// Get the session instance
						$session->set('username', $userDetails['username']);
						$session->set('user_id', $userDetails['user_id']);
						$session->set('range', $userDetails['range']);
						//$session->set('username', $userDetails['username']);
						//$session->set('username', $userDetails['username']);
						//$session->set('username', $userDetails['username']);
						header( 'Location: ' . URL::base() ) ;
						die();
				}
				else
				{
					//pass not ok
					if ($err == false){
						$this->template->content = View::factory('login/form')
											->set('error',"Niepoprawne hasło"); 
						$err = true;
				 	} // if err == false
				}
				
		} // end if post       
        	

	if (!$err) {
		$this->template->content = View::factory('login/form');    
	}
	} // end action login

	public function action_logout(){
		$session = Session::instance();// Get the session instance
			$session->delete('username');
			$session->delete('user_id');
			$session->delete('range');
			header( 'Location: ' . URL::base() ) ;
			die();
	}

	public function after(){     
		parent::after();
	}
} // end Blog Comment

