<?php
	echo '
	<tr>
      <th scope="row">'. $us->user_id .'</th>
      <td>'. $us->nom .'</td>
      <td>'. $us->prenom .'</td>
      <td>'. $us->role .'</td>
      <td>';
	if ($us->role_id != 1) {
		echo '<select name="selectRole">';
				foreach ($roles as $role => $value) {
					$DefaultValue = $value->role == $us->role ? TRUE : FALSE;
					echo'<option value="' . $value->role . '"' . set_select('selectRole', $value->role, $DefaultValue) . '>' . $value->role . '</option>';
				}
		echo '</select>';
	}

