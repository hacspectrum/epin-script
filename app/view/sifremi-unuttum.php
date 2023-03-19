<?php
  require view("static/header");
?>

<div class="jumbotron rounded-0 text-white mb-0 primary-gradient shadow">
  <div class="container">
    <h2 class="text-center"><i class="icon ion-locked"></i> <br>Şifremi Unuttum</h2>
  </div>
</div>
<div class="py-2">

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto bg-white shadow-sm my-4 py-4">
                <?=isset($response) ? '<div class="alert alert-' . $response["class"] . '">' . $response["message"] . '</div>' : null?>
                <p>
                  Butona bastığınız anda şifreniz değiştirilecek ve yeni şifreniz e-posta adresinize gönderilecektir.
                </p>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-Posta Adresi" name="email">
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" name="sifremiHatirlat" value="ok" class="btn-secondary btn btn-block">Şifremi Sıfırla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
  require view("static/footer");
?>
