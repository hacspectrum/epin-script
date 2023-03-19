<?php
  require view("admin/static/header");

  switch($siparis->durum){
    default:
    case 0:
      $activeStatus = "warning";
    break;
    case 1:
      $activeStatus = "success";
    break;
    case 2:
      $activeStatus = "danger";
    break;
  }
?>

<!-- Iptal Modal -->
<div class="modal fade" id="iptalModal" tabindex="-1" role="dialog" aria-labelledby="iptalModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?=site_url('admin/siparis?id=' . $siparis->id . '&islem=iptal')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sipariş İptali</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" readonly value="Ürün: <?=$urun->urun_adi?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" readonly value="Üye: <?=$uye->adsoyad?> (<?=$uye->email?>)">
          </div>
          <div class="form-group mb-0">
            <textarea name="iptal_sebebi" rows="4" class="form-control" placeholder="İptal etme sebebiniz" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Vazgeç</button>
          <button type="submit" class="btn btn-primary" name="iptalEtmeFormu" value="1">Bitir</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Teslim Modal -->
<div class="modal fade" id="teslimModal" tabindex="-1" role="dialog" aria-labelledby="teslimModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?=site_url('admin/siparis?id=' . $siparis->id . '&islem=teslim')?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sipariş Teslimi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" readonly value="Ürün: <?=$urun->urun_adi?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" readonly value="Üye: <?=$uye->adsoyad?> (<?=$uye->email?>)">
          </div>
          <div class="form-group">
            <textarea name="aciklama" class="form-control" placeholder="Açıklama" rows="10"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Vazgeç</button>
          <button type="submit" class="btn btn-success" name="teslimEtmeFormu" value="1">Teslim Et</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="bg-light p-4 border border-<?=$activeStatus?>">
        <div class="row">
          <div class="col-md-6">
            <?php
              switch($siparis->durum){
                default:
                case 0:
                  echo '<div class="badge badge-pill badge-warning">
                    <i class="icon ion-clock"></i> Beklemede
                  </div>';
                break;
                case 1:
                  echo '<div class="badge badge-pill badge-success">
                    <i class="icon ion-checkmark"></i> Teslim Edildi
                  </div>';
                break;
                case 2:
                  echo '<div class="badge badge-pill badge-danger">
                    <i class="icon ion-close"></i> İptal Edildi
                  </div>';
                break;
              }
            ?>
            <h5>
              <a href="<?=site_url("admin/uye?id=" . $uye->id)?>" class="text-primary"><?=$uye->adsoyad?> <?=$uye->bayi == 1 ? '<span class="text-info">(Bayii)</span>' : null?></a> üyesinden gelen sipariş
            </h5>
          </div>
          <div class="col-md-6 text-right">
            <div class="btn-group" role="group">
              <?php
                if( $siparis->durum == 0 ){
              ?>
              <a href="javascript:;" class="btn btn-success" data-toggle="modal" data-target="#teslimModal">
                <i class="icon ion-checkmark"></i>
                Teslim Edildi olarak işaretle
              </a>
              <?php
                }
                if( $siparis->durum == 0 ){
              ?>
              <a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#iptalModal">
                <i class="icon ion-close"></i>
                İptal Edildi olarak işaretle
              </a>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
        <div class="mt-4"></div>
        <div class="row">
          <div class="col-md-12">
            <h3>Bilgiler</h3>
            <hr>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
              <?php
                $bayiKategoriIndirim = DB::getRow("SELECT * FROM bayi_kategori_indirimleri WHERE uye_id = '" . $siparis->uye_id . "' AND kategori_id = '" . $urun->kategori_id . "'");
                if(isset($bayiKategoriIndirim->id)){
              ?>
                <div class="alert alert-info">
                  <strong>Dikkat!</strong>
                  <br>
                  Bu üye bayi kategori indiriminden yararlanmaktadır. Bu ürün için <strong>%<?=$bayiKategoriIndirim->indirim?></strong> indirim sağlanmış olabilir.
                </div>
              <?php
                }
              ?>
                <strong>Ürün Adı: </strong> <?=$urun->urun_adi?>
                <br>
                <strong>Adet: </strong> <?=$siparis->adet?>
                <br>
                <strong>Birim Fiyat: </strong> <span class="badge badge-dark"><?=fiyat($siparis->uye_id,$urun->fiyat,$urun->kategori_id)?> TL</span>
                <br>
                <strong>Ödenen Tutar: </strong> <span class="badge badge-success"><?=$siparis->odenen_tutar?> TL</span>
                <br>
                <?php
                  if($siparis->api_code != null){
                ?>
                <strong>Kod: </strong> <span class="badge badge-primary"><?=$siparis->api_code?></span>
                <?php
                  }
                ?>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
