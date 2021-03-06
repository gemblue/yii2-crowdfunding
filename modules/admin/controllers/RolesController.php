<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Roles;
use app\models\RolesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class RolesController extends Controller
{
    /**
     * Lists all Roles.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 1);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single role.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $permissions = [];

        // Submitted
        if ($request = Yii::$app->request->post())
        {
            // Revoke permission by role
            (new Query)->createCommand()->delete('auth_item_child', ['parent' => $id])->execute();
            
            // Connect permission to role.
            foreach ($request['roles'] as $key => $value) {
                
                $role = Roles::findOne($id);
                $permission = Roles::findOne($value);
                
                $auth = Yii::$app->authManager;
                $auth->addChild($role, $permission);
            }
        }

        // Take permission by role.
        $results = (new Query)->select(['name'])
                                        ->from('auth_item_child')
                                        ->join('JOIN', 'auth_item', 'auth_item.name = auth_item_child.child')
                                        ->where(['parent' => $id])
                                        ->all();
        
        $allPermissions = (new Query)->select(['name', 'description'])
                                              ->from('auth_item')
                                              ->where(['type' => 2])
                                              ->all();

        foreach ($results as $result) {
            $permissions[] = $result['name'];
        }

        return $this->render('view', [
            'model' => Roles::findOne($id),
            'permissions' => $permissions,
            'allPermissions' => $allPermissions
        ]);
    }

    /**
     * Creates a new role.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Roles();
        
        if ($request = Yii::$app->request->post())
        {
            $auth = Yii::$app->authManager;
            $role = $auth->createRole(strtolower($request['Roles']['name']));
            $auth->add($role);
            
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing role.
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

    /**
     * Deletes an existing role.
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
}