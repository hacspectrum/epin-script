<?php
  require view("static/header");
?>

<div class="jumbotron bg-light rounded-0 text-white text-center mb-0 hakkimizda-bg">
  <h1 class="display-3">Western Union</h1>
  <p class="lead text-success"><strong>Mevcut Bakiyeniz: </strong> <?=DB::getVar("SELECT bakiye FROM uyeler WHERE id = '" . session("uye_id") . "'")?>TL</p>
</div>
<div class="bg-dark py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto text-white">

				<div class="row">

					<div class="col-md-12">

          <div class="row">
            <div class="col-md-6 mx-auto">
              <?=isset($response) ? '<div class="alert alert-' . $response["class"] . '">' . $response["message"] . '</div>' : null?>
            </div>
          </div>
          <form action="<?=site_url('bakiye/western-union')?>" method="post">
            <input type="hidden" name="westernUnion" value="1">

            <div id="creditCardHiderArea">
              <div class="row">
                <div class="col-md-7 mx-auto text-center">
                  <div class="alert alert-warning p-1">
                    <strong>Western Union</strong> hesap bilgilerini lütfen canlı destek hattımızdan alınız.
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mx-auto">
                  <div class="form-group">
  									<label class="font-weight-bold">Ödeme Yapan Kişi</label>
  									<input type="text" class="form-control" name="odeme_yapan_kisi" placeholder="Ödeme Yapan Kişi Adı Soyadı">
  								</div>
                  <div class="form-group">
  									<label class="font-weight-bold">MTCN</label>
  									<input type="text" class="form-control" name="mtcn" placeholder="Makbuz Numarası">
  								</div>
  								<div class="form-group">
  									<label class="font-weight-bold">Ödeme Tarihi</label>
  									<input type="text" id="datepicker" class="form-control" name="odeme_tarihi" placeholder="Ödeme Tarihi">
  								</div>
                  <div class="form-group">
                    <input type="number" class="form-control" step="0.5" min="5" name="miktar" placeholder="Yatırılan Miktar (TL)">
                  </div>
                  <div class="form-group mb-0">
                    <button type="submit" name="westernUnion" value="1" class="btn btn-block btn-success">
                      <i class="icon ion-checkmark"></i> Western Union Ödeme Bildirimini Gerçekleştir
                    </button>
                  </div>
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
<div class="bg-dark py-3">
  <hr class="border border-light border-top-0">
</div>

<?php
  require view("static/footer");
?>
