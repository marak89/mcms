<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Base {

	public function before(){
		parent::before();        
	}

	public function action_index(){    
		$this->action_show();
    	} // end action index

	public function action_show(){
		// get user
		$tmp = $this->request->param('id');
		if (isset($tmp)) {
			$id = $this->request->param('id'); //pobieramy id do edycji
		}
		else 
		{
			$id = 1; // czyli id aktualnie zalogowanego usera!
		}
		
		$modelUser = new Model_User();  //tworzymy model
		$user = $modelUser->getUser($id); //pobieramy wszystkie dane do widoku 
		$this->template->content = View::factory('user/show')
                                  	 ->set('user',$user);
	} // end action show

	public function action_ShowAll(){

		// sprawdzamy czy za,logowany
			$session = Session::instance();// Get the session instance 		
			if ($session->get('user_id') < 5 ) 
			{
				header( 'Location: ' . URL::base() ) ;
				die();
			}

		$modelUser = new Model_User();
		$user = $modelUser->getList();
		$this->template->content= View::factory('user/showAll')
		->set('user',$user);
	} // end action getId

	public function action_edit(){
		$id = $this->request->param('id'); //pobieramy id do edycji
		$modelUser = new Model_User();  //tworzymy model
		$user = $modelUser->getUser($id); //pobieramy wszystkie dane do widoku

		$session = Session::instance();// Get the session instance 		
			if ($user['username'] != $session->get('username')) 
			{
				header( 'Location: ' . URL::base() ) ;
				die();
			}


	if($this->request->post()){ //jesli formularz przesłał dane
		$modelUser->update($id,$_POST); //wywołujemy naszą funkcję do edycji
		//$post=$_POST; //nadpisujemy naszą tablice  aby wyświetlić przesłane dane
		header( 'Location: ' . URL::base() . 'user/show/'. $id ) ;
		die();
	}       
        $this->template->content = View::factory('user/form')
                                   ->set('user',$user);        
	} // end action edit

	public function action_delete(){

		// sprawdzamy czy root
			$session = Session::instance();// Get the session instance 		
			if ($session->get('range') < 5 ) 
			{
				header( 'Location: ' . URL::base() ) ;
				die();
			}

		$id = $this->request->param('id');  //pobieramy id do usunięcia
		$modelUser = new Model_User();  //tworzymy model

		$modelUser->delete($id);  //wywołujemy wcześniej przygotowaną funkcję do usunięcia  
		header( 'Location: ' . URL::base() . 'user/showAll' ) ;
		die();  //po  usunięciu robimy przekierowanie do listy filmów na akcję index
	} // end action delete

	public function action_add(){
		$modelUser = new Model_User();
		if($this->request->post()){
			$modelUser->add($_POST); 
			header( 'Location: ' . URL::base() . 'user/showAll' ) ;
			die();
		}
	$this->template->content= View::factory('user/form');
	} // end action add


	public function after(){     
		parent::after();
	}
} // end User

