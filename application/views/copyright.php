<?php
include 'template/header.php';
echo "<h1>Les Supers Forfaits Mobiles – <br>Conditions Générales d’Utilisation</h1>";
echo "<p>«Les Supers Forfaits Mobiles» est un site Internet/application web qui vous propose une méthode de retrouver un ensemble de deal de forfaits mobiles. <br> Pour bénéficier de ces services, il convient de prendre connaissance et d’adhérer aux «Conditions Générales d’Utilisation », ci-après définies. <br> L’expression « Conditions Générales d’Utilisation », signifie l’ensemble des stipulations prévues aux présentes.</p>";


echo "<h1> L’utilisateur s’engage :</h1>";
echo "<p>1) A utiliser un navigateur Firefox/chrome à jour.</p>";
echo "<p>2) S’engage à respecter ces conditions générales et affirme les avoir pleinement lues et acceptées au moment de son inscription.</p>";
echo "<p>3) A respecter la communauté de «Les Supers Forfaits Mobiles»</p>";

echo "<h1>Création du compte utilisateur :</h1>";
echo "<p>Pour créer un Compte « Les Supers Forfaits Mobiles », vous devez être majeur ou dûment autorisé pour ce faire.<br> Les parents ou les titulaires de l’autorité parentale sont invités à surveiller l’utilisation faite par leurs enfants de l’accès à nos services. <br> Ils doivent savoir que nos prestations sont susceptibles d’intéresser un grand public, notamment des enfants et il leur appartient de limiter l’accès de leurs enfants à certains de nos prestations et de surveiller plus généralement l’utilisation qu’ils en feront de nos services.<br> Si vous avez moins de dix huit ans, vous déclarez et reconnaissez avoir recueilli l’autorisation auprès de vos parents ou des titulaires de l’autorité pour vous utiliser nos services sur le site «Les Supers Forfaits Mobiles» et vous abonner. <br>Vos parents sont garants du respect de l’ensemble des dispositions des présentes Conditions Générales d’Utilisation. <br>Vous choisissez un identifiant et un mot de passe (sous réserve de disponibilité). <br>Retenez bien toutes ces données car elles seules permettent à «Les Supers Forfaits Mobiles» de retrouver votre mot de passe en cas d’oubli. <br>Ce compte «Les Supers Forfaits Mobiles» vous est strictement personnel et vous vous interdisez de le partager ou le céder à qui que ce soit. <br>Cela constitue une obligation essentielle de ce contrat. <br>Vous ne devez pas utiliser de pseudonyme, login ou d’adresse électronique qui pourrait porter atteinte aux droits des tiers à quelque titre que ce soit.<br> Il s’agit notamment de l’utilisation du nom patronymique, du pseudonyme, d’un signe appartenant à autrui, ou d’œuvres protégées par le code de la propriété intellectuelle.<br> «Les Supers Forfaits Mobiles» se réserve la faculté de refuser l’inscription et/ou d’exiger la correction du pseudonyme et/ou de l’adresse électronique et/ou du login concernés à tout moment, et notamment avant l’inscription définitive et donc avant l’ouverture effective du compte de l’abonné.<br> Si la désactivation de votre Compte est due à un manquement de votre part aux présentes Conditions, vous perdez également le bénéfice des abonnements souscrits auprès d’ Les Supers Forfaits Mobiles dans les conditions exposées ci-après, et cet identifiant pourra être choisi par un autre utilisateur. <br>Vous êtes responsable de la conservation du caractère confidentiel de votre mot de passe, et des actions qui sont effectuées sous votre identifiant et/ou avec votre mot de passe : si vous ouvrez une session sur un ordinateur public, veillez à fermer votre session lorsque vous quittez cet ordinateur.<br> Ne communiquez votre mot de passe à personne.<br> Vous êtes en conséquence seul responsable de l’utilisation de votre compte ; toute connexion ou transmission de données effectuée en utilisant nos services via votre compte sera réputée avoir été effectuée par vous-même et sous votre responsabilité exclusive. <br>Il est également précisé que vous êtes entièrement et exclusivement responsable de l’usage de nos services par vous-même et par tout tiers quel qu’il soit. <br> En cas d’utilisation frauduleuse de votre compte et/ou mot de passe, vous vous engagez à en informer immédiatement «Les Supers Forfaits Mobiles».</p>";

echo "<h1>Espace de discussion</h1>";
echo "<p>Pour permettre le partage de vos expériences « Les Supers Forfaits Mobiles » propose sur son site, un espace de discussion entre les personnes connectes , reposant sur la convivialité. Nous vous demandons donc, si vous souhaitez y participer, de respecter les règles d’usage en la matière. Nous vous rappelons que votre liberté d’expression est limitée par le respect des droits d’autrui et l’ordre public et que sont notamment interdits les comportements discriminatoires ou autres atteintes mettant en cause la dignité de la personne humaine, menaçant la vie privée d’autrui, tel diffamation, harcèlement, injures , messages haineux, vulgaire, obscène ainsi que toutes formes de délit de provocation à la violence, à la haine ou à la discrimination, de la même manière que les provocations xénophobes, racistes, antisémites, révisionnistes, les provocations commises soit à raison du sexe de la victime, , soit à raison de son orientation sexuelle et notamment celles portant atteintes aux mineurs d’une quelconque manière, pourront faire l’objet de sanctions pénales. De ce fait, la personne ayant tenu de tel propos sera immédiatement exclu de « Les Supers Forfaits Mobiles » Nous vous informons qu’un modérateur est susceptible de supprimer, préalablement à sa diffusion, toute contribution de votre part qui ne serait pas en relation avec l’objet de ce Site, ou qui serait contraire à la loi. </p>";


echo "<h1>Données personnelles</h1>";
echo "<p>En conformité avec les dispositions de la loi du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, le traitement automatisé des données nominatives réalisées à partir de notre Site a fait l’objet d’une déclaration auprès de la Commission Nationale de ‘Informatique et des Libertés (CNIL) Conformément aux dispositions de l’article 34 de cette loi, vous disposez sur ces informations d’un droit d’accès, de rectification et de suppression. Si vous souhaitez exercer ce droit ou si vous ne souhaitez pas que nous communiquions ces informations à nos partenaires, merci de nous contacter./p>";

echo "<h1>Laisser un commentaire</h1>";

?>
<form>
<div class="form-group">
	<label for="ID_email" class="text-left">E-mail </label>
	<input name="email" required type="email" class="form-control" id="ID_email" placeholder="Enter your email here"
		   value="<?= set_value('email'); ?>">
</div>

<div class="form-group">
	<label for="ID_email" class="text-left">Title</label>
	<input name="title" required type="text" class="form-control" id="ID_email" placeholder="Message title"
		   value="<?= set_value('title'); ?>">
</div>

<div class="form-group">
	<label class="mb-0">Message</label>
	<textarea name="message" required class="form-control" id="ID_message" rows="16"
			  placeholder="Entrez votre message ici"><?= set_value('message'); ?></textarea>
</div>

<div class="text-right">
	<button class="btn btn-primary">Envoyer</button>
</div>

</form>
<?php
include 'template/footer.php';
