<?php
  require view("admin/static/header");
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Banka Hesabı Ekleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?=isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <input type="file" class="form-control" name="banka_gorsel">
        </div>

        <div class="form-group">
          <input type="text" class="form-control-lg form-control" name="banka_adi" placeholder="Banka Adı">
        </div>

        <div class="form-group">
          <select name="type" class="form-control">
            <option value="normal" selected>Normal (Elden Ödeme)</option>
            <option value="paytr">Paytr (PAYTR API)</option>
          </select>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="adsoyad" placeholder="Ad Soyad">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="iban" placeholder="IBAN (TR ile)">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="hesapno" placeholder="Hesap No">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="subeno" placeholder="Şube No">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Ekle</button>
        </div>

      </form>
    </div>
  </div>
</div>
<?php
  require view("admin/static/footer");
?>
