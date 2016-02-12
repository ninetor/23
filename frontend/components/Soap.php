<?php

namespace frontend\components;

use Yii;
use SoapClient;

class Soap extends SoapClient {

	public $base_config = [
		['Name' => 'sec_code', 'Value' => '1sEVeN_nInE1'],
	];
	private $_soap_config = [
		'cache_wsdl' => WSDL_CACHE_NONE,
		'exceptions' => 1,
		'soap_version' => SOAP_1_2,
	];
	private $_wsdl;
	private $_soap_client;

	/**
	 * Soap constructor.
	 */
	public function __construct() {
		$this->connect();
	}

	private function connect() {
		$this->_wsdl = Yii::$app->params['wsdl'];
		$this->_soap_client = new SoapClient($this->_wsdl, $this->_soap_config);
	}

	/**
	 * @param $method
	 * @param array $config
	 * @return mixed
	 */
	public function sendRequest($method, $config = []) {
		$response = $this->_soap_client->InvokeMethod([
			'Methodname' => $method,
			'MethodParams' => [
				'DictionaryItem' => array_merge($this->base_config, $config),
			],
		]);

		return $response->InvokeMethodResult->DictionaryItem;
	}
}