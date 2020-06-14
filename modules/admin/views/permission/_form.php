<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="users-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label for="">Role</label>
        <select name="role" id="" class="form-control">
            <option value="">Choose ..</option>
            <?php foreach ($roles as $role) :?>
                <option value="<?php echo $role['name']?>"><?php echo $role['name']?></option>
            <?php endforeach;?>
        </select>
    </div>

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
