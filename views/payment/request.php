<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="row">
    <div class="col-md-6 offset-md-3">

        <div class="payment-form mt-5 mb-5">

            <h3><?php echo $campaign->title?></h3>
            
            <img src="<?php echo $campaign->image?>" class="img-fluid mb-3 mt-3" style="width:100%;" alt="">
            
            <?php $form = ActiveForm::begin(); ?>

            <div class="form-group">
                <label for="">Berapa jumlah yang ingin kamu donasikan?</label>
                <input type="text" id="amount" name="amount" class="form-control" />
            </div>
            
            <div class="form-group">
                <label for="">Pilih metode pembayaran</label>
                <select name="source" class="form-control">
                    <option value="">Piih jalur pembayaran ..</option>
                    <?php foreach ($banks as $bank) :?>
                        <option value="<?php echo $bank['id']?>"><?php echo $bank['bank_name']?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group text-right">
                <?= Html::submitButton('Lanjutkan <i class="las la-angle-double-right"></i>', ['class' => 'btn btn-danger']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js"></script>

<script>
new AutoNumeric('#amount', {
    caretPositionOnFocus: "start",
    currencySymbol: "Rp ",
    unformatOnSubmit: true
});
</script>