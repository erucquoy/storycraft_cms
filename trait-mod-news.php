
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

$titre_page = "Admin news";
include("head.php");
include("haut.php");
include("slider.php");
if($_SESSION['pseudo'] == "guiedo" || $_SESSION['pseudo'] == "rugbiker" || $_SESSION['pseudo'] == "thisma_dehhez")
{
?>
<article>
<div class="haut_article">
<h1>Admin news 2/2</h1>
</div>

<div class="milieu_article">
		<p>
<?php

if(isset($_POST['titre']) || isset($_POST['contenu']) || isset($_POST['auteur']) || isset($_POST['lien_image']))
{

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);
$req = $bdd->prepare('UPDATE news SET titre = :titre, news = :news, auteur = :auteur, lien_image = :lien_image WHERE id_news = :idnews');
$req->execute(array(
	'titre' => $_POST['titre'],
	'news' => $_POST['contenu'],
	'auteur' => $_POST['auteur'],
	'lien_image' => $_POST['lien_image'],
	'idnews' => $_POST['n']
	));
	echo 'La news à bien été modifiée <a href="admin_news.php">Revenir à l\'administration des news</a><br />';
}
else
{
echo 'Cette page n\'existe pas !';
}
?>
</p>							
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
}
include("menus.php");
include("foot.php");
?>