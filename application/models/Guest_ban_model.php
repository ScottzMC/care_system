<?php 

    class Guest_ban_model extends CI_Model{
        
        // Guest Ban
        
        public function display_all_guest_ban(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('guest_ban')->result();
            return $query;
        }
        
        public function display_guest_ban_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('guest_ban')->result();
            return $query;
        }
        
        public function get_guest_ban_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('guest_ban');
            return $query->result_array();
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function insert_guest_ban($data){
            $query = $this->db->insert('guest_ban', $data);
            return $query;
        }
        
        public function delete_guest_ban($id){
            $query = $this->db->query("DELETE FROM guest_ban WHERE id = '$id' ");
        }
        
        public function update_guest_ban_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('guest_ban', $data);
          return $query;
        }
        
        // End of Guest Ban
    }

?>