<?php
    
    class Health_safety extends CI_Controller{
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['health_safety'] = $this->House_model->display_all_health_safety($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('admin/house/health_safety/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Health_safety_model->display_health_safety_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/health_safety/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add($house_code){
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            $session_role = $this->session->userdata('urole');
            
            $submit = $this->input->post('add');
            
            $house = $this->House_model->display_home($house_code);
            foreach($house as $hse){
                $house = $hse->housename;
            }
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($house_code);
                $data['children'] = $this->Health_safety_model->display_all_children();
                $data['code'] = $house_code;
                
                $this->load->view('admin/house/health_safety/add', $data);
                
                if(isset($submit)){
                    $code = $this->input->post('child_code');
                    $title = $this->input->post('title');
                    $additional_info = $this->input->post('additional_info');
                    $room_number = $this->input->post('room_number');
                    $staff_initial = $this->input->post('staff_initial');
                    $due_date = $this->input->post('due_date');
                    $date = $this->input->post('created_date');
                    
                    $query = $this->db->query("SELECT fullname FROM children WHERE code = '$code' ")->result();
                    foreach($query as $qry){
                        $child_name = $qry->fullname;
                    }
                    
                    $house = $this->House_model->display_home($house_code);
                    foreach($house as $hse){
                        $house = $hse->housename;
                    }
                    
                    $files = $_FILES;
                    
                    $cpt1 = count($_FILES['userFiles1']['name']);
                    $cpt2 = count($_FILES['userFiles2']['name']);
                    $cpt3 = count($_FILES['userFiles3']['name']);
                    $cpt4 = count($_FILES['userFiles4']['name']);
                    $cpt5 = count($_FILES['userFiles5']['name']);
                    $cptd = count($_FILES['userDocument']['name']);
        
                    for($i=0; $i<$cpt1; $i++){
                        $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                        $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                        $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                        $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                        $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles1');
                        $fileName = str_replace(' ', '_', $_FILES['userFiles1']['name']);
                    }
                    
                    for($i=0; $i<$cpt2; $i++){
                        $_FILES['userFiles2']['name']= $files['userFiles2']['name'][$i];
                        $_FILES['userFiles2']['type']= $files['userFiles2']['type'][$i];
                        $_FILES['userFiles2']['tmp_name']= $files['userFiles2']['tmp_name'][$i];
                        $_FILES['userFiles2']['error']= $files['userFiles2']['error'][$i];
                        $_FILES['userFiles2']['size']= $files['userFiles2']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles2');
                        $fileName2 = str_replace(' ', '_', $_FILES['userFiles2']['name']);
                    }
                    
                    for($i=0; $i<$cpt3; $i++){
                        $_FILES['userFiles3']['name']= $files['userFiles3']['name'][$i];
                        $_FILES['userFiles3']['type']= $files['userFiles3']['type'][$i];
                        $_FILES['userFiles3']['tmp_name']= $files['userFiles3']['tmp_name'][$i];
                        $_FILES['userFiles3']['error']= $files['userFiles3']['error'][$i];
                        $_FILES['userFiles3']['size']= $files['userFiles3']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles3');
                        $fileName3 = str_replace(' ', '_', $_FILES['userFiles3']['name']);
                    }
                    
                    for($i=0; $i<$cpt4; $i++){
                        $_FILES['userFiles4']['name']= $files['userFiles4']['name'][$i];
                        $_FILES['userFiles4']['type']= $files['userFiles4']['type'][$i];
                        $_FILES['userFiles4']['tmp_name']= $files['userFiles4']['tmp_name'][$i];
                        $_FILES['userFiles4']['error']= $files['userFiles4']['error'][$i];
                        $_FILES['userFiles4']['size']= $files['userFiles4']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles4');
                        $fileName4 = str_replace(' ', '_', $_FILES['userFiles4']['name']);
                    }
                    
                    for($i=0; $i<$cpt5; $i++){
                        $_FILES['userFiles5']['name']= $files['userFiles5']['name'][$i];
                        $_FILES['userFiles5']['type']= $files['userFiles5']['type'][$i];
                        $_FILES['userFiles5']['tmp_name']= $files['userFiles5']['tmp_name'][$i];
                        $_FILES['userFiles5']['error']= $files['userFiles5']['error'][$i];
                        $_FILES['userFiles5']['size']= $files['userFiles5']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles5');
                        $fileName5 = str_replace(' ', '_', $_FILES['userFiles5']['name']);
                    }
                    
                    for($i=0; $i<$cptd; $i++){
                        $_FILES['userDocument']['name']= $files['userDocument']['name'][$i];
                        $_FILES['userDocument']['type']= $files['userDocument']['type'][$i];
                        $_FILES['userDocument']['tmp_name']= $files['userDocument']['tmp_name'][$i];
                        $_FILES['userDocument']['error']= $files['userDocument']['error'][$i];
                        $_FILES['userDocument']['size']= $files['userDocument']['size'][$i];
            
                        $configd = array(
                            'upload_path'   => "./uploads/health_safety/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "pdf|docx|doc",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $configd);
                        $this->upload->initialize($configd);
            
                        $this->upload->do_upload('userDocument');
                        $fileDocument = str_replace(' ', '_', $_FILES['userDocument']['name']);
                    }
                    
                    $array = array(
                        'code' => $code,
                        'child_name' => $child_name,
                        'house_code' => $house_code,
                        'house_name' => $house,
                        //'title' => $title,
                        'additional_info' => $additional_info,
                        'room_number' => $room_number,
                        'staff_initial' => $staff_initial,
                        'due_date' => $due_date,
                        'image1' => $fileName,
                        'image2' => $fileName2, 
                        'image3' => $fileName3, 
                        'image4' => $fileName4, 
                        'image5' => $fileName5, 
                        //'document' => $fileDocument,
                        'created_date' => $date
                    );
                    
                    $insert = $this->Health_safety_model->insert_health_safety($array);
                    
                    if($insert){ ?>
                        <script>
                            alert('Added Successfully');
                            window.location.href="<?php echo site_url('admin/house/health_safety/view/'.$house_code); ?>";
                        </script>
              <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/health_safety/view/'.$house_code); ?>";
                        </script> 
              <?php }
                }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Health_safety_model->display_children_by_code($code);
                $data['health_safety'] = $this->Health_safety_model->display_health_safety_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('admin/house/health_safety/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $additional_info = $this->input->post('additional_info');
                    $room_number = $this->input->post('room_number');
                    $staff_initial = $this->input->post('staff_initial');
                    $due_date = $this->input->post('due_date');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        //'title' => $title,
                        'additional_info' => $additional_info,
                        'room_number' => $room_number,
                        'staff_initial' => $staff_initial,
                        'due_date' => $due_date,
                        'created_date' => $date
                    );
                    
                    $update = $this->Health_safety_model->update_health_safety_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/health_safety/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit_image1($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Health_safety_model->display_children_by_code($code);
                $data['health_safety'] = $this->Health_safety_model->display_health_safety_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/health_safety/image1', $data);
                
                if(isset($btn_submit)){
                    $files = $_FILES;
            
                    $cpt1 = count($_FILES['userFiles1']['name']);
        
                    for($i=0; $i<$cpt1; $i++){
                        $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                        $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                        $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                        $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                        $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles1');
                        $fileName = str_replace(' ', '_', $_FILES['userFiles1']['name']);
                    }
                    
                    $array = array('image1' => $fileName);
                    
                    $update = $this->Health_safety_model->update_health_safety_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit_image2($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Health_safety_model->display_children_by_code($code);
                $data['health_safety'] = $this->Health_safety_model->display_health_safety_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/health_safety/image2', $data);
                
                if(isset($btn_submit)){
                    $files = $_FILES;
                    $cpt1 = count($_FILES['userFiles2']['name']);
        
                    for($i=0; $i<$cpt1; $i++){
                        $_FILES['userFiles2']['name']= $files['userFiles2']['name'][$i];
                        $_FILES['userFiles2']['type']= $files['userFiles2']['type'][$i];
                        $_FILES['userFiles2']['tmp_name']= $files['userFiles2']['tmp_name'][$i];
                        $_FILES['userFiles2']['error']= $files['userFiles2']['error'][$i];
                        $_FILES['userFiles2']['size']= $files['userFiles2']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles2');
                        $fileName = str_replace(' ', '_', $_FILES['userFiles2']['name']);
                    }
                    
                    $array = array('image2' => $fileName);
                    
                    $update = $this->Health_safety_model->update_health_safety_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit_image3($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Health_safety_model->display_children_by_code($code);
                $data['health_safety'] = $this->Health_safety_model->display_health_safety_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/health_safety/image3', $data);
                
                if(isset($btn_submit)){
                    $files = $_FILES;
                    $cpt1 = count($_FILES['userFiles3']['name']);
        
                    for($i=0; $i<$cpt1; $i++){
                        $_FILES['userFiles3']['name']= $files['userFiles3']['name'][$i];
                        $_FILES['userFiles3']['type']= $files['userFiles3']['type'][$i];
                        $_FILES['userFiles3']['tmp_name']= $files['userFiles3']['tmp_name'][$i];
                        $_FILES['userFiles3']['error']= $files['userFiles3']['error'][$i];
                        $_FILES['userFiles3']['size']= $files['userFiles3']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles3');
                        $fileName = str_replace(' ', '_', $_FILES['userFiles3']['name']);
                    }
                    
                    $array = array('image3' => $fileName);
                    
                    $update = $this->Health_safety_model->update_health_safety_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit_image4($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Health_safety_model->display_children_by_code($code);
                $data['health_safety'] = $this->Health_safety_model->display_health_safety_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/health_safety/image4', $data);
                
                if(isset($btn_submit)){
                    $files = $_FILES;
                    $cpt1 = count($_FILES['userFiles4']['name']);
        
                    for($i=0; $i<$cpt1; $i++){
                        $_FILES['userFiles4']['name']= $files['userFiles4']['name'][$i];
                        $_FILES['userFiles4']['type']= $files['userFiles4']['type'][$i];
                        $_FILES['userFiles4']['tmp_name']= $files['userFiles4']['tmp_name'][$i];
                        $_FILES['userFiles4']['error']= $files['userFiles4']['error'][$i];
                        $_FILES['userFiles4']['size']= $files['userFiles4']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles4');
                        $fileName = str_replace(' ', '_', $_FILES['userFiles4']['name']);
                    }
                    
                    $array = array('image4' => $fileName);
                    
                    $update = $this->Health_safety_model->update_health_safety_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function edit_image5($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Health_safety_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['children'] = $this->Health_safety_model->display_children_by_code($code);
                $data['health_safety'] = $this->Health_safety_model->display_health_safety_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/health_safety/image5', $data);
                
                if(isset($btn_submit)){
                    $files = $_FILES;
                    $cpt1 = count($_FILES['userFiles5']['name']);
        
                    for($i=0; $i<$cpt1; $i++){
                        $_FILES['userFiles5']['name']= $files['userFiles5']['name'][$i];
                        $_FILES['userFiles5']['type']= $files['userFiles5']['type'][$i];
                        $_FILES['userFiles5']['tmp_name']= $files['userFiles5']['tmp_name'][$i];
                        $_FILES['userFiles5']['error']= $files['userFiles5']['error'][$i];
                        $_FILES['userFiles5']['size']= $files['userFiles5']['size'][$i];
            
                        $config = array(
                            'upload_path'   => "./uploads/health_safety/",
                            'allowed_types' => "png|jpg|jpeg",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
            
                        $this->upload->do_upload('userFiles5');
                        $fileName = str_replace(' ', '_', $_FILES['userFiles5']['name']);
                    }
                    
                    $array = array('image5' => $fileName);
                    
                    $update = $this->Health_safety_model->update_health_safety_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Health_safety_model');
           $this->Health_safety_model->delete_health_safety($id); 
        }
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Health & Safety";
          $body = "Please find below attached the Health & Safety document";

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
         
         $this->load->model('Health_safety_model');
         $data['detail'] = $this->Health_safety_model->display_health_safety_by_id($id);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/health_safety/'.$pdf);

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
            window.location.href="<?php echo site_url('admin/house/health_safety/view/'.$code); ?>";
        </script> 
 <?php }
 
        public function edit_document($id, $code){
            
            $this->load->model('Health_safety_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/health_safety/",
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
            
            $update = $this->Health_safety_model->update_health_safety_details($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/house/health_safety/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }
 
        public function download($id){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT document FROM health_safety WHERE id = '$id' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/health_safety/'.$qry->document;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
    }

?>