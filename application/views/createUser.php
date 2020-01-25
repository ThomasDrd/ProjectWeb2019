
<?php
include 'template/header.php';

echo form_open('users/userCreate');

echo '<div class="form-group">';


$input = array(
	'name' => 'pseudo',
	'id' => 'pseudo',
	'class' => 'form-control',
	'maxlength' => '30',
	'size'  => '30',
	'style' => 'width:30%'
);
echo form_label('Pseudo', 'pseudo');
echo form_input($input);

$image_properties = array(
	'src'   => 'images/picture.jpg',
	'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
	'class' => 'post_images',
	'width' => '200',
	'height'=> '200',
	'title' => 'That was quite a night',
	'rel'   => 'lightbox'
);


$input = array(
	'name' => 'nom',
	'id' => 'nom',
	'class' => 'form-control',
	'maxlength' => '40',
	'size'  => '40',
	'style' => 'width:40%'
);
echo form_label('Nom', 'nom');
echo form_input($input);

$input = array(
	'name' => 'prenom',
	'id' => 'prenom',
	'class' => 'form-control',
	'maxlength' => '40',
	'size'  => '40',
	'style' => 'width:40%'
);
echo form_label('Prenom', 'prenom');
echo form_input($input);

$input = array(
	'name' => 'mail',
	'id' => 'mail',
	'class' => 'form-control',
	'type' => 'mail',
	'maxlength' => '60',
	'size'  => '60',
	'style' => 'width:60%'
);
echo form_label('Mail', 'mail');
echo form_input($input);

$input = array(
	'name' => 'pwd',
	'id' => 'pwd',
	'class' => 'form-control',
	'type' => 'password',
	'maxlength' => '60',
	'size'  => '60',
	'style' => 'width:60%'

);
echo form_label('Password', 'pwd');
echo form_input($input);


$input = array(
	'name' => 'pwdc',
	'id' => 'pwdc',
	'class' => 'form-control',
	'type' => 'password',
	'maxlength' => '60',
	'size'  => '60',
	'style' => 'width:60%'
);
echo form_label('Password Confirmation', 'pwdc');
echo form_input($input);

echo form_submit('submit', 'Create', array('class' => 'btn btn-dark btn-add'));

echo '</div>';
if(isset($message_display))
{
	echo '<h4 class="alert alert-danger text-center" role="alert">' . $message_display . '</h4>';
}
?>

<div class="fileinput fileinput-new text-center" data-provides="fileinput">
	<div class="fileinput-new thumbnail img-circle img-raised">
		<img src="https://epicattorneymarketing.com/wp-content/uploads/2016/07/Headshot-Placeholder-1.png" alt="...">
	</div>
	<div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
	<div>
    <span class="btn btn-raised btn-round btn-default btn-file">
        <span class="fileinput-new">Add Photo</span>
	<span class="fileinput-exists">Change</span>
	<input type="file" name="..." /></span>
		<br />
		<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
	</div>
</div>
<?php
include 'template/footer.php';
