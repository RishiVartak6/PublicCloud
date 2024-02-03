<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        if ($email != '') {
            $data['title'] = 'User Dashboard';
            $data['userData'] = $this->User_model->UserData($email);
            $data['count_files'] = $this->User_model->count_files($email);
            $data['files'] =$this->User_model->fetch_upload_data($email);
            $this->load->view('user/dashboard',$data);
        }else {
            redirect('Login/','refresh');
        }
    }
    public function Upload()
    {
        $email = $this->session->userdata('email');
        if ($email != '') {
            $email = $this->session->userdata('email');
            $data['title'] = 'File Upload';
            $data['userData'] = $this->User_model->UserData($email);
            $data['count_files'] = $this->User_model->count_files($email);
            
            $this->load->view('user/upload',$data);
        }else {
            redirect('Login/','refresh');
        }
    }
    
    public function do_upload()
    {
        $email = $this->session->userdata('email');
        $dir_name ='./uploads/'.$email;

        if (!is_dir($dir_name)) {
        //Create our directory if it does not exist
            mkdir("./uploads/".$email);
        }
        // exit();
        if ($email != '') {
            $config['upload_path']='./uploads/'.$email;
            $config['allowed_types']='gif|jpg|png|docx|pdf|doc|xlx|xlsx';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 99999999999;
            $config['file_name'] = date("d-m-Y").'_'.rand();
            $this->load->library('upload',$config);
            if($this->upload->do_upload("fileToUpload")){
                $dataupload = $this->upload->data();
                $file_name = $dataupload['file_name'];
                $file_ext = $dataupload['file_ext'];
                $full_path = $dataupload['full_path'];
                
                $ufile_name= $this->input->post('file_name');
                $file_pin = $this->input->post('file_pin');
                
                $result= $this->User_model->save_upload($email,$file_name,$file_ext,$ufile_name,$full_path,$file_pin);
                
                if($result){
                    $this->session->set_flashdata('success', 'User data have been added successfully.');
                }else{
                    $this->session->set_flashdata('error', 'Some problems occured, please try again.');
                }
                redirect('UserDashboard/Upload');
            }
        }else {
            redirect('Login/','refresh');
        }
    }
    public function download()
    {
        $email = $this->session->userdata('email');
        if ($email !='') {
            $id = $this->input->post('id');
            $pin = $this->input->post('pin');
            $data = $this->User_model->download_file($id,$pin);
            echo '<pre>';
            print_r($data);
            if($data){
                $this->testdownload();
            }else{
                echo "flase";
            }
            
        }else {
            redirect('Login/','refresh');
        }
    }

    public function testdownload()
    {
        $data = $this->User_model->download_file($id,$pin);
        echo $file_data = base_url()."uploads/".$data['user_email']."/".$data['file_name'];
        $data = file_get_contents($file_data);
        echo "<script language=\"javascript\">alert('test');</script>";
        force_download('test_file.pdf',$data);
    }
}