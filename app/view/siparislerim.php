<?php
  require view("static/header");
?>

<div class="jumbotron rounded-0 text-white mb-0 primary-gradient shadow">
  <div class="container">
    <div class="d-flex">
      <div class="mr-auto">
        <h1 class="display-3">Siparişlerim</h1>
        <p class="lead text-secondary">Geçmiş ve beklemede olan tüm siparişleriniz</p>
      </div>
      <div class="ml-auto d-none d-md-block">
        <img src="<?=asset_url("img/cart.png")?>" alt="Siparişlerim" width="128">
      </div>
    </div>
  </div>
</div>
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-white">
      <?php
        if( count($siparisler) > 0 ){
      ?>
      <table class="table table-hover table-striped table-bordered siparislerTablosu">
        <thead>
          <tr class="shadow">
            <th scope="col" class="bg-white text-center">İşlem No</th>
            <th scope="col" class="bg-white">Ürün</th>
            <th scope="col" class="bg-white text-center">Adet</th>
            <th scope="col" class="bg-white text-center">Tutar</th>
            <th scope="col" class="bg-white text-center">Tarih</th>
            <th scope="col" class="bg-white text-center">Durum</th>
            <th scope="col" colspan="2" width="20%" class="bg-white text-center">Sebep <small>(Onaylanmamışsa)</small></th>
          </tr>
        </thead>
        <tbody>
      <?php
        foreach($siparisler as $siparis):
          $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . $siparis->urun_id . "'");
      ?>
          <tr class="shadow">
            <td class="text-center">
            <?php
              if($siparis->islem_no != null){
            ?>
            <div class="badge badge-secondary badge-pill">
              <?=$siparis->islem_no?>
            </div>
            <?php
              }
            ?>
            </td>
            <td width="30%">
            <?php
              if(isset($urun->id)){
            ?>
            <a href="#sp<?=$siparis->islem_no?>" data-toggle="modal" data-target="#sp<?=$siparis->islem_no?>">
              <?=$urun->urun_adi?>
            </a>
            <?php
            }else{
              echo 'Ürün bulunamadı.';
            }
            ?>
            <?php
              if($siparis->api_code != null || $siparis->aciklama != null){
            ?>
              <br>
              <small>
              <a href="#sp<?=$siparis->islem_no?>" data-toggle="modal" data-target="#sp<?=$siparis->islem_no?>">Bilgiler</a>
              </small>
              <div class="modal fade" id="sp<?=$siparis->islem_no?>" tabindex="-1" role="dialog" aria-labelledby="sp<?=$siparis->islem_no?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><strong>Sipariş:</strong> #<?=$siparis->islem_no?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <small><?=$siparis->aciklama?></small>
                      <?php
                        if($siparis->api_code != null){
                      ?>
                        <strong>Kod: </strong> <?=$siparis->api_code?>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kapat</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
            ?>
            </td>
            <td class="text-center">
              <?=$siparis->adet?> Adet
            </td>
            <td class="text-center">
              <div class="text-primary font-weight-bold">
                <?=$siparis->odenen_tutar?> ₺
              </div>
            </td>
            <td class="text-center">
              <i class="ion ion-clock"></i> <small><?=date("d.m.Y H:i",strtotime($siparis->created_at))?></small>
            </td>
            <td class="text-center">
              <?php
                switch($siparis->durum){
                  case 0:
                    echo '<div class="badge badge-warning badge-pill">
                      <i class="icon ion-clock"></i> Beklemede
                    </div>';
                  break;
                  case 1:
                    echo '<div class="badge badge-success badge-pill">
                      <i class="icon ion-checkmark"></i> Teslim Edildi
                    </div>';
                  break;
                  case 2:
                    echo '<span class="badge badge-danger badge-pill">
                      <i class="icon ion-close"></i> İptal Edildi
                    </span>';
                  break;
                }
              ?>
            </td>
            <td class="text-center">
              <?php
                if($siparis->durum == 2){
                  echo '<span class="text-danger"><small>' . $siparis->yorum . '</small></span>';
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
        <div class="alert alert-light"><i class="ion ion-information-circled"></i> Hiç sipariş bulunmuyor.</div>
      <?php
        }
      ?>
      </div>
    </div>
  </div>
</div>

<?php
  require view("static/footer");
?>
