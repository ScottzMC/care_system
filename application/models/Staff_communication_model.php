<?php 

    class Staff_communication_model extends CI_Model{
        
        // Staff Communication
        
        public function display_all_staff_communication(){
            $query = $this->db->get('staff_communication')->result();
            return $query;
        }
        
        public function display_staff_communication_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('staff_communication')->result();
            return $query;
        }
        
        public function display_staff_communication_by_email($email){
            $query = $this->db->query("SELECT staff_communication.id, staff_communication.title, staff_communication.request, staff_communication.time, staff_communication.created_date, explode_communication.staffcom_id, explode_communication.email FROM staff_communication INNER JOIN explode_communication ON staff_communication.id = explode_communication.staffcom_id WHERE explode_communication.email = '$email' ")->result();
            return $query;
        }
        
        public function get_staff_communication_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('staff_communication');
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
        
        public function insert_staff_communication($data){
            $query = $this->db->insert('staff_communication', $data);
            return $query;
        }
        
        public function insert_explode_communication($data){
            $query = $this->db->insert('explode_communication', $data);
            return $query;
        }
        
        public function delete_staff_communication($id){
            $query = $this->db->query("DELETE FROM staff_communication WHERE id = '$id' ");
        }
        
        public function update_staff_communication_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('staff_communication', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('staff_communication')->result();
           return $query;
        }
        
        // End of Staff Communication
    }

?>