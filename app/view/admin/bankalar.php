<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Banka Hesapları &nbsp; <a href="<?=site_url("admin/banka-ekle")?>" class="btn btn-success"><i class="icon ion-plus"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($bankalar) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Banka Adı</th>
            <th scope="col">Ad Soyad</th>
            <th scope="col">IBAN</th>
            <th scope="col">Hesap No</th>
            <th scope="col">Şube No</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($bankalar as $banka):
        ?>
        <tr>
          <th scope="row"><?=$banka->id?></th>
          <td>
            <div class="badge badge-pill badge-primary p-2">
              <?=$banka->banka_adi?>
            </div>
          </td>
          <td>
            <?=$banka->adsoyad?>
          </td>
          <td>
            <?=$banka->iban?>
          </td>
          <td>
            <?=$banka->hesapno?>
          </td>
          <td>
            <?=$banka->subeno?>
          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                İşlemler
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?=site_url("admin/banka?id=" . $banka->id)?>">
                  Düzenle
                </a>
                <a class="dropdown-item" onclick="return confirm('Silmek istediğinize emin misiniz?')" href="<?=site_url("admin/banka-sil?id=" . $banka->id)?>">
                  Sil
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
          echo '<div class="alert alert-info">Burada hiç banka hesabı bulunmuyor.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
