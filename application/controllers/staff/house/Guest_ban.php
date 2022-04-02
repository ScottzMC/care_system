<?php
    
    class Guest_ban extends CI_Controller{
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['house'] = $this->House_model->display_home($code);
                $data['guest_ban'] = $this->House_model->display_all_guest_ban($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('staff/house/guest_ban/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Guest_ban_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Guest_ban_model->display_guest_ban_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/guest_ban/detail', $data);
            }else{
                redirect('staff/account/login');    
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
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->House_model->display_all_children();
                $data['house'] = $this->House_model->display_home($house_code);
                $data['code'] = $house_code;
                
                $this->load->view('staff/house/guest_ban/add', $data);
            
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
                            window.location.href="<?php echo site_url('staff/house/all/unit/'.$house_code); ?>";
                        </script>
              <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/all/unit/'.$house_code); ?>";
                        </script> 
              <?php }
                   
                }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Guest_ban_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->House_model->display_all_children();
                $data['guest_ban'] = $this->Guest_ban_model->display_guest_ban_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/guest_ban/edit', $data);
                
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
                            window.location.href="<?php echo site_url('staff/house/guest_ban/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/guest_ban/detail/'.$id.'/'.$code); ?>";
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
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Guest Ban";
          $body = "Please find below attached the Guest Ban document";

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
         
         $this->load->model('Guest_ban_model');
         $data['detail'] = $this->Guest_ban_model->display_guest_ban_by_id($id);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/guest_ban/'.$pdf);

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
            window.location.href="<?php echo site_url('staff/house/all/unit/'.$code); ?>";
        </script> 
 <?php }
 
        public function edit_document($id, $code){
            
            $this->load->model('Guest_ban_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/guest_ban/",
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
            
            $update = $this->Guest_ban_model->update_guest_ban_details($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('staff/house/guest_ban/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/house/guest_ban/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }

    }

?>