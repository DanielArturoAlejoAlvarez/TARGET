<?php 

    class Client_model extends CI_Model {

        public function getClientTypes() {
            $r = $this->db->get('client_types');
            return $r->result();
        }

        public function getDocTypes() {
            $r = $this->db->get('doc_types');
            return $r->result();
        }

        public function getClients() {
            $this->db->select('cl.*,ct.CTYPE_Name as client_type,dt.DOC_Name as doc_type');
            $this->db->from('clients cl');
            $this->db->join('client_types ct','ct.CTYPE_Code=cl.CTYPE_Code');
            $this->db->join('doc_types dt','dt.DOC_Code=cl.DOC_Code');
            $this->db->where('cl.CLIE_Flag',1);
            $r = $this->db->get();
            return $r->result();
        }

        public function getClientById($id) {
            $this->db->where('CLIE_Code', $id);
            $r = $this->db->get('clients');
            return $r->row();
        }

        public function addClient($data) {
            return $this->db->insert('clients',$data);
        }

        public function updateClient($id,$data) {
            $this->db->where('CLIE_Code', $id);
            return $this->db->update('clients',$data);
        }
    }