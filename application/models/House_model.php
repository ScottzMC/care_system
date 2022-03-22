<?php 

    class House_model extends CI_Model{
        
        public function display_all_daily_log($code){
            $this->db->where('code', $code);
            $query = $this->db->get('daily_log')->result();
            return $query;
        }
        
        public function display_all_keywork_session($code){
            $this->db->where('house_code', $code);
            $query = $this->db->get('children_keywork_session')->result();
            return $query;
        }
        
        public function display_all_risk_assessment($code){
            $this->db->where('house_code', $code);
            $query = $this->db->get('risk_assessment')->result();
            return $query;
        }
        
        public function display_all_reporting($code){
            $this->db->where('house_code', $code);
            $query = $this->db->get('reporting')->result();
            return $query;
        }
        
        public function display_all_support_plan($code){
            $this->db->where('house_code', $code);
            $query = $this->db->get('support_plan')->result();
            return $query;
        }
        
        public function display_all_support_work($code){
            $this->db->where('house_code', $code);
            $query = $this->db->get('support_work')->result();
            return $query;
        }
        
        public function display_all_health_safety(){
            $query = $this->db->get('health_safety')->result();
            return $query;
        }
        
        public function display_all_handover($code){
            $this->db->where('house_code', $code);
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('handover')->result();
            return $query;
        }
        
        public function display_all_staff_communication(){
            $query = $this->db->get('staff_communication')->result();
            return $query;
        }
        
        public function display_all_guest_ban($code){
            $this->db->where('house_code', $code);
            $query = $this->db->get('guest_ban')->result();
            return $query;
        }
        
        public function display_home($code){
            $this->db->where('code', $code);
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
    }

?>