
<?php
include 'template/header.php';

echo form_open('deal/dealcreate', '', array('user' => $_SESSION['idUser']));

echo '<div class="form-group">';

$input = array(
	'name' => 'nom',
	'id' => 'nom',
	'class' => 'form-control',
	'maxlength' => '100',
	'size'  => '50',
	'style' => 'width:50%'
);
echo form_label('Le nom de votre deal', 'nom');
echo form_input($input);

$input = array(
	'name' => 'description',
	'id' => 'description',
	'class' => 'form-control',

);
echo form_label('La description de votre deal', 'description');
echo form_textarea($input);

$input = array(
	'name' => 'conditions',
	'id' => 'conditions',
	'class' => 'form-control'

);
echo form_label('Les conditions du deal', 'conditions');
echo form_input($input);

$input = array(
	'name' => 'datedeb',
	'id' => 'datedeb',
	'class' => 'form-control',
	'type' => 'date'
);
echo form_label('Date début', 'nom');
echo form_input($input);

$input = array(
	'name' => 'dateexp',
	'id' => 'dateexp',
	'class' => 'form-control',
	'type' => 'date'
);
echo form_label('Date de l\'expiration', 'dateexp');
echo form_input($input);

echo form_submit('submit', 'Submit Deal!', array('class' => 'btn btn-dark btn-add'));

echo '</div>';
if(isset($message_display))
{
	echo '<h4 class="alert alert-danger text-center" role="alert">' . $message_display . '</h4>';
}

include 'template/footer.php';
