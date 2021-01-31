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

<div class="row" id="produk-detail">
			<div class="col-md-6 pd-image" style="background-image: url(<?php echo base_url() ?>assets/images/produk/<?php echo $produk->foto ?>);">
				<div class="pd-title">
					<p class="font-sm font-nimbus-regular">Produk <i class="fa fa-angle-right"></i> <?php echo	$produk->kategori ?></p>
					<h2 class="font-lg font-green font-nimbus-black"><?php echo $produk->nama ?></h2>
					<h3 class="font-md font-nimbus-bold"><?php echo rupiah($produk->harga) ?></h3>
				</div>

				<button class="button bg-white font-black font-md" data-toggle="modal" data-target="#<?php echo ($this->session->userdata('login')==1?"addtocart":"loginmodal") ?>" onclick="set_atc(<?php echo $produk->id_produk.", ".$produk->harga ?>)">Beli</button>
			</div>
			<div class="col-md-6 pd-desc">
				<table class="table font-sm" width="100%">
					<tr>
						<td width="25%">Nama Produk</td>
						<td width="5%">:</td>
						<td><?php echo $produk->nama ?></td>
					</tr>
					<tr>
						<td width="25%">Harga Produk</td>
						<td width="5%">:</td>
						<td><?php echo rupiah($produk->harga) ?></td>
					</tr>
					<tr>
						<td width="25%">Kategori Produk</td>
						<td width="5%">:</td>
						<td><?php echo $produk->kategori ?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td><?php echo $produk->deskripsi ?></td>
					</tr>
					<tr>
						<td>Minimal Pemesanan</td>
						<td>:</td>
						<td><?php echo $produk->min_pemesanan ?></td>
					</tr>
					<tr>
						<td>Berat (gram)</td>
						<td>:</td>
						<td><?php echo $produk->berat ?> gram</td>
					</tr>
					<tr>
						<td>Toko</td>
						<td>:</td>
						<td><?php echo $produk->toko ?></td>
					</tr>
					<tr>
						<td>Alamat Toko</td>
						<td>:</td>
						<td>
							<?php echo $produk->toko_alamat ?><br>
							<?php echo ucwords(strtolower($p_kota)) ?>
						</td>
					</tr>
				</table>
			</div>
		</div>