<?php
namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use SoapClient;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


	public function actionRules () {
		return $this->render('rules');
	}

	public function actionBonus () {
		return $this->render('bonus');
	}

	public function actionSoap () {
		$wsdl = Yii::$app->params['wsdl'];
		$client = new SoapClient($wsdl, [
			'cache_wsdl' => WSDL_CACHE_NONE,
			'exceptions' => 1,
			'soap_version' => SOAP_1_2,
		]);

		//gifts list
		$result = $client->InvokeMethod([
			'Methodname' => 'MTS_Wargaming_GiftList',
			'MethodParams' => [
				'DictionaryItem' => [
					['Name' => 'sec_code', 'Value' => '1sEVeN_nInE1'],
					['Name' => 'sourceid', 'Value' => '185'],
				],
			],
		]);

		//validation code
//		$result = $client->InvokeMethod([
//			'Methodname' => 'MTS_SendCode',
//			'MethodParams' => [
//				'DictionaryItem' => [
//					['Name' => 'customer', 'Value' => '3752sdfs4719'],
//					['Name' => 'code', 'Value' => 'test'],
//					['Name' => 'sec_code', 'Value' => '1sEVeN_nInE1'],
//					['Name' => 'sourceid', 'Value' => '185'],
//				],
//			],
//		]);

//		//send gift
//		$result = $client->InvokeMethod([
//			'Methodname' => 'MTS_CreateOrder',
//			'MethodParams' => [
//				'DictionaryItem' => [
//					['Name' => 'ident', 'Value' => '375111111111'],
//					['Name' => 'product', 'Value' => '200'],
//					['Name' => 'action', 'Value' => '1'],
//					['Name' => 'sec_code', 'Value' => '1sEVeN_nInE1'],
//					['Name' => 'source_id', 'Value' => '185'],
//					['Name' => 'add_param', 'Value' => 'MSISDN=375293278146;GIFT_ID=1026'],
//				],
//			],
//		]);
//
//
//
		var_dump($result); die;
	}
}
