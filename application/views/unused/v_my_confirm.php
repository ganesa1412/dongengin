<div class="row" id="dashboard">

			<?php 
				$data['type'] = $sidebar_type;
				$this->load->view('v_dashboard_side', $data);
			 ?>

			<!-- DASHBOARD CONTENT -->
			<div class="col-md-8" id="db-content">
				<h3 class="font-nimbus-bold font-lg"><i class="fa fa-check"></i> Pembayaran</h3>
				<div class="line bg-gradient"></div>
				<br>

				<div class="db-panel" data-aos="fade">
					<div class="db-panel-body text-center">
						<p class="font-md">Lakukan pembayaran sebesar <b><?php echo rupiah($pembelian->total_harga+$pembelian->ongkos_kirim) ?></b> ke:</p>
						<h3 class="font-lg"><?php echo $pembelian->payment ?>:</h3>
						<h3 class="font-lg">xxxxxxxxxxxx a/n Badan Ekonomi Kreatif</h3>
					</div>
				</div>
			</div>
		</div>