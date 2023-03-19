<?php
  $do = url(1);
?>
<style>
  body{
    margin-left:200px;
    padding-top:55px;
  }
  #fixedLeftMenu{
    position:fixed;
    left:0;
    top:55px;
    width:200px;
    height:100%;
    min-height:100%;
    z-index:99;
    background-color:#000;
  }
  #fixedLeftMenu a{
    background-color:#000 !important;
    color: rgba(255,255,255,.5);
    font-size: 1rem !important;
    font-weight:bold;
    border-color: #333;
  }
  #fixedLeftMenu a.active{
    background-color:#333 !important;
  }
  #fixedLeftMenu a:hover{
    color:#fff;
  }
</style>
<div id="fixedLeftMenu">
  <div class="rounded-0">
    <div class="list-group rounded-0" style="background-color:#000 !important;">
      <a class="list-group-item rounded-0 list-group-item-action <?=$do == "uyeler" ? 'active' : 'bg-dark'?>" href="<?=site_url('admin/uyeler')?>">Üyeler</a>
      <a class="list-group-item rounded-0 list-group-item-action <?=$do == "urunler" ? 'active' : 'bg-dark'?>" href="<?=site_url('admin/urunler')?>">Ürünler</a>
      <a class="list-group-item rounded-0 list-group-item-action <?=$do == "kategoriler" ? 'active' : 'bg-dark'?>" href="<?=site_url('admin/kategoriler')?>">Ürün Kategorileri</a>
      <a class="list-group-item rounded-0 list-group-item-action <?=$do == "duyurular" ? 'active' : 'bg-dark'?>" href="<?=site_url('admin/duyurular')?>">Duyurular</a>
      <a class="list-group-item rounded-0 list-group-item-action <?=$do == "slider" ? 'active' : 'bg-dark'?>" href="<?=site_url('admin/slider')?>">Slider</a>
      <a class="list-group-item rounded-0 list-group-item-action <?=$do == "ayarlar" ? 'active' : 'bg-dark'?>" href="<?=site_url('admin/ayarlar')?>">Genel Ayarlar</a>
      <a class="list-group-item border-bottom-0 rounded-0 list-group-item-action <?=$do == "diger-ayarlar" ? 'active' : 'bg-dark'?>" href="<?=site_url('admin/diger-ayarlar')?>">Diğer Ayarlar</a>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="background-color:black !important;">
  <div class="container">
    <a class="navbar-brand" href="<?=site_url("admin")?>">
      <!--<img src="<?=asset_url("images/logo.png")?>" class="d-block mx-auto" width="150">-->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?=$do == "index" || $do == null ? 'active' : null?>">
          <a class="nav-link" href="<?=site_url('admin')?>">Anasayfa</a>
        </li>
        <li class="nav-item <?=$do == "siparisler" ? 'active' : null?>">
          <a href="<?=site_url('admin/siparisler')?>" class="nav-link">
            Siparişler
          <?php
            $bekleyenSiparislerCount = DB::getVar("SELECT COUNT(*) FROM siparisler WHERE durum = '0' && api_type != '2'");
            if( $bekleyenSiparislerCount > 0){
          ?>
          <audio autoplay class="d-none">
            <source src="<?=asset_url('sound/notification.mp3')?>" type="audio/mpeg">
          </audio>
          <span class="badge badge-pill badge-warning">
            <?=$bekleyenSiparislerCount?>
          </span>
          <?php
            }
          ?>
          </a>
        </li>
        <li class="nav-item <?=$do == "kredi-karti-odemeleri" ? 'active' : null?>">
          <a class="nav-link" href="<?=site_url('admin/kredi-karti-odemeleri')?>">
            Kredi Kartı Ödemeleri
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Diğer
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item <?=$do == "uyeler" ? 'active' : null?>" href="<?=site_url('admin/uyeler')?>">Üyeler</a>
            <a class="dropdown-item <?=$do == "urunler" ? 'active' : null?>" href="<?=site_url('admin/urunler')?>">Ürünler</a>
            <a class="dropdown-item <?=$do == "kategoriler" ? 'active' : null?>" href="<?=site_url('admin/kategoriler')?>">Ürün Kategorileri</a>
            <a class="dropdown-item <?=$do == "duyurular" ? 'active' : null?>" href="<?=site_url('admin/duyurular')?>">Duyurular</a>
            <a class="dropdown-item <?=$do == "slider" ? 'active' : null?>" href="<?=site_url('admin/slider')?>">Slider</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item <?=$do == "ayarlar" ? 'active' : null?>" href="<?=site_url('admin/ayarlar')?>">Genel Ayarlar</a>
            <a class="dropdown-item <?=$do == "diger-ayarlar" ? 'active' : null?>" href="<?=site_url('admin/diger-ayarlar')?>">Diğer Ayarlar</a>
          </div>
        </li>

      </ul>
      <div class="my-2 my-lg-0">
        <a href="<?=site_url("admin/cikis")?>" class="btn btn-light"><i class="icon ion-log-out"></i></a>
      </div>
    </div>
  </div>
</nav>
