<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="row">
    <div class="col-md-6 offset-md-3">

        <div class="mt-5 mb-5">

            <h3><?= Html::encode($this->title) ?></h3>
            
            <div class="alert alert-danger mt-4">
                <?= nl2br(Html::encode($message)) ?>
            </div>

        </div>
    </div>
</div>