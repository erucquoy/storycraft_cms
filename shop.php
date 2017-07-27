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
$titre_page = "La boutique";
include("head.php");
include("haut.php");
include("slider.php");
$username = $_SESSION['pseudo'];
?>
<article>
<div class="haut_article">
<h1>Les différentes boutique !</h1>
</div>

<div class="milieu_article">
		<p>
									<br />
									Voici les boutiques disponibles actuellement !<br /><br />
									
									<a href="?b=m">Boutique $</a><br />
									<a href="?b=j">Boutique jobs</a><br />
									<a href="?b=g">Boutique grades</a><br />
									<a href="?b=i">Boutique Items</a><br />
									<a href="?b=x">Boutique Levels(pour enchanter)</a><br />
<?php
$b = htmlspecialchars($_GET['b']);
if($b == "m")
{
?>
<br />
<div align="center">
<table>
<caption>Les offres :</caption>
<tr>
<th><a href="?b=m&o=1"><img src="/images/icons/2000gold_.png" /></a></th>
<th><a href="?b=m&o=2"><img src="/images/icons/4000gold_.png" /></a></th>
<th><a href="?b=m&o=3"><img src="/images/icons/8000gold_.png" /></a></th>
</tr>
</table>
</div>
<br />

<?php

if(isset($_GET['o']))
{
$o = htmlspecialchars($_GET['o']);
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
	$points_actu = $donnees['points'];
	$money_actu = $donnees['balance'];
	}
$reponse->CloseCursor();

if($o == '1')
{
$dollar_voulu = 2000;
$cout_sp = 10;
if($points_actu >= $cout_sp && $dollar_voulu >= 200)
{
$ndollars = $dollar_voulu + $money_actu;
$npoints = $points_actu - $cout_sp;

	$req = $bdd->prepare('UPDATE iConomy SET points = :npoints, balance = :ndollars WHERE username = :nom_jeu');
	$req->execute(array(
		'ndollars' => $ndollars,
		'npoints' => $npoints,
		'nom_jeu' => $_SESSION['pseudo']
	));
	echo "Votre compte à bien été crédité de $dollar_voulu$, vous avez maintenant $ndollars$. Cet achat vous a couté $cout_sp storypoints et il vous en reste $npoints.";
	}
	else
{ echo "Vous n'avez pas assez de StoryPoints"; }
}
elseif($o == 2)
{
$dollar_voulu = 4000;
$cout_sp = 18;
if($points_actu >= $cout_sp && $dollar_voulu >= 200)
{
$ndollars = $dollar_voulu + $money_actu;
$npoints = $points_actu - $cout_sp;

	$req = $bdd->prepare('UPDATE iConomy SET points = :npoints, balance = :ndollars WHERE username = :nom_jeu');
	$req->execute(array(
		'ndollars' => $ndollars,
		'npoints' => $npoints,
		'nom_jeu' => $_SESSION['pseudo']
	));
	echo "Votre compte à bien été crédité de $dollar_voulu$, vous avez maintenant $ndollars$. Cet achat vous a couté $cout_sp storypoints et il vous en reste $npoints.";
	}
	else
{ echo "Vous n'avez pas assez de StoryPoints"; }
}
elseif($o == 3)
{
$dollar_voulu = 8000;
$cout_sp = 30;
if($points_actu >= $cout_sp)
{
$ndollars = $dollar_voulu + $money_actu;
$npoints = $points_actu - $cout_sp;

	$req = $bdd->prepare('UPDATE iConomy SET points = :npoints, balance = :ndollars WHERE username = :nom_jeu');
	$req->execute(array(
		'ndollars' => $ndollars,
		'npoints' => $npoints,
		'nom_jeu' => $_SESSION['pseudo']
	));
	echo "Votre compte à bien été crédité de $dollar_voulu$, vous avez maintenant $ndollars$. Cet achat vous a couté $cout_sp storypoints et il vous en reste $npoints.";
	}
else
{ echo "Vous n'avez pas assez de StoryPoints"; }

	
}
else
{ echo "L'offre choisie n'est pas valide !"; }	
}
}

