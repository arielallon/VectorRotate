<?php

require_once('Juggler.php');
require_once('Swapper.php');
require_once('Reverser.php');

// doesn't print keys
function print_r_compact($array) {
	echo "[";
	echo implode(',', $array);
	echo "]";
	echo "\n";
}


$a = array('a', 'b', 'c', 'd');
$b = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm');
$arrays = array($a, $b);

echo "=== Juggler ===\n";
$juggler = new Juggler();
foreach ($arrays as $array) {
	for ($i = 0; $i < 17; $i++) {
		echo "rotate $i: ";
		$temp = $array;
		$juggler->rotate($temp, $i);
		print_r_compact($temp);
	}
}

echo "=== Swapper ===\n";
$swapper = new Swapper();
foreach ($arrays as $array) {
	for ($i = 0; $i < 17; $i++) {
		echo "rotate $i: ";
		$temp = $array;
		$swapper->rotate($temp, $i);
		print_r_compact($temp);
	}
}

echo "=== Reverser ===\n";
$reverser = new Reverser();
foreach ($arrays as $array) {
	for ($i = 0; $i < 17; $i++) {
		echo "rotate $i: ";
		$temp = $array;
		$reverser->rotate($temp, $i);
		print_r_compact($temp);
	}
}

// @todo add memory and speed testing

