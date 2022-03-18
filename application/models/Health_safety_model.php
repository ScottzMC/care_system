<?php 

    class Health_safety_model extends CI_Model{
        
        // Health & Safety
        
        public function display_all_health_safety(){
            $query = $this->db->get('health_safety')->result();
            return $query;
        }
        
        public function display_health_safety_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('health_safety')->result();
            return $query;
        }
        
        public function get_health_safety_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('health_safety');
            return $query->result_array();
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_children_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function insert_health_safety($data){
            $query = $this->db->insert('health_safety', $data);
            return $query;
        }
        
        public function delete_health_safety($id){
            $query = $this->db->query("DELETE FROM health_safety WHERE id = '$id' ");
        }
        
        public function update_health_safety_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('health_safety', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('health_safety')->result();
           return $query;
        }
        
        // End of Health & Safety
    }

?>