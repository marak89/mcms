<?php if (isset($settings_menu)) { echo $settings_menu;} ?>
<h2>Przypisz obraz do galerii</h2>
<?php if (isset($list)) { ?>
<?php foreach($list as $key => $lista): ?>

<div style=" float: left; padding: 2px;">
<img id="gall<?php echo $lista['id'] ?>" src="<?php echo url::base(true)."public/gallery/h200_".$lista['filename'] ?>">
			<?php if (isset($galleryList)) { ?>
			<form method="post">
				<input type="hidden" name="update" value="yes">
				<input type="hidden" name="photoid" value="<?php echo $lista['id'] ?>">
				<select name="galleryid">
				
					<?php foreach($galleryList as $key => $lista): ?>
						<option value="<?php echo $lista['id'] ?>"><?php echo $lista['name'] ?></option>
					<?php endforeach; ?>
				
				</select>
				<input type="submit" value="Zaktualizuj">
			</form>
		<?php }  // if isset galleryList ?>
</div>
<?php endforeach; ?>
<?php } else { // if isset $list ?>
<h3>Brak zdefiniowanych galerii</h3>
<?php } ?>
