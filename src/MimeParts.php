<?php
namespace MultipartMime;

class MimeParts {
	/**
	 * @var array
	 */
	private $parts = array();

	/**
	 * @param MimePartType $part
	 * @return $this
	 */
	public function add(MimePartType $part) {
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