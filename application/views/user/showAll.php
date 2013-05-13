<ul>
<?php foreach($user as $key => $user): ?>        
<li><?php echo html::anchor('user/show/'.$user['username'], $user['username']) ?></li>
<?php endforeach; ?>
</ul>
