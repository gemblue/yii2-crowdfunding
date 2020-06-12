<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;
?>

<!-- Heading Row -->
<div class="row align-items-center my-5">
    <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="https://imgix.kitabisa.com/f4201bda-0ea6-4693-8ed2-2129c179f883.jpg?ar=16:9&w=664" alt="">
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        <h1 class="font-weight-light">Patungan Bangun Sumur Wakaf di Gaza</h1>
        <p>Inna lillahi wa inna ilaihi raji'un. Badan Kesehatan Dunia (WHO) mencatat sekitar 97% air yang mengalir di permukiman warga Gaza sudah tercemar zat-zat berbahaya dan tak layak konsumsi.</p>
        <?php echo HTML::a('<i class="lar la-hand-point-up"></i>&nbsp;&nbsp;Donasi Sekarang', 'payment/request?campaign=1', ['class' => 'btn btn-danger']);?>
    </div>
    <!-- /.col-md-4 -->
</div>
<!-- /.row -->

<!-- Call to Action Well -->
<div class="card text-white bg-secondary my-5 py-4 text-center">
    <div class="card-body">
        <p class="text-white m-0">Lawan Corona: Sembako Untuk Pekerja Harian</p>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <?php foreach($campaigns as $campaign) :?>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $campaign->title;?></h2>
                    <img src="<?php echo $campaign->image?>" class="img-fluid mb-3" alt="">
                    <p class="card-text"><?php echo StringHelper::truncate($campaign->content, 100, ' ...');?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-info btn-sm"><i class="las la-search"></i>&nbsp;&nbsp;Detail</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="lar la-hand-point-up"></i>&nbsp;&nbsp;Donasi</a>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<!-- /.row -->