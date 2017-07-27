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
$virtualamount = htmlspecialchars($_POST['monelib_virtualamount']);
$pseudo = htmlspecialchars($_POST['monelib_data0']);
$monelib_result = htmlspecialchars($_POST['monelib_result']);
if($monelib_result == "OK")
{
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$pseudo.'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$points_actu = $donnees['points'];
    }
	
	$new_point = $points_actu + $virtualamount;
	
	$req = $bdd->prepare('UPDATE iConomy SET points = :points WHERE username = :user');
	$req->execute(array(
	'points' => $new_point,
	'user' => $pseudo
	));
	echo "Créditer !";
	
}
elseif($monelib_result == "KO")
{
header('Location: erreur.php?e=2001');
}

	
	?>