	<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">

			<?php 
				$this->load->view('v_dashboard_komunitas_side');
			 ?>
			
			<!-- Main Content -->
			<div class="col-md-8 db-content">
				 <h2 class="font-gotham-bold font-md">Postingan Anggota</h2>
				<div class="line bg-yellow"></div>

				<div class="card post-card">
					<div class="card-body row">
						<div class="col-md-1">
							<img src="<?php echo base_url() ?>assets/images/user/<?php echo $post_res->profile_image ?>" class="pc-img">
						</div>
						<div class="col-md-11 pc-name">
							<h4 class="font-gotham-bold font-md"><?php echo $post_res->name ?></h4>
						</div>
						<div class="col-md-12">
							<p class="font-gotham-book font-sm"><?php echo $post_res->content ?> </p>

							<p class="font-gotham-light font-sm"><i class="fa fa-calendar"></i> <?php echo format($post_res->date) ?> | <i class="fa fa-comments"></i> <?php echo $comment[$post_res->id_community_post] ?></p>
						</div>
					</div>
					<form class="card-footer" action="<?php echo base_url('crud/add/community_comment') ?>" method="post">
						<h4 class="font-gotham-bold font-sm mb-3">Komentar :</h4>
						<div class="row">
							<?php foreach ($comment_res as $com) { ?>
								<div class="col-md-1">
									<img src="<?php echo base_url() ?>assets/images/user/<?php echo $com->profile_image ?>" class="pc-img">
								</div>
								<div class="col-md-11 pc-name">
									<h4 class="font-gotham-light font-md"><?php echo $com->name ?></h4>
								</div>
								<div class="col-md-12 py-3">
									<p class="font-gotham-book font-sm"><?php echo $com->content ?> </p>
									<hr>
								</div>
							<?php } ?>
						</div>
						<textarea class="form-control" placeholder="Tulis sesuatu..." name="content" style="height: 50px;"></textarea><br>
						<input type="hidden" name="id_post" value="<?php echo $post_res->id_community_post ?>">
						<input type="hidden" name="permalink" value="<?php echo $komunitas->permalink ?>">
						<div class="text-right">
							<button class="button btn-green" type="submit">Kirim</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>