<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_admin extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if($this->session->userdata('level_id') != '1') {
			
			redirect('auth/admin');
		}
	}

	public function profile()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        
		 $id = $this->session->userdata('username');
        $data['admin'] = $this->model_user->profile_admin($id);

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('admin/profile_admin', $data);
		$this->load->view('template_admin/footer');
	}

	public function edit_profile()
	{
		
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        
		$id = $this->session->userdata('username');
        $data['admin'] = $this->model_user->edit_admin($id);

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar', $data);
		$this->load->view('admin/edit_profile', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_admin()
	{
		$this->load->model('model_user');
        //form validasi set rules
        $this->form_validation->set_rules('nama_admin', 'administrator name', 'required|trim');
        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
        	redirect('profile_admin/profile');
            //jika form validasi benar
        } else {
            $this->model_user->update_adm();
            $this->session->set_flashdata('message', ' Di Update');
            redirect('profile_admin/profile');
        }
	}

	public function change_password()
	{
		$data['adm'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $id = $this->session->userdata('username');
     	$data['admin'] = $this->model_user->edit_admin($id);


     	$this->form_validation->set_rules('pw_lama', 'Old Password', 'required|trim');
     	$this->form_validation->set_rules('pw_baru', 'New Password', 'required|trim|min_length[5]');
     	$this->form_validation->set_rules('pw_baru2', 'Retype New Password', 'required|trim|min_length[5]|matches[pw_baru]');


     	// Jika form validasi salah
     	if ($this->form_validation->run() == false) {

			$this->load->view('template_admin/header');
			$this->load->view('template_admin/sidebar', $data);
			$this->load->view('admin/password_admin', $data);
			$this->load->view('template_admin/footer');

		// Jika form validasi benar
     	} else {
     		$password_lama = $this->input->post('pw_lama');
     		$password_baru = $this->input->post('pw_baru');

     		if (!password_verify($password_lama, $data['admin']['password'])) {
     			 $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Salah!</h4> Password Lama Salah</div>');
     			 redirect('profile_admin/change_password');
     		} else {
     			if ($password_lama == $password_baru) {
     				 $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Salah!</h4> Password baru tidak boleh sama dengan yang lama</div>');
     				 redirect('profile_admin/change_password');
     			} else {
     				// Password Verify
     				$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

     				$this->db->set('password', $password_hash);
     				$this->db->where('id_admin', $this->session->userdata('id'));
     				$this->db->update('admin');

     				 $this->session->set_flashdata('message', ' Di Update');
     				redirect('profile_admin/profile');
     			}
     		}
     	}

	}

}