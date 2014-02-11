<?php

require_once('Interface.php');

/**
 *  Option A in the book.
 *  Picks up the first element and starts shifting elements left $shiftAmount places, skipping the ones in between.
 *  When it hits the original spot, it drops the first element in its new spot.
 *  If we haven't shifted everything yet, it picks up the next element and repeates the process.
 **/
class Juggler implements VectorRotate
{
	/**
	 *  Note: Currently left shift only
	 **/
	public function rotate(&$array, $shiftAmount)
	{
		$vectorLength = count($array);
		
		$count = $offset = 0;
		// Potentially not necessary.
		$shiftAmount = $shiftAmount % $vectorLength;

		// Make sure to stop after we've moved each element once. 
		// (Technically, after count($array) moves, which doesn't guarantee a single element isn't moved twice. 
		// However, the algorithm will only hit each element once.)
		while ($count < $vectorLength) {
			$index = $shiftAmount + $offset;

			// Pick up the temp element
			$tempElement = $array[$offset];

			// Loop until we've hit our starting spot again for this offset
			while ($index % $vectorLength != $offset) {
				
				// shift an element left $shiftAmount spots
				$array[($index - $shiftAmount) % $vectorLength] = $array[$index % $vectorLength];

				// the next element to shift will be $shiftAmount spaces to the right of here
				$index += $shiftAmount;

				$count++;
			}

			// Drop the temp element in its new spot
			$array[($index - $shiftAmount) % $vectorLength] = $tempElement;

			$count++;
			$offset++;
		}
	}
}