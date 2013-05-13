<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Comment extends Kohana_Model
{
	public function add($page_data){
        	$result = 1; //DB::insert('movie',array_keys($page_data))
                  //  ->values($page_data)
                  //  ->execute();        

       		return $result;
    	} //add()
    
	public function getList()
    	{
        	$result = 1; //DB::select('*')
                  //  ->from('movie')
                  //      ->join(array('director','LEFT'))
                  //      ->on('iddirector','=','director')
                  //  ->execute()
                  //  ->as_array();
        
        	return $result;
	}// getlist()

	public function delete($id){
        	//$result = DB::delete('movie')
        	//            ->where('idmovie', '=', $id)
        	//            ->execute();       
	} // delete()

	public function getId($id){
	        $result = 1; //DB::select('*')
        //            ->from('movie')
        //            ->where('idmovie', '=', $id)
        //            ->execute()
        //            ->current();
        
        	return $result;
	} // get()
	public function update($id,$movie){
        	$result = 1; // DB::update('movie')
                    //->set($movie)
                    //->where('idmovie', '=', $id)
                    //->execute();
        
        return $result;
	} // update()


} // class model comment
?>

