<?php

class Clients extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Client_model');
        if(!$this->session->userdata('login')) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/header');
        $data = array(
            'clients'   =>     $this->Client_model->getClients()
        );

        $this->load->view('admin/clients/index', $data);
        $this->load->view('layouts/footer');
    }

    public function show($id)
    {
        $data = array(
            'client'    =>      $this->Client_model->getClientById($id)
        );
        $this->load->view('admin/clients/show', $data);
    }

    public function create()
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/header');
        $data = array(
            'clientTypes'   =>     $this->Client_model->getClientTypes(),
            'docTypes'      =>     $this->Client_model->getDocTypes()
        );
        $this->load->view('admin/clients/add',$data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        $clientType = $this->input->post('selClientType');
        $docType = $this->input->post('selDocType');
        $names = $this->input->post("txtNames");
        $phone = $this->input->post("txtPhone");
        $address = $this->input->post("txtAddress");
        $docNumber = $this->input->post("txtDocNumber");
        $status = $this->input->post("txtStatus");

        $this->form_validation->ser_rules('txtNames','Names','required');
        $this->form_validation->ser_rules('txtPhone','Phone','required');
        $this->form_validation->ser_rules('selClientType','Client Type','required');
        $this->form_validation->ser_rules('selDocType','Doc Type','required');
        $this->form_validation->ser_rules('txtDocNumber','Doc Number','required|is_unique[clients.CLIE_Doc_Number]');

        if($this->form_validation->run()) {
            $data = array(
                'CTYPE_Code'     =>      $clientType,
                'DOC_Code'       =>      $docType,
                'CLIE_Names'     =>      $names,
                'CLIE_Phone'     =>      $phone,
                'CLIE_Address'   =>      $address,
                'CLIE_Doc_Number'=>      $docNumber,
                'CLIE_Flag'      =>      $status
            );
    
            if ($this->Client_model->addClient($data)) {
                redirect(base_url() . 'maintenance/clients');
            } else {
                $this->session->set_flashdata("error", "The record could not be saved!");
                redirect(base_url() . 'maintenance/clients/create');
            }
        }else {
            $this->create();
        }        
    }

    public function edit($id)
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/header');
        $data = array(
            'client'        =>     $this->Client_model->getClientById($id),
            'clientTypes'   =>     $this->Client_model->getClientTypes(),
            'docTypes'      =>     $this->Client_model->getDocTypes()
        );
        $this->load->view('admin/clients/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $idClient = $this->input->post("txtId");
        $clientType = $this->input->post('selClientType');
        $docType = $this->input->post('selDocType');
        $names = $this->input->post("txtNames");
        $phone = $this->input->post("txtPhone");
        $address = $this->input->post("txtAddress");
        $docNumber = $this->input->post("txtDocNumber");
        $status = $this->input->post("selStatus");

        $currentClient = $this->Client_model->getClientById($idClient);
        
        if($docNumber==$currentClient->CLIE_Doc_Number) {
            $unique = 'required|is_unique[clients.CLIE_Doc_Number]';
        }else {
            $unique = '';
        }        

        $this->form_validation->ser_rules('txtNames','Names','required');
        $this->form_validation->ser_rules('txtPhone','Phone','required');
        $this->form_validation->ser_rules('selClientType','Client Type','required');
        $this->form_validation->ser_rules('selDocType','Doc Type','required');
        $this->form_validation->ser_rules('txtDocNumber','Doc Number','required'.$unique);

        $data = array(
            'CTYPE_Code'     =>      $clientType,
            'DOC_Code'       =>      $docType,
            'CLIE_Names'     =>      $names,
            'CLIE_Phone'     =>      $phone,
            'CLIE_Address'   =>      $address,
            'CLIE_Doc_Number'=>      $docNumber,
            'CLIE_Flag'      =>      $status
        );

        if ($this->Client_model->updateClient($idClient, $data)) {
            redirect(base_url() . 'maintenance/clients');
        } else {
            $this->session->set_flashdata("error", "The record could not be saved!");
            redirect(base_url() . 'maintenance/clients/edit/' . $idClient);
        }
    }

    public function delete($id)
    {
        $data = array(
            'CLIE_Flag'     =>      0
        );

        if ($this->Category_model->updateClient($id, $data)) {
            echo "maintenance/clients";
        } else {
            $this->session->set_flashdata("error", "The record could not be deleted!");
            redirect(base_url() . 'maintenance/clients');
        }
    }
}
