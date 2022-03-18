<?php 

    class Handover_model extends CI_Model{
        
        // Handover
        
        public function display_all_handover(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('handover')->result();
            return $query;
        }
        
        public function display_handover_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('handover')->result();
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
        
        public function delete_handover($id){
            $query = $this->db->query("DELETE FROM handover WHERE id = '$id' ");
        }
        
        // End of Handover
    }

?>