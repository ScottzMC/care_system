<?php
    
    class Staff_communication extends CI_Controller{
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['staff_communication'] = $this->House_model->display_all_staff_communication();
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('admin/house/staff_communication/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Staff_communication_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/staff_communication/detail', $data);
            }else{
                redirect('admin/account/login');    
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
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/staff_communication/add', $data);
                
                if(isset($submit)){
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
                    
                    $ins = $this->Staff_communication_model->insert_staff_communication($array);
                
                    $last_id = $this->db->insert_id();
                    
                    $exp_staff = explode(',', $imp_staff);
                    
                    foreach($exp_staff as $exp){
                    
                        $add_rray = array(
                            'staffcom_id' => $last_id,
                            'email' => $exp
                        );
                        
                        $add = $this->Staff_communication_model->insert_explode_communication($add_rray);
                    }
                    
                    if($ins && $add){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('admin/house/staff_communication/detail/'.$last_id.'/'.$code); ?>";
                        </script>
              <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/staff_communication/detail/'.$last_id.'/'.$code); ?>";
                        </script> 
              <?php }
                }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        /*public function add($code){
            $this->load->model('Staff_communication_model');
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
                
                $this->load->view('admin/house/staff_communication/add', $data);
            
                if(isset($submit)){
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
                
                $ins = $this->Staff_communication_model->insert_staff_communication($array);
                
                $last_id = $this->db->insert_id();
                
                $exp_staff = explode(',', $imp_staff);
                
                    foreach($exp_staff as $exp){
                
                    $add_rray = array(
                        'staffcom_id' => $last_id,
                        'email' => $exp
                    );
                    
                    $add = $this->Staff_communication_model->insert_explode_communication($add_rray);
                    }
                }
                
                if($ins && $add){ ?>
                    <script>
                        alert('Added Successfully');
                        window.location.href="<?php echo site_url('admin/house/staff_communication/detail/'.$last_id.'/'.$code); ?>";
                    </script>
          <?php }else{ ?>
                   <script>
                        alert('Failed');
                        window.location.href="<?php echo site_url('admin/house/staff_communication/detail/'.$last_id.'/'.$code); ?>";
                    </script> 
          <?php }
           }else{
                redirect('admin/account/login');    
           }
        }*/
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            $this->load->model('Staff_communication_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['staff_communication'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/staff_communication/edit', $data);
                
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
                            window.location.href="<?php echo site_url('admin/staff_communication'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/staff_communication'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Staff_communication_model');
           $this->Staff_communication_model->delete_staff_communication($id); 
        }
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Staff Communication";
          $body = "Please find below attached the Staff Communication document";

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
         
         $this->load->model('Staff_communication_model');
         $data['detail'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/staff_communication/'.$pdf);

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
            window.location.href="<?php echo site_url('admin/house/all/unit/'.$code); ?>";
        </script> 
 <?php }
 
        public function edit_document($id, $code){
            
            $this->load->model('Staff_communication_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/staff_communication/",
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
            
            $update = $this->Staff_communication_model->update_staff_communication_details($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('admin/house/staff_communication/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/house/staff_communication/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }
        
    }

?>