<?php 

    class Backend_lib {
        private $CI;
        function __construct()
        {
            $this->CI = & get_instance();
        }

        public function control() {
            if(!$this->CI->session->userdata('login')) {
                redirect(base_url());
            }

            $url = $this->CI->uri->segment(1);
            if($this->CI->uri->segment(2)) {
                $url = $this->CI->uri->segment(1) . '/' . $this->CI->uri->segment(2);
            }

            $infonavi = $this->CI->Backend_model->getID($url);
            $permissions = $this->CI->Backend_model->getPermissions($infonavi->NAVI_Code,$this->CI->session->userdata('role'));
        
            if($permissions->PERMI_Read==0) {
                redirect(base_url().'dashboard');
            }else {
                return $permissions;
            }
        }
    }