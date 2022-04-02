<?php 

    class All extends CI_Controller{
        
        public function unit($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['house'] = $this->House_model->display_home($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('staff/house/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
    
    }

?>