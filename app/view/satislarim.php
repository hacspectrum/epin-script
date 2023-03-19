<?php
  require view("static/header");
?>

<div class="jumbotron bg-light rounded-0 text-white text-center mb-0 urun-bg">
  <h1 class="display-3">Satışlarım</h1>
  <p class="lead text-primary"><i class="icon ion-arrow-swap"></i> Geçmiş ve beklemede olan tüm satış talepleriniz</p>
</div>
<div class="bg-dark py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center text-white">
        <h5 class="display-4">
          <?=DB::getVar("SELECT vgbakiye FROM uyeler WHERE id = '" . session("uye_id") . "'")?> VG
        </h5>
        <span class="text-primary">Vizyon Game Satış Bakiyeniz</span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-white mt-4">
      <?php
        if( count($satislarim) > 0 ){
      ?>
      <table class="table table-hover table-responsive table-striped table-bordered siparislerTablosu">
        <thead>
          <tr>
            <th scope="col" class="bg-secondary">Ürün</th>
            <th scope="col" class="bg-secondary text-center">Adet</th>
            <th scope="col" class="bg-secondary text-center">Alınacak Tutar</th>
            <th scope="col" class="bg-secondary text-center">Tarih</th>
            <th scope="col" class="bg-secondary text-center">Durum</th>
            <th scope="col" width="20%" class="bg-secondary text-center">Sebep <small>(Onaylanmamışsa)</small></th>
          </tr>
        </thead>
        <tbody>
      <?php
        foreach($satislarim as $siparis):
          $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . $siparis->urun_id . "'");
      ?>
          <tr>
            <td width="30%">
            <?php
              if(isset($urun->id)){
            ?>
              <a href="<?=site_url('urun/' . $urun->seourl)?>">
                <?=$urun->urun_adi?>
              </a>
            <?php
              }else{
                echo '<a href="javascript:;" class="btn-link disabled">Eski Ürün <small>(Ürün değiştirilmiş veya kaldırılmış)</small></a>';
              }
            ?>
            </td>
            <td class="text-center">
              <?=$siparis->adet?> Adet
            </td>
            <td class="text-center">
              <div class="text-success font-weight-bold">
                <?=$siparis->verilecek_tutar?> ₺
              </div>
            </td>
            <td class="text-center"><?=date("d.m.Y H:i",strtotime($siparis->created_at))?></td>
            <td class="text-center">
              <?php
                switch($siparis->durum){
                  case 0:
                    echo '<div class="badge badge-warning badge-pill">
                      <i class="icon ion-clock"></i> İnceleniyor
                    </div>';
                  break;
                  case 1:
                    echo '<div class="badge badge-success badge-pill">
                      <i class="icon ion-checkmark"></i> Teslim Alındı
                    </div>';
                  break;
                  case 2:
                    echo '<span class="badge badge-danger badge-pill">
                      <i class="icon ion-close"></i> İptal Oldu
                    </span>';
                  break;
                }
              ?>
            </td>
            <td class="text-center">
              <?php
                if($siparis->durum == 2){
                  echo '<span class="text-white">
                    <strong></strong> ' . $siparis->yorum . '
                  </span>';
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
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="alert alert-dark text-center">Hiç satış talebiniz bulunmuyor.</div>
          </div>
        </div>
      <?php
        }
      ?>
      </div>
    </div>
  </div>
</div>

<div class="bg-dark py-3">
  <hr class="border border-light border-top-0">
</div>

<?php
  require view("static/footer");
?>
