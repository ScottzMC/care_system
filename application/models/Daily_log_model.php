<?php 

    class Daily_log_model extends CI_Model{
        
        // Daily Log
        
        public function display_all_daily_log(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('daily_log')->result();
            return $query;
        }
        
        public function display_daily_log_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('daily_log')->result();
            return $query;
        }
        
        public function get_daily_log_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('daily_log');
            return $query->result_array();
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function insert_daily_log($data){
            $query = $this->db->insert('daily_log', $data);
            return $query;
        }
        
        public function delete_daily_log($id){
            $query = $this->db->query("DELETE FROM daily_log WHERE id = '$id' ");
        }
        
        public function update_daily_log_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('daily_log', $data);
          return $query;
        }
        
        // End of Daily Log
    }

?>