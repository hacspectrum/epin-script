<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Kod Ekleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?php
        echo isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null;
      ?>
      <form action="" method="post">

        <div class="form-group">
            <label>Ürün</label>
            <input type="text" class="form-control" disabled value="<?=$urun->urun_adi?>">
        </div>

        <div class="form-group">
          <textarea name="kodlar" rows="12" class="form-control" placeholder="Kodlar"></textarea>
          <p class="help-block">
            <small class="text-danger">Kodları satır satır giriniz.</small>
          </p>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block" name="kod_ekle" value="ok">Kaydet</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
