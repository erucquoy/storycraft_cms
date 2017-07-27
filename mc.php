<?php
$connect = ssh2_connect('127.0.0.1', 22);
ssh2_auth_password($connect, "root", "d4t4base555+");
$stream = ssh2_exec($connect, "mcstatus");
//$mcstatus = exec("mcstatus");

echo "<pre>$stream</pre>";
?>
<br />
<br />
<?php
echo "Que veux-tu faire ?<br /><br />";
echo "<a href=\"?a=mcstop\">Stopper le serveur</a><br /><br />";
echo "<a href=\"?a=mcstart\">Allumer le serveur</a><br /><br />";
echo "<a href=\"?a=mcrestart\">Restart le serveur</a><br /><br />";
echo "<a href=\"?a=reboot\">Restart le dédié (en cas de crahs du serv)</a><br /><br />";
if(isset($_GET['a']))
{
$mcaction = shell_exec($_GET['a']);

echo "<pre>$mcaction</pre>";
}
?>