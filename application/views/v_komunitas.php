<!-- Header -->
	<div class="container-fluid bg-green" id="header-comm">
		<div class="row section">
			<div class="col-md-6 col-12 hc-left">
				<h2 class="font-gotham-bold font-xl font-white text-right" data-aos="fade-up" data-aos-delay="100">Yuk! Jadi Bagian dari Komunitas Dongeng!</h2>
			</div>
			<div class="col-md-6 col-12 hc-right text-right">
				<img src="assets/images/community/head.png" width="90%" data-aos="zoom-in-right">
				<img src="assets/images/community/star.png" width="80%" data-aos="fade-left" class="comm-star" data-aos-delay="200">
			</div>
		</div>
	</div>

	<!-- Content & Sidebar -->
	<div class="container-fluid with-header" id="ctn">
		<div class="row section">
			<!-- Main Content -->
			<div class="col-md-8" id="komunitas-page">
				
				<form data-aos="fade" action="<?php echo base_url('komunitas') ?>" method="post">
					<input type="text" name="keyword" placeholder="Cari" class="form-control form-control-sm">
					<button type="submit" class="button btn-green font-sm"><i class="fa fa-search"></i> Cari</button>
				</form>
				
				<?php 
					$colorid = -1;
					$lineid;
					foreach ($komunitas_res as $komunitas) {
						if ($colorid == 2) {
							$colorid = 0;
						}else{
							$colorid++;
						}

						if ($colorid == 0) {
							$lineid = 2;
						}else{
							$lineid = $colorid-1;
						}
				 ?>

				<div class="row comm-panel comm-panel-<?php echo $color[$colorid] ?>" data-aos="fade">
					<div class="col-md-6 font-white">
						<h2 class="font-gotham-bold font-lg"><?php echo $komunitas->community_name ?></h2>
						<div class="line bg-<?php echo $color[$lineid] ?>"></div>
						<p><i class="fa fa-map-marker"></i> <?php echo $komunitas->kota ?></p>
						<p><i class="fa fa-users"></i> <?php echo $komunitas->member ?> Anggota</p>
						<a href="<?php echo base_url('komunitas/'.$komunitas->permalink) ?>" class="button btn-green">Selengkapnya</a>
					</div>
					<div class="col-md-6">
						<img src="assets/images/community/<?php echo $komunitas->profile_image ?>">
					</div>
				</div>
				
				<?php } ?>
			</div>

			<?php 
				$this->load->view('v_sidebar.php');
			 ?>
		</div>
	</div>