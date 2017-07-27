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
<h1>Les classements</h1>
</div>

<div class="milieu_article">
		<p>
Vous pouvez chosir entre :<br />
<a href="?c=m">Classement $</a><br />
<a href="?c=j">Classement job</a><br />
<a href="?c=v">Classement vote</a><br />
<?php if(isset($_GET['c']))
{
$c = htmlspecialchars($_GET['c']);
if($c == "m")
{
$cc = 0;
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM iConomy ORDER BY balance DESC');
    
    while ($donnees = $reponse->fetch())
    {
	if($cc < 10)
	{
	$user = $donnees['username'];
	$money = $donnees['balance'];
		if($user == "guiedo" || $user == "thisma_dehhez" || $user == "rugbiker" || $user == "AkuseruK" || $user == "firefox")
		{
		
		}
		else
		{
		?>
		<div align="center">
		<b><font size="5" color="990000"><?php echo $donnees['username'];?></font></b><br />
		<b><font color="FFFF00"><?php echo $donnees['balance']; ?> $</font></b><br /><br />
		</div>
		<?php
		$cc++;
		}
		}
    }
	
$reponse->CloseCursor();

}
elseif($c == "v")
{
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM iConomy ORDER BY vote DESC');
    
    while ($donnees = $reponse->fetch())
    {
	$user = $donnees['username'];
	$vote = $donnees['vote'];
	if($vote == 0)
	{
	}
	else
	{
		if($user == "guiedo" || $user == "thisma_dehhez" || $user == "rugbiker" || $user == "AkuseruK" || $user == "firefox")
		{
		
		}
		else
		{
		?>
		<div align="center">
		<b><font size="5" color="990000"><?php echo $donnees['username'];?></font></b><br />
		<b><font color="FFFF00"><?php echo $donnees['vote']; ?> votes</font></b><br /><br />
		</div>
		<?php
		}
	}
    }
	
$reponse->CloseCursor();
}

elseif($c == "j")
{
$cj = 0;
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM jobs_jobs ORDER BY level DESC');
    
    while ($donnees = $reponse->fetch())
    {
	$user = $donnees['username'];
	$job = $donnees['job'];
	$level = $donnees['level'];
	
	
		if($user == "guiedo" || $user == "thisma_dehhez" || $user == "rugbiker" || $user == "AkuseruK" || $user == "firefox")
		{
		
		}
		else
		{
		if($cj < 25)
		{
		?>
		<div align="center">
		<b><font size="5" color="990000"><?php echo $donnees['username'];?></font></b><br />
		<b><font color="FF8C00"><?php echo $donnees['job'];?></font></b><br />
		<b><font color="FFFF00">Niveau :<?php echo $donnees['level']; ?></font></b><br /><br />
		</div>
		<?php
		$cj++;
		}
		}
	
    }
	
$reponse->CloseCursor();
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