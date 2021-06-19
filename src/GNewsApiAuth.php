<?php

namespace ErgonautTM\GNewsApi;

class GNewsApiAuth
{
	private $api_key;

	public function __construct($api_key)
	{
		$this->api_key = $api_key;
	}

	public function ApiKey(): array
    {
		return [
		    'token' => $this->api_key
        ];
	}
}
