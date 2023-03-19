<?php
  require view("static/header");
?>

<div class="jumbotron bg-light rounded-0 text-white text-center mb-0 urun-bg">
  <h1 class="display-3">Bildirimlerim</h1>
  <p class="lead text-primary"><i class="icon ion-cash"></i> Tüm bildirimleriniz</p>
</div>
<div class="bg-dark py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

      	<div id="BildirimAccordion" role="tablist">

      		<div class="card border-light bg-dark rounded-0">
      			<div class="card-header bg-light border-primary rounded-0" role="tab" id="headingOne">
      				<h5 class="mb-0">
      					<a data-toggle="collapse" href="#odemeBildirimleriCollapse" aria-expanded="false" aria-controls="odemeBildirimleriCollapse">
      						Ödeme Bildirimlerim
      					</a>
      				</h5>
      			</div>

      			<div id="odemeBildirimleriCollapse" class="collapse <?=$active == 'odeme' ? 'show' : ($active != 'cekim' ? 'show' : null)?>" role="tabpanel" aria-labelledby="odemeBildirimleriCollapse" data-parent="#BildirimAccordion">
      				<div class="card-body">
      					<?php
      						if( count($odemeBildirimleri) > 0 ){
      					?>
      					<div class="row">
      						<div class="col-md-12 text-white">
      						<table class="table table-striped urunlerTablosu">
      							<thead>
      								<tr>
      									<th scope="col" class="bg-secondary text-primary text-left">BANKA ADI</th>
      									<th scope="col" class="bg-secondary text-primary text-center">AD SOYAD</th>
      									<th scope="col" class="bg-secondary text-primary text-center">IBAN</th>
      									<th scope="col" class="bg-secondary text-primary text-center">HESAP NO</th>
      									<th scope="col" class="bg-secondary text-primary text-center">ŞUBE NO</th>
      									<th scope="col" class="bg-secondary text-primary text-center">DURUM</th>
      									<th scope="col" class="bg-secondary text-primary text-center">TARİH</th>
      								</tr>
      							</thead>
      							<tbody>
      							<?php
      								foreach($odemeBildirimleri as $bildirim):
      									$banka = DB::getRow("SELECT * FROM bankalar WHERE id = '" . $bildirim->banka_id . "'");
      							?>
      								<tr>
      									<td>
      										<?=$banka->banka_adi?>
      									</td>
      									<td class="text-center">
      										<?=$banka->adsoyad?>
      									</td>
      									<td class="text-center">
      										<?=$banka->iban?>
      									</td>
      									<td class="text-center">
      										<?=$banka->hesapno?>
      									</td>
      									<td class="text-center">
      										<?=$banka->subeno?>
      									</td>
      									<td class="text-center">
      									<?php
      										switch($bildirim->durum){
      											default:
      											case 0:
      												echo '<div class="badge badge-pill badge-warning">
      													<i class="icon ion-clock"></i> Beklemede
      												</div>';
      											break;
      											case 1:
      												echo '<div class="badge badge-pill badge-success">
      													<i class="icon ion-checkmark-circled"></i> Onaylandı
      												</div>';
      											break;
      											case 2:
      												echo '<div class="badge badge-pill badge-danger">
      													<i class="icon ion-close-circled"></i> Geçersiz
      												</div>';
      											break;
      										}
      									?>
      									</td>
      									<td class="text-center">
      										<?=date("d.m.Y H:i", strtotime($bildirim->created_at))?>
      									</td>
      								</tr>
      							<?php
      								endforeach;
      							?>
      							</tbody>
      						</table>
      						<p class="help-block text-muted text-center">
      							<small>Son 10 ödeme bildiriminiz görüntüleniyor.</small>
      						</p>
      						</div>
      					</div>
      					<?php
      						}else{
      					?>
      					<div class="alert alert-warning">Hiç ödeme bildirimi bulunmuyor.</div>
      					<?php
      						}
      					?>
      				</div>
      			</div>
      		</div>

      		<div class="card border-light bg-dark rounded-0">
      			<div class="card-header bg-light border-primary rounded-0" role="tab" id="headingOne">
      				<h5 class="mb-0">
      					<a data-toggle="collapse" href="#CekimBildirimleriCollapse" aria-expanded="false" aria-controls="CekimBildirimleriCollapse">
      						Çekim Bildirimlerim
      					</a>
      				</h5>
      			</div>

      			<div id="CekimBildirimleriCollapse" class="collapse <?=$active == 'cekim' ? 'show' : null?>" role="tabpanel" aria-labelledby="CekimBildirimleriCollapse" data-parent="#BildirimAccordion">
      				<div class="card-body">
      					<?php
      						if( count($cekimBildirimleri) > 0 ){
      					?>
      					<div class="row">
      						<div class="col-md-12 text-white">
      						<table class="table table-striped urunlerTablosu">
      							<thead>
      								<tr>
      									<th scope="col" class="bg-secondary text-primary text-left">BANKA ADI</th>
      									<th scope="col" class="bg-secondary text-primary text-center">AD SOYAD</th>
      									<th scope="col" class="bg-secondary text-primary text-center">IBAN</th>
      									<th scope="col" class="bg-secondary text-primary text-center">HESAP NO</th>
      									<th scope="col" class="bg-secondary text-primary text-center">ŞUBE NO</th>
      									<th scope="col" class="bg-secondary text-primary text-center">DURUM</th>
      									<th scope="col" class="bg-secondary text-primary text-center">TARİH</th>
      								</tr>
      							</thead>
      							<tbody>
      							<?php
      								foreach($cekimBildirimleri as $c_bildirim):
      							?>
      								<tr>
      									<td>
      										<strong><?=$c_bildirim->banka_adi?></strong>
      									</td>
      									<td class="text-center">
      										<?=$c_bildirim->adsoyad?>
      									</td>
      									<td class="text-center">
      										<?=$c_bildirim->iban?>
      									</td>
      									<td class="text-center">
      										<?=$c_bildirim->hesapno?>
      									</td>
      									<td class="text-center">
      										<?=$c_bildirim->subeno?>
      									</td>
      									<td class="text-center">
      									<?php
      										switch($c_bildirim->durum){
      											default:
      											case 0:
      												echo '<div class="badge badge-pill badge-warning">
      													<i class="icon ion-clock"></i> Beklemede
      												</div>';
      											break;
      											case 1:
      												echo '<div class="badge badge-pill badge-success">
      													<i class="icon ion-checkmark-circled"></i> Onaylandı
      												</div>';
      											break;
      											case 2:
      												echo '<div class="badge badge-pill badge-danger">
      													<i class="icon ion-close-circled"></i> Geçersiz
      												</div>';
      											break;
      										}
      									?>
      									</td>
      									<td class="text-center">
      										<?=date("d.m.Y H:i", strtotime($c_bildirim->created_at))?>
      									</td>
      								</tr>
      							<?php
      								endforeach;
      							?>
      							</tbody>
      						</table>
      						<p class="help-block text-center text-muted">
      							<small>Son 10 çekim bildiriminiz görüntüleniyor.</small>
      						</p>
      						</div>
      					</div>
      					<?php
      						}else {
      					?>
      					<div class="alert alert-warning">Hiç çekim bildiriminiz bulunmuyor.</div>
      					<?php
      						}
      					?>
      				</div>
      			</div>
      		</div>

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
