
<?php
include 'template/header.php';

echo form_open('users/userCreate');

echo '<div class="form-group">';


$input = array(
	'name' => 'pseudo',
	'id' => 'pseudo',
	'class' => 'form-control'
);
echo form_label('Pseudo', 'pseudo');
echo form_input($input);

$input = array(
	'name' => 'nom',
	'id' => 'nom',
	'class' => 'form-control'
);
echo form_label('Nom', 'nom');
echo form_input($input);

$input = array(
	'name' => 'prenom',
	'id' => 'prenom',
	'class' => 'form-control'
);
echo form_label('Prenom', 'prenom');
echo form_input($input);

$input = array(
	'name' => 'mail',
	'id' => 'mail',
	'class' => 'form-control',
	'type' => 'mail'
);
echo form_label('Mail', 'mail');
echo form_input($input);

$input = array(
	'name' => 'pwd',
	'id' => 'pwd',
	'class' => 'form-control',
	'type' => 'password'
);
echo form_label('Password', 'pwd');
echo form_input($input);


$input = array(
	'name' => 'pwdC',
	'id' => 'pwdc',
	'class' => 'form-control',
	'type' => 'password'
);
echo form_label('Password Confirmation', 'pwdc');
echo form_input($input);

echo form_submit('submit', 'Create', array('class' => 'btn btn-dark btn-add'));

echo '</div>';


include 'template/footer.php';
