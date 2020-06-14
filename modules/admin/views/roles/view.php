<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="roles-view">

    <h1>Manage Role : <?= Html::encode($this->title) ?></h1>
    
    <div class="mt-4"><b>Role : </b></div>
    
    <table class="table table-bordered mt-2">
        <tr><th>Name</th><td><?php echo $model->name?></td></tr>
        <tr><th>Registered</th><td><?php echo Yii::$app->formatter->format($model->created_at, 'date');?></td></tr>
    </table>

    <div class="mt-4"><b>Permission : </b></div>

    <table class="table table-bordered mt-2">
        <tr><th>Name</th><th>Description</th></tr>

        <?php foreach($permissions as $permission) :?>
            <tr><td><?php echo $permission['name'];?></td><td><?php echo $permission['description']?></td></tr>
        <?php endforeach;?>

        <tr><td>Test</td><td>Test</td></tr>
    </table>

    <div class="mt-4">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
</div>