<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
	function index(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->db->query("SELECT * FROM users where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level']));

				redirect('administrator/home');
			}else{
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			$data['title'] = 'Administrator &rsaquo; Log In';
			$this->load->view('administrator/view_login',$data);
		}
	}

	function home(){
		cek_session_admin();
		$this->template->load('administrator/template','administrator/view_home');
	}

	function identitaswebsite(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_main->identitas_update();
			redirect('administrator/identitaswebsite');
		}else{
			$data['record'] = $this->model_main->identitas()->row_array();
			$this->template->load('administrator/template','administrator/mod_identitas/view_identitas',$data);
		}
	}

	// Controller Modul Menu Website

	function menuwebsite(){
		cek_session_admin();
		$data['record'] = $this->model_menu->menu_website();
		$this->template->load('administrator/template','administrator/mod_menu/view_menu',$data);
	}

	function tambah_menuwebsite(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_menu->menu_website_tambah();
			redirect('administrator/menuwebsite');
		}else{
			$data['record'] = $this->model_menu->menu_utama();
			$this->template->load('administrator/template','administrator/mod_menu/view_menu_tambah',$data);
		}
	}

	function edit_menuwebsite(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_menu->menu_website_update();
			redirect('administrator/menuwebsite');
		}else{
			$data['record'] = $this->model_menu->menu_utama();
			$data['rows'] = $this->model_menu->menu_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_menu/view_menu_edit',$data);
		}
	}

	function delete_menuwebsite(){
		$id = $this->uri->segment(3);
		$this->model_menu->menu_delete($id);
		redirect('administrator/menuwebsite');
	}


	// Controller Modul Halaman Baru

	function halamanbaru(){
		cek_session_admin();
		$data['record'] = $this->model_halaman->halamanstatis();
		$this->template->load('administrator/template','administrator/mod_halaman/view_halaman',$data);
	}

	function tambah_halamanbaru(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_halaman->halamanstatis_tambah();
			redirect('administrator/halamanbaru');
		}else{
			$this->template->load('administrator/template','administrator/mod_halaman/view_halaman_tambah');
		}
	}

	function edit_halamanbaru(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_halaman->halamanstatis_update();
			redirect('administrator/halamanbaru');
		}else{
			$data['rows'] = $this->model_halaman->halamanstatis_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_halaman/view_halaman_edit',$data);
		}
	}

	function delete_halamanbaru(){
		$id = $this->uri->segment(3);
		$this->model_halaman->halamanstatis_delete($id);
		redirect('administrator/halamanbaru');
	}

	// Controller Modul List Berita

	function listberita(){
		cek_session_admin();
		$data['record'] = $this->model_berita->list_berita();
		$this->template->load('administrator/template','administrator/mod_berita/view_berita',$data);
	}

	function tambah_listberita(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_berita->list_berita_tambah();
			redirect('administrator/listberita');
		}else{
			$data['tag'] = $this->model_berita->tag_berita();
			$data['record'] = $this->model_berita->kategori_berita();
			$this->template->load('administrator/template','administrator/mod_berita/view_berita_tambah',$data);
		}
	}

	function cepat_listberita(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_berita->list_berita_cepat();
			redirect('administrator/listberita');
		}else{
			redirect('administrator/listberita');
		}
	}

	function edit_listberita(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->list_berita_update();
			redirect('administrator/listberita');
		}else{
			$data['tag'] = $this->model_berita->tag_berita();
			$data['record'] = $this->model_berita->kategori_berita();
			$data['rows'] = $this->model_berita->list_berita_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_berita/view_berita_edit',$data);
		}
	}

	function delete_listberita(){
		$id = $this->uri->segment(3);
		$this->model_berita->list_berita_delete($id);
		redirect('administrator/listberita');
	}


	// Controller Modul Kategori Berita

	function kategoriberita(){
		cek_session_admin();
		$data['record'] = $this->model_berita->kategori_berita();
		$this->template->load('administrator/template','administrator/mod_kategori/view_kategori',$data);
	}

	function tambah_kategoriberita(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_berita->kategori_berita_tambah();
			redirect('administrator/kategoriberita');
		}else{
			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_tambah');
		}
	}

	function edit_kategoriberita(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->kategori_berita_update();
			redirect('administrator/kategoriberita');
		}else{
			$data['rows'] = $this->model_berita->kategori_berita_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_edit',$data);
		}
	}

	function delete_kategoriberita(){
		$id = $this->uri->segment(3);
		$this->model_berita->kategori_berita_delete($id);
		redirect('administrator/kategoriberita');
	}



		// Controller Modul Menu Group

	function menugroup(){
		cek_session_admin();
		$data['record'] = $this->model_menu->menugroup();
		$this->template->load('administrator/template','administrator/mod_menugroup/view_menugroup',$data);
	}

	function edit_menugroup(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_menu->menugroup_update();
			redirect('administrator/menugroup');
		}else{
			$data['rows'] = $this->model_menu->menugroup_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_menugroup/view_menugroup_edit',$data);
		}
	}



	// Controller Modul List Berita

	function menugrouplist(){
		cek_session_admin();
		$data['record'] = $this->model_menu->menugrouplist();
		$this->template->load('administrator/template','administrator/mod_menugroup_list/view_menugroup_list',$data);
	}

	function tambah_menugrouplist(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_menu->menugrouplist_tambah();
			redirect('administrator/menugrouplist');
		}else{
			$data['record'] = $this->model_menu->menugroup();
			$this->template->load('administrator/template','administrator/mod_menugroup_list/view_menugroup_list_tambah',$data);
		}
	}

	function edit_menugrouplist(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_menu->menugrouplist_update();
			redirect('administrator/menugrouplist');
		}else{
			$data['record'] = $this->model_menu->menugroup();
			$data['rows'] = $this->model_menu->menugrouplist_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_menugroup_list/view_menugroup_list_edit',$data);
		}
	}

	function delete_menugrouplist(){
		$id = $this->uri->segment(3);
		$this->model_menu->menugrouplist_delete($id);
		redirect('administrator/menugrouplist');
	}




	// Controller Modul Tag Berita

	function tagberita(){
		cek_session_admin();
		$data['record'] = $this->model_berita->tag_berita();
		$this->template->load('administrator/template','administrator/mod_tag/view_tag',$data);
	}

	function tambah_tagberita(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_berita->tag_berita_tambah();
			redirect('administrator/tagberita');
		}else{
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_tambah');
		}
	}

	function edit_tagberita(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->tag_berita_update();
			redirect('administrator/tagberita');
		}else{
			$data['rows'] = $this->model_berita->tag_berita_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_edit',$data);
		}
	}

	function delete_tagberita(){
		$id = $this->uri->segment(3);
		$this->model_berita->tag_berita_delete($id);
		redirect('administrator/tagberita');
	}



	// Controller Modul Iklan Home

	function iklanhome(){
		cek_session_admin();
		$data['record'] = $this->model_iklan->iklan_tengah();
		$this->template->load('administrator/template','administrator/mod_iklanhome/view_iklanhome',$data);
	}

	function tambah_iklanhome(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_iklan->iklan_tengah_tambah();
			redirect('administrator/iklanhome');
		}else{
			$this->template->load('administrator/template','administrator/mod_iklanhome/view_iklanhome_tambah');
		}
	}

	function edit_iklanhome(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_iklan->iklan_tengah_update();
			redirect('administrator/iklanhome');
		}else{
			$data['rows'] = $this->model_iklan->iklan_tengah_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_iklanhome/view_iklanhome_edit',$data);
		}
	}

	function delete_iklanhome(){
		$id = $this->uri->segment(3);
		$this->model_iklan->iklan_tengah_delete($id);
		redirect('administrator/iklanhome');
	}



		// Controller Modul Download

	function download(){
		cek_session_admin();
		$data['record'] = $this->model_download->download();
		$this->template->load('administrator/template','administrator/mod_download/view_download',$data);
	}

	function tambah_download(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_download->download_tambah();
			redirect('administrator/download');
		}else{
			$this->template->load('administrator/template','administrator/mod_download/view_download_tambah');
		}
	}

	function edit_download(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_download->download_update();
			redirect('administrator/download');
		}else{
			$data['rows'] = $this->model_download->download_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_download/view_download_edit',$data);
		}
	}

	function delete_download(){
		$id = $this->uri->segment(3);
		$this->model_download->download_delete($id);
		redirect('administrator/download');
	}




	// Controller Modul Lowker

	function lowker(){
		cek_session_admin();
		$data['record'] = $this->model_lowongan->lowker();
		$this->template->load('administrator/template','administrator/mod_lowker/view_lowker',$data);
	}

	function tambah_lowker(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_lowongan->lowker_tambah();
			redirect('administrator/lowker');
		}else{
			$this->template->load('administrator/template','administrator/mod_lowker/view_lowker_tambah');
		}
	}

	function edit_lowker(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_lowongan->lowker_update();
			redirect('administrator/lowker');
		}else{
			$data['rows'] = $this->model_lowongan->lowker_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_lowker/view_lowker_edit',$data);
		}
	}

	function delete_lowker(){
		$id = $this->uri->segment(3);
		$this->model_lowongan->lowker_delete($id);
		redirect('administrator/lowker');
	}



	// Controller Modul Iklan Sidebar

	function iklansidebar(){
		cek_session_admin();
		$data['record'] = $this->model_iklan->iklan_sidebar();
		$this->template->load('administrator/template','administrator/mod_iklansidebar/view_iklansidebar',$data);
	}

	function tambah_iklansidebar(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_iklan->iklan_sidebar_tambah();
			redirect('administrator/iklansidebar');
		}else{
			$this->template->load('administrator/template','administrator/mod_iklansidebar/view_iklansidebar_tambah');
		}
	}

	function edit_iklansidebar(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_iklan->iklan_sidebar_update();
			redirect('administrator/iklansidebar');
		}else{
			$data['rows'] = $this->model_iklan->iklan_sidebar_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_iklansidebar/view_iklansidebar_edit',$data);
		}
	}

	function delete_iklansidebar(){
		$id = $this->uri->segment(3);
		$this->model_iklan->iklan_sidebar_delete($id);
		redirect('administrator/iklansidebar');
	}



	// Controller Modul Logo

	function logowebsite(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_main->logo_update();
			redirect('administrator/logowebsite');
		}else{
			$data['record'] = $this->model_main->logo();
			$this->template->load('administrator/template','administrator/mod_logowebsite/view_logowebsite',$data);
		}
	}



	// Controller Modul Template Website

	function templatewebsite(){
		cek_session_admin();
		$data['record'] = $this->model_main->template();
		$this->template->load('administrator/template','administrator/mod_template/view_template',$data);
	}

	function tambah_templatewebsite(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_main->template_tambah();
			redirect('administrator/templatewebsite');
		}else{
			$this->template->load('administrator/template','administrator/mod_template/view_template_tambah');
		}
	}

	function edit_templatewebsite(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_main->template_update();
			redirect('administrator/templatewebsite');
		}else{
			$data['rows'] = $this->model_main->template_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_template/view_template_edit',$data);
		}
	}

	function delete_templatewebsite(){
		$id = $this->uri->segment(3);
		$this->model_main->template_delete($id);
		redirect('administrator/templatewebsite');
	}




	// Controller Modul Agenda

	function agenda(){
		cek_session_admin();
		$data['record'] = $this->model_agenda->agenda();
		$this->template->load('administrator/template','administrator/mod_agenda/view_agenda',$data);
	}

	function tambah_agenda(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_agenda->agenda_tambah();
			redirect('administrator/agenda');
		}else{
			$this->template->load('administrator/template','administrator/mod_agenda/view_agenda_tambah');
		}
	}

	function edit_agenda(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_agenda->agenda_update();
			redirect('administrator/agenda');
		}else{
			$data['rows'] = $this->model_agenda->agenda_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_agenda/view_agenda_edit',$data);
		}
	}

	function delete_agenda(){
		$id = $this->uri->segment(3);
		$this->model_agenda->agenda_delete($id);
		redirect('administrator/agenda');
	}




	// Controller Modul YM

	function ym(){
		cek_session_admin();
		$data['record'] = $this->model_main->ym();
		$this->template->load('administrator/template','administrator/mod_ym/view_ym',$data);
	}

	function tambah_ym(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_main->ym_tambah();
			redirect('administrator/ym');
		}else{
			$this->template->load('administrator/template','administrator/mod_ym/view_ym_tambah');
		}
	}

	function edit_ym(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_main->ym_update();
			redirect('administrator/ym');
		}else{
			$data['rows'] = $this->model_main->ym_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_ym/view_ym_edit',$data);
		}
	}

	function delete_ym(){
		$id = $this->uri->segment(3);
		$this->model_main->ym_delete($id);
		redirect('administrator/ym');
	}




	// Controller Modul Pesan Masuk

	function pesanmasuk(){
		cek_session_admin();
		$data['record'] = $this->model_main->pesan_masuk();
		$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk',$data);
	}

	function detail_pesanmasuk(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		$this->db->query("UPDATE hubungi SET dibaca='Y' where id_hubungi='$id'");
		if (isset($_POST['submit'])){
			$this->model_main->pesan_masuk_kirim();
			$data['rows'] = $this->model_main->pesan_masuk_view($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}else{
			$data['rows'] = $this->model_main->pesan_masuk_view($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}
	}




	// Controller Modul User

	function manajemenuser(){
		cek_session_admin();
		$data['record'] = $this->model_users->users();
		$this->template->load('administrator/template','administrator/mod_users/view_users',$data);
	}

	function tambah_manajemenuser(){
		cek_session_admin();
		$id = $this->session->username;
		if (isset($_POST['submit'])){
			$this->model_users->users_tambah();
			redirect('administrator/manajemenuser');
		}else{
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_users/view_users_tambah',$data);
		}
	}

	function edit_manajemenuser(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_users->users_update();
			redirect('administrator/manajemenuser');
		}else{
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
		}
	}

	function delete_manajemenuser(){
		$id = $this->uri->segment(3);
		$this->model_users->users_delete($id);
		redirect('administrator/manajemenuser');
	}

	


	// Controller Modul Modul

	function manajemenmodul(){
		cek_session_admin();
		$data['record'] = $this->model_modul->modul();
		$this->template->load('administrator/template','administrator/mod_modul/view_modul',$data);
	}

	function tambah_manajemenmodul(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$this->model_modul->modul_tambah();
			redirect('administrator/manajemenmodul');
		}else{
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_tambah');
		}
	}

	function edit_manajemenmodul(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_modul->modul_update();
			redirect('administrator/manajemenmodul');
		}else{
			$data['rows'] = $this->model_modul->modul_edit($id)->row_array();
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_edit',$data);
		}
	}

	function delete_manajemenmodul(){
		$id = $this->uri->segment(3);
		$this->model_modul->modul_delete($id);
		redirect('administrator/manajemenmodul');
	}

	    // Controller Modul Album

    function album(){
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('album','id_album','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('album',array('username'=>$this->session->username),'id_album','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_album/view_album',$data);
    }

    function tambah_album(){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_album/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'aktif'=>'Y',
                            'hits_album'=>'0',
                            'tgl_posting'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'hari'=>hari_ini(date('w')),
                            'username'=>$this->session->username);
            }else{
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'gbr_album'=>$hasil['file_name'],
                            'aktif'=>'Y',
                            'hits_album'=>'0',
                            'tgl_posting'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'hari'=>hari_ini(date('w')),
                            'username'=>$this->session->username);
            }

            $this->model_app->insert('album',$data);  
            redirect('administrator/album');
        }else{
            $this->template->load('administrator/template','administrator/mod_album/view_album_tambah');
        }
    }

    function edit_album(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_album/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'aktif'=>$this->input->post('d'));
            }else{
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'gbr_album'=>$hasil['file_name'],
                            'aktif'=>$this->input->post('d'));
            }
            $where = array('id_album' => $this->input->post('id'));
            $this->model_app->update('album', $data, $where);
            redirect('administrator/album');
        }else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('album', array('id_album' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('album', array('id_album' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_album/view_album_edit',$data);
        }
    }

    function delete_album(){
        if ($this->session->level=='admin'){
            $id = array('id_album' => $this->uri->segment(3));
        }else{
            $id = array('id_album' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('album',$id);
        redirect('administrator/album');
    }


    // Controller Modul Gallery

    function gallery(){
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_join_one('gallery','album','id_album','id_gallery','DESC');
        }else{
            $data['record'] = $this->model_app->view_join_where('gallery','album','id_album',array('gallery.username'=>$this->session->username),'id_gallery','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_gallery/view_gallery',$data);
    }

    function tambah_gallery(){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_galeri/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('id_album'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'));
            }else{
                $data = array('id_album'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_gallery'=>$hasil['file_name']);
            }
            $this->model_app->insert('gallery',$data);  
            redirect('administrator/gallery');
        }else{
            $data['record'] = $this->model_app->view_ordering('album','id_album','DESC');
            $this->template->load('administrator/template','administrator/mod_gallery/view_gallery_tambah',$data);
        }
    }

    function edit_gallery(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_galeri/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('id_album'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'));
            }else{
                $data = array('id_album'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_gallery'=>$hasil['file_name']);
            }
            $where = array('id_gallery' => $this->input->post('id'));
            $this->model_app->update('gallery', $data, $where);
            redirect('administrator/gallery');
        }else{
            $record = $this->model_app->view_ordering('album','id_album','DESC');
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('gallery', array('id_gallery' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('gallery', array('id_gallery' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses,'record' => $record);
            $this->template->load('administrator/template','administrator/mod_gallery/view_gallery_edit',$data);
        }
    }

    function delete_gallery(){
        if ($this->session->level=='admin'){
            $id = array('id_gallery' => $this->uri->segment(3));
        }else{
            $id = array('id_gallery' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('gallery',$id);
        redirect('administrator/gallery');
    }


    // Controller Modul Video

    function video(){
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_join_one('video','playlist','id_playlist','id_video','DESC');
        }else{
            $data['record'] = $this->model_app->view_join_where('video','playlist','id_playlist',array('video.username'=>$this->session->username),'id_video','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_video/view_video',$data);
    }

    function tambah_video(){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_video/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();

            if ($this->input->post('f')!=''){
                $tag_seo = $this->input->post('f');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            
            if ($hasil['file_name']==''){
                $data = array('id_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'dilihat'=>'0',
                            'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'tagvid'=>$tag);
            }else{
                $data = array('id_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_video'=>$hasil['file_name'],
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'dilihat'=>'0',
                            'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'tagvid'=>$tag);
            }
            $this->model_app->insert('video',$data);  
            redirect('administrator/video');
        }else{
            $data['record'] = $this->model_app->view_ordering('playlist','id_playlist','DESC');
            $data['tag'] = $this->model_app->view_ordering('tagvid','id_tag','DESC');
            $this->template->load('administrator/template','administrator/mod_video/view_video_tambah',$data);
        }
    }

    function edit_video(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_video/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();

            if ($this->input->post('f')!=''){
                $tag_seo = $this->input->post('f');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }

            if ($hasil['file_name']==''){
                $data = array('id_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'tagvid'=>$tag);
            }else{
                $data = array('id_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_video'=>$hasil['file_name'],
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'tagvid'=>$tag);
            }

            $where = array('id_video' => $this->input->post('id'));
            $this->model_app->update('video', $data, $where);
            redirect('administrator/video');
        }else{
            $record = $this->model_app->view_ordering('playlist','id_playlist','DESC');
            $tag = $this->model_app->view_ordering('tagvid','id_tag','DESC');
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('video', array('id_video' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('video', array('id_video' => $id, 'username' => $this->session->username))->row_array();
            }
            
            $data = array('rows' => $proses,'record' => $record, 'tag' => $tag);
            $this->template->load('administrator/template','administrator/mod_video/view_video_edit',$data);
        }
    }

    function delete_video(){
        if ($this->session->level=='admin'){
            $id = array('id_video' => $this->uri->segment(3));
        }else{
            $id = array('id_video' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('video',$id);
        redirect('administrator/video');
    }


    // Controller Modul Playlist

    function playlist(){
        $data['record'] = $this->model_app->view_ordering('playlist','id_playlist','DESC');
        $this->template->load('administrator/template','administrator/mod_playlist/view_playlist',$data);
    }

    function tambah_playlist(){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_playlist/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'aktif'=>'Y');
            }else{
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'gbr_playlist'=>$hasil['file_name'],
                            'aktif'=>'Y');
            }
            $this->model_app->insert('playlist',$data);  
            redirect('administrator/playlist');
        }else{
            $this->template->load('administrator/template','administrator/mod_playlist/view_playlist_tambah');
        }
    }

    function edit_playlist(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_playlist/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'aktif'=>$this->input->post('c'));
            }else{
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'username'=>$this->session->username,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'gbr_playlist'=>$hasil['file_name'],
                            'aktif'=>$this->input->post('c'));
            }
            $where = array('id_playlist' => $this->input->post('id'));
            $this->model_app->update('playlist', $data, $where);
            redirect('administrator/playlist');
        }else{
            $proses = $this->model_app->edit('playlist', array('id_playlist' => $id))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_playlist/view_playlist_edit',$data);
        }
    }

    function delete_playlist(){
        $id = array('id_playlist' => $this->uri->segment(3));
        $this->model_app->delete('playlist',$id);
        redirect('administrator/playlist');
    }


    // Controller Modul Tag Video

    function tagvideo(){
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('tagvid','id_tag','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('tagvid',array('username'=>$this->session->username),'id_tag','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_tagvideo/view_tag',$data);
    }

    function tambah_tagvideo(){
        if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')),
                        'count'=>'0');
            $this->model_app->insert('tagvid',$data);  
            redirect('administrator/tagvideo');
        }else{
            $this->template->load('administrator/template','administrator/mod_tagvideo/view_tag_tambah');
        }
    }

    function edit_tagvideo(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')));
            $where = array('id_tag' => $this->input->post('id'));
            $this->model_app->update('tagvid', $data, $where);
            redirect('administrator/tagvideo');
        }else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('tagvid', array('id_tag' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('tagvid', array('id_tag' => $id, 'username' => $this->session->username))->row_array();
            }
            
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_tagvideo/view_tag_edit',$data);
        }
    }

    function delete_tagvideo(){
        if ($this->session->level=='admin'){
            $id = array('id_tag' => $this->uri->segment(3));
        }else{
            $id = array('id_tag' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('tagvid',$id);
        redirect('administrator/tagvideo');
    }



    // Controller Modul Link Terkait

    function linkterkait(){
        $data['record'] = $this->model_app->view_ordering('link_terkait','id_link_terkait','DESC');
        $this->template->load('administrator/template','administrator/mod_linkterkait/view_linkterkait',$data);
    }

    function edit_linkterkait(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('judul_menu'=>$this->input->post('a'),
            			  'detail_menu'=>$this->input->post('b'),
            			  'link'=>$this->input->post('c'));
            $where = array('id_link_terkait' => $this->input->post('id'));
            $this->model_app->update('link_terkait', $data, $where);
            redirect('administrator/linkterkait');
        }else{
            $proses = $this->model_app->edit('link_terkait', array('id_link_terkait' => $id))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_linkterkait/view_linkterkait_edit',$data);
        }
    }

	function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}
}
