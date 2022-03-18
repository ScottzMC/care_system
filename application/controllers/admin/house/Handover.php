<?php

    class Handover extends CI_Controller{
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Handover_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Handover_model->display_handover_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/handover/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add($code){
            $this->load->model('Handover_model');
            $this->load->model('House_model');
            
            $session_role = $this->session->userdata('urole');
            $session_email = $this->session->userdata('uemail');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['staff'] = $this->Handover_model->display_all_staff();
                $data['code'] = $code;
                
                $submit_btn = $this->input->post('add');
                
                $house = $this->House_model->display_home($code);
                foreach($house as $hse){
                    $house = $hse->housename;
                }
                
                $this->load->view('admin/house/handover/add', $data);
                
                if(isset($submit_btn)){
                    
                    $title = $this->input->post('title');
                    $actions = $this->input->post('actions');
                    $gaming = $this->input->post('gaming');
                    $keys_pettycash = $this->input->post('keys_pettycash');
                    $keys_pettycash_comment = $this->input->post('keys_pettycash_comment');
                    $health_wellbeing = $this->input->post('health_wellbeing');
                    $cleanliness = $this->input->post('cleanliness');
                    $occupancy = $this->input->post('occupancy');
                    $edt_police_comment = $this->input->post('edt_police_comment');
                    $safeguarding = $this->input->post('safeguarding');
                    $appointments_diary = $this->input->post('appointments_diary');
                    $appointments_diary_support = $this->input->post('appointments_diary_support');
                    $appointments_diary_remind = $this->input->post('appointments_diary_remind');
                    $service_user = $this->input->post('service_user');
                    $maintenance = $this->input->post('maintenance');
                    $additional_info = $this->input->post('additional_info');
                    $ingoing_staff = $this->input->post('ingoing_staff');
                    $time = $this->input->post('time');
                    $date = $this->input->post('date');
                    
                    $array = array(
                        'title' => $title,
                        'house_code' => $code,
                        'housename' => $house,
                        'actions' => $actions,
                        'gaming' => $gaming,
                        'keys_pettycash' => $keys_pettycash,
                        'keys_pettycash_comment' => $keys_pettycash_comment,
                        'health_wellbeing' => $health_wellbeing,
                        'cleanliness' => $cleanliness,
                        'occupancy' => $occupancy,
                        'edt_police_comment' => $edt_police_comment,
                        'safeguarding' => $safeguarding,
                        'appointments_diary' => $appointments_diary,
                        'appointments_diary_support' => $appointments_diary_support,
                        'appointments_diary_remind' => $appointments_diary_remind,
                        'service_user' => $service_user,
                        'maintenance' => $maintenance,
                        'additional_info' => $additional_info,
                        'outgoing_staff' => $session_email,
                        'ingoing_staff' => $ingoing_staff,
                        'time' => $time,
                        'date' => $date
                    );
                    
                    $insert = $this->Handover_model->insert_handover($array);
                    
                    if($insert){ ?>
                            <script>
                                alert('Added Successfully');
                                window.location.href="<?php echo site_url('admin/house/all/unit/'.$code); ?>";
                            </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/all/unit/'.$code); ?>";
                            </script> 
                  <?php }
                }
            }else{
            redirect('admin/account/login');    
          }
        }
        
        public function delete(){
            $this->load->model('Handover_model');
            
           $id = $this->input->post('del_id');
           
            $this->load->model('Handover_model');
           $this->Handover_model->delete_handover($id); 
        }
        
        public function send_mail($code){
            $title = $this->input->post('title');
            $actions = $this->input->post('actions');
            $gaming = $this->input->post('gaming');
            $keys_pettycash = $this->input->post('keys_pettycash');
            $keys_pettycash_comment = $this->input->post('keys_pettycash_comment');
            $health_wellbeing = $this->input->post('health_wellbeing');
            $cleanliness = $this->input->post('cleanliness');
            $occupancy = $this->input->post('occupancy');
            $edt_police_comment = $this->input->post('edt_police_comment');
            $safeguarding = $this->input->post('safeguarding');
            $appointments_diary = $this->input->post('appointments_diary');
            $appointments_diary_support = $this->input->post('appointments_diary_support');
            $appointments_diary_remind = $this->input->post('appointments_diary_remind');
            $service_user = $this->input->post('service_user');
            $maintenance = $this->input->post('maintenance');
            $additional_info = $this->input->post('additional_info');
            $outgoing_staff = $this->input->post('outgoing_staff');
            $time = $this->input->post('time');
            $date = $this->input->post('date');

              $subject = "Handover";
              $body = "
                Please find below the information of the Handover - 
                
                Title - $title
                Have you read the staff communication, logged KWS & required data - $actions
                Is the Playstation/Xbox present at placement? - $gaming
                Does the Petty Cash amount correlate with the Petty Cash Record? - $keys_pettycash
                Does the Petty Cash amount correlate with the Petty Cash Record? - $keys_pettycash_comment
                Are there any concerns or medication that needs to be held for YPs! - $health_wellbeing
                Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? - $cleanliness
                Are there any Service Users who are near their missing people’s time, or are away from the unit? - $occupancy
                Does Edt or the Police  need to be updated? - $edt_police_comment
                Any Safeguarding Concerns? If yes, has this been logged and reported to the safeguarding officer. - $safeguarding
                Have all appointments been added to the diary? - $appointments_diary
                Has an allocated worker been assigned to support that YP? - $appointments_diary_support
                Has the YP been reminded/offered support for the appointment? - $appointments_diary_remind
                Handover of each Service User: - $service_user
                Are there any maintenance issues you need to deal with during your shift? If so, do you know who to contact? - $maintenance
                Any other information?(Passwords, PC) - $additional_info
                Ingoing Staff - $ingoing_staff
                Outgoing Staff - $outgoing_staff
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