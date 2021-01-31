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
						foreach ($my_pembelian as $pembelian) {
							$no++;
					?>
					<tr>
						<td class="font-sm"><?php echo $no ?>.</td>
						<td class="font-sm"><?php echo $pembelian->kode_transaksi ?></td>
						<td class="font-sm"><?php echo $pembelian->toko ?></td>
						<td class="font-sm"><?php echo rupiah($pembelian->total_harga + $pembelian->ongkos_kirim) ?></td>
						<td class="font-sm"><?php echo $status[$pembelian->status] ?></td>
						<td class="font-white" width="15%">
							<a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Lihat Detail</a>
							<a href="<?php echo base_url('crud/delete/pembelian/'.$pembelian->id_pembelian) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Batalkan pesanan ini?')"><i class="fa fa-trash"></i> Batalkan</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>