<?php

    class Keywork_session extends CI_Controller{
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add($code){
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');

            $session_role = $this->session->userdata('urole');
            
            $submit_btn = $this->input->post('add');
            
            $house = $this->House_model->display_home($code);
            foreach($house as $hse){
                $house = $hse->housename;
            }
            
            if(!empty($session_role) && $session_role == "Staff"){
            $data['house'] = $this->House_model->display_home($code);
            $data['code'] = $code;
            $data['children'] = $this->Keywork_session_model->display_all_children();
            $data['independent_living'] = $this->Keywork_session_model->display_independent_living();

            $this->load->view('staff/house/keywork_session/add', $data);
            
            if(isset($submit_btn)){
            
            $child_code = $this->input->post('child_code');
            $date_title = $this->input->post('date_title');
            $title = $this->input->post('title');
            $summary = $this->input->post('summary');
            $independent_living = $this->input->post('independent_living');
            $imp_independent_living = implode(',', $independent_living);
            $staff_initial = $this->input->post('staff_initial');
            $hours_spent = $this->input->post('hours_spent');
            $length_time = $this->input->post('length_time');
            $date = $this->input->post('created_date');
            
            $files = $_FILES;
            
            $cpt1 = count($_FILES['userFiles1']['name']);
            $cpt2 = count($_FILES['userFiles2']['name']);
            $cpt3 = count($_FILES['userFiles3']['name']);
            $cpt4 = count($_FILES['userFiles4']['name']);
            $cpt5 = count($_FILES['userFiles5']['name']);

            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config = array(
                    'upload_path'   => "./uploads/keywork_session/",
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
                    'upload_path'   => "./uploads/keywork_session/",
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
                    'upload_path'   => "./uploads/keywork_session/",
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
                    'upload_path'   => "./uploads/keywork_session/",
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
                    'upload_path'   => "./uploads/keywork_session/",
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
            
            $query = $this->db->query("SELECT fullname FROM children WHERE code = '$child_code' ")->result();
            foreach($query as $qry){
                $child_name = $qry->fullname;
            }
            
            $array = array(
                'house_code' => $code,
                'house' => $house,
                'code' => $child_code,
                'child_name' => $child_name,
                'date_title' => $date_title,
                'title' => $title,
                'summary' => $summary,
                'independent_living' => $imp_independent_living,
                'staff_initial' => $staff_initial,
                'hours_spent' => $hours_spent,
                'length_time' => $length_time,
                'image1' => $fileName,
                'image2' => $fileName2, 
                'image3' => $fileName3, 
                'image4' => $fileName4, 
                'image5' => $fileName5, 
                'created_date' => $date
            );
            
            $insert = $this->Keywork_session_model->insert_keywork_session($array);
            
            if($insert){ ?>
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
          }else{
            redirect('staff/account/login');    
          }
        }
        
        public function independent_living($code){
            $this->load->model('Keywork_session_model');
            
            $data['house'] = $this->House_model->display_home($code);
            $data['code'] = $code;
            
            $title = $this->input->post('title');
            
            $array = array('title' => $title);
            
            $insert_independent_living = $this->Keywork_session_model->insert_independent_living($array);
            
            if($insert_independent_living){ ?>
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
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff'] = $this->Keywork_session_model->display_all_staff();
                $data['children'] = $this->Keywork_session_model->display_all_children();
                $data['keywork_session'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
                $data['independent_living'] = $this->Keywork_session_model->display_independent_living();
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/edit', $data);
                
                if(isset($btn_submit)){
                    $date_title = $this->input->post('date_title');
                    $title = $this->input->post('title');
                    $summary = $this->input->post('summary');
                    $independent_living = $this->input->post('independent_living');
                    $imp_independent_living = implode(',', $independent_living);
                    $staff_initial = $this->input->post('staff_initial');
                    $hours_spent = $this->input->post('hours_spent');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'date_title' => $date_title,
                        'title' => $title,
                        'summary' => $summary,
                        'independent_living' => $imp_independent_living,
                        'staff_initial' => $staff_initial,
                        'hours_spent' => $hours_spent,
                        'created_date' => $date
                    );
                    
                    $update = $this->Keywork_session_model->update_keywork_session_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_independent_living($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['independent_living'] = $this->Keywork_session_model->display_independent_living_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/independent_living', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    
                    $array = array(
                        'title' => $title
                    );
                    
                    $update_independent_living = $this->Keywork_session_model->update_independent_living($id, $array);
                    
                    if($update_independent_living){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_image1($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff'] = $this->Keywork_session_model->display_all_staff();
                $data['children'] = $this->Keywork_session_model->display_children_by_code($code);
                $data['keywork_session'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/image1', $data);
                
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
                            'upload_path'   => "./uploads/keywork_session/",
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
                    
                    $update = $this->Keywork_session_model->update_keywork_session_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_image2($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff'] = $this->Keywork_session_model->display_all_staff();
                $data['children'] = $this->Keywork_session_model->display_children_by_code($code);
                $data['keywork_session'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/image2', $data);
                
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
                            'upload_path'   => "./uploads/keywork_session/",
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
                    
                    $update = $this->Keywork_session_model->update_keywork_session_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_image3($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff'] = $this->Keywork_session_model->display_all_staff();
                $data['children'] = $this->Keywork_session_model->display_children_by_code($code);
                $data['keywork_session'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/image3', $data);
                
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
                            'upload_path'   => "./uploads/keywork_session/",
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
                    
                    $update = $this->Keywork_session_model->update_keywork_session_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_image4($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff'] = $this->Keywork_session_model->display_all_staff();
                $data['children'] = $this->Keywork_session_model->display_children_by_code($code);
                $data['keywork_session'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/image4', $data);
                
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
                            'upload_path'   => "./uploads/keywork_session/",
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
                    
                    $update = $this->Keywork_session_model->update_keywork_session_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function edit_image5($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Keywork_session_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff'] = $this->Keywork_session_model->display_all_staff();
                $data['children'] = $this->Keywork_session_model->display_children_by_code($code);
                $data['keywork_session'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/keywork_session/image5', $data);
                
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
                            'upload_path'   => "./uploads/keywork_session/",
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
                    
                    $update = $this->Keywork_session_model->update_keywork_session_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/house/keywork_session/detail/'.$id.'/'.$code); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Keywork_session_model');
           $this->Keywork_session_model->delete_keywork_session($id); 
        }
        
        public function send_mail($code){
          $email = $this->input->post('email');    
            
          $title = $this->input->post('title');
          $summary = $this->input->post('summary');
          $staff_initial = $this->input->post('staff_initial');
          $hours_spent = $this->input->post('hours_spent');
          $length_time = $this->input->post('length_time');
          $date = $this->input->post('created_date');

          $subject = "Keywork Session";
          $body = "
            Please find below the information of the Keywork Session - 
            Title - $title
            
            Comments and further actions - $summary
            
            Staff Initial  - $staff_initial 
            
            Hours to be spent weekly  - $hours_spent 
            
            Length of time spent  - $length_time 

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
            window.location.href="<?php echo site_url('staff/house/all/unit/'.$code); ?>";
        </script> 
 <?php }
        
        public function download($id){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT document FROM children_keywork_session WHERE id = '$id' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/keywork_session/'.$qry->document;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
    }

?>