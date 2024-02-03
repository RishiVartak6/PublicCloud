<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function UserData($email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->get('users');

        if($query){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    public function save_upload($email,$file_name,$file_ext,$ufile_name,$full_path,$file_pin){
        $data = array(
            'user_email'    => $email,
            'file_name'     => $file_name,
            'file_ext'     => $file_ext,
            'ufile_name'     => $ufile_name,
            'full_path'     => $full_path,
            'file_pin'      => $file_pin
        );  
        $query= $this->db->insert('upload_data',$data);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function count_files($email){
        $this->db->where('user_email', $email);
        $query = $this->db->get('upload_data');
        if ($query) {
            return $query->num_rows();
        }else{
            return FALSE;
        }
    }
    public function fetch_upload_data($email)
    {
        $this->db->where('user_email', $email);
        $this->db->order_by('id', 'DESC'); 
        $query = $this->db->get('upload_data');
        if ($query) {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    public function download_file($id,$pin){
        $this->db->where('id', $id);
        $this->db->where('file_pin',$pin);
        $query = $this->db->get('upload_data');
        if ($query) {
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
}