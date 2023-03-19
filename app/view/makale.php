<?php
	require view("static/header");
?>

<div class="jumbotron bg-light rounded-0 text-white text-center mb-0 makale-bg" style="background-image:url('<?=PUBLIC_IMAGE . '/makale/' . $makale->photo?>')">
  <h1 class="display-3 text-primary"><?=$makale->baslik?></h1>
</div>
<div class="bg-dark py-5">
  <div class="container">
    <div class="row">
      <div class="<?=count($diger_makaleler) > 0 ? 'col-md-8' : 'col-md-12'?> text-white">
      	<img src="<?=PUBLIC_IMAGE . '/makale/' . $makale->photo?>" alt="<?=$makale->baslik?>" class="img-fluid d-block mr-auto mb-2" width="200">
        <div class="text">
        	<?=$makale->yazi?>
        </div>
      </div>
		<?php
			if(count($diger_makaleler) > 0){
		?>
			<div class="col-md-4">
			<?php
				foreach($diger_makaleler as $diger_makale):
		?>

				<div class="list-group">
					<a href="<?=site_url('makale/' . $diger_makale->seourl)?>" class="list-group-item bg-secondary border border-dark">
						<?=kisalt($diger_makale->baslik, 120)?>
					</a>
				</div>
		<?php
				endforeach;
		?>
			</div>
		<?php
			}
		?>
    </div>
  </div>
</div>
<div class="bg-dark py-3">
  <hr class="border border-light border-top-0">
</div>

<?php
	require view("static/footer");
?>
