<?php 

    class Users extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('User_model');
            if(!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }

        public function index() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $data = array(
                'users'    =>     $this->User_model->getUsers()
            );

            $this->load->view('admin/users/index', $data);
            $this->load->view('layouts/footer');
        }

        public function show($id) {
            $data = array(
                'user'  =>    $this->User_model->getUserById($id)
            );
            $this->load->view('admin/users/show', $data);
        }

        public function create() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');
            $data = array(
                'roles'  =>    $this->User_model->getRoles()
            );
            $this->load->view('admin/users/add',$data);
            $this->load->view('layouts/footer');
        }

        public function store() {
            $role = $this->input->post('selRole');
            $phone = $this->input->post('txtPhone');
            $names = $this->input->post('txtNames');
            $email = $this->input->post('txtEmail');
            $username = $this->input->post('txtUsername');
            $password = $this->input->post('txtPassword');
            $avatar = $this->input->post('txtAvatar');
            $status = $this->input->post('selStatus');

            $this->form_validation->set_rules('txtNames','Names','required');
            $this->form_validation->set_rules('txtEmail','Email','required|is_unique[users.USR_Email]');
            $this->form_validation->set_rules('txtUsername','Username','required|is_unique[users.USR_Username]');
            $this->form_validation->set_rules('txtPassword','Password','required');

            if($this->form_validation->run()) {
                $data = array(
                    'ROLE_Code'     =>      $role,
                    'USR_Phone'     =>      $phone,
                    'USR_Names'     =>      $names,
                    'USR_Email'     =>      $email,
                    'USR_Username'  =>      $username,
                    'USR_Password'  =>      sha1($password),
                    'USR_Avatar'    =>      $avatar,
                    'USR_Flag'      =>      $status
                );
    
                if($this->User_model->addUser($data)) {
                    redirect(base_url() . 'administration/users');
                }else {
                    redirect(base_url() . 'administration/users/create');
                }
            }else {
                $this->create();
            }            
        }

        public function edit($id) {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');
            $data = array(
                'user'   =>    $this->User_model->getUserById($id),
                'roles'  =>    $this->User_model->getRoles()
            );
            $this->load->view('admin/users/edit',$data);
            $this->load->view('layouts/footer');
        }

        public function update() {
            $idUser = $this->input->post('txtId');
            $role = $this->input->post('selRole');
            $phone = $this->input->post('txtPhone');
            $names = $this->input->post('txtNames');
            $email = $this->input->post('txtEmail');
            $username = $this->input->post('txtUsername');
            //$password = $this->input->post('txtPassword');
            $avatar = $this->input->post('txtAvatar');
            $status = $this->input->post('selStatus');

            $currentUser = $this->User_model->getUserById($idUser);
            //print_r($currentUser);
            //die();
            if($email==$currentUser->USR_Email) {
                $unique = '|is_unique[users.USR_Email]';
            }else {
                $unique = '';
            }

            if($username==$currentUser->USR_Username) {
                $unique2 = '|is_unique[users.USR_Username]';
            }else {
                $unique2 = '';
            }

            $this->form_validation->set_rules('txtNames','Names','required');
            $this->form_validation->set_rules('txtEmail','Email','required'.$unique);
            $this->form_validation->set_rules('txtUsername','Username','required'.$unique2);
            //$this->form_validation->set_rules('txtPassword','Password','required');

            if($this->form_validation->run()) {
                $data = array(
                    'ROLE_Code'     =>      $role,
                    'USR_Phone'     =>      $phone,
                    'USR_Names'     =>      $names,
                    'USR_Email'     =>      $email,
                    'USR_Username'  =>      $username,
                    //'USR_Password'  =>      sha1($password),
                    'USR_Avatar'    =>      $avatar,
                    'USR_Flag'      =>      $status
                );

                
    
                if($this->User_model->updateUser($idUser,$data)) {
                    redirect(base_url() . 'administration/users');
                }else {
                    redirect(base_url() . 'administration/users/edit/'.$idUser);
                }
            }else {
                $this->edit($idUser);
            }
            
        }

        public function delete($id) {
            $data = array(
                'USR_Flag'  =>  0
            );

            $this->User_model->updateUser($id,$data);
            echo 'administration/users';
        }

    }