<?php
namespace MultipartMime;

class Parts {
	/**
	 * @var array
	 */
	private $parts = array();

	/**
	 * @param PartType $part
	 * @return $this
	 */
	public function add(PartType $part) {
		$this->parts[] = $part;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getAll() {
		return $this->parts;
	}

	/**
	 * @return $this
	 */
	public function clear() {
		$this->parts = array();
		return $this;
	}
}