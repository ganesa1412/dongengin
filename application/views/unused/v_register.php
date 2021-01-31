<div class="container-fluid" id="content">

		<div class="row" id="register">
			<div class="section">
				<div class="col-md-6 reg-left">
					<div class="text-left">
						<h3 class="font-nimbus-bold font-white">Mari Bergabung di</h3>
						<img src="assets/images/logo-white2.png" width="100%">
					</div>
				</div>
				
				<form class="col-md-6 reg-right bg-white" action="<?php echo base_url('process/register') ?>" enctype="multipart/form-data" method="post">
					<h2 class="font-lg font-nimbus-black font-green">Register</h2>
					<p class="font-green font-sm font-nimbus-bold">Temukan segala kebutuhanmu terkait Kopi Indonesia, kapanpun dan dimanapun kamu berada!</p>

					<?php 
						if ($this->session->userdata('verif') !== null) {
					 ?>

					 <h2 class="font-green">Terimakasih telah mendaftar, klik tautan verifikasi yang telah kami kirimkan ke Email kamu! <b>(<?php echo $this->session->userdata('email') ?>)</b></h2>

					<?php }else{ ?>

					<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
					<input type="text" class="form-control" placeholder="Tanggal Lahir" onclick="this.type='date'" name="tgl_lahir">
					<input type="number" class="form-control" placeholder="Nomor Telepon" name="no_hp">
					<input type="email" class="form-control" placeholder="Email" name="email">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<input type="password" class="form-control" placeholder="Ulangi Password" name="password2">
					<label>Foto Profil:</label>
					<input type="file" name="foto" class="form-control">

					<div class="text-right">
						<br>
						<button type="submit" class="button bg-gradient font-white font-md">Daftar</button>
						<?php 
							if ($this->session->userdata('crud_status') != null) {
								echo $this->session->userdata('crud_status');
							}

						 ?>
					</div>
					
					<?php } ?>
				</form>

			</div>
		</div>