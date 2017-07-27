<?php session_start(); ?>
<?php

include("config.php");

$pseudo = htmlspecialchars($_POST['account']);
$mdp = htmlspecialchars($_POST['pass']);


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM authme WHERE playername=\''.$pseudo.'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$actif = 1;
        $mdpbdd = $donnees['password'];
		$pseudomc = $donnees['playername'];
    }
    
    $reponse->closeCursor();
	
	if($mdp == $mdpbdd)
	{
		if ($actif == '0')
		{
			session_start();
			session_unset();
			session_destroy(); 
			header('Location: erreur.php?e=2');
		}
		else 
		{
			
			$_SESSION['pseudo'] = $pseudomc;	
			header('Location: index.php');
		}
	}
	else
	{
		session_start();
		session_unset();
		session_destroy();
	}
			
header('Location: index.php');
?>
