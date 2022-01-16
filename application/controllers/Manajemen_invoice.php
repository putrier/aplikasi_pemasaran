<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_invoice extends CI_Controller {

	public function invoice()
	{
		$model = $this->model_invoice->no_invoice();
        $nourut = substr($model, 4, 5);
        $noinvoiceSekarang = $nourut + 1;
        $data = array('no_invoice' => $noinvoiceSekarang);

        $id = $this->session->userdata('username');
        $data['reseller'] = $this->model_user->profile_reseller($id);
        $data['point'] = $this->model_user->tampil_point($id);



		$this->load->view('template_reseller/header2');
		$this->load->view('manajemen_invoice/invoice_trf', $data);
		$this->load->view('template_reseller/footer');
	}

	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->proses_invoice();
		if($is_processed) {
			$this->cart->destroy();
			$this->session->set_flashdata('message', ' Di Proses');
            redirect('history_order/history');

		} else {
			
            redirect('Manajemen_invoice/invoice_trf');
		}
	}

	public function invoice_cash()
	{
		$model = $this->model_invoice->no_invoice();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($model, 4, 5);
        $noinvoiceSekarang = $nourut + 1;
        $data = array('no_invoice' => $noinvoiceSekarang);

        $id = $this->session->userdata('username');
        $data['reseller'] = $this->model_user->profile_reseller($id);
        $data['point'] = $this->model_user->tampil_point($id);


		$this->load->view('template_reseller/header2');
		$this->load->view('manajemen_invoice/invoice_cash', $data);
		$this->load->view('template_reseller/footer');	
	}

	public function proses_pesanan2()
	{
		$is_processed = $this->model_invoice->proses_invoice2();
		if($is_processed) {
			$this->cart->destroy();
			$this->session->set_flashdata('message', ' Di Proses');
           redirect('history_order/history');

		} else {
			
            redirect('Manajemen_invoice/invoice_cash');
		}
	}


	public function tampil_invoice()
	{

		if($this->session->userdata('level_id') != '1') {
			
			redirect('auth/admin');
		}

		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['invoice'] = $this->model_invoice->tampil_invoice();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_invoice/invoice', $data);
		$this->load->view('template_admin/footer');
	}

	public function detail_invoice($id)
	{

		if($this->session->userdata('level_id') != '1') {
			
			redirect('auth/admin');
		}
		
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['session'] = $this->db->get_where('pesanan', ['no_invoice' => $this->session->userdata('id')])->row_array();
        
		$this->load->model('model_invoice');
        $data['detail_invoice'] = $this->model_invoice->detail_pesanan($id);


		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_invoice/detail_invoice', $data);
		$this->load->view('template_admin/footer');
	}

	public function verifikasi($id)
	{
		$this->model_invoice->update_verifikasi($id);
		$this->session->set_flashdata('message', ' Terverifikasi');

		redirect('manajemen_invoice/tampil_invoice');
	}

	public function update_status_orders($id)
	{
		$this->model_invoice->update_status($id);
		$this->session->set_flashdata('message', ' Selesai');

		redirect('manajemen_invoice/tampil_invoice');
	}
	


}