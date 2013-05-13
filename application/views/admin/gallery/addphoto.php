<?php if (isset($settings_menu)) { echo $settings_menu;} ?>


<h3>Przeciągnij Twoje zdjęcia do pola poniżej: </h3>
<h4 style="color: red;">W przypadku wolnych łączy internetowych należy wysyłać zdjęcia <b>pojedyńczo!</b></h4>

<script>
    $(document).ready(function () {
		$("#dragupload").ready( function() {
				uploader('dragupload', 'status', '<?php echo URL::base(true) ?>public/admin/uploader.php', 'list');
			});});
</script>
<div id="dragupload"  >
	<div id="box">
		<div id="status">Przeciągnij obrazy z folderu do zaznaczonego obszaru ...</div>
		<div id="drop">
		
				<div id="list"></div>
		<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
		<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
		<br /> <br /> <br /> <br /> <br /> <br /> 
		</div>
	</div>


</div>

