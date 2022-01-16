<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_admin extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if($this->session->userdata('level_id') != '1') {
			
			redirect('auth/admin');
		}
	}

	public function data_reseller()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['data_reseller'] = $this->model_user->tampil_data_reseller()->result();
		

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/data_reseller', $data);
		$this->load->view('template_admin/footer');
	}

	public function detail_reseller($id)
	{
		// $data['data_reseller'] = $this->model_user->tampil_data_reseller()->result();

		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['session'] = $this->db->get_where('reseller', ['id_reseller' => $this->session->userdata('id')])->row_array();
        
		$this->load->model('model_user');
        $data['reseller'] = $this->model_user->detail_reseller($id);


		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/detail_reseller', $data);
		$this->load->view('template_admin/footer');
	}

	public function hapus_reseller($id)
	{
		$this->model_user->hapus_reseller($id);
        $this->session->set_flashdata('message', ' Di Hapus');
        redirect('manajemen_admin/data_reseller', $data);
	}

	public function manajemen_reward()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['data_reward'] = $this->model_user->tampil_data_reward();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/manajemen_reward', $data);
		$this->load->view('template_admin/footer');
	}

	public function hapus_reward($id)
	{
		$this->model_user->hapus_reward($id);
        $this->session->set_flashdata('message', ' Di Hapus');
        redirect('manajemen_admin/manajemen_reward', $data);
	}

	public function update_aktif($id)
	{
		
        $this->model_user->update_aktif($id);
        $this->session->set_flashdata('message', ' Di Aktifkan');

        redirect('manajemen_admin/manajemen_reward');
	}

	public function update_deactive($id)
	{
		
        $this->model_user->update_deactive($id);
        $this->session->set_flashdata('message', ' Di Nonaktifkan');

        redirect('manajemen_admin/manajemen_reward');
	}

	public function update_pengambilan($id)
	{
		$this->model_user->update_pengambilan($id);
        $this->session->set_flashdata('message', ' Di Ambil');

        redirect('manajemen_admin/manajemen_reward');
	}

	public function update_aktif_reseller($id)
	{
		
        $this->model_user->update_aktif_reseller($id);
        $this->session->set_flashdata('message', ' Di Aktifkan');

        redirect('manajemen_admin/data_reseller');
	}

}