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
$titre_page = "Vos statistiques !";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Vos stats complète !</h1>
</div>

<div class="milieu_article">
<p>
<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$points = $donnees['points'];
		$balance = $donnees['balance'];
		$vote = $donnees['vote'];
    }
	
$reponse->CloseCursor();


$reponse = $bdd->query('SELECT * FROM jobs_jobs WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$job = $donnees['job'];
		$level = $donnees['level'];
		$xp = $donnees['experience'];
    }
	
$reponse->CloseCursor();

$reponse = $bdd->query('SELECT `playerid` FROM `lb-players` WHERE `playername`=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$playerid = $donnees['playerid'];
    }
	
$reponse->CloseCursor();

$bloc_casse = 0;
$bloc_place = 0;
$bloc_diams = 0;
$reponse = $bdd->query('SELECT * FROM `lb_world` WHERE `playerid`=\''.$playerid.'\'');
    
    while ($donnees = $reponse->fetch())
    {
		if($donnees['type'] == 0)
		{
		$bloc_casse++;
		}
		if($donnees['replaced'] == 0)
		{
		$bloc_place++;
		}
		if($donnees['replaced'] == 56)
		{
		$bloc_diams++;
		}
    }
	
$reponse->CloseCursor();




									?>

<span><b>Economie :</b></span><br />
<?php
echo "Vous avez <b><font color=\"00BFFF\">$points</font></b> Storypoints <br />
Vous avez <b><font color=\"00BFFF\">$balance</font></b> Dollars <br />
Vous avez voté <b><font color=\"00BFFF\">$vote</font></b> fois <br />";
?>								
</p>
<p>
	<span><b>Vous :</b></span><br />
	<?php
echo "En réparation<br />";
?>
</p>
<p>
	<span><b>Votre job :</b></span><br />
	<?php
echo "Votre job : <b><font color=\"00BFFF\">$job</font></b><br />
Vous êtes niveau <b><font color=\"00BFFF\">$level</font></b><br />
et avez <b><font color=\"00BFFF\">$xp</font></b> xp!<br />";
?>
</p>

<p>
	<span><b>Les blos !</b></span><br />
	<?php
echo "Vous avez cassé : <b><font color=\"00BFFF\">$bloc_casse</font></b><br />
Vous avez placé <b><font color=\"00BFFF\">$bloc_place</font></b><br />
<b>Détails</b> :<br />
Bloc de diamant récolté : <b><font color=\"00BFFF\">$bloc_diams</font></b><br />";
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
?>