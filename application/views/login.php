<?php
include 'template/header.php';

echo form_open('users/loguser');

echo '<div class="form-group">';

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
	echo form_label('Mot de passe', 'pwd');
	echo form_input($input);

	echo form_submit('submit', 'Se connecter', array('class' => 'btn btn-dark btn-connect'));

	echo '</div>';
if(isset($message_display))
{
	echo '<h4 class="alert alert-danger text-center" role="alert">' . $message_display . '</h4>';
}


include  'template/footer.php';

