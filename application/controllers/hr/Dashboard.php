<?php 
    
    class Dashboard extends CI_Controller{
        
        public function index(){
            $this->load->model('Dashboard_model');
            
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['count_users'] = $this->Dashboard_model->count_users(); 
                $data['count_reminders'] = $this->Dashboard_model->count_reminders(); 
                $data['count_risk_assessment'] = $this->Dashboard_model->count_risk_assessment(); 
                $data['count_support_plan'] = $this->Dashboard_model->count_support_plan(); 
                $data['count_keywork_session'] = $this->Dashboard_model->count_keywork_session(); 
                $data['count_properties'] = $this->Dashboard_model->count_properties(); 
                $data['count_children'] = $this->Dashboard_model->count_children(); 
                $data['count_children_incidents'] = $this->Dashboard_model->count_children_incidents();
                
                $data['children'] = $this->Dashboard_model->display_children(); 
                $data['staff'] = $this->Dashboard_model->display_staff(); 
                
                $this->load->view('hr/dashboard', $data);
            }else{
                redirect('hr/account/login');    
            }
        }
    }

?>