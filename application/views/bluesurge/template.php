<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pl-PL">
    <head>
	<meta charset="UTF-8" />
	<meta name="keywords" content="<?php if(isset($keywords)) echo $keywords  ?>" />
	<meta name="description" content="<?php if(isset($description)) echo $description ?>" />
	<meta name='robots' content="<?php if(isset($robots)) echo $robots ; ?>" />
	<meta name="generator" content="marakCMS_v:0.1" />
	<meta name="copyright" content="<?php if(isset($copyright)) echo $copyright ; ?>">
	<meta http-equiv="reply-to" content="<?php if(isset($reply_to)) echo $reply_to ; ?>">
	<link rel="shortcut icon" href="<?php if(isset($dir_img)) echo $dir_img ?>favicon.ico" />
        <title><?php if(isset($title)) echo $title; ?></title>
        <?php
	foreach ($style as $key => $value)
		echo "\n\t".HTML::style($value);

	if (isset($adm_style))
	{
		foreach ($adm_style as $key => $value)
			echo "\n\t".HTML::style($value);
	}

	foreach ($script as $key => $value)
		echo "\n\t".HTML::script($value);
	if (isset($adm_script))
	{
		foreach ($adm_script as $key => $value)
			echo "\n\t".HTML::script($value);

	}

        ?>

    </head>
<body>
<?php if(isset($userAdmBar)) echo $userAdmBar ?>

<div id="container">
<div id="topheader">
<div id="logo"><a href="http://marak89.com"><?php if(isset($logo)) echo $logo ; ?></a> <span class="dark"><?php if(isset($motto)) echo $motto ; ?></span>
</div>
<div id="nav">
<?php  menu::show('glowne'); ?>
</div>
</div>
<div id="subheader">
<div id="subcontainer">

<div id="headlines">
<h1>Najnowsze</h1>
<?php menu::list0(); ?>
</div>

<div id="banner">
Współpracuję z :<br />
<a href="http://www.wloczka.com">
<img src="http://wloczka.com/img/logo.jpg?1365768856" alt="współpracuję z: wloczka.com" width="468" height="60" /></a><br />
</div>

<div id="latesttopics">
<h1>&nbsp;</h1>

<a href="">facebook</a><a href="#">google+</a><a href="#">twitter</a>

</div>
</div>
</div>
<?php if(isset($userLogBar)) echo $userLogBar ?>
<div id="bottom">
<div id="left">
<h1>Ostatnie projekty</h1>
<div class="sub"><a href="#">choinki-kozieglowy.com</a><a href="#">rabex-zarki.com</a>
<a href="#">wloczka.com</a><a href="#"> marak89.com</a><a
 href="#">weroznikawozniak.com</a>
</div>
<h1>PHP & MySQL</h1>
<div class="sub">
<?php menu::list2('php','mysql'); ?>
</div>
<h1>Linux User & Liniux Server</h1>
<div class="sub">
<?php menu::list1('linux'); ?>
</div>
</div>
<div id="middle">

<?php if(isset($content)) echo $content ?>


</div><!-- div middle -->
<div id="right">
<h1>Polecam</h1>
<div class="sub2">
<?php  menu::show('polecam'); ?>
</div>
<h1>privateBook</h1>
<div class="sub2">
<?php menu::list1('marak89'); ?>
</div>
<h1>mCMS/LearnNet</h1>
<div class="sub">
<?php menu::list2('mcms','learnnet'); ?>
</div>
</div>
</div>
</div>
<div id="footer">
<div class="left">
<?php  menu::show('glowne'); ?>
</div>
<div class="right">Łącza dostarcza: <a href="http://desire24.com">desire24.com</a> Design by: <a href="http://www.templatesurge.com">TemplateSurge</a> Powered by: <a href="">mCMS</a></div>
<div class="middle"><?php echo $copyright ; echo " 2006 -"; echo date(' Y'); ?></div>
</div>
<div class="cookie-bar">
<div>
W ramach naszej witryny stosujemy pliki cookies, aby ułatwić Ci korzystanie z naszego serwisu oraz do celów statystycznych. Korzystanie z witryny bez zmiany ustawień dotyczących plików cookies oznacza zgodę na ich użycie oraz zapisanie w pamięci urządzenia. Możesz samodzielnie zarządzać cookies i dokonać zmiany ustawień w swojej przeglądarce.<br>Więcej informacji w naszej <a href="<? echo url::base() ?>polityka-cookies">Polityce prywatności</a>.    		
</div>
<span class="close" title="Zamknij (ESC)">OK</span>
</div>
</body>
</html>
