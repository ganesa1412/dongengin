<!-- MODAL -->
      <form class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/pembelian') ?>" enctype="multipart/form-data">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header header-help bg-gradient font-white">
              <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
              <h3 class="modal-title text-center" id="myModalLabel">Pilih alamat:</h3>
            </div>
            <div class="modal-body">
              <table class="table table-striped table-bordered" width="100%">
              	<?php 
              		$no = 0;
              		foreach ($my_alamat as $alamat) { 
              			$no++;
              	?>
              	<tr>
              		<td><input type="radio" name="id_alamat" value="<?php echo $alamat->id_user_alamat ?>" <?php echo ($no==1?"checked":'') ?>></td>
              		<td>
						<?php echo $alamat->penerima ?> <br>
						(<?php echo $alamat->no_hp ?>)
					</td>
					<td>
						<?php echo $alamat->alamat ?><br>
						<?php echo ucwords(strtolower($ma_kota[$no])) ?><br>
						<?php echo $ma_provinsi[$no]." ".$alamat->kode_pos ?><br>
						(Keterangan: <?php echo $alamat->keterangan ?>)
					</td>
              	</tr>
              	<?php } ?>
              	<input type="hidden" name="id_toko" value="0" id="hidden-toko">
              </table>
            </div>

              <div class="modal-footer text-right">
                <input type="submit" class="button bg-gradient font-white" value="Beli">
              </div>
          
            </div>
          </div>
      </form>
      <!-- MODAL END -->

<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			<!-- DASHBOARD CONTENT -->
			<div class="col-md-8" id="db-content">
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-shopping-cart"></i>  Keranjang Belanja</h3>
				<div class="line bg-gradient"></div>
				<br>
				<?php 
					$no = 0;
					foreach ($my_keranjang_toko as $k_toko) { 
						$no++;
				?>
				<div class="db-panel" data-aos="fade">
					<div class="db-panel-head">
						<h3 class="font-nimbus-black font-black font-md">
							<?php echo $k_toko->nama ?>
							<div class="line bg-gradient"></div>
						</h3>
						<p class="fr-link font-sm"><i class="fa fa-map-marker"></i> <?php echo $p_kota[$no] ?></p>
					</div>
					<div class="db-panel-body text-left">
						<table class="table table-striped db-table" width="100%">
							<tr>
								<th width="5%">No.</th>
								<th colspan="2">Produk</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Aksi</th>
							</tr>
						<?php 

							$grandtotal = 0;
							$no2 = 0;
							foreach ($my_keranjang[$no] as $keranjang) { 
								$no2++;
								$total = $keranjang->harga * $keranjang->quantity;
								$grandtotal += $total;
						?>
							<tr>
								<td><?php echo $no2 ?>.</td>
								<td width="20%"><img src="<?php echo base_url() ?>assets/images/produk/<?php echo $keranjang->foto ?>" width="100%"></td>
								<td><?php echo $keranjang->produk ?></td>
								<td class="text-center"><?php echo $keranjang->quantity ?></td>
								<td class="text-center"><?php echo rupiah($total) ?></td>
								<td class="font-white" width="10%">
									<a href="#" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Sunting</a>
									<a href="<?php echo base_url('crud/delete/keranjang/'.$keranjang->id_keranjang) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Hapus Alamat ini?')"><i class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php } ?>
						<tr class="font-md">
							<th colspan="4" class="text-center" style="padding-top: 12px;">Total Harga :</th>
							<th class="text-center" style="padding-top: 12px;"><?php echo rupiah($grandtotal) ?></th>
							<th>
								<button data-toggle="modal" data-target="#alamat" onclick="set_co(<?php echo $k_toko->id_toko ?>)" class="button font-sm bg-gradient font-white">Beli</button>
							</th>
						</tr>
						</table>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>