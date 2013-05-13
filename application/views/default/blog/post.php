<h2><?php if (isset($post['title'])) {echo $post['title'];} ?></h2>
<p style="font-size:smaller">
<?php if($post['page'] == false ) { ?>
	Autor: <?php echo html::anchor('user/show/'.$post['author'], $post['author']) ; ?> 
	<span style="float: right;">
	Data:  <?php echo date('d-m-Y H:i:s',$post['data']) ?>
	</span>
<?php } // if post[page]==false ?>
<?php
$session = Session::instance();// Get the session instance
if ($session->get('username') == $post['author']) { ?>
	<span style="float: right;"><?php echo html::anchor('blog/edit/'.$post['url'],'Edytuj') ?> 
		<?php echo html::anchor('blog/delete/'.$post['url'],'Usuń') ?>
	</span>
<?php } // if username == author ?>
</p>
<br />
<?php if (isset($post['desc'])) {echo "<b>".$post['desc']."</b>";} ?>
 <br /> <br /> 
<?php if (isset($post['content'])) {echo $post['content'];} ?>

<?php if($post['page'] == false ) { ?>
<?php if($post['mod_count'] > 0 ) { ?>
	<br /><p style="font-size:smaller">
	Ostatnia modyfikacja 
	<?php if (isset($post['data_last_mod'])) {echo "<b>".date('d-m-Y H:i:s',$post['data_last_mod'])."</b>";} ?>
	przez
	<?php if (isset($post['user_last_mod'])) {echo html::anchor('user/show/'.$post['user_last_mod'], $post['user_last_mod']);} ?>.
	W sumie edytowano <?php if (isset($post['mod_count'])) {echo $post['mod_count'];} ?> razy </p>
<?php } // modcount > 0 ?>
<?php } // page == false ?>
