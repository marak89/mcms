<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Menu extends Kohana_Model
{
	public function get_by_name($name)
	{
	$answer = DB::select('*')
                    ->from('menu')
                    ->where('name', '=', $name)
		    ->execute()
                    ->current();
		return $answer; 
	} // end get($id)

	public function get_by_id($name)
	{
	$answer = DB::select('*')
                    ->from('menu')
                    ->where('id', '=', $name)
		    ->execute()
                    ->current();
		return $answer; 
	} // end get($id)

	public function set($id, $value){
		$query= DB::update('default_config')
			->set(array('value' => $value))
			->where('$id', '=', $id)
			->execute();
	} // end set($id, $value)



} // end class Model_Base
?>
