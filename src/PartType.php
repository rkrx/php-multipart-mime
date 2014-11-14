<?php
namespace MultipartMime;

interface PartType {
	/**
	 * @return Header
	 */
	public function getHeader();

	/**
	 * @return string
	 */
	public function getContent();
}