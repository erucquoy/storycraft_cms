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
//exit;
}
?>
<?php
$titre_page = "Inscription 2/2";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Inscription sur le site storycraft !</h1>
</div>

<div class="milieu_article">
<div align="center">
<?php

// Serveur
$serveur = $bdd_host;
// Login
$login = $bdd_user;
// Mot de passe
$mdp = $bdd_pass;
// Base de donnée
$bdd = $bdd_name;
$connexion = mysql_connect($serveur,$login,$mdp);
$db = mysql_select_db($bdd, $connexion);

        if(isset($_POST['mdp1']) && isset($_POST['mdp2']) && isset($_POST['pseudomc']))
        {
            if(true){
            
                //code bon on poursuit l'inscription
                $charte = "oui";
                //$charte = $_POST['charteok'];
                if ($charte == "oui") {
                
                $mdp1 = htmlspecialchars($_POST['mdp1']);
                $mdp2 = htmlspecialchars($_POST['mdp2']);
                if ($mdp1 != $mdp2)
                	{
                  echo "<b>Les deux mots de passe entrés sont différents</b>";
                  }
                else {
                  //$mail1 = $_POST['mail'];
                  //$mail2 = $_POST['mail2'];
                if (false)
                	{
                  echo "<b>Les deux mail entrés sont différents</b>";
                  }
                else {
                //virifier le pseudo
                  
                  if(true){
                  if(false){
          
                  echo '<b>Une erreur fatale s\'est produite !</b>';
          
                  }
                	else
                	{
                		// vérification si le pseudo ne comprend pas de caractères interdits
	$pseudomc = htmlspecialchars($_POST['pseudomc']);
	function detect_parasite($pseudomc)
	{
        //Caractères à enlever
	$puncts=array(	".",
			";",
			",",
			":",
			"!",
			"?",
			"/",
			"&",
			'\"',
			"\'",
			"[",
			"]",
			"(",
			")",
			"»",
			"«",
			"°",
			"+",
			"*",
			"#",
			"<",
			">",
			"{",
			"}"
			);
 
	foreach($puncts as $punct)
	{
  if ( strpos ($pseudomc, $punct) )				
	return True; // pseudo invalide//				
	}
	return False;  // pseudo valide//
	}
	
	if (detect_parasite($pseudomc))
	{
	echo "<b>Le pseudo contient des caractères invalides</b>";
	}
	else
	{
	
	//code de confirmation :
	$lettres_chiffres = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $lettres_chiffres_melanges = str_shuffle($lettres_chiffres);
  $guid = substr($lettres_chiffres_melanges, 0, 8);
	 
	 
	 
	 //virifier le pseudo
                  $ndc = htmlspecialchars($_POST['pseudomc']);
                	$sql  = "SELECT COUNT(*) AS nbr FROM authme WHERE playername = '".$ndc."'";
                	$res  = mysql_query($sql);
                	//$resultat = mysql_query($query);	
                	$alors  = mysql_fetch_assoc($res);
                  if(isset($_POST['pseudomc'])){
                  if(!($alors['nbr'] == 0)){
          
                  echo '<b>Ce pseudo est déjà utilisé</b>';
          
                  }
				  else
				  {
      $mdp = $mdp1;
	  $mdphash = hash("md5",$mdp);
	  //$question = $_POST['question'];
	  //$reponse = $_POST['reponse'];
 
$mysqldate = date('Y-m-d H:i:s');
$phpdate = strtotime( $mysqldate );


$email = htmlspecialchars($_POST['email']);

      
			$Query="INSERT INTO authme (id,playername,password,ip,email) VALUES (\"\", \"".$ndc."\", \"".$mdp."\", \"".$_SERVER['REMOTE_ADDR']."\", \"".$email."\")";
			mysql_query($Query)or die('Erreur dans la requête : ' . $Query . '<br />' . mysql_error()); 
			echo '<p><b><font color="orange">L\'inscription s\'est bien déroulée. Vous pouvez dès à présent vous connecter !</b></font></p>';
			
			//echo '<br /> '.$mysqldate.'<br /> '.$phpdate.'<br />';
			
			
			
			
			
			/*
			$headers ='From: "storycraft"<noreply@storycraft.fr>'."\n";
     $headers .='Reply-To: support@guiedo.com'."\n";
     $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';

     $message ='<html><head><title>Inscription sur Storycraft</title></head><body>Bonjour à toi <b>'.$pseudomc.'</b>,<br /><br />Ton inscription à bien été prise en compte sur storycraft.fr ! <br /> Tu peux maintenant te connecté au serveur avec tes identifiants : <br /> <br />Ton pseudo minecraft : <b>'.$pseudomc.'</b><br />Ton mot de passe : <b>'.$mdp.'</b><br /><br />En cas de problème n\'hésite pas à contacter un administrateur en jeu ou a envoyé un message à cette adresse : support@guiedo.com<br /><br /><b><i><u>Cordialement, l\'Équipe Storycraft ! </b></i></u></body></html>';

     if(mail('support@guiedo.com', 'Inscription sur Storycraft', $message, $headers))
     {
         if(mail($email, 'Inscription sur Storycraft', $message, $headers))
		 {}
		 else
		 {}
		 
     }
     else
     {
          
     } */
  }
  }
  else {
  echo 'Pseudo incorrect'; }
  }
                  }               
                }                
                }
                }
                }
                else {
                echo '<b>Vous devez accepter la charte pour vous inscrire.</b>';
                }
           
                } 
            
            else {
                echo '<b>Le code de confirmation n\'est pas bon.</b>';
                }
                
            session_destroy(); 
        }
        else
            echo '<b>Tous les champs sont obligatoires.</b>';
    ?>
	</div>
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