<?php

require_once('Interface.php');

class Reverser implements VectorRotate
{
	public function rotate(&$array, $shiftAmount)
	{
		$shiftAmount %= count($array);
		if ($shiftAmount==0) {
			return;
		}

		$this->reverseSection($array, 0, $shiftAmount-1);
		$this->reverseSection($array, $shiftAmount, count($array)-1);
		$this->reverseSection($array);
	}

	public function reverseSection(&$array, $start=0, $end=null)
	{
		$end = (is_null($end)) ? count($array)-1 : $end;

		// reverse by swapping inward
		$temp = null;
		$halfway = floor(($end-$start)/2);
		// echo "start=$start, end=$end, halfway=$halfway\n";
		for ($i = 0; $i <= $halfway; $i++) {
			// echo "i=".($i).", i+start=".($i+$start).", end-i=".($end-$i)."\n";
			$temp = $array[$i + $start];
			$array[$i + $start] = $array[$end - $i];
			$array[$end - $i] = $temp;
		}
		// echo "[";
		// echo implode(',', $array);
		// echo "]";
		// echo "\n";
	}
}