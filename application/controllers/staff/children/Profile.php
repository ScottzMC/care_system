<?php 
        
    class Profile extends CI_Controller{
        
        public function detail($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->Children_model->display_children_by_code($code);
                
                $data['medical'] = $this->Children_model->display_medical_report_by_code_limit($code);
                $data['education'] = $this->Children_model->display_personal_education_by_code_limit($code);
                $data['finance'] = $this->Children_model->display_finance_information_by_code_limit($code);
                $data['foster_care'] = $this->Children_model->display_foster_care_by_code_limit($code);
                
                $data['support_plan'] = $this->Children_model->display_support_plan_by_code_limit($code);
                $data['risk_assessment'] = $this->Children_model->display_risk_assessment_by_code_limit($code);
                $data['incidents'] = $this->Children_model->display_incident_by_code_limit($code);
                
                $data['absences'] = $this->Children_model->display_absences_by_code_limit($code);
                $data['sanction'] = $this->Children_model->display_sanction_rewards_by_code_limit($code);
                $data['abilities'] = $this->Children_model->display_abilities_evaluation_by_code_limit($code);
                
                $data['keywork_session'] = $this->Children_model->display_keywork_session_by_code($code);
                $data['health_safety'] = $this->Children_model->display_health_safety_by_code_limit($code);

                $data['case_recording'] = $this->Children_model->display_case_recording_by_code_limit($code);

                $data['count_incidents'] = $this->Children_model->count_incidents($code);
                $data['count_absences'] = $this->Children_model->count_absences($code);
                $data['count_sanction'] = $this->Children_model->count_children_sanction_rewards($code);
                

                $this->load->view('staff/children/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add(){
            $this->load->model('Children_model');
            
            $shuffle = str_shuffle("ABCDTUVXY");
            $unique = rand(000, 999);
            $code = $shuffle.$unique;
            
            $fullname = $this->input->post('fullname');
            $age = $this->input->post('age');
            $email = $this->input->post('email');
            $description = $this->input->post('description');
            $dob = $this->input->post('dob');
            $child_status = $this->input->post('child_status');
            $admission_date = $this->input->post('admission_date');
            $gender = $this->input->post('gender');
            $ethnic = $this->input->post('ethnic');
            $support_hours = $this->input->post('support_hours');
            $house_name = $this->input->post('house_name');
            $address = $this->input->post('address');
            
            $nin = $this->input->post('nin');
            
            $guardian_fullname = $this->input->post('guardian_fullname');
            $guardian_email = $this->input->post('guardian_email');
            $guardian_telephone = $this->input->post('guardian_telephone');
            $guardian_address = $this->input->post('guardian_address');
            $guardian = $this->input->post('guardian');
            $telephone = $this->input->post('telephone');
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
                    'upload_path'   => "./uploads/children/",
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
                'fullname' => $fullname,
                'email' => $email,
                'description' => $description,
                'age' => $age,
                'dob' => $dob,
                'child_status' => $child_status,
                'support_hours' => $support_hours,
                'admission_date' => $admission_date,
                'gender' => $gender,
                'ethnic' => $ethnic,
                'address' => $address,
                'telephone' => $telephone,
                'nin' => $nin,
                'guardian' => $guardian,
                'house_name' => $house_name,
                'image' => $fileName,
                'guardian_fullname' => $guardian_fullname,
                'guardian_email' => $guardian_email,
                'guardian_telephone' => $guardian_telephone,
                'guardian_address' => $guardian_address,
                'created_date' => $date
            );
            
            $add_array = array(
                'code' => $code,
                'created_date' => $date
            );
            
            $insert_children = $this->Children_model->insert_children($array);
            
            if($insert_children){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('staff/children/all'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/children/all'); ?>";
                </script> 
      <?php }
        }
        
        public function edit($code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Children_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['children'] = $this->Children_model->display_children_by_code($code);
                $data['house'] = $this->Children_model->display_all_property();

                $this->load->view('staff/children/edit', $data);
                
                if(isset($btn_submit)){
                    $fullname = $this->input->post('fullname');
                    $description = $this->input->post('description');
                    $age = $this->input->post('age');
                    $dob = $this->input->post('dob');
                    $child_status = $this->input->post('child_status');
                    $admission_date = $this->input->post('admission_date');
                    $exit_date = $this->input->post('exit_date');
                    $ethnic = $this->input->post('ethnic');
                    $support_hours = $this->input->post('support_hours');
                    $gender = $this->input->post('gender');
                    $house_name = $this->input->post('house_name');
                    $address = $this->input->post('address');
                    
                    $nin = $this->input->post('nin');
                    
                    $guardian_fullname = $this->input->post('guardian_fullname');
                    $guardian_email = $this->input->post('guardian_email');
                    $guardian_telephone = $this->input->post('guardian_telephone');
                    $guardian_address = $this->input->post('guardian_address');
                    $guardian = $this->input->post('guardian');
                    $telephone = $this->input->post('telephone');
        
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'fullname' => $fullname,
                        'description' => $description,
                        'age' => $age,
                        'dob' => $dob,
                        'child_status' => $child_status,
                        'support_hours' => $support_hours,
                        'admission_date' => $admission_date,
                        'exit_date' => $exit_date,
                        'ethnic' => $ethnic,
                        'gender' => $gender,
                        'address' => $address,
                        'telephone' => $telephone,
                        'guardian' => $guardian,
                        'house_name' => $house_name,
                        'nin' => $nin,
                        'guardian_fullname' => $guardian_fullname,
                        'guardian_email' => $guardian_email,
                        'guardian_telephone' => $guardian_telephone,
                        'guardian_address' => $guardian_address,
                        'created_date' => $date
                    );
                    
                    $update_children = $this->Children_model->update_children_by_code($code, $array);
                    
                    if($update_children){ ?>
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
        
        public function edit_image($code){
              $files = $_FILES;
              $cpt1 = count($_FILES['userFiles1']['name']);
              
              $this->load->model('Children_model');
    
              for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/children/",
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
                'image' => $fileName,
            ); 
            
            $update_image = $this->Children_model->update_children_image($code, $array);
            
            if($update_image){ ?>
                <script>
                    alert('Updated Successfully');
                    window.location.href="<?php echo site_url('staff/children/all'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/children/all'); ?>";
                </script> 
      <?php }
        }
        
        public function search(){
          $search_query = $this->input->post('search_query');
          
          $this->load->model('Children_model');
          
          $email = $this->session->userdata('uemail');
    
          $data["search"] = $this->Children_model->fetch_search_data($search_query);

          $this->load->view('staff/children/search', $data);
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           $this->load->model('Children_model');
           
           $this->Children_model->delete_children($id); 
        }
    }

?>