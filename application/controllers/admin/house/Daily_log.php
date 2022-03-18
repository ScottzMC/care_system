<?php

    class Daily_log extends CI_Controller{
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Daily_log_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Daily_log_model->display_daily_log_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/daily_log/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add($code){
            $this->load->model('Daily_log_model');
            $this->load->model('House_model');
            
            $session_role = $this->session->userdata('urole');
            
            $submit = $this->input->post('add');
            
            $house = $this->House_model->display_home($code);
            foreach($house as $hse){
                $house = $hse->housename;
            }
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/daily_log/add', $data);
                
                if(isset($submit)){
                    $house_code = $this->input->post('house_code');
                    $title = $this->input->post('title');
                    $summary = $this->input->post('summary');
                    $staff_initial = $this->input->post('staff_initial');
                    $time = $this->input->post('time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'code' => $code,
                        'house' => $house,
                        'title' => $title,
                        'summary' => $summary,
                        'staff_initial' => $staff_initial,
                        'time' => $time,
                        'created_date' => $date
                    );
                    
                    $insert = $this->Daily_log_model->insert_daily_log($array);
                    $last_id = $this->db->insert_id();
                    
                    if($insert){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('admin/house/daily_log/detail/'.$last_id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/daily_log/detail/'.$last_id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Daily_log_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['daily_log'] = $this->Daily_log_model->display_daily_log_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/daily_log/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $summary = $this->input->post('summary');
                    $uploaded_time = time();
                    $staff_initial = $this->input->post('staff_initial');
                    $time = $this->input->post('time');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'summary' => $summary,
                        'staff_initial' => $staff_initial,
                        'time' => $time,
                        'created_date' => $date
                    );
                    
                    $update = $this->Daily_log_model->update_daily_log_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/daily_log/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/daily_log/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Daily_log_model');
           $this->Daily_log_model->delete_daily_log($id); 
        }
        
        public function send_mail($code){
          $email = $this->input->post('email');
          $title = $this->input->post('title');    
          $staff_initial = $this->input->post('staff_initial');    
          $summary = $this->input->post('summary');    
          $date = $this->input->post('created_date');    

          $subject = "Daily Log";
          $body = "
            Please find below the information of the Daily Log - 
            Title - $title
            Staff Initial - $staff_initial
            Summary - $summary
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
         
         //$this->Daily_log_model->delete_daily_log($id); 
         //$data['daily_log'] = $this->Daily_log_model->display_all_daily_log();
         //$view = $this->load->view('admin/daily_log/view',$data,true);

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
            window.location.href="<?php echo site_url('admin/house/all/unit/'.$code); ?>";
        </script> 
 <?php }

    }

?>