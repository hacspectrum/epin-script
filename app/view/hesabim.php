<?php 
    require view("static/header");
?>

<div class="container">

    <div class="row">

        <div class="col-lg-6 col-md-6 mx-auto col-12">
            <div class="shadow-sm bg-white my-3 p-3">
                <h1 class="h3"> <i class="ion ion-person"></i> Hesabım <small>(<?=session("adsoyad")?>)</small></h1>
                <hr>
                <form action="" method="post">
                    <?=isset($response) ? '<div class="alert alert-' . $response["class"] . '">' . $response["message"] . '</div>' : null?>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Adı Soyadı</small></label>
                        <input class="form-control" placeholder="Adı Soyadı" name="adsoyad" value="<?=$hesap->adsoyad?>" type="text" minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>E-Posta Adresi</small></label>
                        <input class="form-control" disabled placeholder="E-Posta Adresi" value="<?=$hesap->email?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Mevcut Şifre</small></label>
                        <input class="form-control" name="m_password" placeholder="Mevcut Şifre" required type="password" minlength="6" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Yeni Şifre</small></label>
                        <input class="form-control" name="y_password" placeholder="Yeni Şifre" type="password" minlength="6" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Yeni Şifre Tekrar</small></label>
                        <input class="form-control" name="y_password_r" placeholder="Yeni Şifre Tekrar" type="password" minlength="6" maxlength="10">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary btn-block" name="hesabimGuncelle" value="1" type="submit">Bilgileri Güncelle</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<?php
    require view("static/footer");
?>