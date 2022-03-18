<?php 

    class Audit_review_model extends CI_Model{
        
        // Audit Reviews
        
        public function display_all_audit_reviews(){
            $query = $this->db->get('audit_reviews')->result();
            return $query;
        }
        
        public function display_audit_reviews_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('audit_reviews')->result();
            return $query;
        }
        
        public function insert_audit_reviews($data){
            $query = $this->db->insert('audit_reviews', $data);
            return $query;
        }
        
        public function delete_audit_reviews($id){
            $query = $this->db->query("DELETE FROM audit_reviews WHERE id = '$id' ");
        }
        
        public function update_audit_reviews_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('audit_reviews', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('audit_reviews')->result();
           return $query;
        }
        
        // End of Audit Reviews
    }

?>