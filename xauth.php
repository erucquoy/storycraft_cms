<?php
function checkPassword($checkPass, $realPass, $algorithm) {
	switch ($algorithm) {
	case 1:
		return $realPass == hash('whirlpool', $checkPass);
	case 2:
		return $realPass == hash('md5', $checkPass);
	case 3:
		return $realPass == hash('sha1', $checkPass);
	case 4:
		return $realPass == hash('sha256', $checkPass);
	default:
		// xAuth hashing
		$saltPos = (strlen($checkPass) >= strlen($realPass) ? strlen($realPass) : strlen($checkPass));
		$salt = substr($realPass, $saltPos, 12);
		$hash = hash('whirlpool', $salt . $checkPass);
		return $realPass == substr($hash, 0, $saltPos) . $salt . substr($hash, $saltPos);
	}
}
function encryptPassword($password) {
	$salt = substr(hash('whirlpool', uniqid(rand(), true)), 0, 12);
	$hash = hash('whirlpool', $salt . $password);
	$saltPos = (strlen($password) >= strlen($hash) ? strlen($hash) : strlen($password));
	return substr($hash, 0, $saltPos) . $salt . substr($hash, $saltPos);
}
$checkpassword = "ripatol1-";
echo 'pass = '.$checkpassword.' <br /><br />';
$encrypt = encryptPassword($checkpassword);
echo 'encrypt = '.$encrypt.' <br /><br />';
echo 'verif <br /><br />';
?>
