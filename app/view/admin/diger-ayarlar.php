<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-4 mb-4">
      <h2>Diğer Ayarlar</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">

      <?php
        if( isset($response) ):
          echo '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>';
        endif;
      ?>

      <form action="" method="post">

        <div class="form-group">
          <label class="font-weight-bold">Script Kodları (Analytics, Canlı Destek ve benzeri)</label>
          <textarea name="EKSTRA_SCRIPT" rows="10" class="form-control"><?=$diger_ayarlar->EKSTRA_SCRIPT?></textarea>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">PAYTR <small>API KEY</small></label>
          <input type="text" class="form-control" name="PAYTR_MERCHANT_ID" placeholder="PAYTR API KEY" value="<?=$diger_ayarlar->PAYTR_MERCHANT_ID?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">PAYTR <small>MERCHANT KEY</small></label>
          <input type="text" class="form-control" name="PAYTR_MERCHANT_KEY" placeholder="PAYTR MERCHANT KEY" value="<?=$diger_ayarlar->PAYTR_MERCHANT_KEY?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">PAYTR <small>MERCHANT SALT</small></label>
          <input type="text" class="form-control" name="PAYTR_MERCHANT_SALT" placeholder="PAYTR MERCHANT SALT" value="<?=$diger_ayarlar->PAYTR_MERCHANT_SALT?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">MAIL ADRES</label>
          <input type="text" class="form-control" name="MAIL_ADRES" placeholder="MAIL ADRES" value="<?=$diger_ayarlar->MAIL_ADRES?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">MAIL SIFRE</label>
          <input type="text" class="form-control" name="MAIL_SIFRE" placeholder="MAIL SIFRE" value="<?=$diger_ayarlar->MAIL_SIFRE?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">BAYII İNDİRİMİ</label>
          <input type="number" class="form-control" name="BAYII_INDIRIMI" placeholder="BAYİİ İNDİRİMİ" value="<?=$diger_ayarlar->BAYII_INDIRIMI?>">
        </div>

        <div class="form-group mb-0">
          <button type="submit" class="btn btn-success btn-block">
            <i class="icon ion-checkmark-circled"></i>
            Kaydet
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
