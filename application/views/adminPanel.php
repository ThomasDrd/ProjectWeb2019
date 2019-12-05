<?php
include 'template/header.php';

echo '
<table class="table table-dark">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Conditions</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
';
foreach ($deal as $de)
{
	echo '
	<tr>
      <th scope="row">1</th>
      <td>'. $de->nom .'</td>
      <td>'. $de->description .'</td>
      <td>'. $de->conditions .'</td>
      <td><a type="button" class="btn btn-success" href="/ProjectWeb2019/deal/update/'.$de->deal_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="/ProjectWeb2019/deal/delete/'.$de->deal_id.'">Supprimer</a></td>
    </tr>';
}

echo '
  </tbody>
</table>';


echo '
<table class="table table-dark">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
';
foreach ($user as $us)
{
	echo '
	<tr>
      <th scope="row">1</th>
      <td>'. $us->nom .'</td>
      <td>'. $us->prenom .'</td>
      <td><a type="button" class="btn btn-success" href="/ProjectWeb2019/user/update/'.$de->user_id.'">Modifier</a> <a type="button" class="btn btn-danger" href="/ProjectWeb2019/user/delete/'.$de->user_id.'">Supprimer</a></td>
    </tr>';
}

echo '
  </tbody>
</table>';

include 'template/footer.php';
