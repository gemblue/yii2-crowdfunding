<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="users-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label for="">Permission</label>
        <input type="text" name="permission" class="form-control" placeholder="Ex : createUser" />
    </div>
    
    <div class="form-group">
        <label for="">Description</label>
        <input type="text" name="description" class="form-control" placeholder="Ex : Create a user" />
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
