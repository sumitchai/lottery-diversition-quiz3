<?php
function lottery($length)
{
	$token = "";
	$codeAlphabet = "0123456789";

	for($i = 0; $i < $length; $i++) {

		$token .= $codeAlphabet[mt_rand(0,strlen($codeAlphabet) -1 )];
	}

	return $token;
}
?>