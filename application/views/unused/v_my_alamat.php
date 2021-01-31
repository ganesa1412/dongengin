<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			 <!-- MODAL -->
			<form class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/user_alamat') ?>" enctype="multipart/form-data">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header header-help bg-gradient font-white">
			        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
			        <h3 class="modal-title text-center" id="myModalLabel">Tambah Data:</h3>
			      </div>
			      <div class="modal-body row">
			      	<div class="col-md-6">
			      		<label>Nama Penerima:</label>
						<input type="text" class="form-control" name="penerima" placeholder="Nama Penerima" required="">
						<br>

						<label>Nomor Telepon:</label>
						<input type="number" class="form-control" name="no_hp" placeholder="Nomor Telepon" required="">
						<br>					

						<label>Alamat:</label>
						<textarea class="form-control" placeholder="Alamat" name="alamat" required=""></textarea>
						<br>

						<label>Keterangan:</label>
						<textarea class="form-control" placeholder="Keterangan" name="keterangan" required=""></textarea>
						<br>
			      	</div>

			      	<div class="col-md-6">
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
			<!-- MODAL END -->

			<!-- DASHBOARD CONTENT -->
			<div class="col-md-8" id="db-content">
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-map-marker"></i> Daftar Alamat</h3>
				<a href="#" class="fr-link font-md" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Alamat</a>
				<div class="line bg-gradient"></div>
				<br>
				<table class="table table-bordered table-striped db-table">
					<tr>
						<th>No.</th>
						<th>Penerima</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($my_alamat as $alamat) {
							$no++;
					?>
					<tr>
						<td><?php echo $no ?>.</td>
						<td>
							<?php echo $alamat->penerima ?> <br>
							(<?php echo $alamat->no_hp ?>)
						</td>
						<td>
							<?php echo $alamat->alamat ?><br>,
							<?php echo ucwords(strtolower($ma_kota[$no])) ?><br>
							<?php echo $ma_provinsi[$no]." ".$alamat->kode_pos ?><br>
							(Keterangan: <?php echo $alamat->keterangan ?>)
						</td>
						<td class="font-white" width="10%">
							<a href="#" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sunting</a>
							<a href="<?php echo base_url('crud/delete/user_alamat/'.$alamat->id_user_alamat) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Alamat ini?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>