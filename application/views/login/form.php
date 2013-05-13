<h2>Uzupełnij informacje</h2>

<?php if (isset($error)) { ?>
<div id="error" style="color:red;">
<?php echo $error; ?>
</div>
<?php } ?>

<?php echo Form::open() ?>
<dl>          
    <dt>Username:</dt>
    <dd><?php echo Form::input('username',(isset($post['title']))?$post['title']:'' ); ?></dd>

    <dt>Hasło:</dt>
    <dd><?php echo Form::password('password','' );?></dd>
 
    <dt>&nbsp</dt>
    <dd><?php echo Form::submit('', 'Dalej ->') ?></dd>
</dl>
<?php echo Form::close() ?>

