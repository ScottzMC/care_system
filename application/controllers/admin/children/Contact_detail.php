<?php 

    class Contact_detail extends CI_Controller{
        
        // Contact detail
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Children_model->display_all_children();
                $data['contact_detail'] = $this->Children_model->display_contact_detail_by_code($code);
                
                $this->load->view('admin/children/contact_detail/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Children_model->display_children_by_code($code);
                $data['contact_detail'] = $this->Children_model->display_contact_detail_by_id($id);
                
                $this->load->view('admin/children/contact_detail/detail', $data);
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
                $fullname = $this->input->post('fullname');
                $telephone = $this->input->post('telephone');
                $email = $this->input->post('email');
                $relationship = $this->input->post('relationship');
                $address = $this->input->post('address');
                $date = $this->input->post('created_date');
                
                $query = $this->db->query("SELECT fullname FROM children WHERE code = '$child_code' ")->result();
                foreach($query as $qry){
                    $child_name = $qry->fullname;
                }
                
                $array = array(
                    'code' => $child_code,
                    'child_name' => $child_name,
                    'fullname' => $fullname,
                    'telephone' => $telephone,
                    'email' => $email,
                    'relationship' => $relationship,
                    'address' => $address,
                    'created_date' => $date
                );
                
                $add = $this->Children_model->insert_contact_detail($array);
                
                if($add){ ?>
                    <script>
                        alert('Added Successfully');
                        window.location.href="<?php echo site_url('admin/children/contact_detail/view/'.$child_code); ?>";
                    </script>
              <?php }else{ ?>
                   <script>
                        alert('Failed');
                        window.location.href="<?php echo site_url('admin/children/contact_detail/view/'.$child_code); ?>";
                  </script> 
              <?php }  
                }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Children_model->display_children_by_code($code);
                $data['contact_detail'] = $this->Children_model->display_contact_detail_by_id($id);

                $this->load->view('admin/children/contact_detail/edit', $data);
                
                if(isset($btn_submit)){
                    $fullname = $this->input->post('fullname');
                    $telephone = $this->input->post('telephone');
                    $email = $this->input->post('email');
                    $relationship = $this->input->post('relationship');
                    $address = $this->input->post('address');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'fullname' => $fullname,
                        'telephone' => $telephone,
                        'email' => $email,
                        'relationship' => $relationship,
                        'address' => $address,
                        'created_date' => $date
                    );
                    
                    $update = $this->Children_model->update_contact_details($id, $array);
                    
                    if($update){ 
                    //redirect($_SERVER['HTTP_REFERER']);
                    ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/children/contact_detail/view/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/children/contact_detail/view/'.$code); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           $this->load->model('Children_model');
           
           $this->Children_model->delete_contact_detail($id); 
        }
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Contact Details";
          $body = "Please find below attached the Contact Details document";

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
         $data['detail'] = $this->Children_model->display_contact_detail_by_code($code);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/children/contact_detail/'.$pdf);

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
            window.location.href="<?php echo site_url('admin/children/contact_detail/detail/'.$id.'/'.$code); ?>";
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
                    'upload_path'   => "./uploads/children/contact_detail/",
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
            
            $update = $this->Children_model->update_contact_details($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('admin/children/contact_detail/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/children/contact_detail/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }
        
        // End of Contact detail
    }

?>