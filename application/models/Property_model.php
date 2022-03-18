<?php 

    class Property_model extends CI_Model {
        
        // Property
        
        public function display_all_property(){
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
        public function display_property_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
        public function display_property_files($code){
            $query = $this->db->query("SELECT properties.code, propety_file.code, propety_file.insurance, propety_file.electrical, propety_file.gas_safety, propety_file.fire_alarm, propety_file.emergency_light, propety_file.pat_testing, propety_file.area_risk_assessment, propety_file.health_safety FROM properties INNER JOIN propety_file ON properties.code = propety_file.code WHERE propety_file.code = '$code' ")->result();
            return $query;
        }
        
        public function display_file_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('propety_file')->result();
            return $query;
        }
        
        public function insert_property($data){
            $query = $this->db->insert('properties', $data);
            return $query;
        }
        
        public function insert_property_file($data){
            $query = $this->db->insert('propety_file', $data);
            return $query;
        }
        
        public function delete_property($id){
            $query = $this->db->query("DELETE FROM properties WHERE id = '$id' ");
        }
        
        public function update_property_form($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('propety_file', $data);
          return $query;
        }
        
        public function update_property_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('properties', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $this->db->like('housename', $title);
           $query = $this->db->get('properties')->result();
           return $query;
        }
        
        // End of Property
    }

?>