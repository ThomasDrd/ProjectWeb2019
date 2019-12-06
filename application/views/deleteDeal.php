<?php include 'template/header.php'?>

<h1>Voulez vous vraiment supprimer le deal : <?php echo $deal[0]->nom?>
<a type="button" class="btn btn-success" href='/ProjectWeb2019/deal/deleteDeal/<?php echo $deal[0]->deal_id;?>'>Oui</a> <a type="button" class="btn btn-danger" href="/ProjectWeb2019/pages/admin">Non</a>
<?php include 'template/footer.php'?>
