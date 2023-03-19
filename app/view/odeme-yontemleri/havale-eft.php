<?php
  require view("static/header");
?>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto">

				<div class="row">

					<div class="col-md-8 mx-auto bg-white shadow-sm">

          <h1 class="h4 mt-3">Havale/EFT Bildirimi</h1>
          <hr>

          <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
          <iframe src="https://www.paytr.com" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;display:none;margin-bottom:20px;"></iframe>
          <script>iFrameResize({},'#paytriframe');</script>

          <div id="HavaleEftResponseArea"></div>

          <form action="javascript:;" method="post" id="havaleEftForm">

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                <?php
                  $paytr_bankalar = [
                    'isbank' => 'İŞ BANKASI',
                    'akbank' => 'AKBANK',
                    'denizbank' => 'DENİZBANK',
                    'finansbank' => 'FİNANSBANK',
                    'halkbank' => 'HALKBANK',
                    'ptt' => 'PTT',
                    'teb' => 'TEB',
                    'vakifbank' => 'VAKIFBANK',
                    'yapikredi' => 'YAPI KREDİ',
                    'ziraat' => 'ZİRAAT BANKASI',
                    'kuveytturk' => 'KUVEYT TURK'
                  ];
                 ?>
                  <label class="font-weight-bold"><small>Ödeme Yaptığınız Banka</small></label>
                  <select name="banka" class="form-control" required="required">
                    <option value="" selected>Seçiniz...</option>
                  <?php
                    foreach($paytr_bankalar as $key => $val):
                  ?>
                    <option value="<?=$key?>"><?=$val?></option>
                  <?php
                    endforeach;
                  ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="font-weight-bold"><small>Ödemeyi Gönderen Ad, Soyad</small></label>
                  <input type="text" name="adsoyad" class="form-control" placeholder="Adınız Soyadınız" required="required">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="font-weight-bold"><small>TC Kimlik Numarasının Son 5 Hanesi</small></label>
                  <input type="number" name="tcno" class="form-control" placeholder="TC No (Son 5 Hane)" required="required">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="font-weight-bold"><small>Cep Telefonu Numaranız</small></label>
                  <input type="text" name="telefon" class="form-control phone-mask" placeholder="Cep Telefon Numaranız" required="required">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="font-weight-bold"><small>Ödeme Yaptığınız Tutar</small></label>
                  <input type="number" id="havaleEftTutar" name="tutar" class="form-control" placeholder="Ödeme Tutarı" step="0.1" min="0" required="required">
                </div>
              </div>
            </div>

            <input type="hidden" class="d-none" value="1" name="havaleEftSubmit">

            <div class="row">
              <div class="col-md-12">
                <div class="form-group text-right">
                  <button type="submit" id="havaleEftSubmitButton" class="btn btn-success" name="havaleEftSubmit" value="1">
                    PAYTR ile Ödeme İşlemine Devam Et
                  </button>
                </div>
              </div>
            </div>

          </form>


					</div>

				</div>

      </div>
    </div>


  </div>
</div>

<?php
  require view("static/footer");
?>
