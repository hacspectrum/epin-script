<?php
  require view("admin/static/header");
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Banka Hesabı Düzenleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?=isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label class="font-weight-bold">Mevcut Resim</label>
          <img src="<?=PUBLIC_IMAGE . '/banka/' . $banka->banka_gorsel?>" alt="<?=$banka->banka_adi?>" width="400">
        </div>

        <div class="form-group">
          <input type="file" class="form-control" name="banka_gorsel">
        </div>

        <div class="form-group">
          <input type="text" class="form-control-lg form-control" name="banka_adi" placeholder="Banka Adı" value="<?=$banka->banka_adi?>">
        </div>

        <div class="form-group">
          <select name="type" class="form-control">
            <option value="normal" <?=$banka->banka_type == 'normal' ? 'selected' : null?>>Normal (Elden Ödeme)</option>
            <option value="paytr" <?=$banka->banka_type == 'paytr' ? 'selected' : null?>>Paytr (PAYTR API)</option>
          </select>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="adsoyad" placeholder="Ad Soyad" value="<?=$banka->adsoyad?>">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="iban" placeholder="IBAN (TR ile)" value="<?=$banka->iban?>">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="hesapno" placeholder="Hesap No" value="<?=$banka->hesapno?>">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="subeno" placeholder="Şube No" value="<?=$banka->subeno?>">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Güncelle</button>
        </div>

      </form>
    </div>
  </div>
</div>
<?php
  require view("admin/static/footer");
?>
