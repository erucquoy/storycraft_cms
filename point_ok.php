<?php
session_start();
if(!isset($_SESSION['pseudo']))
{ $_SESSION['pseudo']='Invite'; }
if($_SESSION['pseudo']=='Invite')
{
$connecte = '0';
exit();
}
else
{
$connecte = '1';
}

include("config.php");


// D�claration des variables
$ident=$idp=$ids=$idd=$codes=$code1=$code2=$code3=$code4=$code5=$datas='';
$idp = 15904;
// $ids n'est plus utilis�, mais il faut conserver la variable pour une question de compatibilit�
$idd = 83841;
$ident=$idp.";".$ids.";".$idd;
// On r�cup�re le(s) code(s) sous la forme 'xxxxxxxx;xxxxxxxx'
if(isset($_POST['code1'])) $code1 = $_POST['code1'];
if(isset($_POST['code2'])) $code2 = ";".$_POST['code2'];
if(isset($_POST['code3'])) $code3 = ";".$_POST['code3'];
if(isset($_POST['code4'])) $code4 = ";".$_POST['code4'];
if(isset($_POST['code5'])) $code5 = ";".$_POST['code5'];
$codes=$code1.$code2.$code3.$code4.$code5;
// On r�cup�re le champ DATAS
if(isset($_POST['DATAS'])) $datas = $_POST['DATAS'];
// On encode les trois chaines en URL
$ident=urlencode($ident);
$codes=urlencode($codes);
$datas=urlencode($datas);
$datas=$_SESSION['pseudo'];

/* Envoi de la requ�te vers le serveur StarPass
Dans la variable tab[0] on r�cup�re la r�ponse du serveur
Dans la variable tab[1] on r�cup�re l'URL d'acc�s ou d'erreur suivant la r�ponse du serveur */
$get_f=@file("http://script.starpass.fr/check_php.php?ident=$ident&codes=$codes&DATAS=$datas");
if(!$get_f)
{
exit("Votre serveur n'a pas acc�s au serveur de Starpass, merci de contacter votre h�bergeur.");
}
$tab = explode("|",$get_f[0]);

if(!$tab[1]) $url = "http://script.starpass.fr/erreur.php";
else $url = $tab[1];

// dans $pays on a le pays de l'offre. exemple "fr"
$pays = $tab[2];
// dans $palier on a le palier de l'offre. exemple "Plus A"
$palier = urldecode($tab[3]);
// dans $id_palier on a l'identifiant de l'offre
$id_palier = urldecode($tab[4]);
// dans $type on a le type de l'offre. exemple "sms", "audiotel, "cb", etc.
$type = urldecode($tab[5]);
// vous pouvez � tout moment consulter la liste des paliers � l'adresse : http://script.starpass.fr/palier.php

// Si $tab[0] ne r�pond pas "OUI" l'acc�s est refus�
// On redirige sur l'URL d'erreur
if(substr($tab[0],0,3) != "OUI")
{
      
$titre_page = "Erreur !";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Une erreur s'est produite !</h1>
</div>

<div class="milieu_article">
		<p>
									Votre compte n'a pas �t� credit� de 30 storypoints gr�ce au code <?php  echo $code1; ?> !<br /><br />
									<a href="index.php">Revenir � la page d'accueil</a><br />
									</p>							
</div>
								
<div class="bas_article">

</div>

<div id="pagination">
								<ul>
									<li class="precedent-off">� Pr�c�dent</li>
									<li class="active">1</li>
									<li class="suivant"><a href="#">Suivant �</a></li> 
								</ul>
							</div>
							<div class="clear"></div>
						</div>

</article>
<?php
include("menus.php");
include("foot.php");
}
else
{
      /* Le serveur a r�pondu "OUI"

      On place un cookie appel� CODE_BON et qui vaut la valeur 1
      Ce cookie est valide jusqu'� ce que l'internaute ferme son navigateur
      Dans les pages suivantes, nous testerons l'existence du cookie
      S'il existe, c'est que l'internaute est autoris�,
      sinon on le renverra sur une page d'erreur */
      setCookie("CODE_BON", "1", 0);
      // Si vous avez plusieurs documents, nommer le cookie plut�t 'code'+iDocumentId
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$points_actu = $donnees['points'];
    }
	
	$new_point = $points_actu + 30;
	
	
	$req = $bdd->prepare('UPDATE iConomy SET points = :points WHERE username = :user');
	$req->execute(array(
	'points' => $new_point,
	'user' => $_SESSION['pseudo']
	));
	$murl = "points.php?c=$code1";
	?>
<?php
$titre_page = "Points cr�diter !";
include("head.php");
include("haut.php");
include("slider.php");
?>
<article>
<div class="haut_article">
<h1>Votre compte � �t� credit� !</h1>
</div>

<div class="milieu_article">
		<p>
									Votre compte � �t� credit� de 30 storypoints gr�ce au code <?php  echo $code1; ?> !<br /><br />
									<a href="index.php">Revenir � la page d'accueil</a><br />
									</p>							
</div>
								
<div class="bas_article">

</div>

<div id="pagination">
								<ul>
									<li class="precedent-off">� Pr�c�dent</li>
									<li class="active">1</li>
									<li class="suivant"><a href="#">Suivant �</a></li> 
								</ul>
							</div>
							<div class="clear"></div>
						</div>

</article>
<?php
include("menus.php");
include("foot.php");

	//header("Location: $murl");
      // vous pouvez afficher les variables de cette fa�on :
      // echo "idd : $idd / codes : $codes / datas : $datas / pays : $pays / palier : $palier / id_palier : $id_palier / type : $type";
}
?>
      
