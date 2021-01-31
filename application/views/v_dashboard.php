	<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">

			<?php 
				$this->load->view('v_dashboard_side');
			 ?>
			
			<!-- Main Content -->
			<div class="col-md-8">
				<div class="card bg-success text-center font-white">
					<div class="card-body">
						<h3 class="font-md">Selamat Datang, <?php echo $this->session->userdata('name') ?></h3>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 text-center">
						<div class="card">
							<div class="card-body font-white">
								<img src="<?php echo base_url() ?>assets/images/feature/1.png" width="75%"><br><br>
								<a href="<?php echo base_url('dashboard_dongeng') ?>" class="button btn-success btn-lg">Dongeng</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 text-center">
						<div class="card">
							<div class="card-body font-white">
								<img src="<?php echo base_url() ?>assets/images/feature/2.png" width="75%"><br><br>
								<a href="<?php echo base_url('dashboard_dongeng') ?>" class="button btn-danger btn-lg">Komunitas</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>