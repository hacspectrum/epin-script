<?php
  require view("admin/static/header");
?>

<div class="container">
  
  <?php
    if(!is_array($obj->results)){
  ?>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger">Chipcin API tarafında problem tespit edildi! <strong>(Bu kategoride ürün de olmayabilir)</strong></div>
    </div>
  </div>
  <?php
      exit;
    }
  ?>

  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Chipcin API (Ürünler)</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">İsim</th>
            <th scope="col">Üye Fiyatı</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($obj->results as $ob):
        ?>
        <tr>
          <td><?=$ob->id?></td>
          <td><?=$ob->name?></td>
          <td><?=$ob->price?></td>
          <td>
            <?php
              $link = site_url("admin/urun-ekle?chipcin=1&isim=" . urlencode($ob->name) . "&uye_fiyati=" . urlencode($ob->price) . "&bayi_fiyati=0&site_sahibi=0&maliyet_fiyat=0&chipcin_cat_id=" . get("cat_id") . "&chipcin_id=" . $ob->id);
            ?>
            <a href="<?=$link?>" class="btn btn-outline-success btn-block">
              Doldur
            </a>
          </td>
        </tr>
        <?php
          endforeach;
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
  require view("admin/static/footer");
?>
