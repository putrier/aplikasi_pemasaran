<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index()
	{
		$this->form_validation->set_rules('nama_reseller', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('no_ktp', 'Number KTP', 'required|trim|min_length[14]|max_length[20]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[reseller.username]');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim|min_length[10]');
		$this->form_validation->set_rules('kota', 'City', 'required|trim');
		$this->form_validation->set_rules('telp_reseller', 'Number Telephone', 'required|trim|is_natural|min_length[5]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',
			['matches' => 'Password dont match!', 'min_length' => 'password too short!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$this->load->view('auth_reseller/form_register');
		}
		else {
			$data = [
				'nama_reseller' => htmlspecialchars($this->input->post('nama_reseller',true)),
				'no_ktp' => htmlspecialchars($this->input->post('no_ktp',true)),
				'username' => htmlspecialchars($this->input->post('username',true)),
				'alamat' => htmlspecialchars($this->input->post('alamat',true)),
				'telp_reseller' => htmlspecialchars($this->input->post('telp_reseller',true)),
				'kota' => htmlspecialchars($this->input->post('kota',true)),
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'foto_reseller' => 'default.jpg',
				'status_reseller' => 0,
				'tgl_buat' => time(),
				'level_id' => 2,
			];

			$this->db->insert('reseller', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Waiting for account confirmation that is activated from admin, long  time 1 x 24 hours. <br>
				Admin will contact your number.</div>');
			redirect('auth');
			
		}

	}

	public function admin()
	{
		$this->form_validation->set_rules('nama_admin', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[reseller.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',
			['matches' => 'Password dont match!', 'min_length' => 'password too short!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$this->load->view('auth_admin/form_register');
		}
		else {
			$data = [
				'nama_admin' => htmlspecialchars($this->input->post('nama_admin',true)),
				'username' => htmlspecialchars($this->input->post('username',true)),
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'foto_admin' => 'default.jpg',
				'tgl_buat' => time(),
				'level_id' => 1,
			];

			$this->db->insert('admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Congratulations! Account succesfully created</div>');
			redirect('auth/admin');
			
		}

	}

}