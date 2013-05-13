<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Allegro extends Controller_Admin_Baseadmin {

	
	public function before(){
		parent::before();       
	

	}

public function action_index(){   
	
//$this->template->content = "<h3>Treść panelu głównego</h3>";
//$this->template->states = $this->gen_state("warning","Sprawdź ustawienia SEO");
//$this->template->content = View::factory('admin/allegro/index');
$this->action_showauction();
}

public function action_showauction(){   

$allegroModel = new Model_Allegro();

$id = $this->request->param('id');
	if (isset($id))
	{
		
		
		
		if(isset($_POST['auction_id']))
		{
			
			$allegroModel->updateAuction($_POST);
		}
		
		
		
		$aukcje = $allegroModel->getAuction($id);
		$template_id = $aukcje['template_id'];
		$template = $allegroModel->getTemplate($template_id);
		$code = $template['content'];
		$url_graph = url::base(true)."public/allegro/".$template['name']."/images/";
		
			
		$text_kontakt = $allegroModel->getAuctionInform('kontakt');
		$text_platnosc = $allegroModel->getAuctionInform('platnosci');
		$text_regulamin = $allegroModel->getAuctionInform('regulamin');
		
		$nazwa = $aukcje['nazwa'];
		$cena = $aukcje['cena'];
		$text_1 = $aukcje['opis1'];
		$text_2 = $aukcje['opis2'];
		$text_3 = $aukcje['opis3'];
		$text_4 = $aukcje['opis4'];
		$text_5 = $aukcje['opis5'];
		$text_6 = $aukcje['opis6'];
		$text_7 = $aukcje['opis7'];
		$text_8 = $aukcje['opis8'];
		$url_gallery = url::base(true)."public/gallery/";
		if($aukcje['gallery_id'] != null) 
		{
			$galeria_id = $aukcje['gallery_id'];
		}
		else
		{
			$galeria_id = null;
		}
		$templateList = $allegroModel->getTemplateList();
		$galleryList = $allegroModel->getGalleryList();
		$gallery_content = "";
		$galeria = $allegroModel->getGallery($galeria_id);
		foreach($galeria as $key => $lista): 
			$gallery_content .= "<img src=\"[url_gallery]w640_".$lista['filename']."\" style=\"box-shadow: 5px 5px 5px #888888;\"><br /><br />";
		endforeach;
		$inne_aukcje = "";
		$inne_a = $allegroModel->getOtherAuctionList();
		foreach($inne_a as $key => $lista){
			$inne_aukcje .= "<a href=\"http://allegro.pl/listing/user/listing.php?us_id=13491547&string=".$lista['content']."&search_scope=userItems-13491547\"><div style=\"box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px ;  margin: 5px 5px 5px 5px; background-image: url(".url::base(true)."public/gallery/w190h250_".$lista['image']."); background-position: top; background-repeat: no-repeat; color: #2264ab;\"><div style=\"padding-top: 50%;\"><h1 style=\"background: rgba(255, 255, 255, 0.5);\">".$lista['name']."</h1></div></div></a>";
		}
		
		
		
		$code = str_replace("[text_kontakt]",$text_kontakt,$code);
		$code = str_replace("[text_platnosc]",$text_platnosc,$code);
		$code = str_replace("[text_regulamin]",$text_regulamin,$code);
		$code = str_replace("[nazwa]",$nazwa,$code);
		$code = str_replace("[cena]",$cena,$code);
		$code = str_replace("[text_1]",$text_1,$code);
		$code = str_replace("[text_2]",$text_2,$code);
		$code = str_replace("[text_3]",$text_3,$code);
		$code = str_replace("[text_4]",$text_4,$code);
		$code = str_replace("[text_5]",$text_5,$code);
		$code = str_replace("[text_6]",$text_6,$code);
		$code = str_replace("[text_7]",$text_7,$code);
		$code = str_replace("[text_8]",$text_8,$code);
		$code = str_replace("[gallery]",$gallery_content,$code);
		$code = str_replace("[inne_aukcje]",$inne_aukcje,$code);
		$code = str_replace("[url_graph]",$url_graph,$code);
		$code = str_replace("[url_gallery]",$url_gallery,$code);
		
		$code = str_replace(array("\n", "\n\r", "\r\n", "\r"), "", $code);
		
$content="
<ul id=\"allegrotabs\">
<li><a href=\"#\" title=\"tab1\">Podgląd</a></li>
<li><a href=\"#\" title=\"tab2\">Kod HTML</a></li>
<li><a href=\"#\" title=\"tab3\">Edytuj</a></li>
</ul>
<div id=\"allegrocontent\">
<div id=\"tab1\" class=\"hide\">".$code."</div>
<div id=\"tab2\" class=\"hide\"><textarea cols=\"200\" rows=\"100\">".$code."</textarea></div>
<div id=\"tab3\" class=\"hide\">
<h2>Edytujesz aukcję ".$aukcje['id']." - ".$aukcje['name']." dotyczącą towaru o dotychczasowej nazwie ".$aukcje['nazwa']." </h2>
<div style=\"width: 85%; margin: auto;\">
<form method=\"post\">
<input type=\"hidden\" value=\"".$aukcje['id']."\" name=\"auction_id\">
Nazwa aukcji w systemie: ".$aukcje['id']." - <input type=\"text\" size=\"100\" name=\"name\" value=\"".$aukcje['name']."\"><br>
Nazwa produktu: <input type=\"text\" size=\"100\" name=\"nazwa\" value=\"".$aukcje['nazwa']."\">
<span style=\"float:right;\"><input type=\"submit\" value=\"Aktualizuj\"></span>
<br />
Cena produktu: <input type=\"text\" size=\"100\" name=\"cena\" value=\"".$aukcje['cena']."\"> <br /> 
Galeria zdjęć: <select name=\"gallery_id\">";
foreach($galleryList as $key => $lista)
{
	$content .= "<option value=\"".$lista['id']."\"";
	if(isset($aukcje['gallery_id'])) { if($lista['id'] == $aukcje['gallery_id']) {$content .= 'selected="selected"' ;} } 
	$content .= ">".$lista['name']."(".$lista['ilosc'].")</option>";
}; 
$content .= "</select> <br />
Szablon aukcji: <select name=\"template_id\">";
foreach($templateList as $key => $lista)
{
	$content .= "<option value=\"".$lista['id']."\"";
	if(isset($aukcje['template_id'])) { if($lista['id'] == $aukcje['template_id']) {$content .= 'selected="selected"' ;} } 
	$content .= ">".$lista['name']."</option>";
}; 
$content .= "</select> <br />
Opis produktu (1): <textarea name=\"opis1\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis1'])."</textarea><br /> 
Opis produktu (2): <textarea name=\"opis2\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis2'])."</textarea><br /> 
Opis produktu (3): <textarea name=\"opis3\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis3'])."</textarea><br /> 
Opis produktu (4): <textarea name=\"opis4\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis4'])."</textarea><br /> 
Opis produktu (5): <textarea name=\"opis5\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis5'])."</textarea><br /> 
Opis produktu (6): <textarea name=\"opis6\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis6'])."</textarea><br /> 
Opis produktu (7): <textarea name=\"opis7\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis7'])."</textarea><br /> 
Opis produktu (8): <textarea name=\"opis8\" cols=\"180\" rows=\"5\">".str_replace("<br />","",$aukcje['opis8'])."</textarea><br /> 
</form>
</div>
 </div>
</div>
";
	$this->template->content = $content;	
	}
	else
	{
		
		if(isset($_POST['name']))
		{
			
			$allegroModel->setAuction($_POST);
		}
		
		
		
	$content = "";
		$aukcje = $allegroModel->getAuctionList();
		$templateList = $allegroModel->getTemplateList();
		$galleryList = $allegroModel->getGalleryList();
		$content .= "<h2>Lista dostępnych aukcji:</h2><ol>";	
		foreach($aukcje as $key => $lista): 
			$content .= "<li><a href=\"".url::base(true)."admin/allegro/showauction/".$lista['id']."\">".$lista['name']."</a></li>";
		endforeach;
		$content .= "</ol><hr>";
		$content .= "<h2>Dodaj nową aukcję</h2>";
		
$content .="<div style=\"width: 85%; margin: auto;\">
<form method=\"post\">
Nazwa aukcji w systemie:  - <input type=\"text\" size=\"100\" name=\"name\" value=\"\"><br>
Nazwa produktu: <input type=\"text\" size=\"100\" name=\"nazwa\" value=\"\">
<span style=\"float:right;\"><input type=\"submit\" value=\"Dodaj\"></span>
<br />
Cena produktu: <input type=\"text\" size=\"100\" name=\"cena\" value=\"\"> <br /> 
Galeria zdjęć: <select name=\"gallery_id\">";
foreach($galleryList as $key => $lista)
{
	$content .= "<option value=\"".$lista['id']."\"";
	if(isset($aukcje['gallery_id'])) { if($lista['id'] == $aukcje['gallery_id']) {$content .= 'selected="selected"' ;} } 
	$content .= ">".$lista['name']."(".$lista['ilosc'].")</option>";
}; 
$content .= "</select> <br />
Szablon aukcji: <select name=\"template_id\">";
foreach($templateList as $key => $lista)
{
	$content .= "<option value=\"".$lista['id']."\"";
	if(isset($aukcje['template_id'])) { if($lista['id'] == $aukcje['template_id']) {$content .= 'selected="selected"' ;} } 
	$content .= ">".$lista['name']."</option>";
}; 
$content .= "</select> <br />
Opis produktu (1): <textarea name=\"opis1\" cols=\"180\" rows=\"5\"></textarea><br /> 
Opis produktu (2): <textarea name=\"opis2\" cols=\"180\" rows=\"5\"></textarea><br /> 
Opis produktu (3): <textarea name=\"opis3\" cols=\"180\" rows=\"5\"></textarea><br /> 
Opis produktu (4): <textarea name=\"opis4\" cols=\"180\" rows=\"5\"></textarea><br /> 
Opis produktu (5): <textarea name=\"opis5\" cols=\"180\" rows=\"5\"></textarea><br /> 
Opis produktu (6): <textarea name=\"opis6\" cols=\"180\" rows=\"5\"></textarea><br /> 
Opis produktu (7): <textarea name=\"opis7\" cols=\"180\" rows=\"5\"></textarea><br /> 
Opis produktu (8): <textarea name=\"opis8\" cols=\"180\" rows=\"5\"></textarea><br /> 
</form>
</div>	";	
		
		
		
		
		
	$this->template->content = $content;
	}








}

public function action_template()
{
$allegroModel = new Model_Allegro();

$id = $this->request->param('id');
	if (isset($id))
	{
		$error = false;
		if(isset($_POST['template_id'])) 
		{
			$id = $_POST['template_id'];
			$name = $_POST['nazwaszablonu'];
				if ($name == "") {$this->template->states = $this->gen_state("error","Nie podano nazwy szablonu"); $error = true;}
			
			$content = $_POST['content'];
				if ($content == "") {$this->template->states = $this->gen_state("error","Nie podano zawartości szablonu"); $error = true;}
			
			if(!$error) 
			{ 
				$allegroModel->updateTemplate($name,$content,$id); 
				$this->template->states = $this->gen_state("succes","Zaktualizowano szablon ".$name."");
			}
		}
		
		$id = $this->request->param('id');
		$template = $allegroModel->getTemplate($id);

		$template_id = $template['id'];
		$template_name = $template['name'];		
		$code = $template['content'];		
		$url_graph = url::base(true)."public/allegro/".$template_name."/images/";
		$code = str_replace("[url_graph]",$url_graph,$code);	
		
$content="
<ul id=\"allegrotabs\">
<li><a href=\"#\" title=\"tab1\">Podgląd</a></li>
<li><a href=\"#\" title=\"tab2\">Kod HTML</a></li>
</ul>
<div id=\"allegrocontent\">
<div id=\"tab1\" class=\"hide\">".$code."</div>
<div id=\"tab2\" class=\"hide\">
<div style=\"width: 85%; margin: auto;\">
<form method=\"post\">
Nazwa szablonu: <input type=\"text\" name=\"nazwaszablonu\" size=\"100\" placeholder=\" nazwa szablonu\" value=\"".$template_name."\">
<input type=\"hidden\" name=\"template_id\" value=\"".$template_id."\">
<span style=\"float: right;\"><input type=\"submit\" value=\"Aktualizuj szablon\"></span>
<br>
<textarea cols=\"200\" rows=\"100\" name=\"content\">".$code."</textarea>
</form>
</div>
</div>
</div>
";
		
$this->template->content = $content;		
		
	}
	else
	{
		$error = false;
		if(isset($_POST['nazwaszablonu'])) 
		{
			
			$name = $_POST['nazwaszablonu'];
				if ($name == "") {$this->template->states = $this->gen_state("error","Nie podano nazwy szablonu"); $error = true;}
			
			$content = $_POST['content'];
				if ($content == "") {$this->template->states = $this->gen_state("error","Nie podano zawartości szablonu"); $error = true;}
			
			if(!$error) 
			{ 
				$allegroModel->setTemplate($name,$content); 
				$this->template->states = $this->gen_state("succes","Utworzono szablon ".$name."");
			}
		}
		
		$lista = $allegroModel->getTemplateList();
$content = "<h2>Lista dostępnych szablonów:</h2><ol>";		
		
foreach($lista as $key => $lista): 
$content .= "<li><a href=\"".url::base(true)."admin/allegro/template/".$lista['id']."\">".$lista['name']."</a></li>";
endforeach;

$content .= "</ol>";
$content .= "<h2>Dodaj szablon</h2>";
$content .='<div style="width: 85%; margin: auto;">
<form method="post">
Nazwa szablonu: <input type="text" name="nazwaszablonu" size="100" placeholder=" nazwa nowego szablonu">
<span style="float: right;"><input type="submit" value="Dodaj szablon"></span>
<br>
<textarea cols="200" rows="100" name="content"></textarea>
</form>
</div>
';

		
		
$this->template->content = $content;		
	} // if isset param id 

} // end action template


	public function action_auctioninfo()
	{
		$allegroModel = new Model_Allegro();
		
		if(isset($_POST['update']))
		{
			$allegroModel->updateAuctionInform($_POST);
		}
		if(isset($_POST['new']))
		{
			$allegroModel->setAuctionInform($_POST);
		}
		
		
		$content="";
		$allegroModel = new Model_Allegro();
		$lista = $allegroModel->getAuctionInformList();
	foreach($lista as $key => $lista)
{
$content .= "
<div style=\"width:85%; margin: auto;\">
<form method=\"post\">
<input type=\"hidden\" name=\"id\" value=\"".$lista['id']."\">
<input type=\"hidden\" name=\"update\" value=\"".$lista['id']."\">
<p>[".$lista['id']."] - ".$lista['name']." <span style=\"float:right\"><input type=\"submit\" value=\"Aktualizuj\"></span></p>
<textarea name=\"content\" cols=\"200\" rows=\"10\">".str_replace("<br />","\n",$lista['content'])."</textarea><br />
</form>
</div>	
<hr>
";
	};
$content .= "
<div style=\"width:85%; margin: auto;\">
<form method=\"post\">
<input type=\"hidden\" name=\"new\" value=\"true\">
Nazwa: <input type=\"text\" name=\"name\" placeholder=\"nazwa nowego wpisu z dodatkowymi informacjami\" size=\"100\"> <span style=\"float:right\"><input type=\"submit\" value=\"Dodaj\"></span></p>
<textarea name=\"content\" cols=\"200\" rows=\"10\"></textarea><br />
</form>
</div>	
<hr>


";	
 
$this->template->content = $content;
	}


public function action_otherauction()
{
$content = "";
$allegroModel = new Model_Allegro();


$id = $this->request->param('id');
	if (isset($id))
	{
		if (isset($_POST['update']))
	{
		$allegroModel->updateOtherAuction($_POST);
	}
		
		$lista = $allegroModel->getOtherAuction($id);
		$content.= "
<div style=\"width:85%; margin: auto;\">
<form method=\"post\">
<p> id:".$lista['id']."<br />
<span style=\"float:right\"><input type=\"submit\" value=\"Aktualizuj\"></span>
<input type=\"hidden\" name=\"update\" value=\"true\">
<input type=\"hidden\" name=\"id\" value=\"".$lista['id']."\">
Wyświetlana nazwa: <input size=\"100\" placeholder=\" nazwa wyświetlana na zdjęciu\" name=\"name\" type=\"text\"value=\"".$lista['name']."\"><br />
String szukający: <input placeholder=\" poszczególne+słowa+oddzielaj+znakiem+plusa\" size=\"100\" name=\"content\" type=\"text\"value=\"".$lista['content']."\"><br />
Zdjęcie:<img src=\"".url::base(true)."public/gallery/w190h250_".$lista['image']."\"><br />
Nazwa zdjęcia: <input placeholder=\" wpisz nazwę pliku ze zdjęciem\" size=\"100\" name=\"image\" type=\"text\"value=\"".$lista['image']."\"><br />
USUNIĘTA: <input type=\"radio\" name=\"delete\" value=\"yes\"";
if($lista['delete'] == true) {$content.= " checked ";}
$content .= ">TAK  <input type=\"radio\" name=\"delete\" value=\"no\"";
if($lista['delete'] == false) {$content.= " checked ";}
$content .= ">NIE
</form>
</div>";
		
		
		$this->template->content = $content;
	}
	else
	{

	if (isset($_POST['new']))
	{
		$allegroModel->setOtherAuction($_POST);
	}



$lista = $allegroModel->getAllOtherAuctionList();	
$content .= "<h2>Pozostałe aukcje:</h2>";
	foreach($lista as $key => $lista)
	{
		$content.= "<a href=\"".url::base(true)."admin/allegro/otherauction/".$lista['id']."\"><h3>".$lista['id'].") Wyświetlana nazwa: <b>".$lista['name']."</b> .String szukający: <b>".$lista['content'].".</b> Zdjęcie:<img src=\"".url::base(true)."public/gallery/w190h250_".$lista['image']."\">";
		if($lista['delete'] == true) {$content.= " USUNIĘTA! ";}
		$content.="</h3></a><hr>";
	}

$content.= "<h2>Dodaj nową \"inną\" aukcję</h2>
<div style=\"float:right margin:auto; width: 85%\">
<form method=\"post\">
<input type=\"hidden\" name=\"new\" value=\"true\"><span style=\"float: right;\"><input type=\"submit\" value=\"Dodaj\"></span>
Wyświetlana nazwa: <input type=\"text\" name=\"name\" size=\"100\" placeholder=\" nazwa wyświetlana na zdjęciu\"><br />
String szukający: <input type=\"text\" name=\"string\" size=\"100\" placeholder=\" poszczególne+słowa+oddzielaj+znakiem+plusa\"><br />
Plik ze zdjęciem: <input type=\"text\" name=\"image\" size=\"100\" placeholder=\" wpisz nazwę pliku ze zdjęciem\"><br />
</form>
</div>
";

	
$this->template->content = $content;
}
}


private function settingsMenu()
	{
			$adminPath = URL::base(true)."admin/";
			$menu="";
			$menu.="<a href= \"".$adminPath."allegro/showauction\" >Pokaż aukcje</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."allegro/template\" >Pokaż szablony aukcji</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."allegro/auctioninfo\" >Dodatkowe informacje</a>";
			$menu .=" | ";
			$menu.="<a href= \"".$adminPath."allegro/otherauction\" >Inne aukcje</a>";
			$menu .=" | ";
			$menu.="<hr>";
		return $menu;
	}

	public function after(){     
		
		
	$this->template->title = "Allegro";
	$this->template->desc = "Kreator aukcjii Allegro";
	$this->template->settings_menu = $this->settingsMenu();
		
	$this->_script = array_merge(array(  
			$this->__JS__.'allegro_tabs.js',
        ), $this->_script);

		$this->_style = array_merge(array(
			$this->__CSS__.'allegro_tabs.css',
        
        ),$this->_style);
	     	
		
		parent::after();
	}

}
