<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2017/11/20
 * Time: 18:00:36
 */

namespace frontend\controllers;

use common\models\LoginFrontForm;
use common\models\PcComment;
use common\models\PcInfoList;
use common\models\PcTravel;
use common\models\TravelSearch;
use common\utils\ArrayHelper;
use frontend\models\SignupFrontForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class HomeController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],*/
            /*'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'login', 'signup'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['index','about','logout','contact','single','create','save-comment'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    /*public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }*/

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['name' => '错误页面','message' => $exception]);
        }
    }

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        /*$searchModel = new TravelSearch();
        $dataQuery = $searchModel->search(Yii::$app->request->queryParams)->query;
        $travels = $dataQuery->orderBy(['create_time' => SORT_DESC])->all();
        return $this->render('index', ['data' => $travels]);*/
        return $this->renderPartial('index');
    }

    public function actionPublish()
    {
        return $this->renderPartial('publish');
    }

    public function actionMy()
    {
        return $this->renderPartial('user-center');
    }

    public function actionGetList()
    {
        $list = PcInfoList::find()->asArray()->all();
        $data['status'] = true;
        $data['list'] = $list;
        return $this->asJson($data);
    }

    public function actionSavePinChe()
    {

    }
}