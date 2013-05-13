<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Gallery extends Kohana_Model
{
	public function addGallery($name, $desc){
		$result = DB::insert('gallery', array('name', 'desc'))
						->values(array("$name", "$desc"))
						->execute();		
       		return $result;
    	} //addGallery()
//////////////////////////////////////////////////////////////////////////////////    
	public function getGalleryList()
    	{
			$sub2 = " (select count(*) from photos where photos.gallery_id = gallery.id) as ilosc";
			$result = DB::select('*',DB::expr($sub2))
							->from('gallery')
							->execute()
							->as_array();
        	return $result;        	
	}// getlist()
//////////////////////////////////////////////////////////////////////////////////
	public function updateGallery($name, $desc, $id){
		$result = DB::update('gallery')
				->set(array('name' => $name, 'desc' => $desc))
				->where('id', '=', $id)
				->execute();
	} // updateGallery($name, $desc, $id){

//////////////////////////////////////////////////////////////////////////////////      
	public function getGallery($id)
    	{
		$result =  DB::select('*')
		->from('photos')
		->where('gallery_id', '=', $id)
		->execute()
		->as_array();
	return $result;
	}// getGallery()
//////////////////////////////////////////////////////////////////////////////////
	public function getGalleryInfo($id)
    	{
		$result =  DB::select('*')
		->from('gallery')
		->where('id', '=', $id)
		->execute()
		->current();
	return $result;
	}// getGallery()
//////////////////////////////////////////////////////////////////////////////////
	public function getPhotoList()
    	{
		$result =  DB::select('*')
		->from('photos')
		->execute()
		->as_array();
	return $result;
	}// getGallery()
//////////////////////////////////////////////////////////////////////////////////
	public function getNewPhotoList()
    	{
		$result =  DB::select('*')
		->from('photos')
		->where('gallery_id','is',NULL)
		->execute()
		->as_array();
	return $result;
	}// getGallery()
//////////////////////////////////////////////////////////////////////////////////

public function setGalleryToPhoto($photoId, $galleryId)
	{
		$result = DB::update('photos')
				->set(array('gallery_id' => $galleryId,))
				->where('id', '=', $photoId)
				->execute();
	} // setGalleryToPhoto($photoId, $galleryid)




} // class model blog
?>

