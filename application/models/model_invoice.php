<?php

class model_invoice extends CI_Model {
    public $kode_barang;
    public $nama_barang;


    // Nomer invoice otomatis
    public function no_invoice()
    {
        $query = $this->db->query("SELECT MAX(no_invoice) as noinvoice from invoice");
        $hasil = $query->row();
        return $hasil->noinvoice;
    }


    /*====================== Metode Pembayaran Transfer =============== */
    public function proses_invoice()
    {              
        date_default_timezone_set('Asia/Jakarta');
        $id_reseller = $this->input->post('id_reseller', true);
        $status_verifikasi = $this->input->post('status_verifikasi', true);
        $telp_reseller = $this->input->post('telp_reseller', true);
        $biaya_pengiriman = $this->input->post('biaya_pengiriman', true);
        $no_invoice = $this->input->post('noinvoice', true);
        $metode_pembayaran = $this->input->post('metode_pembayaran', true);
        $alamat = $this->input->post('alamat', true);
        $total_pembayaran = $this->input->post('total_pembayaran', true);
    
        $config['upload_path']          = './upload/transfer';
        $config['allowed_types']        = 'jpg|png|jpeg|gif';
        $config['max_size']             = 3024;
        $config['file_name']            = $this->input->post('nama_reseller');
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto_bukti')) {
            $foto_bukti =  $this->upload->data('file_name');
           
            $this->upload->initialize($config);
         
            $data = [
                'tgl_pesanan' => date('Y-m-d H:i:s'),
                'id_reseller' => $id_reseller,
                'telp_reseller' => $telp_reseller,
                'no_invoice' => $no_invoice,
                'alamat' => $alamat,
                'metode_pembayaran' => $metode_pembayaran,
                'total_pembayaran' => $total_pembayaran,
                'foto_bukti' => $foto_bukti                
                
            ];
           $this->db->insert('invoice', $data);
             $data = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array (
                  
                    'no_invoice'    => $no_invoice,
                    'id_product'     => $item['id'],
                    'jumlah'        => $item['qty'],
                    'point_pesanan' => $item['point'] * $item['qty'],
                    'harga'        => $item['price'],
            );
            $this->db->insert('pesanan', $data);
            }
            foreach ($this->cart->contents() as $item) {
            $data = array (
                    'no_invoice' => $no_invoice,
                    'id_reseller'     => $id_reseller,
                    'tgl_pesanan' => date('Y-m-d H:i:s'),
                    'point_reseller' => $item['point'] * $item['qty']
                    
            );
            $this->db->insert('point', $data);
        }
        
