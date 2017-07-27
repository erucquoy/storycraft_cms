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
header('Location: index.php');
exit;
}
?>
<?php
$titre_page = "Inscription 1/2";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Inscription sur storycraft</h1>
</div>

<div class="milieu_article">
<div align="center">
		<font color="#66FF00">Bienvenue sur Storycraft !</font><br />
		<font color="#3300FF">Vous devez vous connecter en jeu et être identifié pour vous inscrire !</font>
<form action="traitregister.php" method="post">
<p>Pseudo Minecraft : <br /><input type="text" name="pseudomc" /><br /><br /></p>
<p>Mot de passe :<br /> <input type="password" name="mdp1" /><br /><br /></p>
<p>(Confirmation) Mot de passe :<br /> <input type="password" name="mdp2" /><br /><br /></p>
<p>Votre adresse email : <br /> <input type="email" name="email" /><br /><br /></p>
<p><input type="submit" value="M'inscrire" /><br /></p>

</form>	
<br />
Votre pseudo est déjà enregistré mais ce n'est pas vous ? <a href="support.php">Contactez le support !</a><br />	
</div>
</div>
								 
<div class="bas_article">

</div>

<div id="pagination">
								<ul>
									<li class="precedent-off">« Précédent</li>
									<li class="active">1</li>
									<li class="suivant"><a href="#">Suivant »</a></li> 
								</ul>
							</div>
							<div class="clear"></div>
						</div>

</article>
<?php
include("menus.php");
include("foot.php");
?>