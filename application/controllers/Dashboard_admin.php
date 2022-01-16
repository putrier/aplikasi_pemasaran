<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('level_id') != '1') {
			
			redirect('auth/admin');
		}
	}

	public function index()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['jumlah_pending_reseller'] = $this->model_user->jumlah_pending_reseller();
		$data['jumlah_pending'] = $this->model_invoice->jumlah_pending();
		$data['jumlah_received'] = $this->model_invoice->jumlah_received();
		$data['jumlah_completed'] = $this->model_invoice->jumlah_completed();		


		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar',$data);
		$this->load->view('admin/dashboard_admin', $data);
		$this->load->view('template_admin/footer');
	}

	public function pending_reseller()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['data_reseller'] = $this->model_user->tampil_data_reseller()->result();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/pending_reseller', $data);
		$this->load->view('template_admin/footer');
	}

	public function pending_orders()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['invoice'] = $this->model_invoice->tampil_invoice();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_invoice/pending_orders', $data);
		$this->load->view('template_admin/footer');
	}

	public function detail_reseller_pending($id)
	{

		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['session'] = $this->db->get_where('reseller', ['id_reseller' => $this->session->userdata('id')])->row_array();
        
		$this->load->model('model_user');
        $data['reseller'] = $this->model_user->detail_reseller($id);


		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/detail_reseller_pending', $data);
		$this->load->view('template_admin/footer');
	}

	public function detail_invoice_pending($id)
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['session'] = $this->db->get_where('pesanan', ['no_invoice' => $this->session->userdata('id')])->row_array();
        
		$this->load->model('model_invoice');
        $data['detail_invoice'] = $this->model_invoice->detail_pesanan($id);


		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_invoice/detail_invoice_pending', $data);
		$this->load->view('template_admin/footer');
	}


	public function delete_invoice($id)
	{
		$data['session'] = $this->db->get_where('invoice', ['no_invoice' => $this->session->userdata('id')])->row_array();
	

		$this->model_invoice->delete_invoice($id);
        $this->session->set_flashdata('message', ' Di Hapus');
        redirect('dashboard_admin/pending_orders', $data);
	}

	public function delete_invoice2($id)
	{
		$data['session'] = $this->db->get_where('invoice', ['no_invoice' => $this->session->userdata('id')])->row_array();
	

		$this->model_invoice->delete_invoice($id);
        $this->session->set_flashdata('message', ' Di Hapus');
        redirect('manajemen_invoice/tampil_invoice', $data);
	}

	public function completed_orders()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['invoice'] = $this->model_invoice->tampil_invoice();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_invoice/completed_orders', $data);
		$this->load->view('template_admin/footer');
	}

	public function detail_invoice_completed($id)
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['session'] = $this->db->get_where('pesanan', ['no_invoice' => $this->session->userdata('id')])->row_array();
        
		$this->load->model('model_invoice');
        $data['detail_invoice'] = $this->model_invoice->detail_pesanan($id);


		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_invoice/detail_invoice_completed', $data);
		$this->load->view('template_admin/footer');
	}

}