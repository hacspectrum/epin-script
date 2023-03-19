<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-4 mb-4">
      <h2>Genel Ayarlar</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

      <?php
        if( isset($response) ):
          echo '<div class="alert alert-'.$response["class"].'">'.$response["message"].'</div>';
        endif;
      ?>

      <form action="" method="post">

        <div class="form-group">
          <label class="font-weight-bold">FACEBOOK URL</label>
          <input type="text" placeholder="FACEBOOK URL" name="facebook_url" class="form-control" value="<?=FACEBOOK_URL?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">TWITTER URL</label>
          <input type="text" placeholder="TWITTER URL" name="twitter_url" class="form-control" value="<?=TWITTER_URL?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">INSTAGRAM URL</label>
          <input type="text" placeholder="INSTAGRAM URL" name="instagram_url" class="form-control" value="<?=INSTAGRAM_URL?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Hakkımızda Metni</label>
          <textarea name="hakkimizda" class="ckeditor"><?=$ayar->hakkimizda_metni?></textarea>
          <script>
      			CKEDITOR.replace('hakkimizda');
      		</script>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Anasayfa Kategori Listeleme Başlığı</label>
          <input type="text" class="form-control" name="anasayfa_kategori_listeleme_basligi" value="<?=$ayar->anasayfa_kategori_listeleme_basligi?>" placeholder="Anasayfa Kategori Listeleme Başlığı">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Skype Adresi</label>
          <input type="text" class="form-control" name="skype" placeholder="Skype Adresi" value="<?=$ayar->skype?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Telefon Numarası</label>
          <input type="text" class="form-control" name="telefon" placeholder="Telefon Numarası" value="<?=$ayar->telefon?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Masa Bulucu</label>
          <input type="text" class="form-control" name="masabulucu" placeholder="Masa Bulucu" value="<?=$ayar->masabulucu?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Adres</label>
          <textarea name="adres" rows="10" class="form-control"><?=$ayar->adres?></textarea>
        </div>

        <hr>

        <div class="form-group">
          <label class="font-weight-bold">Site Başlığı</label>
          <input type="text" name="site_title" class="form-control" value="<?=SITE_TITLE?>" placeholder="Site Başlığı">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Meta Description</label>
          <textarea name="meta_desc" class="form-control" placeholder="META Description" rows="5"><?=META_DESCRIPTION?></textarea>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Meta Keywords</label>
          <input type="text" name="meta_keyw" class="form-control" value="<?=META_KEYWORDS?>" placeholder="META Keywords">
        </div>

        <div class="form-group mb-0">
          <button type="submit" class="btn btn-success btn-block">Kaydet</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
