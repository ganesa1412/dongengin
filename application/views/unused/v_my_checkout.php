<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			<!-- DASHBOARD CONTENT -->
			<div class="col-md-8" id="db-content">
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-shopping-cart"></i>  Checkout Pemesanan</h3>
				<div class="line bg-gradient"></div>
				<br>
				<div class="db-panel" data-aos="fade">
					<div class="db-panel-head">
						<h3 class="font-nimbus-black font-black font-md">
							<?php echo $k_toko->nama ?>
							<div class="line bg-gradient"></div>
						</h3>
						<p class="fr-link font-sm"><i class="fa fa-map-marker"></i> <?php echo $p_kota ?></p>
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
							foreach ($my_keranjang as $keranjang) { 
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
							<th></th>
						</tr>
						</table>
					</div>
				</div>


				<div class="db-panel" data-aos="fade">
					<div class="db-panel-head">
						<h3 class="font-nimbus-black font-black font-md">
							Ongkos Kirim
							<div class="line bg-gradient"></div>
						</h3>
					</div>
					<div class="db-panel-body">
						<table class="table table-striped font-sm" width="100%">
							<tr>
								<th>Kurir</th>
								<td>:</td>
								<td>JNE Reguler</td>
							</tr>
							<tr>
								<th>Berat (g)</th>
								<td>:</td>
								<td><?php echo $berat ?></td>
							</tr>
							<tr>
								<th>Kota Asal</th>
								<td>:</td>
								<td>
									<?php echo ucwords(strtolower($p_kota)) ?>
								</td>
							</tr>
							<tr>
								<th>Kota Tujuan</th>
								<td>:</td>
								<td><?php echo ucwords(strtolower($a_kota)) ?></td>
							</tr>
							<tr class="font-md">
								<th class="text-center">Ongkos Kirim</th>
								<th>:</th>
								<th><?php echo rupiah($ongkir) ?></th>
							</tr>
						</table>
					</div>
				</div>

				<form action="<?php echo base_url('process/confirm_order') ?>" method="post"  class="db-panel" data-aos="fade">
					<div class="db-panel-body">
						<table class="table table-striped font-sm" width="100%">
							<tr class="font-md">
								<th class="text-center">Total Pembayaran</th>
								<th>:</th>
								<th><?php echo rupiah($grandtotal+$ongkir) ?></th>
							</tr>
							<tr>
								<th class="text-center">Metode Pembayaran:</th>
								<td>:</td>
								<td>
									<select class="form-control" name="payment">
										<option>ATM BNI</option>
										<option>ATM BTN</option>
										<option>ATM BRI</option>
										<option>LinkAja!</option>
									</select>
									<input type="hidden" name="id_toko" value="<?php echo $k_toko->id_toko ?>">
									<input type="hidden" name="id_pembelian" value="<?php echo $k_toko->id_pembelian ?>">
									<input type="hidden" name="total_harga" value="<?php echo $grandtotal ?>">
									<input type="hidden" name="ongkos_kirim" value="<?php echo $ongkir ?>">
								</td>
							</tr>
						</table>
						<div class="text-right">
							<button class="button bg-gradient font-white" type="submit">Bayar</button>
						</div>
					</div>
				</form>
			</div>
		</div>