<?php 

    class Procedure_model extends CI_Model {
        
        public function display_all_procedure(){
            $query = $this->db->get('procedure_pol')->result();
            return $query;
        }
        
        public function display_procedure_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('procedure_pol')->result();
            return $query;
        }
        
        public function insert_procedure($data){
            $query = $this->db->insert('procedure_pol', $data);
            return $query;
        }
        
        public function delete_procedure($id){
            $query = $this->db->query("DELETE FROM procedure_pol WHERE id = '$id' ");
        }
        
        public function update_procedure_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('procedure_pol', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('title', $title);
           $query = $this->db->get('procedure_pol')->result();
           return $query;
        }
    }

?>