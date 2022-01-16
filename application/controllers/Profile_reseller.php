<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_reseller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if($this->session->userdata('level_id') != '2') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">
        Login Please!</div>');
			redirect('auth');
		}
	}

	public function profile()
	{
		$id = $this->session->userdata('username');
        // var_dump($id);
        // die();
        $data['reseller'] = $this->model_user->profile_reseller($id);
        $data['point'] = $this->model_user->tampil_point($id);
        
    
		$this->load->view('template_reseller/header2', $data);
		$this->load->view('reseller/profile_reseller', $data);
		$this->load->view('template_reseller/footer');
	}

	public function update_reseller()
	{
		$this->load->model('model_user');
        //form validasi set rules
        $this->form_validation->set_rules('nama_reseller', 'reseller name', 'required|trim');
          $this->form_validation->set_rules('no_ktp', 'number ktp', 'required|trim|min_length[14]|max_length[20]');
        $this->form_validation->set_rules('alamat', 'address', 'required|trim');
        $this->form_validation->set_rules('kota', 'city', 'required|trim');
         $this->form_validation->set_rules('telp_reseller', 'phone number', 'required|trim');
        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
        	redirect('profile_reseller/profile');
            //jika form validasi benar
        } else {
            $this->model_user->update_rs();
            $this->session->set_flashdata('message', ' Di Update');
            redirect('profile_reseller/profile');
        }
	}

	public function change_password()
	{
		
        $id = $this->session->userdata('username');
     	$data['reseller'] = $this->model_user->profile_reseller($id);
         $data['point'] = $this->model_user->tampil_point($id);


     	$this->form_validation->set_rules('pw_lama', 'Old Password', 'required|trim');
     	$this->form_validation->set_rules('pw_baru', 'New Password', 'required|trim|min_length[5]');
     	$this->form_validation->set_rules('pw_baru2', 'Retype New Password', 'required|trim|min_length[5]|matches[pw_baru]');


     	// Jika form validasi salah
     	if ($this->form_validation->run() == false) {

			$this->load->view('template_reseller/header2');
			$this->load->view('reseller/profile_reseller', $data);
			$this->load->view('template_reseller/footer');

		// Jika form validasi benar
     	} else {
     		$password_lama = $this->input->post('pw_lama');
     		$password_baru = $this->input->post('pw_baru');

     		if (!password_verify($password_lama, $data['reseller']['password'])) {
     			
     			 redirect('profile_reseller/profile');
     		} else {
     			if ($password_lama == $password_baru) {
     				
     				 redirect('profile_reseller/profile');
     			} else {
     				// Password Verify
     				$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

     				$this->db->set('password', $password_hash);
     				$this->db->where('id_reseller', $this->session->userdata('id'));
     				$this->db->update('reseller');

     				 $this->session->set_flashdata('message', ' Di Update');
     				redirect('profile_reseller/profile');
     			}
     		}
     	}
	}

}