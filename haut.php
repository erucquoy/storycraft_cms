<body onload="Start()">
		<div id="container">
			<header>
				<div id="header">
					<div id="titre">
					<h1><?php echo $slogan; ?></h1>
					</div>
				</div>
			</header>
			<section>
				<div id="centre">
					<div id="centre_img">
						<img src="images/fond.png" alt="Minecraft Kit" />
					</div>
					<div id="haut_centre">
					</div>
					<div id="milieu_centre">
						<div id="stats_serv">
							<span class="serv">IP du serveur : <span class="color_serv"><?php echo $ip_complete; ?></span></span>
							
							<?php
                            $mcquery = QueryMinecraft($ip_complete, $queryport, 5);
                            ?>

							<span class="serv">Nombres de joueurs : <span class="color_serv"> <?php echo $mcquery['Players']; ?>/<?php echo $mcquery['MaxPlayers']; ?></span></span>
							<?php if($connecte == 0) {
							?>
							<span class="serv">Version du serveur : <span class="color_serv">1.2.5</span></span>
							<?php
							}
							elseif($connecte == 1) {
							$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_name.'', ''.$bdd_user.'', ''.$bdd_pass.'', $pdo_options);

$reponse = $bdd->query('SELECT balance FROM iConomy WHERE username=\''.$_SESSION['pseudo'].'\'');
    
    while ($donnees = $reponse->fetch())
    {
		$balance = $donnees['balance'];
    }
	
	$reponse->CloseCursor();
							?>
							<span class="serv">Vous avez <span class="color_serv"><?php echo $balance; ?></span> $</span>
							<?php
							}
							else
							{
							}
							?>
						</div>