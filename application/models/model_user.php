<?php

class model_user extends CI_Model {

	public function tampil_data_reseller()
	{
		return $this->db->query('SELECT*FROM reseller ORDER BY id_reseller DESC');
	}

	public function detail_reseller($id)
	{
		$this->db->select('*');
        $this->db->from('reseller');
        $this->db->join('level', 'reseller.level_id = level.id_level');
        $this->db->where(['id_reseller' => $id]);
        return $this->db->get()->row_array();
	}

	public function hapus_reseller($id)
	{
		$this->db->where('id_reseller', $id);
        $this->db->delete('reseller');
	}

	public function profile_admin($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level', 'admin.level_id = level.id_level');
        $this->db->where(['username' => $id]);
        return $this->db->get()->row_array();
    }

    public function edit_admin($id)
    {
    	$this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level', 'admin.level_id = level.id_level');
        $this->db->where(['username' => $id]);
        return $this->db->get()->row_array();
    }

    public function update_adm()
    {
    	$id_admin = $this->input->post('id');
        $nama_admin = $this->input->post('nama_admin');
        $upload_image = $this->input->post('foto_admin');
     

        $upload_image = $_FILES['foto_admin'];

        if ($upload_image == $_FILES['foto_admin']) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '3024';
            $config['file_name']       = $this->input->post('nama_admin');
            $config['upload_path']   = './assets/admin/dist/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_admin')) {

                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_admin', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //Proses Update
        $this->db->set('nama_admin', $nama_admin);
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin');
    }

    public function profile_reseller($id)
    {
        $this->db->select('*');
        $this->db->from('reseller');
        $this->db->join('level', 'reseller.level_id = level.id_level');
        $this->db->where(['username' => $id]);
        return $this->db->get()->row_array();

    
    }

    public function tampil_point($id)
    {
        $thn = date('Y');
        $bln = date('m');
       
            $query = $this->db->query("SELECT B.*, SUM(A.point_reseller) as bulanan FROM point AS A JOIN reseller AS B ON A.id_reseller=B.id_reseller WHERE A.id_reseller=B.id_reseller AND MONTH(A.tgl_pesanan) = $bln AND YEAR(A.tgl_pesanan) = $thn AND B.username = '$id' LIMIT 1");

        $hasil = $query->row_array();
        return $hasil;

    }

    public function update_rs()
    {
        $id_reseller = $this->input->post('id');
        $nama_reseller = $this->input->post('nama_reseller');
        $no_ktp = $this->input->post('no_ktp');
        $alamat = $this->input->post('alamat');
        $telp_reseller = $this->input->post('telp_reseller');
        $kota = $this->input->post('kota');

        $upload_image = $this->input->post('foto_reseller');
     
        $upload_image = $_FILES['foto_reseller'];

        if ($upload_image == $_FILES['foto_reseller']) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '3024';
            $config['file_name']       = $this->input->post('nama_reseller');
            $config['upload_path']   = './upload/foto_reseller/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_reseller')) {

                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_reseller', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //Proses Update
        $this->db->set('nama_reseller', $nama_reseller);
          $this->db->set('no_ktp', $no_ktp);
        $this->db->set('kota', $kota);
        $this->db->set('alamat', $alamat);
        $this->db->set('telp_reseller', $telp_reseller);
        $this->db->where('id_reseller', $id_reseller);
        $this->db->update('reseller');
    }

    public function tampil_top()
    {
         return $this->db->from('tbl_reward')
          ->join('reseller', 'tbl_reward.id_reseller=reseller.id_reseller')
          ->get()
          ->result();
    }

    public function tampil_data_reward()
    {
         return $this->db->from('tbl_reward')
          ->join('reseller', 'tbl_reward.id_reseller=reseller.id_reseller')
          ->order_by('id_reward', 'DESC')
          ->get()
          ->result();
    }

    public function hapus_reward($id)
    {
        $this->db->where('id_reward', $id);
        $this->db->delete('tbl_reward');
    }

     public function update_aktif($id)
    {
        $st = 0;
        $data = [
            "status" => 1
        ];
        $this->db->where(['id_reseller' => $id]);
        $this->db->where(['status' => $st]);

        $this->db->limit(1);
        $this->db->update('tbl_reward', $data);
    }

    public function update_deactive($id)
    {
        $st = 1;
        $data = [
            "status" => 2
        ];
        $this->db->where(['id_reseller' => $id]);
        $this->db->where(['status' => $st]);
        $this->db->limit(1);
        $this->db->update('tbl_reward', $data);
    }

    public function tampil_history($id)
    {
           return $this->db->from('invoice')
          
          ->join('pesanan', 'invoice.no_invoice=pesanan.no_invoice')
          ->join('reseller', 'invoice.id_reseller=reseller.id_reseller')
          ->where(['reseller.username' => $id])
          ->group_by('invoice.no_invoice')
          ->order_by('invoice.no_invoice', 'DESC')
          ->get()
          ->result();
    }

    public function detail_history($id)
    {
         return $this->db->from('invoice')
          ->join('pesanan', 'invoice.no_invoice=pesanan.no_invoice')
          ->join('reseller', 'invoice.id_reseller=reseller.id_reseller')
          ->join('product', 'product.id_product=pesanan.id_product')
          ->where('pesanan.no_invoice', $id)
          ->get()
          ->result();
    }

    public function update_pengambilan($id)
    {
        $sp = 0;
        $data = [
            "status_pengambilan" => 1
        ];
        $this->db->where(['id_reseller' => $id]);
        $this->db->where(['status_pengambilan' => $sp]);
        $this->db->limit(1);
        $this->db->update('tbl_reward', $data);
    }

     public function jumlah_pending_reseller()
    {
        $status = 0;
        $this->db->select('*');
        $this->db->from('reseller');
        $this->db->where(['status_reseller' => $status]);
        return $this->db->get()->num_rows();
    }

    public function update_aktif_reseller($id)
    {
        $a = 0;
        $data = [
            "status_reseller" => 1
        ];
        $this->db->where(['id_reseller' => $id]);
        $this->db->where(['status_reseller' => $a]);
        $this->db->limit(1);
        $this->db->update('reseller', $data);
    }

   
}