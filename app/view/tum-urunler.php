<?php
    require view("static/header");
?>

<div class="jumbotron jumbotron-fluid mb-3 py-5 primary-gradient" style="background-size:cover;background-position:center;background-image:url('<?=asset_url("img/pubg2.jpg")?>')">
    <div class="text-center container">
        <nav class="bg-transparent d-inline-block" aria-label="breadcrumb">
            <ol class="bg-transparent breadcrumb text-white">
                <li class="breadcrumb-item"><a href="<?=site_url()?>" class="text-white">Anasayfa</a></li>
                <li class="breadcrumb-item active text-secondary" aria-current="page">Tüm Ürünler</li>
            </ol>
        </nav>
        <h1 class="display-5">Tüm Ürünler</h1>
    </div>
</div>

<div class="container mb-5">
    <div class="row Products">
<?php
    foreach($tum_urunler as $ak):
?>
        <div class="col-md-3 col-lg-3 col-6 mt-1">
            <div class="shadow-sm bg-white Product pb-1">
                <div class="shadow-sm productImage" style="background-image:url('<?=image_url("kategori/" . $ak->gorsel)?>')"><a href="<?=site_url('kategori/' . permalink($ak->kategori_adi) . '/' . $ak->id)?>"></div>
                <div class="my-3 productName"><?=$ak->kategori_adi?></div>
                <div class="m-2">
                    <a href="<?=site_url('kategori/' . permalink($ak->kategori_adi) . '/' . $ak->id)?>" class="text-uppercase btn btn-block btn-secondary"><i class="ion ion-ios-cart"></i> Satın Al</a>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>
    </div>
  
</div>

<?php
    require view("static/footer");
?>