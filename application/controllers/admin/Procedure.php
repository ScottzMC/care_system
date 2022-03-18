<?php 
    
    class Procedure extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Procedure_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['procedure'] = $this->Procedure_model->display_all_procedure();
                
                $this->load->view('admin/procedure/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Procedure_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Procedure_model->display_procedure_by_id($id);
                
                $this->load->view('admin/procedure/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $time = time();
            $date = $this->input->post('created_date');
            
            $this->load->model('Procedure_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/procedure/",
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
                'title' => $title,
                'body' => $body,
                'doc' => $fileName,
                'created_time' => $time,
                'created_date' => $date
            );  
            
            $insert_procedure = $this->Procedure_model->insert_procedure($array);
            
            if($insert_procedure){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/procedure'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/procedure'); ?>";
                </script> 
      <?php }
        }
        
        public function edit($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Procedure_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['procedure'] = $this->Procedure_model->display_procedure_by_id($id);
                
                $this->load->view('admin/procedure/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $time = time();
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
                            'upload_path'   => "./uploads/procedure/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "pdf|docx|doc|xlsx",
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
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'created_time' => $time,
                        'created_date' => $date
                    );
                    
                    $update_procedure = $this->Procedure_model->update_procedure_details($id, $array);
                    
                    if($update_procedure){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/procedure'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/procedure'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
           $this->load->model('Procedure_model');
           
           $this->Procedure_model->delete_procedure($id); 
        }
        
        public function search(){
          $search_query = $this->input->post('search_query');
          
          $this->load->model('Procedure_model');
          
          $email = $this->session->userdata('uemail');
    
          $data["search"] = $this->Procedure_model->fetch_search_data($search_query);

          $this->load->view('admin/procedure/search', $data);
        }
        
        public function send_mail(){
          $email = $this->input->post('email');
            
          $title = $this->input->post('title');
          $body = $this->input->post('body');
          $date = $this->input->post('created_date');

          $subject = "Policy & Procedure";
          $body = "
            Please find below the information of the Policy & Procedure - 
            Title - $title
            
            Body - $body
            
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
            window.location.href="<?php echo site_url('admin/procedure'); ?>";
        </script> 
 <?php }
        
        public function download($id){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT doc FROM procedure_pol WHERE id = '$id' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/procedure/'.$qry->doc;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
    }

?>