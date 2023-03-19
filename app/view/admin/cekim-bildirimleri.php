<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Çekim Bildirimleri</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 pb-3">
      <form method="get" action="">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <label class="mr-sm-2">Duruma göre listele</label>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="durum">
              <option value="" selected>Seçiniz...</option>
              <option <?=get("durumListele") && get("durum") == 0 ? 'selected' : null?> value="0">Bekleyenler</option>
              <option <?=get("durumListele") && get("durum") == 1 ? 'selected' : null?> value="1">Onaylananlar</option>
              <option <?=get("durumListele") && get("durum") == 2 ? 'selected' : null?> value="2">Geçersiz Olanlar</option>
            </select>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="durumListele" value="1">Listele</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-6 pb-3">
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
        if( count($cekimBildirimleri) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Üye</th>
            <th scope="col">
              <small>
                Banka Adı
              </small>
            </th>
            <th scope="col">
              <small>
                Ad Soyad
              </small>
            </th>
            <th scope="col">
              <small>
                IBAN
              </small>
            </th>
            <th scope="col">
              <small>
                Hesap No
              </small>
            </th>
            <th scope="col">
              <small>
                Şube No
              </small>
            </th>
            <th scope="col">Miktar</th>
            <th scope="col">Tarih</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($cekimBildirimleri as $bildirim):
            $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '" . $bildirim->uye_id . "'");
        ?>
        <tr>
          <td>
            <a href="<?=site_url('admin/uye?id=' . $bildirim->uye_id)?>" class="btn btn-primary btn-sm" title="<?=$uye->email?>">
              <i class="icon ion-person"></i>
            </a>
          </td>
          <td>
            <small><?=$bildirim->banka_adi?></small>
          </td>
          <td>
            <small><?=$bildirim->adsoyad?></small>
          </td>
          <td>
            <small><?=$bildirim->iban?></small>
          </td>
          <td>
            <small><?=$bildirim->hesapno?></small>
          </td>
          <td>
            <small><?=$bildirim->subeno?></small>
          </td>
          <td>
            <div class="badge badge-pill badge-dark">
              <?=$bildirim->miktar?>VG (TL)
            </div>
          </td>
          <td>
            <?=date("d.m.Y H:i", strtotime($bildirim->created_at))?>
          </td>
          <td>
            <?php
              switch($bildirim->durum){
                default:
                case 0:
                  echo '<div class="badge badge-warning"><i class="icon ion-clock"></i> Beklemede</div>';
                break;
                case 1:
                  echo '<div class="badge badge-success"><i class="icon ion-checkmark"></i> Onaylandı</div>';
                break;
                case 2:
                  echo '<div class="badge badge-danger"><i class="icon ion-close"></i> Geçersiz</div>';
                break;
              }
            ?>
          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                İşlemler
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?=site_url("admin/cekim-bildirimi?id=" . $bildirim->id . "&islem=onayla")?>">
                  <span class="text-success">
                    Onayla
                  </span>
                </a>
                <a class="dropdown-item" href="<?=site_url("admin/cekim-bildirimi?id=" . $bildirim->id . "&islem=gecersiz")?>">
                  <span class="text-danger">
                    Geçersiz
                  </span>
                </a>
              </div>
            </div>
          </td>
        </tr>
        <?php
          endforeach;
        ?>
        </tbody>
      </table>
      <?php
        }else{
          echo '<div class="alert alert-info">Burada hiç ödeme bildirimi bulunmuyor.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
