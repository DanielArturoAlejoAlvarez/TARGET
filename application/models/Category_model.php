<?php 

    class Category_model extends CI_Model {
        
        public function getCategories() {
            $this->db->where('CATE_Flag',1);
            $r = $this->db->get('categories');
            return $r->result();
        }

        public function getCategoryById($id) {
            $this->db->where('CATE_Code',$id);
            $r = $this->db->get('categories');
            return $r->row();
        }

        public function addCategory($data) {
            return $this->db->insert("categories",$data);
        }

        public function updateCategory($id,$data) {
            $this->db->where('CATE_Code',$id);
            return $this->db->update("categories",$data);
        }

        
    }