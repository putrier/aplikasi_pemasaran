<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Point extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if($this->session->userdata('level_id') != '1') {
			
			redirect('auth/admin');
		}
	}

	public function manajemen_point()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['point'] = $this->model_invoice->tampil_point();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/manajemen_point', $data);
		$this->load->view('template_admin/footer');
		
	}

	public function add_point($id)
	{

		$data['adm'] = $this->db->get_where('admin', [	'username' => $this->session->userdata('username')])->row_array();

		$this->load->model('model_invoice');
        $data['point'] = $this->model_invoice->add($id);
		
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/add_point', $data);
		$this->load->view('template_admin/footer');
	}

	public function proses_add_point()
	{
		
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['session'] = $this->db->get_where('tbl_reward', ['id_reward' => $this->session->userdata('id')])->row_array();

		$this->form_validation->set_rules('reward', 'reward', 'required');
        $this->form_validation->set_rules('keterangan', 'description', 'required|trim');

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header');
			$this->load->view('template_admin/sidebar', $data);
			$this->load->view('manajemen_admin/manajemen_reward', $data);
			$this->load->view('template_admin/footer');

            //jika form validasi benar
        } else {

            $this->model_invoice->proses_add_point();
            $this->session->set_flashdata('message', ' Di Proses');
            redirect('manajemen_admin/manajemen_reward', $data);
        }
	}

	

}