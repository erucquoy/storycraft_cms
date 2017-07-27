
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
<p>Les Chevaliers actuels :<br /></p>
<br />
<p>
<?php
$this_date = date('Y') . '-' . date('m') . '-' . date('d');






$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT * FROM graduation');
    
    while ($donnees = $reponse->fetch())
    {
		$pseudo = $donnees['username'];
		$grade = $donnees['grade'];
		$date = $donnees['date'];
		list($year, $month, $day) = explode('-', $date);
		if($year < date('Y'))
		{

				?><font color="#FF0000"><?php echo $pseudo; ?></font><font color="FF6600">:: <font color="CC0000">N'est plus valide !&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=r&p=<?php echo $pseudo; ?>"><input type="button" value="Retirer le grade" /></a>&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=m&p=<?php echo $pseudo; ?>"><input type="button" value="Modifier la date" /></a><br /><br />
		<?php
		}
		else
		{
			if($month > date('m'))
			{

					?><font color="#33CC00"><?php echo $pseudo; ?></font><font color="FF6600">:: <?php echo $grade; ?> jusque : <?php echo $day .'/'. $month .'/'.$year; ?></font>&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=r&p=<?php echo $pseudo; ?>"><input type="button" value="Retirer le grade" /></a>&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=m&p=<?php echo $pseudo; ?>"><input type="button" value="Modifier la date" /></a><br /><br />
		<?php
					
				
				
			}
			else
			{
				if($month == date('m'))
				{
				if($day <= date('d'))
				{
				?><font color="#FF0000"><?php echo $pseudo; ?></font><font color="FF6600">:: <font color="CC0000">N'est plus valide !&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=r&p=<?php echo $pseudo; ?>"><input type="button" value="Retirer le grade" /></a>&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=m&p=<?php echo $pseudo; ?>"><input type="button" value="Modifier la date" /></a><br /><br />
		<?php
				}
				else
				{
				?><font color="#33CC00"><?php echo $pseudo; ?></font><font color="FF6600">:: <?php echo $grade; ?> jusque : <?php echo $day .'/'. $month .'/'.$year; ?></font>&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=r&p=<?php echo $pseudo; ?>"><input type="button" value="Retirer le grade" /></a>&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=m&p=<?php echo $pseudo; ?>"><input type="button" value="Modifier la date" /></a><br /><br />
		<?php
				}
				}
				else
				{
				?><font color="#FF0000"><?php echo $pseudo; ?></font><font color="FF6600">:: <font color="CC0000">N'est plus valide !&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=r&p=<?php echo $pseudo; ?>"><input type="button" value="Retirer le grade" /></a>&nbsp;&nbsp;&nbsp;<a href="modchevalier.php?a=m&p=<?php echo $pseudo; ?>"><input type="button" value="Modifier la date" /></a><br /><br />
		<?php
				}
			}
			
		}
	
		
	}

$reponse->CloseCursor();

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