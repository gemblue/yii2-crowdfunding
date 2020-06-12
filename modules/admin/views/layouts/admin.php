<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<div class="row no-pad">
    <div class="col-md-2">
        <div id="sidebar">
            <h3>CrowdFunding</h3>
            <div class="link"><a href="<?php echo Url::home();?>" target="_blank"><i class="las la-globe"></i>&nbsp;&nbsp;Open Site</a></div>
            
            <ul>
                <li><a href="<?php echo Url::base();?>/admin/dashboard"><i class="las la-home"></i>&nbsp;&nbsp;Dashboard</a></li>
                <li><a href="<?php echo Url::base();?>/admin/campaign"><i class="lab la-gratipay"></i>&nbsp;&nbsp;Campaign</a></li>
                <li><a href="<?php echo Url::base();?>/admin/users"><i class="lar la-user"></i>&nbsp;&nbsp;Users</a></li>
                <li><a href="#"><i class="las la-user-tag"></i>&nbsp;&nbsp;Roles</a></li>
                <li><a href="<?php echo Url::base();?>/admin/payment"><i class="las la-comment-dollar"></i>&nbsp;&nbsp;Payment</a></li>
                <li><a href="<?php echo Url::base();?>/admin/labels"><i class="las la-tag"></i>&nbsp;&nbsp;Labels</a></li>

                <?php if (!Yii::$app->user->isGuest) : ?>
                    <li><a href="<?php echo Url::base();?>/user/logout"><i class="las la-times"></i>&nbsp;&nbsp;Logout</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div id="content">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

        <footer>
            <?= Yii::powered() ?>
        </footer>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>