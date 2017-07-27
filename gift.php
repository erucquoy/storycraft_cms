<?php
session_start();
if(!isset($_SESSION['pseudo']))
{ $_SESSION['pseudo']='Invite'; }
if($_SESSION['pseudo']=='Invite')
{
$connecte = '0';
header('Location: index.php');
exit;
}
else
{
$connecte = '1';
//header('Location: index.php');

}
?>
<?php
$titre_page = "Gagner un gift code pour minecraft !!";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Gagner un gift code pour minecraft !!</h1>
</div>
<div class="milieu_article">
<div align="center">
<p>
<font color="#66FF00">Gagner un gift code pour minecraft ! Il faut minimum 12 participations pour qu'il y ait un tirage au sort.</font><br />
		<font color="#3300FF">Le prochain tirage au sort sera le <b>20/06/2012</b> entre 18 et 20h.</font><br />
</p>
<div id="starpass_89789"></div>
<script type="text/javascript" src="http://script.starpass.fr/script.php?idd=89789&amp;verif_en_php=1&amp;datas=">
</script>
<noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
</noscript>

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