<?php
  require view("admin/static/header");
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Yardım &nbsp; <a href="<?=site_url("admin/yardim-ekle")?>" class="btn btn-success"><i class="icon ion-plus-circled"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($yardim) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th width="50%" scope="col">Başlık</th>
            <th width="50%" scope="col">Yazı</th>
            <th scope="col" colspan="2">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($yardim as $slide):
        ?>
        <tr>
          <th scope="row"><?=$slide->id?></th>
          <td><?=$slide->baslik?></td>
          <td><?=kisalt($slide->yazi, 200)?></td>
          <td>
            <a href="<?=site_url("admin/yardim-duzenle")?>?id=<?=$slide->id?>" class="btn btn-primary">
              <i class="icon ion-edit"></i> Düzenle
            </a>
          </td>
          <td>
            <a href="<?=site_url("admin/yardim-sil")?>?id=<?=$slide->id?>" class="btn btn-danger">
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
          echo '<div class="alert alert-info">Hiç yardım başlığı eklenmemiş.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
