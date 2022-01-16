<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$id = $this->session->userdata('username');
        $data['reseller'] = $this->model_user->profile_reseller($id);

		$this->load->view('template_reseller/header', $data);
		$this->load->view('template_reseller/footer');
	}

	public function reseller_rules()
	{
		$this->load->view('template_reseller/header2');
		$this->load->view('manajemen_reseller/reseller_rules');
		$this->load->view('template_reseller/footer');
	}

	public function top_reseller()
	{
		if($this->session->userdata('level_id') != '2') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">
      		  Login Please!</div>');
			redirect('auth');
		}
		
		$data['top_reseller'] = $this->model_user->tampil_top();

		$this->load->view('template_reseller/header2');
		$this->load->view('manajemen_reseller/top_reseller', $data);
		$this->load->view('template_reseller/footer');
	}

	public function about()
	{
		$this->load->view('template_reseller/header2');
		$this->load->view('manajemen_reseller/about');
		$this->load->view('template_reseller/footer');
	}


}