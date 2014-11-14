<?php
namespace MultipartMime;

class MultipartMessage {
	/**
	 * @var Header
	 */
	private $header;
	/**
	 * @var Parts
	 */
	private $parts;

	/**
	 * @param Header $header
	 * @param Parts $parts
	 * @return MultipartMessage
	 */
	public function __construct(Header $header = null, Parts $parts = null) {
		if($header === null) {
			$header = new Header();
		}
		if($parts === null) {
			$parts = new Parts();
		}
		$this->header = $header;
		$this->parts = $parts;
	}

	/**
	 * @return Header
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * @return Parts
	 */
	public function getParts() {
		return $this->parts;
	}
}