<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Makaleler &nbsp; <a href="<?=site_url("admin/makale-ekle")?>" class="btn btn-success"><i class="icon ion-plus-circled"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($makaleler) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Görsel</th>
            <th width="70%" scope="col">Başlık</th>
            <th scope="col" colspan="2">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($makaleler as $slide):
        ?>
        <tr>
          <th scope="row"><?=$slide->id?></th>
          <td>
            <img src="<?=PUBLIC_IMAGE . '/makale/' . $slide->photo?>" class="img-fluid w-100">
          </td>
          <td><?=$slide->baslik?></td>
          <td>
            <a href="<?=site_url("admin/makale-duzenle")?>?id=<?=$slide->id?>" class="btn btn-primary">
              <i class="icon ion-edit"></i> Düzenle
            </a>
          </td>
          <td>
            <a href="<?=site_url("admin/makale-sil")?>?id=<?=$slide->id?>" class="btn btn-danger">
              <i class="icon ion-trash-b"></i> Sil
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
          echo '<div class="alert alert-info">Hiç makale eklenmemiş.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
