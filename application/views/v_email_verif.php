	<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">
			<!-- Main Content -->
			<div class="col-md-8">
				<?php if ($this->session->userdata('fail') !== null) { ?>
					<div class="jumbotron bg-danger text-center font-md"><?php echo $this->session->userdata('fail') ?></div>	
				<?php 
							$this->session->session_destroy();
						}else{ 
				?>
					<div class="jumbotron text-center font-md">Pendaftaran berhasil. Silahkan klik tautan pendaftaran yang kami kirim ke email <?php echo $this->session->userdata('email') ?></div>
				<?php } ?>
			</div>

			<!-- Sidebar -->
			<div class="col-md-4" id="sidebar">
				<div class="bg-pink2 font-white" data-aos="zoom-in">
					<h2 class="font-gotham-medium font-md">
						<img src="assets/images/icon/story.png">
						Dongeng Populer
					</h2>
					<div class="dongeng-list row align-item-center">
						<div class="col-md-3">
							<img src="assets/images/dongeng/_.png">
						</div>
						<div class="col-md-9 align-middle">
							<h3 class="font-sm"><a href="#">Tuyul dan Mbak Yul VS Buto Ijo The Movie</a></h2>
						</div>
						<div class="col-md-3">
							<img src="assets/images/dongeng/_.png">
						</div>
						<div class="col-md-9 align-middle">
							<h3 class="font-sm"><a href="#">Timun Mas Naik Haji</a>
						</div>
						<div class="col-md-3">
							<img src="assets/images/dongeng/_.png">
						</div>
						<div class="col-md-9 align-middle">
							<h3 class="font-sm"><a href="#">Gadis Bertudung Saji</a></h2>
						</div>
					</div>
					<br>
					<h2 class="font-gotham-medium font-md">
						<img src="assets/images/icon/community.png">
						Komunitas Teratas
					</h2>
					<ul class="comm-list font-gotham-light font-sm">
						<li><a href="#">Komunitas Pemuja Rahasia</a> <span class="badge bg-green">Surabaya</span></li>
						<li><a href="#">Komunitas Pemuja Rahasia</a> <span class="badge bg-green">Surabaya</span></li>
						<li><a href="#">Komunitas Pemuja Rahasia</a> <span class="badge bg-green">Surabaya</span></li>
						<li><a href="#">Komunitas Pemuja Rahasia</a> <span class="badge bg-green">Surabaya</span></li>
					</ul>
					<br>
					<h2 class="font-gotham-medium font-md">
						<img src="assets/images/icon/event.png">
						Event Terdekat
					</h2>
					<div class="event-list row align-item-center">
						<div class="col-md-3">
							<div class="event-date text-center">
								<h2 class="font-gotham-bold font-md">23</h2>
								<p class="font-sm">Feb</p>
							</div>
						</div>
						<div class="col-md-9 align-middle">
							<h3 class="font-sm"><a href="#">Dies Natalis Unesa 2021</a></h3>
						</div>
						<div class="col-md-3">
							<div class="event-date text-center">
								<h2 class="font-gotham-bold font-md">23</h2>
								<p class="font-sm">Feb</p>
							</div>
						</div>
						<div class="col-md-9 align-middle">
							<h3 class="font-sm"><a href="#">Koin untuk Esa, Bantu Esa Beli Kuota</a></h3>
						</div>
						<div class="col-md-3">
							<div class="event-date text-center">
								<h2 class="font-gotham-bold font-md">23</h2>
								<p class="font-sm">Feb</p>
							</div>
						</div>
						<div class="col-md-9 align-middle">
							<h3 class="font-sm"><a href="#">Koin untuk Esa</a></h3>
						</div>
					</div>
					<img src="assets/images/side-ballon.png" class="side-ballon">
					<img src="assets/images/petik.png" class="side-quote">
				</div>
			</div>
		</div>
	</div>