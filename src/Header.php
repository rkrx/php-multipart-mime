<?php
namespace MultipartMime;

class Header {
	/**
	 * @var array
	 */
	private $headers = array();

	/**
	 * @param string $header
	 * @param string $content
	 * @param bool $override
	 * @return $this
	 */
	public function set($header, $content, $override = true) {
		if($override || !array_key_exists($header, $this->headers)) {
			$this->headers[$header] = $content;
		}
		return $this;
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function remove($header) {
		if(array_key_exists($header, $this->headers)) {
			unset($this->headers[$header]);
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getAll() {
		return $this->headers;
	}

	/**
	 * @return $this
	 */
	public function clear() {
		$this->headers = array();
		return $this;
	}
}