<!-- FOOTER -->
  <div id="footer" class="container-fluid bg-blue-darken">
    <div class="row section">
      <div class="col-md-3">
        <img src="<?php echo base_url() ?>assets/images/logo_white.png" width="100%">
      </div>
      <div class="col-md-9 text-right font-white font-lg">
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-facebook-square"></i></a>
        <a href="#"><i class="fa fa-youtube-square"></i></a>
      </div>
    </div>
  </div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/summernote.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jssocials.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/aos.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/global.js"></script>

<?php if (isset($provinsi_res)) { ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sprov').change(function(){
          $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "<?php echo base_url("get/kota"); ?>", // Isi dengan url/path file php yang dituju
            data: {id_provinsi : $("#sprov").val()}, // data yang akan dikirim ke file yang dituju
            dataType: "json",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){ // Ketika proses pengiriman berhasil
              // set isi dari combobox kota
              // lalu munculkan kembali combobox kotanya
              $("#skota").html(response.list_kota).show();
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
          });
        });

      $('#sprov2').change(function(){
          $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "<?php echo base_url("get/kota"); ?>", // Isi dengan url/path file php yang dituju
            data: {id_provinsi : $("#sprov2").val()}, // data yang akan dikirim ke file yang dituju
            dataType: "json",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){ // Ketika proses pengiriman berhasil
              // set isi dari combobox kota
              // lalu munculkan kembali combobox kotanya
              $("#skota2").html(response.list_kota).show();
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
          });
        });

      
    });
  
</script>
<?php } ?>
</body>
</html>