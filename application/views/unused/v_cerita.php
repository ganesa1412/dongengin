<div class="container-fluid" id="content">
		
		<div class="row" id="stories">
			<div class="section">
				<div class="col-md-9">
					<h1 class="font-xl font-nimbus-black" data-aos="fade-right">Cerita Sukses</h1>
					<div class="line bg-gradient" data-aos="fade-up" data-aos-delay="200"></div>
					<?php 
						foreach ($cerita_res as $cerita) {
					 ?>
					<div class="story-panel row" data-aos="fade">
						<div class="col-md-4 stories-img">
							<img src="<?php echo base_url() ?>assets/images/cerita/<?php echo $cerita->foto ?>">
						</div>
						<div class="col-md-8 stories-text">
							<h2 class="font-md font-nimbus-bold"><a href="<?php echo base_url('cerita_detail/'.$cerita->permalink) ?>"><?php echo $cerita->judul ?></a></h2>
							<p class="font-nimbus-regular font-sm"><?php echo substr(strip_tags($cerita->isi),0,150) . "..."?></p>
							<i class="fa fa-calendar"></i>  &nbsp; <?php echo format($cerita->tanggal)." ".$cerita->jam ?>
						</div>
					</div>
					<?php } ?>
					

					<div class="text-right">
						<ul class="pagination">
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- SIDEBAR -->
				<div class="col-md-3" id="sidebar">
					<h2 class="font-md font-nimbus-bold">Cerita Pilihan</h2>
					<div class="line bg-gradient"></div>
					<?php foreach ($featured_res as $featured) { ?>
					<div class="row side-stories">
						<div class="col-md-4">
							<img src="<?php echo base_url() ?>assets/images/cerita/<?php echo $featured->foto ?>">
						</div>
						<div class="col-md-8"><a href="<?php echo base_url('cerita_detail/'.$featured->permalink) ?>" class="font-sm font-nimbus-bold"><?php echo $featured->judul ?></a></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<div class="row" id="bottom-cta">
			<div class="section">
				<div class="col-md-12 text-center">
					<h2 class="font-lg font-nimbus-bold" data-aos="fade-down">Siap bergabung jadi mitra Kopi.id?</h2>
					<a href="register.html" class="button button-rounded bg-gradient font-sm font-white" data-aos="fade" data-aos-delay="200">Daftar Sekarang</a>
				</div>
			</div>
		</div>