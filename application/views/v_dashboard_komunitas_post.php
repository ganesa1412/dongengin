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

				<form class="card" method="post" action="<?php echo base_url('crud/add/community_post') ?>">
					<div class="card-body">
						<textarea class="form-control" placeholder="Tulis sesuatu..." name="content" style="height: 100px;"></textarea><br>
						<input type="hidden" name="id_community" value="<?php echo $komunitas->id_community ?>">
						<input type="hidden" name="permalink" value="<?php echo $komunitas->permalink ?>">
						<div class="text-right">
							<button class="button btn-green" type="submit">Kirim</button>
						</div>
					</div>
				</form>
				<?php 
					foreach ($post_res as $post) {
				 ?>
				<div class="card post-card">
					<div class="card-body row">
						<div class="col-md-1">
							<img src="<?php echo base_url() ?>assets/images/user/<?php echo $post->profile_image ?>" class="pc-img">
						</div>
						<div class="col-md-11 pc-name">
							<h4 class="font-gotham-bold font-md"><?php echo $post->name ?></h4>
						</div>
						<div class="col-md-12">
							<p class="font-gotham-book font-sm"><?php echo $post->content ?> </p>

							<p class="font-gotham-light font-sm"><i class="fa fa-calendar"></i> <?php echo format($post->date) ?> | <i class="fa fa-comments"></i> <?php echo $comment[$post->id_community_post] ?></p>
						</div>
					</div>
					<div class="card-footer">
						<a href="<?php echo base_url('dashboard_komunitas/'.$permalink.'/comment/'.$post->id_community_post) ?>" class="button btn-green">Lihat Komentar</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>