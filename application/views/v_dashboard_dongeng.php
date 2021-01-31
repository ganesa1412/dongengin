	<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">

			<?php 
				$this->load->view('v_dashboard_side');
			 ?>
			
			<!-- Main Content -->
			<div class="col-md-8 db-content">
				<h2 class="font-gotham-bold font-md">Dongeng Saya</h2>
				<a href="#" class="button btn-green db-float-button font-xs" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tulis Dongeng</a>
				<div class="line bg-yellow"></div>

				<table class="table table-striped">
					<tr class="bg-danger font-white">
						<th>No.</th>
						<th>Judul Dongeng</th>
						<th>Aksi</th>
					</tr>
					<?php 
						$no = 0;
						foreach ($dongeng_res as $dongeng){
							$no++;
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $dongeng->title ?></td>
						<td class="font-white">
							<a href="<?php echo base_url('dongeng/'.$dongeng->permalink) ?>" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Lihat"><i class="fa fa-eye"></i></a>
							<a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Sunting"><i class="fa fa-edit"></i></a>
							<a href="<?php echo base_url('crud/delete/dongeng/'.$dongeng->id_dongeng) ?>" onclick="return confirm('yakin ingin menghapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
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