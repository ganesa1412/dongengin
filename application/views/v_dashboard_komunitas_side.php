<!-- Sidebar -->
			<div class="col-md-4 db-sidebar" id="sidebar" data-aos="fade">
				<div class="card">
				  <div class="card-body text-center">
				  	<img src="<?php echo base_url() ?>assets/images/community/<?php echo $komunitas->profile_image ?>" class="sidebar-profile"data-aos="zoom-in" data-aos-delay="200">
				    <h5 class="card-title font-gotham-bold font-md" data-aos="fade-down" data-aos-delay="200"><?php echo $komunitas->community_name ?></h5>
				    <p class="card-text font-gotham-light font-sm" data-aos="fade" data-aos-delay="200"><?php echo $komunitas->kota ?></p>
				  </div>
				  <ul class="list-group list-group-flush">
					  <a href="<?php echo base_url('dashboard_komunitas/'.$permalink.'/post') ?>" class="list-group-item list-group-item-action">Postingan</a>
					  <a href="<?php echo base_url('dashboard_komunitas/'.$permalink.'/event') ?>" class="list-group-item list-group-item-action">Event Komunitas</a>
					  <?php if ($level == 0) { ?>
					  <a href="<?php echo base_url('dashboard_komunitas/'.$permalink.'/request') ?>" class="list-group-item list-group-item-action">Permintaan Anggota <span class="badge badge-primary"><?php echo $req_count ?></span></a>
					  <?php } ?>
					  <a href="<?php echo base_url('dashboard') ?>" class="list-group-item list-group-item-action">Kembali ke Dashboard User</a>
				  </ul>
				</div>
			</div>
