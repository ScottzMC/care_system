<?php
    
    class Support_plan extends CI_Controller{
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['support_plan'] = $this->House_model->display_all_support_plan($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('admin/house/support_plan/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            $this->load->model('Support_plan_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Support_plan_model->display_support_plan_by_id($id);
                $data['support_comment'] = $this->Support_plan_model->display_area_of_support_comment();
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/support_plan/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add($house_code){
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            $session_role = $this->session->userdata('urole');
            
            $submit_btn = $this->input->post('add');
            
            $house = $this->House_model->display_home($house_code);
            foreach($house as $hse){
                $house = $hse->housename;
            }
            
            if(!empty($session_role) && $session_role == "Admin"){
            $data['support_area'] = $this->Support_plan_model->display_area_of_support();
            $data['house'] = $this->House_model->display_home($house_code);
            $data['code'] = $house_code;
            $data['children'] = $this->Support_plan_model->display_all_children();
            $data['staff'] = $this->Support_plan_model->display_all_staff();
            
            $support_area = $data['support_area'];

            $this->load->view('admin/house/support_plan/add', $data);
            
            if(isset($submit_btn)){
            
                $code = $this->input->post('child_code');
                $title = $this->input->post('title');
                $area_of_support = $this->input->post('area_of_support');
                $imp_area_of_support = implode(',', $area_of_support);

                $plan_of_action = $this->input->post('plan_of_action');
                $support_me = $this->input->post('support_me');
                $often_will_support = $this->input->post('often_will_support');
                $hours_spent_task = $this->input->post('hours_spent_task');
                $additional_info = $this->input->post('additional_info');
                $time = time();
                $date = $this->input->post('created_date');
                
                $area_title = $this->input->post('area_title');

                $query = $this->db->query("SELECT fullname FROM children WHERE code = '$code' ")->result();
                foreach($query as $qry){
                    $child_name = $qry->fullname;
                }
                
                $array = array(
                    'code' => $code,
                    'child_name' => $child_name,
                    'house_code' => $house_code,
                    'house' => $house,
                    'title' => $title,
                    'plan_of_action' => $plan_of_action,
                    'area_of_support' => $imp_area_of_support,
                    'support_me' => $support_me,
                    'often_will_support' => $often_will_support,
                    'hours_spent_task' => $hours_spent_task,
                    'additional_info' => $additional_info,
                    'created_time' => $time,
                    'created_date' => $date
                );
                
                $exp_area_of_support = explode(',', $imp_area_of_support);
                
                foreach($exp_area_of_support as $area){
                    $area_query = $this->db->query("SELECT title FROM area_of_support WHERE id = '$area' ")->result();
                    foreach($area_query as $qry){
                        $area_title = $qry->title;
                    }
                
                    $com_array = array(
                        'code' => $code,
                        'house_code' => $house_code,
                        'house' => $house,
                        'area_support_id' => $area,
                        'title' => $area_title,
                    );
                    $insert_support_comment = $this->Support_plan_model->insert_area_of_support_comment($com_array);
                }

                $insert_support_plan = $this->Support_plan_model->insert_support_plan($array);
                
                if($insert_support_plan){ ?>
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
        
        public function area_of_support($code){
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            $title = $this->input->post('title');
            
            $array = array('title' => $title);
            
            $insert_support_area = $this->Support_plan_model->insert_area_of_support($array);
            
            if($insert_support_area){ ?>
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
        
        public function edit($id, $code, $house_code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Support_plan_model->display_children_by_code($code);
                $data['support_plan'] = $this->Support_plan_model->display_support_plan_by_id($id);
                $data['support_area'] = $this->Support_plan_model->display_area_of_support();
                $data['support_comment'] = $this->Support_plan_model->display_area_of_support_comment();
                $data['house'] = $this->House_model->display_home($house_code);
                $data['code'] = $house_code;
                
                $this->load->view('admin/house/support_plan/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $area_of_support = $this->input->post('area_of_support');
                    $imp_area_of_support = implode(',', $area_of_support);
                    
                    $plan_of_action = $this->input->post('plan_of_action');
                    $support_me = $this->input->post('support_me');
                    $often_will_support = $this->input->post('often_will_support');
                    $hours_spent_task = $this->input->post('hours_spent_task');
                    $additional_info = $this->input->post('additional_info');
                    $time = time();
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'area_of_support' => $imp_area_of_support,
                        'plan_of_action' => $plan_of_action,
                        'support_me' => $support_me,
                        'often_will_support' => $often_will_support,
                        'hours_spent_task' => $hours_spent_task,
                        'additional_info' => $additional_info,
                        'created_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_support_plan = $this->Support_plan_model->update_support_plan_details($id, $array);
                    
                    if($update_support_plan){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit_comment($id, $code, $house_code){
            $btn_submit = $this->input->post('edit_comment');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            $data['house'] = $this->House_model->display_home($house_code);
            $data['code'] = $house_code;
            
            $this->load->view('admin/house/support_plan/edit', $data);
            
            if(isset($btn_submit)){
                $area_id = $this->input->post('area_id');
                $comment = $this->input->post('comment');

                $array = array(
                    'comment' => $comment
                );
                
                $update_support = $this->Support_plan_model->update_support_plan_comment($area_id, $array);
                
                if($update_support){ ?>
                    <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                    </script>
          <?php }else{ ?>
                   <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                    </script> 
         <?php }  
            }
        }
        
        public function edit_area_of_support($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['support_area'] = $this->Support_plan_model->display_support_area_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/support_plan/area_of_support', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    
                    $array = array(
                        'title' => $title
                    );
                    
                    $update_support_area = $this->Support_plan_model->update_support_area($id, $array);
                    
                    if($update_support_area){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Support_plan_model');
           $this->Support_plan_model->delete_support_plan($id); 
        }
        
        public function delete_area(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Support_plan_model');
           $this->Support_plan_model->delete_support_area($id); 
        }
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Support Plan";
          $body = "Please find below attached the Support Plan document";

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
         
         $this->load->model('Support_plan_model');
         $data['detail'] = $this->Support_plan_model->display_support_plan_by_id($id);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/support_plan/'.$pdf);

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
            
            $this->load->model('Support_plan_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/support_plan/",
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
            
            $update = $this->Support_plan_model->update_support_plan_details($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/house/support_plan/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }
    
    }

?>