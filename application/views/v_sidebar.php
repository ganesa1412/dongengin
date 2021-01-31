<!-- Sidebar -->
			<div class="col-md-4" id="sidebar">
				<div class="bg-pink2 font-white" data-aos="zoom-in">
					<h2 class="font-gotham-medium font-md">
						<img src="<?php echo base_url() ?>assets/images/icon/story.png">
						Dongeng Populer
					</h2>
					<div class="dongeng-list row align-item-center">
						<?php 
							foreach ($side_dongeng_res as $sdongeng) {
						 ?>
						<div class="col-md-3">
							<img src="<?php echo base_url() ?>assets/images/dongeng/<?php echo $sdongeng->image ?>">
						</div>
						<div class="col-md-9 align-middle">
							<h3 class="font-sm"><a href="<?php echo base_url('dongeng/'.$sdongeng->permalink) ?>"><?php echo $sdongeng->title ?></a></h2>
						</div>
						<?php } ?>
					</div>
					<br>
					<h2 class="font-gotham-medium font-md">
						<img src="<?php echo base_url() ?>assets/images/icon/community.png">
						Komunitas Teratas
					</h2>
					<ul class="comm-list font-sm">
						<?php 
							foreach ($side_community_res as $skom) {
						 ?>
						<li><i class="fa fa-caret-right"></i> <a href="<?php echo base_url('komunitas/'.$skom->permalink) ?>"><?php echo $skom->community_name ?></a> <span class="badge bg-green"><?php echo $skom->kota ?></span></li>
						<?php } ?>
					</ul>
					<br>
					<h2 class="font-gotham-medium font-md">
						<img src="<?php echo base_url() ?>assets/images/icon/event.png">
						Event Terdekat
					</h2>
					<div class="event-list row align-item-center">
						<?php 
							foreach ($side_event_res as $sevent) {
								$date = explode(" ", f_tg_bln($sevent->date));
						 ?>
						<div class="col-md-3 col-3">
							<div class="event-date text-center">
								<h2 class="font-gotham-bold font-md"><?php echo $date[0] ?></h2>
								<p class="font-sm"><?php echo $date[1] ?></p>
							</div>
						</div>
						<div class="col-md-9 col-9 align-middle">
							<h3 class="font-sm"><a href="<?php echo base_url('event/'.$sevent->permalink) ?>"><?php echo $sevent->event_name ?></a></h3>
						</div>
						<?php } ?>
					</div>
					<img src="<?php echo base_url() ?>assets/images/side-ballon.png" class="side-ballon">
					<img src="<?php echo base_url() ?>assets/images/petik.png" class="side-quote">
				</div>
			</div>