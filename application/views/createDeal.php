
<?php include 'template/header.php'?>

<form action="dealCreate" method="post">
	<div class="form-group">
		<label for="nom">Nom du deal</label>
		<input type="text" id="nom" class="form-control" name="nom" required>
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<input type="text" class="form-control" id="description" name="description" required>
	</div>
	<div class="form-group">
		<label for="conditions">Conditions</label>
		<input type="text" class="form-control" id="conditions" name="conditions" required>
	</div>
	<div class="form-group">
		<label for="img">Image</label>
		<input type="text" class="form-control" id="img" name="image" required>
	</div>
	<div class="form-group">
		<label for="datedeb">Date début</label>
		<input type="date" class="form-control" id="datedeb" name="datedeb">
	</div>
	<div class="form-group">
		<label for="dateexp">Date expiration</label>
		<input type="date" class="form-control" id="dateexp" name="dateexp">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

include 'template/footer.php'; ?>
