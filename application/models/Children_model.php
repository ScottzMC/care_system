<?php 

    class Children_model extends CI_Model{
        
        // Children 
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_children_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function update_children_by_code($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        public function fetch_search_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children WHERE fullname LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_children($data){
            $query = $this->db->insert('children', $data);
            return $query;
        }
        
        public function delete_children($id){
            $query = $this->db->query("DELETE FROM children WHERE id = '$id' ");
        }
        
        public function update_social_worker($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('social_worker', $data);
          return $query;
        }
        
        public function update_children_image($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        // Incident Report
        
        public function display_all_incident_report(){
            $query = $this->db->get('incident_report')->result();
            return $query;
        }
        
        public function display_incident_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('incident_report')->result();
            return $query;
        }
        
        public function insert_incident_report($data){
            $query = $this->db->insert('incident_report', $data);
            return $query;
        }
        
        public function delete_incident_report($id){
            $query = $this->db->query("DELETE FROM incident_report WHERE id = '$id' ");
        }
        
        public function update_incident_report_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('incident_report', $data);
          return $query;
        }
        
        public function display_all_property(){
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
       // End of Incident Report
       
       // Sanction Report
        
        public function display_all_sanction_report(){
            $query = $this->db->get('sanction_report')->result();
            return $query;
        }
        
        public function display_sanction_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('sanction_report')->result();
            return $query;
        }
        
        public function insert_sanction_report($data){
            $query = $this->db->insert('sanction_report', $data);
            return $query;
        }
        
        public function delete_sanction_report($id){
            $query = $this->db->query("DELETE FROM sanction_report WHERE id = '$id' ");
        }
        
        public function update_sanction_report_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('sanction_report', $data);
          return $query;
        }
        
       // End of Sanction Report
       
       // Report Printout
        
        public function display_all_children_report(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_children_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function display_children_report_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children')->result();
            return $query;
        }
        
        public function update_children_report_details($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        public function insert_children_report($data){
            $query = $this->db->insert('children', $data);
            return $query;
        }
        
        public function update_children_report_image($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children', $data);
          return $query;
        }
        
        public function delete_children_report($id){
            $query = $this->db->query("DELETE FROM children WHERE id = '$id' ");
        }
        
        // Medical History
        
        public function display_medical_report_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_medical_history')->result();
            return $query;
        }
        
        public function display_medical_report_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_medical_history')->result();
            return $query;
        }
        
        public function display_medical_report_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_medical_history')->result();
            return $query;
        }
        
        public function fetch_search_medical_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_medical_history WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_medical_history($data){
            $query = $this->db->insert('children_medical_history', $data);
            return $query;
        }
        
        public function update_medical_history_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_medical_history', $data);
          return $query;
        }
        
        public function delete_medical_history($id){
            $query = $this->db->query("DELETE FROM children_medical_history WHERE id = '$id' ");
        }
        
        // End of Medical History
        
        // Personal Education 
        
        public function display_personal_education_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_personal_education')->result();
            return $query;
        }
        
        public function display_personal_education_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_personal_education')->result();
            return $query;
        }
        
        public function display_personal_education_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_personal_education')->result();
            return $query;
        }
        
        public function fetch_search_education_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_personal_education WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_personal_education($data){
            $query = $this->db->insert('children_personal_education', $data);
            return $query;
        }
        
        public function update_personal_education_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_personal_education', $data);
          return $query;
        }
        
        public function delete_personal_education($id){
            $query = $this->db->query("DELETE FROM children_personal_education WHERE id = '$id' ");
        }
        
        // End of Personal Education
        
        // Finance Information
        
        public function display_finance_information_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_finance_information')->result();
            return $query;
        }
        
        public function display_finance_information_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_finance_information')->result();
            return $query;
        }
        
        public function display_finance_information_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_finance_information')->result();
            return $query;
        }
        
        public function fetch_search_finance_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_finance_information WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_finance_information($data){
            $query = $this->db->insert('children_finance_information', $data);
            return $query;
        }
        
        public function update_finance_information_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_finance_information', $data);
          return $query;
        }
        
        public function delete_finance_information($id){
            $query = $this->db->query("DELETE FROM children_finance_information WHERE id = '$id' ");
        }
        
        // End of Finance Information
        
        // Foster Care
        
        public function display_foster_care_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_foster_care')->result();
            return $query;
        }
        
        public function display_foster_care_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_foster_care')->result();
            return $query;
        }
        
        public function display_foster_care_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_foster_care')->result();
            return $query;
        }
        
        public function fetch_search_foster_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_foster_care WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_foster_care($data){
            $query = $this->db->insert('children_foster_care', $data);
            return $query;
        }
        
        public function update_foster_care_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_foster_care', $data);
          return $query;
        }
        
        public function delete_foster_care($id){
            $query = $this->db->query("DELETE FROM children_foster_care WHERE id = '$id' ");
        }
        
        // End of Foster Care
        
        // Daily Logs
        
        public function display_daily_log_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('daily_log')->result();
            return $query;
        }
        
        // End of Daily Logs
        
        // Support Plan 
        
        public function display_support_plan_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('support_plan')->result();
            return $query;
        }
        
        // End of Support Plan 
        
        // Risk Assessment 
        
        public function display_risk_assessment_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('risk_assessment')->result();
            return $query;
        }
        
        // End of Risk Assessment
        
        // Health & Safety check
        
        public function display_health_safety_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('health_safety')->result();
            return $query;
        }
        
        // End of Health & Safety check
        
        // Incidents 
        
        public function display_incident_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_incidents')->result();
            return $query;
        }
        
        public function display_incident_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_incidents')->result();
            return $query;
        }
        
        public function display_incident_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_incidents')->result();
            return $query;
        }
        
        public function count_incidents($code){
            $query = $this->db->query("SELECT COUNT(*) AS total_inc FROM children_incidents WHERE code = '$code' ")->result();
            return $query;
        }
        
        public function fetch_search_incident_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_incidents WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_incidents($data){
            $query = $this->db->insert('children_incidents', $data);
            return $query;
        }
        
        public function update_incidents($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_incidents', $data);
          return $query;
        }
        
        public function delete_incidents($id){
            $query = $this->db->query("DELETE FROM children_incidents WHERE id = '$id' ");
        }
        
        // End of Incidents 
        
         // Absences 
        
        public function display_absences_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_absences')->result();
            return $query;
        }
        
        public function display_absences_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_absences')->result();
            return $query;
        }
        
        public function display_absences_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_absences')->result();
            return $query;
        }
        
        public function count_absences($code){
            $query = $this->db->query("SELECT COUNT(*) AS total_abs FROM children_absences WHERE code = '$code' ")->result();
            return $query;
        }
        
        public function fetch_search_absences_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_absences WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_absence($data){
            $query = $this->db->insert('children_absences', $data);
            return $query;
        }
        
        public function update_absence($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_absences', $data);
          return $query;
        }
        
        public function delete_absence($id){
            $query = $this->db->query("DELETE FROM children_absences WHERE id = '$id' ");
        }
        
        // End of Absences 
        
        // Sanction Rewards 
        
        public function display_sanction_rewards_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_sanction_rewards')->result();
            return $query;
        }
        
        public function display_sanction_rewards_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_sanction_rewards')->result();
            return $query;
        }
        
        public function display_children_sanction_rewards_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_sanction_rewards')->result();
            return $query;
        }
        
        public function count_children_sanction_rewards($code){
            $query = $this->db->query("SELECT COUNT(*) AS total_sanc FROM children_sanction_rewards WHERE code = '$code' ")->result();
            return $query;
        }
        
        public function insert_children_sanction_rewards($data){
            $query = $this->db->insert('children_sanction_rewards', $data);
            return $query;
        }
        
        public function update_children_sanction_rewards($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_sanction_rewards', $data);
          return $query;
        }
        
        public function fetch_search_sanction_rewards_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_sanction_rewards WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function delete_children_sanction_rewards($id){
            $query = $this->db->query("DELETE FROM children_sanction_rewards WHERE id = '$id' ");
        }
        
        // End of Sanction Rewards
        
        // Abilities Evaluation
        
        public function display_abilities_evaluation_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_abilities_evaluation')->result();
            return $query;
        }
        
        public function display_abilities_evaluation_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_abilities_evaluation')->result();
            return $query;
        }
        
        public function display_abilities_evaluation_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_abilities_evaluation')->result();
            return $query;
        }
        
        public function fetch_search_abilities_evaluation_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_abilities_evaluation WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function insert_abilities_evaluation($data){
            $query = $this->db->insert('children_abilities_evaluation', $data);
            return $query;
        }
        
        public function update_abilities_evaluation($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_abilities_evaluation', $data);
          return $query;
        }
        
        public function delete_abilities_evaluation($id){
            $query = $this->db->query("DELETE FROM children_abilities_evaluation WHERE id = '$id' ");
        }
        
        // End of Abilities Evaluation
        
        // Keywork Session
        
        public function display_keywork_session_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_keywork_session')->result();
            return $query;
        }
        
        public function insert_keywork_session($data){
            $query = $this->db->insert('children_keywork_session', $data);
            return $query;
        }
        
        public function update_keywork_session($code, $data){
          $this->db->where('code', $code);
          $query = $this->db->update('children_keywork_session', $data);
          return $query;
        }
        
        public function delete_keywork_session($id){
            $query = $this->db->query("DELETE FROM children_keywork_session WHERE id = '$id' ");
        }
        
        // End of Keywork Session
        
         // Case Recording
         
         public function display_case_recording_by_code_limit($code){
            $this->db->limit('5');
            $this->db->order_by('created_date', 'DESC');
            $this->db->where('code', $code);
            $query = $this->db->get('children_case_recording')->result();
            return $query;
        }
        
        public function display_case_recording_by_code($code){
            $this->db->where('code', $code);
            $query = $this->db->get('children_case_recording')->result();
            return $query;
        }
        
        public function display_case_recording_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('children_case_recording')->result();
            return $query;
        }
        
        public function insert_case_recording($data){
            $query = $this->db->insert('children_case_recording', $data);
            return $query;
        }
        
        public function update_case_recording($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('children_case_recording', $data);
          return $query;
        }
        
        public function fetch_search_case_recording_data($title){
           $this->db->order_by('created_date', 'DESC');
           $query = $this->db->query("SELECT * FROM children_case_recording WHERE title LIKE '%$title%' ")->result();
           return $query;
        }
        
        public function delete_case_recording($id){
            $query = $this->db->query("DELETE FROM children_case_recording WHERE id = '$id' ");
        }
        
        // End of Case Recording
        
        // End of Children 
    }

?>