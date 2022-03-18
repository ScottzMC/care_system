<?php 

    class Incident_report_model extends CI_Model{
        
        // Incident Report
        
        public function display_all_incident_report(){
            $query = $this->db->get('children_incidents')->result();
            return $query;
        }
        
        public function display_incident_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_incidents')->result();
            return $query;
        }
        
        public function insert_incident_report($data){
            $query = $this->db->insert('children_incidents', $data);
            return $query;
        }
        
        public function delete_incident_report($id){
            $query = $this->db->query("DELETE FROM children_incidents WHERE id = '$id' ");
        }
        
        public function update_incident_report_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_incidents', $data);
          return $query;
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('children_incidents')->result();
           return $query;
        }
        
       // End of Incident Report
    }

?>