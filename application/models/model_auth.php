<?php

class model_auth extends CI_Model {
	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');
		$password_hash = password_verify($password, hash);

		$result   = $this->db->where('username',$username)
							 ->where('password',$password_hash)
							 ->limit(1)
							 ->get('reseller');

		if($result->num_rows() > 0) {
			return $result->row();

		} else {
			return array();
		}

	}

	public function cek_login_admin()
	{
		$username = set_value('username');
		$password = set_value('password');
		$password_hash = password_verify($password, hash);

		$result   = $this->db->where('username',$username)
							 ->where('password',$password_hash)
							 ->limit(1)
							 ->get('admin');

		if($result->num_rows() > 0) {
			return $result->row();

		} else {
			return array();
		}

	}
}