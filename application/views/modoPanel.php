<?php
include 'template/header.php';

if (isset($_SESSION['user']))
{
	if ($_SESSION['role'] == 1 OR $_SESSION['role'] == 3) {

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
	include 'template/dealTab.php';
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
