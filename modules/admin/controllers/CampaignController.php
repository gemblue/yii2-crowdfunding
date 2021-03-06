<?php

/**
 * Campaign.
 * 
 * Generated by Gii. Modified.
 * 
 * @author Gemblue
 */

namespace app\modules\admin\controllers;

use Yii;
use app\models\Campaign;
use app\models\CampaignSearch;
use app\models\Labels;
use app\models\CampaignLabels;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CampaignController implements the CRUD actions for Campaign model.
 */
class CampaignController extends Controller
{
    /**
     * Define behavior.
     * 
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['indexCampaign'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['viewCampaign'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['createCampaign'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['updateCampaign'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['deleteCampaign'],
                    ],
                ],
                'denyCallback' => function () {
                    throw new \yii\web\HttpException(401, 'You have no privilege to access this page.');
                }
            ],
        ];
    }

    /**
     * Lists all Campaign models.
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampaignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Campaign model.
     * 
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Campaign model.
     * 
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $campaign = new Campaign();
        $campaignLabels = new CampaignLabels();
        
        if ($request = Yii::$app->request->post()) 
        {
            /** 1. Insert master campaign */
            $campaign->user_id = 1;
            $campaign->title = $request['Campaign']['title'];
            $campaign->content = $request['Campaign']['content'];
            $campaign->image = $request['Campaign']['image'];
            $campaign->target_amount = $request['Campaign']['target_amount'];
            
            if ($campaign->save()) {

                /** 2. Connect to label */
                try {
                    $campaignLabels->saveConnect($campaign->id, $request['labels']);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $campaign,
        ]);
    }

    /**
     * Updates an existing Campaign model.
     * 
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $campaign = Campaign::find()->with('labels')->where(['id' => $id])->one();
        $campaignLabels = new CampaignLabels();
        
        if ($request = Yii::$app->request->post()) 
        {
            /** 1. Insert main data */
            $campaign->title = $request['Campaign']['title'];
            $campaign->content = $request['Campaign']['content'];
            $campaign->image = $request['Campaign']['image'];
            $campaign->target_amount = $request['Campaign']['target_amount'];
            
            if ($campaign->save()) {

                /** 2. Connect to label */
                try {
                    $campaignLabels->saveConnect($id, $request['labels']);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $campaign
        ]);
    }

    /**
     * Deletes an existing Campaign model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Campaign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campaign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campaign::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
