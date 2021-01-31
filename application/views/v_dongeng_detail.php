<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">
			<!-- Main Content -->
			<div class="col-md-8" id="dongeng-detail">
				<h1 class="font-lg font-gotham-bold" data-aos="fade-right"><?php echo $dongeng->title ?></h1>
				<div class="line bg-yellow" data-aos="fade-up" data-aos-delay="200"></div>
				<p class="font-gotham-medium font-sm"><i class="fa fa-user"></i> <?php echo $dongeng->name ?> &nbsp; <i class="fa fa-tag"></i> <?php echo $dongeng->category_name ?></p>

				<img src="<?php echo base_url() ?>assets/images/dongeng/<?php echo $dongeng->image ?>" class="dongeng-detail-img">

				<div class="font-gotham-book font-sm"><?php echo str_replace("http://localhost/dongeng/", base_url(), $dongeng->content)  ?></div>

				<h3 class="font-sm font-nimbus-bold">Bagikan:</h3>
				<div id="share" class="font-white"></div>

				<div id="disqus_thread"></div>
				<script>

				/**
				*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
				
				var disqus_config = function () {
				this.page.url = "http://dongeng.pojokmedia.id/";  // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = '<?php echo $dongeng->permalink ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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

			<?php 
				$this->load->view('v_sidebar.php');
			 ?>
		</div>
	</div>