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
if($_SESSION['pseudo'] == "guiedo")
{
$admin = 1;
}
else
{
header('Location: index.php');
}
}

$titre_page = "Administrer les news";
?>
<?php
include("head.php");
include("haut.php");
include("slider.php");
?>
<?php
if($_SESSION['pseudo'] == "guiedo" || $_SESSION['pseudo'] == "rugbiker" || $_SESSION['pseudo'] == "thisma_dehhez")
{
?>
<article>
<div class="haut_article">
<h1>Administrer les news</h1>
</div>

<div class="milieu_article">
<p><a href="admin_panel.php">Retour au panel admin</a> ||| <a href="admin_news.php">Retour au panel news</a></p>
<?php if(isset($_GET['a']))
{
	$a = stripslashes($_GET['a']);
	if($a == "nouveau")
	{
	?>
	
<form action="trait-news.php" method="post">
<p align="center">
Le titre de la news : <br />
<input type="text" value="Titre !" name="titre" style="text-align:center;" /><br /><br />
Le contenu (en html) : <br />
<textarea name="contenu" rows="10" cols="40">
Le contenu en <b>HTML</b>
</textarea><br /><br /><br /><br />
L'auteur de la news : <br />
<input type="text" value="L'auteur" name="auteur" style="text-align:center;" /><br /><br />
Le lien vers l'image (100x100) : <br />
<input type="text" value="http://" name="lien_image" style="text-align:center;" /><br /><br />
<input type="submit" value="Envoyer" />
<br />
</p>	
</form>		
	<?php
	}
	elseif($a == "supprimer")
	{
	if(isset($_GET['n']))
	{
	$idnews = stripslashes($_GET['n']);
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

		$req = $bdd->prepare('DELETE FROM news WHERE id_news=:id_news');
$req->execute(array(
	'id_news' => $idnews
	));
	
	echo "<p>La news $idnews à bien été retirée ! <a href=\"admin_news.php\">Retour à l'admin des news</a></p>";
	}
	
	}
	elseif($a == "modifier")
	{
	if(isset($_GET['n']))
	{
	$idnews = stripslashes($_GET['n']);
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);
	$reponse = $bdd->query('SELECT * FROM news WHERE id_news='.$idnews.'');
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
	<form action="trait-mod-news.php" method="post">
<p align="center">
Le titre de la news : <br />
<input type="text" name="titre" style="text-align:center;" value="<?php echo $donnees['titre']; ?>" /><br /><br />
Le contenu (en html) : <br />
<textarea name="contenu" rows="10" cols="40">
<?php echo htmlspecialchars($donnees['news']); ?>
</textarea><br /><br />
L'auteur de la news : <br />
<input type="text" name="auteur" style="text-align:center;" value="<?php echo $donnees['auteur']; ?>" /><br /><br />
Le lien vers l'image (100x100) : <br />
<input type="text" name="lien_image" style="text-align:center;" value="<?php echo $donnees['lien_image']; ?>" /><br /><br />
<input type="hidden" name="n" value="<?php echo $_GET['n']; ?>" />
<input type="submit" value="Envoyer" />
<br />
</p>	
</form>	
	<?php
	}

	}
	}
	else
	{
	?><br /><br />
	<a href="?a=nouveau"><input type="button" value="Ecrire une nouvelle news !" /></a><br /><br />
	<?php
	// On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM news');
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <p>
		<?php echo $donnees['id_news']; ?> : <?php echo $donnees['titre']; ?> de <?php echo $donnees['auteur']; ?><br /><br />
       </p>
    <?php
    }
    
    $reponse->closeCursor(); // Termine le traitement de la requête
	?>
	<?php
	}
}
else
{?><br /><br />
	<a href="?a=nouveau"><input type="button" value="Ecrire une nouvelle news !" /></a><br /><br />
	<?php
	// On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM news');
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <p>
		<?php echo $donnees['id_news']; ?> : <font color="A52A2A"><b><?php echo $donnees['titre']; ?></b></font> de <u><?php echo $donnees['auteur']; ?></u>&nbsp;&nbsp;&nbsp;<a href="admin_news.php?a=modifier&n=<?php echo $donnees['id_news']; ?>">Modifier</a>&nbsp;&nbsp;&nbsp;<a href="admin_news.php?a=supprimer&n=<?php echo $donnees['id_news']; ?>">Supprimer</a><br /><br />
       </p>
    <?php
    }
    
    $reponse->closeCursor(); // Termine le traitement de la requête
	?>
	<?php
	}
?>
						
						
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
}
?>