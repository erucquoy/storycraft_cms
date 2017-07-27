<?php
define( 'MQ_SERVER_ADDR', '141.138.154.103' );
define( 'MQ_SERVER_PORT', 25575 );
define( 'MQ_SERVER_PASS', 'PASSWORD' );
define( 'MQ_TIMEOUT', 2 );

require __DIR__ . '/MinecraftRcon.class.php';

echo "<pre>";

try
{
$Rcon = new MinecraftRcon;

$Rcon->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_SERVER_PASS, MQ_TIMEOUT );

$Data = $Rcon->Command( "say 40 slots ! sur mc.storycraft.fr ! Veuillez vous déconnecter ! Rendez-vous là bas !" );

if($Data === false)
{
throw new MinecraftRconException( "Failed to get command result." );
}
else if( StrLen($Data) == 0 )
{
throw new MinecraftRconException( "Got command result, but it's empty." );
}

echo HTMLSpecialChars($Data);
}
catch( MinecraftRconException $e )
{
echo $e->getMessage();
}

$Rcon->Disconnect();