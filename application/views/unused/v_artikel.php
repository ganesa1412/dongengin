<div class="row head pedia-read" id="pedia-head">
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
				<div class="col-md-8 story-detail" data-aos="fade">
					<h1 class="font-xl font-nimbus-black" data-aos="fade-right"><?php echo $artikel->judul ?></h1>
					<div class="line bg-gradient" data-aos="fade-up" data-aos-delay="200"></div>

					<?php echo str_replace("http://localhost/kopi/", base_url(), $artikel->isi)  ?>

					<h3 class="font-sm font-nimbus-bold">Bagikan:</h3>
					<div id="share"></div>

					<div id="disqus_thread"></div>
					<script>

					/**
					*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
					
					var disqus_config = function () {
					this.page.url = "http://pojokmedia.id/";  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = '<?php echo $artikel->permalink ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};
					
					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://edpulsif.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					<br><br>
				</div>
				
				<div class="col-md-4">
					<?php 
						foreach ($artikel_res as $art) {
					 ?>
					<div class="artikel-col" data-aos="fade">
						<div class="artikel-panel font-white">
							<img src="<?php echo base_url() ?>assets/images/artikel/<?php echo $art->foto ?>">
							<a href="<?php echo base_url('artikel/'.$art->permalink) ?>" class="font-md font-nimbus-bold bg-green ap-text text-center"><?php echo $art->judul ?></a>
						</div>
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