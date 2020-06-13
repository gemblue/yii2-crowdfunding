<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="https://blackrockdigital.github.io/startbootstrap-small-business/css/small-business.css" rel="stylesheet">

</head>

<?php $this->beginBody() ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo Url::home();?>">CrowdFunding</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo Url::home();?>">Home
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo Url::base();?>/site/about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo Url::base();?>/site/donate">Cara Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo Url::base();?>/site/contact">Kontak</a>
                    </li>
                    
                    <?php if (Yii::$app->user->isGuest) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo Url::base();?>/user/login">Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo Url::base();?>/user/logout"># Hai <?= \Yii::$app->user->identity->name ?>, Logout</a>
                        </li>
                    <?php endif;?>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <?= $content ?>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; 2020 <br/> Free ❤️ CrowdFunding Platform by <?php echo HTML::a('Gemblue', 'https://github.com/gemblue')?></p>
        </div>
        <!-- /.container -->
    </footer>
    
</body>
</html>