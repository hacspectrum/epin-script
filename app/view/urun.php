<?php
  require view("static/header");
?>

<div class="container mt-4 primary-gradient">
    <div class="row">
        <div class="p-0 col-lg-12">
            <div class="mb-0 bg-transparent jumbotron position-relative py-4">
                <div class="d-md-none d-block">
                  <img src="<?=image_url("kategori/" . $kategori->gorsel)?>" height="100" class="mx-auto mb-4 d-block" alt="">
                </div>
                <h1 class="text-white h4"><?=$urun->urun_adi?></h1>
                <div class="badge badge-success shadow">Ürün Fiyatı: <?=fiyat(session('uye_id'),$urun->fiyat, $kategori->id)?> ₺</div>
                <div class="cat-image d-none d-md-block" style="background-image:url('<?=image_url("kategori/" . $kategori->gorsel)?>')"><div class="cat-image-p"></div></div>
            </div>
        </div>
    </div>
</div>
<div class="container bg-primary shadow d-none d-md-block">
    <nav class="shadow-sm bg-primary d-inline-block pb-0" aria-label="breadcrumb">
        <ol class="mb-0 bg-transparent breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-light">Anasayfa</a></li>
            <li class="breadcrumb-item"><a href="<?=site_url("tum-urunler")?>" class="text-light">Tüm Ürünler</a></li>
            <li class="breadcrumb-item"><a href="<?=site_url("kategori/" . permalink($kategori->kategori_adi) . "/" . $kategori->id)?>" class="text-light"><?=$kategori->kategori_adi?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$urun->urun_adi?></li>
        </ol>
    </nav>
</div>

<div class="mb-5">
  <div class="container bg-white shadow p-3">
  <?php
    if(!defined("LOGGED_IN")){
  ?>
    <div class="alert alert-danger mb-0">Satın almak için üye girişi yapmanız gerekmektedir.</div>
  <?php
    }else{
  ?>
  <div class="row">
      <div class="col-md-6 mx-auto">
        <?php
        if(defined("LOGGED_IN")):
        ?>
        <form action="javascript:void(0)" method="post" id="urunForm">
          <input type="hidden" name="urun" value="1">
          <input type="hidden" name="urunNo" value="<?=$urun->id?>">
          <div class="modal-content border-0 shadow mb-3 rounded-0">
            <div class="modal-header primary-gradient">
              <h6 class="modal-title">
                <i class="icon ion-bag text-secondary"></i>&nbsp; <?=$urun->urun_adi?>
              </h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div id="urunResponseArea"></div>

                  <div id="hiderArea">
                    <div class="form-group">
                      <div class="input-group mb-2 mb-sm-0">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Adet</span>
                        </div>
                        <input type="number" name="adet" id="InputAdet" class="form-control" value="1" placeholder="1" step="1" min="1" required>
                      </div>
                      <p id="urunToplamTutar" data-birimfiyat="<?=fiyat(session('uye_id'), $urun->fiyat, $kategori->id)?>" class="help-block"></p>
                    </div>

                    <div class="form-group">
                      <label>
                        <small class="font-weight-bold">Sipariş Notu</small>
                      </label>
                      <textarea name="musteri_aciklama" id="InputAciklama" rows="4" placeholder="Sipariş Notu (Karakter Adı, Üyelik Bilgileri ve benzeri...)" class="form-control"></textarea>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" id="siparisBtn">
                <i class="icon ion-ios-cart"></i>
                Devam Et
              </button>
            </div>
          </div>
        </form>
        <?php
        endif;
        ?>
      </div>
    </div>
  <?php
    }
  ?>
    <div class="row">
      <div class="col-md-12">
        <div id="information"><?=$urun->makale?></div>
      </div>
    </div>
  </div>
</div>
<?php
  require view("static/footer");
?>
