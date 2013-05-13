<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Login extends Kohana_Model
{
	public function login($id){
		$result = DB::select('*')
			->from('users')
			->where('username', '=', $id)
			->execute()
			->current();
		return $result;
	} // login()

	public function logout(){
        	
	} // logout()


} // class model comment
?>

