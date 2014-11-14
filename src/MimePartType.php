<?php
namespace MultipartMime;

interface MimePartType {
	/**
	 * @return MimeHeader
	 */
	public function getHeader();

	/**
	 * @return string
	 */
	public function getContent();
}