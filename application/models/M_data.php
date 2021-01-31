<?php 
	class M_data extends CI_Model{
		
		function cek_login($where){
			return $this->db->get_where("tb_user", $where);
		}

		function get_data($table){
			return $this->db->get($table);
		}
		function get_order_by($table, $by, $sort){
			$this->db->from($table);
			$this->db->order_by($by, $sort);
			return $this->db->get();
		}
		function get_where($table, $where){
			return $this->db->get_where($table, $where);
		}
		function get_total($table){
			return $this->db->get($table)->num_rows();
		}

		function get_join($table1, $table2, $table1key, $table2key){
			$sql = "SELECT * FROM $table1, $table2 WHERE ".$table1.".".$table1key." = ".$table2.".".$table2key;
			return $this->db->query($sql);
			// echo $sql;
		}

		function get_dongeng(){
			$sql = "SELECT * FROM tb_dongeng, tb_user, tb_dongeng_category WHERE tb_dongeng.id_user = tb_user.id_user AND tb_dongeng.id_category = tb_dongeng_category.id_dongeng_category ORDER BY id_dongeng DESC";
			return $this->db->query($sql);
		}
		function get_dongeng_search($keyword = '', $id_category){
			$sql = "SELECT * FROM tb_dongeng, tb_user, tb_dongeng_category WHERE tb_dongeng.id_user = tb_user.id_user AND tb_dongeng.id_category = tb_dongeng_category.id_dongeng_category AND (tb_dongeng.title LIKE '%".$keyword."%' OR tb_dongeng.content LIKE '%".$keyword."%') ".($id_category != 0?"AND tb_dongeng.id_category = $id_category":"")." ORDER BY id_dongeng DESC";
			return $this->db->query($sql);
		}
		function get_komunitas(){
			$sql = "SELECT tb_community.id_community, tb_community.community_name, tb_community.permalink, tb_territory.nama as kota, tb_community.profile_image, count(tb_community_member.id_community_member) as member FROM tb_community, tb_territory, tb_community_member WHERE tb_community.id_community = tb_community_member.id_community AND tb_community.id_kota = tb_territory.id_wilayah GROUP BY tb_community.community_name ORDER BY member DESC, id_community DESC";
			return $this->db->query($sql);
		}
		function get_komunitas_search($keyword){
			$sql = "SELECT tb_community.id_community, tb_community.community_name, tb_community.permalink, tb_territory.nama as kota, tb_community.profile_image, count(tb_community_member.id_community_member) as member FROM tb_community, tb_territory, tb_community_member WHERE tb_community.id_community = tb_community_member.id_community AND tb_community.id_kota = tb_territory.id_wilayah AND (tb_community.community_name LIKE '%".$keyword."%' OR tb_community.description LIKE '%".$keyword."%') GROUP BY tb_community.community_name ORDER BY member DESC, id_community DESC";
			return $this->db->query($sql);
		}
		function get_event(){
			$sql = "SELECT tb_event.id_event, tb_event.latitude, tb_event.longitude, tb_event.permalink, tb_event.image, tb_event.event_name, tb_event.address, tb_event.date, tb_community.community_name as komunitas, tb_territory.nama as kota FROM tb_event, tb_community, tb_territory WHERE tb_event.id_community = tb_community.id_community AND tb_event.id_kota = tb_territory.id_wilayah AND tb_event.date >= CURDATE() ORDER BY tb_event.date DESC";
			return $this->db->query($sql);
		}
		function get_event_search($id){
			$sql = "SELECT tb_event.id_event, tb_event.latitude, tb_event.longitude, tb_event.permalink, tb_event.image, tb_event.event_name, tb_event.address, tb_event.date, tb_community.community_name as komunitas, tb_territory.nama as kota FROM tb_event, tb_community, tb_territory WHERE tb_event.id_community = tb_community.id_community AND tb_event.id_kota = tb_territory.id_wilayah AND tb_event.date >= CURDATE() AND (tb_event.id_kota = '$id' OR tb_territory.id_wilayah_parent = '$id') ORDER BY tb_event.date DESC";
			return $this->db->query($sql);
		}
		
		function get_dongeng_detail($id){
			$sql = "SELECT * FROM tb_dongeng, tb_user, tb_dongeng_category WHERE tb_dongeng.id_user = tb_user.id_user AND tb_dongeng.id_category = tb_dongeng_category.id_dongeng_category AND tb_dongeng.permalink = '$id'";
			return $this->db->query($sql);
		}
		function get_komunitas_detail($id){
			$sql = "SELECT tb_community.*, tb_territory.nama as kota, tb_community.profile_image as event FROM tb_community, tb_territory WHERE tb_community.id_kota = tb_territory.id_wilayah AND tb_community.permalink = '$id'";
			return $this->db->query($sql);
		}
		function get_event_detail($id){
			$sql = "SELECT tb_event.*, tb_territory.nama as kota, tb_community.community_name as komunitas FROM tb_event, tb_territory, tb_community WHERE tb_event.id_community = tb_community.id_community AND tb_event.id_kota = tb_territory.id_wilayah AND tb_event.permalink = '$id'";
			return $this->db->query($sql);
		}
		function get_dongeng_by_writer($id){
			$where = array('id_user' => $id);
			$this->db->order_by('id_dongeng', 'DESC');
			return $this->db->get_where("tb_dongeng", $where);
		}
		function get_komunitas_by_status($id, $status){
			$sql = "SELECT * FROM tb_community, tb_community_member WHERE tb_community.id_community = tb_community_member.id_community AND tb_community_member.id_user = $id AND tb_community_member.status = $status ORDER BY tb_community.id_community DESC";
			return $this->db->query($sql);
		}
		function get_member_count($id){
			$sql = "SELECT count(id_community_member) as ctn FROM tb_community_member WHERE id_community = $id";
			return $this->db->query($sql);
		}
		function get_member_by_comm($id){
			$sql = "SELECT tb_user.name, tb_user.profile_image, tb_community_member.status FROM tb_user, tb_community_member WHERE tb_user.id_user = tb_community_member.id_user AND tb_community_member.id_community = $id";
			return $this->db->query($sql);
		}
		function get_event_by_comm($id){
			$sql = "SELECT tb_event.id_event, tb_event.latitude, tb_event.longitude, tb_event.permalink, tb_event.image, tb_event.event_name, tb_event.address, tb_event.date, tb_community.community_name as komunitas, tb_territory.nama as kota FROM tb_event, tb_community, tb_territory WHERE tb_event.id_community = tb_community.id_community AND tb_event.id_kota = tb_territory.id_wilayah AND tb_community.id_community = $id ORDER BY tb_event.date DESC";
			return $this->db->query($sql);
		}
		function get_event_count($id){
			$sql = "SELECT count(id_event) as ctn FROM tb_event WHERE id_community = $id";
			return $this->db->query($sql);
		}	
		function get_post_by_comm($id){
			$sql = "SELECT tb_community_post.id_community_post, tb_user.name, tb_user.profile_image, tb_community_post.content, tb_community_post.date FROM tb_user, tb_community_post WHERE tb_community_post.id_user = tb_user.id_user AND tb_community_post.id_community = $id ORDER BY tb_community_post.id_community_post DESC";
			return $this->db->query($sql);
		}	
		
		function get_random_dongeng(){
			$this->db->order_by('id_dongeng', 'RANDOM');
			$this->db->limit(4);
			return $this->db->get('tb_dongeng');
		}	
		function get_random_community(){
			$sql = "SELECT tb_community.*, tb_territory.nama as kota FROM tb_community, tb_territory WHERE tb_community.id_kota = tb_territory.id_wilayah ORDER BY rand() LIMIT 4";
			return $this->db->query($sql);
		}
		function get_current_event($limit){
			$sql = "SELECT tb_event.*, tb_territory.nama as kota, tb_community.community_name as komunitas FROM tb_event, tb_territory, tb_community WHERE tb_event.id_kota = tb_territory.id_wilayah AND tb_event.id_community = tb_community.id_community ORDER BY tb_event.date DESC LIMIT $limit";
			return $this->db->query($sql);
		}

	

		function get_provinsi(){
			$where = array('level' => '1');
			return $this->db->get_where("tb_territory", $where);
		}
		
		function get_kota($id_provinsi){
			$this->db->where('id_wilayah_parent', $id_provinsi);
			$this->db->order_by('nama', 'asc');
		    $result = $this->db->get('tb_territory')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		    
		    return $result;
		}

		function get_wilayah($id){
			$sql = "SELECT nama FROM tb_territory WHERE id_wilayah = '".$id."'";
			return $this->db->query($sql);
		}

		function get_article($id, $cat, $limit, $offset){
			$whereid = ($id!=0?'AND tb_article.id_article = '.$id:'');
			$wherecat = ($cat!=0?'AND tb_article.id_category = '.$cat:'');
			$o = ($offset!=0?$offset:0);
			$wherelim = ($limit!=0?" LIMIT ".$o.", ".$limit:'');
			$sql = "SELECT * FROM tb_article, tb_admin, tb_category WHERE tb_article.id_user = tb_admin.id_admin AND tb_article.id_category = tb_category.id_category ".$whereid.$wherecat." AND tb_article.show = 1 ORDER BY tb_article.id_article DESC".$wherelim;
			return $this->db->query($sql);
		}
		
		function get_featured(){
			$sql = "SELECT * FROM tb_article_featured, tb_article, tb_admin, tb_category WHERE tb_article_featured.id_article = tb_article.id_article AND tb_article.id_user = tb_admin.id_admin AND tb_article.id_category = tb_category.id_category ORDER BY tb_article.id_article DESC";
			return $this->db->query($sql);
		}

		function get_search($keyword){
			$sql = "SELECT * FROM tb_article, tb_admin, tb_category WHERE tb_article.id_user = tb_admin.id_admin AND tb_article.id_category = tb_category.id_category AND tb_article.content LIKE '%".$keyword."%' ORDER BY tb_article.id_article DESC";
			return $this->db->query($sql);
		}

		function get_related($curr_id, $cat_id){
			$sql = "SELECT * FROM tb_article, tb_admin, tb_category WHERE tb_article.id_user = tb_admin.id_admin AND tb_article.id_category = tb_category.id_category AND tb_article.id_article != ".$curr_id." AND tb_article.id_category = ".$cat_id." ORDER BY tb_article.id_article DESC LIMIT 2";
			return $this->db->query($sql);
		}

		function get_menu($id, $type){
			$sql = "SELECT * FROM tb_menu WHERE id_kedai = ".$id." AND kategori = '".$type."' ORDER BY harga ASC";	

			return $this->db->query($sql);
		}

		function popular_article(){
			$sql = "SELECT tb_article.title, tb_article.id_article, permalink, count(*) FROM tb_article, tb_article_view WHERE tb_article.id_article = tb_article_view.id_article GROUP BY tb_article.id_article ORDER BY count(*) DESC LIMIT 10";	

			return $this->db->query($sql);
		}

		function get_order_by_limit($table, $by, $sort,$limit){
			$this->db->from($table);
			$this->db->order_by($by, $sort);
			$this->db->limit(2);
			return $this->db->get();
		}


		function get_last_comm($id){
			return $this->db->select('id_community')->order_by('id_community',"desc")->limit(1)->get_where('tb_community')->row();
		}

		function add_data($table, $data){
			$this->db->insert($table, $data);
		}

		function update_data($table, $data, $where){
			$this->db->where($where);
			$this->db->update($table, $data);
		}

		function delete_data($table, $where){
			$this->db->where($where);
			$this->db->delete($table);
		}

		function verif($where, $data){
			$this->db->where($where);
			$this->db->update('tb_user', $data);
		}

		function get_community_by_id($permalink){
			$where = array('permalink' => $permalink);
			$this->db->where($where);
			return $this->db->get_where('tb_community', $where)->row()->id_community;
		}
		function get_request_count($where){
			return $this->db->get_where('tb_community_member', $where)->num_rows();
		}
		function get_request($id){
			$where = array(
				'tb_community_member.id_community' => $id,
				'tb_community_member.status' => 1
			);
			$this->db->select('tb_user.id_user, tb_user.name, tb_user.profile_image, tb_community_member.id_community_member')
			         ->from('tb_user')
			         ->join('tb_community_member', 'tb_user.id_user = tb_community_member.id_user');
			$this->db->where($where);
			return $this->db->get()->result();
		}
		function get_post_by_id($id){
			$sql = "SELECT tb_community_post.id_community_post, tb_user.name, tb_user.profile_image, tb_community_post.content, tb_community_post.date FROM tb_user, tb_community_post WHERE tb_community_post.id_user = tb_user.id_user AND tb_community_post.id_community_post = $id";
			return $this->db->query($sql);
		}
		function get_comment_by_post($id){
			$sql = "SELECT tb_community_comment.id_community_comment, tb_user.name, tb_user.profile_image, tb_community_comment.content FROM tb_user, tb_community_comment WHERE tb_community_comment.id_user = tb_user.id_user AND tb_community_comment.id_community_post = $id ORDER BY tb_community_comment.id_community_comment ASC";
			return $this->db->query($sql);
		}		
		function get_member_level($comm_id, $user_id){
			$sql = "SELECT status FROM tb_community_member WHERE id_community = $comm_id AND id_user = $user_id";
			return $this->db->query($sql)->row()->status;
		}
		function get_comment_count($id){
			$sql = "SELECT count(*) as comment FROM tb_community_comment WHERE id_community_post = $id";
			return $this->db->query($sql)->row()->comment;
		}
	}
 ?>