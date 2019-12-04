<?php
include 'template/header.php';

foreach ($deal as $de)
{
	echo ('
<div class="col-sm-6">
<div class="card mb-3" style="max-width: 540px;">
	<div class="row no-gutters">
		<div class="col-md-4">
			<img src="'.$de->img.'" class="card-img" alt="Image Operateur">
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<a class="card-title" href="index.php/pages/details/'.$de->deal_id.'">'.$de->nom.'</a>
				<p class="card-text">'.$de->description.'</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			</div>
		</div>
	</div>
</div>
</div>


		');
}
?>




<?php
include  'template/footer.php';
?>