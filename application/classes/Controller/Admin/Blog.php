<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Blog extends Controller_Admin_Baseadmin {

	
	public function before(){
		parent::before();       
	

	}

public function action_index(){   
	
		$modelBlog = new Model_Blog();
		$post = $modelBlog->getList();
		$this->template->content= View::factory('admin/blog/index')
		->set('post',$post);
		

}


	public function action_edit(){
		$id = $this->request->param('id'); //pobieramy id do edycji
		$modelBlog = new Model_Blog();  //tworzymy model
		$galleryModel = new Model_Gallery;
		$galleryList	=	$galleryModel->getGalleryList();
		$post = $modelBlog->getId($id); //pobieramy wszystkie dane do widoku
		$err_empty = false;
			$session = Session::instance();// Get the session instance 		
			if ($post['author'] != $session->get('username')) 
			{
				//header( 'Location: ' . URL::base() ) ;
				//die();
			}
			$err_desc_text = $err_content_text = $err_title_text = "";

			if($this->request->post()){ //jesli formularz przesłał dane
				
			if ($_POST['title'] === "") { 
				$err_empty = true;
				$err_title_text = '<div id="error" style="color:red;">Wpisz poprawny tytuł</div>'; 
			}
			if ($_POST['desc'] === "") { 
				$err_empty = true;
                                $err_desc_text = '<div id="error" style="color:red;">Wpisz poprawny opis</div>';		
			} 
			if ($_POST['content'] === "") { 
				$err_empty = true;
                                $err_content_text = '<div id="error" style="color:red;">Wpisz poprawną treść</div>';		
			} 


		if (!$err_empty) {
				$modelBlog->update($id,$_POST); //wywołujemy naszą funkcję do edycji
				//$post=$_POST; //nadpisujemy naszą tablice  aby wyświetlić przesłane dane
				$url = $_POST['title'];
		 			// trimujemy
				$url = trim($url);
					// zamieniamy polskie znaki     
				$url = str_replace(array('Ę', 'Ó', 'Ą', 'Ś', 'Ł', 'Ż', 'Ź', 'Ć', 'Ń', 'ę', 'ó', 'ą', 'ś', 'ł', 'ż', 'ź', 'ć', 'ń'), array('E', 'O', 'A', 'S', 'L', 'Z', 'Z', 'C', 'N', 'e', 'o', 'a', 's', 'l', 'z', 'z', 'c', 'n'), $url);
				// zamieniamy wszystko na małe litery
			$url = strtolower($url);
				// zamiana spacje na -
			$url = str_replace(" ","-",$url);
				// usuwanie tagów html
			//$url = strip_tags($url);
				// zamieniamy znaki niealfanumeryczne na -
			$url = preg_replace("[[^a-z0-9]]","-",$url);
			$backurl = URL::base().$url;
			header( 'Location: ' . $backurl ) ;
			die();
		} //end if $err_empty
			} // koniec jesli przeslal dane
        
        if (!$err_empty){
	$this->template->content =  View::factory('admin/blog/form')
                                   ->set('post',$post)
                                   ->set('galleryList',$galleryList); 
	} // err empty    
   	else {
		$this->template->content = View::factory($this->template_name.'/blog/form')
					->set('post',$_POST)
					->set('err_title',$err_title_text)
					->set('err_desc',$err_desc_text)
					->set('err_content',$err_content_text)
					->set('galleryList',$galleryList);
					
	}
	} // end action edit
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function action_delete(){
		// sprawdzamy czy root
			$session = Session::instance();// Get the session instance 		
			if ($session->get('range') < 5 ) 
			{
				header( 'Location: ' . URL::base() ) ;
				die();
			}

		$id = $this->request->param('id');  //pobieramy id do usunięcia
		$modelBlog = new Model_Blog();  //tworzymy model
		$modelBlog->delete($id);  //wywołujemy wcześniej przygotowaną funkcję do usunięcia  
		header( 'Location: ' . URL::base() . 'admin/blog/index' ) ;
		die();  //po  usunięciu robimy przekierowanie 
	} // end action delete
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function action_add(){
		// sprawdzamy czy root
			$session = Session::instance();// Get the session instance 		
			if ($session->get('range') < 5 ) 
			{
				header( 'Location: ' . URL::base() ) ;
				die();
			}
		$err_desc_text = $err_content_text = $err_title_text = "";

		$modelBlog = new Model_Blog();
		$galleryModel = new Model_Gallery;
		$galleryList	=	$galleryModel->getGalleryList();
		if($this->request->post()){
			 if($this->titleError($_POST['title'])) {  $err_title_text = '<div id="error" style="color:red;">Wpis o podanym tytule już istnieje</div>';  ;} else {
			
			$modelBlog->add($_POST);
			$url = $_POST['title'];
		 	// trimujemy
			$url = trim($url);
			// zamieniamy polskie znaki     
			$url = str_replace(array('Ę', 'Ó', 'Ą', 'Ś', 'Ł', 'Ż', 'Ź', 'Ć', 'Ń', 'ę', 'ó', 'ą', 'ś', 'ł', 'ż', 'ź', 'ć', 'ń'),
			   array('E', 'O', 'A', 'S', 'L', 'Z', 'Z', 'C', 'N', 'e', 'o', 'a', 's', 'l', 'z', 'z', 'c', 'n'),
			$url);
			// zamieniamy wszystko na małe litery
			$url = strtolower($url);
			// zamiana spacje na -
			$url = str_replace(" ","-",$url);
			// usuwanie tagów html
			//$url = strip_tags($url);
			// zamieniamy znaki niealfanumeryczne na -
			$url = preg_replace("[[^a-z0-9]]","-",$url);
			
			$backurl = URL::base().$url;
			header( 'Location: ' . $backurl ) ;
			die();
		} // if titleerror 
		}// if request post
	$this->template->content= View::factory('admin/blog/form')
					->set('post',$_POST)
					->set('err_title',$err_title_text)
					->set('err_desc',$err_desc_text)
					->set('err_content',$err_content_text)
					->set('galleryList',$galleryList);
	} // end action add
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		private function titleError($title) {
			$modelBlog = new Model_Blog();  //tworzymy model
			$count = $modelBlog->checkTitle($title); //pobieramy wszystkie dane do widoku			
			if ($count['count(*)'] == "0" ) { return false; } else {return true; }
		}	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		private function settingsMenu()
		{
			$adminPath = URL::base(true)."admin/";
			$menu="";
			$menu.="<a href= \"".$adminPath."blog/\" >Przeglądaj posty</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."blog/pages\" >Przeglądaj strony</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."blog/add/\" >Dodaj post/stronę</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."blog/rem/\" >Usunięte</a>";
			$menu .=" | ";
			$menu.="<hr>";
		return $menu;
		}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function action_rem(){   
	
		$modelBlog = new Model_Blog();
		$post = $modelBlog->getRemList();
		$this->template->content= View::factory('admin/blog/index')
		->set('post',$post);
		

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function action_restore(){
		// sprawdzamy czy root
			$session = Session::instance();// Get the session instance 		
			if ($session->get('range') < 5 ) 
			{
				header( 'Location: ' . URL::base() ) ;
				die();
			}

		$id = $this->request->param('id');  //pobieramy id do usunięcia
		$modelBlog = new Model_Blog();  //tworzymy model
		$modelBlog->restore($id);  //wywołujemy wcześniej przygotowaną funkcję 
		header( 'Location: ' . URL::base() . 'admin/blog/index' ) ;
		die();  //po  usunięciu robimy przekierowanie 
	} // end action delete

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function action_permdelete(){
		// sprawdzamy czy root
			$session = Session::instance();// Get the session instance 		
			if ($session->get('range') < 5 ) 
			{
				header( 'Location: ' . URL::base() ) ;
				die();
			}

		$id = $this->request->param('id');  //pobieramy id do usunięcia
		$modelBlog = new Model_Blog();  //tworzymy model
		$modelBlog->permDel($id);  //wywołujemy wcześniej przygotowaną funkcję 
		header( 'Location: ' . URL::base() . 'admin/blog/index' ) ;
		die();  //po  usunięciu robimy przekierowanie 
	} // end action delete

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function action_pages(){   
	
		$modelBlog = new Model_Blog();
		$post = $modelBlog->getPageList();
		$this->template->content= View::factory('admin/blog/index')
		->set('post',$post);
		

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function after(){
	$this->template->title = "Blog";
	$this->template->desc = "Zarządzanie blogiem i stronami";
	$this->template->settings_menu = $this->settingsMenu();
	
	//$this->template->states = $this->gen_state("succes","Wszystko będzie dobrze");
	
		
		
		     
		parent::after();
	}

}
