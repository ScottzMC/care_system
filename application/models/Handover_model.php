<?php 

    class Handover_model extends CI_Model{
        
        // Handover
        
        public function display_all_handover(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('handover')->result();
            return $query;
        }
        
        public function display_handover_by_handover_id($id){
            $this->db->where('handover_id', $id);
            $query = $this->db->get('handover')->result();
            return $query;
        }
        
        public function display_ingoing($code){
            $this->db->where('house_code', $code);
            $query = $this->db->get('ingoing')->result();
            return $query;
        }
        
        public function display_ingoing_by_handover_id($id){
            $this->db->where('handover_id', $id);
            $query = $this->db->get('ingoing')->result();
            return $query;
        }
        
        public function display_outgoing_by_handover_id($id){
            $this->db->where('handover_id', $id);
            $query = $this->db->get('outgoing')->result();
            return $query;
        }
        
        public function get_handover_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('handover');
            return $query->result_array();
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_all_staff(){
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function insert_handover($data){
            $query = $this->db->insert('handover', $data);
            return $query;
        }
        
        public function insert_outgoing($data){
            $query = $this->db->insert('outgoing', $data);
            return $query;
        }
        
        public function insert_ingoing($data){
            $query = $this->db->insert('ingoing', $data);
            return $query;
        }
        
        public function update_handover($id, $data){
            $this->db->where('handover_id', $id);
            $query = $this->db->update('handover', $data);
            return $query;
        }
        
        public function delete_handover($id){
            $query = $this->db->query("DELETE FROM handover WHERE id = '$id' ");
        }
        
        // End of Handover
    }

?>