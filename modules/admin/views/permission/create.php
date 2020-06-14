<?php

use yii\helpers\Html;

$this->title = 'Create Permission';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['roles/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles
    ]) ?>

</div>
