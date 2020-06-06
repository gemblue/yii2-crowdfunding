<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Payment;
use app\models\Campaign;

class PaymentController extends Controller
{
    /**
     * Payment request.
     *
     * @return Response
     */
    public function actionRequest()
    {   
        $request = Yii::$app->request->get();
        $campaign = Campaign::findOne($request['campaign']);
        
        if ($post = Yii::$app->request->post()) {

            $payment = new Payment;
            $payment->user_id = 1;
            $payment->campaign_id = $request['campaign'];
            $payment->status = 'pending';
            $payment->amount = $post['amount'];
            $payment->source = $post['source'];
            
            if ($payment->save()) {
                Yii::$app->session->setFlash('message', '<div class="alert alert-success">Terimakasih atas donasi kamu. Semoga berkah!</div>');
                $this->redirect('finish');
            }
        }

        return $this->render('request', [
            'campaign' => $campaign
        ]);
    }
    
    /**
     * Payment finish.
     *
     * @return Response
     */
    public function actionFinish()
    {   
        return $this->render('finish');
    }
}