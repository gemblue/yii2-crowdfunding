<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-6 offset-md-3">

        <div class="login-form mt-5 mb-5">

            <h3><?= Html::encode($this->title) ?></h3>

            <p>Please fill out the following fields to login:</p>

            <?php $form = ActiveForm::begin();?>

            <?php echo Yii::$app->session->getFlash('message');?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
            
            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div>{input} {label}</div>\n<div>{error}</div>",
            ]) ?>
            
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            
            <?php ActiveForm::end(); ?>
            
            <div style="color:#999;">
                Belum punya akun? silahkan <a href="<?php echo Url::base();?>/user/register">daftar disini</a>.
            </div>
        </div>
    </div>
</div>