<?php

use yii\helpers\Url;
?>

<div class="row">
    <div class="col-md-6 offset-md-3">

        <div class="payment-form mt-5 mb-5">

            <h3>Terimakasih!</h3>
            
            <?php echo Yii::$app->session->getFlash('message');?>
            
            <p>Semoga Tuhan membalas semua kebaikan mu, dan mengembalikan rezeki berkali-kali lipat.</p>
            
            <div class="mt-3">
                <a href="<?php echo Url::home();?>"><i class="las la-angle-double-left"></i> Kembali ke halaman utama</a>
            </div>
            
        </div>
    </div>
</div>