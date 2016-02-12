<?php
namespace frontend\controllers;

use common\models\Activity;
use frontend\models\gift\Step1;
use frontend\models\Present;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use SoapClient;

/**
 * Site controller
 */
class SiteController extends Controller
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
		$presents = Present::getPresentsList();
	    $activity = Activity::find()->orderBy('RAND()')->one();

        return $this->render('index', [
	        'presents' => $presents,
	        'activity' => $activity,
        ]);
    }


	public function actionSoap () {
		$wsdl = Yii::getAlias('@frontend').'/'.Yii::$app->params['wsdl'];
		$client = new SoapClient($wsdl, [
			'cache_wsdl' => WSDL_CACHE_NONE,
			'exceptions' => 1,
			'soap_version' => SOAP_1_2,
		]);
		$result = $client->InvokeMethod([
			'Methodname' => 'MTS_Wargaming_GiftList',
			'MethodParams' => [
				1026 => [
					['name' => 'sec_code', 'Value' => ''],
					['name' => 'sourceid', 'Value' => ''],
				],
//				'sourceid' => '...',
//				['name' => 'sec_code', 'Value' => ''],
//				['name' => 'sourceid', 'Value' => ''],
			],
		]);
		echo json_encode($result);die;
	}
}
