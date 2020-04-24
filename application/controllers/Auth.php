<?php 

    class Auth extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('Auth_model');
        }

        public function index() {
            if($this->session->userdata('login')) {
                redirect(base_url().'dashboard');
            }else {
                $this->load->view('admin/login');
            }            
        }

        public function login() {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $res = $this->Auth_model->login($email,sha1($password));
            
            if(!$res) {
                $this->session->set_flashdata("error","The username and / or password are incorrect");
                redirect(base_url());
            }else {
                $data = array(
                    'iduser'        =>  $res->USR_Code,
                    'displayName'   =>  $res->USR_Names,
                    'avatar'        =>  $res->USR_Avatar,
                    'role'          =>  $res->ROLE_Code,
                    'login'         =>  TRUE   
                );
                $this->session->set_userdata($data);
                redirect(base_url().'dashboard');
            }
        }

        public function logout() {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }