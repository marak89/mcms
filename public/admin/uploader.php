<?php
$upload_folder = '../gallery/';


// Jeśli przeglądarka obsługuje funkcję sendAsBinary() możliwe jest wykorzystanie zwykłej tablicy $_FILES
if(count($_FILES)>0) { 

	$seed=srand(time().(int)$_FILES['upload']['name'].$_FILES['upload']['size']);
	$filename = md5(rand()).strstr($_FILES['upload']['name'],".");
	$oldfilename = $_FILES['upload']['name'];
	$mime_type = $_FILES['upload']['type'];
	$wielkosc = $_FILES['upload']['size'];
		
		if( move_uploaded_file( $_FILES['upload']['tmp_name'] , $upload_folder.$filename  ) ) {
	}


} else if(isset($_GET['up'])) {
	// Jeśli przeglądarka nie obsługuje funkcji sendAsBinary() 
	if(isset($_GET['base64'])) {
		$content = base64_decode(file_get_contents('php://input'));
	} else {
		$content = file_get_contents('php://input');
	}

	$headers = getallheaders();
	$headers = array_change_key_case($headers, CASE_UPPER);
	
	srand(time().(int)$headers['UP-FILENAME'].$headers['UP-SIZE']);
	$filename = md5(rand()).strstr($headers['UP-FILENAME'],".");

	$oldfilename = $headers['UP-FILENAME'];
	$mime_type = $headers['UP-TYPE'];
	$wielkosc = $headers['UP-SIZE'];
	
	if(file_put_contents($upload_folder.$filename, $content)) {

	}
}

$base=array(
'hostname'   => 'localhost',
'database'   => 'kohana1',
'username'   => 'kohana1',
'password'   => 'aXXbBmRs6EHa7Rdp',
);

$link = mysql_connect($base['hostname'], $base['username'], $base['password']) or error_log("blad_poloczenia_z_baza");
if ($link) {
$link2 = mysql_select_db($base['database'], $link) or error_log("blad_poloczenia_z_tabela");
$query = "insert into `photos` values(NULL,'".$filename."', '".$oldfilename."', '".$mime_type."', '".$wielkosc."', NULL, NULL)";
$result = mysql_query($query, $link) or error_log("blad_zapytania: - ".mysql_error());
}
mysql_close($link);


include('./SimpleImage.php');
$image = new SimpleImage();
$image->load($upload_folder.$filename);
$image->resize(190,250);
$image->save($upload_folder.'w190h250_'.$filename); 
$image->load($upload_folder.$filename);
$image->resizeToWidth(640);
$image->save($upload_folder.'w640_'.$filename); 
$image->resizeToHeight(480);
$image->save($upload_folder.'h480_'.$filename); 
$image->resizeToHeight(200);
$image->save($upload_folder.'h200_'.$filename); 

?>
