<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">
			<!-- Main Content -->
			<div class="col-md-8" id="dongeng-page">
				<form data-aos="fade" action="<?php echo base_url('dongeng') ?>" method="post">
					<input type="text" name="keyword" placeholder="Cari" class="form-control form-control-sm">
					<select class="form-control form-control-sm" name="id_category">
						<option value="0">Pilih Kategori</option>
						<?php 
							foreach ($kategori_res as $kategori) {
						 ?>
						 <option value="<?php echo $kategori->id_dongeng_category ?>"><?php echo $kategori->category_name ?></option>
						<?php } ?>
					</select>
					<button type="submit" class="button btn-green font-sm"><i class="fa fa-search"></i> Cari</button>
				</form>

				<?php foreach ($dongeng_res as $dongeng) { ?>
				<div class="row dongeng-panel" data-aos="fade">
					<div class="col-md-4">
						<img src="<?php echo base_url() ?>assets/images/dongeng/<?php echo $dongeng->image ?>">
					</div>
					<div class="col-md-8">
						<a href="<?php echo base_url('dongeng/'.$dongeng->permalink) ?>"><h2 class="font-gotham-bold font-md"><?php echo $dongeng->title ?></h2></a>
						<div class="line bg-black"></div>
						<p class="font-sm"><?php echo substr(strip_tags($dongeng->content), 0, 120) ?>...</p>
						<span class="badge bg-green font-white"><?php echo $dongeng->category_name ?></span>
						<span class="badge bg-green font-white"><?php echo $dongeng->name ?></span>
					</div>
					<div class="col-md-12">
						<div class="line bg-yellow"></div>
					</div>
				</div>
				<?php	} ?>

				
			</div>

			<?php 
				$this->load->view('v_sidebar.php');
			 ?>
		</div>
	</div>