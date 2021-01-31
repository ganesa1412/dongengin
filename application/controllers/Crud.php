<?php 

	defined("BASEPATH") OR exit('No direct script access allowed');

	class Crud extends CI_Controller{

		var $data;

		function __construct(){
			parent::__construct();
			date_default_timezone_set( 'Asia/Jakarta');
			$this->load->model('m_data');
			$this->load->helper(
				array('tanggal', 'permalink')
			);
		}

		function register(){
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			// $data['id_kota'] = $this->input->post('id_kota');
			$data['password'] = md5($this->input->post('password'));
			$password2 = md5($this->input->post('password2'));

			$temp = explode(' ', $data['name']);
			$data['profile_image'] = $temp[0]."_".date('YmdHis').".png";
			$data['verif_url'] = md5($data['profile_image']);

			$config['upload_path'] = "assets/images/user/";
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['overwrite'] = true;
			$config['file_name'] = $data['profile_image'];

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if (! $this->upload->do_upload('foto')) {
				$error = $this->upload->display_errors()."<br> (".$config['upload_path'].")";
				$this->session->set_userdata('fail', $error);
				echo $error;
			}else{

				$this->m_data->add_data('tb_user', $data);

				$this->session->set_userdata('verif', true);
            
				redirect(base_url('process/verif/'.$data['verif_url']));
			}
		}




		// VERIF
		function verif($id){
			$where = array('verif_url' => $id); 

			$user = $this->m_data->get_where('tb_user', $where)->row();

			$data['verif_url'] = 'verified';
			$this->m_data->verif($where, $data);


			$data_session = array(
				'verif' => false,
				'id_user' => $user->id_user,
				'name' => $user->name,
				'profile_image' => $user->profile_image,
				'email' => $user->email,
				'phone' => $user->phone,
				'verif_url' => $user->verif_url,
				'login' => true
			);
			$this->session->set_userdata($data_session);

			// echo "<a href=".base_url('dashboard')." style='font-size:100px'>Kenek? Lewati ae</a>";

			redirect(base_url('dashboard'));

			// echo $user->id_user;
			// echo "<hr>";
			// print_r($user);
			// echo "<hr>";
			// print_r($data_session);
			// echo "<hr>";
			// print_r($this->session->userdata());
		}

		// LOGIN
		function login(){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$where = array('email' => $email, 'password' => md5($password));

			$cek = $this->m_data->cek_login($where)->num_rows();
			$user = $this->m_data->get_where("tb_user", $where)->row();

			if ($cek > 0) {
				$data_session = array(
					'id_user' => $user->id_user,
					'name' => $user->name,
					'profile_image' => $user->profile_image,
					'email' => $user->email,
					'phone' => $user->phone,
					'verif_url' => $user->verif_url,
					'login' => true
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('dashboard'));
			}else{
				$this->session->set_userdata('logingagal', true);
				redirect(base_url());
			}
		}

		// LOGOUT
		function logout(){
			session_destroy();
			redirect(base_url());
		}

		// confirm order
		function confirm_order(){
			$id_toko = $this->input->post('id_toko');
			$id_pembelian = $this->input->post('id_pembelian');
			$ongkos_kirim = $this->input->post('ongkos_kirim');
			$total_harga = $this->input->post('total_harga');
			$payment = $this->input->post('payment');
			$status = 1;

			$data_pembelian = array(
				'total_harga' => $total_harga,
				'ongkos_kirim' => $ongkos_kirim,
				'payment' => $payment,
				'status' => $status
			);

			$id_user = $this->session->userdata('id_user');
			$keranjang = $this->m_data->get_produk_confirm($id_toko, $id_user)->result();
			foreach ($keranjang as $k) {
				$data2 = array(
					'id_pembelian' => $id_pembelian
				);

				$where = array('id_keranjang' => $k->id_keranjang);
				$this->m_data->update_data('tb_keranjang', $where, $data2);
			}

			$where = array('id_pembelian' => $id_pembelian);
			$this->m_data->update_data('tb_pembelian', $data_pembelian, $where);
			$data['pembelian'] = $this->m_data->get_where('tb_pembelian', $where)->row();
			redirect(base_url('my_confirm/'.$id_pembelian));
		}



		// INSERT & UPDATE
		function action($act, $table, $id = ''){
			$img_upload = 0;

			switch ($table) {
				case 'dongeng':
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					$id_category = $this->input->post('id_category');
					$id_user = $this->session->userdata('id_user');

					$image = strtolower(str_replace(" ", "_", $title))."_".date('YmdHis').".png";
					$permalink = set_permalink($title);

					$data = array(
						'title' => $title,
						'permalink' => $permalink,
						'content' => $content,
						'image' => $image,
						'id_category' => $id_category,
						'id_user' => $id_user
					);

					$rdr_to = "dashboard_dongeng";
					$img_upload = 1;
					break;
				case 'community':
					$community_name = $this->input->post('community_name');
					$description = $this->input->post('description');
					$address = $this->input->post('address');
					$phone = $this->input->post('phone');
					$id_kota = $this->input->post('id_kota');
					$cover_image = '_.jpg';

					$image = strtolower(str_replace(" ", "_", $community_name))."_".date('YmdHis').".png";
					$permalink = set_permalink($community_name);

					$data = array(
						'community_name' => $community_name,
						'permalink' => $permalink,
						'profile_image' => $image,
						'cover_image' => $cover_image,
						'description' => $description,
						'address' => $address,
						'phone' => $phone,
						'id_kota' => $id_kota
					);

					$rdr_to = "dashboard_komunitas";
					$img_upload = 1;
					break;
				case 'community_post':
					$content = $this->input->post('content');
					$id_community = $this->input->post('id_community');
					$id_user = $this->session->userdata('id_user');
					$date = date('Y-m-d');

					$data = array(
						'content' => $content,
						'date' => $date,
						'id_community' => $id_community,
						'id_user' => $id_user
					);

					$rdr_to = "dashboard_komunitas/".$this->input->post('permalink').'/post';
					$img_upload = 0;
					break;
				case 'community_comment':
					$content = $this->input->post('content');
					$id_community_post = $this->input->post('id_post');
					$id_user = $this->session->userdata('id_user');

					$data = array(
						'content' => $content,
						'id_community_post' => $id_community_post,
						'id_user' => $id_user
					);

					$rdr_to = "dashboard_komunitas/".$this->input->post('permalink').'/comment/'.$id_community_post;
					$img_upload = 0;
					break;
				
				default:
					# code...
					break;
			}

			if ($img_upload == 1 && !empty($_FILES['image']['name'])){
				$config['upload_path'] = "assets/images/".$table."/";
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['overwrite'] = true;
				$config['file_name'] = $image;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (! $this->upload->do_upload('image')) {
					$error = $this->upload->display_errors()."<br> (".$config['upload_path'].")";
					$this->session->set_userdata('crud_status', $error);

					echo $error."<hr>";
					print_r($data);
					// redirect(base_url($rdr_to));
				}else{
					if ($act == 'add') {
						$this->m_data->add_data('tb_'.$table, $data);
						
						if ($table == 'community') {
							$data2 = array(
							'id_user' => $this->session->userdata('id_user'), 
							'id_community' => $this->m_data->get_last_comm($this->session->userdata('id_user'))->id_community,
							'status' => 0
						);
						$this->m_data->add_data('tb_community_member', $data2);
						}

						$this->session->set_userdata('crud_status', 'add_success');
						$table = ($table=="admin"?"profile_settings":$table);
						redirect(base_url($rdr_to));
					}else{
						$img_delete_res = $this->m_data->ambil_where('tb_'.$table, array('id_'.$table => $id))->row();
						$img_delete = $img_delete_res->image;
						unlink($config['upload_path'].$img_delete);

						$where = array('id_'.$table => $id);
						$this->m_data->update_data('tb_'.$table, $data, $where);

						$this->session->set_userdata('crud_status', 'edit_success');
						$table = ($table=="admin"?"profile_settings":$table);
						redirect(base_url($rdr_to));
					}
				}
			}else{
				if ($act == 'add') {
					$this->m_data->add_data('tb_'.$table, $data);
					$this->session->set_userdata('crud_status', 'add_success');
					redirect(base_url($rdr_to));
				}else{
					$where = array('id_'.$table => $id);
					$this->m_data->update_data('tb_'.$table, $data, $where);

					$this->session->set_userdata('crud_status', 'edit_success');
					redirect(base_url($rdr_to));
				}
			}
		}


		// Delete
		function delete($table, $id){
			switch ($table) {
				case 'dongeng':
						$rdr_to = 'dashboard_dongeng';
						break;	
				case 'komunitas':
						$rdr_to = 'dashboard_komunitas';
						break;	
					break;
				case 'community_member':
						$rdr_to = 'dashboard_komunitas_request';
					break;
			}

			$where = array('id_'.$table => $id);
			$this->m_data->delete_data('tb_'.$table, $where);

			$this->session->set_userdata('crud_status', 'del_success');
			redirect(base_url($rdr_to));
		}

		function member_request($permalink){
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'id_community' => $this->m_data->get_community_by_id($permalink),
				'status' => 1
			);
			$this->m_data->add_data('tb_community_member', $data);

			redirect(base_url('dashboard_komunitas'));
		}
		function member_approve($p, $user_id){
			$data = array(
				'status' => 2
			);
			$comm_id = $this->m_data->get_community_by_id($p);
			$where = array(
				'id_user' => $user_id,
				'id_community' => $comm_id
			);
			$this->m_data->update_data('tb_community_member', $data, $where);

			redirect(base_url('dashboard_komunitas/'.$p.'/request'));
		}
		

		function settings($type, $id){

			switch ($type) {
				case 'profile':
					$name = $this->input->post('name');
					$username = $this->input->post('username');
					$image = $id.".jpg";

					$data = array(
						'name' => $name,
						'username' => $username
					);

					$this->session->set_userdata($data);

					if (!empty($_FILES['image']['name'])) {
						$config['upload_path'] = "assets/images/admin/";
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['overwrite'] = true;
						$config['file_name'] = $image;

						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (! $this->upload->do_upload('image')) {
							$error = $this->upload->display_errors()."<br> (".$config['upload_path'].")";
							$this->session->set_userdata('crud_status', $error);
							redirect(base_url('profile_settings'));
						}else{
							$where = array('id_admin' => $id);
							$this->m_data->update_data('tb_admin', $data, $where);

							$this->session->set_userdata('crud_status', 'edit_success');
							redirect(base_url('profile_settings'));
						}
					}else{
						$where = array('id_admin' => $id);
						$this->m_data->update_data('tb_admin', $data, $where);

						$this->session->set_userdata('crud_status', 'edit_success');
						redirect(base_url('profile_settings'));
					}
					break;
				case 'password':
					$old_password = md5($this->input->post('old_password'));
					$password1 = md5($this->input->post('password1'));
					$password2 = md5($this->input->post('password2'));

					$data = array(
						'password' => $password1
					);

					$pass_check = $this->m_data->ambil_where('tb_admin', array('id_admin'=>$id))->row();
					$pass_old = $pass_check->password;

					if ($old_password != $pass_old) {
						$this->session->set_userdata('crud_status', 'wrong_password');
						redirect(base_url('profile_settings'));
					}else{
						if ($password1 != $password2) {
							$this->session->set_userdata('crud_status', 'unmatch_password');
							redirect(base_url('profile_settings'));	
						}else{
							$where = array('id_admin' => $id);
							$this->m_data->update_data('tb_admin', $data, $where);

							$this->session->set_userdata('crud_status', 'edit_success');
							redirect(base_url('profile_settings'));
						}
					}
					break;
			}

		}

	}

 ?>