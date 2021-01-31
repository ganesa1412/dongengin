<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">
			<!-- Main Content -->
			<div class="col-md-8" id="event-detail" data-aos="fade">

				<div class="row kd-about">
					<div class="col-md-12">
						<h1 class="font-lg font-gotham-bold" data-aos="fade-right"><?php echo $event->event_name ?></h1>
						<div class="line bg-yellow" data-aos="fade-up" data-aos-delay="200"></div>
					</div>
					<div class="col-md-5">
						<img src="<?php echo base_url() ?>assets/images/event/<?php echo $event->image ?>" class="event-detail-img">
						<br>
						<div id="map">
							<script type="text/javascript">
								var map = L.map('map').setView([<?php echo $event->longitude ?>, <?php echo $event->latitude ?>], 10);

								L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
								    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
								}).addTo(map);

								var newMarker = L.icon({
						            iconUrl: '<?php echo base_url() ?>assets/images/marker.png',

						            iconSize:     [41, 59],
						            iconAnchor:   [20, 50],
						            popupAnchor:  [0, -60]
						        });

						        var marker = L.marker([<?php echo $event->longitude ?>, <?php echo $event->latitude ?>], {icon: newMarker}).addTo(map);
							</script>
						</div>
					</div>
					<div class="col-md-7 kd-info">
						<div class="row">
							<div class="col-md-12">
								<p class="font-sm font-gotham-light"><?php echo $event->description ?></p>
							</div>
							<div class="col-md-2 col-2 text-center">
								<i class="fa fa-map-marker fa-2x font-pink"></i>
							</div>
							<div class="col-md-10 col-10">
								<p class="font-gotham-medium font-sm"><?php echo $event->address ?></p>
								<p class="font-gotham-medium font-sm"><?php echo $event->kota ?></p>
							</div>
							<div class="col-md-2 col-2 text-center">
								<i class="fa fa-calendar fa-2x font-pink"></i>
							</div>
							<div class="col-md-10 col-10">
								<p class="font-gotham-medium font-sm"><?php echo format($event->date) ?></p>
							</div>
							<div class="col-md-2 col-2 text-center">
								<i class="fa fa-clock-o fa-2x font-pink"></i>
							</div>
							<div class="col-md-10 col-10">
								<p class="font-gotham-medium font-sm"><?php echo $event->time ?></p>
							</div>
							<div class="col-md-2 col-2 text-center">
								<i class="fa fa-users fa-2x font-pink"></i>
							</div>
							<div class="col-md-10 col-10">
								<p class="font-gotham-medium font-sm"><?php echo $event->komunitas ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<br>
						<h3 class="font-sm font-nimbus-bold">Bagikan:</h3>
						<div id="share" class="font-white"></div>

						<div id="disqus_thread"></div>
						<script>

						/**
						*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
						*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
						
						var disqus_config = function () {
						this.page.url = "http://dongeng.pojokmedia.id/";  // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = '<?php echo $event->permalink ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
				</div>
			</div>		

			<?php 
				$this->load->view('v_sidebar.php');
			 ?>
		</div>
	</div>