<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Duyurular &nbsp; <a href="<?=site_url("admin/duyuru-ekle")?>" class="btn btn-success"><i class="icon ion-plus"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($duyurular) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" width="90%">Duyuru Metni</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($duyurular as $duyuru):
        ?>
        <tr>
          <th scope="row"><?=$duyuru->id?></th>
          <td>
            <div class="badge badge-pill badge-dark p-2">
              <?=$duyuru->duyuru?>
            </div>
          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                İşlemler
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?=site_url("admin/duyuru-duzenle?id=" . $duyuru->id)?>">
                  Düzenle
                </a>
                <a class="dropdown-item" onclick="return confirm('Silmek istediğinize emin misiniz?')" href="<?=site_url("admin/duyuru-sil?id=" . $duyuru->id)?>">
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
          echo '<div class="alert alert-info">Burada hiç duyuru bulunmuyor.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
