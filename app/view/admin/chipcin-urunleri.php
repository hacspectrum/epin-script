<?php
  require view("admin/static/header");
?>

<div class="container">
  
  <?php
    if(!is_array($obj->results)){
  ?>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger">Chipcin API tarafında problem tespit edildi!</div>
    </div>
  </div>
  <?php
      exit;
    }
  ?>
    
  <div class="row">
    <div class="col-md-12 pt-4 pb-4">
      <h2>Chipcin API (Kategoriler)</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Görsel</th>
            <th scope="col">İsim</th>
            <th scope="col" colspan="2">İstekler</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($obj->results as $ob):
        ?>
        <tr>
          <td><?=$ob->id?></td>
          <td width="200">
            <img src="https://chipsatisi.com/<?=trim($ob->image,",")?>" width="100%">
          </td>
          <td width="80%"><?=$ob->name?></td>
          <td><?=$ob->fields?></td>
          <td>
            <a href="<?=site_url("admin/chipcin-urunleri?step=urun&cat_id=" . $ob->id)?>" class="btn btn-primary btn-block">
              Ürünleri Listele
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
