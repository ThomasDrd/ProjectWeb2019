<?php
	echo '
	<tr>
      <th scope="row">'. $us->user_id .'</th>
      <td>'. $us->mail .'</td>
      <td>'. $us->pseudo .'</td>
      <td>';
	if ($us->role_id != 1) {

		echo '
			<form id="selectRole" method="post" action="'.base_url('Users/updateRole/'). $us->user_id .'">
				<select id="selectRole" name="selectRole">';
					foreach ($roles as $role => $value) {
					$DefaultValue = $value->role == $us->role ? TRUE : FALSE;
					echo'<option value="' . $value->role_id . '"' . set_select('selectRole', $value->role_id, $DefaultValue) . '>' . $value->role . '</option>';
				}
		echo '</select>
		<input type="submit" form="selectRole" class="btn btn-success" value="Modifier"> 
		</form></td>';
	}else{
		echo 'Administrateur</td>';
	}

	echo '<td><a type="button" class="btn btn-danger" href="' . base_url('Pages/deleteUser/') . $us->user_id .'">Supprimer</a></td>';
