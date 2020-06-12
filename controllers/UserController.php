<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;

class UserController extends Controller
{
    /**
     * Define behaviours
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Users();
        
        if ($post = Yii::$app->request->post())
        {
            $identity = $model->find()->where([
                'username' => $post['Users']['username']
            ])->one();

            if (!$identity) {
                Yii::$app->session->setFlash('message', '<div class="alert alert-danger">Username tidak terdaftar.</div>');
            
                return $this->redirect('login');
            }
            
            if (Yii::$app->getSecurity()->validatePassword($post['Users']['password'], $identity['password'])) {

                Yii::$app->user->login($identity);
                
                return $this->goBack();
            } 
            
            Yii::$app->session->setFlash('message', '<div class="alert alert-danger">Password salah.</div>');
            
            return $this->redirect('login');
        }
        
        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}