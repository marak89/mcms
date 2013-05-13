<?php if (isset($settings_menu)) { echo $settings_menu;} ?>
<?php foreach($post as $key => $post): ?>
        <h2><?php echo HTML::anchor(''.$post['url'], $post['title']) ?></h2>
<p style="font-size:smaller">
	Autor: <?php echo html::anchor('user/show/'.$post['author'], $post['author']) ; ?> 
	
	Data:  <?php echo date('d-m-Y H:i:s',$post['data']) ?>
	
	<span style="float: right;">
		<?php
			if ($post['del'] == true) 
			{
				echo html::anchor('admin/blog/restore/'.$post['url'],'Przywróc') ;
				echo " | ";
				echo html::anchor('admin/blog/permdelete/'.$post['url'],'Usuń');
			}
			else
			{
				echo html::anchor('admin/blog/edit/'.$post['url'],'Edytuj') ;
				echo " | ";
				echo html::anchor('admin/blog/delete/'.$post['url'],'Usuń');
			}
		?>
	</span>
</p>

        <p><b><?php echo $post['desc']  ?></b></p>
        
        <p><?php echo $post['content']  ?></p>
        <hr>
<?php endforeach; ?>

