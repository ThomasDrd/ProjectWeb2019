<?php
include 'template/header.php'; ?>

			<form action="edituser" method="post">
				<fieldset>
					<legend>Votre compte</legend>
					<p><label for="name">Pseudo</label><input id="name" type="text" name="name" value="" placeholder="  <?php print_r($user['0']->pseudo); ?> "/></p>
					<p><label for="pwd">Mail</label><input id="mail" type="text" name="mail" value="" placeholder="  <?php print_r($user['0']->mail); ?> "/></p>
					<p><label for="pwd">Mot de passe</label><input id="pwd" type="text" name="pwd" value=""/></p>
					<p><label for="pwd">Mot de passe confirmation</label><input id="pwdconf" type="text" name="pwdconf" value=""/></p>
					<p><input type="submit" name="search"/></p>
				</fieldset> 
			</form>


	        
<?php
include  'template/footer.php';
?>
