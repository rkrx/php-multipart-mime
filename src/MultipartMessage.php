<?php
namespace MultipartMime;

class MultipartMessage {
	/**
	 * @var MimeHeader
	 */
	private $header;
	/**
	 * @var MimeParts
	 */
	private $parts;

	/**
	 * @param MimeHeader $header
	 * @param MimeParts $parts
	 * @return MultipartMessage
	 */
	public function __construct(MimeHeader $header = null, MimeParts $parts = null) {
		if($header === null) {
			$header = new MimeHeader();
		}
		if($parts === null) {
			$parts = new MimeParts();
		}
		$this->header = $header;
		$this->parts = $parts;
	}

	/**
	 * @return MimeHeader
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * @return MimeParts
	 */
	public function getParts() {
		return $this->parts;
	}
}