<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Base extends Kohana_Model
{
	public function get($id)
	{
	$answer = DB::select('value')
                    ->from('default_config')
                    ->where('name', '=', $id)
		    ->execute()
                    ->current();
		return $answer['value']; 
	} // end get($id)

	public function set($id, $value){
		$query= DB::update('default_config')
			->set(array('value' => $value))
			->where('$id', '=', $id)
			->execute();
	} // end set($id, $value)

} // end class Model_Base
?>
