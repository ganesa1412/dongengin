<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title><?php echo $title ?></title>
  <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/summernote-bs4.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/aos.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jssocials.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/leaflet.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/leaflet.js"></script>
</head>
<body>
  <div id="navbar" class="container-fluid bg-green-darker" data-aos="fade-down">
    <div class="row section">
      <div class="col-md-3 col-9">
        <a href="./"><img src="<?php echo base_url() ?>assets/images/logo.png" id="logo" width="100%"></a>
      </div>
      <div class="col-3 desktop-hide text-center trigger">
        <a href="#" id="nav-trigger" class="font-white"><i class="fa fa-align-justify fa-2x"></i></a>
      </div>
      <div class="col-md-9 text-right navbar-right">
        <ul class="font-gotham-bold font-white font-sm">
          <a href="<?php echo base_url('dongeng') ?>"><li>Dongeng</li></a>
          <a href="<?php echo base_url('komunitas') ?>"><li>Komunitas</li></a>
          <a href="<?php echo base_url('event') ?>"><li>Event</li></a>
          <li class="mob-hide">|</li>
          <?php 
            if ($this->session->userdata('login')) {
          ?>
          <li class="dropdown">
            <button class="button btn-green dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo base_url() ?>assets/images/user/<?php echo $this->session->userdata('profile_image') ?>" class="navbar-profile"> <span class="font-sm "><?php echo $this->session->userdata('name') ?></span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url('dashboard') ?>">Dashboard</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('dashboard/profile_edit') ?>">Sunting Profil</a> -->
              <a class="dropdown-item" href="<?php echo base_url('dashboard_dongeng') ?>" class="list-group-item list-group-item-action">Dongeng Saya</a>
              <a class="dropdown-item" href="<?php echo base_url('dashboard_komunitas') ?>" class="list-group-item list-group-item-action">Komunitas Saya</a>
              <a class="dropdown-item" href="<?php echo base_url('process/logout') ?>">Logout</a>
            </div>
          </li>
          <?php
            }else{
          ?>
          <a href="#" data-toggle="modal" data-target="#LoginModal" class="nav-modal-trigger"><li>Masuk</li></a>
          <li class="nav-modal-trigger"><a href="#" class="button btn-green" data-toggle="modal" data-target="#DaftarModal">Daftar</a></li>
          <?php
            }
           ?>
        </ul>
      </div>
    </div>
  </div>
  
  <?php if (!$this->session->userdata('login')) { ?>
  <!-- MODAL LOGIN -->
  <form class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="<?php echo base_url('process/login') ?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header font-white">
          <h5 class="modal-title font-md font-gotham-bold" id="exampleModalLabel">Masuk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <input type="email" name="email" placeholder="Email" class="form-control input-lg"><br>
          <input type="password" name="password" placeholder="Password" class="form-control input-lg"><br>
        </div>
        <div class="modal-footer text-right">
          <button type="submit" class="button btn-green font-white font-sm">Masuk</button>
        </div>
      </div>
    </div>
  </form>

  <!-- MODAL DAFTAR -->
  <form class="modal fade" id="DaftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="<?php echo base_url('process/register') ?>" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header font-white">
          <h5 class="modal-title font-md font-gotham-bold" id="exampleModalLabel">Daftar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center row">
          <div class="col-md-6">
            <input type="text" name="name" placeholder="Nama Lengkap" class="form-control input-lg"><br>
            <input type="email" name="email" placeholder="Email" class="form-control input-lg"><br>
            <input type="number" name="phone" placeholder="Telepon" class="form-control input-lg"><br>
          </div>
          <div class="col-md-6">
              
            <input type="password" name="password" placeholder="Password" class="form-control input-lg"><br>
            <input type="password" name="password2" placeholder="Ulangi Password" class="form-control input-lg"><br>
            <!--select class="form-control" id="sprov" name="id_provinsi" required="">
              <option value="0">Provinsi</option>
              <?php foreach ($provinsi_res as $prov) {
              ?>
              <option value="<?php echo $prov->id_wilayah ?>"><?php echo $prov->nama ?></option>
              <?php } ?>
            </select><br>
            <select class="form-control" id="skota" name="id_kota" required="">
              <option>Kota</option>
            </select-->

            <img src="<?php echo base_url() ?>assets/images/user/_.png" id="foto-prev">
            <input type="file" name="foto" class="form-control" id="foto-input"><br>
          </div>
        </div>
        <div class="modal-footer text-right">
          <button type="submit" class="button btn-green font-white font-sm">Daftar</button>
        </div>
      </div>
    </div>
  </form>
  <?php } ?>