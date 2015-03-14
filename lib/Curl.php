<?php
namespace app\lib;

class Curl{
	protected $url;
	protected $postFields;
	protected $config;
	protected $curl;

	function __construct( $url, $postFields = null , $config = null )
	{
		$this->url = $url;
		$this->curl = \curl_init();
		$this->postFields = array();
		$this->config = array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_USERAGENT => "NWRP Registration",
				CURLOPT_FAILONERROR => true,
				CURLOPT_POST => (!empty($postFields)),
		);
		if( is_array($postFields)){
			$this->postFields = array_merge($this->postFields, $postFields);
		}
		if( is_array($config)){
			$this->config = array_merge($this->config, $config);
		}
	}

	function addPostData( $var, $val )
	{
		$this->postFields[$var] = $val;
	}

	function addConfig( $var, $val )
	{
		$this->config[$var] = $val;
	}

	function curlRequest()
	{
		if( !$this->curl ){
			$this->curl = \curl_init($this->url);
		}

		$this->config[CURLOPT_URL] = $this->url;

		if(!empty($this->postFields)){
			$this->config[CURLOPT_POSTFIELDS] = $this->postFields;
			//$this->config[CURLOPT_HTTPHEADER][] = 'Content-length:'.strlen(implode('',$this->postFields));
		}

		\curl_setopt_array(
			$this->curl,
			$this->config
		);

		$resp = \curl_exec( $this->curl );

		if( !$resp ){
			throw new \Exception( 'Error: "' . \curl_error($this->curl) . '" - Code: ' . \curl_errno($this->curl) );
		}

		\curl_close( $this->curl );

		return $resp;
	}
}