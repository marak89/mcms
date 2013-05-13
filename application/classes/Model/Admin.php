<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Admin extends Kohana_Model
{
	public function get_menu()
	{
	$answer = DB::select('*')
				->from('admin_menu')
				->execute()
				->as_array();
		return $answer; 
	} // end get($id)


} // end class Model_Base
?>
