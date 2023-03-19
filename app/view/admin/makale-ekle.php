<?php
  require view("admin/static/header");
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Makale Ekleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?=isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label class="font-weight-bold">Makale Görseli</label>
          <input type="file" class="form-control" name="gorsel">
        </div>

        <div class="form-group">
          <input type="text" class="form-control-lg form-control" name="baslik" placeholder="Başlık">
        </div>

        <div class="form-group">
          <textarea name="yazi" rows="10" class="form-control"></textarea>
          <script>
            CKEDITOR.replace('yazi');
          </script>
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
