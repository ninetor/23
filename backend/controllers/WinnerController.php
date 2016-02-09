<?php

namespace backend\controllers;

use Yii;
use common\models\Participant;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WinnerController implements the CRUD actions for Participant model.
 */
class WinnerController extends Controller
{
    public function behaviors()
    {
	    return [
		    'access' => [
			    'class' => AccessControl::className(),
			    'rules' => [
				    [
					    'actions' => ['index'],
					    'allow' => true,
					    'roles' => ['@'],
				    ],
			    ],
		    ],
		    'verbs' => [
			    'class' => VerbFilter::className(),
			    'actions' => [
				    'logout' => ['post'],
				    'delete' => ['post'],
			    ],
		    ],
	    ];
    }

    /**
     * Lists all Participant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Participant::find()->where(['winner' => 1]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Finds the Participant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Participant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Participant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
