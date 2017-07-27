
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
if($_SESSION['pseudo'] == "guiedo" || $_SESSION['pseudo'] == "rugbiker")
{

}
else
{
header('Location: index.php');
exit;
}
}
?>
<?php
$titre_page = "Vérifier les chevaliers";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Vérifier la date des chevaliers</h1>
</div>
<div class="milieu_article">
<p><a href="verifchevalier.php">Retour à l'administration des chevaliers</a><br /></p>
<br />
<p>
<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);
if(isset($_GET['a']) && isset($_GET['p']))
{
$a = urlencode($_GET['a']);
$pseudo = urlencode($_GET['p']);
if($a == "r")
{
$req = $bdd->prepare('DELETE FROM graduation WHERE username = :p');
$req->execute(array(
	'p' => $pseudo
	));
$req = $bdd->prepare('UPDATE permissions_inheritance SET parent = \'Citoyen\' WHERE child = :p');
$req->execute(array(
	'p' => $pseudo
	));
	echo "<p><font color=\"#CC0000\">Le chevalier $pseudo est bien redevenu Citoyen !</font></p>";
}

elseif($a == "m")
{
?>
<div align="center">
<h1>Changer la date</h1>
<form action="modchevalier.php?a=m&p=<?php echo $_GET['p']; ?>&r=a" method="post"><br />
Date : <input type="text" value="annee-mois-jour" name="date" /><br /><br />
Pseudo : <input type="text" value="<?php echo $pseudo; ?>" name="pseudo" /><br /><br />
<input type="submit" value="Changer la date" /><br /><br />
</form>
</div>
<?php
if(isset($_GET['r']))
{
$r = $_GET['r'];
if($r == "a")
{
$pseudo = urlencode($_POST['pseudo']);
$date = urlencode($_POST['date']);
$req = $bdd->prepare('UPDATE graduation SET date= :d WHERE username = :p');
$req->execute(array(
	'p' => $pseudo,
	'd' => $date
	));
	
	echo '<font color="red">'.$pseudo.' est Chevalier jusque '.$date.' ! L\'opération s\'est terminée avec succès !</font><br />';
	}
}
}









}

/*
$this_date = date('Y') . '-' . date('m') . '-' . date('d');


$reponse = $bdd->query('SELECT * FROM graduation');
    
    while ($donnees = $reponse->fetch())
    {
		$pseudo = $donnees['username'];
		$grade = $donnees['grade'];
		$date = $donnees['date'];
		list($annee, $mois, $jour) = split('-', $date);
	
		if($date == $this_date)
		{

				?><font color="#FF0000"><?php echo $pseudo; ?></font><font color="FF6600">:: <font color="CC0000">N'est plus valide !&nbsp;&nbsp;&nbsp;<a href="retirchevalier.php"><input type="button" value="Retirer le grade" /></a><br /><br />
		<?php
		}
		else
		{
			?><font color="#33CC00"><?php echo $pseudo; ?></font><font color="FF6600">:: <?php echo $grade; ?> jusque : <?php echo $date; ?></font>&nbsp;&nbsp;&nbsp;<a href="retirchevalier.php"><input type="button" value="Retirer le grade" /></a><br /><br />
		<?php
		}
		
	}

$reponse->CloseCursor();
*/
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
?>