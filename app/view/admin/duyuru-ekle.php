<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Duyuru Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <?php
        echo isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null;
      ?>
      <form action="" method="post">

        <div class="form-group">
          <input type="text" class="form-control form-control-lg" name="duyuru_metni" placeholder="Duyuru Metni">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Duyuruyu Ekle</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
