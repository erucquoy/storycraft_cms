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
<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);
$reponse = $bdd->query('SELECT * FROM news ORDER BY id_news DESC');
    
   
    while ($donnees = $reponse->fetch())
    {
    ?>
<article>
<div class="haut_article">
<h1><?php echo $donnees['titre']; ?></h1>
</div>

<div class="milieu_article">
<img src="<?php echo $donnees['lien_image']; ?>" />
	<p>	
									<?php echo $donnees['news']; ?>
		</p>													
</div>
								
<div class="bas_article">
<h1>Posté par <?php echo $donnees['auteur']; ?> le <?php echo $donnees['date']; ?></h1>
</div>
</article>
<?php
    }
    
    $reponse->closeCursor(); 
	?>
<div id="pagination">
								<ul>
									<li class="precedent-off">« Précédent</li>
									<li class="active">1</li>
									<li class="suivant"><a href="#">Suivant »</a></li> 
								</ul>
							</div>
							<div class="clear"></div>
						</div>


<?php
include("menus.php");
include("foot.php");
 ?>
