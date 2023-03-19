<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Ürün Kategori Düzenleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <?=isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <input type="text" class="form-control" name="kategori_adi" placeholder="Kategori Adı" value="<?=$kategori->kategori_adi?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Mevcut Görsel</label>
          <img src="<?=PUBLIC_IMAGE . '/kategori/' . $kategori->gorsel?>" class="img-fluid d-block" width="400" alt="<?=$kategori->kategori_adi?>">
        </div>

        <div class="form-group row">
          <div class="col-md-3">
            <label class="font-weight-bold">Yeni Görsel</label>
          </div>
          <div class="col-md-9">
            <input type="file" name="gorsel" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <textarea name="aciklama" class="form-control"><?=$kategori->aciklama?></textarea>
          <script>
            CKEDITOR.replace('aciklama');
          </script>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Anasayfa Görünümü</label>
          <select name="anasayfa_gorunumu" class="form-control">
            <option value="2" <?=$kategori->anasayfa_gorunumu == 2 ? 'selected' : null?>>Alttaki Kategorilerde Görünsün</option>
            <option value="1" <?=$kategori->anasayfa_gorunumu == 1 ? 'selected' : null?>>Üstte Görünsün</option>
            <option value="0" <?=$kategori->anasayfa_gorunumu == 0 ? 'selected' : null?>>Görünmesin</option>
          </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Güncelle</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
