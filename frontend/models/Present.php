<?php

namespace frontend\models;

class Present {

	public static $presents = [
		1164 => ['name' => '50 игрового золота', 'price' => 200],
		1165 => ['name' => '100 игрового золота', 'price' => 350],
		1166 => ['name' => '250 игрового золота', 'price' => 800],
		1168 => ['name' => '1 день премиум-аккаунта', 'price' => 800],
		1026 => ['name' => 'Инвайт-код (для новых игроков):', 'price' => 100, 'description' => '<br />премиум танк T-127 + 3 дня<br />премиум-аккаунта'],
	];

	public static function getPresentsList () {
		return self::$presents;
	}
}