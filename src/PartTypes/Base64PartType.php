<?php
namespace MultipartMime\PartTypes;

use MultipartMime\Header;
use MultipartMime\PartType;

class Base64PartType implements PartType {
	/**
	 * @var Header
	 */
	private $header;
	/**
	 * @var string
	 */
	private $content;

	/**
	 * @param string $content
	 * @param string $filename
	 * @param Header $header
	 */
	public function __construct($content, $filename, Header $header = null) {
		if($header === null) {
			$header = new Header();
			$header->set('Content-Disposition', 'form-data; name="'.$filename.'"; filename="'.$filename.'"');
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
		return base64_encode($this->content);
	}
}