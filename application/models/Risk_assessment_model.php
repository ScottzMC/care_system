<?php 

    class Risk_assessment_model extends CI_Model{
        
        // Risk Assessment
        
        public function display_all_risk_assessment(){
            $query = $this->db->get('risk_assessment')->result();
            return $query;
        }
        
        public function display_risk_assessment_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('risk_assessment')->result();
            return $query;
        }
        
        public function get_risk_assessment_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('risk_assessment');
            return $query->result_array();
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
        
        public function display_all_staff(){
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        public function insert_risk_assessment($data){
            $query = $this->db->insert('risk_assessment', $data);
            return $query;
        }
        
        public function delete_risk_assessment($id){
            $query = $this->db->query("DELETE FROM risk_assessment WHERE id = '$id' ");
        }
        
        public function update_risk_assessment_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('risk_assessment', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('risk_assessment')->result();
           return $query;
        }
        
        // End of Risk Assessment
    }

?>