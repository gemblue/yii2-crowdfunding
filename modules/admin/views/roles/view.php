<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

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

    <div class="mt-4 mb-4"><b>Permissions : </b></div>

    <?php $form = ActiveForm::begin(); ?>
        
        <div class="row">
            <div class="col-md-6">
                <?php $i=1; foreach($allPermissions as $allPermission) :?>
                    <div class="form-check">
                        <input type="checkbox" name="roles[<?php echo $allPermission['name']?>]" class="form-check-input" value="<?php echo $allPermission['name']?>" <?php echo (in_array($allPermission['name'], $permissions)) ? 'checked' : '';?>>
                        <label class="form-check-label" for="exampleCheck1"><?php echo $allPermission['name'];?></label>
                        <small id="emailHelp" class="form-text text-muted"><?php echo $allPermission['description']?></small>
                    </div>

                    <?php if (($i % 6) == 0) :?>
                        </div><div class="col-md-6">
                    <?php endif;?>
                    
                <?php $i++; endforeach;?>
            </div>
        </div>
        
        <div class="form-group mt-4">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>