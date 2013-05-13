<h2>User: </h2>
<p style="font-size:smaller">
<?php
$session = Session::instance();// Get the session instance
 if (($session->get('username') == $user['username'])) { ?>
<span style="float: right;"><?php echo html::anchor('user/edit/'.$user['username'],'Edytuj') ?> 
<?php echo html::anchor('user/delete/'.$user['username'],'Usuń') ?>
</span>
<?php } ?>
</p>
	<dt>Username:</dt>
	<dd><?php  if(isset($user['username'])) { echo "<b>".$user['username']."</b>";} ?></dd>          
	<dt>Imię:</dt>
	<dd><?php  if(isset($user['name'])) { echo "<b>". $user['name'] ."</b>";} ?></dd>          
	<dt>Nazwisko:</dt>
	<dd><?php  if(isset($user['surname'])) { echo "<b>". $user['surname'] ."</b>";} ?></dd>          
	<dt>Hasło:</dt>
	<dd><?php   if(isset($user['password'])) { echo "<b>". $user['password'] ."</b>";} ?></dd>          
	<dt>email:</dt>
	<dd><?php   if(isset($user['email'])) { echo "<b>". $user['email'] ."</b>";} ?></dd>          
	<dt>skype:</dt>
	<dd><?php   if(isset($user['skype'])) { echo "<b>". $user['skype'] ."</b>";} ?></dd>          
	<dt>gg:</dt>
	<dd><?php  if(isset($user['gg'])) { echo "<b>". $user['gg'] ."</b>";} ?></dd>          
	<dt>url:</dt>
	<dd><?php   if(isset($user['url'])) { echo "<b>". $user['url'] ."</b>";} ?></dd>          
	<dt>adress (ulica, nr domu/mieszkania):</dt>
	<dd><?php   if(isset($user['address'])) { echo "<b>". $user['address'] ."</b>";} ?></dd>          
	<dt>Miasto:</dt>
	<dd><?php   if(isset($user['city'])) { echo "<b>". $user['city'] ."</b>";} ?></dd>          
	<dt>kod pocztowy:</dt>
	<dd><?php  if(isset($user['zip_code'])) { echo "<b>". $user['zip_code'] ."</b>";} ?></dd>          
	<dt>Opis:</dt>
	<dd><?php if(isset($user['description'])) { echo "<b>". $user['description'] ."</b>";} ?></dd>    
