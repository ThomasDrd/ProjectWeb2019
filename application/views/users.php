<?php
include 'template/header.php'; ?>

			<h2>BOMBOCLAT</h2>

			<form action="edituser" method="post">
				<fieldset>
					<legend>Sco pa tu mana</legend>
					<p><label for="name">Nom</label>	<input id="name" type="text" name="name" value="" /></p>
					<p><label for="pwd">Mot de passe</label>	<input id="pwd" type="text" name="pwd" value="" /></p>
					<p><input type="submit" name="search"/></p>
				</fieldset> 
			</form>


	        
<?php
include  'template/footer.php';
?>