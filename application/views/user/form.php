<h2>Uzupełnij informacje</h2>

<?php echo Form::open() ?>
<dl>
	<dt>Username:</dt>
	<dd><?php echo Form::input('username',(isset($user['username']))?$user['username']:'' ); ?></dd>          
	<dt>Imię:</dt>
	<dd><?php echo Form::input('name',(isset($user['name']))?$user['name']:'' ); ?></dd>          
	<dt>Nazwisko:</dt>
	<dd><?php echo Form::input('surname',(isset($user['surname']))?$user['surname']:'' ); ?></dd>          
	<dt>Hasło:</dt>
	<dd><?php echo Form::input('password',(isset($user['password']))?$user['password']:'' ); ?></dd>          
	<dt>email:</dt>
	<dd><?php echo Form::input('email',(isset($user['email']))?$user['email']:'' ); ?></dd>          
	<dt>skype:</dt>
	<dd><?php echo Form::input('skype',(isset($user['skype']))?$user['skype']:'' ); ?></dd>          
	<dt>gg:</dt>
	<dd><?php echo Form::input('gg',(isset($user['gg']))?$user['gg']:'' ); ?></dd>          
	<dt>url:</dt>
	<dd><?php echo Form::input('url',(isset($user['url']))?$user['url']:'' ); ?></dd>          
	<dt>adress (ulica, nr domu/mieszkania):</dt>
	<dd><?php echo Form::input('address',(isset($user['address']))?$user['address']:'' ); ?></dd>          
	<dt>Miasto:</dt>
	<dd><?php echo Form::input('city',(isset($user['city']))?$user['city']:'' ); ?></dd>          
	<dt>kod pocztowy:</dt>
	<dd><?php echo Form::input('zip_code',(isset($user['zip_code']))?$user['zip_code']:'' ); ?></dd>          
	<dt>Opis:</dt>
	<dd><?php echo Form::textarea('description',(isset($user['description']))?$user['description']:'' ); ?></dd>    
    
    <dt></dt>
    <dd><?php echo Form::submit('', 'Dalej ->') ?></dd>
</dl>
<?php echo Form::close() ?>

