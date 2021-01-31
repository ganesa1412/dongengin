<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			  <!-- MODAL -->
			<form class="modal fade" id="tambahkedai" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/kedai') ?>" enctype="multipart/form-data">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header header-help bg-gradient font-white">
			        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
			        <h3 class="modal-title text-center" id="myModalLabel">Tambah Kedai:</h3>
			      </div>
			      <div class="modal-body row">
			      	<div class="col-md-6">
			      		<label>Nama Kedai:</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Toko" required="">
						<br>

						<label>Deskripsi:</label>
						<textarea class="form-control" placeholder="Deskripsi" name="deskripsi" required=""></textarea>
						<br>		

						<label>Foto Profil:</label>
						<input type="file" class="form-control" name="image" required="">
						<br>

						<label class="col-md-12">Hari Buka:</label>
						<div class="col-md-5">
							<select class="form-control hari" name="hari_buka1">
								<option>Senin</option>
								<option>Selasa</option>
								<option>Rabu</option>
								<option>Kamis</option>
								<option>Jumat</option>
								<option>Sabtu</option>
								<option>Minggu</option>
							</select>
						</div>
						<div class="col-md-2 text-center">-</div>
						<div class="col-md-5">
							<select class="form-control hari" name="hari_buka2">
								<option>Senin</option>
								<option>Selasa</option>
								<option>Rabu</option>
								<option>Kamis</option>
								<option>Jumat</option>
								<option>Sabtu</option>
								<option>Minggu</option>
							</select>
						</div>
						<div class="col-md-12">
							<input type="checkbox" name="setiaphari" id="setiaphari"> <label for="setiaphari">Setiap Hari</label>
						</div>

						<label class="col-md-12">Jam Buka:</label>
						<div class="col-md-5">
							<select class="form-control jam" name="jam_buka1">
								<option>00:00</option>
								<option>01:00</option>
								<option>02:00</option>
								<option>03:00</option>
								<option>04:00</option>
								<option>05:00</option>
								<option>06:00</option>
								<option>07:00</option>
								<option>08:00</option>
								<option>09:00</option>
								<option>10:00</option>
								<option>11:00</option>
								<option>12:00</option>
								<option>13:00</option>
								<option>14:00</option>
								<option>15:00</option>
								<option>16:00</option>
								<option>17:00</option>
								<option>18:00</option>
								<option>19:00</option>
								<option>20:00</option>
								<option>21:00</option>
								<option>22:00</option>
								<option>23:00</option>
								<option>23:59</option>
							</select>
						</div>
						<div class="col-md-2 text-center">-</div>
						<div class="col-md-5">
							<select class="form-control jam" name="jam_buka2">
								<option>00:00</option>
								<option>01:00</option>
								<option>02:00</option>
								<option>03:00</option>
								<option>04:00</option>
								<option>05:00</option>
								<option>06:00</option>
								<option>07:00</option>
								<option>08:00</option>
								<option>09:00</option>
								<option>10:00</option>
								<option>11:00</option>
								<option>12:00</option>
								<option>13:00</option>
								<option>14:00</option>
								<option>15:00</option>
								<option>16:00</option>
								<option>17:00</option>
								<option>18:00</option>
								<option>19:00</option>
								<option>20:00</option>
								<option>21:00</option>
								<option>22:00</option>
								<option>23:00</option>
								<option>23:59</option>
							</select>
						</div>

						<div class="col-md-12">
							<input type="checkbox" name="duaempat" id="duaempat"> <label for="duaempat">24 Jam</label>
						</div>
			      	</div>

			      	<div class="col-md-6">
						<label>Alamat:</label>
						<textarea class="form-control" placeholder="Alamat" name="alamat" required=""></textarea>
						<br>

			      		<label>Provinsi:</label>
						<select id="sprov" class="form-control" name="id_provinsi" required="">
							<option value="0">- PILIH -</option>
							<?php foreach ($provinsi_res as $prov) {
							?>
							<option value="<?php echo $prov->id_wilayah ?>"><?php echo $prov->nama ?></option>
							<?php } ?>
						</select>
						<br>

						<label>Kabupaten/Kota:</label>
						<select class="form-control" id="skota" name="id_kota" required="">
							<option value="0">- PILIH -</option>
						</select>
						<br>
				      </div>

				      <div class="modal-footer text-right col-md-12">
				      	<input type="submit" class="button bg-gradient font-white" value="Simpan">
				      </div>
			      	</div>
					
			      </div>
			    </div>
			</form>


			<!-- DASHBOARD CONTENT -->
			<form enctype="multipart/form-data" action="<?php echo ($detail?base_url('crud/edit/kedai/'.$kedai->id_kedai):'.') ?>" class="col-md-8" id="db-content">
				<?php if ($detail) { ?>
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-shopping-bag"></i> <?php echo $kedai->nama ?></h3>
				<div class="line bg-gradient"></div>
				<br>
		      		<label>Nama Kedai:</label>
					<input type="text" class="form-control" name="nama" placeholder="Nama Kedai" required="" value="<?php echo $kedai->nama ?>">
					<br>

					<label>Deskripsi:</label>
					<textarea class="form-control" placeholder="Deskripsi" name="deskripsi" required=""><?php echo $kedai->deskripsi ?></textarea>
					<br>		

					<label>Foto Profil:</label>
					<input type="file" class="form-control" name="image" required="">
					<br>

					<div class="text-right">
				      	<input type="submit" class="button bg-gradient font-white" value="Simpan">
				      </div>
				    <?php } ?>

				    <div class="col-md-12">
						<h3 class="font-nimbus-bold font-lg"><i class="fa fa-coffee"></i> Kedai saya</h3>
						<a href="#" data-toggle="modal" data-target="#tambahkedai" class="fr-link font-md"><i class="fa fa-plus"></i> Tambah Kedai</a>
						<div class="line bg-gradient"></div>
					</div>
					<?php 
						if ($count['kedai'] == 0) {
					 ?>
					<div class="col-md-12 text-center font-sm">
						<br>
						<p>Anda Belum memiliki kedai, klik <b>"Tambah Kedai"</b> untuk menambahkan kedai anda</p>
					</div>
					<?php }else{
							foreach ($my_kedai as $kedai) {
					 ?>
					<div class="col-md-6 col-xs-12">
						<a href="<?php echo base_url('my_kedai/'.$kedai->permalink) ?>">
							<div class="stats-panel bg-gradient text-center font-white">
								<img src="<?php echo base_url() ?>assets/images/kedai/<?php echo $kedai->foto ?>" class="profile">
								<p class="font-md font-nimbus-regular text-left"><?php echo $kedai->nama ?></p>
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