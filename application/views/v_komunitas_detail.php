<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">
			<!-- Main Content -->
			<div class="col-md-8 bg-grey" id="komunitas-detail" data-aos="fade">
				<div class="kd-cover" style="background-image: url(<?php echo base_url() ?>assets/images/community/cover/<?php echo $komunitas->cover_image ?>);"></div>
				<div class="kd-name bg-green-darker font-white">
					<img src="<?php echo base_url() ?>assets/images/community/<?php echo $komunitas->profile_image ?>" class="kd-profile-pict" data-aos="zoom-in" data-aos-delay="200">
					<h2 class="font-gotham-bold font-md" data-aos="fade-right">
						<?php echo $komunitas->community_name ?>
					</h2>
					<div data-aos="Fade">
						<?php if ($logged) { ?>
						<a href="<?php echo base_url('process/request/'.$komunitas->permalink) ?>" onclick="return confirm('Ajukan bergabung dengan komunitas ini?')" class="button btn-green font-sm">Gabung</a>
						<?php }else{ ?>
							<a href="#" data-toggle="modal" data-target="#LoginModal" class="button btn-green font-sm">Login</a>
						<?php } ?>
					</div>
				</div>

				<div class="row kd-about">
					<div class="col-md-7">
						<h2 class="font-gotham-bold font-md">Profil Komunitas</h2>
						<div class="line bg-black"></div>
						<p class="font-sm font-gotham-light"><?php echo $komunitas->description ?></p>
					</div>
					<div class="col-md-5 kd-info">
						<div class="row">
							<div class="col-md-6 col-6 text-center">
								<i class="fa fa-users fa-4x font-pink"></i>
								<p class="font-sm">Anggota</p>
								<p class="font-md font-gotham-bold"><?php echo $member_count ?></p>
							</div>
							<div class="col-md-6 col-6 text-center">
								<i class="fa fa-calendar fa-4x font-pink"></i>
								<p class="font-sm">Event</p>
								<p class="font-md font-gotham-bold"><?php echo $event_count ?></p>
								<br>
							</div>
						</div>
						<div class="row comm-contact">
							<div class="col-md-1 col-1 text-center">
								<i class="fa fa-map-marker fa-2x font-pink"></i>
							</div>
							<div class="col-md-10 col-10">
								<p class="font-gotham-light font-sm"><?php echo $komunitas->address ?></p>
								<p class="font-gotham-light font-sm"><?php echo $komunitas->kota ?></p><br>
							</div>
						</div>
						<div class="row comm-contact">
							<div class="col-md-1 col-1 text-center">
								<i class="fa fa-phone fa-2x font-pink"></i>
							</div>
							<div class="col-md-10 col-10">
								<p class="font-gotham-light font-sm"><?php echo $komunitas->phone ?></p>
							</div>
						</div>
					</div>

					<div class="col-md-12 bg-grey2 member-list">
						<div class="row">
							<div class="col-md-12">
								<h2 class="font-gotham-bold font-md">Daftar Anggota</h2>
								<div class="line bg-black"></div>
							</div>
							<?php 
								$colorid = -1;
								foreach ($member_res as $member) {
									if ($colorid == 2) {
										$colorid = 0;
									}else{
										$colorid++;
									}
							 ?>
							<div class="col-md-3 col-6">
								<div class="member-panel">
									<img src="<?php echo base_url() ?>assets/images/user/<?php echo $member->profile_image ?>">
									<div class="member-name font-white
									text-center bg-<?php echo $color[$colorid] ?>">
										<p class="font-gotham-medium font-sm"><?php echo $member->name ?></p>
										<p class="font-gotham-light font-xs"><?php echo ($member->status==0?'Admin <i class="fa fa-star">':'Anggota') ?></i></p>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-md-12 c-event-list">
						<div class="row">
							<div class="col-md-12">
								<h2 class="font-gotham-bold font-md">Event oleh Komunitas</h2>
								<div class="line bg-black"></div>
							</div>

							<?php 
								foreach ($event_res as $event) {
									if ($colorid == 2) {
										$colorid = 0;
									}else{
										$colorid++;
									}
							 ?>
							<div class="col-md-6">
								<div class="c-event-panel">
									<img src="<?php echo base_url() ?>assets/images/event/<?php echo $event->image ?>">
									<div class="c-event-name font-white
									text-center bg-<?php echo $color[$colorid] ?>">
										<p class="font-gotham-medium font-sm"><?php echo $event->event_name ?></p>
										<p class="font-gotham-light font-sm"><i class="fa fa-calendar"></i> <?php echo format($event->date) ?> &nbsp; <i class="fa fa-map-marker"></i> <?php echo $event->kota ?></p>
										<a href="<?php echo base_url('event/'.$event->permalink) ?>" class="btn btn-outline-light btn-sm font-xs">Selengkapnya</a>
									</div>
								</div>
							</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>

			<?php 
				$this->load->view('v_sidebar.php');
			 ?>
		</div>
	</div>