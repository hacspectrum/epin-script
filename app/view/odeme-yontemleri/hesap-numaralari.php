<?php
  require view("static/header");
?>

<div class="jumbotron bg-light rounded-0 text-white text-center mb-0 hakkimizda-bg">
  <h1 class="display-3">Hesap Numaraları</h1>
  <p class="lead text-success"><strong>Mevcut Bakiyeniz: </strong> <?=DB::getVar("SELECT bakiye FROM uyeler WHERE id = '" . session("uye_id") . "'")?>TL</p>
</div>
<div class="bg-dark py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mx-auto text-white">

			<?php
        if(count($paytr_bankalar) > 0){
      ?>
      <div class="row">

        <?php
          foreach($paytr_bankalar as $bank):
        ?>
        <div class="col-md-4">
          <div class="card text-white border-secondary bg-dark mb-3">
            <div class="bg-white">
              <img src="<?=PUBLIC_IMAGE . '/banka/' . $bank->banka_gorsel?>" alt="<?=$bank->banka_adi?>" class="img-fluid d-block mx-auto">
            </div>
            <div class="card-header bg-primary border-secondary font-weight-bold"><?=$bank->banka_adi?></div>
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
          </div>
        </div>
        <?php
          endforeach;
        ?>

      </div>
      <?php
        }else{
      ?>
      <div class="alert alert-warning">Hiç banka hesabı yok.</div>
      <?php
        }
      ?>

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
