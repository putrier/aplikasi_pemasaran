<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function laporan_penjualan($filter = null)
	{
		// $data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		// $this->load->model('model_laporan');
		$data['bulan'] = $this->model_laporan->lap();
		$data['tahun'] = $this->model_laporan->lap2();
		
		
		$filter = [
			"bulan" => $this->input->post('bulan', true),
			"tahun" => $this->input->post('tahun', true),
		];

	

        if (isset($filter)) {
          
            $data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
               $data['laporan'] = $this->model_laporan->laporan($filter);
           
            $data['filter'] = $filter;

            $this->load->view('template_admin/header');
			$this->load->view('template_admin/sidebar', $data);
			$this->load->view('print/laporan_penjualan', $data);
			$this->load->view('template_admin/footer');
        } else {
           
            $data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
            $data['laporann'] = $this->model_laporan->laporan($filter);
           
            $data['filter'] = $filter;

            $this->load->view('template_admin/header');
			$this->load->view('template_admin/sidebar', $data);
			$this->load->view('print/laporan_penjualan', $data);
			$this->load->view('template_admin/footer');
        }


		
			
	}

	public function print_laporan()
	{

		$filter = [
			"bulan" => $this->input->post('bulan', true),
			"tahun" => $this->input->post('tahun', true),
		];
		  $data['laporan'] = $this->model_laporan->laporan($filter);
		   $data['laporan_total'] = $this->model_laporan->laporan_pemasukan($filter);
		   $data['filter'] = $filter;

		$this->load->view('template_admin/header3', $data);
		$this->load->view('print/print_laporan', $data);
	}





}