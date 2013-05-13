<h2>Uzupełnij informacje</h2>

<?php echo Form::open() ?>
<dl>          
    <dt>Tytuł: (100 znakow)</dt>
    <dd><?php echo Form::input('title',(isset($post['title']))?$post['title']:'' ,array('maxlength' => '100', 'size' => '90') ); ?> <?php if(isset($err_title)) {echo $err_title ; } ?>
</dd>
    
    <?php $session = Session::instance();// Get the session instance ?>
   
    <dd><?php echo Form::hidden('author',$session->get('username') );?></dd>

                     
    <dt>Opis: (40 znaków)</dt>
    <dd><?php echo Form::input('desc',(isset($post['desc']))?$post['desc']:'',array('maxlength' => '40', 'size' => '90') ); ?>  <?php if(isset($err_desc)) {echo $err_desc ; } ?> </dd> 

	<dt>img: (wklej ścieżkę do pliku)</dt>
	<dd><?php echo Form::input('image',(isset($post['image']))?$post['image']:'',array('maxlength' => '100', 'size' => '90') ); ?>  <?php if(isset($err_image)) {echo $err_image ; } ?> </dd>  

<dt>Słowa kluczowe/tagi: (oddzielaj przecinkiem)</dt>
	<dd><?php echo Form::input('tags',(isset($post['tags']))?$post['tags']:'',array('maxlength' => '255', 'size' => '90') ); ?>  <?php if(isset($err_tags)) {echo $err_tags ; } ?> </dd>  
  
    <dt>Treść:</dt>
    <dd><?php echo Form::textarea('content',(isset($post['content']))?$post['content']:'', array('rows' => 25, 'cols' => 70) ); ?> <?php if(isset($err_content)) {echo $err_content ; } ?> </dd>  
    <dt>Typ:</dt>
<?php 
$selected = 0;
	if (isset($post['page']) && isset($post['stick']) ){
		if($post['page'] == 1 ) { $selected = 1; } 
		if($post['stick'] == 1 ) {$selected = 2; } 
	} // isset page | stick
?>
    <dd><?php echo Form::select('type', array('Blog', 'Strona', 'Stick'), "$selected" ); ?></dd>
    <dt></dt>
    <dd><?php echo Form::submit('', 'Dalej ->') ?></dd>
</dl>
<?php echo Form::close() ?>

