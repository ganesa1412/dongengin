<?php 

	defined("BASEPATH") OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		function __construct(){
			parent::__construct();
			date_default_timezone_set( 'Asia/Jakarta');
			$this->load->model('m_data');
			$this->load->helper(
				array('tanggal', 'rupiah', 'permalink')
			);
			$this->load->library('mylib');
		}

		function index(){
			$data['title'] = "Dongeng.in | Hidupkan Dunia dengan Berbagi Cerita";
			$data['homepage'] = true;
			$data['isReadPage'] = false;

			$data['provinsi_res'] = $this->m_data->get_provinsi()->result();

			$data['dongeng_res'] = $this->m_data->get_random_dongeng()->result();
			$data['event_res'] = $this->m_data->get_current_event(6)->result();

			$this->load->view('v_head',$data);
			$this->load->view('v_index',$data);
			$this->load->view('v_foot',$data);
		}


		function view($page, $id, $id2 = ''){
			$data['homepage'] = false;
			$data['provinsi_res'] = $this->m_data->get_provinsi()->result();
			$data['side_dongeng_res'] = $this->m_data->get_random_dongeng()->result();
			$data['side_community_res'] = $this->m_data->get_random_community()->result();
			$data['side_event_res'] = $this->m_data->get_current_event(4)->result();

			switch ($page) {
				case 'dongeng':
					$data['title'] = "Cari Dongeng | Dongeng.in";
					$data['kategori_res'] = $this->m_data->get_data('tb_dongeng_category')->result();

					if ($this->input->post('keyword') != null || $this->input->post('id_category') != null) {
						$keyword = $this->input->post('keyword');
						$id_category = $this->input->post('id_category');
						$data['dongeng_res'] = $this->m_data->get_dongeng_search($keyword, $id_category)->result();
					}else{
						$data['dongeng_res'] = $this->m_data->get_dongeng()->result();
					}
					break;
				case 'dongeng_detail':
					$data['dongeng'] = $this->m_data->get_dongeng_detail($id)->row();
					$data['title']  = $data['dongeng']->title;
					break;
				case 'komunitas':
					$data['title'] = "Cari Komunitas | Dongeng.in";
					$data['color'] = array('green', 'yellow', 'pink');

					if ($this->input->post("keyword") != null) {
						$data['komunitas_res'] = $this->m_data->get_komunitas_search($this->input->post("keyword"))->result();
					}else{
						$data['komunitas_res'] = $this->m_data->get_komunitas()->result();
					}
					break;
				case 'komunitas_detail':
					$data['komunitas'] = $this->m_data->get_komunitas_detail($id)->row();
					$data['logged'] = ($this->session->userdata('id_user') != null);
					// $data['level'] = $this->m_data->get_member_level($this->m_data->get_community_by_id($id), $userid);
					$data['title']  = $data['komunitas']->community_name;

					$data['member_count'] = $this->m_data->get_member_count($data['komunitas']->id_community)->row()->ctn;
					$data['event_count'] = $this->m_data->get_event_count($data['komunitas']->id_community)->row()->ctn;

					$data['color'] = array('yellow', 'pink', 'green');
					$data['member_res'] = $this->m_data->get_member_by_comm($data['komunitas']->id_community)->result();
					$data['event_res'] = $this->m_data->get_event_by_comm($data['komunitas']->id_community)->result();
					break;
				case 'event':
					$data['title'] = "Cari Event | Dongeng.in";
					$data['event_res'] = $this->m_data->get_event()->result();
					$data['provinsi_res'] = $this->m_data->get_provinsi()->result();
					break;
				case 'event_detail':
					$data['event'] = $this->m_data->get_event_detail($id)->row();
					$data['title']  = $data['event']->event_name;
					break;
				case 'email_verif':
					$data['title'] = "Verifikasi Email | Dongeng.in";
					break;
				case 'dashboard':
					$data['title'] = "Dashboard | Dongeng.in";
					break;
				case 'dashboard_dongeng':
					$data['title'] = "Dongeng Saya | Dongeng.in";
					$data['dongeng_res'] = $this->m_data->get_dongeng_by_writer($this->session->userdata('id_user'))->result();
					$data['kategori_res'] = $this->m_data->get_data('tb_dongeng_category')->result();
					break;
				case 'dashboard_komunitas':
					$data['title'] = "Komunitas Saya | Dongeng.in";
					$data['kom_admin_res'] = $this->m_data->get_komunitas_by_status($this->session->userdata('id_user'), 0)->result();
					$data['kom_unapproved_res'] = $this->m_data->get_komunitas_by_status($this->session->userdata('id_user'), 1)->result();
					$data['kom_member_res'] = $this->m_data->get_komunitas_by_status($this->session->userdata('id_user'), 2)->result();
					$data['provinsi_res'] = $this->m_data->get_provinsi()->result();
					break;
				case 'dashboard_komunitas_post':
					$data['permalink'] = $id;
					$data['komunitas'] = $this->m_data->get_komunitas_detail($id)->row();
					$data['level'] = $this->m_data->get_member_level($this->m_data->get_community_by_id($id), $this->session->userdata('id_user'));
					$data['title'] = "Postingan ".$data['komunitas']->community_name." | Dongeng.in";

					$data['post_res'] = $this->m_data->get_post_by_comm($data['komunitas']->id_community)->result();

					$where = array(
						'id_community' => $this->m_data->get_community_by_id($id),
						'status' => 1
					);
					$data['req_count'] = $this->m_data->get_request_count($where);

					foreach ($data['post_res'] as $p) {
						$data['comment'][$p->id_community_post] = $this->m_data->get_comment_count($p->id_community_post);
					}
					break;
				case 'dashboard_komunitas_event':
					$data['permalink'] = $id;
					$data['komunitas'] = $this->m_data->get_komunitas_detail($id)->row();
					$data['level'] = $this->m_data->get_member_level($this->m_data->get_community_by_id($id), $this->session->userdata('id_user'));
					$data['title'] = "Postingan ".$data['komunitas']->community_name." | Dongeng.in";
					
					$where = array(
						'id_community' => $this->m_data->get_community_by_id($id),
						'status' => 1
					);
					$data['req_count'] = $this->m_data->get_request_count($where);

					$data['event_res'] = $this->m_data->get_event_by_comm($data['komunitas']->id_community)->result();
					break;
					
				case 'dashboard_komunitas_request':
					$data['permalink'] = $id;
					$data['komunitas'] = $this->m_data->get_komunitas_detail($id)->row();
					$data['level'] = $this->m_data->get_member_level($this->m_data->get_community_by_id($id), $this->session->userdata('id_user'));
					$data['title'] = "Postingan ".$data['komunitas']->community_name." | Dongeng.in";

					$where = array(
						'id_community' => $this->m_data->get_community_by_id($id),
						'status' => 1
					);
					$data['req_count'] = $this->m_data->get_request_count($where);

					$data['req_res'] = $this->m_data->get_request($this->m_data->get_community_by_id($id));
					break;
				case 'dashboard_komunitas_comment':
					$data['permalink'] = $id;
					$data['komunitas'] = $this->m_data->get_komunitas_detail($id)->row();
					$data['level'] = $this->m_data->get_member_level($this->m_data->get_community_by_id($id), $this->session->userdata('id_user'));
					$data['title'] = "Postingan ".$data['komunitas']->community_name." | Dongeng.in";

					$where = array(
						'id_community' => $this->m_data->get_community_by_id($id),
						'status' => 1
					);
					$data['req_count'] = $this->m_data->get_request_count($where);

					$data['post_res'] = $this->m_data->get_post_by_id($id2)->row();

					$data['comment'][$data['post_res']->id_community_post] = $this->m_data->get_comment_count($data['post_res']->id_community_post);

					$data['comment_res'] = $this->m_data->get_comment_by_post($id2)->result();
					break;
					
				default:
					# code...
					break;
			}

			$this->load->view('v_head',$data);
			$this->load->view('v_'.$page,$data);
			$this->load->view(	'v_foot',$data);
			
		}

		function notfound(){
			$data['title'] = "404 Not Found | Dongeng.in";

			$this->load->view('v_head',$data);
			$this->load->view('v_404');
			$this->load->view(	'v_foot', $data);
		}

		function get_kota(){
			$id_provinsi = $this->input->post('id_provinsi');
			$kota = $this->m_data->get_kota($id_provinsi);

			$lists = "<option value='0'>- PILIH -</option>";

			foreach ($kota as $d) {
				$lists .= "<option value='".$d->id_wilayah."'>".$d->nama."</option>";
			}

			$callback = array('list_kota' => $lists);
			echo json_encode($callback);
		}

	}
 ?>