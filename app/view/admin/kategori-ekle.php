<?php
  require view('admin/static/header');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Ürün Kategori Ekleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <?php
        echo isset($response) ? '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>' : null;
      ?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <input type="text" class="form-control" name="kategori_adi" placeholder="Kategori Adı">
        </div>

        <div class="form-group">
          <input type="file" class="form-control" name="gorsel">
        </div>

        <div class="form-group">
          <textarea name="aciklama" class="form-control"></textarea>
          <script>
            CKEDITOR.replace('aciklama');
          </script>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Anasayfa Görünümü</label>
          <select name="anasayfa_gorunumu" class="form-control">
            <option value="2">Alttaki Kategorilerde Görünsün</option>
            <option value="1">Üstte Görünsün</option>
            <option value="0">Görünmesin</option>
          </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Ekle</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view('admin/static/footer');
?>
