<?php 

    class Order_model extends CI_Model {        

        public function lastID() {
            return $this->db->insert_id();
        }

        public function getProducts($value) {
            $this->db->select("PROD_Code as id,PROD_Serial as code,PROD_Name as label,PROD_Price as price,PROD_Stock as stock");
            $this->db->from('products');
            $this->db->like('PROD_Name',$value);
            $r = $this->db->get();
            return $r->result_array();
        }

        public function getVoucherTypes() {
            $r = $this->db->get('voucher_types');
            return $r->result();
        }

        public function getVoucherById($id) {
            $this->db->where('VCHR_Code',$id);
            $r = $this->db->get('voucher_types');
            return $r->row();
        }

        public function updateVoucherType($id,$data) {
            $this->db->where('VCHR_Code',$id);
            return $this->db->update('voucher_types',$data);
        }

        public function addOrderItem($data) {
            return $this->db->insert('order_items',$data);
        }

        public function getOrderItemById($id) {
            $this->db->select('dt.*,p.PROD_Serial as code,p.PROD_Name,p.PROD_Price');
            $this->db->from('order_items dt');
            $this->db->join('products p','p.PROD_Code=dt.PROD_Code');
            $this->db->where('dt.ORD_Code',$id);
            $r = $this->db->get();
            return $r->result();
        }

        public function getOrderById($id) {
            $this->db->select('o.*,cl.CLIE_Names,cl.CLIE_Address,cl.CLIE_Phone,cl.CLIE_Doc_Number,vt.VCHR_Name,vt.VCHR_Serial,vt.VCHR_Igv as igv,u.USR_Names as user');
            $this->db->from('orders o');
            $this->db->join('clients cl','cl.CLIE_Code=o.CLIE_Code');
            $this->db->join('users u','u.USR_Code=o.USR_Code');
            $this->db->join('voucher_types vt','vt.VCHR_Code=o.VCHR_Code');
            $this->db->where('o.ORD_Code',$id);
            $r = $this->db->get();
            return $r->row();
        }

        public function getOrders() {
            $this->db->select('o.*,cl.CLIE_Names as client,u.USR_Names as user,vt.VCHR_Name as voucher_type');
            $this->db->from('orders o');
            $this->db->join('clients cl','cl.CLIE_Code=o.CLIE_Code');
            $this->db->join('users u','u.USR_Code=o.USR_Code');
            $this->db->join('voucher_types vt','vt.VCHR_Code=o.VCHR_Code');
            $this->db->where('o.ORD_Flag',1);
            $r = $this->db->get();

            if($r->num_rows()>0) {
                return $r->result();
            }else {
                return false;
            }            
        }

        public function getOrderByDate($fechaini,$fechafin) {
            $this->db->select('o.*,cl.CLIE_Names as client,u.USR_Names as user,vt.VCHR_Name as voucher_type');
            $this->db->from('orders o');
            $this->db->join('clients cl','cl.CLIE_Code=o.CLIE_Code');
            $this->db->join('users u','u.USR_Code=o.USR_Code');
            $this->db->join('voucher_types vt','vt.VCHR_Code=o.VCHR_Code');
            $this->db->where('o.ORD_Date >=',$fechaini);
            $this->db->where('o.ORD_Date <=',$fechafin);
            //$this->db->where('o.ORD_Flag',1);
            $r = $this->db->get();

            if($r->num_rows()>0) {
                return $r->result();
            }else {
                return false;
            }
        }       

        public function addOrder($data) {
            return $this->db->insert('orders',$data);
        }

        public function updateOrder($id,$data) {
            $this->db->where('ORD_Code',$id);
            return $this->db->insert('orders',$data);
        }
    }