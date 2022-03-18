<?php 

    class Appointment_model extends CI_Model{
        
        // Appointment
        
        public function display_all_calendar_events(){
            $query = $this->db->get('calendar_events')->result();
            return $query;
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_calendar_events_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('calendar_events')->result();
            return $query;
        }
        
        public function insert_calendar_events($data){
            $query = $this->db->insert('calendar_events', $data);
            return $query;
        }
        
        public function delete_calendar_event($id){
            $query = $this->db->query("DELETE FROM calendar_events WHERE id = '$id' ");
        }
        
        // End of Appointment
        
        function fetch_all_event(){
          $this->db->order_by('id');
          return $this->db->get('calendar_events');
        }
        
        function insert_event($data){
          $this->db->insert('calendar_events', $data);
        }

        function update_event($data, $id){
          $this->db->where('id', $id);
          $this->db->update('calendar_events', $data);
        }

        function delete_event($id){
          $this->db->where('id', $id);
          $this->db->delete('calendar_events');
        }
    }

?>