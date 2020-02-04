<?php include 'template/header.php'?>

<h1>Voulez vous vraiment supprimer le deal : <?php echo $deal[0]->nom?>
	<a type="button" class="btn btn-success" href='<?php echo base_url('deal/dealDelete/'.$deal[0]->deal_id) ;?>'>Oui</a> <a type="button" class="btn btn-danger" href="<?php echo base_url('pages/admin');?>"> Non </a>
<?php include 'template/footer.php'?>
