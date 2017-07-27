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
//exit;
}
?>
<?php
$titre_page = "Le support ";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Inscription sur le site storycraft</h1>
</div>

<div class="milieu_article">
<div align="center">
<p>Bonjour et bienvenue sur la page de support. Vous avez le choix entre différent moyen de nous conacter et pour les différentes raisons :<br /><br />
<font color="orange">Guiedo -> skype "sawdiw" : S'occupe des problème au niveau du site, des plugins et autre..</font><br /><br />
Thisma -> skype "thisma_dehhez" : s'occupe globalement des problèmes du serveur.<br /><br />
Rugbiker -> skype "rugbiker" : s'occupe des problèmes InGame principalement.<br /><br /></p>
<font color="darkred">Si vous le souhaitez vous pouvez contacter guiedo par email (privé) -> leclanextazia@gmail.com ou l'email officiel -> support@guiedo.com</font><br />
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