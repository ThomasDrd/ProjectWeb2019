<?php
include 'template/header.php';

echo '
<table class="table table-dark">
<thead>
    <tr>
      <th style="width: 10%" scope="col">#</th>
      <th style="width: 10%" scope="col">Nom</th>
      <th style="width: 30%" scope="col">Description</th>
      <th style="width: 20%" scope="col">Conditions</th>
      <th style="width: 20%" scope="col">Action</th>
      <th style="width: 10%" scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
';
foreach ($deal as $de)
{
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
}

echo '
  </tbody>
</table>';


echo '
<table class="table table-dark">
<thead>
    <tr>
      <th style="width: 10%" scope="col-1">#</th>
      <th style="width: 10%" scope="col">Nom</th>
      <th style="width: 50%" scope="col">Prenom</th>
      <th style="width: 30%" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
';
foreach ($user as $us)
{
	echo '
	<tr>
      <th scope="row">'. $us->user_id .'</th>
      <td>'. $us->nom .'</td>
      <td>'. $us->prenom .'</td>
      <td><a type="button" class="btn btn-success" href="'.base_url('users/update/').''.$de->user_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="/ProjectWeb2019/user/delete/'.$de->user_id.'">Supprimer</a></td>
    </tr>';
}

echo '
  </tbody>
</table>';

include 'template/footer.php';
