<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use app\models\Payment;
use app\models\Campaign;
use app\models\Bank;

class PaymentController extends Controller
{
    /**
     * Define behaviour
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function () {
                    Yii::$app->session->setFlash('message', '<div class="alert alert-danger">Untuk melakukan donasi harap login terlebih dahulu.</div>');
                    
                    return Yii::$app->response->redirect(['user/login']);
                },
            ],
        ];
    }

    /**
     * Payment request.
     *
     * @return Response
     */
    public function actionRequest()
    {   
        $request = Yii::$app->request->get();
        $campaign = Campaign::findOne($request['campaign']);
        $banks = Bank::find()->all();

        if ($post = Yii::$app->request->post()) {
            
            $payment = new Payment;
            $payment->user_id = Yii::$app->user->identity->id;
            $payment->campaign_id = $request['campaign'];
            $payment->status = 'pending';
            $payment->amount = $post['amount'];
            $payment->source = $post['source'];
            
            if ($payment->save()) {
                Yii::$app->session->setFlash('message', '<div class="alert alert-warning">Terimakasih atas bantuannya, silahkan transfer dengan detail berikut ini</div>');
                $this->redirect(['finish', 'id' => $payment->id]);
            }
        }

        return $this->render('request', [
            'campaign' => $campaign,
            'banks' => $banks
        ]);
    }
    
    /**
     * Payment finish.
     *
     * @return Response
     */
    public function actionFinish($id)
    {   
        $model = Payment::findOne($id);

        return $this->render('finish', [
            'model' => $model
        ]);
    }
}