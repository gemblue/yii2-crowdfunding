<?php

use yii\helpers\Url;
use yii\widgets\DetailView;
?>

<div class="row">
    <div class="col-md-6 offset-md-3">

        <div class="payment-form mt-5 mb-5">

            <h3>Satu langkah lagi</h3>
            
            <div class="mt-3">
                <?php echo Yii::$app->session->getFlash('message');?>
            </div>
            
            <p class="mt-4">Detail data pembayaran :</p>

            <table class="table table-striped table-bordered">
                <tr>
                    <th>Bank</th>
                    <td><?php echo $model->bank->bank_name?></td>
                </tr>
                <tr>
                    <th>Rekening</th>
                    <td><?php echo $model->bank->account_number?></td>
                </tr>
                <tr>
                    <th>Cabang</th>
                    <td><?php echo $model->bank->branch?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td><?php echo 'Rp ' . number_format($model->amount)?></td>
                </tr>
            </table>

            <p>Semoga Tuhan membalas semua kebaikan mu, dan mengembalikan rezeki berkali-kali lipat.</p>
            
            <div>
                <a href="#" class="btn btn-success">Konfirmasi Pembayaran</a>
            </div>

            <div class="mt-4">
                <a href="<?php echo Url::home();?>"><i class="las la-angle-double-left"></i> Kembali ke halaman utama</a>
            </div>
            
        </div>
    </div>
</div>