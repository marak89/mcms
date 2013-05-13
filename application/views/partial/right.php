<h2>Strony</h2>
<ul>
<?php foreach($pageLink as $key => $pageLink): ?>
	<li><?php echo html::anchor(''.$pageLink['url'], $pageLink['title']) ?></li>
<?php endforeach; ?>
</ul>
