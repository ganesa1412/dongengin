<!-- Sidebar -->
			<div class="col-md-4 db-sidebar" id="sidebar" data-aos="fade">
				<div class="card">
				  <div class="card-body text-center">
				  	<img src="assets/images/user/<?php echo $this->session->userdata('profile_image') ?>" class="sidebar-profile"data-aos="zoom-in" data-aos-delay="200">
				    <h5 class="card-title font-gotham-bold font-md" data-aos="fade-down" data-aos-delay="200"><?php echo $this->session->userdata('name') ?></h5>
				    <p class="card-text font-gotham-light font-xs" data-aos="fade" data-aos-delay="200"><?php echo $this->session->userdata('email');?></p>
				    
					  <ul class="list-group list-group-flush">
						  <a href="<?php echo base_url('dashboard') ?>" class="list-group-item list-group-item-action">Dashboard</a>
						  <a href="<?php echo base_url('dashboard_dongeng') ?>" class="list-group-item list-group-item-action">Dongeng Saya</a>
						  <a href="<?php echo base_url('dashboard_komunitas') ?>" class="list-group-item list-group-item-action">Komunitas Saya</a>
						  <a href="<?php echo base_url('process/logout') ?>" class="list-group-item list-group-item-action">Keluar</a>
					  </ul>
				  </div>
				</div>
			</div>
