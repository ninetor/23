<?php
/**
 * Created by PhpStorm.
 * User: karpovi4
 * Date: 16.02.16
 * Time: 15:18
 */

namespace frontend\components;


use yii\base\Component;
use DateTime;

class Date extends Component {

	public static $months = [
		1 => 'Января', 2 => 'Февраля',
		3 => 'Марта', 	4 => 'Апреля', 5 => 'Мая',
		6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
		9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября',
		12 => 'Декабря'
	];

	public static function DateMonth($timestamp) {
		$time = (new DateTime)->createFromFormat('Y-m-d H:i:s',$timestamp);
		$monthIndex = $time->format('n');
		$day = $time->format('d');
		return $day.' '.mb_strtolower(self::$months[$monthIndex], 'UTF-8');
	}
}