<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'target_amount')->textInput(['type' => 'number']) ?>
    
    <div class="form-group field-campaign-target_amount">
        <label class="control-label" for="campaign-target_amount">Labels</label>
        
        <?php
        $default = null;
        $total = count($model['labels']);

        for ($i=0; $i<$total; $i++) {
            $default .= $model['labels'][$i]->label->label_name . ', ';
        }

        $default = rtrim($default, ', ');
        ?>

        <?= HTML::textInput('labels', $default, ['class' => 'form-control']) ?>
        <div class="help-block">Write multiple label with comma separated. Ex : Earth, Sea, Humanity</div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>

<script>
var input = document.querySelector('input[name=labels]');

var tagify = new Tagify(input);
</script>