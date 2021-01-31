<!-- MODAL -->
	<div class="modal fade" id="daftarmenu" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/menu') ?>" enctype="multipart/form-data">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header header-help bg-gradient font-white">
	        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
	        <h3 class="modal-title text-center" id="myModalLabel">Daftar Menu</h3>
	      </div>
	      <div class="modal-body row">
			<div class="col-md-6">
				<table class="table table-striped font-md" width="100%">
					<tr>
						<th colspan="3" class="text-center bg-success font-nimbus-bold">
							Makanan
						</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($makanan_res as $makanan) {
							$no++;
					?>
					<tr>
						<td width="10%" class="text-center"><?php echo $no ?>.</td>
						<td><?php echo $makanan->nama ?></td>
						<td class="text-right"><?php echo rupiah($makanan->harga) ?></td>
					</tr>
					<?php
						}
					 ?>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table table-striped font-md" width="100%">
					<tr>
						<th colspan="3" class="text-center bg-success font-nimbus-bold">
							Minuman
						</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($minuman_res as $minuman) {
							$no++;
					?>
					<tr>
						<td width="10%" class="text-center"><?php echo $no ?>.</td>
						<td><?php echo $minuman->nama ?></td>
						<td class="text-right"><?php echo rupiah($minuman->harga) ?></td>
					</tr>
					<?php
						}
					 ?>
				</table>
			</div>
			
	      </div>
	    </div>
	</div>
</div>
	<!-- MODAL END -->

<div class="row" id="kedai-detail">
			<div class="col-md-6 pd-image" style="background-image: url(<?php echo base_url() ?>assets/images/kedai/<?php echo $kedai->foto ?>);">
				<div class="pd-title">
					<h2 class="font-lg font-white font-nimbus-black"><?php echo $kedai->nama ?></h2>
					<h3 class="font-md font-white font-nimbus-bold"><?php echo ucwords(strtolower($p_kota)) ?></h3>
				</div>
			</div>
			<div class="col-md-6 pd-desc">
				<table class="table font-sm" width="100%">
					<tr>
						<td width="25%">Nama Kedai</td>
						<td width="5%">:</td>
						<td><?php echo $kedai->nama ?></td>
					</tr>
						<td width="25%">Hari Buka</td>
						<td width="5%">:</td>
						<td><?php echo $kedai->hari_buka ?></td>
					</tr>
					</tr>
						<td width="25%">Jam Buka</td>
						<td width="5%">:</td>
						<td><?php echo $kedai->jam_buka ?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td><?php echo $kedai->deskripsi ?></td>
					</tr>
					<tr>
						<td>Alamat Kedai</td>
						<td>:</td>
						<td>
							<?php echo $kedai->alamat ?><br>
							<?php echo ucwords(strtolower($p_kota)) ?>
						</td>
					</tr>
				</table>
				<a href="#" class="button bg-gradient font-white" data-toggle="modal" data-target="#daftarmenu">Daftar Menu</a>
			</div>
		</div>