<?php
namespace MultipartMime\PartTypes;

use MultipartMime\MimeHeader;
use MultipartMime\MimePartType;

class RawMimePartType implements MimePartType {
	/**
	 * @var MimeHeader
	 */
	private $header;
	/**
	 * @var string
	 */
	private $content;

	/**
	 * @param string $content
	 * @param MimeHeader $header
	 */
	public function __construct($content, MimeHeader $header = null) {
		if($header === null) {
			$header = new MimeHeader();
			$header->set('Content-Disposition', 'form-data');
			$header->set('Content-Transfer-Encoding', 'base64');
			$header->set('Content-Type', 'application/octet-stream');
		}
		$this->header = $header;
		$this->content = $content;
	}

	/**
	 * @return string[]
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return trim($this->content);
	}
}