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
$titre_page = "Accueil";
include("head.php");
include("haut.php");
include("slider.php");


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT password FROM authme WHERE playername=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$actif = 1;
        $mdpbdd = $donnees['password'];
    }
$expass = htmlspecialchars($_POST['expass']);
$pass = htmlspecialchars($_POST['pass']);
$confpass = htmlspecialchars($_POST['confpass']);

if($expass == $mdpbdd)
{
	if($pass == $confpass)
	{
	$req = $bdd->prepare('UPDATE authme SET password = :pass WHERE playername = :user');
	$req->execute(array(
	'pass' => $pass,
	'user' => $_SESSION['pseudo']
	));
	$titre = "Vous avez bien changer votre mot de passe !";
	$contenu = "<p>
									Votre mot de passe à été modifié !<br /><br />
									<a href=\"index.php\">Revenir à la page d'accueil</a>
									</p>	";
									
	}
	else
	{
	$titre = "Erreur !";
	$contenu = "<p>
									La confirmation du mot de passe est incorrecte !<br /><br />
									<a href=\"youraccount.php?a=cp\">Revenir à la page précédente</a>
									</p>	";
	}
}
else
{
$titre = "Erreur !";
$contenu = "<p>
									Votre ancien mot de passe est incorrect !<br /><br />
									<a href=\"youraccount.php?a=cp\">Revenir à la page précédente</a>
									</p>	";
}
?>
<article>
<div class="haut_article">
<h1><?php echo $titre; ?></h1>
</div>

<div class="milieu_article">
		<?php echo $contenu; ?>							
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