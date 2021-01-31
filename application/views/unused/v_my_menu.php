<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			 <!-- MODAL -->
			<form class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/menu') ?>" enctype="multipart/form-data">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header header-help bg-gradient font-white">
			        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
			        <h3 class="modal-title text-center" id="myModalLabel">Tambah Data:</h3>
			      </div>
			      <div class="modal-body">
			      		<input type="hidden" name="id_kedai" value="<?php echo $kedai->id_kedai ?>">
			      		<label>Nama Menu:</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Menu" required="">
						<br>
						
						<label>Harga:</label>
						<input type="number" class="form-control" name="harga" placeholder="Harga" required="">
						<br>

						<label>Kategori:</label>
						<select class="form-control" name="kategori">
							<option>Makanan</option>
							<option>Minuman</option>
						</select>

						<input type="hidden" name="id_kedai" value="<?php echo $kedai->id_kedai ?>">
				      <div class="modal-footer text-right">
				      	<input type="submit" class="button bg-gradient font-white" value="Simpan">
				      </div>
			      	</div>
					
			      </div>
			    </div>
			</form>
			<!-- MODAL END -->

			<!-- DASHBOARD CONTENT -->
			<div class="col-md-8" id="db-content">
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-map-marker"></i> Daftar Menu</h3>
				<a href="#" class="fr-link font-md" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Menu</a>
				<div class="line bg-gradient"></div>
				<br>
				<table class="table table-bordered table-striped db-table">
					<tr>
						<th width="10%">No.</th>
						<th>Menu</th>
						<th>Aksi</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($my_menu as $menu) {
							$no++;
					?>
					<tr>
						<td class="font-md"><?php echo $no ?>.</td>
						<td class="font-md"><?php echo $menu->nama ?></td>
						<td class="font-white" width="15%">
							<a href="#" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sunting</a>
							<a href="<?php echo base_url('crud/delete/menu/'.$menu->id_menu) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Menu ini?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>