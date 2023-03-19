<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Ürünler &nbsp; <a href="<?=site_url('admin/urun-ekle')?>" class="btn btn-success"><i class="icon ion-plus-circled"></i> Yeni Ekle</a></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 pb-3">
      <form method="get" action="">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Kategoriye göre listele</label>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="kategori_no">
              <option value="" selected>Seçiniz...</option>
            <?php
              foreach(DB::get("SELECT * FROM chip_kategoriler order by id DESC") as $kategori):
            ?>
              <option <?=get("kategori_no") == $kategori->id ? 'selected' : null?> value="<?=$kategori->id?>"><?=$kategori->kategori_adi?></option>
            <?php
              endforeach;
            ?>
            </select>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="kategoriListele" value="1">Listele</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if( count($urunler) > 0 ){
      ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th width="40%" scope="col">Ürün Adı</th>
            <th scope="col">Kategori</th>
            <th scope="col">Fiyatı</th>
            <th scope="col" colspan="3">İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($urunler as $urun):
        ?>
        <tr>
          <th scope="row"><?=$urun->id?></th>
          <td>
            <?=$urun->urun_adi?><br>
          </td>
          <td>
            <div class="badge badge-dark px-3 py-2"><?=DB::getVar("SELECT kategori_adi FROM chip_kategoriler WHERE id = '" . $urun->kategori_id . "'")?></div>
          </td>
          <td class="text-center">
            <div class="badge badge-success badge-pill">
              <?=$urun->fiyat?> TL
            </div>
          </td>
          <td>
            <a href="<?=site_url('admin/urun-duzenle')?>?id=<?=$urun->id?>" class="btn btn-primary">
              <i class="icon ion-edit"></i> Düzenle
            </a>
          </td>
          <td>
            <a href="<?=site_url('admin/urun-sil')?>?id=<?=$urun->id?>" class="btn btn-danger">
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
          echo '<div class="alert alert-info">Hiç ürün eklenmemiş.</div>';
        }
      ?>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
