<?php

echo '
<tr>
	<th scope="row">'. $de->deal_id .'</th>
	<td>'. $de->nom .'</td>
	<td>'. $de->description .'</td>
	<td>'. $de->conditions .'</td>
	<td><a type="button" class="btn btn-success" href="'.base_url('deal/update/').''.$de->deal_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="'.base_url('deal/delete/').''.$de->deal_id.'">Supprimer</a></td>
	';
	if ($de->posted)
	{
	echo '
	<td><a type="button" class="btn btn-success" href="'.base_url('deal/disable/').''.$de->deal_id.'">En ligne</a> </td>
</tr>';
}
else{
echo '
<td><a type="button" class="btn btn-danger" href="'.base_url('deal/enable/').''.$de->deal_id.'">Poster</a> </td>
</tr>';
}
