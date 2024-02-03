<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	
	public function UserRegister($data)
	{
		$query = $this->db->insert('users', $data);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
	}

    public function UserLogin($email,$pwd)
    {
        $this->db->where('user_email', $email);
        $this->db->where('user_password', $pwd);

        $query = $this->db->get('users');

        if($query){
            return $query->row();
        }else{
            return FALSE;
        }
    }
}