<!-- MODAL -->
      <form class="modal fade" id="addtocart" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/keranjang') ?>" enctype="multipart/form-data">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header header-help bg-gradient font-white">
              <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
              <h3 class="modal-title text-center" id="myModalLabel">Tambah ke Keranjang:</h3>
            </div>
            <div class="modal-body">
              <table width="100%" class="table table-striped font-md">
              	<tr>
              		<th>Jumlah</th>
              		<td width="10%">:</td>
              		<td>
              			<input type="number" id="qty" name="quantity" placeholder="Jumlah" class="form-control input-lg" value="1" required="">
              		</td>
              	</tr>
              	<tr>
              		<th>Total Harga</th>
              		<td>:</td>
              		<td>
              			<h3 id="total-harga" class="font-md">Rp. <span></span></h3>
              		</td>
              	</tr>
              	<tr>
              		<td>Keterangan</td>
              		<td>:</td>
              		<td>
              			<textarea class="form-control" name="keterangan" placeholder="keterangan" required=""></textarea>
              		</td>
              	</tr>
              	<input type="hidden" name="id_produk" value="0" id="hidden-produk">
              	<input type="hidden" name="harga" value="0" id="hidden-harga">
              </table>
            </div>

              <div class="modal-footer text-right">
                <input type="submit" class="button bg-gradient font-white" value="Tambah ke Keranjang">
              </div>
          
            </div>
          </div>
      </form>
      <!-- MODAL END -->

<!-- HEADER -->
		<div class="row head" id="beli-head">
			<div class="section">
				<div class="col-md-6">
					<h1 class="font-nimbus-black font-white font-xxl beli-header-text" data-aos="slide-up	">Temukan Cita Rasa Kopi Paling Nikmat!</h1>
				</div>
				
				<div class="putih-putih-1" data-aos="slide-up" data-aos-delay="600"></div>
				<div class="putih-putih-2" data-aos="slide-up" data-aos-delay="300"></div>
				<form class="putih-putih-3 bg-white" data-aos="zoom-in">
					<div class="col-md-3">
						<h2 class="font-lg font-nimbus-black">Produk</h2>
					</div>
					<div class="col-md-3">
						<select class="form-control" name="id_kategori">
							<option value="0">- Kategori- </option>
							<?php 
								foreach ($kategori_res as $ctg) {
							?>
							<option value="<?php echo $ctg->id_produk_kategori ?>"><?php echo $ctg->nama ?></option>
							<?php
								}
							 ?>
						</select>
					</div>
					<div class="col-md-3">
						<input type="text" placeholder="Apa yang anda cari?" class="form-control" name="keyword">
					</div>
					<div class="col-md-3">
						<button class="button bg-gradient button-block font-white" type="submit">CARI</button>
					</div>
				</form>
			</div>
		</div>

<div class="row" id="produk">
			<div class="section">
				<?php 
					$no = 0;
					foreach ($produk_res as $produk) {
						$no++;
				 ?>
				<div class="col-md-4">
					<div class="produk-panel" data-aos="fade">
						<img src="<?php echo base_url() ?>assets/images/produk/<?php echo $produk->foto ?>">
						<div class="pp-body">
							<a href="<?php echo base_url('produk/'.$produk->permalink) ?>"><h2 class="font-sm font-nimbus-bold font-green"><?php echo $produk->nama ?></h2></a>
							<p class="font-sm font-nimbus-regular font-grey"><i class="fa fa-tag"></i> <?php echo $produk->kategori ?></p>
							<p class="font-sm font-nimbus-black font-green"><?php echo rupiah($produk->harga) ?></p>

							<button class="button font-md button-rounded bg-grey" data-toggle="modal" data-target="#<?php echo ($this->session->userdata('login')==1?"addtocart":"loginmodal") ?>" onclick="set_atc(<?php echo $produk->id_produk.", ".$produk->harga ?>)"><i class="fa fa-shopping-cart" data-toggle="tooltip" title="Tambahkan ke Keranjang"></i></button>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

		</div>