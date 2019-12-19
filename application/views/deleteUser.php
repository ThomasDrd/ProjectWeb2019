<?php include 'template/header.php'?>

<h1>Voulez vous vraiment supprimer l'utilisateur : <?php echo $user[0]->pseudo?>
	<a type="button" class="btn btn-success" href='<?php echo base_url('users/deleteUser/'.$user[0]->user_id);?>'>Oui</a> <a type="button" class="btn btn-danger" href="<?php echo base_url('pages/admin');?>"> Non </a>
	<?php include 'template/footer.php'?>
