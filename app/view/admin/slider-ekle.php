<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Slide Ekleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <?=isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <input type="file" class="form-control" name="slideImage">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block" name="insertSlide" value="1">Ekle</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
