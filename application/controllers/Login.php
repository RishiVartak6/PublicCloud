<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Register_model');
    }
	public function index()
	{
        $email = $this->session->unset_userdata('email');
        if ($email =='' ) {
            $this->form_validation->set_rules('email','Enter Your Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Passowrd','trim|required|min_length[3]');

        if($this->form_validation->run()==FALSE){
            $data['title'] = "Login Page";
            $this->load->view('login/login', $data);
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pwd = md5($password);
            $result = $this->Register_model->UserLogin($email,$pwd);
            $array = array(
                'email' => $result->user_email
            );
            
            $this->session->set_userdata( $array );
            if ($result > 0 && $result->user_role=='user') {
                redirect('UserDashboard/');
            }elseif($result > 0 && $result->user_role=='admin'){
                redirect('AdminDashboard/');//123456
            }
            else{
                $error = "Please Enter Valid Details";
                $this->session->set_flashdata('error',$error);
                redirect('login/');
            }
        }
        }else{
            $email = $this->session->unset_userdata('email');
            redirect('login/');
        }
        
	}

    public function register()
    {
        $this->form_validation->set_rules('namesurname','Your Full Name','trim|required|min_length[3]');
        $this->form_validation->set_rules('email','Enter Your Email Address','trim|required|valid_email|is_unique[users.user_email]');
        $this->form_validation->set_rules('password','Passowrd','trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Register Page";
            $this->load->view('login/register', $data);
        }else{
            $passowrd = $this->input->post('password');
            $data = array(
                'user_name'=>$this->input->post('namesurname'),
                'user_role'=>'user',
                'user_password'=>md5($passowrd),
                'user_email'=>$this->input->post('email')
            );
            $result = $this->Register_model->UserRegister($data);
            if($result>0){
                $success = "User Register Successfully. Please Login";
                $this->session->set_flashdata('success',$success);
                redirect('login/');
            }else{
                $error = "User Register Successfully. Please Login";
                $this->session->set_flashdata('error',$error);
                redirect('login/');
            }
        }
        
    }
	public function forget_pass(){
        $data['title'] = "Forget Password Page";
        $this->load->view('login/forget_pass', $data);
    }

    public function logout()
    {
        $array = array(
                'email' => $result->user_email
            );
        $this->session->unset_userdata($array);
        $this->session->sess_destroy();
        redirect('Login/');
    }
}