elseif($b == "j")
{
?>
<br />
<div align="center">
<h1>Vous devez être connecté !</h1>
<table>
<caption>Nos offres :</caption>
<tr>
<th><a href="?b=j&o=1"><img src="/images/icons/150xp.png" /></a></th>
<th><a href="?b=j&o=2"><img src="/images/icons/400xp.png" /></a></th>
<th><a href="?b=j&o=3"><img src="/images/icons/750xp.png" /></a></th>
<th><a href="?b=j&o=4"><img src="/images/icons/1800xp.png" /></a></th>
</tr>
</table>
</div>
<br />

<?php

if(isset($_GET['o']))
{

$oj = htmlspecialchars($_GET['o']);

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM jobs_jobs WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
	$exp_actu = $donnees['experience'];
	$jobs_actu = $donnees['job'];
	}
$reponse->CloseCursor();

$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
	$points_actu = $donnees['points'];
	}
$reponse->CloseCursor();

if($oj == 1)
{
$exp_voulue = 150;
$cout_sp = 10;
if($points_actu >= $cout_sp)
{
$nexp = $exp_voulue + $exp_actu;
$npoints = $points_actu - $cout_sp;

	$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
	$req->execute(array(
		'npoints' => $npoints,
		'nom_jeu' => $_SESSION['pseudo']
	));

xpJobs($username, $jobs_actu, $exp_voulue);
	
	
	echo 'Vous avez xp '. $exp_voulue .' pour votre métier.';
}
}

elseif($oj == 2)
{
$exp_voulue = 400;
$cout_sp = 20;
if($points_actu >= $cout_sp)
{
$nexp = $exp_voulue + $exp_actu;
$npoints = $points_actu - $cout_sp;

	$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
	$req->execute(array(
		'npoints' => $npoints,
		'nom_jeu' => $_SESSION['pseudo']
	));

	xpJobs($username, $jobs_actu, $exp_voulue);
	
	
	echo "Vous avez xp $exp_voulue pour votre métier.";
}
}

elseif($oj == 3)
{
$exp_voulue = 750;
$cout_sp = 30;
if($points_actu >= $cout_sp)
{
$nexp = $exp_voulue + $exp_actu;
$npoints = $points_actu - $cout_sp;

	$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
	$req->execute(array(
		'npoints' => $npoints,
		'nom_jeu' => $_SESSION['pseudo']
	));

		xpJobs($username, $jobs_actu, $exp_voulue);
	
	
	echo "Vous avez xp $exp_voulue pour votre métier.";
}
}

elseif($oj == 4)
{
$exp_voulue = 1800;
$cout_sp = 60;
if($points_actu >= $cout_sp)
{
$nexp = $exp_voulue + $exp_actu;
$npoints = $points_actu - $cout_sp;

	$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
	$req->execute(array(
		'npoints' => $npoints,
		'nom_jeu' => $_SESSION['pseudo']
	));

		xpJobs($username, $jobs_actu, $exp_voulue);
	
	
	echo "Vous avez xp $exp_voulue pour votre métier.";
}
}
else
{ echo "L'offre choisie n'est pas valide !"; }




}
}

// /images/icons/850xp.png
//
elseif($b == "i")
{
?>
<br />
<br />
<div align="center">
<h1 color="darkred">Vous devez être connecté en jeu !</h1>
<table><tr><th><img src="images/icons/schema.png" align="center" /></th></tr></table>
<br /><br />

<table>
<caption>Nos offres :</caption>
<tr>
<th><a href="?b=i&o=17"><img src="images/icons/wood.png" /></a></th>
<th><a href="?b=i&o=264"><img src="images/icons/diamond.png" /></a></th>
<th><a href="?b=i&o=265"><img src="images/icons/iron.png" /></a></th>
<th><a href="?b=i&o=266"><img src="images/icons/gold.png" /></a></th>
</tr>
<tr>
<td><a href="?b=i&o=331"><img src="images/icons/redstone.png" /></a></td>
<td><a href="?b=i&o=351:4"><img src="images/icons/lapis.png" /></a></td>
<td><a href="?b=i&o=369"><img src="images/icons/blaze.png" /></a></td>
<td><a href="?b=i&o=263"><img src="images/icons/coal.png" /></a></td>
</tr>
</table>
</div>
<br />
<?php
	if(isset($_GET['o']))
	{
		$oi = htmlspecialchars($_GET['o']);
		$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
		while ($donnees = $reponse->fetch())
		{
			$points_actu = $donnees['points'];
		}
		$reponse->CloseCursor();
		
		if($oi == 17)
		{
			$cout = 5;
			$qt = 48;
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Bois pur ont été givé sur vous ! Vous avez perdu $cout Sp";
			}
		}
		elseif($oi == 264)
		{
			$cout = 6;
			$qt = 5;
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Diamant ont été givé sur vous ! Vous avez perdu $cout SP";
			}
		}
		elseif($oi == 265)
		{
			$cout = 5;
			$qt = 32;
			if($points_actu >= $cout)
			{	
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Lingots de fer ont été givé sur vous ! Vous avez perdu $cout SP";
			}
		}
		elseif($oi == 266)
		{
			$cout = 5;
			$qt = 24;
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Lingots d'or ont été givé sur vous ! Vous avez perdu $cout SP";
			}
		}
		elseif($oi == 331)
		{
			$cout = 6;
			$qt = 64;
			if($points_actu >= $cout)
			{	
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Poudre de redstone ont été givé sur vous ! Vous avez perdu $cout SP";
			}
		}
		elseif($oi == '351:4')
		{
			$cout = 7;
			$qt = 64;
			$oi = '351:4';
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Lapis lazuli ont été givé sur vous ! Vous avez perdu $cout SP";
			}
		}
		elseif($oi == 369)
		{
			$cout = 4;
			$qt = 4;
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Batons de Blaze ont été givé sur vous ! Vous avez perdu $cout SP";
			}
		}
		elseif($oi == 263)
		{
			$cout = 5;
			$qt = 48;
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				rconGive($username, $oi, $qt);
				echo "$qt Charbons ont été givé sur vous ! Vous avez perdu $cout SP";
			}
		}
		


	}

}

