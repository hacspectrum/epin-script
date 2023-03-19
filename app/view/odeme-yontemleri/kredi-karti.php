<?php
  $activePhoneNumberRequire = false;
  if(defined("LOGGED_IN")){
    $phone_number = DB::getVar("SELECT phone_number FROM uyeler WHERE id = '" . session("uye_id") . "'");
    if($phone_number == null or $phone_number == "Yok"){
      $activePhoneNumberRequire = true;
    }
  }

  if($activePhoneNumberRequire == true){
?>
<div class="row mt-2">

  <div class="col-md-12">

    <div class="row">
      <div class="col-md-8 mx-auto">
        <h4 class="text-primary">DOĞRULAMA GEREKLİ!</h4>
        <br>
        <p class="text-center">
          <small>
            Kredi kartı ile ödeme yapabilmeniz için telefon numaranızı girmeniz gerekmektedir.<br> İlgili kart ödemelerinin kontrolünü sağlayan iş ortağımız tarafından <span class="text-primary">zorunlu</span> kılınmıştır.
          </small>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mx-auto">
        <form action="<?=site_url('bakiye?krediKartiPhoneNumberUpdate=1')?>" method="post">
          <div class="form-group">
            <input type="text" name="phone_number" class="form-control" placeholder="Telefon Numarası">
          </div>
          <div class="form-group text-center">
            <button type="submit" name="phone_number_update" class="btn btn-success btn-outline">
              <i class="icon ion-checkmark"></i>
              Telefon Numaramı Kaydet
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>

</div>

<?php
  }else{
?>

<div class="row mt-3">
    <div class="col-md-12 col-lg-12">
      <div class="bg-white shadow-sm p-3">
        <img src="<?=asset_url("img/wallet.png")?>" width="128" style="margin-top:-30px;margin-bottom:10px; " alt="Kredi kartı ile bakiye nasıl yüklenir?" class="d-block mx-auto">
        <h4 class="gradient-text-1">KREDİ KARTI İLE NASIL BAKİYE YÜKLENİR?</h4>
        <br>
        <p class="text-left">
          <small>
            <span class="text-center d-block">
              PAYTR ile %0 Komisyon ile ödeme yapabilirsiniz.<br>
            </span>
            <ul class="list-group">
              <li class="list-group-item">
                Yükleme yapacağınız tutarı seçiniz veya bakiye tutarını girdikten sonra <strong>Devam Et</strong> butonuna tıklayınız.
              </li>
              <li class="list-group-item">
                Açılan Paytr ortak ödeme sayfasındaki kredi kartı bilgilerinizi eksiksiz olarak giriniz.
              </li>
              <li class="list-group-item">
                Sonrasında bankanızın 3D Secure sayfasına yönlendirileceksiniz. Cep telefonunuza gelen <strong>3D Secure Kodunu</strong> giriniz.
              </li>
              <li class="list-group-item">
                İşlem tamamladıktan sonra operator tarafından aranacaksınız. Onay vermeniz gereklidir.
              </li>
              <li class="list-group-item">
                Bakiyeniz otomatik olarak hesabınıza yüklenecektir.
              </li>
            </ul>
          </small>
        </p>
      </div>
    </div>
    <div class="col-md-12 col-lg-12">
    <?php
      if(defined("LOGGED_IN")){
    ?>
      <div class="bg-white shadow p-3">
        <?php
          if( isset($token_url) ){
        ?>
          <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
          <iframe src="<?=$token_url?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
          <script>iFrameResize({},'#paytriframe');</script>
        <?php
          }else{
        ?>
        <form action="javascript:;" method="post" id="creditCardForm">
          <input type="hidden" name="krediKartiYukleme" value="1">

          <div class="alert alert-block alert-info">
            <strong><i class="ion ion-information-circled"></i></strong> Yüklemek istediğiniz miktarı giriniz.
          </div>

          <div id="creditCardResponseArea"></div>

          <div id="creditCardHiderArea">
            <div class="row">
              <div class="col-md-12 mx-auto">
                <div class="form-group row d-none">

                  <div class="col-md-12">
                    <div class="text-center">
                      <label class="custom-control custom-radio d-none">
                        <input name="odeme_turu" id="paytrSecim" type="radio" checked class="custom-control-input" value="paytr">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description font-weight-bold">PayTR ile Ödeme</span>
                      </label>
                    </div>
                  </div>

                </div>

                <div class="form-group d-none">
                  <label class="font-weight-bold">Adres</label>
                  <textarea name="adres" rows="4" class="form-control" placeholder="Adres (Ödeme için zorunludur.)"><?=site_url()?></textarea>
                </div>

                <div class="row">
                  <div class="col-md-6 pr-0">
                    <div class="form-group mb-0">
                      <label class="font-weight-bold float-left">Tutar</label>
                      <input type="number" class="form-control" step="0.5" min="0" name="yuklenecekMiktar" placeholder="Yüklenecek Miktar (TL)" value="5" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-0">
                      <button type="submit" id="krediKartiYuklemeBtn" name="krediKartiYukleme" value="1" class="btn btn-block btn-primary" style="margin-top:32px;">
                        Devam Et <i class="icon ion-arrow-right-c"></i>
                      </button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </form>
        <?php
          }
        ?>
      </div>
    <?php
      }else{
    ?>
      <div class="alert alert-danger mt-3">Bakiye yüklemek için giriş yapmanız gerekmektedir.</div>
    <?php
      }
    ?>
    </div>
</div>
<?php
  }
?>

