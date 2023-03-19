<?php
  require view("static/header");
?>
    <div class="container mt-3 primary-gradient">
        <div class="row">
            <div class="p-0 col-12">
                <div class="mb-0 bg-transparent jumbotron position-relative py-4">
                    <div class="d-md-none d-block">
                      <img src="<?=image_url("kategori/" . $kategori->gorsel)?>" height="100" class="mx-auto mb-4 d-block" alt="">
                    </div>
                    <h1 class="text-white h2"><?=$kategori->kategori_adi?></h1>
                    <div class="cat-image d-none d-md-block" style="background-image:url('<?=image_url("kategori/" . $kategori->gorsel)?>')"><div class="cat-image-p"></div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-primary d-none d-md-block">
        <nav class="shadow-sm bg-primary d-inline-block pb-0" aria-label="breadcrumb">
            <ol class="mb-0 bg-transparent breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="<?=site_url("tum-urunler")?>" class="text-light">Tüm Ürünler</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$kategori->kategori_adi?></li>
            </ol>
        </nav>
    </div>

  <div class="container">
    <div class="row">
        <div class="shadow-sm bg-white col-lg-12 col-md-12 p-0">
          <?php
            if(count($urunler)>0){
          ?>
          <table class="m-0 table table-hover">
                <thead>
                    <tr>
                        <th class="border-top-0" scope="col">ÜRÜN ADI</th>
                        <th class="border-top-0 text-center" scope="col">ÜRÜN TİPİ</th>
                        <th class="text-center border-top-0" scope="col">STOK</th>
                        <th class="text-center border-top-0" scope="col">BİRİM FİYATI</th>
                        <th class="border-top-0" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  foreach($urunler as $urun):
                ?>
                  <tr>
                    <td width="40%">
                      <?=$urun->urun_adi?>
                    </td>
                    <td class="text-center" width="10%">
                      <?php
                        switch($urun->api_type){
                          default:
                            echo '<div class="badge badge-light">Normal</div>';
                          break;
                          case 1:
                            echo '<div class="badge badge-dark">Game Card</div>';
                          break;
                        }
                      ?>
                    </td>
                    <td class="text-center" width="15%">
                    <?php
                      if($urun->stok == 1){
                        echo '<i class="ion ion-checkmark-circled text-success"></i> <small>Mümkün</small>';
                      }else{
                        echo '<i class="ion ion-close-circled text-danger"></i> <small>Tükendi</small>';
                      }
                    ?>
                    </td>
                    <td class="text-center" width="15%">
                      <div class="badge badge-success"><?=fiyat(session('uye_id'), $urun->fiyat, $kategori->id)?> ₺</div>
                    </td>
                    <td class="text-center" width="20%">
                      <?php
                        if($urun->stok == 1){
                      ?>
                      <a href="<?=site_url('urun/' . $urun->seourl . '/' . $urun->id)?>" class="text-uppercase btn btn-block btn-secondary">
                        <i class="icon ion-ios-cart"></i> Satın Al
                      </a>
                      <?php
                        }else{
                      ?>
                      <button disabled class="btn btn-light btn-block">
                        <i class="icon ion-ios-close"></i> Tükendi
                      </a>
                      <?php
                        }
                      ?>
                    </td>

                  </tr>
                <?php
                  endforeach;
                ?>
                </tbody>
            </table>
          <?php
            }else{
          ?>
            <div class="alert alert-light m-4">
              <strong><i class="ion ion-information-circled"></i></strong> Bu kategoride hiç ürün bulunmuyor.
            </div>
          <?php
            }
          ?>
        </div>
    </div>
  </div>

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="h5"><?=$kategori->kategori_adi?> Ürünleri</h1>
        <small><?=$kategori->aciklama?></small>
      </div>
    </div>
  </div>

<?php
  require view("static/footer");
?>
