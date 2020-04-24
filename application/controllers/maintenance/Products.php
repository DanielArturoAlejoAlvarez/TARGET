<?php 

    class Products extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('Product_model');
            $this->load->model('Category_model');
            if(!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }

        public function index() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');
            $data = array(
                'products'  =>  $this->Product_model->getProducts()
            );
            $this->load->view('admin/products/index',$data);
            $this->load->view('layouts/footer');
        }

        public function show($id) {
            $data = array(
                'product'  =>  $this->Product_model->getProductById($id)
            );
            $this->load->view('admin/products/show',$data);
        }

        public function create() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');
            $data = array(
                'categories'    =>      $this->Category_model->getCategories()
            );
            $this->load->view('admin/products/add',$data);
            $this->load->view('layouts/footer');
        }

        public function store() {
            $idcategory = $this->input->post('selCategory');
            $serial = $this->input->post('txtSerial');
            $name = $this->input->post('txtName');
            $desc = $this->input->post('txtDesc');
            $price = $this->input->post('txtPrice');
            $stock = $this->input->post('txtStock');
            $picture = $this->input->post('txtPicture');
            $status = $this->input->post('selStatus');

            $data = array(
                'CATE_Code'     =>      $idcategory,
                'PROD_Serial'   =>      $serial,
                'PROD_Name'     =>      $name,
                'PROD_Desc'     =>      $desc,
                'PROD_Price'    =>      $price,
                'PROD_Stock'    =>      $stock,
                'PROD_Picture'  =>      $picture,
                'PROD_Flag'     =>      $status
            );

            if($this->Product_model->addUser($data)) {
                redirect(base_url() . 'maintenance/products');
            }else {
                $this->session->set_flashdata("error","The record could not be saved!");
                redirect(base_url().'maintenance/products/create');
            }
        }

        public function edit($id) {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');
            $data = array(
                'product'       =>      $this->Product_model->getProductById($id),
                'categories'    =>      $this->Category_model->getCategories()
            );
            $this->load->view('admin/products/edit',$data);
            $this->load->view('layouts/footer');
        }

        public function update() {
            $idProduct = $this->input->post('txtId');
            $idcategory = $this->input->post('selCategory');
            $serial = $this->input->post('txtSerial');
            $name = $this->input->post('txtName');
            $desc = $this->input->post('txtDesc');
            $price = $this->input->post('txtPrice');
            $stock = $this->input->post('txtStock');
            $picture = $this->input->post('txtPicture');
            $status = $this->input->post('selStatus');

            $data = array(
                'CATE_Code'     =>      $idcategory,
                'PROD_Serial'   =>      $serial,
                'PROD_Name'     =>      $name,
                'PROD_Desc'     =>      $desc,
                'PROD_Price'    =>      $price,
                'PROD_Stock'    =>      $stock,
                'PROD_Picture'  =>      $picture,
                'PROD_Flag'     =>      $status
            );

            if($this->Product_model->updateUser($idProduct,$data)) {
                redirect(base_url() . 'maintenance/products');
            }else {
                $this->session->set_flashdata("error","The record could not be saved!");
                redirect(base_url().'maintenance/products/edit/'.$idProduct);
            }
        }

        public function delete($id) {
            $data = array(
                'USR_Flag'  =>  0
            );
            $this->Product_model->updateProduct($id,$data);
            echo 'maintenance/products';
        }
    }