<?php

class model_produk extends CI_Model {

	public function tampil_produk()
	{
		// return $this->db->get('product');
		 return $this->db->from('product')
          ->join('kategori', 'product.kategori_id=kategori.id_kategori')
          ->order_by('id_product', 'DESC')
          ->get()
          ->result();
	}

	public function tambahdata_product()
	{
		$config['upload_path']          = './upload/product';
        $config['allowed_types']        = 'jpg|png|jpeg|gif';
        $config['max_size']             = 3024;
        $config['file_name']            = $this->input->post('nama_produk');
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto_product')) {
            $foto_product =  $this->upload->data('file_name');
           
            $this->upload->initialize($config);
         
            $data = [
                "nama_produk" => $this->input->post('nama_produk', true),
                "keterangan" => $this->input->post('keterangan', true),
                "kategori_id" => $this->input->post('kategori_id', true),
                "harga" => $this->input->post('harga', true),
                "foto_product" => $foto_product,
            ];
            $this->db->insert('product', $data);
        } else {
            $this->session->set_flashdata('message', $this->upload->display_errors());
            redirect('produk/tambah_product');
        }
	}

    public function detail_product($id)
    {
        $data['session'] = $this->db->get_where('product', ['id_product' => $this->session->userdata('id')])->row_array();

        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('kategori', 'product.kategori_id = kategori.id_kategori');
        $this->db->where(['id_product' => $id]);
        return $this->db->get()->row_array();
    }

    public function hapus_product($id)
    {
        $this->db->where('id_product', $id);
        $this->db->delete('product');
    }

    public function update_product()
    {
        $id_product = $this->input->post('id');
        $nama_produk = $this->input->post('nama_produk');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        $kategori_id = $this->input->post('kategori_id');
        $upload_image = $this->input->post('foto_product');
     

        $upload_image = $_FILES['foto_product'];

        if ($upload_image == $_FILES['foto_product']) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '3024';
            $config['file_name']       = $this->input->post('nama_produk');
            $config['upload_path']   = './upload/product/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_product')) {

                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_product', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //update nama, email dan telepon
        $this->db->set('nama_produk', $nama_produk);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('harga', $harga);
        $this->db->set('kategori_id', $kategori_id);
        $this->db->where('id_product', $id_product);
        $this->db->update('product');


    }

    public function find($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('kategori', 'product.kategori_id = kategori.id_kategori');
        $this->db->limit(1);
        $this->db->where(['id_product' => $id]);
        
        $result = $this->db->get();
        if ($result->num_rows() > 0 ) {
            return $result->row();
        } else {
            return array();
        }
    }

   
}