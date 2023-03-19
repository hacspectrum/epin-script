<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Üyeler</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 pb-3">
      <form method="get" action="">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <label class="mr-sm-2">Bakiyeye göre </label>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="tip">
              <option value="" selected>Seçiniz...</option>
              <option <?=get("bakiyeListele") && get("tip") == 0 ? 'selected' : null?> value="0">Büyükten Küçüğe (>)</option>
              <option <?=get("bakiyeListele") && get("tip") == 1 ? 'selected' : null?> value="1">Küçükten Büyüğe (<)</option>
            </select>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="bakiyeListele" value="1">Listele</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-1 pb-3">
      <a href="<?=site_url('admin/uyeler?bayiListele=1')?>" class="btn btn-secondary">Bayileri Listele</a>
    </div>
    <div class="col-md-6 pb-3">
      <form class="form-inline float-right" method="get" action="">
        <div class="form-group mx-sm-3">
          <label for="Posta" class="sr-only">Üye E-Posta Adresi</label>
          <input type="email" class="form-control" name="email" id="Posta" placeholder="Üye E-Posta Adresi">
        </div>
        veya&nbsp;&nbsp;
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Üye Adı Soyadı">
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
        if( count($uyeler) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Ad Soyad</th>
            <th scope="col">TC</th>
            <th scope="col">E-Posta Adresi</th>
            <th scope="col">Bayi</th>
            <th scope="col">VG Bakiye</th>
            <th scope="col">Bakiye</th>
            <th scope="col">Üyelik Tarihi</th>
            <th scope="col">Tip</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($uyeler as $uye):
        ?>
        <tr>
          <td>
            <?=$uye->id?>
          </td>
          <td>
            <a href="<?=site_url('admin/uye?id=' . $uye->id)?>">
              <?=$uye->adsoyad?>
            </a>
          </td>
          <td>
            <?=$uye->tc?>
          </td>
          <td>
            <?=$uye->email?>
          </td>
          <td>
          <?php
            if($uye->bayi == 1){
              echo '<div class="badge badge-info badge-pill">Bayi <small>(%'.$uye->bayi_indirim.')</small></div>';
            }else{
              echo '<div class="badge badge-success badge-pill">Üye</div>';
            }
          ?>
          </td>
          <td>
            <small><?=$uye->vgbakiye?> VG</small>
          </td>
          <td>
            <small><?=$uye->bakiye?>TL</small>
          </td>
          <td>
            <?=date("d.m.Y H:i", strtotime($uye->created_at))?>
          </td>
          <td>
            <?=$uye->facebook_login_token != null ? '<div class="badge badge-primary badge-pill">Facebook</div>' : '<div class="badge badge-success badge-pill">Üye</div>'?>
          </td>
          <td>
            <a href="<?=site_url('admin/uye?id=' . $uye->id)?>" class="btn btn-dark btn-block">
              <i class="icon ion-more"></i>
            </a>
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
              <a class="page-link" href="' . site_url("admin/uyeler?sayfa=1") . '" tabindex="-1">&laquo;</a>
            </li> ';
            if($sayfa != 1) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/uyeler?sayfa=" . $s-1) . '" tabindex="-1">&lsaquo;</a>
            </li> ';

            for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) {
                if($sayfa == $s) {
                    echo '<li class="page-item active"><a class="page-link" href="' . site_url("admin/uyeler?sayfa=" . $s) .  '">' . $s . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="' . site_url("admin/uyeler?sayfa=" . $s) .  '">' . $s . '</a></li>';
                }
            }

            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/uyeler?sayfa=" . $s+1) . '" tabindex="-1">&rsaquo;</a>
            </li>  ';
            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/uyeler?sayfa=" . $toplam_sayfa) . '" tabindex="-1">&raquo;</a>
            </li> ';
          ?>
        </ul>
      </nav>
      <?php
        }else{
          echo '<div class="alert alert-info">Üye bulunamadı.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
