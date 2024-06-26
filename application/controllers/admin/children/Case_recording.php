<?php 

    class Case_recording extends CI_Controller{
        
        // Case Recording
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Children_model->display_all_children();
                $data['case_recording'] = $this->Children_model->display_case_recording_by_code($code);
                
                $this->load->view('admin/children/case_recording/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Children_model->display_children_by_code($code);
                $data['case_recording'] = $this->Children_model->display_case_recording_by_id($id);
                
                $this->load->view('admin/children/case_recording/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add(){
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
                
            if(isset($btn_submit)){
                $child_code = $this->input->post('child_code');
                $title = $this->input->post('title');
                $body = $this->input->post('body');
                $date = $this->input->post('created_date');
                
                /*$files = $_FILES;
                $cpt1 = count($_FILES['userFiles1']['name']);
        
                for($i=0; $i<$cpt1; $i++){
                    $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                    $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                    $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                    $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                    $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
        
                    $config1 = array(
                        'upload_path'   => "./uploads/children/case_recording/",
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
                }*/
                
                $query = $this->db->query("SELECT fullname FROM children WHERE code = '$child_code' ")->result();
                foreach($query as $qry){
                    $child_name = $qry->fullname;
                }
                
                $array = array(
                    'code' => $child_code,
                    'child_name' => $child_name,
                    'title' => $title,
                    'body' => $body,
                    //'document' => $fileName,
                    'created_date' => $date
                );
                
                $add = $this->Children_model->insert_case_recording($array);
                
                if($add){ ?>
                    <script>
                        alert('Added Successfully');
                        window.location.href="<?php echo site_url('admin/children/case_recording/view/'.$child_code); ?>";
                    </script>
              <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/children/case_recording/view/'.$child_code); ?>";
                      </script> 
              <?php }  
                }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Children_model->display_all_children();
                $data['case_recording'] = $this->Children_model->display_case_recording_by_id($id);

                $this->load->view('admin/children/case_recording/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_date' => $date
                    );
                    
                    $update = $this->Children_model->update_case_recording($id, $array);
                    
                    if($update){ 
                    //redirect($_SERVER['HTTP_REFERER']);
                    ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/children/case_recording/view/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/children/case_recording/view/'.$code); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Case Recording";
          $body = "Please find below attached the Case Recording document";

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
         
         $this->load->model('Children_model');
         $data['detail'] = $this->Children_model->display_case_recording_by_code($code);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/children/case_recording/'.$pdf);

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
            window.location.href="<?php echo site_url('admin/children/case_recording/detail/'.$id.'/'.$code); ?>";
        </script> 
 <?php }
 
        public function edit_document($id, $code){
            
            $this->load->model('Children_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/children/case_recording/",
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
            
            $update = $this->Children_model->update_case_recording($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('admin/children/case_recording/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/children/case_recording/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           $this->load->model('Children_model');
           
           $this->Children_model->delete_case_recording($id); 
        }
        
        public function download($id){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT document FROM children_case_recording WHERE id = '$id' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/case_recording/'.$qry->document;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        // End of Case Recording
    }

?>