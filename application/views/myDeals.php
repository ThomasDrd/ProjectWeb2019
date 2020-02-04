<?php
include  'template/header.php';

echo'
<a type="button" class="btn btn-dark btn-add" href="' . base_url('pages/createDeal') . '">Ajouter un deal</a>
';

if (sizeof($dealOnline) > 0)
{
	echo '<div class="row">';
	echo '<h4 class="col alert alert-success text-center" >DEAL EN LIGNE</h4>';
	echo '</div>';
	echo '<div class="row">';
	foreach ($dealOnline as $de)
	{
		include 'template/deals.php';
	}
	echo '</div>';
}

if (sizeof($dealOffline) > 0)
{
	echo '<div class="row">';
	echo '<h4 class="col alert alert-danger text-center" >DEAL EN ATTENTE DE VÉRIFICATION PAR UN MODÉRATEUR</h4>';
	echo '</div>';
	echo '<div class="row">';
	foreach ($dealOffline as $de)
	{
		include 'template/deals.php';
	}
	echo '</div>';

}

include 'template/footer.php';
