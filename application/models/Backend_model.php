<?php 

    class Backend_model extends CI_Model {

        public function getID($link) {
            $this->db->like('NAVI_Link',$link);
            $r = $this->db->get('navigations');
            return $r->row();
        }

        public function getPermissions($navi,$role) {
            $this->db->where('NAVI_Code',$navi);
            $this->db->where('ROLE_Code',$role);
            $r = $this->db->get('permissions');
            return $r->row();
        }
    }