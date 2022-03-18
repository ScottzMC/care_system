<?php 
    
    class Risk_assessment extends CI_Controller{
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/risk_assessment/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add($house_code){
            $this->load->model('Risk_assessment_model');
            
            $session_role = $this->session->userdata('urole');
            
            $submit_btn = $this->input->post('add');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['house'] = $this->House_model->display_home($house_code);
                $data['code'] = $house_code;
                $data['children'] = $this->Risk_assessment_model->display_all_children();
                
                $house = $this->House_model->display_home($house_code);
                foreach($house as $hse){
                    $house = $hse->housename;
                }

                $this->load->view('staff/house/risk_assessment/add', $data);
                
                if(isset($submit_btn)){
            
                $code = $this->input->post('child_code');
                $title = $this->input->post('title');
                $criminal_risk_level = $this->input->post('criminal_risk_level');
                $criminal_level = $this->input->post('criminal_level');
                
                $violent_risk_level = $this->input->post('violent_risk_level');
                $violent_level = $this->input->post('violent_level');
    
                $weapon_risk_level = $this->input->post('weapon_risk_level');
                $weapon_level = $this->input->post('weapon_level');
    
                $behaviour_community_risk_level = $this->input->post('behaviour_community_risk_level');
                $behaviour_community_level = $this->input->post('behaviour_community_level');
    
                $bully_risk_level = $this->input->post('bully_risk_level');
                $bully_level = $this->input->post('bully_level');
    
                $discrimination_risk_level = $this->input->post('discrimination_risk_level');
                $discrimination_level = $this->input->post('discrimination_level');
    
                $damage_property_risk_level = $this->input->post('damage_property_risk_level');
                $damage_property_level = $this->input->post('damage_property_level');
    
                $arson_risk_level = $this->input->post('arson_risk_level');
                $arson_level = $this->input->post('arson_level');
    
                $missing_risk_level = $this->input->post('missing_risk_level');
                $missing_level = $this->input->post('missing_level');
    
                $missue_illegal_risk_level = $this->input->post('missue_illegal_risk_level');
                $missue_illegal_level = $this->input->post('missue_illegal_level');
    
                $self_harm_risk_level = $this->input->post('self_harm_risk_level');
                $self_harm_level = $this->input->post('self_harm_level');
    
                $sexual_risk_level = $this->input->post('sexual_risk_level');
                $sexual_level = $this->input->post('sexual_level');
    
                $medication_risk_level = $this->input->post('medication_risk_level');
                $medication_level = $this->input->post('medication_level');
    
                $family_risk_level = $this->input->post('family_risk_level');
                $family_level = $this->input->post('family_level');
    
                $allegation_risk_level = $this->input->post('allegation_risk_level');
                $allegation_level = $this->input->post('allegation_level');
    
                $travel_risk_level = $this->input->post('travel_risk_level');
                $travel_level = $this->input->post('travel_level');
                
                $additional_info = $this->input->post('additional_info');
                $time = time();
                $date = $this->input->post('created_date');
                
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
                    'criminal_risk_level' => $criminal_risk_level,
                    'criminal_level' => $criminal_level,
                    'violent_risk_level' => $violent_risk_level,
                    'violent_level' => $violent_level,
                    'weapon_risk_level' => $weapon_risk_level,
                    'weapon_level' => $weapon_level,
                    'behaviour_community_risk_level' => $behaviour_community_risk_level,
                    'behaviour_community_level' => $behaviour_community_level,
                    'bully_risk_level' => $bully_risk_level,
                    'bully_level' => $bully_level,
                    'discrimination_risk_level' => $discrimination_risk_level,
                    'discrimination_level' => $discrimination_level,
                    'damage_property_risk_level' => $damage_property_risk_level,
                    'damage_property_level' => $damage_property_level,
                    'arson_risk_level' => $arson_risk_level,
                    'arson_level' => $arson_level,
                    'missing_risk_level' => $missing_risk_level,
                    'missing_level' => $missing_level,
                    'missue_illegal_risk_level' => $missue_illegal_risk_level,
                    'missue_illegal_level' => $missue_illegal_level,
                    'self_harm_risk_level' => $self_harm_risk_level,
                    'self_harm_level' => $self_harm_level,
                    'sexual_risk_level' => $sexual_risk_level,
                    'sexual_level' => $sexual_level,
                    'medication_risk_level' => $medication_risk_level,
                    'medication_level' => $medication_level,
                    'family_risk_level' => $family_risk_level,
                    'family_level' => $family_level,
                    'allegation_risk_level' => $allegation_risk_level,
                    'allegation_level' => $allegation_level,
                    'travel_risk_level' => $travel_risk_level,
                    'travel_level' => $travel_level,
                    'additional_info' => $additional_info,
                    'created_time' => $time,
                    'created_date' => $date
                );
                
                $insert_risk_assessment = $this->Risk_assessment_model->insert_risk_assessment($array);
                
                if($insert_risk_assessment){ ?>
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
        
        public function edit_additional_info($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/additional_info', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $additional_info = $this->input->post('additional_info');
                    
                    $array = array(
                        'title' => $title,
                        'additional_info' => $additional_info
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function criminal_behaviour($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/criminal_behaviour', $data);
                
                if(isset($btn_submit)){
                    $criminal_risk_level = $this->input->post('criminal_risk_level');
                    $criminal_level = $this->input->post('criminal_level');
                    
                    $array = array(
                        'criminal_risk_level' => $criminal_risk_level,
                        'criminal_level' => $criminal_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function violent_other($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/violent_other', $data);
                
                if(isset($btn_submit)){
                    $violent_risk_level = $this->input->post('violent_risk_level');
                    $violent_level = $this->input->post('violent_level');
                    
                    $array = array(
                        'violent_risk_level' => $violent_risk_level,
                        'violent_level' => $violent_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function weapon($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/weapon', $data);
                
                if(isset($btn_submit)){
                    $weapon_risk_level = $this->input->post('weapon_risk_level');
                    $weapon_level = $this->input->post('weapon_level');
                    
                    $array = array(
                        'weapon_risk_level' => $weapon_risk_level,
                        'weapon_level' => $weapon_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function behaviour_community($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/behaviour_community', $data);
                
                if(isset($btn_submit)){
                    $behaviour_community_risk_level = $this->input->post('behaviour_community_risk_level');
                    $behaviour_community_level = $this->input->post('behaviour_community_level');
                    
                    $array = array(
                        'behaviour_community_risk_level' => $behaviour_community_risk_level,
                        'behaviour_community_level' => $behaviour_community_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function bully($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/bully', $data);
                
                if(isset($btn_submit)){
                    $bully_risk_level = $this->input->post('bully_risk_level');
                    $bully_level = $this->input->post('bully_level');
                    
                    $array = array(
                        'bully_risk_level' => $bully_risk_level,
                        'bully_level' => $bully_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function discrimination($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/discrimination', $data);
                
                if(isset($btn_submit)){
                    $discrimination_risk_level = $this->input->post('discrimination_risk_level');
                    $discrimination_level = $this->input->post('discrimination_level');
                    
                    $array = array(
                        'discrimination_risk_level' => $discrimination_risk_level,
                        'discrimination_level' => $discrimination_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function damage_property($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/damage_property', $data);
                
                if(isset($btn_submit)){
                    $damage_property_risk_level = $this->input->post('damage_property_risk_level');
                    $damage_property_level = $this->input->post('damage_property_level');
                    
                    $array = array(
                        'damage_property_risk_level' => $damage_property_risk_level,
                        'damage_property_level' => $damage_property_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function arson($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/arson', $data);
                
                if(isset($btn_submit)){
                    $arson_risk_level = $this->input->post('arson_risk_level');
                    $arson_level = $this->input->post('arson_level');
                    
                    $array = array(
                        'arson_risk_level' => $arson_risk_level,
                        'arson_level' => $arson_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function missing($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/missing', $data);
                
                if(isset($btn_submit)){
                    $missing_risk_level = $this->input->post('missing_risk_level');
                    $missing_level = $this->input->post('missing_level');
                    
                    $array = array(
                        'missing_risk_level' => $missing_risk_level,
                        'missing_level' => $missing_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function missue_illegal($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/missue_illegal', $data);
                
                if(isset($btn_submit)){
                    $missue_illegal_risk_level = $this->input->post('missue_illegal_risk_level');
                    $missue_illegal_level = $this->input->post('missue_illegal_level');
                    
                    $array = array(
                        'missue_illegal_risk_level' => $missue_illegal_risk_level,
                        'missue_illegal_level' => $missue_illegal_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function self_harm($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['children'] = $this->Risk_assessment_model->display_all_children();
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/self_harm', $data);
                
                if(isset($btn_submit)){
                    $self_harm_risk_level = $this->input->post('self_harm_risk_level');
                    $self_harm_level = $this->input->post('self_harm_level');
                    
                    $array = array(
                        'self_harm_risk_level' => $self_harm_risk_level,
                        'self_harm_level' => $self_harm_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function sexual($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/sexual', $data);
                
                if(isset($btn_submit)){
                    $sexual_risk_level = $this->input->post('sexual_risk_level');
                    $sexual_level = $this->input->post('sexual_level');
                    
                    $array = array(
                        'sexual_risk_level' => $sexual_risk_level,
                        'sexual_level' => $sexual_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function medication($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/medication', $data);
                
                if(isset($btn_submit)){
                    $medication_risk_level = $this->input->post('medication_risk_level');
                    $medication_level = $this->input->post('medication_level');
                    
                    $array = array(
                        'medication_risk_level' => $medication_risk_level,
                        'medication_level' => $medication_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function family($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/family', $data);
                
                if(isset($btn_submit)){
                    $family_risk_level = $this->input->post('family_risk_level');
                    $family_level = $this->input->post('family_level');
                    
                    $array = array(
                        'family_risk_level' => $family_risk_level,
                        'family_level' => $family_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function allegation($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/allegation', $data);
                
                if(isset($btn_submit)){
                    $allegation_risk_level = $this->input->post('allegation_risk_level');
                    $allegation_level = $this->input->post('allegation_level');
                    
                    $array = array(
                        'allegation_risk_level' => $allegation_risk_level,
                        'allegation_level' => $allegation_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function travel($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Risk_assessment_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['risk_assessment'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;

                $this->load->view('staff/house/risk_assessment/travel', $data);
                
                if(isset($btn_submit)){
                    $travel_risk_level = $this->input->post('travel_risk_level');
                    $travel_level = $this->input->post('travel_level');
                    
                    $array = array(
                        'travel_risk_level' => $travel_risk_level,
                        'travel_level' => $travel_level
                    );
                    
                    $update = $this->Risk_assessment_model->update_risk_assessment_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('staff/house/risk_assessment/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Risk_assessment_model');
           $this->Risk_assessment_model->delete_risk_assessment($id); 
        }
        
        public function send_mail($code){
          $email = $this->input->post('email');  
              
          $title = $this->input->post('title');
          $criminal_risk_level = $this->input->post('criminal_risk_level');
          $criminal_level = $this->input->post('criminal_level');
          
          $violent_risk_level = $this->input->post('violent_risk_level');
          $violent_level = $this->input->post('violent_level');

          $weapon_risk_level = $this->input->post('weapon_risk_level');   
          $weapon_level = $this->input->post('weapon_level');   

          $behaviour_community_risk_level = $this->input->post('behaviour_community_risk_level');   
          $behaviour_community_level = $this->input->post('behaviour_community_level');   

          $bully_risk_level = $this->input->post('bully_risk_level');   
          $bully_level = $this->input->post('bully_level');   

          $discrimination_risk_level = $this->input->post('discrimination_risk_level');   
          $discrimination_level = $this->input->post('discrimination_level');   

          $damage_property_risk_level = $this->input->post('damage_property_risk_level');   
          $damage_property_level = $this->input->post('damage_property_level');   

          $arson_risk_level = $this->input->post('arson_risk_level');   
          $arson_level = $this->input->post('arson_level');   

          $missing_risk_level = $this->input->post('missing_risk_level');   
          $missing_level = $this->input->post('missing_level');   

          $missue_illegal_risk_level = $this->input->post('missue_illegal_risk_level');   
          $missue_illegal_level = $this->input->post('missue_illegal_level');   

          $self_harm_risk_level = $this->input->post('self_harm_risk_level');   
          $self_harm_level = $this->input->post('self_harm_level');   

          $sexual_risk_level = $this->input->post('sexual_risk_level');   
          $sexual_level = $this->input->post('sexual_level');   

          $medication_risk_level = $this->input->post('medication_risk_level');   
          $medication_level = $this->input->post('medication_level');   

          $family_risk_level = $this->input->post('family_risk_level');   
          $family_level = $this->input->post('family_level');   

          $allegation_risk_level = $this->input->post('allegation_risk_level');   
          $allegation_level = $this->input->post('allegation_level');   

          $travel_risk_level = $this->input->post('travel_risk_level');   
          $travel_level = $this->input->post('travel_level');   

          $additional_info = $this->input->post('additional_info');   
          $date = $this->input->post('created_date');    

          $subject = "Risk Assessment";
          $body = "
            Please find below the information of the Risk Assessment - 
            Title - $title 
            Criminal/Offending Behaviour - $criminal_risk_level
            Criminal/Offending Behaviour Risk Level - $criminal_level
            
            Violent toward others  - $violent_risk_level 
            Violent toward others Risk Level - $violent_level 
            
            Use of weapons - $weapon_risk_level 
            Use of weapons Risk Level - $weapon_level 

            Behaviour in the community - $behaviour_community_risk_level 
            Behaviour in the community Risk Level - $behaviour_community_level 

            Bully - $bully_risk_level 
            Bully Risk Level - $bully_level 

            Discrimination - $discrimination_risk_level 
            Discrimination Risk Level - $discrimination_level 

            Damage to property - $damage_property_risk_level 
            Damage to property Risk Level - $damage_property_level 

            Arson - $arson_risk_level 
            Arson Risk Level - $arson_level 

            Going missing - $missing_risk_level 
            Going missing Risk Level - $missing_level 

            Misuse of illegal substances/alcohol/smoking - $missue_illegal_risk_level 
            Misuse of illegal substances/alcohol/smoking Risk Level - $missue_illegal_level 

            Emotional wellbeing & self-harm - $self_harm_risk_level 
            Emotional wellbeing & self-harm Risk Level - $self_harm_level 

            Sexual health - $sexual_risk_level 
            Sexual health Risk Level - $sexual_level 

            Health & Medication - $medication_risk_level 
            Health & Medication Risk Level - $medication_level 

            Family & Friend Contacts  - $family_risk_level 
            Family & Friend Contacts Risk Level - $family_level 
            
            Allegations - $allegation_risk_level 
            Allegations Risk Level - $allegation_level 

            Travel in vehicle - $travel_risk_level 
            Travel in vehicle Risk Level - $travel_level 

            Additional Information - $additional_info 
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
    
    }

?>