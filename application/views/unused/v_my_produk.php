<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			  <!-- MODAL -->
			<form class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/produk') ?>" enctype="multipart/form-data">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header header-help bg-gradient font-white">
			        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
			        <h3 class="modal-title text-center" id="myModalLabel">Tambah Produk:</h3>
			      </div>
			      <div class="modal-body row">
			      	<div class="col-md-6">
			      		<label>Nama Produk:</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Toko" required="">
						<br>

						<label>Deskripsi:</label>
						<textarea class="form-control" placeholder="Deskripsi" name="deskripsi" required=""></textarea>
						<br>		

						<label>Foto:</label>
						<input type="file" class="form-control" name="image" required="">
						<br>

						<label>Harga:</label>
						<input type="text" class="form-control" name="harga" placeholder="Minimal Pemesanan" required="">
			      	</div>

			      	<div class="col-md-6">
			      		<label>Kategori:</label>
						<select id="sprov" class="form-control" name="id_kategori" required="">
							<option value="0">- PILIH -</option>
							<?php foreach ($kategori_res as $ctg) {
							?>
							<option value="<?php echo $ctg->id_produk_kategori ?>"><?php echo $ctg->nama ?></option>
							<?php } ?>
						</select>
						<br>

						<label>Minimal Pemesanan:</label>
						<input type="text" class="form-control" name="min_pemesanan" placeholder="Minimal Pemesanan" required="">
						<br>	

						<label>Berat (gram):</label>
						<input type="text" class="form-control" name="berat" placeholder="Berat (gram)" required="">

						<input type="hidden" name="id_toko" value="<?php echo $toko->id_toko ?>">
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
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-coffee"></i> Daftar Produk</h3>
				<a href="#" class="fr-link font-md" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Produk</a>
				<div class="line bg-gradient"></div>
				<br>
				<table class="table table-bordered table-striped db-table">
					<tr>
						<th>No.</th>
						<th>Foto</th>
						<th>Nama Produk</th>
						<th>Aksi</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($my_produk as $produk) {
							$no++;
					?>
					<tr>
						<td><?php echo $no ?>.</td>
						<td style="max-width: 100px !important"><img src="<?php echo base_url('assets/images/produk/'.$produk->foto) ?>" width="100%"></td>
						<td><?php echo $produk->nama ?></td>
						<td class="font-white" width="10%">
							<a href="#" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sunting</a>
							<a href="<?php echo base_url('crud/delete/produk/'.$produk->id_produk) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Produk ini?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>