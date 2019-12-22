<?php

echo '
<tr>
	<th scope="row">'. $de->deal_id .'</th>
	<td>'. $de->nom .'</td>
	<td>'. $de->description .'</td>
	<td>'. $de->conditions .'</td>
	<td><a type="button" class="btn btn-success" href="'.base_url('pages/updateDeal/').''.$de->deal_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="'.base_url('pages/deleteDeal/').''.$de->deal_id.'">Supprimer</a></td>
	';
	if ($de->posted)
	{
	echo '
	<td><a type="button" class="btn btn-success" href="'.base_url('deal/dealDisable/').''.$de->deal_id.'">En ligne</a> </td>
</tr>';
}
else{
echo '
<td><a type="button" class="btn btn-danger" href="'.base_url('deal/dealEnable/').''.$de->deal_id.'">Poster</a> </td>
</tr>';
}
