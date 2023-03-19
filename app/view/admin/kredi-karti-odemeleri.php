<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Kredi Kartı Ödemeleri</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mb-2">
      <form class="form-inline float-right" method="get" action="">
        <div class="form-group mx-sm-3">
          <label for="Posta" class="sr-only">Sipariş No</label>
          <input type="text" class="form-control" name="siparis_no" id="Posta" placeholder="Sipariş No">
        </div>
        <button type="submit" class="btn btn-success" name="searchSiparisNo" value="1">
          <i class="icon ion-search"></i>
        </button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($odemeler) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Sipariş No</th>
            <th scope="col">Üye</th>
            <th scope="col">Tutar</th>
            <th scope="col">API</th>
            <th scope="col">Durum</th>
            <th scope="col">Tarih</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($odemeler as $odeme):
            $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '" . $odeme->uye_id . "'");
        ?>
        <tr>
          <th scope="row"><?=$odeme->trade_code?></th>
          <td>
          <?php
            if(isset($uye->id)){
          ?>
            <a href="<?=site_url('admin/uye?id=' . $odeme->uye_id)?>" class="btn btn-primary">
              <i class="icon ion-person"></i> <?=$uye->adsoyad?> (<?=$uye->email?>)
            </a>
          <?php
            }else{
          ?>
            <a href="#" class="btn btn-dark disabled">
              <i class="icon ion-person"></i> Üye Silinmiş
            </a>
          <?php
            }
          ?>
          </td>
          <td>
            <div class="badge badge-success badge-pill">
              <?=$odeme->tutar?> TL
            </div>
          </td>
          <td>
            <div class="badge badge-primary">
              <?=strtoupper($odeme->api_type)?>
            </div>
          </td>
          <td>
          <?php
            switch($odeme->durum){
              case 0:
                echo '<div class="badge badge-danger badge-pill p-2">
                  <i class="icon ion-close"></i> Kabul Edilmedi
                </div>';
              break;
              case 1:
                echo '<div class="badge badge-success badge-pill p-2">
                  <i class="icon ion-checkmark"></i> Kabul Edildi
                </div>';
              break;
              default:
              case 2:
                echo '<div class="badge badge-warning badge-pill p-2">
                  <i class="icon ion-clock"></i> Kontrol Ediliyor
                </div>';
              break;
            }
          ?>
          </td>
          <td>
            <?=date("d.m.Y H:i", strtotime($odeme->created_at))?>
          </td>
        </tr>
        <?php
          endforeach;
        ?>
        </tbody>
      </table>
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
              <a class="page-link" href="' . site_url("admin/kredi-karti-odemeleri?sayfa=1") . '" tabindex="-1">&laquo;</a>
            </li> ';
            if($sayfa != 1) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/kredi-karti-odemeleri?sayfa=" . $s-1) . '" tabindex="-1">&lsaquo;</a>
            </li> ';

            for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) {
                if($sayfa == $s) {
                    echo '<li class="page-item active"><a class="page-link" href="' . site_url("admin/kredi-karti-odemeleri?sayfa=" . $s) .  '">' . $s . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="' . site_url("admin/kredi-karti-odemeleri?sayfa=" . $s) .  '">' . $s . '</a></li>';
                }
            }

            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/kredi-karti-odemeleri?sayfa=" . $s+1) . '" tabindex="-1">&rsaquo;</a>
            </li>  ';
            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/kredi-karti-odemeleri?sayfa=" . $toplam_sayfa) . '" tabindex="-1">&raquo;</a>
            </li> ';
          ?>
        </ul>
      </nav>
      <?php
        }else{
          echo '<div class="alert alert-info">Burada hiç kredi kartı ödemesi bulunmuyor.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
