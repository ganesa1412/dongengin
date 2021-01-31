<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			  <!-- MODAL -->
			<form class="modal fade" id="tambahtoko" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/toko') ?>" enctype="multipart/form-data">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header header-help bg-gradient font-white">
			        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
			        <h3 class="modal-title text-center" id="myModalLabel">Tambah Toko:</h3>
			      </div>
			      <div class="modal-body row">
			      	<div class="col-md-6">
			      		<label>Nama Toko:</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Toko" required="">
						<br>

						<label>Deskripsi:</label>
						<textarea class="form-control" placeholder="Deskripsi" name="deskripsi" required=""></textarea>
						<br>		

						<label>Foto Profil:</label>
						<input type="file" class="form-control" name="image" required="">
						<br>

						<label>Alamat:</label>
						<textarea class="form-control" placeholder="Alamat" name="alamat" required=""></textarea>
						<br>
			      	</div>

			      	<div class="col-md-6">

						

			      		<label>Provinsi:</label>
						<select id="sprov2" class="form-control" name="id_provinsi" required="">
							<option value="0">- PILIH -</option>
							<?php foreach ($provinsi_res as $prov) {
							?>
							<option value="<?php echo $prov->id_wilayah ?>"><?php echo $prov->nama ?></option>
							<?php } ?>
						</select>
						<br>

						<label>Kabupaten/Kota:</label>
						<select class="form-control" id="skota2" name="id_kota" required="">
							<option value="0">- PILIH -</option>
						</select>
						<br>

						<label>Kode Pos:</label>
						<input type="number" class="form-control" placeholder="Kode Pos" name="kode_pos" required="">

				      </div>

				      <div class="modal-footer text-right col-md-12">
				      	<input type="submit" class="button bg-gradient font-white" value="Simpan">
				      </div>
			      	</div>
					
			      </div>
			    </div>
			</form>

			<!-- DASHBOARD CONTENT -->
			<form enctype="multipart/form-data" action="<?php echo ($detail?base_url('crud/edit/toko/'.$toko->id_toko):'.') ?>" class="col-md-8" id="db-content">
				<?php if ($detail) { ?>
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-shopping-bag"></i> <?php echo $toko->nama ?></h3>
				<div class="line bg-gradient"></div>
				<br>
		      		<label>Nama Toko:</label>
					<input type="text" class="form-control" name="nama" placeholder="Nama Toko" required="" value="<?php echo $toko->nama ?>">
					<br>

					<label>Deskripsi:</label>
					<textarea class="form-control" placeholder="Deskripsi" name="deskripsi" required=""><?php echo $toko->deskripsi ?></textarea>
					<br>		

					<label>Foto Profil:</label>
					<input type="file" class="form-control" name="image" required="">
					<br>

					<div class="text-right">
				      	<input type="submit" class="button bg-gradient font-white" value="Simpan">
				      </div>
				    <?php } ?>

				    <div class="col-md-12">
						<h3 class="font-nimbus-bold font-lg"><i class="fa fa-shopping-bag"></i> Toko saya</h3>
						<a href="#" data-toggle="modal" data-target="#tambahtoko" class="fr-link font-md"><i class="fa fa-plus"></i> Tambah Toko</a>
						<div class="line bg-gradient"></div>
					</div>
					<?php 
						if ($count['toko'] == 0) {
					 ?>
					<div class="col-md-12 text-center font-sm">
						<br>
						<p>Anda Belum memiliki toko, klik <b>"Tambah Toko"</b> untuk menambahkan toko anda</p>
					</div>
					<?php }else{
							foreach ($my_toko as $toko) {
					 ?>
					<div class="col-md-6 col-xs-12">
						<a href="<?php echo base_url('my_toko/'.$toko->permalink) ?>">
							<div class="stats-panel bg-gradient text-center font-white">
								<img src="<?php echo base_url() ?>assets/images/toko/<?php echo $toko->foto ?>" class="profile">
								<p class="font-md font-nimbus-regular text-left"><?php echo $toko->nama ?></p>
							</div>
						</a>
					</div>
					<?php 
							}
						} 
					?>
				</div>
			</div>
		</form>