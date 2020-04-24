<?php 

    class Orders extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->model('Order_model');

            if(!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }

        public function index() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $fechaini = $this->input->post("fechaini");
            $fechafin = $this->input->post("fechafin");

            if($this->input->post("searchDate")) {
                $orders = $this->Order_model->getOrderByDate($fechaini,$fechafin);
            }else {
                $orders = $this->Order_model->getOrders();
            }

            $data = array(
                'orders'    =>     $orders,
                'fechaini'  =>     $fechaini,
                'fechafin'  =>     $fechafin
            );

            $this->load->view('admin/reports/order', $data);
            $this->load->view('layouts/footer');
        }

        
    }