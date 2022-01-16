<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukti_invoice extends CI_Controller {

	public function print_invoice($id)
	{
		       
	   $data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	   $data['session'] = $this->db->get_where('pesanan', ['no_invoice' => $this->session->userdata('id')])->row_array();
	   $this->load->model('model_invoice');
	   $data['detail_invoice'] = $this->model_invoice->print_invoice($id);
	   
        $this->load->view('template_admin/header2', $data);
		$this->load->view('print/print_invoice', $data);
			
        
	}


}