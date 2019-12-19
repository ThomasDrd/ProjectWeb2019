<?php

echo '
	<tr>
      <th scope="row">'. $us->user_id .'</th>
      <td>'. $us->nom .'</td>
      <td>'. $us->prenom .'</td>
      <td><a type="button" class="btn btn-success" href="'.base_url('users/update/').''.$us->user_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="'.base_url('users/delete/').''.$us->user_id.'">Supprimer</a></td>
    </tr>';
