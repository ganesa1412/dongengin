<!-- HEADER -->
		<div class="row head" id="kedai-head">
			<div class="section">
				<div class="col-md-6">
					<h1 class="font-nimbus-black font-white font-xxl beli-header-text" data-aos="slide-up	">Kemana anda ingin menjelajah kopi?</h1>
				</div>
				
				<div class="putih-putih-1" data-aos="slide-up" data-aos-delay="600"></div>
				<div class="putih-putih-2" data-aos="slide-up" data-aos-delay="300"></div>
				<form class="putih-putih-3 bg-white" data-aos="zoom-in">
					<div class="col-md-4">
						<select id="sprov" class="form-control" name="id_provinsi" required="">
							<option value="0">- PROVINSI -</option>
							<?php foreach ($provinsi_res as $prov) {
							?>
							<option value="<?php echo $prov->id_wilayah ?>"><?php echo $prov->nama ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4">
						<select class="form-control" id="skota" name="id_kota" required="">
							<option value="0">- KOTA -</option>
						</select>	
					</div>
					<div class="col-md-4">
						<button class="button bg-gradient button-block font-white" type="submit">CARI</button>
					</div>
				</form>
			</div>
		</div>

<div class="row" id="produk">
			<div class="section">
				<?php 
					$no = 0;
					foreach ($kedai_res as $kedai) {
						$no++;
				 ?>
				<div class="col-md-4">
					<div class="produk-panel" data-aos="fade">
						<img src="<?php echo base_url() ?>assets/images/kedai/<?php echo $kedai->foto ?>">
						<div class="pp-body">
							<a href="<?php echo base_url('kedai_detail/'.$kedai->permalink) ?>"><h2 class="font-md font-nimbus-black font-green"><?php echo $kedai->nama ?></h2></a>
							<p class="font-sm font-nimbus-regular font-grey"><i class="fa fa-map-marker"></i> <?php echo ucwords(strtolower($ma_kota[$no])) ?></p>
							<p class="font-sm font-nimbus-bold font-green">Buka : <?php echo $kedai->jam_buka ?></p>
							<hr>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

		</div>