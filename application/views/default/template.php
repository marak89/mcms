<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pl-PL">
    <head>
	<meta charset="UTF-8" />
	<meta name="keywords" content="<?php if(isset($keywords)) echo $keywords  ?>" />
	<meta name="description" content="<?php if(isset($description)) echo $description ?>" />
	<meta name='robots' content="<?php if(isset($robots)) echo $robots ; ?>" />
	<meta name="generator" content="marakCMS_v:0.1" />
	<meta name="copyright" content="<?php if(isset($copyright)) echo $copyright ; ?>">
	<meta http-equiv="reply-to" content="<?php if(isset($reply_to)) echo $reply_to ; ?>">
	<link rel="shortcut icon" href="<?php if(isset($dir_img)) echo $dir_img ?>favicon.ico" />
        <title><?php if(isset($title)) echo $title; ?></title>
        <?php
	foreach ($style as $key => $value)
            echo "\n\t".HTML::style($value);

	foreach ($script as $key => $value)
            echo "\n\t".HTML::script($value);
        ?>

	<script type="text/javascript" src="http://www.google.com/jsapi">google.load("jquery", "1");</script> <!-- # Load jQuery from google-->

    </head>
    <body>
        <div id = "main">
            <div id = "header">
                <!-- header begins -->
<div id="header">

	<div id="logo"><a href="<?php echo URL::base(true); ?>"><?php if(isset($title)) echo $title ; ?></a>
		<h2><a href="<?php echo URL::base(true); ?>"><?php if(isset($motto)) echo $motto ; ?></a></h2>
	</div>
	<div id="buttons">
		<?php  menu::show('glowne'); ?>
	</div>

</div>
<!-- header ends -->
            </div> <!-- end of header -->

<!-- content begins -->
<div id="content">
<!-- zamykamy prawą stronę  --> 
<div id="right">
<div id="sidebar">
			<ul>
			<!-- ################################################## -->
			<li>
				<?php menu::show('sztuczne'); ?>
			</li>
			<!-- ################################################## -->				
			</ul>
		</div> <!-- end #sidebar -->
	</div> <!-- end #right -->
<!-- zamykamy prawą stronę  -->
	<div id="left">
		<?php if(isset($content)) echo $content ?>
	</div><!-- end #left -->
</div><!-- end #content -->
               <!-- footer begins -->
<div id="footer">
  <p>Copyright <?php echo $copyright ; echo date(' Y'); ?> . Designed by <a href="http://www.freecsstemplate.net" title="Free Css Templates">Free Css Templates</a></p>
</div>
<!-- footer ends -->
        </div> <!-- end #main -->
        <?php // echo View::factory('profiler/stats'); ?>
    </body>
</html>

