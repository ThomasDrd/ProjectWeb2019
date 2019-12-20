<?php
include 'template/header.php';

echo form_open('users/userUpdate/'.$user[0]->user_id);

echo '<div class="form-group">';

	$input = array(
	'name' => 'pseudo',
	'id' => 'pseudo',
	'class' => 'form-control',
	'value' => $user[0]->pseudo
	);
	echo form_label('Votre Pseudo', 'pseudo');
	echo form_input($input);

	$input = array(
	'name' => 'mail',
	'id' => 'mail',
	'class' => 'form-control',
	'type' => 'mail',
	'value' => $user[0]->mail
		);
	echo form_label('Votre mail', 'pwd');
	echo form_input($input);

	$input = array(
		'name' => 'pwd',
		'id' => 'pwd',
		'class' => 'form-control',
		'type' => 'password'
	);
	echo form_label('Mot de passe', 'pwd');
	echo form_input($input);


	$input = array(
		'name' => 'pwdconf',
		'id' => 'pwdconf',
		'class' => 'form-control',
		'type' => 'password'
	);

	echo form_label('Confirmation mot de passe', 'pwdconf');
	echo form_input($input);

	echo form_submit('submit', 'Modifier', array('class' => 'btn btn-dark btn-connect'));


include  'template/footer.php';
