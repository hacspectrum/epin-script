  <script src="<?=asset_url('admin/jquery-3.2.1.min.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script>
    $('.copy-text-btn').click(function(e){
      var copyText = $($(this).data('copyelement'));
      copyText.select();
      document.execCommand("Copy");
    });
    $('#GameCardKategoriRadio').click(function(e){
      var value = $(this).val();
      if( value == 1 ){
        $('#kategoriTypeAPI').show();
      }
    });
    $('#NormalKategoriRadio').click(function(e){
      var value = $(this).val();
      if( value == 0 ){
        $('#kategoriTypeAPI').hide();
      }
    });
    $('#UyeBayiTipiSecim').on('change', function(){
      if($(this).val() == 1){
        $('#UyeBayiIndirimiDiv').show();
      }else{
        $('#UyeBayiIndirimiDiv').hide();
      }
    });
    $('#BizeSatSelect').on('change', function(){
      if($(this).val() == 1){
        $('#BizeSatFiyatDiv').show();
      }else{
        $('#BizeSatFiyatDiv').hide();
      }
    });
  </script>
</body>
</html>
