<!-- HEADER -->
  <div id="header" class="container-fluid">
    <div class="row section">
      <div class="col-md-12 bg-yellow" data-aos="zoom-in-left">
        <div class="quotes-left">
          <h1 class="font-xl font-gotham-bold" data-aos="fade-right" data-aos-delay="300">"Hidupkan dunia dengan berbagi cerita."</h1>
        </div>
        <div class="quotes-right">
          <p class="font-gotham-bold font-md" data-aos="fade-left" data-aos-delay="500">~ Dongeng.in</p>
        </div>
        <img src="assets/images/head-ballon.png">
      </div>
    </div>
  </div>

  <!-- ABOUT -->
  <div id="about" class="container-fluid bg-green">
    <div class="row section">
      <div class="col-md-5 font-white font-md font-gotham-light" data-aos="fade">
        <img src="assets/images/logo_white.png" class="about-logo" width="70%">
        <p>Dongeng.in adalah aplikasi berbasis website yang menjadi tempat berkumpulnya anak-anak muda dari generasi milenial yang memiliki visi yang sama dan tergerak untuk menghidupkan budaya dongeng di Indonesia.</p>
      </div>
      <div class="col-md-7">
        <img src="assets/images/about/about1.png" width="100%" data-aos="fade-up">
        <img src="assets/images/about/star1.png" id="star" data-aos="fade-right">
      </div>
    </div>
  </div>

  <!-- DONGENG -->
  <div id="dongeng" class="container-fluid" data-aos="fade">
    <div class="row section">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php 
            foreach ($dongeng_res as $dongeng) {
           ?>
          <div class="swiper-slide row">
            <div class="col-12 text-center desktop-hide">
              <h1 class="font-xxl font-gotham-bold text-center">Dongeng Terbaru</h1>
            </div>
            <div class="col-md-4">
              <img src="<?php echo base_url() ?>assets/images/dongeng/<?php echo $dongeng->image ?>" class="dongeng-img">
            </div>
            <div class="col-md-5">
              <div class="line bg-black"></div>
              <h2 class="font-gotham-bold font-lg"><?php echo $dongeng->title ?></h2>
              <p class="font-sm"><?php echo substr(strip_tags($dongeng->content), 0,180) ?>...</p>
              <p><a href="<?php echo base_url('dongeng/'.$dongeng->permalink) ?>" class="button btn-green font-sm">Baca Dongeng</a></p>
            </div>
            <div class="col-md-3 text-center mob-hide">
              <h1 class="font-xxl font-gotham-bold text-left">Dongeng Terbaru</h1>
            </div>    
          </div>
          <?php } ?>
        </div>

          <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>

  <!-- FITUR -->
  <div id="fitur" class="container-fluid">
    <div class="row section">
      <div class="col-md-6 fitur-left">
        <h2 class="font-gotham-bold font-lg" data-aos="fade-right">Fitur Unggulan</h2>
        <!--p class="font-gotham-light font-sm" data-aos="fade" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p-->

        <div class="text-center">
          <img src="assets/images/feature/2.png" class="feature-img" data-aos="zoom-in">
          <div data-aos="fade" data-aos-delay="200">
            <h3 class="font-gotham-bold font-md">Komunitas</h3>
            <p class="font-sm">Menemukan dan mengumpulkan pendongeng dengan komunitas terdekat yang diinginkan.</p>
            <div class="line bg-pink"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6 fitur-right text-center">
        <img src="assets/images/feature/1.png" class="feature-img" data-aos="zoom-in">
        <div data-aos="fade" data-aos-delay="200">
          <h3 class="font-gotham-bold font-md">Dongeng</h3>
          <p class="font-sm">Menyediakan cerita bagi pendongeng dan pembaca dalam bentuk video maupun teks sebagai bahan mendongeng kepada anak.</p>
          <div class="line bg-green"></div>
        </div>

        <img src="assets/images/feature/3.png" class="feature-img" data-aos="zoom-in">
        <div data-aos="fade" data-aos-delay="200">
          <h3 class="font-gotham-bold font-md" >Event</h3>
          <p class="font-sm">Digunakan oleh komunitas untuk mengekspos event mendongeng yang akan mereka laksanakan</p>
          <div class="line bg-yellow"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- EVENT -->
  <div id="event" class="container-fluid">
    <div class="row section">
      <div class="col-md-6 font-white">
        <h2 class="font-gotham-bold font-lg" data-aos="fade-right">Event Terdekat</h2>
        <!--p class="font-gotham-light font-sm" data-aos="fade" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p-->
      </div>
    </div>
    <div class="row section event-top font-white">      
      <?php 
        $ctn = 0;
        foreach ($event_res as $event) { 
          $ctn++;
      ?>
      <div class="col-md-4">
        <div class="event-card bg-blue-darken" data-aos="zoom-in">
          <h3 class="font-lg font-gotham-bold">
            <?php echo f_tg_bln($event->date) ?> <span><?php echo f_tahun($event->date) ?></span>
          </h3>
          <h2 class="font-sm"><?php echo $event->event_name ?></h2>
          <p class="font-xs font-gotham-light"><i class="fa fa-map"></i>&nbsp; Ketintang, Surabaya</p>
          <p class="font-xs font-gotham-light"><i class="fa fa-users"></i>&nbsp; Komunitas Wani Perih</p>
          <a href="<?php echo base_url('event/'.$event->permalink) ?>" class="btn btn-detail bg-white">Detail Event <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>
      <?php 
        } 
      ?>

    </div>
  </div>

  <!-- CTA -->
  <div id="cta" class="container-fluid">
    <div class="row section">
      <div class="col-md-12 text-center">
        <h1 class="font-gotham-bold font-white font-xl" data-aos="fade-down">
          Kisahkan Ceritamu & Mulai Menginspirasi!
        </h1>
        <a href="#" class="button btn-green font-md" data-aos="fade" data-aos-delay="100" data-toggle="modal" data-target="#DaftarModal">Bergabung</a>
      </div>
    </div>
  </div>  