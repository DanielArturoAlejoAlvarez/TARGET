<?php 

    class Product_model extends CI_Model {

        public function getProducts() {
            $this->db->where('p.PROD_Flag',1);            
            $this->db->select('p.*,c.CATE_Name as category');
            $this->db->from('products p');
            $this->db->join('categories c','c.CATE_Code=p.CATE_Code');
            $r = $this->db->get();
            return $r->result();
        }

        public function getProductById($id) { 
            $this->db->where('p.PROD_Code',$id);           
            $this->db->select('p.*,c.CATE_Name as category');
            $this->db->from('products p');
            $this->db->join('categories c','c.CATE_Code=p.CATE_Code'); 
                       
            $r = $this->db->get();
            return $r->row();
        }

        public function addProduct($data) {
            return $this->db->insert('products',$data);
        }

        public function updateProduct($id,$data) {
            $this->db->where('PROD_Code',$id);
            return $this->db->update('products',$data);
        }
    }