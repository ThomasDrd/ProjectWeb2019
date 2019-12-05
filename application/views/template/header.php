<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="/assets/css/material-kit.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<title>Super Forfait Mobile</title>
</head>
<body>


<nav class="navbar navbar-expand-lg bg-rose"> <!--lol-->
    <div class="container">
        <div class="navbar-translate">
	<a class="navbar-brand" href="#">TITRE</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
	</button>
        </div>
	<div class="collapse navbar-collapse" id="navbarNav ">
		<ul class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="login">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Features</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Pricing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			</li>
			<?php if(isset($_SESSION['user'])){
			 	echo ('<li class="nav-link">
						Welcome '.$_SESSION['user'].'
					   </li>');
			} ?>
			<?php if(isset($_SESSION['user'])){
			 	echo ('<li class="nav-item">
						<a class="nav-link" href="logout" tabindex="-1" aria-disabled="true">Se déconnecter</a>
					   </li>');
			} ?>
		</ul>
        <form class="form-inline ml-auto">
            <div class="form-group has-white">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                <i class="material-icons">search</i>
            </button>
        </form>
	</div>
    </div>
</nav>
<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<!--A garder pour les clic-->
<script src="./assets/js/material-kit.js?v=2.2.0" type="text/javascript"></script>

