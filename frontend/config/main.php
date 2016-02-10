<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
	    'assetManager' => [
		    'bundles' => [
			    'yii\bootstrap\BootstrapAsset' => [
				    'css' => []
			    ],
		    ],
	    ],
	    'errorHandler' => [
		    'errorAction' => 'site/error',
	    ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
	    'request' => [
		    'baseUrl' => '',
	    ],
	    'soap' => [
		    'class' => 'frontend\components\Soap',
	    ],
	    'urlManager' => [
		    'class' => 'yii\web\UrlManager',
		    'enablePrettyUrl' => true,
		    'showScriptName' => false,
//		    'enableStrictParsing' => true,
		    'rules' => require_once('routes.php'),
	    ],
	    'user' => [
		    'identityClass' => 'common\models\User',
		    'enableAutoLogin' => true,
	    ],
    ],
    'params' => $params,
];
