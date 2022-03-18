<?php
    
    class Daily_log extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Daily_log_model');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['daily_log'] = $this->Daily_log_model->display_all_daily_log();

                $this->load->view('hr/daily_log/view', $data);
            }else{
                redirect('hr/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Daily_log_model');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['detail'] = $this->Daily_log_model->display_daily_log_by_id($id);
                
                $this->load->view('hr/daily_log/detail', $data);
            }else{
                redirect('hr/account/login');    
            }
        }
        
        public function add(){
            $this->load->model('Daily_log_model');
            
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
                'created_time' => $uploaded_time,
                'created_date' => $date
            );
            
            $insert = $this->Daily_log_model->insert_daily_log($array);
            
            if($insert){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('hr/daily_log'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('hr/daily_log'); ?>";
                </script> 
      <?php }
        }
        
        public function edit($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Daily_log_model');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['daily_log'] = $this->Daily_log_model->display_daily_log_by_id($id);
                
                $this->load->view('hr/daily_log/edit', $data);
                
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
                        'created_time' => $uploaded_time,
                        'created_date' => $date
                    );
                    
                    $update = $this->Daily_log_model->update_daily_log_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('hr/daily_log'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('hr/daily_log'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('hr/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Daily_log_model');
           $this->Daily_log_model->delete_daily_log($id); 
        }
        
        public function send_mail(){
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
            window.location.href="<?php echo site_url('hr/daily_log'); ?>";
        </script> 
 <?php }

    }

?>