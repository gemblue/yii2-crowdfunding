<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Donatur',
                'attribute' => 'user_id',
                'value' => 'user.name',
            ],
            [
                'label' => 'Campaign',
                'attribute' => 'campaign_id',
                'value' => 'campaign.title',
            ],
            [
                'label' => 'Total',
                'attribute' => 'amount',
                'value' => function ($searchModel) {
                    return number_format($searchModel->amount);
                },
            ],
            'source',
            [
                'label' => 'Status',
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($searchModel) {
                    
                    if ($searchModel->status == 'pending') 
                        $color = 'danger';
                    else
                        $color = 'success';
                    
                    return "<span class=\"label label-{$color}\">{$searchModel->status}</span>";
                },
            ],
            [
                'label' => 'Issued at',
                'attribute' => 'created_at',
                'value' => 'created_at'
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
