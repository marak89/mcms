<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($post as $key => $post): ?>
	<url>
		<loc><?php echo URL::base(true) . $post['url'] ?></loc>
		<lastmod><?php 
if (isset($post['data_last_mod'])) {
	echo date("Y-m-d",$post['data_last_mod']) ;
} else {
	echo date("Y-m-d",$post['data']) ;
}
?></lastmod>
	</url>
<?php endforeach; ?>
</urlset>
