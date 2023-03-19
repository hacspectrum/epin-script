<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Slider &nbsp; <a href="<?=site_url('admin/slider-ekle')?>" class="btn btn-success"><i class="icon ion-plus-circled"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($slider) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th width="70%" scope="col">Görsel</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($slider as $slide):
        ?>
        <tr>
          <th scope="row"><?=$slide->id?></th>
          <td>
            <img src="<?=PUBLIC_IMAGE . '/slider/' . $slide->gorsel?>" class="img-fluid w-100">
          </td>
          <td>
            <a href="<?=site_url('admin/slider-sil')?>?id=<?=$slide->id?>" class="btn btn-danger">
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
          echo '<div class="alert alert-info">Hiç slide eklenmemiş.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
