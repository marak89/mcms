<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Blog extends Controller_Base {

	public function before(){
		parent::before();       
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function action_index(){    
		// get list
		$modelBlog = new Model_Blog();
		$post = $modelBlog->getList();
		$this->template->content= View::factory($this->template_name.'/blog/index')
		->set('post',$post);
    	} // end action index
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function action_post(){
		$id = $this->request->param('id'); //pobieramy id do edycji
		$modelBlog = new Model_Blog();  //tworzymy model
		$post = $modelBlog->getId($id); //pobieramy wszystkie dane do widoku 
		$modelGallery = new Model_Gallery;
		$gallery = false;
		if (isset($post['gallery']))
		{
			$gallery = $modelGallery->getGallery($post['gallery']);
		}
		
		if ($post['title'] == null) {
			$this->template->content = View::factory('/error/index')
                                  	->set('error_title',"Strony nie odnaleziono 404")
					->set('error_content',"Niestety nie posiadamy strony o podanym adresie" ); 
		} else {
			$this->_title    = $post['title']." - ". $this->_title;
			$this->_keywords = $post['tags'] .", ". $this->_keywords ;
			$this->_description = $this->_description .". ".$post['desc']  ;
			$this->template->content = View::factory($this->template_name.'/blog/post')
			                  	 ->set('post',$post)
			                  	 ->set('img',$gallery);
			$leftmenu = $modelBlog->getList(); ; 
			//$this->template->content->leftmenu = $leftmenu;
		} // end if 
	} // end action getId
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function after(){     
		parent::after();
	}
} // end Blog Show

