<div class="row head" id="pedia-head">
			<div class="section">
				<div class="col-md-7">
					<h1 class="font-nimbus-black font-white font-xxl beli-header-text" data-aos="slide-up">Ingin Tahu Lebih Banyak Tentang Kopi?</h1>
				</div>
				
				<div class="putih-putih-1" data-aos="slide-up" data-aos-delay="600"></div>
				<div class="putih-putih-2" data-aos="slide-up" data-aos-delay="300"></div>
				<form class="putih-putih-3 bg-white" data-aos="zoom-in">
					<div class="col-md-3">
						<h2 class="font-lg font-nimbus-black">Ensikopidia</h2>
					</div>
					<div class="col-md-3">
						<select class="form-control">
							<option value="0">Pilih Kategori</option>
							<?php 
								foreach ($kategori_res as $kategori) {
							 ?>
							 <option value="<?php echo $kategori->id_artikel_kategori ?>"><?php echo $kategori->nama ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="Apa yang anda cari?" class="form-control">
					</div>
					<div class="col-md-3">
						<button class="button bg-gradient button-block font-white" type="submit">CARI</button>
					</div>
				</form>
			</div>
		</div>

		<div class="row" id="artikel">
			<div class="section">
				<div class="col-md-6 artikel-featured-col">
					<div class="af-panel swiper-container2" data-aos="fade">
						<div class="swiper-wrapper">
							<?php 
								foreach ($featured_res as $featured) {
							 ?>
							<div class="swiper-slide" style="background-image: url(<?php echo base_url() ?>assets/images/artikel/<?php echo $featured->foto; ?>); ">
								<div class="af-text">
									<h3 class="font-nimbus-bold font-white font-md"><?php echo $featured->judul ?></h3>
									<p class="font-nimbus-regular font-sm font-white"><?php echo substr(strip_tags($featured->isi),0,120) . "..."; ?></p>
									<p class="text-right font-nimbus-bold font-sm font-white"><a href="<?php echo base_url('artikel/'.$featured->permalink) ?>">Selengkapnya <i class="fa fa-angle-double-right"></i></a></p>
								</div>
							</div>
							<?php } ?>
						</div>

					</div>
				</div>
				<?php 
					foreach ($artikel_res as $artikel) {
				 ?>
				<div class="col-md-3 artikel-col" data-aos="fade">
					<div class="artikel-panel font-white">
						<img src="<?php echo base_url() ?>assets/images/artikel/<?php echo $artikel->foto ?>">
						<a href="<?php echo base_url('artikel/'.$artikel->permalink) ?>" class="font-md font-nimbus-bold bg-green ap-text text-center"><?php echo $artikel->judul ?></a>
					</div>
				</div>
				<?php } ?>
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