<?php
include 'template/header.php';

echo '<div class="row text">';
echo '<p>Les Super\'s forfaits mobiles est un site vous permettant de retrouver les meilleures offres mobiles du moment.<br/>
		Les offres présentées ici sont toutes partagées par la communauté<br/><br/>
		Ces deals sont susceptibles de vous intéresser :
		</p>';
echo '</div>';


$attributes = array('class' => 'form-inline');

//Formulaire qui récupère les arguments de la recherche d'un deal

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
