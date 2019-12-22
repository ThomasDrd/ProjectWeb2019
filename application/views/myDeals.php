<?php 
include  'template/header.php';

if (isset($_SESSION['user']))
{
		echo'
				<a type="button" class="btn btn-dark btn-add" href="' . base_url('pages/createDeal') . '">Ajouter un deal</a>
			';


echo '<div class="row">';
foreach ($deal as $de)
{
	include 'template/deals.php';
}
echo '</div>';

}

include 'template/footer.php';
