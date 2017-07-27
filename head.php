<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
    <head>
	<SCRIPT LANGUAGE="JavaScript">
//D'autres scripts sur http://www.toutjavascript.com
//Si vous utilisez ce script, merci de m'avertir !  < webmaster@toutjavascript.com >
var taux=0.005; var lequel=""; var lautre="";
var valeur=0;
function conv(f) {
	if (lequel=="dollar") {valeur=Math.round(100*parseFloat(f.elements[lequel].value)*taux)/100;}
	if (lequel=="point")  {valeur=Math.round(100*parseFloat(f.elements[lequel].value)/taux)/100;}
	if (isNaN(valeur)) {
		return false;	
	} else {
		return true;
	}
}

function Start() {
	if (lequel!="") {
		var f=document.forms["convpt"];
		if (conv(document.forms["convpt"])) {
			document.forms["convpt"].elements[lautre].value=valeur;
		}
		// astuce pour netscape !
		if (document.layers) {
			document.forms["convpt"].elements[lequel].blur()
			document.forms["convpt"].elements[lequel].focus()
		}
	}
	setTimeout("Start()",100);
}
</SCRIPT>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="style.css" />
        <title><?php echo $titre_page; ?> - <?php echo $nom_serveur; ?></title>
		<link rel="stylesheet" href="slider/themes/default/default.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="slider/themes/pascal/pascal.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="slider/themes/orman/orman.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="slider/nivo-slider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="slider/style.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="jquery/jquery.js"></script>
		
    </head>