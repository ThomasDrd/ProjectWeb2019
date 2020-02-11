<!-- >Template générant l'affichage d'un deal -->

<div class="card m-2">
			<div class="card-title">
				<a href="<?php echo base_url('pages/details/'). $de->deal_id ?>" ><?php echo $de->nom; ?></a>
			</div>

			<div class="card-body">
				<p class="card-text text"><?php echo $de->description; ?></p>
			</div>
			<div class="card-footer text-muted">
				<p class="card-text">Ajouté il y a <?php $fuseau  = new DatetimeZone('Europe/Paris');
				$dateNow = new Datetime('now', $fuseau);
				$dateOld = new Datetime($de->date_ajout, $fuseau);
				$date = $dateOld->diff($dateNow);
				if($date->days == 0){
					if($date->h == 0){
						$date1 = $date->format('%i minutes');
					}elseif($date->h == 1){
						$date1 = $date->format('%h heure et %i minutes');
					}else{
						$date1 = $date->format('%h heures et %i minutes');
					}
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
					}elseif($date->h == 0){
						$date1 = $date->format('%d jours, %h heure et %i minutes');
					}else{
						$date1 = $date->format('%d jours, %h heures et %i minutes');
					}
				}
				print_r($date1);

				if (isset($_SESSION['idUser']))
				{
					if ($de->user_id == $_SESSION['idUser']){
						echo '<a class="card-text" href="'.  base_url('deal/dealUpdate/') . $de->deal_id .'"> <br>Modifier/Supprimer</a>';
					}
				}
				?></p>
			</div>
</div>

