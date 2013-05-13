<?php
class menu {

	public static function show($name){

	$ModelMenu = new Model_Menu();
	if (is_numeric($name)) 
	{
		$menu = $ModelMenu->get_by_id($name);	
	}
	else
	{
		$menu = $ModelMenu->get_by_name($name);
	}


	if (!is_array($menu)) {echo "Nie znaleziono menu o podanej nazwie"; die();}

	switch ($menu['type']) 
	{
		case 'url' 	: echo "<li>".HTML::anchor($menu['param'],$menu['title'])."</li>\n";
				if ($menu['next_node'] !=  0) { menu::show($menu['next_node']);}
				break;
		case 'menu'	: if ($menu['child_node'] !=  0) 
				{
					echo "".$menu['title']."<ul>\n";
					menu::show($menu['child_node']);
					echo "</ul>\n";
				}
				if ($menu['next_node'] !=  0) { menu::show($menu['next_node']);}
				break;
		
		default		: echo "nie znaleziono takiego typu";
	} // end switch
	
	} // end public static function menu()

	public static function list0()
	{
			$modelBlog = new Model_Blog;
			$lista = $modelBlog->getBlogTag();
			foreach ($lista as $i)
			{
				echo HTML::anchor(URL::base(true).$i['url'],$i['title']);
			}
	} // end public static function list0()

	public static function list1($tag)
	{
			$modelBlog = new Model_Blog;
			$lista = $modelBlog->getBlogTag1($tag);
			foreach ($lista as $i)
			{
				echo HTML::anchor(URL::base(true).$i['url'],$i['title']);
			}
	} // end public static function list1()

	public static function list2($tag1,$tag2)
	{
			$modelBlog = new Model_Blog;
			$lista = $modelBlog->getBlogTag2($tag1,$tag2);
			foreach ($lista as $i)
			{
				echo HTML::anchor(URL::base(true).$i['url'],$i['title']);
			}
	} // end public static function list2()

	public static function list3($tag1, $tag2, $tag3)
	{
			$modelBlog = new Model_Blog;
			$lista = $modelBlog->getBlogTag3($tag1, $tag2, $tag3);
			foreach ($lista as $i)
			{
				echo HTML::anchor(URL::base(true).$i['url'],$i['title']);
			}
	} // end public static function list0()


} // end class Menu
?>
