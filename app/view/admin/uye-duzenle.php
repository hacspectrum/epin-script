<?php
  require view("admin/static/header");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Üye Düzenleme Formu</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <?php
        echo isset($response) ? '<div class="alert alert-' . $response["class"] . '">' . $response["message"] . '</div>' : null;
      ?>
      <form action="" method="post">
        <input type="hidden" value="1" name="duzenlemeForm">
        <div class="form-group">
          <label class="font-weight-bold">Üyelik Tarihi</label>
          <input type="text" class="form-control" readonly value="<?=date("d.m.Y H:i", strtotime($uye->created_at))?>">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">E-Posta Adresi</label>
          <input type="email" class="form-control" name="email" placeholder="E-Posta Adresi" value="<?=$uye->email?>" required>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Yeni Şifre</label>
          <input type="text" class="form-control" name="yeni_sifre" placeholder="Yeni Şifre (Şifre Değiştirme)">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Ad Soyad</label>
          <input type="text" class="form-control" name="adsoyad" placeholder="Adı Soyad" value="<?=$uye->adsoyad?>" required>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Telefon Numarası</label>
          <input type="text" class="form-control" name="phone_number" placeholder="Telefon Numarası" value="<?=$uye->phone_number?>" required>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Bayi Durumu</label>
          <select name="bayi" id="UyeBayiTipiSecim" class="form-control">
            <option value="1" <?=$uye->bayi == 1 ? 'selected' : null?>>Bayi</option>
            <option value="0" <?=$uye->bayi == 0 ? 'selected' : null?>>Bayi Değil</option>
          </select>
        </div>

        <div class="form-group" id="UyeBayiIndirimiDiv" <?=$uye->bayi == 0 ? 'style="display:none;"' : null?>>
          <label class="font-weight-bold">Bayi İndirimi (Yüzdelik) <span class="text-danger">Şu an: %<?=$uye->bayi_indirim?></span></label>
          <input type="number" class="form-control" placeholder="Bayi İndirimi (Örnek: 10 - Yüzdelik olarak hesaplanacaktır)" name="bayi_indirimi" value="<?=$uye->bayi_indirim?>" min="0" step="0.1">
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Rütbe Durumu</label>
          <select name="rutbe" class="form-control">
            <option value="1" <?=$uye->rutbe == 1 ? 'selected' : null?>>Yönetici</option>
            <option value="0" <?=$uye->rutbe == 0 ? 'selected' : null?>>Üye</option>
          </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">
            <i class="icon ion-checkmark-circled"></i> Güncelle
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Üye Kategori İndirimleri</h2>
    </div>
  </div>
  <?php
    $bayiKategoriIndirimleri = DB::get("SELECT * FROM bayi_kategori_indirimleri WHERE uye_id = '" . get("id") . "'");
  ?>
  <div class="row">

    <div class="col-md-6">

      <form action="" method="post">

        <div class="form-group">
          <label class="font-weight-bold">Kategori</label>
          <select name="kategori_id" class="form-control">
          <?php
            foreach(DB::get("SELECT id,kategori_adi FROM chip_kategoriler") as $cat):
           	  if( DB::getVar("SELECT COUNT(*) FROM bayi_kategori_indirimleri WHERE kategori_id = '" . $cat->id . "' AND uye_id = '" .  get("id") . "'") < 1 ){
          ?>
            <option value="<?=$cat->id?>"><?=$cat->kategori_adi?></option>
          <?php
          	  }
            endforeach;
          ?>
          </select>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">İndirim (Yüzdelik)</label>
          <input type="number" class="form-control" placeholder="İndirim (Örnek: 10 - Yüzdelik olarak hesaplanacaktır)" name="indirim" value="" min="0" step="1">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block" name="indirimEkle" value="1">
            <i class="icon ion-checkmark"></i> Ekle
          </button>
        </div>

      </form>
    </div>

    <div class="col-md-6">
      <?php
        if(count($bayiKategoriIndirimleri)){
          foreach($bayiKategoriIndirimleri as $indirim):
      ?>
      <?=DB::getVar("SELECT kategori_adi FROM chip_kategoriler WHERE id = '" . $indirim->kategori_id . "'")?>
      <div class="badge badge-success badge-pill">%<?=$indirim->indirim?></div>
      <a href="<?=site_url('admin/uye-kategori-indirim-sil?id=' . $indirim->id . '&uye_id=' . $indirim->uye_id)?>" class="btn btn-danger btn-sm">Sil</a>
      <hr>
      <?php
          endforeach;
        }else{
      ?>
      <div class="alert alert-info">Hiç indirim yapılmış kategori yok.</div>
      <?php
        }
      ?>
    </div>

  </div>
</div>

<?php
  require view("admin/static/footer");
?>
