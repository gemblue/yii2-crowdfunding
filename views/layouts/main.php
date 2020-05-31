<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
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

            <ul>
                <li><a href="#"><i class="las la-home"></i>&nbsp;&nbsp;Dashboard</a></li>
                <li><a href="#"><i class="lar la-user"></i>&nbsp;&nbsp;Users</a></li>
                <li><a href="#"><i class="las la-user-tag"></i>&nbsp;&nbsp;Roles</a></li>
                <li><a href="#"><i class="lab la-gratipay"></i>&nbsp;&nbsp;Campaign</a></li>
                <li><a href="#"><i class="las la-tag"></i>&nbsp;&nbsp;Label</a></li>
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
