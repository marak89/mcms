<h2><?php if (isset($post['title'])) {echo $post['title'];} ?></h2>
<p style="font-size:smaller">
<?php if($post['page'] == false ) { ?>
	Autor: <?php echo html::anchor('user/show/'.$post['author'], $post['author']) ; ?> 
	<span style="float: right;">
	Data:  <?php echo date('d-m-Y H:i:s',$post['data']) ?>
	</span>
<?php } // if post[page]==false ?>


</p>
<br />
<?php if (isset($post['desc'])) {echo "<b>".$post['desc']."</b>";} ?>
 <br /> <br /> 
<?php if (isset($post['content'])) {echo $post['content'];} ?>

<?php if (isset($post['gallery'])) { if ($post['gallery'] != null) { if (isset($img)) {?>
	<?php foreach($img as $key => $img): ?>
<a href="<?php echo url::base(true)."public/gallery/h480_".$img['filename'] ?>" class="lytebox" data-title="" 
data-lyte-options="group:towar titleTop:false navTop:true" data-description="<?php echo $img['desc'] ?>">
<img src="<?php echo url::base(true)."public/gallery/h200_".$img['filename'] ?>" alt="<?php echo $img['desc'] ?>" /></a> 
<?php endforeach; ?>
	
<?php }}} ?>.

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
