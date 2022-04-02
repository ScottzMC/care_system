<?php
    
    class Support_plan extends CI_Controller{
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['house'] = $this->House_model->display_home($code);
                $data['support_plan'] = $this->House_model->display_all_support_plan($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('staff/house/support_plan/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            $this->load->model('Support_plan_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Support_plan_model->display_support_plan_by_id($id);
                $data['support_comment'] = $this->Support_plan_model->display_area_of_support_comment();
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/support_plan/detail', $data);
            }else{
                redirect('staff/account/login');    
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
            
            if(!empty($session_role) && $session_role == "Staff"){
            $data['support_area'] = $this->Support_plan_model->display_area_of_support();
            $data['house'] = $this->House_model->display_home($house_code);
            $data['code'] = $house_code;
            $data['children'] = $this->Support_plan_model->display_all_children();
            $data['staff'] = $this->Support_plan_model->display_all_staff();
            
            $support_area = $data['support_area'];

            $this->load->view('staff/house/support_plan/add', $data);
            
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
        
        public function area_of_support($code){
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            $title = $this->input->post('title');
            
            $array = array('title' => $title);
            
            $insert_support_area = $this->Support_plan_model->insert_area_of_support($array);
            
            if($insert_support_area){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('staff/house/all/unit/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/house/all/unit/'.$code); ?>";
                </script> 
      <?php }
        }
        
        public function edit($id, $code, $house_code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->Support_plan_model->display_children_by_code($code);
                $data['support_plan'] = $this->Support_plan_model->display_support_plan_by_id($id);
                $data['support_area'] = $this->Support_plan_model->display_area_of_support();
                $data['support_comment'] = $this->Support_plan_model->display_area_of_support_comment();
                $data['house'] = $this->House_model->display_home($house_code);
                $data['code'] = $house_code;
                
                $this->load->view('staff/house/support_plan/edit', $data);
                
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
                            window.location.href="<?php echo site_url('staff/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_comment($id, $code, $house_code){
            $btn_submit = $this->input->post('edit_comment');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            $data['house'] = $this->House_model->display_home($house_code);
            $data['code'] = $house_code;
            
            $this->load->view('staff/house/support_plan/edit', $data);
            
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
                    window.location.href="<?php echo site_url('staff/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                    </script>
          <?php }else{ ?>
                   <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/house/support_plan/detail/'.$id.'/'.$house_code); ?>";
                    </script> 
         <?php }  
            }
        }
        
        public function edit_area_of_support($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_plan_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['support_area'] = $this->Support_plan_model->display_support_area_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/support_plan/area_of_support', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    
                    $array = array(
                        'title' => $title
                    );
                    
                    $update_support_area = $this->Support_plan_model->update_support_area($id, $array);
                    
                    if($update_support_area){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/support_plan/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/support_plan/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
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
        
        public function send_mail($code){
          $email = $this->input->post('email');    
        
          $title = $this->input->post('title');
          $code = $this->input->post('code');
          $child_name = $this->input->post('child_name');
          $area_of_support = $this->input->post('area_of_support');
          $exp_area_of_support = explode(',', $area_of_support);
          $plan_of_action = $this->input->post('plan_of_action');
          $support_me = $this->input->post('support_me');
          $often_will_support = $this->input->post('often_will_support');
          $hours_spent_task = $this->input->post('hours_spent_task');
          $additional_info = $this->input->post('additional_info'); 

          $subject = "Support Plan";
          $body = "
            Please find below the information of the Support Plan - 
            Code - $code 
            Child Name - $child_name
            
            Title - $title
            
            Areas of Support - $exp_area_of_support
            
            Plan of action  - $plan_of_action 
            
            Who will support me? - $support_me 
            
            How often will I need support? - $often_will_support 
            
            Hours per week spent on task - $hours_spent_task 

            Additional Information - $additional_info 
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