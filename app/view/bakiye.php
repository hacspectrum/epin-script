<?php
	require view("static/header");
?>

<?php
	if(session("login")){
?>
<!-- Ödeme Bildirimi Modal -->
<div class="modal fade" id="odemeBildirimiModal" tabindex="-1" role="dialog" aria-labelledby="odemeBildirimiModal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <form action="" method="post" id="odemeBildirimiForm">
			<input type="hidden" name="odemeBildirimi" value="1">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="icon ion-chatbox-working"></i> Elden Ödeme Bildirimi
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div id="odemeBildirimiResponseArea"></div>

              <div id="odemeBildirimiHiderArea">

								<div class="form-group">
									<label class="font-weight-bold">Ödeme Tarihi</label>
									<input type="text" id="datepicker" class="form-control" name="odeme_tarihi" placeholder="Ödeme Tarihi">
								</div>

                <div class="form-group">
                  <label class="font-weight-bold">Ödeme Yaptığınız Banka</label>
                  <select name="banka" class="form-control">
                  	<option value="" selected>Seçiniz...</option>
                  <?php
                  	foreach(DB::get("SELECT * FROM bankalar WHERE banka_type = 'normal' && id != '5' order by id DESC") as $banka):
                  ?>
                  	<option value="<?=$banka->id?>"><?=$banka->banka_adi?></option>
                  <?php
                  	endforeach;
                  ?>
                  </select>
                </div>

                <div id="digerBankaBilgileri" style="display:none;">
                	<div class="form-group">
                		<input type="text" readonly name="adsoyad" class="form-control">
                	</div>
                	<div class="form-group">
                		<input type="text" readonly name="iban" class="form-control">
                	</div>
                	<div class="form-group">
                		<input type="text" readonly name="hesapno" class="form-control">
                	</div>
                	<div class="form-group">
                		<input type="text" readonly name="subeno" class="form-control">
                	</div>
                </div>

								<div class="form-group">
									<label class="font-weight-bold">Ödeme Yapan Kişi</label>
									<input type="text" class="form-control" name="odeme_yapan_kisi" placeholder="Ödeme Yapan Kişi Adı Soyadı">
								</div>

                <div class="form-group mb-0">
                  <input type="number" class="form-control" step="0.5" min="5" name="miktar" placeholder="Yatırılan Miktar (TL)">
                </div>


              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-block" name="odemeBildirimi" value="1" id="odemeBildirimiBtn">
          	<i class="icon ion-checkmark-circled"></i>
          	Bildirimde Bulun
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
		if(DB::getVar("SELECT vgbakiye FROM uyeler WHERE id = '" . session("uye_id") . "'") > 0){
?>
<!-- Çekim Bildirimi Modal -->
<div class="modal fade" id="cekimBildirimiModal" tabindex="-1" role="dialog" aria-labelledby="cekimBildirimiModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="post" id="cekimBildirimiForm">
			<input type="hidden" name="cekimBildirimi" value="1">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="icon ion-arrow-return-left"></i> Çekim Bildirimi
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div id="cekimBildirimiResponseArea"></div>

              <div id="cekimBildirimiHiderArea">

                <h2>Banka Bilgileriniz</h2>
								<div class="form-group">
									<label class="font-weight-bold">Banka Adı</label>
									<input type="text" name="banka_adi" class="form-control" placeholder="Banka Adı">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Adınız Soyadınız</label>
									<input type="text" name="adsoyad" class="form-control" placeholder="Adınız Soyadınız">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">IBAN Numarası</label>
									<input type="text" name="iban" class="form-control" placeholder="IBAN Numarası">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Hesap Numarası</label>
									<input type="number" min="0" name="hesapno" class="form-control" placeholder="Hesap Numarası">
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Şube Numarası</label>
									<input type="number" min="0" name="subeno" class="form-control" class="Şube Numarası" placeholder="Şube Numarası">
								</div>
                <div class="form-group mb-0">
									<label class="font-weight-bold">Çekmek İstediğiniz Tutar</label>
                  <input type="number" class="form-control" step="0.5" min="10" name="miktar" placeholder="Çekeceğiniz Tutar (TL)">
                </div>


              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-block" name="cekimBildirimi" value="1" id="cekimBildirimiBtn">
          	<i class="icon ion-checkmark-circled"></i>
          	Bildirimde Bulun
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
		}
	}
