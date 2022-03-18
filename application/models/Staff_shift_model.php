<?php 

    class Staff_shift_model extends CI_Model {
        
        public function display_all_staff_shift(){
            $query = $this->db->get("shift_management")->result();
            return $query;
        }
        
        public function display_staff_shift_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('shift_management')->result();
            return $query;
        }
        
        public function display_staff_shift_by_email($email){
            $this->db->where('email', $email);
            $query = $this->db->get('shift_management')->result();
            return $query;
        }
        
        public function insert_staff_shift($data){
            $query = $this->db->insert('shift_management', $data);
            return $query;
        }
        
        public function update_staff_shift_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('shift_management', $data);
          return $query;
        }
        
        public function delete_staff_shift($id){
            $query = $this->db->query("DELETE FROM shift_management WHERE id = '$id' ");
        }
        
        public function display_all_staff(){
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_all_house(){
            $this->db->order_by('housename', 'ASC');
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('shift_date', 'DESC');
           $this->db->like('fullname', $title);
           $query = $this->db->get('shift_management')->result();
           return $query;
        }
        
        function fetch_all_event(){
          $this->db->order_by('id');
          return $this->db->get('shift_management');
        }
        
        function fetch_event_by_email($email){
            $this->db->where('email', $email);
            return $this->db->get('shift_management');
        }

        function update_event($data, $id){
          $this->db->where('id', $id);
          $this->db->update('shift_management', $data);
        }

        function delete_event($id){
          $this->db->where('id', $id);
          $this->db->delete('shift_management');
        }
        
    }

?>