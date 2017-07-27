<?php
session_start();
if(!isset($_SESSION['pseudo']))
{ $_SESSION['pseudo']='Invite'; }
if($_SESSION['pseudo']=='Invite')
{
$connecte = '0';
header('Location: index.php');
}
else
{
$connecte = '1';
//header('Location: index.php');
}
?>
<?php
$titre_page = "Shop de storypoints !";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Achetez des storypoints !</h1>
</div>

<div class="milieu_article">
		<p>
									<b>30 storypoints par code !</b><br />Vous pouvez aussi faire un don paypal -> 30 points / 1€ !
									
									
									</p>
<div id="starpass_83841"></div>
<script type="text/javascript" src="http://script.starpass.fr/script.php?idd=83841&amp;verif_en_php=1&amp;datas=">
</script>
<noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
</noscript>
<font color="darkred">Vous devez avoir 18 ans ou avoir l'autorisation de votre tuteur légal pour pouvoir acheter des storypoints !</font>
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