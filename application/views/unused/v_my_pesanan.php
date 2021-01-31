<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			<!-- DASHBOARD CONTENT -->
			<div class="col-md-8" id="db-content">
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-map-marker"></i> Riwayat Transaksi</h3>
				<div class="line bg-gradient"></div>
				<br>
				<table class="table table-bordered table-striped db-table">
					<tr>
						<th width="10%">No.</th>
						<th>Kode Transaksi</th>
						<th>Toko</th>
						<th>Total Pembayaran</th>
						<th>Status Pemesanan</th>
						<th>Aksi</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($my_pesanan as $pesanan) {
							$no++;
					?>
					<tr>
						<td class="font-sm"><?php echo $no ?>.</td>
						<td class="font-sm"><?php echo $pesanan->kode_transaksi ?></td>
						<td class="font-sm"><?php echo $pesanan->buyer ?></td>
						<td class="font-sm"><?php echo rupiah($pesanan->total_harga + $pesanan->ongkos_kirim) ?></td>
						<td class="font-sm"><?php echo $status[$pesanan->status] ?></td>
						<td class="font-white" width="15%">
							<a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Lihat Detail</a>
							<a href="<?php echo base_url('crud/delete/pesanan/'.$pesanan->id_pembelian) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Batalkan pesanan ini?')"><i class="fa fa-trash"></i> Batalkan</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>