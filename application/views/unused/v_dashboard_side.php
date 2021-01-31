		<!-- DASHBOARD SIDEBAR -->
			<div class="col-md-4" id="db-sidebar" data-aos="zoom-in">
				<div class="db-panel" data-aos="fade">
					<div class="db-panel-head">
						<h3 class="font-nimbus-black font-black font-md">
							<i class="fa fa-user-circle-o"></i>
							Selamat Datang!
							<div class="line bg-gradient"></div>
						</h3>
					</div>

					<div class="db-panel-body text-center">
					<?php if ($type == "user") { ?>
						<img src="<?php echo base_url() ?>assets/images/user/<?php echo $this->session->userdata('foto') ?>" class="profile">
						<h4 class="font-gold font-nimbus-bold font-md"><?php echo $this->session->userdata('nama') ?></h4>
						<div class="text-center">
							<button class="button bg-gradient font-white" id="ds-trigger">
								<i class="fa fa-chevron-down"></i>
							</button>
						</div>
						<ul class="font-nimbus-regular font-sm" id="ds-nav">
		                  <li><a href="<?php echo base_url('my_keranjang') ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
		                  <li><a href="<?php echo base_url('my_pembelian') ?>"><i class="fa fa-money"></i> Riwayat Transaksi</a></li>
		                  <li><a href="<?php echo base_url('my_alamat') ?>"><i class="fa fa-map-marker"></i> Daftar Alamat</a></li>
				<?php }else if($type == "toko"){ ?>
						<img src="<?php echo base_url() ?>assets/images/toko/<?php echo $toko->foto ?>" class="profile">
						<h4 class="font-gold font-nimbus-bold font-md"><?php echo $toko->nama ?></h4>
						<ul class="font-nimbus-regular font-sm">
		                  <li><a href="<?php echo base_url('my_produk/'.$toko->id_toko) ?>"><i class="fa fa-coffee"></i> Produk</a></li>
		                  <li><a href="<?php echo base_url('my_pesanan/'.$toko->id_toko) ?>"><i class="fa fa-shopping-bag"></i> Pesanan</a></li>
		                  <li><a href="<?php echo base_url('my_toko/'.$toko->permalink) ?>"><i class="fa fa-info"></i> Profil Toko</a></li>
		                  <li><a href="<?php echo base_url('crud/delete/toko/'.$toko->id_toko) ?>" onclick="return confirm('Anda yakin ingin menghapus toko ini?')"><i class="fa fa-remove"></i> Tutup / Hapus Toko</a></li>
				<?php }else if($type == "kedai"){ ?>
						<img src="<?php echo base_url() ?>assets/images/kedai/<?php echo $kedai->foto ?>" class="profile">
						<h4 class="font-gold font-nimbus-bold font-md"><?php echo $kedai->nama ?></h4>
						<ul class="font-nimbus-regular font-sm">
		                  <li><a href="<?php echo base_url('my_menu/'.$kedai->id_kedai) ?>"><i class="fa fa-coffee"></i> Menu</a></li>
		                  <li><a href="<?php echo base_url('my_kedai/'.$kedai->permalink) ?>"><i class="fa fa-info"></i> Profil Kedai</a></li>
		                  <li><a href="<?php echo base_url('crud/delete/kedai/'.$kedai->id_kedai) ?>" onclick="return confirm('Anda yakin ingin menghapus kedai ini?')"><i class="fa fa-remove"></i> Tutup / Hapus Kedai</a></li>
				<?php } ?>

		                  <div class="line bg-gradient"></div>
		                  <li><a href="<?php echo base_url('my_toko/all') ?>"><i class="fa fa-shopping-bag"></i>  Toko Saya</a></li>
		                  <li><a href="<?php echo base_url('my_kedai/all') ?>"><i class="fa fa-coffee"></i> Kedai Saya</a></li>
		                  <div class="line bg-gradient"></div>
		                  <li><a href="#"><i class="fa fa-bell-o"></i> Notifikasi</a></li>
		                  <li><a href="#"><i class="fa fa-edit"></i> Sunting Profil</a></li>
		                  <li><a href="<?php echo base_url('process/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
		                </ul>
					</div>
				</div>		
			</div>