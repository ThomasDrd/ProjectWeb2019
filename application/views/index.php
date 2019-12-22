<?php
include 'template/header.php';

echo '<div class="row">';
foreach ($deal as $de)
{
	include 'template/deals.php';
}
echo '</div>';
include 'template/footer.php';
