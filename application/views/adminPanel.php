<?php
include 'template/header.php';

if (isset($_SESSION['user']))
{
	if ($_SESSION['role'] == 1  ) {

echo '
<table class="table table-dark">
<thead>
    <tr>
      <th style="width: 10%" scope="col">#</th>
      <th style="width: 10%" scope="col">Nom</th>
      <th style="width: 20%" scope="col">Description</th>
      <th style="width: 15%" scope="col">Conditions</th>
      <th style="width: 20%" scope="col">Action</th>
      <th style="width: 10%" scope="col">Etat</th>
    </tr>
  </thead>
  <tbody>
';
foreach ($deal as $de)
{
	include 'template/dealTab.php';
}

echo '
  </tbody>
</table>';


echo '
<table class="table table-dark">
<thead>
    <tr>
      <th style="width: 10%" scope="col-1">#</th>
      <th style="width: 20%" scope="col">mail</th>
      <th style="width: 20%" scope="col">pseudo</th>
      <th style="width: 30%" scope="col">Role</th>
      <th style="width: 10%" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
';

foreach ($user as $us)
{
	include 'template/userTab.php';
}

echo '
  </tbody>
</table>';


  	}else{
  header('Location: '.base_url('pages/index'));
}}else{
  header('Location: '.base_url('pages/index'));
}

include 'template/footer.php';
