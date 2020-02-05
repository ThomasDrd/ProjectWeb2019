<?php
include 'template/header.php';

foreach ($deal as $de){
	echo '
<div class="card mb-3 details">
	<div class="row no-gutters">
		
			<div class="card-body deal">
				<a class="card-title text">'.$de->nom.'</a>
				<p class="card-text">Description : '.$de->description.'</p>
				<p class="card-text">Conditions : '. $de->conditions .'</p>
				<p class="card-text">Date de démarrage : '. $de->date_deb .'</p>
				<p class="card-text">Date de fin : '. $de->date_exp .'</p>
				<div class="card-footer text-muted">
				<p class="card-text"><small>Ajouté il y a ';
						$fuseau  = new DatetimeZone('Europe/Paris');
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
							}elseif($date->h == 1){
								$date1 = $date->format('%d jours, %h heure et %i minutes');
							}else{
								$date1 = $date->format('%d jours, %h heures et %i minutes');
							}
						}
						echo $date1.'</small>
				</p>
				</div>
				
		</div>
	</div>
</div>';

if ($de->posted)
{
	if(!empty($comments)){
		echo '
		<div class="card comment mb-3">
		<div class="card-header">
    	Commentaires
  		</div>
		<div class="card-body">';

		foreach ($comments as $comment){
			if (isset($_SESSION['role']))
			{
				if( $_SESSION['role'] == 1 || $comment->user_id ==  $_SESSION['idUser']){
					echo '<a type="button" href="'.base_url('deal/deleteComment/').$comment->comment_id.'?deal='.$de->deal_id.'">X</a>';
				}
			}
			echo '<strong class="card-title comment-content">'.$comment->pseudo.'</strong><small class="text-muted"> posté le  '. $comment->date .'</small>
				  <p class="card-text comment-content">'.$comment->comment.'</p>';
		}

		echo '</div>
</div>';
	}
	if(isset($_SESSION['role'])){


		echo'<div class="card mb-3 details">
			<div class="card-body">';

		$hidden = array('dealId' => $de->deal_id);
		echo form_open('Deal/addComment/'.$de->deal_id, '', $hidden);
		echo form_label('Votre commentaire :');
		echo '<div class="form-group">';

		$input = array(
			'name' => 'commentAdd',
			'id' => 'commentAdd',
			'class' => 'form-control',
			'type' => 'textarea');
		echo form_textarea($input);

		echo form_submit('submit', 'Envoyer', array('class' => 'btn btn-dark btn-connect'));

		echo 	'</div>
		</div>
	</div>';
		if(isset($message_display))
		{
			echo '<h4 class="alert alert-danger text-center" role="alert">' . $message_display . '</h4>';
		}
	}
}

 
include  'template/footer.php';


}

