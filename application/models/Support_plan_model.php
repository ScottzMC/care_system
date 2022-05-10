<?php 

    class Support_plan_model extends CI_Model {
        
        // Support Plan
        
        public function display_all_support_plan(){
            $query = $this->db->get('support_plan')->result();
            return $query;
        }
        
        public function display_support_plan_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('support_plan')->result();
            return $query;
        }
        
        public function get_support_plan_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('support_plan');
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
        
        public function insert_support_plan($data){
            $query = $this->db->insert('support_plan', $data);
            return $query;
        }
        
        public function insert_area_of_support($data){
            $query = $this->db->insert('area_of_support', $data);
            return $query;
        }
        
        public function insert_area_of_support_comment($data){
            $query = $this->db->insert('area_of_support_comment', $data);
            return $query;
        }
        
        public function display_area_of_support(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('area_of_support')->result();
            return $query;
        }
        
        public function display_area_of_support_comment($code){
            //$this->db->order_by('title', 'ASC');
            $query = $this->db->query("SELECT DISTINCT title, comment, area_support_id, code FROM area_of_support_comment WHERE code = '$code' ORDER BY title = 'ASC' ")->result();
            return $query;
        }
        
        public function display_area_of_support_comment_by_id($id){
            //$this->db->where('area_support_id', $id);
            $query = $this->db->query("SELECT DISTINCT title, comment, area_support_id, code FROM area_of_support_comment WHERE area_support_id = '$id' ")->result();
            return $query;
        }
        
        public function display_support_area_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('area_of_support')->result();
            return $query;
        }
        
        public function delete_support_plan($id){
            $query = $this->db->query("DELETE FROM support_plan WHERE id = '$id' ");
        }
        
        public function delete_support_area($id){
            $query = $this->db->query("DELETE FROM area_of_support WHERE id = '$id' ");
        }
        
        public function update_support_plan_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('support_plan', $data);
          return $query;
        }
        
        public function update_support_plan_comment($id, $data){
          $this->db->where('area_support_id', $id);
          $query = $this->db->update('area_of_support_comment', $data);
          return $query;
        }
        
        public function update_support_area($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('area_of_support', $data);
          return $query;
        }
        
        public function display_all_staff(){
            $this->db->where('role', 'Staff');
            $query = $this->db->get('users')->result();
            return $query;
        }
        
        // End of Support Plan
    }

?>