<?php
  require view("admin/static/header");
?>

<div class="container">
<?php
  if( isset($response) ){
?>
  <div class="row">
    <div class="col-md-12 mt-2">
      <div class="alert alert-<?=$response["class"]?>"><?=$response["message"]?></div>
    </div>
  </div>
<?php
  }
?>
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Siparişler</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 pb-3">
      <form method="get" action="">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <label class="mr-sm-2">Duruma göre listele</label>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="durum">
              <option value="" selected>Seçiniz...</option>
              <option <?=get("durumListele") && get("durum") == 0 ? 'selected' : null?> value="0">Bekleyenler</option>
              <option <?=get("durumListele") && get("durum") == 1 ? 'selected' : null?> value="1">Teslim Edilenler</option>
              <option <?=get("durumListele") && get("durum") == 2 ? 'selected' : null?> value="2">İptal Olanlar</option>
            </select>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="durumListele" value="1">Listele</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-3 pb-3">
      <form class="form-inline float-right" method="get" action="">
        <div class="form-group">
          <label for="Posta" class="sr-only">İşlem No</label>
          <input type="text" class="form-control" name="islem_no" id="Posta" placeholder="İşlem Numarası">
        </div>
        <button type="submit" class="btn btn-success" name="searchIslemNo" value="1">
          <i class="icon ion-search"></i>
        </button>
      </form>
    </div>
    <div class="col-md-4 pb-3">
      <form class="form-inline float-right" method="get" action="">
        <div class="form-group mx-sm-3">
          <label for="Posta" class="sr-only">E-Posta Adresi</label>
          <input type="email" class="form-control" name="email" id="Posta" placeholder="Üye E-Posta Adresi">
        </div>
        <button type="submit" class="btn btn-success" name="searchEmail" value="1">
          <i class="icon ion-search"></i>
        </button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($siparisler) > 0 ){
      ?>
      <form action="" method="post">
        <div class="row">
          <div class="col-md-12 mb-1 text-right">
            <button type="submit" name="itemDeleteSubmit" value="y" class="btn btn-danger"><i class="icon ion-trash-a"></i> Seçilileri Sil</button>
          </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">İşlem No</th>
              <th scope="col">Ürün</th>
              <th scope="col">Üye</th>
              <th scope="col">Adet</th>
              <th scope="col">Durum</th>
              <th scope="col">Tarih</th>
              <th scope="col" colspan="2">İşlemler</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach($siparisler as $siparis):
              $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '" . $siparis->uye_id . "'");
              $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . $siparis->urun_id . "'");
          ?>
          <tr>
            <th scope="row">
            <?php
              if($siparis->islem_no != null){
            ?>
            <div class="badge badge-pill badge-dark"><?=$siparis->islem_no?></div>
            <?php
              }
            ?>
            </th>
            <td>
            <?php
              if(isset($urun->id)){
            ?>
            <a href="<?=site_url('admin/urun-duzenle?id=' . $urun->id)?>">
              <?=$urun->urun_adi?>
            <?php
              if($urun->api_type == 2){
            ?>
            <br><small>(Chipcin)</small>
            <?php
              }else{
                if($urun->api_type == 1){
            ?>
            <br><small>(GameCard)</small>
            <?php
                }else{
            ?>
            <br><small>(Normal)</small>
            <?php
                }
              }
            ?>
            </a>
            <?php
              }else{
            ?>
              <a href="#" class="text-muted disabled">
                Ürün Silinmiş
              </a>
            <?php
              }
            ?>
            </td>
            <td>
              <a href="<?=site_url('admin/uye?id=' . $uye->id)?>">
                <?=$uye->adsoyad?> (<?=$uye->email?>)
              </a>
            </td>
            <td>
              <?=$siparis->adet?> Adet
            </td>
            <td>
              <?php
                switch($siparis->durum){
                  default:
                  case 0:
                    echo '<div class="badge badge-warning"><i class="icon ion-clock"></i> Beklemede</div>';
                  break;
                  case 1:
                    echo '<div class="badge badge-success"><i class="icon ion-checkmark"></i> Teslim Edildi</div>';
                  break;
                  case 2:
                    echo '<div class="badge badge-danger"><i class="icon ion-close"></i> İptal Edildi</div>';
                  break;
                }
              ?>
            </td>
            <td>
              <?=date("d.m.Y H:i", strtotime($siparis->created_at))?>
            </td>
            <td>
              <a href="<?=site_url('admin/siparis')?>?id=<?=$siparis->id?>" class="btn btn-dark btn-block">
                <i class="icon ion-more"></i>
              </a>
            </td>
            <td>
              <input type="checkbox" name="deleteItem[]" value="<?=$siparis->id?>">
            </td>
          </tr>
          <?php
            endforeach;
          ?>
          </tbody>
        </table>
      </form>
      <nav>
        <ul class="pagination justify-content-center">
          <?php
            $en_az_orta = ceil($sayfa_goster/2);
            $en_fazla_orta = ($toplam_sayfa+1) - $en_az_orta;

            $sayfa_orta = $sayfa;
            if($sayfa_orta < $en_az_orta) $sayfa_orta = $en_az_orta;
            if($sayfa_orta > $en_fazla_orta) $sayfa_orta = $en_fazla_orta;

            $sol_sayfalar = round($sayfa_orta - (($sayfa_goster-1) / 2));
            $sag_sayfalar = round((($sayfa_goster-1) / 2) + $sayfa_orta);

            if($sol_sayfalar < 1) $sol_sayfalar = 1;
            if($sag_sayfalar > $toplam_sayfa) $sag_sayfalar = $toplam_sayfa;

            if($sayfa != 1) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/siparisler?sayfa=1") . '" tabindex="-1">&laquo;</a>
            </li> ';
            if($sayfa != 1) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/siparisler?sayfa=" . $s-1) . '" tabindex="-1">&lsaquo;</a>
            </li> ';

            for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) {
                if($sayfa == $s) {
                    echo '<li class="page-item active"><a class="page-link" href="' . site_url("admin/siparisler?sayfa=" . $s) .  '">' . $s . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="' . site_url("admin/siparisler?sayfa=" . $s) .  '">' . $s . '</a></li>';
                }
            }

            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/siparisler?sayfa=" . $s+1) . '" tabindex="-1">&rsaquo;</a>
            </li>  ';
            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/siparisler?sayfa=" . $toplam_sayfa) . '" tabindex="-1">&raquo;</a>
            </li> ';
          ?>
        </ul>
      </nav>
      <?php
        }else{
          echo '<div class="alert alert-info">Burada hiç sipariş bulunmuyor.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
