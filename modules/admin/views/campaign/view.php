<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Campaign */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="campaign-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            [                                                  
                'label' => 'Creator',
                'value' => 'Diki',            
            ],
            'content:ntext',
            [                                                  
                'label' => 'Target',
                'value' => number_format($model->target_amount),            
            ],
            [                                                  
                'label' => 'Created',
                'value' => $model->created_at,            
            ],
            [                                                  
                'label' => 'Updated',
                'value' => $model->updated_at,            
            ]
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
