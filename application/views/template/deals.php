
<div class="col-sm-6">
<div class="card mb-3" style="max-width: 540px;">
	<div class="row no-gutters">
		<div class="col-md-4">
			<img src=" <?php echo $de->img; ?> " class="card-img" alt="Image Operateur">
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<a class="card-title" href="details/<?php echo $de->deal_id; ?>"><?php echo $de->nom; ?></a>
				<p class="card-text"><?php echo $de->description; ?></p>
				<p class="card-text"><small class="text-muted">Ajouté il y à <?php $fuseau  = new DatetimeZone('Europe/Paris');
																					$dateNow = new Datetime('now', $fuseau);
																					$dateOld = new Datetime($de->date_ajout, $fuseau); 
																					$date = $dateOld->diff($dateNow);
																					if($date->days == 0){
																						$date1 = $date->format('%hh%i');
																					}elseif($date->days == 1){
																						if($date->h == 0){
																							$date1 = $date->format('%d jour et %i minutes');
																						}elseif($date->h == 1){
																							$date1 = $date->format('%d jour, %h heure et %i minutes');
																						}else{
																							$date1 = $date->format('%d jour, %h heures et %i minutes');
																						}
																					}else{
																						if($date->h == 0){
																							$date1 = $date->format('%d jours et %i minutes');
																											$date1 = $date->format('%d jours, %h heure et %i minutes');
																						}else{
																							$date1 = $date->format('%d jours, %h heures et %i minutes');
																						}
																					}
																					print_r($date1); ?></small></p>
				<?php
				if (isset($_SESSION['idUser']))
				{
					if ($de->user_id == $_SESSION['idUser']){
						echo '<a class="card-text" href="'.  base_url('deal/update/') .'">Modifier / supprimer le deal</a>';
					}
				}
				?>
			</div>
		</div>

    </div>
</div>
</div>
