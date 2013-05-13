<?php 
$session = Session::instance();// Get the session instance 
$tmp_username = $session->get('username'); 
$tmp_range = $session->get('range'); 
?>
<li><?php echo html::anchor('blog/index','Blog') ?></li>
<?php 
if ((isset($tmp_range)) && ($tmp_range > 4) ) { 
?>
<li><?php echo html::anchor('blog/add','Dodaj Post') ?></li>
<li><?php echo html::anchor('user/add','Dodaj usera') ?></li>
<?php } ?>
<?php 
if (isset($tmp_username)) { ?>
<li><?php echo html::anchor('user/showAll','Użytkownicy') ?></li>
<li><?php echo html::anchor('user/show/'.$tmp_username.'',$tmp_username); ?></li>
<li><?php echo html::anchor('login/logout','Wyloguj') ?></li>
<?php } else { ?>
<li><?php echo html::anchor('login/','Zaloguj') ?></li>
<?php } // end else ?>

