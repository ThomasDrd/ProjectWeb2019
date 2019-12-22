<?php

echo '
<tr>
	<th scope="row">'. $de->deal_id .'</th>
	<td>'. $de->nom .'</td>
	<td>'. $de->description .'</td>
	<td>'. $de->conditions .'</td>
	<td><a type="button" class="btn btn-success" href="'.base_url('pages/updateDeal/').''.$de->deal_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="'.base_url('pages/deleteDeal/').''.$de->deal_id.'">Supprimer</a></td>
	';

	$fuseau  = new DatetimeZone('Europe/Paris');
	$dateNow = new Datetime('now', $fuseau);
	$dateExp = new Datetime($de->date_exp, $fuseau); 
	$dateDeb = new Datetime($de->date_deb, $fuseau);
	$dateOld = $dateExp->diff($dateNow);
	$dateOldDay = $dateOld->format('%d');

	if( $dateNow > $dateDeb AND $dateNow < $dateExp){
		if($de->posted){
				echo '<td><a type="button" class="btn btn-success" href="'.base_url('deal/dealDisable/').''.$de->deal_id.'">En ligne</a> </td></tr>';
		}else{
		echo '<td><a type="button" class="btn btn-primary" href="'.base_url('deal/dealEnable/').''.$de->deal_id.'">À Poster</a> </td></tr>';
		}
	}elseif( $dateNow < $dateDeb AND $dateNow < $dateExp ){
		if($de->posted){
				echo '<td><a type="button" class="btn btn-success" href="'.base_url('deal/dealDisable/').''.$de->deal_id.'">À venir</a> </td></tr>';
		}else{
		echo '<td><a type="button" class="btn btn-info" href="'.base_url('deal/dealEnable/').''.$de->deal_id.'">À venir</a> </td></tr>';
		}
	}elseif( $dateNow > $dateDeb AND $dateNow > $dateExp AND $dateOldDay < 15 ){
		if($de->posted){
				echo '<td><a type="button" class="btn btn-success" href="'.base_url('deal/dealDisable/').''.$de->deal_id.'">Expiré</a> </td></tr>';
		}else{
		echo '<td><a type="button" class="btn btn-warning" href="'.base_url('deal/dealEnable/').''.$de->deal_id.'">Expiré</a> </td></tr>';
		}
	}elseif( $dateNow > $dateDeb AND $dateNow > $dateExp AND $dateOldDay > 15 ){
		if($de->posted){
				echo '<td><a type="button" class="btn btn-success" href="'.base_url('deal/dealDisable/').''.$de->deal_id.'">Trop vieux</a> </td></tr>';
		}else{
		echo '<td><a type="button" class="btn btn-secondary" href="'.base_url('deal/dealEnable/').''.$de->deal_id.'">Trop vieux</a> </td></tr>';
		}
	}else{
		if($de->posted){
				echo '<td><a type="button" class="btn btn-success" href="'.base_url('deal/dealDisable/').''.$de->deal_id.'">Date Erreur</a> </td></tr>';
		}else{
		echo '<td><a type="button" class="btn btn-danger" href="'.base_url('deal/dealEnable/').''.$de->deal_id.'">Date Erreur</a> </td></tr>';
		}
	}
