<?php 

    class Training_model extends CI_Model{

        function fetch_all_event(){
          $this->db->order_by('id');
          return $this->db->get('training_calendar');
        }
        
        public function display_all_event(){
            $query = $this->db->get('training_calendar')->result();
            return $query;
        }
        
        public function display_event_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('training_calendar')->result();
            return $query;
        }

        function insert_event($data){
          $this->db->insert('training_calendar', $data);
        }

        function update_event($data, $id){
          $this->db->where('id', $id);
          $this->db->update('training_calendar', $data);
        }

        function delete_event($id){
          $this->db->where('id', $id);
          $this->db->delete('training_calendar');
        }
    }

?>