elseif($b == "g")
{
?>
<br />
<br />
<div align="center">

<table>
<caption>Nos offres :</caption>
<tr>
<th><a href="?b=g&o=che">Grade : Chevalier (60 SP)</a></th>
</tr>
<tr>
<td><a href="?b=g&o=chesum12"><b><font color="red" >PROMO : Chevalier 90 SP pour 2 mois !</font></b></a></td>
</tr>
</table>
</div>
<br />
<?php
	if(isset($_GET['o']))
	{
		$og = htmlspecialchars($_GET['o']);
		
		$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
		while ($donnees = $reponse->fetch())
		{
			$points_actu = $donnees['points'];
		}
		$reponse->CloseCursor();
		
		if($og == "che")
		{
			$cout = 60;
			$grade = "Chevalier";
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				$req = $bdd->prepare('UPDATE permissions_inheritance SET parent = :grade WHERE child = :nom_jeu');
				$req->execute(array(
				'grade' => $grade,
				'nom_jeu' => $_SESSION['pseudo']
				));
				$ann = date('Y');
				$mois = date('m');
				$jour = date('d');
				if($mois == '12')
				{
				$mois == '01';
				$ann++;
				}
				else
				{
				$mois++;
				}
				$date = "$ann-$mois-$jour";
				
				$req = $bdd->prepare('INSERT INTO graduation VALUES(\'\', :username, :grade, :date)');
				$req->execute(array(
				'username' => $_SESSION['pseudo'],
				'grade' => $grade,
				'date' => $date
				));
				
				echo "Vous êtes maintenant Chevalier, veuillez vous reconnecter !";
			}
		}
		elseif($og == "chesum12")
		{
			$cout = 90;
			$grade = "Chevalier";
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				$req = $bdd->prepare('UPDATE permissions_inheritance SET parent = :grade WHERE child = :nom_jeu');
				$req->execute(array(
				'grade' => $grade,
				'nom_jeu' => $_SESSION['pseudo']
				));
				$ann = date('Y');
				$mois = date('m');
				$jour = date('d');
				if($mois == '12')
				{
				$mois == '02';
				$ann++;
				}
				else
				{
				$mois++;
				$mois++;
				}
				$date = "$ann-$mois-$jour";
				
				$req = $bdd->prepare('INSERT INTO graduation VALUES(\'\', :username, :grade, :date)');
				$req->execute(array(
				'username' => $_SESSION['pseudo'],
				'grade' => $grade,
				'date' => $date
				));
				
				echo "Vous êtes maintenant Chevalier pendant 2 mois ! Veuillez vous reconnecter !";
			}
		}
		
		


	}

}

