<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_order extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if($this->session->userdata('level_id') != '2') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">
        Login Please!</div>');
			redirect('auth');
		}
	}

	public function history()
	{
		$id = $this->session->userdata('username');
		$data['invoice'] = $this->model_user->tampil_history($id);

		$this->load->view('template_reseller/header2');
		$this->load->view('reseller/history', $data);
		$this->load->view('template_reseller/footer');
	}

	public function detail_history($id)
	{
		$data['session'] = $this->db->get_where('invoice', ['no_invoice' => $this->session->userdata('id')])->row_array();
        
		$this->load->model('model_user');
        $data['detail_invoice'] = $this->model_user->detail_history($id);

		$this->load->view('template_reseller/header2');
		$this->load->view('reseller/detail_history', $data);
		$this->load->view('template_reseller/footer');
	}

}