<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2><span class="text-primary"><?=$urun->urun_adi?></span> Ürün Kodları &nbsp; <a href="<?=site_url('admin/kod-ekle?urun_id=' . $urun->id)?>" class="btn btn-success"><i class="icon ion-plus-circled"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($kodlar) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th width="40%" scope="col">Kod</th>
            <th scope="col">Ürün</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($kodlar as $kod):
        ?>
        <tr>
          <th scope="row"><?=$kod->id?></th>
          <td>
            <small>
                <span class="badge badge-light"><?=$kod->code?></span>
            </small>
          </td>
          <td>
            <div class="badge badge-dark px-3 py-2"><?=DB::getVar("SELECT urun_adi FROM chip_urunler WHERE id = '" . $kod->product_id . "'")?></div>
          </td>
          <td>
            <?php
                if($kod->status == 0 && $kod->user_id == 0){
            ?>
            <span class="badge badge-success">Boşta</span>
            <?php
                }
            ?>
            <?php
                if($kod->status == 1 && $kod->user_id != 0){
            ?>
            <a href="<?=site_url("admin/uye?id=" . $kod->user_id)?>"></a>
            <?php
                }
            ?>
          </td>
          <td>
            <a href="<?=site_url('admin/kod-sil')?>?code_id=<?=$kod->id?>" class="btn btn-danger">
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
          echo '<div class="alert alert-info">Hiç veri bulunmuyor.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
