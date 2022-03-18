<?php
    
    class Guest_ban extends CI_Controller{
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Guest_ban_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Guest_ban_model->display_guest_ban_by_id($id);
                $data['children'] = $this->House_model->display_all_children();
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/guest_ban/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add($house_code){
            $this->load->model('Guest_ban_model');
            $this->load->model('House_model');
            
            $session_role = $this->session->userdata('urole');
            
            $submit_btn = $this->input->post('add');
            
            $house = $this->House_model->display_home($house_code);
            foreach($house as $hse){
                $house = $hse->housename;
            }
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->House_model->display_all_children();
                $data['house'] = $this->House_model->display_home($house_code);
                $data['code'] = $house_code;
                
                $this->load->view('admin/house/guest_ban/add', $data);
            
                if(isset($submit_btn)){
                    $code = $this->input->post('child_code');
                    $room_number = $this->input->post('room_number');
                    $guest_name = $this->input->post('guest_name');
                    $reason_for_ban = $this->input->post('reason_for_ban');
                    $additional_info = $this->input->post('additional_info');
                    $start_date = $this->input->post('start_date');
                    $end_date = $this->input->post('end_date');
                    
                    $query = $this->db->query("SELECT fullname FROM children WHERE code = '$code' ")->result();
                    foreach($query as $qry){
                        $child_name = $qry->fullname;
                    }
                    
                    $array = array(
                        'code' => $code,
                        'child_name' => $child_name,
                        'house_code' => $house_code,
                        'house' => $house,
                        'room_number' => $room_number,
                        'guest_name' => $guest_name,
                        'reason_for_ban' => $reason_for_ban,
                        'additional_info' => $additional_info,
                        'start_date' => $start_date,
                        'end_date' => $end_date
                    );
                    
                    $insert = $this->Guest_ban_model->insert_guest_ban($array);
                    
                    if($insert){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('admin/house/all/unit/'.$house_code); ?>";
                        </script>
              <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/all/unit/'.$house_code); ?>";
                        </script> 
              <?php }
                   
                }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Guest_ban_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->House_model->display_all_children();
                $data['guest_ban'] = $this->Guest_ban_model->display_guest_ban_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/guest_ban/edit', $data);
                
                if(isset($btn_submit)){
                    $room_number = $this->input->post('room_number');
                    $guest_name = $this->input->post('guest_name');
                    $reason_for_ban = $this->input->post('reason_for_ban');
                    $additional_info = $this->input->post('additional_info');
                    $start_date = $this->input->post('start_date');
                    $end_date = $this->input->post('end_date');
                    
                    $array = array(
                        'room_number' => $room_number,
                        'guest_name' => $guest_name,
                        'reason_for_ban' => $reason_for_ban,
                        'additional_info' => $additional_info,
                        'start_date' => $start_date,
                        'end_date' => $end_date
                    );
                    
                    $update = $this->Guest_ban_model->update_guest_ban_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/guest_ban/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/guest_ban/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Guest_ban_model');
           $this->Guest_ban_model->delete_guest_ban($id); 
        }
        
        public function send_mail($code){
          $email = $this->input->post('email');
          $house = $this->input->post('house');    
          $child_name = $this->input->post('child_name');    
          $guest_name = $this->input->post('guest_name');    
          $reason_for_ban = $this->input->post('reason_for_ban');    
          $additional_info = $this->input->post('additional_info');    
          $start_date = $this->input->post('start_date');    
          $end_date = $this->input->post('end_date');    

          $subject = "Guest ban";
          $body = "
            Please find below the information of the Guest Ban - 
            House - $house
            Young Person - $child_name
            Guest Name - $guest_name
            Reason for ban - $reason_for_ban
            Additional Information - $additional_info
            Start Date - $start_date
            End Date - $end_date
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