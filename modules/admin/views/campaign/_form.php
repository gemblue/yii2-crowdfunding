<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'target_amount')->textInput(['type' => 'number']) ?>
    
    <div class="form-group field-campaign-target_amount">
        <label class="control-label" for="campaign-target_amount">Labels</label>
        <?= HTML::textInput('labels', null, ['class' => 'form-control']) ?>
        <div class="help-block">Write multiple label with comma separated. Ex : Earth, Sea, Humanity</div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
