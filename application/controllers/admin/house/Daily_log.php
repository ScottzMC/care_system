<?php

    class Daily_log extends CI_Controller{
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['daily_log'] = $this->House_model->display_all_daily_log($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('admin/house/daily_log/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
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
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Daily Log";
          $body = "Please find below attached the Daily Log document";

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
         
         $this->load->model('Daily_log_model');
         $data['detail'] = $this->Daily_log_model->display_daily_log_by_id($id);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/daily_log/'.$pdf);

         $this->load->library('email', $config);
         //$this->load->library('encrypt');
         $this->email->from('admin@scottnnaghor.com', "Care System");
         $this->email->to("$email");
         //$this->email->cc("testcc@domainname.com");
         $this->email->subject("$subject");
         $this->email->message("$body");
         $this->email->attach($atch); 
         $this->email->send();
         ?>
        <script>
            alert("Sent to Mail");
            window.location.href="<?php echo site_url('admin/house/daily_log/view/'.$code); ?>";
        </script> 
 <?php }
 
        public function edit_document($id, $code){
            
            $this->load->model('Daily_log_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/daily_log/",
                    //'upload_path'   => "./uploads/../../uploads/community/",
                    'allowed_types' => "pdf|docx|doc",
                    'overwrite'     => TRUE,
                    'max_size'      => "30000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
    
                $this->upload->do_upload('userFiles1');
                $fileName = str_replace(' ', '_', $_FILES['userFiles1']['name']);
            }
              
            $array = array(
                'pdf' => $fileName
            );  
            
            $update = $this->Daily_log_model->update_daily_log_details($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('admin/house/daily_log/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/house/daily_log/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }

    }

?>