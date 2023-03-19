<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Satışlar (Bize Sat)</h2>
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
        if( count($satislar) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ürün</th>
            <th scope="col">Üye</th>
            <th scope="col">Adet</th>
            <th scope="col">Verilecek Tutar</th>
            <th scope="col">Durum</th>
            <th scope="col">Tarih</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($satislar as $siparis):
            $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '" . $siparis->uye_id . "'");
            $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . $siparis->urun_id . "'");
        ?>
        <tr>
          <th scope="row"><?=$siparis->id?></th>
          <td>
            <?php
              if(!@$urun->id){
                echo '<small><strong class="text-danger">Ürün bulunamadı</strong></small>';
              }else{
            ?>
            <a href="<?=site_url('admin/urun-duzenle?id=' . $urun->id)?>">
              <?=$urun->urun_adi?>
            </a>
            <?php
              }
            ?>
          </td>
          <td>
            <a href="<?=site_url('admin/uye?id=' . $uye->id)?>">
              <?=$uye->adsoyad?> <small>(<?=$uye->email?>)</small>
            </a>
          </td>
          <td>
            <?=$siparis->adet?> Adet
          </td>
          <td class="text-center">
            <span class="badge badge-danger badge-pill"><?=$siparis->verilecek_tutar?> ₺</span>
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
            <a href="<?=site_url('admin/satis?id=' . $siparis->id)?>" class="btn btn-dark btn-block">
              <i class="icon ion-more"></i>
            </a>
          </td>
        </tr>
        <?php
          endforeach;
        ?>
        </tbody>
      </table>
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
