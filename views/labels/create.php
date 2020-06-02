<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Labels */

$this->title = 'Create Labels';
$this->params['breadcrumbs'][] = ['label' => 'Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
