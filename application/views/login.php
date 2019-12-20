<?php
include 'template/header.php';

echo form_open('users/loguser');

echo '<div class="form-group">';

	$input = array(
	'name' => 'name',
	'id' => 'name',
	'class' => 'form-control'
	);
	echo form_label('Pseudo', 'name');
	echo form_input($input);

	$input = array(
	'name' => 'pwd',
	'id' => 'pwd',
	'class' => 'form-control',
	'type' => 'password'
	);
	echo form_label('Mot de passe', 'pwd');
	echo form_input($input);


	echo form_submit('submit', 'Se connecter', array('class' => 'btn btn-dark btn-connect'));

	echo '</div>';

include  'template/footer.php';

