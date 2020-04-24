<?php 

    class Permission_model extends CI_Model {

        public function getNavigations() {
            $r = $this->db->get('navigations');
            return $r->result();
        }

        public function getPermissions() {
            $this->db->select('pe.*,r.ROLE_Name as role,n.NAVI_Name as navi');
            $this->db->from('permissions pe');
            $this->db->join('navigations n','n.NAVI_Code=pe.NAVI_Code');
            $this->db->join('roles r','r.ROLE_Code=pe.ROLE_Code');            
            $r = $this->db->get();
            return $r->result();
        }

        public function getPermissionById($id) {
            $this->db->select('pe.*,r.ROLE_Name as role,n.NAVI_Name as navi');
            $this->db->from('permissions pe');
            $this->db->join('navigations n','n.NAVI_Code=pe.NAVI_Code');
            $this->db->join('roles r','r.ROLE_Code=pe.ROLE_Code'); 
            $this->db->where('pe.PERMI_Code',$id);           
            $r = $this->db->get();
            return $r->row();
        }

        public function addPermission($data) {
            return $this->db->insert('permissions',$data);
        }

        public function updatePermission($id,$data) {
            $this->db->where('PERMI_Code',$id);
            return $this->db->update('permissions',$data);
        }

        public function deletePermission($id) {
            $this->db->where('PERMI_Code',$id);
            return $this->db->delete('permissions');
        }

    }