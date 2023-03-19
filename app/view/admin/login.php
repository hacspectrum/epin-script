<?php
  require view("admin/static/header");
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <?php
        if( isset($response) ){
          echo '<div class="alert alert-' . $response["class"] . '">' . $response["message"] . '</div>';
        }
      ?>
      <form action="" method="post">
        <div class="form-group bg-secondary py-3 rounded">
          <img src="<?=asset_url('images/logo.png')?>" alt="Vizyon Game" class="mx-auto d-block">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="email" placeholder="E-Posta Adresi">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Şifre">
        </div>
        <div class="form-group mb-0">
          <button type="submit" class="btn btn-primary btn-block" name="login" value="1">Giriş Yap</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
