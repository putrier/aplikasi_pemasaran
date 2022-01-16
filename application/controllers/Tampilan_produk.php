<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan_produk extends CI_Controller {
	

	public function product()
	{
		$data['menu_product'] = $this->model_produk->tampil_produk();

		$this->load->view('template_reseller/header2');
		$this->load->view('manajemen_reseller/product', $data);
		$this->load->view('template_reseller/footer');
	}

	
	/*================ Pengolahan Produk dan Keranjang ==================*/
	public function add_to_cart($id)
	{
		if($this->session->userdata('level_id') != '2') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">
        Login Please!</div>');
			redirect('auth');
		}

		$menu_product = $this->model_produk->find($id);

		$data = array(
        'id'      => $menu_product->id_product,
        'name'    => $menu_product->nama_produk,
        'qty'     => 20,
        'kategori' => $menu_product->kategori,
        'point'	  => $menu_product->point_kategori,
        'foto_product' => $menu_product->foto_product,
        'price'   => $menu_product->harga
        
		);

		$this->cart->insert($data);
		redirect('Tampilan_produk/product');
	}

	public function cart()
	{
		if($this->session->userdata('level_id') != '2') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">
        Login Please!</div>');
			redirect('auth');
		}

		$this->load->view('template_reseller/header2');
		$this->load->view('manajemen_reseller/cart');
		$this->load->view('template_reseller/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('Tampilan_produk/cart');
	}

	public function delete()
	{
		 $data = array(

                'rowid' => $this->uri->segment(3),

                'qty'   => 0);

                $this->cart->update($data);
                redirect('Tampilan_produk/cart');
	}

	public function tambahcart(){
		  $row_id= $_POST['row'];
		  
		  $qty = ($_POST['qty'] + 1);
		 
		  $array=array('rowid' =>$row_id ,'qty'=>$qty);
		  $this->cart->update($array);
		
		  $data = array(
		  'status' => 'Success',
		  );
		  
		  echo json_encode($data);		
		  }
		  
	public function kurangcart(){
		  $row_id= $_POST['row'];
		  $qty = ($_POST['qty'] - 1);
		  if($qty >19) {   
		  $array=array('rowid' =>$row_id ,'qty'=>$qty);
		  $this->cart->update($array);
		
		  $data = array(
		  'status' => 'Success',
		  );
		  
		  echo json_encode($data);		
		  }	
	}

	/*================ Selesai Pengolahan Produk dan Keranjang ==================*/


}