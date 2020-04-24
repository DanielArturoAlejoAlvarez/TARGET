<?php 

    class Orders extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->model('Order_model');
            $this->load->model('Client_model');
            $this->load->model('Product_model');

            if(!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }

        public function index() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $data = array(
                'orders'    =>     $this->Order_model->getOrders()
            );

            $this->load->view('admin/orders/index', $data);
            $this->load->view('layouts/footer');
        }

        public function show() {
            $id = $this->input->post('id');
            
            $data = array(
                'order'      =>      $this->Order_model->getOrderById($id),
                'details'    =>      $this->Order_model->getOrderItemById($id),             
            );
            $this->load->view('admin/orders/show', $data);
        }

        public function create() {
            $this->load->view('layouts/head');
            $this->load->view('layouts/aside');
            $this->load->view('layouts/header');

            $data = array(
                'voucherTypes'  =>   $this->Order_model->getVoucherTypes(),
                'clients'       =>   $this->Client_model->getClients()
            );

            $this->load->view('admin/orders/add', $data);
            $this->load->view('layouts/footer');
        }

        public function store() {
            $idClient = $this->input->post('idClient');
            $idUser = $this->session->userdata('iduser');
            $idVoucher = $this->input->post('idVoucher');
            $number = $this->input->post('txtNumber');
            $serial = $this->input->post('txtSerial');
            //$subtotal = $this->input->post('subtotal');
            $igv = $this->input->post('igv');
            $discount = $this->input->post('discount');
            $total = $this->input->post('total');
            $date = $this->input->post('txtDate');

            $products = $this->input->post('idProducts');
            $qtys = $this->input->post('qtys');
            $amounts = $this->input->post('amounts');                

            $data = array(
                'CLIE_Code'     =>      $idClient,
                'USR_Code'      =>      $idUser,
                'VCHR_Code'     =>      $idVoucher,
                'ORD_Number'    =>      $number,
                'ORD_Serial'    =>      $serial,
                'ORD_Igv'       =>      $igv,
                'ORD_Discount'  =>      $discount,
                'ORD_Total'     =>      $total,
                'ORD_Flag'      =>      1,
                'ORD_Date'      =>      $date
            );
    
            if($this->Order_model->addOrder($data)) {
                $idorder = $this->Order_model->lastID();
                $this->updVoucher($idVoucher);
                $this->saveOrderItems($products,$idorder,$qtys,$amounts);

                redirect(base_url() . 'movements/orders');
            }else {
                redirect(base_url() . 'movements/orders/create');
            }
            
            
        }  


        public function getProducts() {
            $value = $this->input->post('value');
            $clients = $this->Order_model->getProducts($value);
            echo json_encode($clients);
        }



        protected function updVoucher($idvoucher) {
            $currentVoucher = $this->Order_model->getVoucherById($idvoucher);

            $data = array(
                'VCHR_Qty'      =>      $currentVoucher->VCHR_Qty + 1
            );

            $this->Order_model->updateVoucherType($idvoucher,$data);
        }

        protected function saveOrderItems($products,$idorder,$qtys,$amounts) {
            for ($i=0; $i < count($products); $i++) { 
                $data = array(
                    'PROD_Code'     =>  $products[$i],
                    'ORD_Code'      =>  $idorder,
                    'DETA_Qty'      =>  $qtys[$i],
                    'DETA_Subtotal' =>  $amounts[$i]
                );
                $this->Order_model->addOrderItem($data);

                $this->updateStockProduct($products[$i],$qtys[$i]);
            }
        }

        protected function updateStockProduct($idproduct,$qty) {
            $currentProduct = $this->Product_model->getProductById($idproduct);

            $data = array(
                'PROD_Stock'        =>      $currentProduct->PROD_Stock - $qty
            );

            $this->Product_model->updateProduct($idproduct,$data);
        }
    }