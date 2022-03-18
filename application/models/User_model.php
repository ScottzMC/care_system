<?php 

    class User_model extends CI_Model{
        
        // Users 
        
        public function display_all_users(){
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function display_file_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('staff_file')->result();
            return $query;
        }
        
        public function display_staff_files($code){
            $query = $this->db->query("SELECT users.code, staff_file.code, staff_file.passport, staff_file.driving_license, staff_file.nin, staff_file.address1, staff_file.address2, staff_file.dbs_certificate, staff_file.qualification, staff_file.reference1, staff_file.reference2 FROM users INNER JOIN staff_file ON users.code = staff_file.code WHERE staff_file.code = '$code' ")->result();
            return $query;
        }
        
        public function display_user_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function delete_user($id){
            $query = $this->db->query("DELETE FROM users WHERE id = '$id' ");
            return $query;
        }
        
        public function insert_user($data){
            $escape_data = $this->db->escape_str($data);
            $query = $this->db->insert('users', $escape_data);
            return $query;
        }
        
        public function insert_staff_file($data){
            $query = $this->db->insert('staff_file', $data);
            return $query;
        }
        
        public function update_user_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('users', $data);
          return $query;
        }
        
        public function update_image($id, $photo){
          $this->db->set('photo', $photo);
          $this->db->where('id', $id);
          $query = $this->db->update('users');
          return $query;
        }
        
        public function update_staff_form($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('staff_file', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('firstname', $title);
           $query = $this->db->get('users')->result();
           return $query;
        }
         
        // End of Users 
    }

?>