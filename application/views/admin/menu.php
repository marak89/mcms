<?php $adminurl=url::base()."admin/" ?>
<ul id="admin_menu">
	<li><a href="#">Blog</a>
		<ul>
			<li><a href="<?php echo $adminurl."blog/add" ?>">Dodaj post/stronę</a></li>
			<li><a href="<?php echo $adminurl."blog/index" ?>">Pokaż moje posty</a></li>
			<li><a href="<?php echo $adminurl."blog/pages" ?>">Pokaż moje strony</a></li>

		</ul>
	</li>
	<li><a href="#">Galeria</a>
		<ul>
			<li><a href="<?php echo $adminurl."gallery/addphoto" ?>">Dodaj zdjęcia</a></li>
			<li><a href="<?php echo $adminurl."gallery/addgallery" ?>">Zarządzaj galeriami</a></li>
			<li><a href="<?php echo $adminurl."gallery/addphototogallery" ?>">Przypisz obraz do galerii</a></li>
		</ul>
	</li>
	<li><a href="#">Allegro</a>
		<ul>
			<li><a href="<?php echo $adminurl."allegro/showauction" ?>">Manager aukcji</a></li>
			<li><a href="<?php echo $adminurl."allegro/template" ?>">Manager szablonów aukcji</a></li>
		</ul>
	</li>
	<li><a href="#">Konfiguracja</a>
		<ul>
			<li><a href="<?php echo $adminurl."config" ?>">Konfiguracja</a></li>
		</ul>
	</li>

	

	<li id="am_username"><a href="#">marak89</a>
		<ul>
			
			<li><a href="<?php echo url::base()."login/logout" ?>">Wyloguj</a></li>
		</ul>
	</li>

</ul>
