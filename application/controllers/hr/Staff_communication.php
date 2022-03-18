<?php
    
    class Staff_communication extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Staff_communication_model');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['staff_communication'] = $this->Staff_communication_model->display_all_staff_communication();
                $data['children'] = $this->Staff_communication_model->display_all_children();

                $this->load->view('hr/staff_communication/view', $data);
            }else{
                redirect('hr/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Staff_communication_model');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['detail'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
                
                $this->load->view('hr/staff_communication/detail', $data);
            }else{
                redirect('hr/account/login');    
            }
        }
        
        public function add(){
            $this->load->model('Staff_communication_model');
            
            $title = $this->input->post('title');
            $request = $this->input->post('request');
            $staff = $this->input->post('staff');
            $imp_staff = implode(',', $staff);
            
            $time = $this->input->post('time');
            $date = $this->input->post('created_date');
            
            if(isset($staff)){
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
                    window.location.href="<?php echo site_url('hr/staff_communication'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('hr/staff_communication'); ?>";
                </script> 
      <?php }
        }
        
        public function edit($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Staff_communication_model');
            
            if(!empty($session_role) && $session_role == "HR"){
                $data['staff_communication'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
                
                $this->load->view('hr/staff_communication/edit', $data);
                
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
                            window.location.href="<?php echo site_url('hr/staff_communication'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('hr/staff_communication'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('hr/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Staff_communication_model');
           $this->Staff_communication_model->delete_staff_communication($id); 
        }
        
        public function send_mail(){
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
            window.location.href="<?php echo site_url('hr/staff_communication'); ?>";
        </script> 
 <?php }
        
        public function search(){
          $search_query = $this->input->post('search_query');
          
          $this->load->model('Staff_communication_model');
          
          $email = $this->session->userdata('uemail');
    
          $data["search"] = $this->Staff_communication_model->fetch_search_data($search_query);
          $data['staff_communication'] = $this->Staff_communication_model->display_all_staff_communication();

          $this->load->view('hr/staff_communication/search', $data);
        }
    }

?>