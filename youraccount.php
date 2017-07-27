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

$reponse = $bdd->query('SELECT * FROM authme WHERE playername=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$ip = $donnees['ip'];
		$email = $donnees['email'];
    }
	
	$reponse->CloseCursor();
	


?>
<article>
<div class="haut_article">
<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?></h1>
</div>

<div class="milieu_article">
		<p>
									<br />
									
									<b><a href="?a=cp">Changer le mot de passe</a></b><br /><br />
									<b><a href="?a=ce">Changer l'email</a></b><br /><br />
									<b>Votre dernière IP est <font color="B22222"><?php echo $ip; ?></font></b>
									<?php
									if(isset($_GET['a']))
									{
									$action = htmlspecialchars($_GET['a']);
									if($action == "cp")
									{
									?>
									<br />
									<br />
									<div align="center">
									<form action="changepwd.php" method="post">
									<p>Ancien password : <br /><input type="password" name="expass" /><br /><br /></p>
									<p>Nouveau password :<br /><input type="password" name="pass" /><br /><br /></p>
									<p>Confirmer le nouveau : <br /><input type="password" name="confpass" /><br /><br /></p>
									<p><input type="submit" value="Changer !" /><br /></p>
									</form>
									</div>
									
									<?php
									}
									elseif($action == "ce")
									{
									?>
									<br />
									<br />
									<div align="center">
									<form action="changemail.php" method="post">
									<p>Ancienne adresse : <?php echo $email; ?><br /><br /></p>
									<p>Nouvel adresse email :<br /><input type="text" name="email" /><br /><br /></p>
									<p>Confirmer : <br /><input type="text" name="confemail" /><br /><br /></p>
									<p><input type="submit" value="Changer !" /><br /></p>
									</form>
									</div>
									<?php
									}
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
?>