<?php 

    class Categories extends CI_Controller {

        private $permit;
        function __construct()
        {
            parent::__construct();
            if(!$this->session->userdata('login')) {
                redirect(base_url());
            }
            $this->load->model('Category_model');
            $this->permit = $this->backend_lib->control();
        }

        public function index() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $data = array(
                'permit'        =>     $this->permit,
                'categories'    =>     $this->Category_model->getCategories()
            );

            $this->load->view('admin/categories/index', $data);
            $this->load->view('layouts/footer');
        }

        public function show($id) {
            $data = array(
                'category'  =>    $this->Category_model->getCategoryById($id)
            );
            $this->load->view('admin/categories/show', $data);
        }

        public function create() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');
            $this->load->view('admin/categories/add');
            $this->load->view('layouts/footer');
        }

        public function store() {
            $name = $this->input->post("txtName");
            $desc = $this->input->post("txtDesc");
            $status = $this->input->post("selStatus");

            //FORM VALIDATIONS
            $this->form_validation->set_rules('txtName','Name','required|is_unique[categories.CATE_Name]');
            if($this->form_validation->run()){
                $data = array(
                    'CATE_Name'     =>      $name,
                    'CATE_Desc'     =>      $desc,
                    'CATE_Flag'     =>      $status
                );
    
                if($this->Category_model->addCategory($data)) {
                    redirect(base_url().'maintenance/categories');
                }else {
                    $this->session->set_flashdata("error","The record could not be saved!");
                    redirect(base_url().'maintenance/categories/create');
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
                'category'      =>      $this->Category_model->getCategoryById($id)
            );

            $this->load->view('admin/categories/edit', $data);
            $this->load->view('layouts/footer');
        }

        public function update() {
            $idCategory = $this->input->post("txtId");
            $name = $this->input->post("txtName");
            $desc = $this->input->post("txtDesc");
            $status = $this->input->post("selStatus");

            $currentCategory = $this->Category_model->getCategoryById($idCategory);
                    
            if($name==$currentCategory->CATE_Name) {
                $unique = '|is_unique[categories.CATE_Name]';
            }else {
                $unique = '';
            }

            $this->form_validation->set_rules('txtName','Name','required'.$unique);
            if($this->form_validation->run()) {
                $data = array(
                    'CATE_Name'     =>      $name,
                    'CATE_Desc'     =>      $desc,
                    'CATE_Flag'     =>      $status
                );
    
                if($this->Category_model->updateCategory($idCategory,$data)) {
                    redirect(base_url().'maintenance/categories');
                }else {
                    $this->session->set_flashdata("error","The record could not be updated!");
                    redirect(base_url().'maintenance/categories/edit/'.$idCategory);
                }
            }else {
                $this->edit($idCategory);
            }             
        }

        public function delete($id) {
            $data = array(
                'CATE_Flag'     =>      0
            );
            if($this->Category_model->updateCategory($id,$data)) {
                echo "maintenance/categories";
            }else {
                $this->session->set_flashdata("error","The record could not be deleted!");
                redirect(base_url().'maintenance/categories');
            } 
        }

    }