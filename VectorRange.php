<?php

class VectorRange 
{
	protected $start;
	protected $end;

	public function __construct($s, $e) 
	{
		$this->setStart($s);
		$this->setEnd($e);
	}

	public function getStart()
	{
		return $this->start;
	}

	public function getEnd()
	{
		return $this->end;
	}

	public function getSize()
	{
		return $this->end - $this->start;
	}

	public function setStart($s)
	{
		if (!is_int($s) || $s < 0) {
			throw new Exception('VectorRange->start must be a non-negative integer.');
		}
		$this->start = $s;
	}

	public function setEnd($e)
	{
		if (!is_int($e) || $e < 0) {
			throw new Exception('VectorRange->end must be a non-negative integer.');
		}
		$this->end = $e;
	}

	public function debug($print=true)
	{
		$output = "start={$this->start}, end={$this->end}, size=".$this->getSize();
		if ($print) {
			echo $output."\n";
		}
		return $output;
	}
}