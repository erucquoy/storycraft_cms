<?php
include("config.php");
//$username = "xenoblade";
$pid = 0;
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM `lb-players`');
    
    while ($donnees = $reponse->fetch())
    {
	$pid = $donnees['playerid'];
	$username = $donnees['playername'];
	//echo "le pid de $username est $pid<br />";
	
	$reponse2 = $bdd->query('SELECT * FROM `lb_world` WHERE playerid=\''.$pid.'\'');
    $nb_diams = 0;
	$nb_stone = 0;
    while ($donnees2 = $reponse2->fetch())
    {
	if($donnees2['replaced'] == '56')
	{
	$nb_diams++;
	}
	elseif($donnees2['replaced'] == '1')
	{
	$nb_stone++;
	}
	
	
	}
	$reponse2->CloseCursor();
    if($nb_stone > 0 && $nb_diams > 0)
	{
	$ratio = ($nb_diams/$nb_stone)*1000;
	echo "Le ratio de $username est $ratio<br />";
	}
	else
	{
	echo "$username n'a pas pioché de diams<br />";
	}
	
	
	}
	

	
$reponse->CloseCursor();




?>