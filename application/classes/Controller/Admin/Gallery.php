<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Gallery extends Controller_Admin_Baseadmin {

	
	public function before(){
		parent::before();       
	

	}

public function action_index(){   
	
//$this->template->content = View::factory('admin/gallery/index');
$this->action_addphoto();

}




public function action_addphoto(){   
	
$this->template->content =View::factory('admin/gallery/addphoto');


}

public function action_addgallery(){   

$galleryModel = new Model_Gallery;
	
	if (isset($_POST['galleryname'])) 
	{
		if (isset($_POST['update']))
		{
			$name = $_POST['galleryname'];
			$desc = $_POST['gallerydesc'];
			$id	= $_POST['id'];
			$galleryModel->updateGallery($name, $desc, $id);
		}
		else
		{
			$name = $_POST['galleryname'];
			$desc = $_POST['gallerydesc'];
			$galleryModel->addGallery($name, $desc);
		}
	}	
	
	
$lista=$galleryModel->getGalleryList();
$this->template->content =View::factory('admin/gallery/addgallery')
							->set('list',$lista);

}


	private function settingsMenu()
	{
			$adminPath = URL::base(true)."admin/";
			$menu="";
			$menu.="<a href= \"".$adminPath."gallery/addphoto/\" >Dodaj Zdjęcia</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."gallery/addgallery\" >Zarządzaj galeriami</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."gallery/addphototogallery\" >Przypisz obraz do galerii</a>";
			$menu .=" | ";
			$menu.="<hr>";
		return $menu;
	}


	public function action_show()
	{
		$galleryModel = new Model_Gallery;
		
		if (isset($_POST['update']))
		{
			$galleryId	= $_POST['galleryid'];
			$photoId	= $_POST['photoid'];
			
			$update = $galleryModel->setGalleryToPhoto($photoId, $galleryId);
		}
		
		
		$lista			=	$galleryModel->getGallery($this->request->param('id'));
		$nazwa			=	$galleryModel->getGalleryInfo($this->request->param('id'));
		$galleryList	=	$galleryModel->getGalleryList();
		$this->template->content =View::factory('admin/gallery/showgallery')
							->set('list',$lista)
							->set('nazwa',$nazwa)
							->set('galleryList',$galleryList);
	}

	public function action_addphototogallery()
	{
		$galleryModel = new Model_Gallery;
		
		if (isset($_POST['update']))
		{
			$galleryId	= $_POST['galleryid'];
			$photoId	= $_POST['photoid'];
			
			$update = $galleryModel->setGalleryToPhoto($photoId, $galleryId);
		}
		
		
		
		$lista			=	$galleryModel->getNewPhotoList();
		$galleryList	=	$galleryModel->getGalleryList();
		$this->template->content =View::factory('admin/gallery/addphototogallery')
							->set('list',$lista)
							->set('galleryList',$galleryList);
	}



	public function after()
	{
	$this->template->title = "Galeria";
	$this->template->desc = "Zarządzanie zdjęciami";
	$this->template->settings_menu = $this->settingsMenu();
   //$this->template->states = $this->gen_state("succes","Wszystko będzie dobrze");

		$this->_script = array_merge(array(  
			$this->__JS__.'html5uploader.js',
        ), $this->_script);

		$this->_style = array_merge(array(
			$this->__CSS__.'uploader.css',
        
        ),$this->_style);
	     
		parent::after();
	}

}
