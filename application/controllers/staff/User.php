<?php 
    
    class User extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');
            
            $data['users'] = $this->User_model->display_all_users();
            
            if(!empty($session_role) && $session_role == "Staff"){
                $this->load->view('staff/user/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function profile($id){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');
            
            $data['profile'] = $this->User_model->display_user_by_id($id);
            
            if(!empty($session_role) && $session_role == "Staff"){
                $this->load->view('staff/user/profile', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            if(!empty($session_role) && $session_role == "Staff"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
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
                    
                    $add_user = $this->User_model->insert_user($array);
                    
                    if($add_user){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('staff/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/user'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('user');    
            }
        }
        
        public function edit($id){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('User_model');

            $data['users'] = $this->User_model->display_user_by_id($id);
            
            if(!empty($session_role) && $session_role == "Staff"){
                
                $btn_submit = $this->input->post('edit');
                
                $this->load->view('staff/user/edit', $data);
                
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
                            window.location.href="<?php echo site_url('staff/user'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Update Failed');
                            window.location.href="<?php echo site_url('staff/user'); ?>";
                        </script>
                <?php }
                }
                
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_image($id){
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
                    window.location.href="<?php echo site_url('staff/user'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/user'); ?>";
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

          $this->load->view('staff/user/search', $data);
        }

    }

?>