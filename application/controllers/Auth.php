<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        

        //form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth_reseller/form_login');

            //jika form validasi benar
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $reseller = $this->db->get_where('reseller', ['username' => $username, 'status_reseller' => 1])->row_array();

            //jika user ada
            if ($reseller) {
                //cek password
                if (password_verify($password, $reseller['password'])) {
                    $data = [
                        'id' => $reseller['id_reseller'],
                        'username' => $reseller['username'],
                        'level_id' => $reseller['level_id'],
                        'nama_reseller' => $reseller['nama_reseller'],
                        'telp_reseller' => $reseller['telp_reseller'],
                        'alamat' => $reseller['alamat'],
                        'kota' => $reseller['kota'],
                        'foto_admin' => $reseller['foto_admin']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Akun ini tidak terdaftar!</div>');
                redirect('auth');
            }
        }
    
    }


    public function admin()
    {
         //SESSION
        if ($this->session->userdata('username')) {
            redirect('profile_admin');
        }

        //form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth_admin/form_login_admin');

            //jika form validasi benar
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

            //jika user ada
            if ($admin) {
                //cek password
                if (password_verify($password, $admin['password'])) {
                    $data = [
                        'id' => $admin['id_admin'],
                        'username' => $admin['username'],
                        'level_id' => $admin['level_id'],
                        'nama_admin' => $admin['nama_admin'],
                        'foto_admin' => $admin['foto_admin']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard_admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('auth/admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Akun ini tidak terdaftar!</div>');
                redirect('auth/admin');
            }
        }
    }



    public function logout_admin()
    {
        $this->session->unset_userdata('id_admin');
        $this->session->unset_userdata('nama_admin');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level_id');
        $this->session->unset_userdata('foto_admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">
        Logout Berhasil!</div>');
        redirect('auth/admin');

    }

    public function logout_reseller()
    {
        $this->session->unset_userdata('id_reseller');
        $this->session->unset_userdata('nama_reseller');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('kota');
        $this->session->unset_userdata('telp_reseller');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level_id');
        $this->session->unset_userdata('foto_reseller');
        $this->cart->destroy();
      

        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">
        Logout Berhasil!</div>');

        redirect('auth');

    }
    
}