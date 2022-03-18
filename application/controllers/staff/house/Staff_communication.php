<?php
    
    class Staff_communication extends CI_Controller{
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Staff_communication_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/staff_communication/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add($code){
            $this->load->model('Staff_communication_model');
            $this->load->model('House_model');
            
            $session_role = $this->session->userdata('urole');
            
            $submit = $this->input->post('add');
            
            $house = $this->House_model->display_home($code);
            foreach($house as $hse){
                $house = $hse->housename;
            }
            
            if(!empty($session_role) && $session_role == "Staff"){
                
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/daily_log/add', $data);
            
                if(isset($staff) && isset($submit)){
                    $title = $this->input->post('title');
                    $request = $this->input->post('request');
                    $staff = $this->input->post('staff');
                    $imp_staff = implode(',', $staff);
                    
                    $time = $this->input->post('time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                    'title' => $title,
                    'request' => $request,
                    'time' => $time,
                    'created_date' => $date
                );
                
                $insert = $this->Staff_communication_model->insert_staff_communication($array);
                
                $insert_id = $this->db->insert_id();
                
                $exp_staff = explode(',', $imp_staff);
                
                foreach($exp_staff as $exp){
                
                    $add_rray = array(
                        'staffcom_id' => $insert_id,
                        'email' => $exp
                    );
                    
                    $add = $this->Staff_communication_model->insert_explode_communication($add_rray);
                    }
                }
                
                if($insert && $add){ ?>
                    <script>
                        alert('Added Successfully');
                        window.location.href="<?php echo site_url('staff/house/staff_communication/detail/'.$last_id.'/'.$code); ?>";
                    </script>
          <?php }else{ ?>
                   <script>
                        alert('Failed');
                        window.location.href="<?php echo site_url('staff/house/staff_communication/detail/'.$last_id.'/'.$code); ?>";
                    </script> 
          <?php }
           }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            $this->load->model('Staff_communication_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff_communication'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/staff_communication/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $request = $this->input->post('request');
                    $staff = $this->input->post('staff');
                    $imp_staff = implode(',', $staff);
                    
                    $time = $this->input->post('time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'request' => $request,
                        'time' => $time,
                        'created_date' => $date
                    );
                    
                    $update = $this->Staff_communication_model->update_staff_communication_details($id, $array);
                    
                    $exp_staff = explode(',', $imp_staff);
            
                    foreach($exp_staff as $exp){
                    
                    $add_rray = array(
                        'staffcom_id' => $id,
                        'email' => $exp
                    );
                    
                    $add = $this->Staff_communication_model->insert_explode_communication($add_rray);
                    }
                    
                    if($update && $add){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/staff_communication'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/staff_communication'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Staff_communication_model');
           $this->Staff_communication_model->delete_staff_communication($id); 
        }
        
        public function send_mail($code){
          $email = $this->input->post('email');
          
          $title = $this->input->post('title');
          $request = $this->input->post('request');
          $time = $this->input->post('time');   
          $date = $this->input->post('created_date');    

          $subject = "Staff Communication";
          $body = "
            Please find below the information of the Staff Communication - 
            Title - $title 
            Request - $request
            Time - $time 
            Date - $date
            ";

          $config = Array(
         'protocol' => 'smtp',
         'smtp_host' => 'smtp.scottnnaghor.com',
         'smtp_port' => 25,
         'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
         'smtp_pass' => 'TigerPhenix100', // change it to account email password
         'mailtype' => 'html',
         'charset' => 'iso-8859-1',
         'wordwrap' => TRUE
         );

         $this->load->library('email', $config);
         //$this->load->library('encrypt');
         $this->email->from('admin@scottnnaghor.com', "Care System");
         $this->email->to("$email");
         //$this->email->cc("testcc@domainname.com");
         $this->email->subject("$subject");
         $this->email->message("$body");
         $this->email->send();
         ?>
        <script>
            alert("Sent to Mail");
            window.location.href="<?php echo site_url('staff/house/all/unit/'.$code); ?>";
        </script> 
 <?php }
        
    }

?>