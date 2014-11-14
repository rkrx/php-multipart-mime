<?php
namespace MultipartMime;

class Builder {
	const LINEBREAK = "\r\n";

	/**
	 * @param MultipartMessage $multipartMessage
	 * @return string
	 */
	public function build(MultipartMessage $multipartMessage) {
		$headerList = $multipartMessage->getHeader();
		$parts = $multipartMessage->getParts()->getAll();
		$result = array();
		$result[] = $this->buildHeaders($headerList);
		foreach($parts as $part) {
			$result[] = $this->buildPart($part);
		}
		$result[] = '--MIME_boundary--';
		$result[] = '';
		$result[] = '';
		return $this->join($result);
	}

	/**
	 * @param Header $headerList
	 * @return string
	 */
	public function buildHeaders(Header $headerList) {
		$headers = array();
		foreach($headerList->getAll() as $headerName => $headerValue) {
			$headers[] = sprintf("%s: %s", trim($headerName), trim($headerValue));
		}
		$header = $this->join($headers);
		return $header;
	}

	/**
	 * @param PartType $partType
	 * @return string
	 */
	public function buildPart(PartType $partType) {
		$parts = array();
		$content = trim(chunk_split(base64_encode($partType->getContent())));
		$parts[] = '--MIME_boundary';
		$parts[] = $this->buildHeaders($partType->getHeader());
		$parts[] = '';
		$parts[] = $content;
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