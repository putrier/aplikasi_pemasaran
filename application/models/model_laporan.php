<?php

class model_laporan extends CI_Model {

	public function lap()
	{


        $query = $this->db->query("SELECT DISTINCT(MONTHNAME(tgl_pesanan)) as a FROM invoice GROUP BY a DESC");
     
         $hasil = $query->result_array();
         return $hasil;
	}

	public function lap2()
	{


        $query = $this->db->query("SELECT DISTINCT(YEAR(tgl_pesanan)) as b FROM invoice GROUP BY b DESC");
     
         $hasil = $query->result_array();
         return $hasil;
	}

	public function laporan($filter)
	{
		
			// $bulan = $this->input->post('bulan', true);
			// $tahun = $this->input->post('tahun', true);

		
	$this->db->select(['*','sum(pesanan.jumlah) as jml']);
        $this->db->from('invoice');
        $this->db->join('pesanan', 'invoice.no_invoice = pesanan.no_invoice');
        $this->db->join('product', 'pesanan.id_product = product.id_product');
        $this->db->join('kategori', 'product.kategori_id = kategori.id_kategori');
        $this->db->where('invoice.status_verifikasi', 1);
        $this->db->where('MONTHNAME(tgl_pesanan)',$filter['bulan']);
        $this->db->where('YEAR(tgl_pesanan)',$filter['tahun']);
        $this->db->group_by('pesanan.id_product');
        return $this->db->get()->result_array();

        

	}

        public function laporan_pemasukan($filter)
        {
                
                        // $bulan = $this->input->post('bulan', true);
                        // $tahun = $this->input->post('tahun', true);

                
        $this->db->select(['*','sum(pesanan.harga * pesanan.jumlah) as d']);
        $this->db->from('invoice');
        $this->db->join('pesanan', 'invoice.no_invoice = pesanan.no_invoice');
        $this->db->join('product', 'pesanan.id_product = product.id_product');
        $this->db->join('kategori', 'product.kategori_id = kategori.id_kategori');
        $this->db->where('invoice.status_verifikasi', 1);
        $this->db->where('MONTHNAME(tgl_pesanan)',$filter['bulan']);
        $this->db->where('YEAR(tgl_pesanan)',$filter['tahun']);
        
        return $this->db->get()->result_array();

        

        }
}