<?php
  require view("static/header");
?>
<div class="jumbotron bg-light rounded-0 text-white text-center mb-0 yardim-bg">
  <h1 class="display-3">Yardım</h1>
  <p class="lead"><i class="icon ion-help-buoy"></i> Destek Merkezi</p>
</div>
<div class="bg-dark py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-white">

        <div id="accordion" role="tablist">

          <?php
            $yardim = DB::get("SELECT * FROM yardim order by id DESC");
            if(count($yardim) > 0){
              foreach($yardim as $yrd):
          ?>
          <div class="card border-light bg-dark">
            <div class="card-header bg-light border-primary" role="tab" id="headingcollaps<?=$yrd->id?>">
              <h5 class="mb-0">
                <a class="text-white" data-toggle="collapse" href="#collaps<?=$yrd->id?>" aria-expanded="true" aria-controls="collaps<?=$yrd->id?>">
                  <?=$yrd->baslik?>
                </a>
              </h5>
            </div>

            <div id="collaps<?=$yrd->id?>" class="collapse" role="tabpanel" aria-labelledby="headingcollaps<?=$yrd->id?>" data-parent="#accordion">
              <div class="card-body">
                <?=$yrd->yazi?>
              </div>
            </div>
          </div>
          <?php
              endforeach;
            }else{
          ?>
          <div class="alert alert-light">Hiç yardım başlığı bulunamadı.</div>
          <?php
            }
          ?>

        </div>

      </div>
    </div>
  </div>
</div>
<div class="bg-dark py-3">
  <hr class="border border-light border-top-0">
</div>
<?php
  require view("static/footer");
?>