?>

<div class="jumbotron primary-gradient text-center rounded-0 mb-0 shadow" style="background-size:cover;background-position:center;background-image:url('<?=asset_url("img/pubg1.jpg")?>')">
  <h1 class="display-3">Ödeme Yöntemleri</h1>
<?php
	if(defined("LOGGED_IN")):
?>
  <p class="text-secondary"><strong>Mevcut Bakiyeniz: </strong> <?=number_format(DB::getVar("SELECT bakiye FROM uyeler WHERE id = '" . session("uye_id") . "'"), 2, '.', '.')?>TL</p>
<?php
	endif;
?>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
			<div class="col-md-3">
				<div class="nav flex-column secondary-gradient nav-pills" role="tablist" aria-orientation="vertical">
					<a class="nav-link active rounded-0" data-toggle="pill" href="#hesapBilgileri" role="tab">
						<i class="ion ion-grid"></i> Hesap Bilgileri
					</a>
					<a class="nav-link rounded-0" data-toggle="pill" href="#krediKarti" role="tab">
						<i class="ion ion-card"></i> Kredi Kartı ile Ödeme
					</a>
				</div>
			</div>
      <div class="col-md-9">

				<div class="row">

					<div class="col-md-12">

						<?php
							if( isset($responsePhoneUpdate) ):
								echo '<div class="alert alert-' . $responsePhoneUpdate['class'] . '">' . $responsePhoneUpdate['message'] . '</div>';
								if($responsePhoneUpdate['class'] == 'success'):
									header("Refresh:3;url=" . site_url('bakiye'));
								endif;
							endif;
						?>

						<?php
							if( isset($_GET["payment_status"]) ):
								if( get("payment_status") == 0 ){
									echo '<div class="alert alert-danger">GPAY tarafından yapılan ödeme kabul edilmedi!</div>';
								}else if( get("payment_status") == 1 ){
									echo '<div class="alert alert-success">Bakiyeniz eklendi!</div>';
								}
								header("Refresh:3;url=" . site_url("bakiye"));
							endif;
						?>

						<div class="tab-content" id="bakiyeTab">
						  <div class="tab-pane fade show active" id="hesapBilgileri" role="tabpanel" aria-labelledby="hesapBilgileri">
								<?php
						      if(count($paytr_bankalar) > 0){
						    ?>
						    <div class="row">

						      <?php
						        foreach($paytr_bankalar as $bank):
						      ?>
						      <div class="col-md-4">
						        <div class="card shadow-sm mb-3">
						          <div class="bg-white">
						            <img src="<?=PUBLIC_IMAGE . '/banka/' . $bank->banka_gorsel?>" alt="<?=$bank->banka_adi?>" class="img-fluid d-block mx-auto">
						          </div>
						          <div class="card-header bg-secondary border-secondary font-weight-bold font-size-dot8rem text-white"><?=$bank->banka_adi?></div>
						          <div class="card-body">
						            <p class="card-text">
						              <small>
						                <strong>Adı Soyadı: </strong><?=$bank->adsoyad?> <br>
						                <strong>Hesap Numarası: </strong><?=$bank->hesapno?> <br>
						                <strong>Banka Şube No: </strong><?=$bank->subeno?> <br>
						                <strong>IBAN: </strong><?=$bank->iban?> <br>
						              </small>
						            </p>
						          </div>
											<div class="card-footer">
												<a href="<?=site_url("odeme-yontemleri/havale-eft")?>" class="btn btn-block btn-primary">Ödeme Bildir</a>
											</div>
						        </div>
						      </div>
						      <?php
						        endforeach;
						      ?>

								

						    </div>
						    <?php
						      }else{
						    ?>
						    <div class="row">
						    	<div class="col-md-6 mx-auto mt-3">
						    		<div class="alert alert-dark">Hiç banka hesabı yok.</div>
						    	</div>
						    </div>
						    <?php
						      }
						    ?>
						  </div>
						  <div class="tab-pane fade" id="krediKarti" role="tabpanel" aria-labelledby="krediKarti">
								<?php
									require view("odeme-yontemleri/kredi-karti");
								?>
						  </div>
						</div>

					</div>

				</div>

      </div>
    </div>


  </div>
</div>

<?php
	require view("static/footer");
?>
