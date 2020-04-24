<?php 

    class Auth_model extends CI_Model {

        public function login($email,$password) {
            $this->db->where('USR_Email',$email);
            $this->db->where('USR_Password',$password);
            $result = $this->db->get('users');
            if($result->num_rows()>0) {
                return $result->row();
            }else {
                return false;
            }
        }
    }