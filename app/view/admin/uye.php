<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="bg-light border p-3">
        <div class="row">
          <div class="col-md-5">
            <h3 class="text-center pb-3 pt-3"><i class="icon ion-person"></i> <?=$uye->adsoyad?></h3>
            <ul class="list-group">
              <li class="list-group-item"><strong>E-Posta Adresi:</strong> <?=$uye->email?></li>
               <li class="list-group-item"><strong>Tc Kimlik Numarası:</strong> <?=$uye->tc?></li>
              <li class="list-group-item"><strong>Üyelik Tarihi: </strong> <?=date("d.m.Y H:i", strtotime($uye->created_at))?></li>
              <li class="list-group-item"><strong>Mevcut Bakiye: </strong> <span class="text-success"><?=$uye->bakiye?>TL</span></li>
              <li class="list-group-item"><strong>Mevcut VG Bakiye: </strong> <span class="text-success"><?=$uye->vgbakiye?> VG (TL)</span></li>
              <li class="list-group-item"><strong>Sipariş Key: </strong> <span class="text-info"><?=$uye->siparis_code?></span></li>
              <li class="list-group-item"><strong>Son Giriş IP Adresi: </strong> <span class="text-info"><?=$uye->last_login_ip?></span></li>
            </ul>
          </div>
          <div class="col-md-7">
            <div class="bg-white border rounded p-3 mb-2">
              <h4>İşlemler</h4>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <?php
                    if($uye->bayi == 0){
                      //(üye)bayii yap
                  ?>
                  <a href="<?=site_url("admin/uye?id=" . $uye->id . "&islem=bayi&i=1")?>" class="btn btn-info">Bayi Yap</a>
                  <?php
                      //(bayii) üye yap
                    }else{
                  ?>
                  <a href="<?=site_url("admin/uye?id=" . $uye->id . "&islem=bayi&i=0")?>" class="btn btn-primary">Bayilikten Çıkar</a>
                  <?php
                    }
                    if($uye->rutbe == 1){
                      //(yönetici) üye yap
                  ?>
                  <a href="<?=site_url("admin/uye?id=" . $uye->id . "&islem=uye_yap")?>" class="btn btn-primary">Üye Yap</a>
                  <?php
                      //(üye) yönetici yap
                    }else if($uye->rutbe == 0){
                  ?>
                  <a href="<?=site_url("admin/uye?id=" . $uye->id . "&islem=yonetici_yap")?>" class="btn btn-success">Yönetici Yap</a>
                  <?php
                    }
                    if($uye->bakiye > 0){
                  ?>
                  <a href="<?=site_url("admin/uye?id=" . $uye->id . "&islem=bakiye_sifirla")?>" class="btn btn-dark">Bakiyesini Sıfırla</a>
                  <?php
                    }
                  ?>

                  <a onclick="return confirm('<?=$uye->adsoyad?>(<?=$uye->email?>) hesabını silmek istediğinize emin misiniz?');" href="<?=site_url("admin/uye?id=" . $uye->id . "&islem=uye_sil")?>" class="btn btn-danger">
                    <i class="icon ion-trash-a"></i> Üyeliği Sil
                  </a>

                </div>
              </div>
            </div>

            <div class="bg-white border rounded p-3">
              <h4>Bakiye</h4>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <form action="" method="post">
                    <div class="form-group row">
                      <div class="col-md-9">
                        <input type="number" class="form-control" placeholder="Tutar" name="tutar" step="0.5" min="0">
                      </div>
                      <div class="col-md-3">
                        <button type="submit" class="btn btn-block btn-outline-primary" name="bakiyeDegistir" value="1">Uygula</button>
                      </div>
                    </div>
                    <div class="form-group mb-0">
                      <label class="custom-control custom-radio">
                        <input name="tip" type="radio" class="custom-control-input" value="1" checked>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Arttır</span>
                      </label>
                      <label class="custom-control custom-radio">
                        <input name="tip" type="radio" class="custom-control-input" value="2">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Eksilt</span>
                      </label>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="bg-white border rounded p-3 mt-2">
              <h4>VG Bakiye</h4>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <form action="" method="post">
                    <div class="form-group row">
                      <div class="col-md-9">
                        <input type="number" class="form-control" placeholder="Tutar" name="tutar" step="0.5" min="0">
                      </div>
                      <div class="col-md-3">
                        <button type="submit" class="btn btn-block btn-outline-secondary" name="VGbakiyeDegistir" value="1">Uygula</button>
                      </div>
                    </div>
                    <div class="form-group mb-0">
                      <label class="custom-control custom-radio">
                        <input name="tip" type="radio" class="custom-control-input" value="1" checked>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Arttır</span>
                      </label>
                      <label class="custom-control custom-radio">
                        <input name="tip" type="radio" class="custom-control-input" value="2">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Eksilt</span>
                      </label>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-12">
                <a href="<?=site_url("admin/uye-duzenle?id=" . $uye->id)?>" class="btn btn-primary btn-block">
                  <i class="icon ion-edit"></i> Tüm Bilgileri Düzenle
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="bg-light border p-3">
        <h1>Sipariş Geçmişi</h1>
        <hr>
        <div class="bg-white border p-3">
        <?php
          if( count($gecmis_siparisler) > 0 ){
        ?>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Ürün</th>
              <th scope="col">İlgili Kod</th>
              <th scope="col">Üye</th>
              <th scope="col">Adet</th>
              <th scope="col">Durum</th>
              <th scope="col">Tarih</th>
              <th scope="col" colspan="2">İşlemler</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach($gecmis_siparisler as $siparis):
              $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '" . $siparis->uye_id . "'");
              $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . $siparis->urun_id . "'");
          ?>
          <tr>
            <th scope="row"><?=$siparis->id?></th>
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
              <small><?=$siparis->api_code ? $siparis->api_code : '-'?></small>
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
        <?php
          }else{
        ?>
        <div class="alert alert-warning">Hiç sipariş yok.</div>
        <?php
          }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="bg-light border p-3">
        <h1>Son <span class="text-success">30</span> Hareketler</h1>
        <hr>
        <div class="bg-white border p-3">
        <?php
          $uyeHareketleri = DB::get("SELECT * FROM hareketler WHERE uye_id = '" . get("id") . "' order by id DESC");

          if( count($uyeHareketleri) > 0 ){
        ?>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Hareket</th>
              <th scope="col">Tarih</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach($uyeHareketleri as $hareket):
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
            <td><?=$metin?></td>
            <td><?=$hareket->tarih?></td>
          </tr>
          <?php
            endforeach;
          ?>
          </tbody>
        </table>
        <?php
          }else{
        ?>
        <div class="alert alert-warning">Hiç hareket yok.</div>
        <?php
          }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
