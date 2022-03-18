<?php 

    class Edt extends CI_Controller{
        
        // Edt
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->Children_model->display_all_children();
                $data['absences'] = $this->Children_model->display_absences_by_code($code);
                
                $this->load->view('staff/children/edt/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->Children_model->display_children_by_code($code);
                $data['absences'] = $this->Children_model->display_absences_by_id($id);
                
                $this->load->view('staff/children/edt/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add(){
            $btn_submit = $this->input->post('add');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
                
            if(isset($btn_submit)){
                $child_code = $this->input->post('child_code');
                $title = $this->input->post('title');
                $borough = $this->input->post('borough');
                $edt_number = $this->input->post('edt_number');
                $staff1 = $this->input->post('staff1');
                $staff2 = $this->input->post('staff2');
                $body = $this->input->post('body');
                $return_date = $this->input->post('return_date');
                $date = $this->input->post('created_date');
                
                $files = $_FILES;
                $cpt1 = count($_FILES['userFiles1']['name']);
        
                for($i=0; $i<$cpt1; $i++){
                    $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                    $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                    $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                    $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                    $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
        
                    $config1 = array(
                        'upload_path'   => "./uploads/absences/",
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
                
                $query = $this->db->query("SELECT fullname FROM children WHERE code = '$child_code' ")->result();
                foreach($query as $qry){
                    $child_name = $qry->fullname;
                }
                
                $array = array(
                    'code' => $child_code,
                    'child_name' => $child_name,
                    'title' => $title,
                    'borough' => $borough,
                    'body' => $body,
                    'edt_number' => $edt_number,
                    'staff1' => $staff1,
                    'staff2' => $staff2,
                    'return_date' => $return_date,
                    'document' => $fileName,
                    'created_date' => $date
                );
                
                $add = $this->Children_model->insert_absence($array);
                
                if($add){ ?>
                    <script>
                        alert('Added Successfully');
                        window.location.href="<?php echo site_url('staff/children/edt/view/'.$child_code); ?>";
                    </script>
              <?php }else{ ?>
                    <script>
                        alert('Failed');
                        window.location.href="<?php echo site_url('staff/children/edt/view/'.$child_code); ?>";
                    </script> 
              <?php }  
                }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->Children_model->display_all_children();
                $data['absences'] = $this->Children_model->display_absences_by_id($id);

                $this->load->view('staff/children/edt/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $body = $this->input->post('body');
                    $edt_number = $this->input->post('edt_number');
                    $staff1 = $this->input->post('staff1');
                    $staff2 = $this->input->post('staff2');
                    $return_date = $this->input->post('return_date');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'title' => $title,
                        'body' => $body,
                        'edt_number' => $edt_number,
                        'staff1' => $staff1,
                        'staff2' => $staff2,
                        'return_date' => $return_date,
                        'created_date' => $date
                    );
                    
                    $update = $this->Children_model->update_absence($id, $array);
                    
                    if($update){ 
                    //redirect($_SERVER['HTTP_REFERER']);
                    ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/children/profile/detail/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/children/profile/detail/'.$code); ?>";
                          </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
    
        public function send_mail(){
          $title = $this->input->post('title');
          $info = $this->input->post('body');
          $date = $this->input->post('created_date');
          
          $email = $this->input->post('email');

          $subject = "Edt";
          $body = "
            Please find below the information of the Edt - 
            Title - $title
            
            Summary - $info
            
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
            window.location.href="<?php echo site_url('staff/children/all'); ?>";
        </script> 
 <?php }
        
        public function delete(){
           $id = $this->input->post('del_id');
           $this->load->model('Children_model');
           
           $this->Children_model->delete_absence($id); 
        }
        
        public function download($id){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT document FROM children_absences WHERE id = '$id' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/absences/'.$qry->document;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        // End of Edt
    }

?>