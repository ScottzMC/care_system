<?php 

    class All extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Children_model->display_all_children();
                $data['house'] = $this->Children_model->display_all_property();
                
                $this->load->view('admin/children/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
    }


?>