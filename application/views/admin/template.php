<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>AdminPanel - marak89.com</title>


        <?php
	foreach ($style as $key => $value)
		echo "\n\t".HTML::style($value);


	foreach ($script as $key => $value)
		echo "\n\t".HTML::script($value);
	

        ?>

</head>
<body>
	<div id="wrapper">
		<div id="content">
			<div class="c1">
				<div class="controls">
					<nav class="links">
						<ul>
							<?php if(isset($topmenu)){ echo $topmenu ;} else { echo''; } ?>
						</ul>
					</nav>
					<div class="profile-box">
						<span class="profile">
							<a href="#" class="section">
								<img class="image" src="<?php if(isset($username_avatar_url)){ echo $username_avatar_url ;} else { echo''; } ?>" alt="<?php if(isset($username)){ echo $username ;} else { echo''; } ?> avatar" width="26" height="26" />
								<span class="text-box">
									Witaj
									<strong class="name"><?php if(isset($username)){ echo $username ;} else { echo''; } ?></strong>
								</span>
							</a>
							<a href="#" class="opener">opener</a>
						</span>
						<a href="<?php echo url::base(true); ?>login/logout/" class="btn-on">On</a>
					</div>
				</div>
				<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1><?php if(isset($title)){ echo $title ;} else { echo''; } ?></h1>
								<p><?php if(isset($desc)){ echo $desc ;} else { echo''; } ?></p>
							</div>
								<?php if(isset($states)){ echo $states ;} else { echo''; } ?>
								<div style=" padding-left:30px;padding-right:30px;" >
									<?php if (isset($settings_menu)) { echo $settings_menu;} ?>
									<?php if(isset($content)){ echo $content ;} else { echo''; } ?>
								</div>
						</article>
					</div>
				</div>
			</div>
		</div>
		<aside id="sidebar">
			<strong class="logo"><a href="#">lg</a></strong>
			<ul class="tabset buttons">
				<?php if(isset($menu)){ echo $menu ;} else { echo''; } ?>
			</ul>
			<span class="shadow"></span>
		</aside>
	</div>
</body>
</html>
