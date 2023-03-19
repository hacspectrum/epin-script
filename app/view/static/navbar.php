<div class="topMenu">
  <div class="container">
    <nav class="shadow-sm py-2">
      <div class="row topRow d-block d-md-flex d-sm-block">
        <div class="mr-md-auto mr-sm-0 d-md-inline-block d-sm-block text-md-left text-center">
          <a href="<?=site_url()?>" id="logo">
            <img src="<?=asset_url("img/logo.png")?>" alt="ChipDede.Com">
          </a>
        </div>
        <div class="ml-sm-0 ml-md-auto mx-2 d-md-inline-block d-sm-block">
          <a href="javascript:;" id="mobileMenuAnchor" class="d-md-none d-sm-block btn btn-outline-light mt-3 btn-block"><i class="ion ion-navicon-round"></i> Ana Menü</a>
          <div id="mainMenu">
            <a href="<?=site_url()?>" class="menu-element d-block d-md-inline-block"><i class="ion ion-home"></i> Anasayfa</a>
            <a href="<?=site_url("tum-urunler")?>" class="menu-element d-md-inline-block"><i class="ion ion-ios-list"></i> Ürünler</a>
            <a href="<?=site_url("odeme-yontemleri")?>" class="menu-element d-md-inline-block"><i class="ion ion-card"></i> Ödeme Yöntemleri</a>
            <a href="<?=site_url("siparislerim")?>" class="menu-element d-md-inline-block"><i class="ion ion-ios-cart"></i> Sipariş Takibi</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="shadow-sm py-md-2 secondary-gradient py-3">
  <div class="container">
    <div class="row d-md-flex d-sm-block">
      <div class="mr-md-auto ml-md-0 mx-auto">
        <div class="duuru">
          <div class="duuru-icon">
              <i class="ion ion-speakerphone text-white"></i>
          </div>
          <div class="duuru-text">
              <ul class="newsticker">
              <?php
                foreach(DB::get("SELECT * FROM duyurular order by id DESC") as $notf):
              ?>
                <li><?=$notf->duyuru?></li>
              <?php
                endforeach;
              ?>
              </ul>
          </div>
        </div>
      </div>
      <div class="ml-md-auto mr-md-0 mx-auto">
        <?php
          if(!defined("LOGGED_IN")){
        ?>
        <div class="btn-group">
          <a href="<?=site_url("uye-ol")?>" class="btn btn-sm px-3 btn-outline-light">
            <i class="ion ion-person-add"></i>
            Üye Ol
          </a>
          <a href="javascript:;" class="btn btn-sm px-3 btn-light" data-target="#loginModal" data-toggle="modal">
            <i class="ion ion-log-in"></i> Üye Girişi
          </a>
        </div>
        <div class="fade modal" id="loginModal" aria-hidden="true" aria-labelledby="exampleModalLabel" role="dialog" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
              <div class="primary-gradient modal-header">
                <h5 class="modal-title"><i class="ion ion-log-in"></i> Üye Girişi</h5>
                <button class="close" type="button" aria-label="Kapat" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="login" id="x_loginModalForm" method="post">
                <input type="hidden" name="login" value="true">
                <div class="modal-body">

                    <div id="loginResponseArea"></div>
                  
                    <div class="form-group">
                      <input class="form-control icon-ion" name="email" placeholder="&#xf3a0; E-Posta Adresi" required type="text">
                    </div>
                    <div class="form-group mb-0">
                      <input class="form-control icon-ion" name="password" placeholder="&#xf458; Şifre" required type="password">
                    </div>
                    <div class="form-group mb-0 text-center">
                      <a href="<?=site_url("sifremi-unuttum")?>"><small>Şifrenizi mi unuttunuz?</small></a>
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="submit" x-toggle="loginButton">Giriş Yap <i class="ion ion-arrow-right-c"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php
          }else{
            // üye girişi yapılmış
        ?>
          <div class="btn-group">
            <a href="<?=site_url("odeme-yontemleri")?>" class="btn btn-outline-light font-weight-bold">₺ <?=DB::getVar("SELECT bakiye FROM uyeler WHERE id = '" . session("uye_id") . "'")?></a>
            <a href="<?=site_url("siparislerim")?>" class="btn btn-light"><i class="ion ion-bag"></i> Siparişlerim</a>
            <a href="<?=site_url("hesabim")?>" class="btn btn-light"><i class="ion ion-person"></i> Hesabım</a>
          </div>
          <a href="<?=site_url("cikis-yap")?>" class="btn btn-light"><i class="ion ion-log-out"></i> Çıkış Yap</a>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>