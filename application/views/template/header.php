<!-- >Template générant le header -->

<?php session_start();
 $this->load->helper('url');?>

<html lang="fr">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<title>Les Super's Forfait Mobile</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
		<a class="navbar-brand" href=" <?php echo base_url('pages/index')?>" >Les Super's Forfait Mobile</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<?php
			if (isset($_SESSION['user']))
			{
				if ($_SESSION['role'] == 1  ) {
					echo'
						<li class="nav-item">
						<a class="nav-link" href="'.base_url('pages/admin').'">Panel Admin</a>
					   </li>
						';
				}
				if ($_SESSION['role'] == 3) {
					echo'
						<li class="nav-item">
						<a class="nav-link" href="'.base_url('pages/modo').'">Panel Modo</a>
					   </li>
						';
				}
				echo ('<li class="nav-item">
							<a class="nav-link" href="'.base_url('pages/myDeals').'">Mes deals</a>
						   </li>');
				echo ('<li class="nav-item">
							<a class="nav-link" href="'.base_url('pages/compte').'">Bienvenue '.$_SESSION['user'].'</a>
						   </li>');
				echo ('<li class="nav-item">
							<a class="nav-link" href="'.base_url('users/logout').'">Se déconnecter</a>
						   </li>');
			}

			if(!isset($_SESSION['user'])){
						echo'<li class="nav-item">
								<a class="nav-link" href="'.base_url('pages/login').'">Log In</a>
							   </li>';
						echo'<li class="nav-item">
								<a class="nav-link" href="'.base_url('pages/createUser').'">Create account</a>
							   </li>';
			} 
			 ?>
		</ul>
	</div>
</nav>
<div class="container">