        return TRUE;
       
        } else {
            $this->session->set_flashdata('message', $this->upload->display_errors());
           redirect('manajemen_invoice/invoice');
        }
    }
    /*====================== Selesai Metode Pembayaran Transfer =============== */


    /*====================== Metode Pembayaran Cash =============== */
    public function proses_invoice2()
    {              
        date_default_timezone_set('Asia/Jakarta');
        $id_reseller = $this->input->post('id_reseller', true);
        $status_verifikasi = $this->input->post('status_verifikasi', true);
        $telp_reseller = $this->input->post('telp_reseller', true);
        $biaya_pengiriman = $this->input->post('biaya_pengiriman', true);
        $no_invoice = $this->input->post('noinvoice', true);
        $metode_pembayaran = $this->input->post('metode_pembayaran', true);
        $alamat = $this->input->post('alamat', true);
        $total_pembayaran = $this->input->post('total_pembayaran', true);
        $cash = "cash";

         $data =  [
                'tgl_pesanan' => date('Y-m-d H:i:s'),
                'id_reseller' => $id_reseller,
                'telp_reseller' => $telp_reseller,
                'no_invoice' => $no_invoice,
                'alamat' => $alamat,
                'metode_pembayaran' => $metode_pembayaran,
                'total_pembayaran' => $total_pembayaran,
                 'foto_bukti' => $cash,       
                
            ];

        $this->db->insert('invoice', $data);
        $data = $this->db->insert_id();


        foreach ($this->cart->contents() as $item) {
            $data = array (
                    
                    'no_invoice'    => $no_invoice,
                    'id_product'     => $item['id'],
                    'jumlah'        => $item['qty'],
                    'point_pesanan' => $item['point'] * $item['qty'],
                    'harga'        => $item['price'],
            );
            $this->db->insert('pesanan', $data);
            $data = $this->db->insert_id();

        
        }
        foreach ($this->cart->contents() as $item) {
            $data = array (
                    'no_invoice' => $no_invoice,
                    'id_reseller'     => $id_reseller,
                    'tgl_pesanan' => date('Y-m-d H:i:s'),
                    'point_reseller' => $item['point'] * $item['qty'],
                     
                    
            );
            $this->db->insert('point', $data);
        }
       
        return TRUE;
    }
    /*====================== Selesai Metode Pembayaran Cash =============== */

    /*====================== Bagian Point =======================*/
    public function tampil_point()
    {
        // A.tgl_pesanan='$bln'
        $thn = date('Y');
        $bln = date('m');

        $query = $this->db->query("SELECT B.*, SUM(A.point_reseller) as bulanan FROM point AS A JOIN reseller AS B ON A.id_reseller=B.id_reseller WHERE A.id_reseller=B.id_reseller AND MONTH(A.tgl_pesanan) = $bln AND YEAR(A.tgl_pesanan) = $thn GROUP BY A.id_reseller");

         $hasil = $query->result_array();
         return $hasil;
    }

    public function add($id)
    {
        $thn = date('Y');
        $bln = date('m');
       
        $query = $this->db->query("SELECT B.*, SUM(A.point_reseller) as bulanan FROM point AS A JOIN reseller AS B ON A.id_reseller=B.id_reseller WHERE A.id_reseller=B.id_reseller AND MONTH(A.tgl_pesanan) = $bln AND YEAR(A.tgl_pesanan) = $thn AND B.id_reseller = '$id' LIMIT 1");

        $hasil = $query->row_array();
        return $hasil;
    }

    public function proses_add_point()
    {
      $data = [
            "id_reseller" => $this->input->post('id_reseller', true),
            "top_point" => $this->input->post('top_point', true),
            "periode" => $this->input->post('periode', true),
            "reward" => $this->input->post('reward', true),
            "keterangan" => $this->input->post('keterangan', true),
            "status" => 0,
        ];

        $this->db->insert('tbl_reward', $data);
    }

    /*====================== Selesai Bagian Point ================*/


    /*====================== Bagian Invoice ================*/
    public function tampil_invoice()
    {
        
         return $this->db->from('invoice')
          
          ->join('pesanan', 'invoice.no_invoice=pesanan.no_invoice')
          ->join('reseller', 'invoice.id_reseller=reseller.id_reseller')
          ->group_by('invoice.no_invoice')
          ->order_by('invoice.id_invoice', 'DESC')
          ->get()
          ->result();
    }

      public function detail_pesanan($id)
    {
        
         return $this->db->from('invoice')
          ->join('pesanan', 'invoice.no_invoice=pesanan.no_invoice')
          ->join('reseller', 'invoice.id_reseller=reseller.id_reseller')
          ->join('product', 'product.id_product=pesanan.id_product')
          ->where('pesanan.no_invoice', $id)
          ->get()
          ->result();
    }

    public function update_verifikasi($id)
    {
        $verify = 0;
        $data = [
            "status_verifikasi" => 1
        ];
        $this->db->where(['no_invoice' => $id]);
        $this->db->where(['status_verifikasi' => $verify]);
        // $this->db->limit(1);
        $this->db->update('invoice', $data);
    }

    public function jumlah_pending()
    {
        $status = 0;
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where(['status_verifikasi' => $status]);
        return $this->db->get()->num_rows();
    }

    public function jumlah_received()
    {
        $status = 1;
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where(['status_verifikasi' => $status]);
        return $this->db->get()->num_rows();
    }

     public function jumlah_completed()
    {
        $status = 1;
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where(['status_pesanan' => $status]);
        return $this->db->get()->num_rows();
    }

    public function update_status($id)
    {
        $pesanan = 0;
        $data = [
            "status_pesanan" => 1
        ];
        $this->db->where(['no_invoice' => $id]);
        $this->db->where(['status_pesanan' => $pesanan]);
        // $this->db->limit(1);
        $this->db->update('invoice', $data);
    }

    public function delete_invoice($id)
    {
        $this->db->where('no_invoice', $id);
        $this->db->delete('invoice');

         $this->db->where('no_invoice', $id);
        $this->db->delete('point');
        
         $this->db->where('no_invoice', $id);
        $this->db->delete('pesanan');

    }

    public function print_invoice($id)
    {
        
         return $this->db->from('invoice')
          ->join('pesanan', 'invoice.no_invoice=pesanan.no_invoice')
          ->join('reseller', 'invoice.id_reseller=reseller.id_reseller')
          ->join('product', 'product.id_product=pesanan.id_product')
          ->where('pesanan.no_invoice', $id)
          ->get()
          ->result();
    }

     /*====================== Selesai Bagian Invoice ================*/

 
}