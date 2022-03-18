<?php 

    class Keywork_session_model extends CI_Model{
        
        // Keywork session
        
        public function display_all_keywork_session(){
            $query = $this->db->get('children_keywork_session')->result();
            return $query;
        }
        
        public function display_keywork_session_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_keywork_session')->result();
            return $query;
        }
        
        public function get_keywork_session_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_keywork_session');
            return $query->result_array();
        }
        
        public function display_all_staff(){
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
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
        
        public function insert_keywork_session($data){
            $query = $this->db->insert('children_keywork_session', $data);
            return $query;
        }
        
        public function delete_keywork_session($id){
            $query = $this->db->query("DELETE FROM children_keywork_session WHERE id = '$id' ");
        }
        
        public function update_keywork_session_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_keywork_session', $data);
          return $query;
        }
        
        public function display_independent_living(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('independent_living')->result();
            return $query;
        }
        
        public function display_independent_living_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('independent_living')->result();
            return $query;
        }
        
        public function insert_independent_living($data){
            $query = $this->db->insert('independent_living', $data);
            return $query;
        }
        
        public function delete_independent_living($id){
            $query = $this->db->query("DELETE FROM independent_living WHERE id = '$id' ");
        }
        
        public function update_independent_living($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('independent_living', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('children_keywork_session')->result();
           return $query;
        }
        
        // End of Keywork Session
    }

?>