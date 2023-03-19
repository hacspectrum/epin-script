<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Ürün Düzenleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <?php
        echo isset($response) ? '<div class="alert alert-' . $response["class"] . '">' . $response["message"] . '</div>' : null;
      ?>
      <form action="" method="post">

        <div class="form-group">
          <input type="text" class="form-control form-control-lg" name="urun_adi" placeholder="Ürün Adı" value="<?=$urun->urun_adi?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Fiyat</label>
          <input type="number" class="form-control" name="fiyat" placeholder="Fiyat" step="0.0001" min="0" value="<?=$urun->fiyat?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Stok Durumu</label>
          <select name="stok" class="form-control">
            <option value="" selected>Seçiniz...</option>
            <option value="1" <?=$urun->stok == 1 ? 'selected' : null?>>Stokta Bulunuyor</option>
            <option value="0" <?=$urun->stok == 0 ? 'selected' : null?>>Stokta Yok</option>
          </select>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Kategori</label>
          <select name="kategori" id="urunKategoriSecimi" class="form-control">
            <option value="" selected>Seçiniz...</option>
          <?php
            foreach(DB::get("SELECT * FROM chip_kategoriler order by kategori_adi ASC") as $kategori):
          ?>
            <option value="<?=$kategori->id?>" <?=$urun->kategori_id == $kategori->id ? 'selected' : null?>><?=$kategori->kategori_adi?></option>
          <?php
            endforeach;
          ?>
          </select>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Sıralama</label>
          <input type="number" class="form-control" min="0" placeholder="Sıralama (Örneğin 1)" name="siralama" value="<?=$urun->siralama?>">
        </div>

        <div class="form-group">
          <textarea name="makale" class="form-control"><?=$urun->makale?></textarea>
          <script>
            CKEDITOR.replace('makale');
          </script>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Kaydet</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
