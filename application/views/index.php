<?php
include 'template/header.php';
$attributes = array('class' => 'form-inline');

echo form_open('pages/index', $attributes);

	$research = array(
		'name' => 'search',
		'class' => 'form-control',
		'id' => 'search',
		'type' => 'text',
		'placeholder' => 'Recherche');
echo '<div class="form-group">'.form_input($research).'</div>';

	$dateStart = array(
		'name' => 'dateStart',
		'class' => 'form-control',
		'id' => 'dateStart',
		'type' => 'date');
echo '<div class="form-group">'.form_input($dateStart).'</div>';

	$dateEnd = array(
		'name' => 'dateEnd',
		'class' => 'form-control',
		'id' => 'dateEnd',
		'type' => 'date');

echo '<div class="form-group">'.form_input($dateEnd).'</div>';

echo form_submit('submit', 'Rechercher', array('class' => 'btn btn-dark btn-connect'));
echo form_close();


echo '<div class="row">';
foreach ($deal as $de)
{
	include 'template/deals.php';
}
echo '</div>';
include 'template/footer.php';
