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
        if(!empty(!empty($_POST['pseudo']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2']))
        {
            if(isset($_SESSION['captcha']) && $_POST['captcha'] == $_SESSION['captcha']){
            
                //code bon on poursuit l'inscription
                $charte = "oui";
                $charte = $_POST['charteok'];
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
                  $pseudo = $_POST['pseudo'];
                	$sql  = "SELECT COUNT(*) AS nbr FROM accounts_site WHERE account = '".$pseudo."'";
                	$res  = mysql_query($sql);
                	//$resultat = mysql_query($query);	
                	$alors  = mysql_fetch_assoc($res);
                  if(isset($_POST['pseudo'])){
                  if(!($alors['nbr'] == 0)){
          
                  echo '<b>Ce nom de compte est déjà utilisé</b>';
          
                  }
                	else
                	{
                		// vérification si le pseudo ne comprend pas de caractères interdits
	
	function detect_parasite($pseudo)
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
  if ( strpos ($pseudo, $punct) )				
	return True; // pseudo invalide//				
	}
	return False;  // pseudo valide//
	}
	
	if (detect_parasite($pseudo))
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
                	$sql  = "SELECT COUNT(*) AS nbr FROM accounts_site WHERE pseudomc = '".$ndc."'";
                	$res  = mysql_query($sql);
                	//$resultat = mysql_query($query);	
                	$alors  = mysql_fetch_assoc($res);
                  if(isset($_POST['pseudomc'])){
                  if(!($alors['pseudomc'] == 0)){
          
                  echo '<b>Ce pseudo est déjà utilisé</b>';
          
                  }
      $mdp = $mdp1;
	  //$question = $_POST['question'];
	  //$reponse = $_POST['reponse'];
 

      
			$Query="INSERT INTO accounts_site (id,account,password,pseudomc,ipadress) VALUES ('NULL', \"".$pseudo."\", \"".$mdp."\", \"".$ndc."\")";
			mysql_query($Query)or die('Erreur dans la requête : ' . $Query . '<br />' . mysql_error()); 
			echo '<b><font color="#008000">L\'inscription s\'est bien déroulée, un mail de confirmation vous a été envoyé cliquez sur le lien qu\'il contient pour finaliser votre inscription.</b></font>';
  }
  else {
  echo 'Nom de compte incorrect'; }
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