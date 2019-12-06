<?php
include 'template/header.php';

if (isset($_SESSION['user']))
{
	if ($_SESSION['idUser'] == 1  ) {
		echo'
						<a type="button" class="btn btn-primary" href="' . base_url('deal/create') . '">Creer un deal</a>
						';
	}
}

echo '<div class="row">';
foreach ($deal as $de)
{
	include 'template/deals.php';
}
echo '</div>';
include 'template/footer.php';
