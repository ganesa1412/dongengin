<!-- Header -->
	<div class="container-fluid bg-green" id="header-event">
		<div class="row section">
			<div class="col-md-5 hc-left">
				<h2 class="font-gotham-bold font-xl font-white text-left" data-aos="fade-up" data-aos-delay="100">Yuk! <br>Ikut Ndongeng Bareng!</h2>
			</div>
			<div class="col-md-7 hc-right text-right">
				<img src="<?php echo base_url() ?>assets/images/community/star.png" width="60%" data-aos="fade-left" class="comm-star" data-aos-delay="200">
			</div>
		</div>
	</div>

	<!-- MAP -->
	<div class="container-fluid" id="event-page">
		<form class="row" action="<?php echo base_url('event') ?>" method="post">
			<div class="col-md-12">
				<span class="mob-hide">Lokasi : </span>
				<select class="form-control form-control-sm" name="id_provinsi" id="sprov">
					<option value="0">Semua Provinsi</option>
		              <?php foreach ($provinsi_res as $prov) {
		              ?>
		              <option value="<?php echo $prov->id_wilayah ?>"><?php echo $prov->nama ?></option>
		              <?php } ?>
				</select>
				<select class="form-control form-control-sm" name="id_kota" id="skota">
					<option value="0">Semua Kabupaten/Kota</option>
				</select>

				<button type="input" class="button btn-green font-sm"><i class="fa fa-search"></i> Cari</button>
			</div>
		</form>
		<div class="row" id="map">

			<div id="event-list" class="bg-white mob-hide">
				<h2 class="font-gotham-bold font-md">Daftar Event</h2>
				<div class="el-container">
					<?php 
						foreach ($event_res as $event) {
					 ?>
					<div class="row event-panel">
						<div class="col-md-5" style="background-image: url(<?php echo base_url() ?>assets/images/event/<?php echo $event->image ?>);">
							<div class="event-date bg-green font-white text-center">
								<p class="font-gotham-bold font-sm"><?php echo f_tg_bln($event->date) ?></p>
								<p class="font-gotham-bold font-xs"><?php echo f_tahun($event->date) ?></p>
							</div>
						</div>
						<div class="col-md-7">
							<h2 class='font-sm font-gotham-bold'><?php echo $event->event_name ?></h2>
							<p class='font-gotham-light font-xs'>
								<i class='fa fa-map-marker'></i> <?php echo $event->kota ?><br>
								<i class='fa fa-users'></i> <?php echo $event->komunitas ?>
							</p>
							<a href='<?php echo base_url('event/'.$event->permalink) ?>' class='button btn-green font-xs text-center'>Selengkapnya</a>
						</div>
					</div>
				<?php } ?>

				</div>
			</div>
			<script type="text/javascript">
				var map = L.map('map').setView([-1, 105], 5);

				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
				}).addTo(map);

				var newMarker = L.icon({
		            iconUrl: '<?php echo base_url() ?>assets/images/marker.png',

		            iconSize:     [41, 59],
		            iconAnchor:   [20, 50],
		            popupAnchor:  [0, -60]
		        });

				<?php 
					foreach ($event_res as $ev) {
				 ?>

				var markerpop<?php echo $ev->id_event ?> = "<div class='bg-pink popup-head text-center font-white font-sm font-gotham-bold'><?php echo $ev->event_name ?></div>"+
					"<p class='font-gotham-light font-xs'><i class='fa fa-map-marker'></i> <?php echo $ev->kota ?></p>"+
					"<p class='font-gotham-light font-xs'><i class='fa fa-calendar'></i> <?php echo format($ev->date) ?></p>"+
					"<p class='font-gotham-light font-xs'><i class='fa fa-users'></i> <?php echo $ev->komunitas ?></p>"+
					"<a href='<?php echo base_url("event/".$ev->permalink) ?>' class='button btn-green btn-block font-xs text-center'>Selengkapnya</a><br>" +
					"<img src='<?php echo base_url() ?>assets/images/petik.png' class='popup-petik'>";
		        var marker<?php echo $ev->id_event ?> = L.marker([<?php echo $ev->longitude ?>, <?php echo $ev->latitude ?>], {icon: newMarker}).addTo(map)
			    .bindPopup(markerpop<?php echo $ev->id_event ?>, {minWidth:200});
				<?php } ?>
			</script>
		</div>
	</div>

	<div id="event-list" class="bg-white desktop-hide">
		<h2 class="font-gotham-bold font-md">Daftar Event</h2>
		<div class="el-container">
			<?php 
				foreach ($event_res as $event) {
			 ?>
			<div class="row event-panel">
				<div class="col-md-5 col-4" style="background-image: url(<?php echo base_url() ?>assets/images/event/<?php echo $event->image ?>);">
					<div class="event-date bg-green font-white text-center">
						<p class="font-gotham-bold font-sm"><?php echo f_tg_bln($event->date) ?></p>
						<p class="font-gotham-bold font-xs"><?php echo f_tahun($event->date) ?></p>
					</div>
				</div>
				<div class="col-md-7 col-8">
					<h2 class='font-sm font-gotham-bold'><?php echo $event->event_name ?></h2>
					<p class='font-gotham-light font-xs'>
						<i class='fa fa-map-marker'></i> <?php echo $event->kota ?><br>
						<i class='fa fa-users'></i> <?php echo $event->komunitas ?>
					</p>
					<a href='<?php echo base_url('event/'.$event->permalink) ?>' class='button btn-green font-xs text-center'>Selengkapnya</a>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>