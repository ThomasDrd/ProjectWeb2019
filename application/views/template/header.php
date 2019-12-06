<?php session_start(); 
 $this->load->helper('url');?>

<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<title>Super Forfait Mobile</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
		<a class="navbar-brand" href=" <?php echo base_url('pages/index')?>" >Super Forfait Mobile</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--<form class="form-inline ml-auto">
            <div class="form-group has-white">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                <i class="material-icons">search</i>
            </button>
        </form>-->
		<ul class="navbar-nav ml-auto">
			<?php
			if (isset($_SESSION['user']))
			{
				if ($_SESSION['idUser'] == 1  ) {
					echo'
						<li class="nav-item">
						<a class="nav-link" href="'.base_url('pages/admin').'">Panel Admin</a>
					   </li>
						';
				}
			}
			if(!isset($_SESSION['user'])){
				print_r('<li class="nav-item">
						<a class="nav-link" href="'.base_url('users/login').'">Log In</a>
					   </li>');
			} ?>
			<?php if(isset($_SESSION['user'])){
				echo ('<li class="nav-item">
						<a class="nav-link" href="'.base_url('users/compte').'">Welcome '.$_SESSION['user'].'</a>
					   </li>');
			} ?>
			<?php if(isset($_SESSION['user'])){
				echo ('<li class="nav-item">
						<a class="nav-link" href="'.base_url('users/logout').'">Se déconnecter</a>
					   </li>');
			} ?>
		</ul>
	</div>
</nav>
<div class="container" style="margin-top: 100px">
<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<!--A garder pour les clic-->
<script src="./assets/js/material-kit.js?v=2.2.0" type="text/javascript"></script>

