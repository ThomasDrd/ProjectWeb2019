
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

$dateDebutDeal = new DateTime($deal[0]->date_deb);
$input = array(
	'name' => 'datedeb',
	'id' => 'datedeb',
	'class' => 'form-control',
	'type' => 'date',
	'value' => $dateDebutDeal->format('Y-m-d')
);
echo form_label('Date début', 'nom');
echo form_input($input);

$dateExpDeal = new DateTime($deal[0]->date_exp);
$input = array(
	'name' => 'dateexp',
	'id' => 'dateexp',
	'class' => 'form-control',
	'type' => 'date',
	'value' => $dateExpDeal->format('Y-m-d')
);
echo form_label('Date expiration', 'dateexp');
echo form_input($input);

echo form_submit('submit', 'Update !', array('class' => 'btn btn-dark btn-add'));

echo '<a type="button" class="btn btn-danger" href="' . base_url('Pages/deleteDeal/') . $deal[0]->deal_id .'">Supprimer</a>';
echo '</div>';
if(isset($message_display))
{
	echo '<h4 class="alert alert-danger text-center" role="alert">' . $message_display . '</h4>';
}

include 'template/footer.php';
