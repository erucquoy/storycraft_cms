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
$titre_page = "Accueil";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Les diff�rentes boutique !</h1>
</div>

<div class="milieu_article">
		<p>
									<br />
									Voici les boutiques disponibles actuellement !<br /><br />
									<ul>
									<li><a href="?b=m">Boutique $</a></li>
									<li><a href="?b=j">Boutique jobs</a></li>
									<li><a href="?b=j">Boutique grades</a></li>
									</ul>
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