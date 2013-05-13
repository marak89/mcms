<?php if (isset($settings_menu)) { echo $settings_menu;} ?>
<form method="POST">
Wpisz nazwę galerii: <input type="text" name="galleryname" ><br />
Wpisz opis galerii: <input type="text" name="gallerydesc" ><br />
<input type="submit" value="Dodaj"> 
</form>
<hr />
<h2>Aktualne galerie</h2>
<?php if (isset($list)) { ?>
<?php foreach($list as $key => $lista): ?>
        <h3 id="gall<?php echo $lista['id'] ?>"><?php echo "<a href=\"".URL::base(true)."admin/gallery/show/".$lista['id']."\"> ".$lista['name']."(".$lista['ilosc'].")</a> - <b>".$lista['desc']."</b>"; ?></h3>
        <div style="display:none;" id="gall<?php echo $lista['id'] ?>">
			<form method="post">
				<input type="text" name="galleryname" value="<?php echo $lista['name'] ?>" >
				<input type="text" name="gallerydesc" value="<?php echo $lista['desc'] ?>" >
				<input type="hidden" name="update" value="yes">
				<input type="hidden" name="id" value="<?php echo $lista['id'] ?>">
				<input type="submit" value="Zaktualizuj">
			</form>
		</div>
<script>
    $("h3#gall<?php echo $lista['id'] ?>").click(function () {
      $("div#gall<?php echo $lista['id'] ?>").show("fast");
    }); 
</script>
<?php endforeach; ?>
<?php } else { // if isset $list ?>
<h3>Brak zdefiniowanych galerii</h3>
<?php } ?>
