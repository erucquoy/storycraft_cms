<?php
session_start();
if(!isset($_SESSION['pseudo']))
{ $_SESSION['pseudo']='Invite'; }
if($_SESSION['pseudo']=='Invite')
{
$connecte = '0';

}
else
{
$connecte = '1';


}
?>
<?php
$titre_page = "Le guide du débutant";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Gagner un gift code pour minecraft !!</h1>
</div>
<div class="milieu_article">
<p>Bienvenue dans le guide du débutant pour storycraft. Ici nous allons vous expliquez toutes les commandes disponibles pour les Citoyens et les Chevaliers.<br /></p>
<br />
<h2 color="#00be00">Les Citoyens :</h2>
<p><font color="#3ffe3f">Les jobs (Vous n'avez droit qu'à un job simultanément) :</br />
 - Faites /jobs help --pour plus d'infos.<br />
 - /jobs join NomDuJob --pour rejoindre le job NomDuJob.<br />
 - /jobs leave NomDuJob --pour quitter le job NomDuJob.<br />
 - /jobs info NomDuJob --pour avoir plus d'info le job NomDuJob.<br />
 - /jobs stats --pour obtenir vos caractéristique actuelle.<br />
 </font></p>
 
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