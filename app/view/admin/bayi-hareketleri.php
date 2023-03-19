<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h1>Bayi Hareketleri</h1>

      <table class="table table-striped">
        <tbody>
        <?php
          foreach($hareketler as $hareket):

            switch($hareket->hareket_tipi){
              case "cekimbildirimi":
                $ek = json_decode($hareket->ek);
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                    ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                  </a> ' . $ek->miktar . '₺ tutarında çekim bildirimi yaptı.';
              break;
              case "bizesat":
                $ek = json_decode($hareket->ek);
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                    ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                  </a> ' . ' <strong>' . DB::getVar("SELECT urun_adi FROM chip_urunler WHERE id = '" . $ek->urun_id . "'") . '</strong>
                  ürününe <strong>' . $ek->adet . ' adet (' . $ek->toplam_fiyat . '₺)</strong> bize sat teklifinde bulundu.';
              break;
              case "siparis":
                $ek = json_decode($hareket->ek);
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                    ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                  </a> ' . $ek->adet . ' adet (' . $ek->toplam_fiyat . '₺) <strong>' . DB::getVar("SELECT urun_adi FROM chip_urunler WHERE id = '" . $ek->urun_id . "'") . '</strong> (' . $ek->urun_tipi . ') siparişi verdi.';
              break;
              case "chipcin_donus":
                $ek = json_decode($hareket->ek);
                if($ek->status == "success"){
                  $status = '<span class="text-success">onaylandı</span>';
                }else{
                  $status = '<span class="text-danger">onaylanmadı</span>';
                }
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                    ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                  </a> CHIPCIN API ile sipariş verdiği ürün CHIPCIN API tarafından ' . $status . '.';
              break;
              case "giris":
                $ek = json_decode($hareket->ek);
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                  ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                </a> üye giriş yaptı.';
              break;
              case "giris_facebook":
                $ek = json_decode($hareket->ek);
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                  ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                </a> üye facebook ile giriş yaptı.';
              break;
              case "payment_paytr":
                $ek = json_decode($hareket->ek);
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                  ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                </a> ';
                if($ek->status == "success"){
                  $status = '<span class="text-success">başarılı</span>';
                }else{
                  $status = '<span class="text-danger">başarısız</span>';
                }
                $metin .= 'PAYTR kullanarak <strong>' . $ek->amount . ' ₺</strong> ödeme yapmıştı. Ödemesi ' . $status . ' oldu.';
              break;
              case "payment_gpay":
                $ek = json_decode($hareket->ek);
                $metin = '<a href="' . site_url("admin/uye?id=" . $hareket->uye_id) . '">
                  ' . DB::getVar("SELECT email FROM uyeler WHERE id = '".$hareket->uye_id."'") . '
                </a> ';
                if($ek->status == "success"){
                  $status = '<span class="text-success">başarılı</span>';
                }else{
                  $status = '<span class="text-danger">başarısız</span>';
                }
                $metin .= 'PAYTR kullanarak <strong>' . $ek->amount . ' ₺</strong> ödeme yapmıştı. Ödemesi ' . $status . ' oldu.';
              break;
            }
        ?>
          <tr>
            <td class="p-1">
              <small><?=$metin?></small>
            </td>
            <td class="p-1">
              <small>
                <i class="icon ion-clock"></i> <?=$hareket->tarih?>
              </small>
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
              <a class="page-link" href="' . site_url("admin/bayi-hareketleri?sayfa=1") . '" tabindex="-1">&laquo;</a>
            </li> ';
            if($sayfa != 1) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/bayi-hareketleri?sayfa=" . $s-1) . '" tabindex="-1">&lsaquo;</a>
            </li> ';

            for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) {
                if($sayfa == $s) {
                    echo '<li class="page-item active"><a class="page-link" href="' . site_url("admin/bayi-hareketleri?sayfa=" . $s) .  '">' . $s . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="' . site_url("admin/bayi-hareketleri?sayfa=" . $s) .  '">' . $s . '</a></li>';
                }
            }

            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/bayi-hareketleri?sayfa=" . $s+1) . '" tabindex="-1">&rsaquo;</a>
            </li>  ';
            if($sayfa != $toplam_sayfa) echo ' <li class="page-item">
              <a class="page-link" href="' . site_url("admin/bayi-hareketleri?sayfa=" . $toplam_sayfa) . '" tabindex="-1">&raquo;</a>
            </li> ';
          ?>
        </ul>
      </nav>

    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
