<?php

require_once('Interface.php');
require_once('VectorRange.php');

class Swapper implements VectorRotate
{
	/**
	 *  Main rotate function, per interface spec.
	 **/
	public function rotate(&$array, $shiftAmount)
	{
		// a shift amount greater than the size of the array just means to mod it down.
		$shiftAmount %= count($array);

		// only need to do anything if the shift amount is greater than zero
		if ($shiftAmount > 0) {
			// init our ranges for the first level of the recursive function
			$a = new VectorRange(0, $shiftAmount-1);
			$b = new VectorRange($shiftAmount, count($array)-1);

			// call the recursive function
			$this->_rotate($array, $a, $b);
		}

		return $array;
	}

	/**
	 *	Recursive rotate function.
	 *  Takes range A and B:
	 *   - if they are equal sized, just swap them.
	 *   - if a is smaller, swap it with the right chunk of b that's equal in size. 
	 *     the elements from a are now in their final spot.
	 *     but we now need to call this function on the remaining elements.
	 *   - if b is smaller, swap it with the left chunk of a that's equal in size. 
	 *     the elements from b are now in their final spot.
	 *     but we now need to call this function on the remaining elements.
	 *
	 *	array is passed by reference so we don't have to waste RAM
	 **/
	protected function _rotate(&$array, VectorRange $a, VectorRange $b)
	{
		$aSize = $a->getSize();
		$bSize = $b->getSize();

		// if we have two equal sized parts, we just need to swap them.
		if ($aSize == $bSize) {
			$this->_swap($array, $a, $b);
		}

		// if a is smaller than b ...
		elseif ($aSize < $bSize) {
			// split $b into a left and right component. 
			// bRight is the same size as $a. 
			// bLeft is the rest ("the middle").
			$bLeft = new VectorRange( $b->getStart(), max(($b->getEnd() - $aSize - 1), 0) );
			$bRight = new VectorRange( ($b->getEnd() - $aSize), $b->getEnd() );

			// swap the equally-sized parts
			$this->_swap($array, $a, $bRight);

			// recurse!
			// (on the left side. right side is all set)
			$this->_rotate($array, $a, $bLeft);
		}

		// if b is smaller than a ...
		elseif ($aSize > $bSize) {
			// split $a into a left and right component. 
			// bRight is the same size as $b. 
			// bLeft is the rest ("the middle").
			$aLeft = new VectorRange( $a->getStart(), ($a->getStart() + $bSize) );
			$aRight = new VectorRange( ($a->getStart() + $bSize + 1), $a->getEnd() );

			// swap the equally-sized parts
			$this->_swap($array, $aLeft, $b);

			// recurse!
			// (on the right side. left side is all set)
			$this->_rotate($array, $aRight, $b);
		}

		// well this code will just never get run. poor code.
		else {
			throw new Exception('a is neither bigger, smaller, nor equal to b? "that\'s unpossible"');
		}
	}

	/**
	 *	swap elements sequentially from the a range to their dopplegangers in the b range.
	 *  one-at-a-time limits memory usage.
	 **/
	protected function _swap(&$array, VectorRange $a, VectorRange $b)
	{
		$temp = null;
		$aI = $a->getStart();
		$bI = $b->getStart();

		for ($n=0; $n <= $a->getSize(); $n++) {
			$temp = $array[$aI+$n];
			$array[$aI+$n] = $array[$bI+$n];
			$array[$bI+$n] = $temp;
		}
	}
}