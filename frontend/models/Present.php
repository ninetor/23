<?php

namespace frontend\models;

use frontend\components\Soap;
use SimpleXMLElement;

class Present {

	const REQUEST_METHOD = 'MTS_Wargaming_GiftList';
	const SOURCEID = 185;

	public $presents = [
		1164 => ['name' => '50 игрового золота', 'price' => 200],
		1165 => ['name' => '100 игрового золота', 'price' => 350],
		1166 => ['name' => '250 игрового золота', 'price' => 800],
		1168 => ['name' => '1 день премиум-аккаунта', 'price' => 800],
		1026 => ['name' => 'Инвайт-код (для новых игроков):', 'price' => 100, 'description' => '<br />премиум танк T-127 + 3 дня<br />премиум-аккаунта'],
	];

	/**
	 * @return array
	 */
	public function getPresentsList() {
		return $this->_getActualPresents();
	}


	/**
	 * @return array
	 */
	private function _getActualPresents() {
		$response = (new Soap)->sendRequest(self::REQUEST_METHOD, [
			['Name' => 'sourceid', 'Value' => self::SOURCEID]
		]);

		return $this->_processPresentsResponse($response);
	}

	/**
	 * @param $response
	 * @return array
	 */
	private function _processPresentsResponse($response) {
		$sXML = new SimpleXMLElement($response->Value);
		$presents = [];

		foreach($sXML->Gift as $gift) {
			$new_key = intval(trim($gift->Gift_ID));
			if(array_key_exists($new_key, $this->presents))
				$presents[$new_key] = $this->presents[$new_key];
		}
		return $presents;
	}
}