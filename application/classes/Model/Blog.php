<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Blog extends Kohana_Model
{
	public function add($page_data){

	$title = trim($page_data['title']);

	$url = $page_data['title'];
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
			// zamieniamy znaki html w tekście 
	$content = $page_data['content'];	
			// usuwamy znaki html z opisu
	$desc = strip_tags($page_data['desc']);
	$data = time();
	$author = $page_data['author'];
	$mod_count = 0;
	//echo $page_data['type'];
	if (isset($page_data['image'])) {$image = $page_data['image']; } else {$image = false; }
	$stick = false;
		if ($page_data['type'] == "2") {$stick = true;}
	$page = false;
		if ($page_data['type'] == "1") {$page = true;}
//echo "$title $url  $content $desc $data $author $mod_count $stick $page";
	$tags = $page_data['tags']; // zabezpieczyć tagi przed wpisywaniem głupot

		if (isset($page_data['setgallery']) && is_numeric($page_data['setgallery'])) 
		{
			$gallery = $page_data['galleryid']; 
		} 
		else
		{
			$gallery = false; 
		}

		$result = DB::insert('blog', array('title', 'url', 'content', 'image', 'desc', 'data', 'author', 'mod_count', 'stick', 'page', 'tags', 'gallery'))
		      ->values(array("$title", "$url", "$content", "$image", "$desc", "$data", "$author", "$mod_count", "$stick", "$page", "$tags", "$gallery"))
			    ->execute();		
//
//        	$result = DB::insert('blog',array_keys($page_data))
//                    ->values($page_data)
//                   ->execute();        

       		return $result;
    	} //add()
//////////////////////////////////////////////////////////////////////////////////    
	public function getList()
    	{
        	$result =  DB::select('*')
                    ->from('blog')
		->where('del', '=', false)
		->where('page', '=', false)
		->order_by('title', 'ASC')
                    ->execute()
                    ->as_array();
        
        	return $result;
	}// getlist()
//////////////////////////////////////////////////////////////////////////////////
	public function getRemList()
    	{
        	$result =  DB::select('*')
                    ->from('blog')
		->where('del', '=', true)
		->order_by('data', 'DESC')
                    ->execute()
                    ->as_array();
        
        	return $result;
	}// getlist()
//////////////////////////////////////////////////////////////////////////////////      
	public function getPageList()
    	{
		$result =  DB::select('*')
		->from('blog')
		->where('del', '=', false)
		->where('page', '=', true)
		->order_by('data', 'DESC')
		->execute()
		->as_array();
        
        	return $result;
	}// getlist()

//////////////////////////////////////////////////////////////////////////////////
	public function delete($id){
        	//$result = DB::delete('blog')
        	//            ->where('url', '=', $id)
        	//            ->execute();       
		$result = DB::update('blog')
				->set(array('del' => true))
				->where('url', '=', $id)
				->execute();
	} // delete()
//////////////////////////////////////////////////////////////////////////////////
		public function restore($id){
        	//$result = DB::delete('blog')
        	//            ->where('url', '=', $id)
        	//            ->execute();       
		$result = DB::update('blog')
				->set(array('del' => false))
				->where('url', '=', $id)
				->execute();
	} // delete()
//////////////////////////////////////////////////////////////////////////////////
		public function permDel($id){
        	$result = DB::delete('blog')
        	            ->where('url', '=', $id)
        	            ->execute();       
		
	} // delete()
//////////////////////////////////////////////////////////////////////////////////
	public function getId($id){
	        $result = DB::select('*')
                    ->from('blog')
                    ->where('url', '=', $id)
		->where('del', '=', 'false')
                    ->execute()
                    ->current();
        
        	return $result;
	} // get()


//////////////////////////////////////////////////////////////////////////////////
	public function update($id,$page_data){
	
	$title = trim($page_data['title']);

	$url = $page_data['title'];
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
			// zamieniamy znaki html w tekście 
	$content = $page_data['content'];
			// usuwamy znaki html z opisu
	$desc = strip_tags($page_data['desc']);
	if (isset($page_data['image'])) {$image = $page_data['image']; } else {$image = false; }
	$data_last_mod = time();
	$user_last_mod = $page_data['author'];
	//$mod_count = 'mod_count+1';

	$stick = false;
		if ($page_data['type'] == "2") {$stick = true;}
	$page = false;
		if ($page_data['type'] == "1") {$page = true;}
		
	$tags = $page_data['tags']; // zabezpieczyć tagi przed wpisywaniem głupot
	
		if ($page_data['setgallery'] == "yes") 
		{
			$gallery = $page_data['galleryid']; 
		} 
		else
		{
			$gallery = false; 
		}
	
	
        	$result =  DB::update('blog')
                    ->set(array('title' => $title, 'url' => $url, 'desc' => $desc, 'image' => $image, 'content' => $content, 'data_last_mod' => $data_last_mod, 'user_last_mod' => $user_last_mod, 'mod_count' => DB::expr('mod_count + 1'), 'stick' => $stick, 'page' => $page, 'tags' => $tags,'gallery' => $gallery ))
                    ->where('url', '=', $id)
                    ->execute();
        
        return $result;
	} // update()
//////////////////////////////////////////////////////////////////////////////////

public function checkTitle($title){
$result = DB::select(DB::expr('count(*)'))
                    ->from('blog')
                    ->where('title', '=', $title)
		    ->execute()
                    ->current();
return $result;

} // check title 
/////////////////////////////////////////////////////////////////////////////////

	public function getBlogTag3($tag1, $tag2, $tag3)
    	{
		$result =  DB::select('title', 'url')
		->from('blog')
		->where('del', '=', false)
		->where('page', '=', false)
		->where('tags', 'like', "%".$tag1."%")
		->or_where('tags', 'like', "%".$tag2."%")
		->or_where('tags', 'like', "%".$tag3."%")
		->order_by('data', 'DESC')
		->limit('5')
		->execute()
		->as_array();
        
        	return $result;
	}// getBlogTag3($tag1, $tag2, $tag3)
/////////////////////////////////////////////////////////////////////////////////

	public function getBlogTag2($tag1, $tag2)
    	{
		$result =  DB::select('title', 'url')
		->from('blog')
		->where('del', '=', false)
		->where('page', '=', false)
		->where('tags', 'like', "%".$tag1."%")
		->or_where('tags', 'like', "%".$tag2."%")
		->order_by('data', 'DESC')
		->limit('6')
		->execute()
		->as_array();
        
        	return $result;
	}// getBlogTag2($tag1, $tag2,)
/////////////////////////////////////////////////////////////////////////////////

	public function getBlogTag1($tag1)
    	{
		$result =  DB::select('title', 'url')
		->from('blog')
		->where('del', '=', false)
		->where('page', '=', false)
		->where('tags', 'like', "%".$tag1."%")
		->order_by('data', 'DESC')
		->limit('5')
		->execute()
		->as_array();
        
        	return $result;
	}// getBlogTag1($tag1, )
/////////////////////////////////////////////////////////////////////////////////

	public function getBlogTag()
    	{
		$result =  DB::select('title', 'url')
		->from('blog')
		->where('del', '=', false)
		->where('page', '=', false)
		->order_by('data', 'DESC')
		->limit('5')
		->execute()
		->as_array();
        
        	return $result;
	}// getBlogTag()
/////////////////////////////////////////////////////////////////////////////////


} // class model blog
?>

