	<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">

			<?php 
				$this->load->view('v_dashboard_komunitas_side');
			 ?>
			
			<!-- Main Content -->
			<div class="col-md-8 db-content">
				<h2 class="font-gotham-bold font-md">Permintaan Bergabung</h2>

				<table class="table table-striped">
					<tr class="bg-danger font-white">
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($req_res as $req){
							$no++;
					?>
					<tr>
						<td><img src="<?php echo base_url() ?>assets/images/user/<?php echo $req->profile_image ?>" class="sidebar-profile mr-2" data-aos="zoom-in" data-aos-delay="200" style="width: 55px !important; height: 55px !important"><?php echo $req->name ?></td>
						<td class="font-white py-4">
							<a href="<?php echo base_url('process/approve/'.$permalink.'/'.$req->id_user) ?>" onclick="return confirm('yakin ingin menerima?')" class="btn btn-success btn-sm" data-toggle="tooltip" title="Terima"><i class="fa fa-check"></i> Terima</a>
							<a href="<?php echo base_url('crud/delete/community_member/'.$req->id_community_member) ?>" onclick="return confirm('yakin ingin menolak?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Tolak"><i class="fa fa-remove"></i> Tolak</a>
						</td>
					</tr>
					<?php } ?>
				</table>

			</div>
		</div>
	</div>

	<!-- Modal Add -->
  <form class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/dongeng') ?>" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header font-white">
          <h5 class="modal-title font-md font-gotham-bold" id="exampleModalLabel">Tambah Dongeng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          	<label>Judul:</label>
			<input type="text" class="form-control" name="title" placeholder="Judul" required="">
			<br>

			<input type="hidden" name="type1" value="img">
			<label>Image:</label>
			<input type="file" class="form-control" name="image">
			<br>

			<label>Isi:</label>
			<textarea id="summernote" placeholder="Isi" name="content"  data-plugin-summernote></textarea><br>

			<label>Kategori:</label>
			<select class="form-control" name="id_category">
				<option value="0">Pilih Kategori</option>
				<?php 
					foreach ($kategori_res as $kategori) {
				 ?>
				 <option value="<?php echo $kategori->id_dongeng_category ?>"><?php echo $kategori->category_name ?></option>
				<?php } ?>
			</select>
        </div>
        <div class="modal-footer text-right">
          <button type="submit" class="button btn-green font-white font-sm">Simpan</button>
        </div>
      </div>
    </div>
  </form>