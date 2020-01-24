<?php
include 'template/header.php';

echo '<span>'.form_open('pages/index');
	$research = array(
		'name' => 'search',
		'id' => 'search',
		'type' => 'text',
		'placeholder' => 'Recherche');
echo form_input($research);

	$dateStart = array(
		'name' => 'dateStart',
		'id' => 'dateStart',
		'type' => 'date');
echo form_input($dateStart);

	$dateEnd = array(
		'name' => 'dateEnd',
		'id' => 'dateEnd',
		'type' => 'date');

echo form_input($dateEnd).'<span></br>';
echo form_submit('submit', 'Rechercher', array('class' => 'btn btn-dark btn-connect'));

echo '<div class="row">';
foreach ($deal as $de)
{
	include 'template/deals.php';
}
echo '</div>';
include 'template/footer.php';
