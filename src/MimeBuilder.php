<?php
namespace MultipartMime;

class MimeBuilder {
	const LINEBREAK = "\r\n";

	/**
	 * @param MimeMultipartMessage $multipartMessage
	 * @param string $mimeBoundary
	 * @return string
	 */
	public function build(MimeMultipartMessage $multipartMessage, $mimeBoundary = 'MIME_boundary') {
		$headerList = $multipartMessage->getHeader();
		$parts = $multipartMessage->getParts()->getAll();
		$result = array();
		$result[] = $this->buildHeaders($headerList);
		foreach($parts as $part) {
			$result[] = $this->buildPart($part, $mimeBoundary);
		}
		$result[] = "--{$mimeBoundary}--";
		$result[] = '';
		$result[] = '';
		return $this->join($result);
	}

	/**
	 * @param MimeHeader $headerList
	 * @return string
	 */
	public function buildHeaders(MimeHeader $headerList) {
		$headers = array();
		foreach($headerList->getAll() as $headerName => $headerValue) {
			$headers[] = sprintf("%s: %s", trim($headerName), trim($headerValue));
		}
		$header = $this->join($headers);
		return $header;
	}

	/**
	 * @param MimePartType $partType
	 * @param string $mimeBoundary
	 * @return string
	 */
	public function buildPart(MimePartType $partType, $mimeBoundary) {
		$parts = array();
		$parts[] = "--{$mimeBoundary}";
		$parts[] = $this->buildHeaders($partType->getHeader());
		$parts[] = '';
		$parts[] = $partType->getContent();
		$parts[] = '';
		return $this->join($parts);
	}

	/**
	 * @param string[] $parts
	 * @return string
	 */
	private function join(array $parts) {
		return join("\r\n", $parts);
	}
}