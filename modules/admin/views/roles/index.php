<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Permission', ['permission/create'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Setup Role Permission', ['permission/setup'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
            [
                'label' => 'Type',
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($searchModel) {
                    
                    $type = null;

                    if ($searchModel->type == 1) {
                        $type = 'Role';
                    } else {
                        $type = 'Permission';
                    }
                    
                    return $type;
                },
            ],
            'description',
            [
                'label' => 'Created',
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => function ($searchModel) {
                    return date('Y-m-d H:i:s', strtotime($searchModel->created_at));
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
