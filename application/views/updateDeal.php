
<?php include 'template/header.php'?>

<form action="/ProjectWeb2019/deal/dealUpdate/<?php echo $deal[0]->deal_id;?>" method="post">
	<div class="form-group">
		<label for="nom">Nom du deal</label>
		<input type="text" id="nom" class="form-control" name="nom" value="<?php echo $deal[0]->nom;?>" required>
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<input type="text" class="form-control" id="description" name="description" value="<?php echo $deal[0]->description;?>" required>
	</div>
	<div class="form-group">
		<label for="conditions">Conditions</label>
		<input type="text" class="form-control" id="conditions" name="conditions" value="<?php echo $deal[0]->conditions;?>" required>
	</div>
	<div class="form-group">
		<label for="img">Image</label>
		<input type="text" class="form-control" id="img" name="image" value="<?php echo $deal[0]->img;?>" required>
	</div>
	<div class="form-group">
		<label for="datedeb">Date début</label>
		<input type="date" class="form-control" id="datedeb" name="datedeb" value="<?php echo $deal[0]->date_deb;?>">
	</div>
	<div class="form-group">
		<label for="dateexp">Date expiration</label>
		<input type="date" class="form-control" id="dateexp" name="dateexp" value="<?php echo $deal[0]->date_exp;?>">
	</div>
	<div class="form-group">
		<select type="user" class="form-control" id="user" name="user" hidden>
			<option ><?php echo $_SESSION['idUser'];?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

include 'template/footer.php'; ?>
