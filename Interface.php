<?php

Interface VectorRotate
{
	/**
	 *  Currently, only left rotation is assumed.
	 **/
	public function rotate(&$array, $shift);
}