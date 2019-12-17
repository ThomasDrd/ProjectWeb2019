
<?php
include 'template/header.php';

echo form_open('deal/dealupdate/'. $deal[0]->deal_id, '', array('user' => $_SESSION['idUser']));

echo '<div class="form-group">';

$input = array(
	'name' => 'nom',
	'id' => 'nom',
	'class' => 'form-control',
	'value' => $deal[0]->nom
);
echo form_label('Nom du deal', 'nom');
echo form_input($input);

$input = array(
	'name' => 'description',
	'id' => 'description',
	'class' => 'form-control',
	'value' => $deal[0]->description
);
echo form_label('Description', 'description');
echo form_input($input);

$input = array(
	'name' => 'conditions',
	'id' => 'conditions',
	'class' => 'form-control',
	'value' => $deal[0]->conditions
);
echo form_label('Conditions', 'conditions');
echo form_input($input);

$input = array(
	'name' => 'image',
	'id' => 'img',
	'class' => 'form-control',
	'value' => $deal[0]->img
);
echo form_label('Image', 'img');
echo form_input($input);

$input = array(
	'name' => 'datedeb',
	'id' => 'datedeb',
	'class' => 'form-control',
	'type' => 'date',
	'value' => date($deal[0]->date_deb)
);
echo form_label('Date début', 'nom');
echo form_input($input);


echo 'AFFICHER LES DATES ENREGISTRÉE';
$input = array(
	'name' => 'dateexp',
	'id' => 'dateexp',
	'class' => 'form-control',
	'type' => 'date',
	'value' =>''
);
echo form_label('Date expiration', 'dateexp');
echo form_input($input);

echo form_submit('submit', 'Submit Deal!', array('class' => 'btn btn-primary'));

echo '</div>';


include 'template/footer.php';
