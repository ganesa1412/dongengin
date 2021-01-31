<div class="container-fluid" id="content">
		
		<div class="row" id="stories">
			<div class="section">
				<div class="col-md-9 story-detail" data-aos="fade">
					<h1 class="font-xl font-nimbus-black" data-aos="fade-right"><?php echo $cerita->judul ?></h1>
					<div class="line bg-gradient" data-aos="fade-up" data-aos-delay="200"></div>

					<?php echo str_replace("http://192.168.1.2/kopi/", base_url(), $cerita->isi)  ?>

					<h3 class="font-sm font-nimbus-bold">Bagikan:</h3>
					<div id="share"></div>

					<div id="disqus_thread"></div>
					<script>

					/**
					*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
					
					var disqus_config = function () {
					this.page.url = "http://pojokmedia.id/";  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = '<?php echo $cerita->permalink ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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

				<!-- SIDEBAR -->
				<div class="col-md-3" id="sidebar">
					<h2 class="font-md font-nimbus-bold">Cerita Pilihan</h2>
					<div class="line bg-gradient"></div>
					<?php foreach ($featured_res as $featured) { ?>
					<div class="row side-stories">
						<div class="col-md-4">
							<img src="<?php echo base_url() ?>assets/images/cerita/<?php echo $featured->foto ?>">
						</div>
						<div class="col-md-8"><a href="<?php echo base_url('cerita_detail/'.$featured->permalink) ?>" class="font-sm font-nimbus-bold"><?php echo $featured->judul ?></a></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>