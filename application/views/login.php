<?php
include 'template/header.php'; ?>

			<h2>Se connecter</h2>

			<form action="loguser" method="post">
				<fieldset>
					<legend>Se connecter</legend>
					<p><label for="name">Nom</label>	<input id="name" type="text" name="name" value="" /></p>
					<p><label for="pwd">Mot de passe</label>	<input id="pwd" type="password" name="pwd" value="" /></p>
					<p><input type="submit" name="search"/></p>
				</fieldset> 
			</form>


	        
<?php
include  'template/footer.php';
?>
