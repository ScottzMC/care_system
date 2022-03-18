<?php 
    
    class User extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');
            
            $data['users'] = $this->User_model->display_all_users();
            
            if(!empty($session_role) && $session_role == "Admin"){
                $this->load->view('admin/user/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function profile($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');
            
            $data['profile'] = $this->User_model->display_user_by_id($id);
            $data['file'] = $this->User_model->display_staff_files($code);
            
            if(!empty($session_role) && $session_role == "Admin"){
                $this->load->view('admin/user/profile', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    $shuffle = "ABCDEFGHZXCQWE";
                    $unique = rand(000, 999);
                    $code = $shuffle.$unique;
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $password = $this->input->post('password');
                    $email = $this->input->post('email');
                    $hashed_password = $this->bcrypt->hash_password($password);
                    $role = $this->input->post('role');
                    $telephone = $this->input->post('telephone');
                    $address1 = $this->input->post('address1');
                    $address2 = $this->input->post('address2');
                    $postcode = $this->input->post('postcode');
                    $city = $this->input->post('city');
                    $state = $this->input->post('state');
                    
                    $time = time();
                    $date = date('Y-m-d H:i:s');
                    
                    $files = $_FILES;
                      $cpt1 = count($_FILES['userFiles1']['name']);

                      for($i=0; $i<$cpt1; $i++){
                        $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                        $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                        $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                        $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                        $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/profile/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png",
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
                        'code' => $code,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'email' => $email,
                        'password' => $hashed_password,
                        'role' => $role,
                        'telephone' => $telephone,
                        'address1' => $address1,
                        'address2' => $address2,
                        'postcode' => $postcode,
                        'city' => $city,
                        'state' => $state,
                        'photo' => $fileName,
                        'created_time' => $time,
                        'created_date' => $date
                    );
                    
                    $staff_array = array('code' => $code);
                    
                    $add_user = $this->User_model->insert_user($array);
                    
                    $add_staff = $this->User_model->insert_staff_file($staff_array);
                    
                    if($add_user && $add_staff){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/user');    
            }
        }
        
        public function form_id($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cpt1 = count($_FILES['userPassport']['name']);
                      $cptd = count($_FILES['userDriving']['name']);
                      
                      for($i=0; $i<$cpt1; $i++){
                        $_FILES['userPassport']['name']= $files['userPassport']['name'][$i];
                        $_FILES['userPassport']['type']= $files['userPassport']['type'][$i];
                        $_FILES['userPassport']['tmp_name']= $files['userPassport']['tmp_name'][$i];
                        $_FILES['userPassport']['error']= $files['userPassport']['error'][$i];
                        $_FILES['userPassport']['size']= $files['userPassport']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/qualification/id/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userPassport');
                        $filePassport = str_replace(' ', '_', $_FILES['userPassport']['name']);
                      }
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userDriving']['name']= $files['userDriving']['name'][$i];
                        $_FILES['userDriving']['type']= $files['userDriving']['type'][$i];
                        $_FILES['userDriving']['tmp_name']= $files['userDriving']['tmp_name'][$i];
                        $_FILES['userDriving']['error']= $files['userDriving']['error'][$i];
                        $_FILES['userDriving']['size']= $files['userDriving']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/qualification/id/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userDriving');
                        $fileDriving = str_replace(' ', '_', $_FILES['userDriving']['name']);
                      }
                    
                    $array = array(
                        'passport' => $filePassport,
                        'driving_license' => $fileDriving
                    );
                    
                    $form_id = $this->User_model->update_staff_form($code, $array);
                    
                    if($form_id){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/user');    
            }
        }
        
        public function form_nin($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $nin = $this->input->post('nin');
                    
                    $array = array(
                        'nin' => $nin,
                    );
                    
                    $form_nin = $this->User_model->update_staff_form($code, $array);
                    
                    if($form_nin){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/user');    
            }
        }
        
        public function form_reference($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $reference1 = $this->input->post('reference1');
                    $reference2 = $this->input->post('reference2');
                    
                    $array = array(
                        'reference1' => $reference1,
                        'reference2' => $reference2
                    );
                    
                    $form_reference = $this->User_model->update_staff_form($code, $array);
                    
                    if($form_reference){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/user');    
            }
        }
        
        public function form_address($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cpt1 = count($_FILES['userAddress1']['name']);
                      $cptd = count($_FILES['userAddress2']['name']);
                      
                      for($i=0; $i<$cpt1; $i++){
                        $_FILES['userAddress1']['name']= $files['userAddress1']['name'][$i];
                        $_FILES['userAddress1']['type']= $files['userAddress1']['type'][$i];
                        $_FILES['userAddress1']['tmp_name']= $files['userAddress1']['tmp_name'][$i];
                        $_FILES['userAddress1']['error']= $files['userAddress1']['error'][$i];
                        $_FILES['userAddress1']['size']= $files['userAddress1']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/qualification/address/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userAddress1');
                        $fileAddress1 = str_replace(' ', '_', $_FILES['userAddress1']['name']);
                      }
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userAddress2']['name']= $files['userAddress2']['name'][$i];
                        $_FILES['userAddress2']['type']= $files['userAddress2']['type'][$i];
                        $_FILES['userAddress2']['tmp_name']= $files['userAddress2']['tmp_name'][$i];
                        $_FILES['userAddress2']['error']= $files['userAddress2']['error'][$i];
                        $_FILES['userAddress2']['size']= $files['userAddress2']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/qualification/address/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userAddress2');
                        $fileAddress2 = str_replace(' ', '_', $_FILES['userAddress2']['name']);
                      }
                    
                    $array = array(
                        'address1' => $fileAddress1,
                        'address2' => $fileAddress2
                    );
                    
                    $form_address = $this->User_model->update_staff_form($code, $array);
                    
                    if($form_address){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/user');    
            }
        }
        
        public function form_dbs($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userDbs']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userDbs']['name']= $files['userDbs']['name'][$i];
                        $_FILES['userDbs']['type']= $files['userDbs']['type'][$i];
                        $_FILES['userDbs']['tmp_name']= $files['userDbs']['tmp_name'][$i];
                        $_FILES['userDbs']['error']= $files['userDbs']['error'][$i];
                        $_FILES['userDbs']['size']= $files['userDbs']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/qualification/dbs/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userDbs');
                        $fileDbs = str_replace(' ', '_', $_FILES['userDbs']['name']);
                      }
                    
                    $array = array(
                        'dbs_certificate' => $fileDbs,
                    );
                    
                    $form_dbs = $this->User_model->update_staff_form($code, $array);
                    
                    if($form_dbs){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/user');    
            }
        }
        
        public function form_proof($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userProof']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userProof']['name']= $files['userProof']['name'][$i];
                        $_FILES['userProof']['type']= $files['userProof']['type'][$i];
                        $_FILES['userProof']['tmp_name']= $files['userProof']['tmp_name'][$i];
                        $_FILES['userProof']['error']= $files['userProof']['error'][$i];
                        $_FILES['userProof']['size']= $files['userProof']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/qualification/proof/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userProof');
                        $fileProof = str_replace(' ', '_', $_FILES['userProof']['name']);
                      }
                    
                    $array = array(
                        'qualification' => $fileProof,
                    );
                    
                    $form_dbs = $this->User_model->update_staff_form($code, $array);
                    
                    if($form_dbs){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/user');    
            }
        }
        
        public function edit($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            $data['users'] = $this->User_model->display_user_by_id($id);
            $data['file'] = $this->User_model->display_file_by_id($id);
            
            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('edit');
                
                $this->load->view('admin/user/edit', $data);
                
                if(isset($btn_submit)){
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $role = $this->input->post('role');
                    $telephone = $this->input->post('telephone');
                    $address1 = $this->input->post('address1');
                    $address2 = $this->input->post('address2');
                    $postcode = $this->input->post('postcode');
                    $city = $this->input->post('city');
                    $state = $this->input->post('state');
                    
                    $array = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'role' => $role,
                        'telephone' => $telephone,
                        'address1' => $address1,
                        'address2' => $address2,
                        'postcode' => $postcode,
                        'city' => $city,
                        'state' => $state
                    );
                    
                    $update_user = $this->User_model->update_user_details($id, $array);
                    
                    if($update_user){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Update Failed');
                            window.location.href="<?php echo site_url('admin/user'); ?>";
                        </script>
                <?php }
                }
                
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit_image($id, $code){
              $this->load->model('User_model');

              $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);
    
              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/profile/",
                    'allowed_types' => "jpg|png",
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
            
            $update_image = $this->User_model->update_image($id, $fileName);
            
            if($update_image){ ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('admin/user'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/user'); ?>";
                </script> 
      <?php }
        }
        
        public function delete(){
           $this->load->model('User_model');
    
           $id = $this->input->post('del_id');
           $this->User_model->delete_user($id); 
        }
        
        public function search(){
          $search_query = $this->input->post('search_query');
          
          $this->load->model('User_model');
          
          $email = $this->session->userdata('uemail');
    
          $data["search"] = $this->User_model->fetch_search_data($search_query);

          $this->load->view('admin/user/search', $data);
        }
        
        public function download($id){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT document FROM users WHERE id = '$id' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/profile/'.$qry->document;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_passport($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT passport FROM staff_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/qualification/id/'.$qry->passport;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_driving($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT driving_license FROM staff_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/qualification/id/'.$qry->driving_license;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_address1($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT address1 FROM staff_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/qualification/address/'.$qry->address1;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_address2($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT address2 FROM staff_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/qualification/address/'.$qry->address2;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_dbs($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT dbs_certificate FROM staff_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/qualification/dbs/'.$qry->dbs_certificate;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_proof($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT qualification FROM staff_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/qualification/proof/'.$qry->qualification;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }

    }

?>