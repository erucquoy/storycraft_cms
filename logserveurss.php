<?php

$fichier='/home/guiedo/minecraft/server.log';
$contenu = fread(fopen($fichier, "r"), filesize($fichier));
print "<pre>".$contenu."</pre>"; 
?>