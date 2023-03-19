<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Ürün Kategorileri &nbsp; <a href="<?=site_url('admin/kategori-ekle')?>" class="btn btn-success"><i class="icon ion-plus-circled"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($kategoriler) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Görsel</th>
            <th width="40%" scope="col">Ürün Adı</th>
            <th scope="col">Anasayfa Görünümü</th>
            <th scope="col" colspan="2">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($kategoriler as $kategori):
        ?>
        <tr>
          <th scope="row"><?=$kategori->id?></th>
          <td>
            <img src="<?=PUBLIC_IMAGE . '/kategori/' . $kategori->gorsel?>" width="200" class="img-fluid">
          </td>
          <td><?=$kategori->kategori_adi?></td>
          <td>
            <?php
              if($kategori->anasayfa_gorunumu == 1){
                echo '<div class="badge badge-success badge-pill"><i class="icon ion-checkmark"></i> 1. Sıra</div>';
              }else if($kategori->anasayfa_gorunumu == 2){
                echo '<div class="badge badge-success badge-pill"><i class="icon ion-checkmark"></i> 2. Sıra</div>';
              }else {
                echo '<div class="badge badge-danger badge-pill"><i class="icon ion-close"></i></div>';
              }
            ?>
          </td>
          <td>
            <a href="<?=site_url('admin/kategori-duzenle')?>?id=<?=$kategori->id?>" class="btn btn-primary">
              <i class="icon ion-edit"></i> Düzenle
            </a>
          </td>
          <td>
            <a href="<?=site_url('admin/kategori-sil')?>?id=<?=$kategori->id?>" class="btn btn-danger">
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
          echo '<div class="alert alert-info">Hiç ürün kategorisi eklenmemiş.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
