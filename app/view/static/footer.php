  <!-- Footer -->
  <footer class="bg-color2 font-small page-footer pt-4 text-white">

    <!-- Footer Links -->
    <div class="text-center text-md-left container">

      <!-- Footer links -->
      <div class="row mt-3 pb-3 text-center text-md-left">

        <!-- Grid column -->
        <div class="col-md-3 mt-2 mx-auto col-lg-3 col-xl-3">
          <h6 class="text-center pb-3 font-weight-bold mb-4 shadow text-uppercase"><?=str_replace(["http://", "https://", "www."], null, url)?></h6>
          <p class="font-size-dot8rem"><?=HAKKIMIZDA_METNI?></p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="mt-2 mx-auto col-lg-2 col-xl-2 col-md-2">
          <h6 class="text-center pb-3 font-weight-bold mb-4 shadow text-uppercase">Ürünler</h6>
        <?php
          foreach(DB::get("SELECT * FROM chip_kategoriler WHERE anasayfa_gorunumu = '1' order by siralama DESC LIMIT 4") as $fck){
        ?>
          <p>
            <a href="<?=site_url('kategori/' . permalink($fck->kategori_adi) . '/' . $ak->id)?>" class="white-link"><?=$fck->kategori_adi?></a>
          </p>
        <?php
          }
        ?>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mt-2 mx-auto col-lg-2 col-xl-2">
          <h6 class="text-center pb-3 font-weight-bold mb-4 shadow text-uppercase">Bağlantılar</h6>
          <p>
            <a href="<?=site_url("hesabim")?>" class="white-link">Hesabım</a>
          </p>
          <p>
            <a href="<?=site_url("siparislerim")?>" class="white-link">Sipariş Takibi</a>
          </p>
        </div>

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mt-2 mx-auto">
          <h6 class="text-center pb-3 font-weight-bold mb-4 shadow text-uppercase">Bize Ulaşın</h6>
          <p>
            <i class="mr-3 ion ion-email"></i> we@<?=str_replace(["http://", "https://", "www."], null, url)?></p>
          <p>
            <i class="mr-3 ion ion-ios-telephone"></i> <?=TELEFON?></p>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Footer links -->

      <hr>

      <!-- Grid row -->
      <div class="row align-items-center d-flex">

        <!-- Grid column -->
        <div class="col-lg-8 col-md-7">

          <!--Copyright-->
          <p class="text-center text-md-left">© <?=date("Y")?> Tüm Hakları Saklıdır.
            <a href="<?=site_url()?>">
              <strong><?php echo str_replace(["http://", "https://", "www."], null, url) ?></strong>
            </a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4 col-md-5 ml-lg-0">

          <!-- Social buttons -->
          <div class="text-center text-md-right">
            <ul class="list-inline list-unstyled">
              <li class="list-inline-item">
                <a href="<?=FACEBOOK_URL?>" class="shadow-sm btn-floating btn-sm footer-social-button mx-1">
                  <i class="ion ion-social-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="<?=INSTAGRAM_URL?>" class="shadow-sm btn-floating btn-sm footer-social-button mx-1">
                  <i class="ion ion-social-instagram"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="<?=TELEFON?>" class="shadow-sm btn-floating btn-sm footer-social-button mx-1">
                  <i class="ion ion-social-whatsapp-outline"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="<?=TWITTER_URL?>" class="shadow-sm btn-floating btn-sm footer-social-button mx-1">
                  <i class="ion ion-social-googleplus"></i>
                </a>
              </li>
            </ul>
          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

  </footer>
  <!-- Footer -->

  <script src="<?=asset_url("js/script.js")?>"></script>
  <script async>var ajax_url = "<?=site_url('ajax')?>", url = "<?=site_url()?>", api_key = "<?=@session("api_key")?>";</script>
<?php
  echo EKSTRA_SCRIPT;
?>
  <!-- Shopier JS -->
  <script src="https://s3.eu-central-1.amazonaws.com/shopier/static/js/gsap.js"></script>
  <script src="https://s3.eu-central-1.amazonaws.com/shopier/framework.js"></script>
</body>
</html>
