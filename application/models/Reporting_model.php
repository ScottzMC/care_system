<?php 

    class Reporting_model extends CI_Model{
        
        // Reporting
        
        public function display_all_reporting(){
            $query = $this->db->get('reporting')->result();
            return $query;
        }
        
        public function display_reporting_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('reporting')->result();
            return $query;
        }
        
        public function get_reporting_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('reporting');
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
        
        public function display_all_staff(){
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_all_keywork_session(){
            $query = $this->db->get('children_keywork_session')->result();
            return $query;
        }
        
        public function insert_reporting($data){
            $query = $this->db->insert('reporting', $data);
            return $query;
        }
        
        public function delete_reporting($id){
            $query = $this->db->query("DELETE FROM reporting WHERE id = '$id' ");
        }
        
        public function update_reporting($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('reporting', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('reporting')->result();
           return $query;
        }
        
        // End of Reporting
    }

?>