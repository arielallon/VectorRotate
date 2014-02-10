<?php

require_once('Juggler.php');

// doesn't print keys
function print_r_compact($array) {
	echo "[";
	echo implode(',', $array);
	echo "]";
	echo "\n";
}

$juggler = new Juggler();

$a = array('a', 'b', 'c', 'd');
$b = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm');
$arrays = array($a, $b);


foreach ($arrays as $array) {
	for ($i = 0; $i < 17; $i++) {
		$temp = $array;
		$juggler->rotate($temp, $i);
		print_r_compact($temp);
	}
}

