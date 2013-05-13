<?php foreach($post as $key => $post): ?>
        <h2><?php echo html::anchor(''.$post['url'], $post['title']) ?></h2>
<p style="font-size:smaller">
Autor: <?php echo html::anchor('user/show/'.$post['author'], $post['author']) ; ?> 
<span style="float: right;">
Data:  <?php echo date('d-m-Y H:i:s',$post['data']) ?>
</span>
</p>
        <p><?php echo Text::limit_chars($post['desc'], 1000)  ?></p>
<?php endforeach; ?>

