<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Allegro extends Kohana_Model
{
	public function getTemplate($id)
	{
		$result =  DB::select('*')
		->from('allegro_template')
		->where('id', '=', $id)
		->execute()
		->current();
	return $result;
	} // getTemplate
	
	public function getTemplateList()
    {
		$result = DB::select('*')
						->from('allegro_template')
						->execute()
						->as_array();
    return $result;
	} // getTemplateList()
	
	
	
	public function setTemplate($name,$content)
	{
		$result = DB::insert('allegro_template', array('name', 'content'))
							->values(array("$name", "$content"))
							->execute();
	}
	
	public function updateTemplate($name,$content,$id)
	{
		$result = DB::update('allegro_template')
				->set(array('name' => $name, 'content' => $content))
				->where('id', '=', $id)
				->execute();
	} //updateTemplate($name,$content,$id)
	
	public function getAuctionList()
	{
		$result = DB::select('id','name')
						->from('allegro_auction')
						->execute()
						->as_array();
    return $result;
	} // getAuctionList()
	
	public function getAuction($id)
	{
		$result =  DB::select('*')
		->from('allegro_auction')
		->where('id', '=', $id)
		->execute()
		->current();
	return $result;
	} //getAuction($id)
	
	public function updateAuction($post)
	{
			$id = $post['auction_id'];
			$name = $post['name'];
			$template_id = $post['template_id'];
			$nazwa = $post['nazwa'];
			$cena = $post['cena'];
			$opis1 = $post['opis1'];
			$opis2 = $post['opis2'];
			$opis3 = $post['opis3'];
			$opis4 = $post['opis4'];
			$opis5 = $post['opis5'];
			$opis6 = $post['opis6'];
			$opis7 = $post['opis7'];
			$opis8 = $post['opis8'];
			$galleryid = $post['gallery_id'];
			
			$result = DB::update('allegro_auction')
				->set(array('name' => $name, 'template_id' => $template_id, 'nazwa' => $nazwa, 'cena' => $cena, 'opis1' => $opis1, 'opis2' => $opis2, 'opis3' => $opis3, 'opis4' => $opis4, 'opis5' => $opis5, 'opis6' => $opis6, 'opis7' => $opis7, 'opis8' => $opis8, 'gallery_id' => $galleryid ))
				->where('id', '=', $id)
				->execute();
	}
	public function setAuction($post)
	{
			
			$name = $post['name'];
			$template_id = $post['template_id'];
			$nazwa = $post['nazwa'];
			$cena = $post['cena'];
			$opis1 = nl2br($post['opis1']);
			$opis2 = nl2br($post['opis2']);
			$opis3 = nl2br($post['opis3']);
			$opis4 = nl2br($post['opis4']);
			$opis5 = nl2br($post['opis5']);
			$opis6 = nl2br($post['opis6']);
			$opis7 = nl2br($post['opis7']);
			$opis8 = nl2br($post['opis8']);
			$galleryid = $post['gallery_id'];
			
			$result = DB::insert('allegro_auction', array('name', 'template_id', 'nazwa', 'cena', 'opis1', 'opis2', 'opis3', 'opis4', 'opis5', 'opis6', 'opis7', 'opis8', 'gallery_id' ))
							->values(array("$name", "$template_id", "$nazwa", "$cena", "$opis1", "$opis2", "$opis3", "$opis4", "$opis5", "$opis6", "$opis7", "$opis8", "$galleryid" ))
							->execute();
	}
	
	public function getGallery($id)
	{
		$result =  DB::select('*')
		->from('photos')
		->where('gallery_id', '=', $id)
		->execute()
		->as_array();
	return $result;
	} //getGallery($id)
	
	public function getGalleryList()
    {
		$sub2 = " (select count(*) from photos where photos.gallery_id = gallery.id) as ilosc";
		$result = DB::select('*',DB::expr($sub2))
						->from('gallery')
						->execute()
						->as_array();
      	return $result;        	
	}// getGalleryList()
	
	public function getAuctionInformList()
	{
	$result = DB::select('*')
						->from('allegro_auction_info')
						->execute()
						->as_array();
    return $result;
	} //getAuctionInformList()
	
	public function getAuctionInform($id)
	{
	$result = DB::select('content')
						->from('allegro_auction_info')
						->where('name','=',$id)
						->execute()
						->current();
    return $result['content'];
	} //getAuctionInform()
	
	public function updateAuctionInform($post)
	{
		$content = str_replace(array("\n", "\n\r", "\r\n", "\r"), "<br />", $post['content']);
		$id = $post['id'];
		
		$result = DB::update('allegro_auction_info')
				->set(array('content' => $content ))
				->where('id', '=', $id)
				->execute();
		
		
	
	} //updateAuctionInform()
	
	public function setAuctionInform($post)
	{
		$name = $post['name'];
		$content = str_replace(array("\n", "\n\r", "\r\n", "\r"), "<br />", $post['content']);
		
		$result = DB::insert('allegro_auction_info', array('name', 'content' ))
							->values(array("$name", "$content" ))
							->execute();
	} //setAuctionInform()


	public function getOtherAuctionList()
	{
		$result = DB::select('*')
						->from('allegro_other_auction')
						->where('delete','=',false)
						->execute()
						->as_array();
		return $result;
	} // getOtherAuctionList()
	
	public function getAllOtherAuctionList()
	{
		$result = DB::select('*')
						->from('allegro_other_auction')
						->execute()
						->as_array();
		return $result;
	} // getAllOtherAuctionList()
	
	public function getOtherAuction($id)
	{
				$result = DB::select('*')
						->from('allegro_other_auction')
						->where('id','=',$id)
						->execute()
						->current();
    return $result;
	} // getOtherAuction($id)
	
	public function setOtherAuction($post)
	{
		$name = $post['name'];
		$content = $post['string'];
		$image = $post['image'];
		
		$result = DB::insert('allegro_other_auction', array('name', 'content', 'image' ))
							->values(array("$name", "$content", "$image" ))
							->execute();
	} // setOtherAuction($post)
	
	public function updateOtherAuction($post)
	{
		$id = $post['id'];
		$name = $post['name'];
		$content = $post['content'];
		$image = $post['image'];
		$delete = false;
		if ($post['delete'] == "yes" ) {$delete = true ;}
		if ($post['delete'] == "no" ) {$delete = false ;}
		$result = DB::update('allegro_other_auction')
				->set(array('content' => $content,'name' => $name, 'image' => $image, 'delete' => $delete ))
				->where('id', '=', $id)
				->execute();
	} // updateOtherAuction($post)
	


}
?>
