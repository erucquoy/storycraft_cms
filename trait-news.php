<?php
$titre_page = "Admin news";
include("head.php");
include("haut.php");
include("slider.php");
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
$date_date = date("d/m/Y ");
$date_heure = date("H:i:s");
$date = $date_date.' '.$date_heure;
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);
$req = $bdd->prepare('INSERT INTO news(id_news, auteur, titre, date, news, lien_image) VALUES(\'\', :auteur, :titre, :date, :news, :lien_image)');
$req->execute(array(
	'titre' => $_POST['titre'],
	'news' => $_POST['contenu'],
	'auteur' => $_POST['auteur'],
	'date' => $date,
	'lien_image' => $_POST['lien_image']
	));
	echo 'La news à bien été ajoutée <a href="admin_news.php">Revenir à l\'administration des news</a><br />';
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
include("menus.php");
include("foot.php");