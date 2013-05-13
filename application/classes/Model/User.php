<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_User extends Kohana_Model
{
	public function add($page_data){
        	$result = DB::insert('users',array_keys($page_data))
                    ->values($page_data)
                    ->execute();        

       		return $result;
    	} //add()
    
	public function getList()
    	{
        	$result =  DB::select('*')
                    ->from('users')
                        //->join(array('director','LEFT'))
                        //->on('iddirector','=','director')
                    ->execute()
                    ->as_array();
        
        	return $result;
	}// getlist()

	public function delete($id){
        	$result = DB::delete('users')
        	            ->where('username', '=', $id)
        	            ->execute();       
	} // delete()

	public function getUser($id){
	        $result = DB::select('*')
                    ->from('users')
                    ->where('username', '=', $id)
                    ->execute()
                    ->current();
        
        	return $result;
	} // get()
	public function update($id,$post){
        	$result =  DB::update('users')
                    ->set($post)
                    ->where('username', '=', $id)
                    ->execute();
        
        return $result;
	} // update()

} // class model User
?>

