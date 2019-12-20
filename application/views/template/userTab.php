<?php

	echo '
	<tr>
      <th scope="row">'. $us->user_id .'</th>
      <td>'. $us->nom .'</td>
      <td>'. $us->prenom .'</td>
      <td>'. $us->role .'</td>
      <td>';
	if ($us->role_id != 1) {
		echo '
		 <a type="button" class="btn btn-success" href="'.base_url('users/updateRole/').''.$us->user_id.'">Update Role</a> <a type="button" class="btn btn-danger" href="'.base_url('users/delete/').''.$us->user_id.'">Supprimer</a></td>
    	</tr>\';
		';
	}

