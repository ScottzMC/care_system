<?php 

    class Dashboard_model extends CI_Model{
        
        // Dashboard 
        
        public function count_users(){
            $query = $this->db->query("SELECT COUNT(*) AS total_users FROM users")->result();
            return $query;
        }
        
        public function count_reminders(){
            $query = $this->db->query("SELECT COUNT(*) AS total_reminders FROM reminders")->result();
            return $query;
        }
        
        public function count_risk_assessment(){
            $query = $this->db->query("SELECT COUNT(*) AS total_risk_assessment FROM risk_assessment")->result();
            return $query;
        }
        
        public function count_support_plan(){
            $query = $this->db->query("SELECT COUNT(*) AS total_support_plan FROM support_plan")->result();
            return $query;
        }
        
        public function count_keywork_session(){
            $query = $this->db->query("SELECT COUNT(*) AS total_keywork_session FROM children_keywork_session")->result();
            return $query;
        }
        
        public function count_properties(){
            $query = $this->db->query("SELECT COUNT(*) AS total_properties FROM properties")->result();
            return $query;
        }
        
        public function count_children(){
            $query = $this->db->query("SELECT COUNT(*) AS total_children FROM children")->result();
            return $query;
        }
        
        public function count_children_incidents(){
            $query = $this->db->query("SELECT COUNT(*) AS total_children_incidents FROM children_incidents")->result();
            return $query;
        }
        
        public function display_children(){
            $query = $this->db->get("children")->result();
            return $query;
        }
        
        public function display_staff(){
            $query = $this->db->get("users")->result();
            return $query;
        }
        
        // End of Dashboard 
        
    }

?>