<div id="droite">
<script type="text/javascript">
function pasdispo()
{
alert("Temporairement indisponible !");
}
</script>
							<nav>
								<div class="haut_droite">
									<div class="titre_haut_droite">
										<h1>Bienvenue sur <?php echo $nom_serveur; ?></h1>
									</div>
								</div>
								<div class="milieu_droite">
									<ul>
									<li><a href="index.php">Accueil</a></li>
									<li><a href="support.php">Le support</a></li>
									<li><a href="guide.php">Guide du débutant</a></li>
									<li><a href="#" onclick="pasdispo()">Informations serveur</a></li>
									<li><a href="forum/index.php">Forum</a></li>
									<?php if($connecte == '0') { ?>
									<li><a href="register.php">Inscription</a></li>
									<?php }
									else { ?><li><a href="gift.php">Gift Code</a></li><?php } ?>
									</ul>
								</div>
								<div class="bas_droite">
								</div>
							</nav>
							
							<?php if($connecte == '1')
							{
							?>
							<nav>
								<div class="haut_droite">
									<div class="titre_haut_droite">
									<?php
									$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT points FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$points = $donnees['points'];
    }
$reponse->CloseCursor();
									?>
										<h1>Compte de <?php echo $_SESSION['pseudo']; ?> - <?php echo $points; ?> SP <a href="logout.php"><img src="images/icons/minus-button.png" /></a></h1>
									</div>
								</div>
								<div class="milieu_droite">
								<ul>
									<li><a href="youraccount.php">Votre compte</a> <img src="images/icons/lock.png" /></li>
									<li><a href="shop.php">Boutique</a> <img src="images/icons/point.png" /></li>
									<li><a href="classements.php">Classements</a></li>
									<li><a href="stats.php">Vos stats</a> <img src="images/icons/script-text.png" /></li>
									<li><a href="vote.php">Votez !(3 points)</a></li>
									<li><a href="sp_shop.php">Acheter des storypoints</a> <img src="images/icons/coins_add.png" /></li>
									</ul>
								</div>
								<div class="bas_droite">
								</div>
							</nav>
							<?php
							if($_SESSION['pseudo'] == "guiedo" || $_SESSION['pseudo'] == "rugbiker")
								{
								?>
								<nav>
								<div class="haut_droite">
									<div class="titre_haut_droite">
								<h1>Menu admin</h1>
									</div>
								</div>
								<div class="milieu_droite">
								<ul>
									<li><a href="admin_news.php">Gérer les news</a></li>
									<li><a href="#">Gérer les jobs</a></li>
									<li><a href="#">Gérer l'economie</a></li>
									<li><a href="#">Gérer la boutique</a></li>
									<li><a href="verifchevalier.php">Gérer les groupes</a></li>
									<li><a href="#">Gérer un membre</a></li>
									</ul>
								</div>
								<div class="bas_droite">
								</div>
							</nav>
								<?php
								}
							}
							elseif($connecte == 0)
							{
							?>
							<nav>
								<div class="haut_droite">
									<div class="titre_haut_droite">
										<h1>Connexion</h1>
									</div>
								</div>
								<div class="milieu_droite">
								<form action="login.php" method="post">
								
								<ul>
									<li><a>Nom de compte :</a></li>
									&nbsp;&nbsp;&nbsp;<input type="text" name="account" /><br /><br />
									<li><a>Mot de passe : </a><br /></li>
									&nbsp;&nbsp;&nbsp;<input type="password" name="pass" /><br /><br />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Se connecter" />
									</ul>
									
								</form>
								</div>
								<div class="bas_droite">
								</div>
							</nav>
							<?php
								
							}
							else
							{
							}
							?>
							<!-- <aside>
							<div class="haut_droite">
									<div class="titre_haut_droite">
										<h1>Vidéo du jour</h1>
									</div>
								</div>
								<div class="milieu_droite">
										<video width="270" height="170" controls="controls">
										<source src="http://streamerb1.file2hd.com/y.aspx/Minecraft%20Predator%20-%20High%20Quality%20[File2HD.com].mp4?title=Minecraft%20Predator&video_id=va1-JK3pu2o&h=3A4F2DE6DA5CFFA7548D3858943B66ECD13C0F62&hq=18" type="video/mp4" />
										<source src="movie.ogg" type="video/ogg" />
										Votre navigateur ne supporte pas cette vidéo.
										</video>
								</div>
								<div class="bas_droite">
								</div>
							</aside>!-->							
							
							<aside>
							<div class="haut_droite">
									<div class="titre_haut_droite">
										<h1>Publicité</h1>
									</div>
								</div>
								<div class="milieu_droite">
									<img src="images/pub.png" alt="pub" />
								</div>
								<div class="bas_droite">
								</div>
							</aside>
							
							<aside>
							<div class="haut_droite">
									<div class="titre_haut_droite">
										<h1>Rejoignez-Nous</h1>
									</div>
								</div>
								<div class="milieu_droite">
									<div id="icones_social">
										<a href="#"><img src="images/social/facebook.png" alt="Rejoignez Minecraft - kit" /></a>
										<a href="#"><img src="images/social/twitter.png" alt="Rejoignez Minecraft - kit" /></a>
										<a href="#"><img src="images/social/youtube.png" alt="Rejoignez Minecraft - kit" /></a>
										<a href="#"><img src="images/social/rss.png" alt="Rejoignez Minecraft - kit" /></a>
									</div>
								</div>
								<div class="bas_droite">
								</div>
							</aside>
						</div>
						</div>
					<div id="bas_centre">
					</div>
				</div>
			</section>