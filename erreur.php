<?php
session_start();
if(!isset($_SESSION['pseudo']))
{ $_SESSION['pseudo']='Invite'; }
if($_SESSION['pseudo']=='Invite')
{
$connecte = '0';
//header('Location: index.php');
}
else
{
$connecte = '1';
//header('Location: index.php');
}
?>
<?php
$titre_page = "Erreur";
include("head.php");
include("haut.php");
include("slider.php");
$erreur = htmlspecialchars($_GET['e']);
?>
<article>
<div class="haut_article">
<h1><?php echo "erreur $erreur"; ?></h1>
</div>

<div class="milieu_article">
		<p>
<?php
$erreur = htmlspecialchars($_GET['e']);

if ($erreur == 1) {
echo '<b><font color="#D90000">Votre pseudo ou votre de mot de passe est erron�.</font></b>';
}
elseif ($erreur == 2) {
echo '<b><font color="#D90000">Votre pseudo n\'a pas �t� activ�. Cliquez sur le lien contenu dans le mail d\'activation qui vous a �t� envoy�.</font></b>';
}
elseif ($erreur == 404) {
echo '<img src="images/mascotte.png" alt="" /><br /><br /><b><font color="#D90000">Erreur la page demand�e n\'a pas �t� trouv�e ou a �t� supprim�e.</font></b>';
}
elseif ($erreur == 500) {
echo '<br /><b><font color="#D90000">Erreur interne au serveur. Nous essayons de corriger le plus rapidement possible le probl�me.</font></b>';
}
elseif ($erreur == 2001) {
echo '<br /><b><font color="#D90000">Votre code est erron� !.</font></b>';
}

else {
echo '<b><font color="#D90000">Erreur inconnue</font></b>';
}

?><br /><a href="index.php">Retour � l'accueil</a>
</p>
	</div>
								
<div class="bas_article">

</div>

<div id="pagination">
								<ul>
									<li class="precedent-off">� Pr�c�dent</li>
									<li class="active">1</li>
									<li class="suivant"><a href="#">Suivant �</a></li> 
								</ul>
							</div>
							<div class="clear"></div>
						</div>

</article>
<?php
include("menus.php");
include("foot.php");
?>
