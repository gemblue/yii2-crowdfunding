<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Campaign', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'label' => 'Creator',
                'value' => 'user.name',
            ],
            'title',
            [
                'label' => 'Content',
                'attribute' => 'content',
                'value' => function ($searchModel) {
                    return StringHelper::truncate($searchModel->content, 100, ' ...');
                },
            ],
            [
                'label' => 'Target',
                'value' => function ($searchModel) {
                    return number_format($searchModel->target_amount);
                },
            ],
            [
                'label' => 'Labels',
                'format' => 'raw',
                'value' => function ($searchModel) {
                    $results = null;
                    foreach ($searchModel->labels as $label) {
                        $results .= "<span class=\"label label-info\">{$label->label->label_name}</span>&nbsp;";
                    }
                    return $results;
                },
            ],
            [
                'label' => 'Created',
                'value' => 'created_at',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
