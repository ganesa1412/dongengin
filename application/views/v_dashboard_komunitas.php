	<!-- Content & Sidebar -->
	<div class="container-fluid" id="ctn">
		<div class="row section">

			<?php 
				$this->load->view('v_dashboard_side');
			 ?>
			
			<!-- Main Content -->
			<div class="col-md-8 db-content">
				<h2 class="font-gotham-bold font-md">Komunitas Saya</h2>
				<a href="#" class="button btn-green db-float-button font-xs" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Buat Komunitas</a>
				<div class="line bg-yellow"></div>
					<table class="table table-striped">
						<tr class="bg-danger font-white">
							<th>No.</th>
							<th>Nama Komunitas</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
						<?php 
							$no = 0;
							foreach ($kom_admin_res as $kom_admin){
								$no++;
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $kom_admin->community_name ?></td>
							<td>Admin</td>
							<td class="font-white">
								<a href="<?php echo base_url('dashboard_komunitas/'.$kom_admin->permalink.'/post') ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Lihat Dashboard"><i class="fa fa-eye"></i></a>
								<a href="<?php echo base_url('crud/delete/community/'.$kom_admin->id_community) ?>" onclick="return confirm('yakin ingin menghapus?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php } 

							foreach ($kom_member_res as $kom_member){
								$no++;
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $kom_member->community_name ?></td>
							<td>Anggota</td>
							<td class="font-white">
								<a href="<?php echo base_url('dashboard_komunitas/'.$kom_member->permalink.'/post') ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Lihat Dashboard"><i class="fa fa-eye"></i></a>
							</td>
						</tr>
						<?php 
							}
							
							foreach ($kom_unapproved_res as $kom_unapproved){
								$no++;
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $kom_unapproved->community_name ?></td>
							<td>Permintaan Belum di-approve</td>
							<td class="font-white"></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				 
			</div>
		</div>
	</div>

	<!-- Modal Add -->
  <form class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/community') ?>" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header font-white">
          <h5 class="modal-title font-md font-gotham-bold" id="exampleModalLabel">Buat Komunitas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          	<label>Nama Komunitas:</label>
			<input type="text" class="form-control" name="community_name" placeholder="Nama Komunitas" required="">
			<br>

			<input type="hidden" name="type1" value="img">
			<label>Foto Profil:</label>
			<input type="file" class="form-control" name="image">
			<br>			

			<label>Deskripsi:</label>
			<textarea placeholder="Deskripsi" name="description"  class="form-control"></textarea><br>

			<label>Provinsi:</label>
			<select class="form-control" id="sprov" name="id_provinsi" required="">
              <option value="0">Provinsi</option>
              <?php foreach ($provinsi_res as $prov) {
              ?>
              <option value="<?php echo $prov->id_wilayah ?>"><?php echo $prov->nama ?></option>
              <?php } ?>
            </select><br>

            <label>Kabupaten/Kota:</label>
            <select class="form-control" id="skota" name="id_kota" required="">
              <option>Kota</option>
            </select><br>

            <label>Alamat:</label>
            <textarea class="form-control" name="address" placeholder="Alamat"></textarea><br>

            <label>Telepon:</label>
            <input type="number" name="phone" class="form-control" placeholder="Telepon">
        </div>
        <div class="modal-footer text-right">
          <button type="submit" class="button btn-green font-white font-sm">Simpan</button>
        </div>
      </div>
    </div>
  </form>