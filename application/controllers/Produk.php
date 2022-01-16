<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_produk');
        if($this->session->userdata('level_id') != '1') {
			
			redirect('auth/admin');
		}

    }

    // MENAMPILKAN DATA PRODUK
	public function data_product()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['data_produk'] = $this->model_produk->tampil_produk();
		$data['kategori'] = $this->db->get('kategori')->result();

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/data_produk', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_product()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['session'] = $this->db->get_where('product', ['id_product' => $this->session->userdata('id')])->row_array();
		 $data['kategori'] = $this->db->get('kategori')->result();

        $this->form_validation->set_rules('nama_produk', 'product name', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'description', 'required|trim');
        $this->form_validation->set_rules('kategori_id', 'category', 'required');
        $this->form_validation->set_rules('harga', 'price product', 'required|trim');
       

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header');
			$this->load->view('template_admin/sidebar', $data);
			$this->load->view('manajemen_admin/tambah_produk', $data);
			$this->load->view('template_admin/footer');

            //jika form validasi benar
        } else {

            $this->model_produk->tambahdata_product();
            $this->session->set_flashdata('message', ' Di Tambahkan');
            redirect('produk/data_product');
        }
	}

	public function detail_product($id)
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['session'] = $this->db->get_where('product', ['id_product' => $this->session->userdata('id')])->row_array();
        
		$this->load->model('model_produk');
        $data['detail_product'] = $this->model_produk->detail_product($id);

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/detail_produk', $data);
		$this->load->view('template_admin/footer');
	}

	public function hapus_product($id)
	{
		$this->model_produk->hapus_product($id);
        $this->session->set_flashdata('message', ' Di Hapus');
        redirect('produk/data_product', $data);
	}

	
	public function edit_product($id)
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->model('model_produk');
        $data['produk'] = $this->model_produk->detail_product($id);
		$data['kategori'] = $this->db->get('kategori')->result();
        
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('manajemen_admin/edit_produk', $data);
		$this->load->view('template_admin/footer');
	}


	public function update_product()
	{
		$this->load->model('model_produk');
        //form validasi set rules
        $this->form_validation->set_rules('nama_produk', 'product name', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        $this->form_validation->set_rules('harga', 'price', 'required|trim');
        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
        	redirect('produk/data_product');
            //jika form validasi benar
        } else {
            $this->model_produk->update_product();
            $this->session->set_flashdata('message', ' Di Update');
            redirect('produk/data_product');
        }
	}


	
	

}