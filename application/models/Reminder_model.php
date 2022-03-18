<?php 

    class Reminder_model extends CI_Model{
        
        // Reminders
        
        public function display_all_reminders(){
            $query = $this->db->get('reminders')->result();
            return $query;
        }
        
        public function display_reminders_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('reminders')->result();
            return $query;
        }
        
        public function insert_reminders($data){
            $query = $this->db->insert('reminders', $data);
            return $query;
        }
        
        public function delete_reminders($id){
            $query = $this->db->query("DELETE FROM reminders WHERE id = '$id' ");
        }
        
        public function update_reminders_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('reminders', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM reminders WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        // End of Reminders
    }

?>