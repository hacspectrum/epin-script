  <?php
    $sliders = DB::get("SELECT * FROM slider order by id DESC");
    if(count($sliders)>0):
  ?>
  <div class="shadow-sm container mt-3">
    <div class="row">
      <div class="swiper-container" id="homeSlider">
        <div class="swiper-wrapper">
        <?php
          foreach($sliders as $sl):
        ?>
          <div class="swiper-slide" style="background-image:url('<?=image_url("slider/" . $sl->gorsel)?>')"></div>
        <?php
          endforeach;
        ?>
        </div>
        <!-- Add Arrows -->
        <div class="shadow-sm swiper-button-next"><i class="ion ion-chevron-right"></i></div>
        <div class="shadow-sm swiper-button-prev"><i class="ion ion-chevron-left"></i></div>
      </div>
    </div>
  </div>
  <?php
    endif;
  ?>
  <?php 
    $anasayfa_kategoriler = DB::get("SELECT * FROM chip_kategoriler WHERE anasayfa_gorunumu = '1' order by siralama DESC");
    if(count($anasayfa_kategoriler)>0){
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="shadow-sm col-md-12 primary-gradient">
        <h1 class="text-center text-uppercase h4 pb-1 pt-2 text-white">
            <i class="ion ion-star text-secondary"></i> <?=DB::getVar("SELECT anasayfa_kategori_listeleme_basligi FROM genel_ayarlar WHERE id = '1'")?>
        </h1>
      </div>
    </div>
    <div class="row homePopularProducts">
    <?php
      foreach($anasayfa_kategoriler as $ak):
    ?>
      
      <div class="col-md-3 mt-1">
        <div class="shadow-sm bg-white homePopularProduct pb-1">
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
    }
  ?>

  <div class="container">
    <div class="row">
      <div class="container mb-3">
        <div class="row">
          <div class="col-lg-4 col-md-4 pl-md-0">
            <div class="shadow-sm bg-white border-0 card my-3">
              <div class="card-body position-relative">
                <div class="fast-amount-card"></div>
                <h5 class="card-title">Hızlı Teslimat</h5>
                <p class="font-size-dot8rem card-text mr-4">Türkiye'nin en hızlı aktarımı bizde! Alışverişleriniz en geç 30 dakika içerisinde teslim edilmektedir.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="shadow-sm bg-white border-0 card my-3">
              <div class="card-body position-relative">
                <div class="protection-card"></div>
                <h5 class="card-title">Güvenli Alışveriş</h5>
                <p class="mr-3 card-text font-size-dot8rem">Şifrelenmiş ödeme ekranı ile güvenle alışverişlerinizi tamamlayabilirsiniz.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 pr-md-0">
            <div class="shadow-sm bg-white border-0 card my-3">
              <div class="card-body position-relative">
                <div class="help-card"></div>
                <h5 class="card-title">7/24 Canlı Destek</h5>
                <p class="mr-3 card-text font-size-dot8rem">Bir sorun mu var? Hemen yardımcı olalım. <br> Destek ekibimiz siz değerli müşterilerimizle.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>