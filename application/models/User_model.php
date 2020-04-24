<?php 

    class User_model extends CI_Model {

        

        public function getRoles() {
            $r = $this->db->get('roles');
            return $r->result();
        }

        public function getUsers() {
            $this->db->where('u.USR_Flag',1);            
            $this->db->select('u.*,r.ROLE_Name as role');
            $this->db->from('users u');
            $this->db->join('roles r','r.ROLE_Code=u.ROLE_Code');
            $r = $this->db->get();
            return $r->result();
        }

        public function getUserById($id) {           
            $this->db->select('u.*,r.ROLE_Name as role');
            $this->db->from('users u');
            $this->db->join('roles r','r.ROLE_Code=u.ROLE_Code');
            $this->db->where('u.USR_Code',$id);
            $r = $this->db->get();
            return $r->row();
        }

        public function addUser($data) {
            return $this->db->insert('users',$data);
        }

        public function updateUser($id,$data) {
            $this->db->where('USR_Code',$id);
            return $this->db->update('users',$data);
        }
    }