<?php

echo '
<tr>
	<th scope="row">'. $de->deal_id .'</th>
	<td>'. $de->nom .'</td>
	<td>'. $de->description .'</td>
	<td>'. $de->conditions .'</td>
	<td><a type="button" class="btn btn-warning" href="'.base_url('pages/updateDeal/').''.$de->deal_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="'.base_url('pages/deleteDeal/').''.$de->deal_id.'">Supprimer</a></td>
	';
	if ($_SESSION['role'] == 3  )
	{
		if($de->posted){
			echo '<td><a type="button" class="btn btn-success" href="'.base_url('deal/dealDisable/').''.$de->deal_id.'">En ligne</a> </td>';
		}else{
			echo '<td><a type="button" class="btn btn-primary" href="'.base_url('deal/dealEnable/').''.$de->deal_id.'">À Poster</a> </td>';
		}
	}

	$fuseau  = new DatetimeZone('Europe/Paris');
	$dateNow = new Datetime('now', $fuseau);
	$dateExp = new Datetime($de->date_exp, $fuseau); 
	$dateDeb = new Datetime($de->date_deb, $fuseau);
	$dateOld = $dateExp->diff($dateNow);
	$dateOldDay = $dateOld->format('%d');

	if( $dateNow > $dateDeb AND $dateNow < $dateExp){
		if($de->posted){
				echo '<td>En ligne</td></tr>';
		}else{
		echo '<td>À Poster</td></tr>';
		}
	}elseif( $dateNow < $dateDeb AND $dateNow < $dateExp ){
		if($de->posted){
				echo '<td>À venir</td></tr>';
		}else{
		echo '<td>À venir</td></tr>';
		}
	}elseif( $dateNow > $dateDeb AND $dateNow > $dateExp AND $dateOldDay < 15 ){
		if($de->posted){
				echo '<td>Expiré </td></tr>';
		}else{
		echo '<td>Expiré</td></tr>';
		}
	}elseif( $dateNow > $dateDeb AND $dateNow > $dateExp AND $dateOldDay > 15 ){
		if($de->posted){
				echo '<td>Trop vieux</td></tr>';
		}else{
		echo '<td>Trop vieux</td></tr>';
		}
	}else{
		if($de->posted){
				echo '<td>Date Erreur</td></tr>';
		}else{
		echo '<td>Date Erreur</td></tr>';
		}
	}
