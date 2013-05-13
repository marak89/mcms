<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Sitemap extends Kohana_Model
{
public function get(){
$result =  DB::select('url', 'data', 'data_last_mod')
	->from('blog')
	->where('del', '=', false)
	->execute()
	->as_array();
return $result;
} // function get()

} // class model sitemap
?>
