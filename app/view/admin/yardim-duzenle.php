<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Yardım Başlığı Düzenleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <?php
        echo isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null;
      ?>
      <form action="" method="post">

        <div class="form-group">
          <input type="text" class="form-control" name="baslik" placeholder="Başlık" value="<?=$yardim->baslik?>">
        </div>

        <div class="form-group">
          <textarea name="yazi" rows="10" class="form-control" placeholder="Yazı"><?=$yardim->yazi?></textarea>
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
