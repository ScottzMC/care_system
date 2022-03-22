<?php 

    class All extends CI_Controller{
        
        public function unit($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['keywork_session'] = $this->House_model->display_all_keywork_session($code);
                $data['daily_log'] = $this->House_model->display_all_daily_log($code);
                $data['handover'] = $this->House_model->display_all_handover($code);
                $data['staff_communication'] = $this->House_model->display_all_staff_communication();
                $data['risk_assessment'] = $this->House_model->display_all_risk_assessment($code);
                $data['reporting'] = $this->House_model->display_all_reporting($code);
                $data['support_plan'] = $this->House_model->display_all_support_plan($code);
                $data['support_work'] = $this->House_model->display_all_support_work($code);
                $data['guest_ban'] = $this->House_model->display_all_guest_ban($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('admin/house/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
    
    }

?>