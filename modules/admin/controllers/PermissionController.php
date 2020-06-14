<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Roles;
use app\models\RolesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class PermissionController extends Controller
{
    /**
     * Creates a new permission.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Roles();
        $roles = $model->find()->where(['type' => 1])->all();
        
        if ($request = Yii::$app->request->post())
        {
            // Find role object
            $auth = Yii::$app->authManager;
            
            // Create permission
            $permission = $auth->createPermission($request['permission']);
            $permission->description = $request['description'];
            $auth->add($permission);

            // Connect permission to role.
            $role = Roles::findOne($request['role']);
            $auth->addChild($role, $permission);

            return $this->redirect(['roles/index']);
        }

        return $this->render('create', [
            'model' => $model,
            'roles' => $roles
        ]);
    }

    /**
     * Updates an existing permission.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Roles::findOne($id);

        if ($request = Yii::$app->request->post())
        {
            $model->name = $request['Roles']['name'];
            $model->description = $request['Roles']['description'];
            
            $model->save();
            
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
}