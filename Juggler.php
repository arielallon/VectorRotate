<?php

require_once('Interface.php');

/**
 *  Option A in the book.
 **/
class Juggler implements VectorRotate
{
	public function rotate(&$array, $shift)
	{
		$vectorLength = count($array);
		$count = $m = 0;

		// Potentially not necessary.
		$shift = $shift % $vectorLength;

		while ($count < $vectorLength) {
			$i = $shift + $m;
			$t = $array[$m];

			while ($i % $vectorLength != $m) {
				$array[($i - $shift) % $vectorLength] = $array[$i % $vectorLength];
				$i += $shift;
				$count++;
			}

			$array[($i - $shift) % $vectorLength] = $t;
			$count++;
			$m++;
		}
	}
}