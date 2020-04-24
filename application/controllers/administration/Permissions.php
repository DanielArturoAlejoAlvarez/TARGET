<?php 

    class Permissions extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('login')) {
                redirect(base_url());
            }

            $this->load->model('Permission_model');
            $this->load->model('User_model');
        }

        public function index() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $data = array(
                'permissions'  =>   $this->Permission_model->getPermissions()
            );
            $this->load->view('admin/permissions/index',$data);
            $this->load->view('layouts/footer');
        }

        public function create() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $data = array(
                'navigations'  =>   $this->Permission_model->getNavigations(),
                'roles'        =>   $this->User_model->getRoles(),
            );
            $this->load->view('admin/permissions/add',$data);
            $this->load->view('layouts/footer');
        }

        public function store() {
            $menu = $this->input->post('selNavi');
            $role = $this->input->post('selRole');
            $read = $this->input->post('radioRead');
            $insert = $this->input->post('radioInsert');
            $update = $this->input->post('radioUpdate');
            $delete = $this->input->post('radioDelete');

            $data = array(
                'NAVI_Code'     =>      $menu,
                'ROLE_Code'     =>      $role,
                'PERMI_Read'    =>      $read,
                'PERMI_Insert'  =>      $insert,
                'PERMI_Update'  =>      $update,
                'PERMI_Delete'  =>      $delete
            );

            if($this->Permission_model->addPermission($data)) {
                redirect(base_url().'administration/permissions');
            }else {
                redirect(base_url().'administration/permissions/create');
            }
        }

        public function edit($id) {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $data = array(
                'permission'   =>   $this->Permission_model->getPermissionById($id),
                'navigations'  =>   $this->Permission_model->getNavigations(),
                'roles'        =>   $this->User_model->getRoles(),
            );
            $this->load->view('admin/permissions/edit',$data);
            $this->load->view('layouts/footer');
        }


        public function update() {
            $idPermission = $this->input->post('txtId');
            $menu = $this->input->post('selNavi');
            $role = $this->input->post('selRole');
            $read = $this->input->post('radioRead');
            $insert = $this->input->post('radioInsert');
            $update = $this->input->post('radioUpdate');
            $delete = $this->input->post('radioDelete');

            $data = array(
                'NAVI_Code'     =>      $menu,
                'ROLE_Code'     =>      $role,
                'PERMI_Read'    =>      $read,
                'PERMI_Insert'  =>      $insert,
                'PERMI_Update'  =>      $update,
                'PERMI_Delete'  =>      $delete
            );

            if($this->Permission_model->updatePermission($idPermission,$data)) {
                redirect(base_url().'administration/permissions');
            }else {
                redirect(base_url().'administration/permissions/edit/'.$idPermission);
            }
        }

        public function delete($id) {
            $this->Permission_model->deletePermission($id);
            redirect(base_url().'administration/permissions');
        }

        
    }