elseif($b == "x")
{
?>
<br />
<br />
<div align="center">
<h1 style="color: red">Veuillez être connecté en jeu lors de la commande !</h1>
<table>
<caption>Nos offres :</caption>
<tr>
<th><a href="?b=x&o=50"><img src="images/icons/50lvl.png" /></a></th>
<th><a href="?b=x&o=110"><img src="images/icons/110lvl.png" /></a></th>
<th><a href="?b=x&o=180"><img src="images/icons/180lvl.png" /></a></th>
</tr>
</table>
</div>
<br />
<?php

	if(isset($_GET['o']))
	{
		$ox = htmlspecialchars($_GET['o']);
		$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
		while ($donnees = $reponse->fetch())
		{
			$points_actu = $donnees['points'];
		}
		$reponse->CloseCursor();
		
		if($ox == "50")
		{
			$cout = 30;
			//$grade = "Chevalier";
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				
rconXp($_SESSION['pseudo'], $ox);
				echo "Vous avez reçu 50 niveaux !";
			}
		}
		
		if($ox == "110")
		{
			$cout = 60;
			//$grade = "Chevalier";
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				
rconXp($_SESSION['pseudo'], $ox);
				echo "Vous avez reçu 110 niveaux !";
			}
		}
		
		if($ox == "180")
		{
			$cout = 90;
			//$grade = "Chevalier";
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
				
rconXp($_SESSION['pseudo'], $ox);
				echo "Vous avez reçu 180 niveaux !";
			}
		}
		
		/*if($ox == "500")
		{
			$cout = 60;
			
			if($points_actu >= $cout)
			{
				$npoints = $points_actu - $cout;

				$req = $bdd->prepare('UPDATE iConomy SET points = :npoints WHERE username = :nom_jeu');
				$req->execute(array(
				'npoints' => $npoints,
				'nom_jeu' => $_SESSION['pseudo']
				));
					rconXp($_SESSION['pseudo'], $ox);

				echo "Vous avez reçu 500 niveaux !";
			}
		}*/
		


	}

}

else
{
}






function rconGive($user, $iditem, $quantity)
{
define( 'MQ_SERVER_ADDR', 'mc.storycraft.fr' );
define( 'MQ_SERVER_PORT', 25575 );
define( 'MQ_SERVER_PASS', 'motdepassedetest' );
define( 'MQ_TIMEOUT', 10 );

require 'MinecraftRcon.class.php';

echo "<pre>";

try
{
$Rcon = new MinecraftRcon;

$Rcon->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_SERVER_PASS, MQ_TIMEOUT );

$Data = $Rcon->Command("give $user $iditem $quantity");

if($Data === false)
{
throw new MinecraftRconException( "Failed to get command result." );
}
else if( StrLen($Data) == 0 )
{
throw new MinecraftRconException( "Got command result, but it's empty." );
}

echo HTMLSpecialChars($Data);
}
catch( MinecraftRconException $e )
{
echo $e->getMessage();
}

$Rcon->Disconnect();
echo "</pre>";
return false;
}
////////////////////////////////////////////////////////////
function xpJobs($username, $jobs_actu, $exp_voulue)
{
define( 'MQ_SERVER_ADDR', 'mc.storycraft.fr' );
define( 'MQ_SERVER_PORT', 25575 );
define( 'MQ_SERVER_PASS', 'motdepassedetest' );
define( 'MQ_TIMEOUT', 10 );

require 'MinecraftRcon.class.php';

echo "<pre>";

try
{
$Rcon = new MinecraftRcon;

$Rcon->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_SERVER_PASS, MQ_TIMEOUT );

$Data = $Rcon->Command("jobs grantxp $username $jobs_actu $exp_voulue");

if($Data === false)
{
throw new MinecraftRconException( "Failed to get command result." );
}
else if( StrLen($Data) == 0 )
{
throw new MinecraftRconException( "Got command result, but it's empty." );
}

echo HTMLSpecialChars($Data);
}
catch( MinecraftRconException $e )
{
echo $e->getMessage();
}

$Rcon->Disconnect();
echo "</pre>";
}



function rconXp($user, $xp)
{
define( 'MQ_SERVER_ADDR', 'mc.storycraft.fr' );
define( 'MQ_SERVER_PORT', 25575 );
define( 'MQ_SERVER_PASS', 'motdepassedetest' );
define( 'MQ_TIMEOUT', 10 );

require 'MinecraftRcon.class.php';

echo "<pre>";

try
{
$Rcon = new MinecraftRcon;

$Rcon->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_SERVER_PASS, MQ_TIMEOUT );

$Data = $Rcon->Command("moreexp give $user $xp");

if($Data === false)
{
throw new MinecraftRconException( "Failed to get command result." );
}
else if( StrLen($Data) == 0 )
{
throw new MinecraftRconException( "Got command result, but it's empty." );
}

echo HTMLSpecialChars($Data);
}
catch( MinecraftRconException $e )
{
echo $e->getMessage();
}

$Rcon->Disconnect();
echo "</pre>";
return false;
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