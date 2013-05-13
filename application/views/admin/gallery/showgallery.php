<?php if (isset($settings_menu)) { echo $settings_menu;} ?>

<h2><?php echo $nazwa['name'] ?></h2>
<h3><?php echo $nazwa['desc'] ?></h3>
<?php if (isset($list)) { ?>
<?php foreach($list as $key => $lista): ?>
<div style=" float: left; padding: 2px;">
        <img src="<?php echo url::base(true)."public/gallery/h200_".$lista['filename'] ?>"  height="200">
	<?php if (isset($galleryList)) { ?>
		<form method="post">
			<input type="hidden" name="update" value="yes">
			<input type="hidden" name="photoid" value="<?php echo $lista['id'] ?>">
			<select name="galleryid">
					<?php foreach($galleryList as $key => $gallery): ?>
						<option value="<?php echo $gallery['id'] ?>" <?php if($gallery['id'] == $lista['gallery_id']) {echo 'selected="selected"' ;}  ?> ><?php echo $gallery['name'] ?></option>
					<?php endforeach; ?>
			</select>	
			<input type="submit" value="Zaktualizuj">
		</form>
		<h3><?php echo $lista['filename'] ?></h3>
	<?php }  // if isset galleryList ?>
</div>
<?php endforeach; ?>
<?php } else { // if isset $list ?>
<h3>Brak zdjęć</h3>
<?php } ?>
