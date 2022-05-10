<?php
    
    class Reporting extends CI_Controller{
        
        public function view($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['house'] = $this->House_model->display_home($code);
                $data['reporting'] = $this->House_model->display_all_reporting($code);
                $data['children'] = $this->House_model->display_all_children();
                $data['code'] = $code;

                $this->load->view('admin/house/reporting/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add($house_code){
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            $session_role = $this->session->userdata('urole');
            
            $submit_btn = $this->input->post('add');
            
            $house = $this->House_model->display_home($house_code);
            foreach($house as $hse){
                $house = $hse->housename;
            }
            
            if(!empty($session_role) && $session_role == "Admin"){
            $data['house'] = $this->House_model->display_home($house_code);
            $data['code'] = $house_code;
            $data['children'] = $this->Reporting_model->display_all_children();
            $data['staff'] = $this->Reporting_model->display_all_staff();
            $data['keywork_session'] = $this->Reporting_model->display_all_keywork_session();

            $this->load->view('admin/house/reporting/add', $data);
            
            if(isset($submit_btn)){
            
            $code = $this->input->post('child_code');
            $title = $this->input->post('title');
            $summary = $this->input->post('summary');
            $area_of_risk = $this->input->post('area_of_risk');
            $keywork_session = $this->input->post('keywork_session');
            $self_care = $this->input->post('self_care');
            $education = $this->input->post('education');
            $independent_skills = $this->input->post('independent_skills');
            $family = $this->input->post('family');
            $missing = $this->input->post('missing');
            $area_of_progress = $this->input->post('area_of_progress');
            $staff = $this->input->post('staff');
            $social_worker = $this->input->post('social_worker');
            $duration = $this->input->post('duration');
            $date = $this->input->post('created_date');
            
            $query = $this->db->query("SELECT fullname FROM children WHERE code = '$code' ")->result();
            foreach($query as $qry){
                $child_name = $qry->fullname;
            }
            
            $sequel = $this->db->query("SELECT summary FROM children_keywork_session WHERE id = '$keywork_session' ")->result();
            foreach($sequel as $sql){
                $keywork_summary = $sql->summary;
            }
            
            $array = array(
                'code' => $code,
                'child_name' => $child_name,
                'house_code' => $house_code,
                'keywork_session_id' => $keywork_session,
                'house' => $house,
                //'title' => $title,
                'summary' => $summary,
                'area_of_risk' => $area_of_risk,
                'keywork_session' => $keywork_summary,
                'self_care' => $self_care,
                'education' => $education,
                'independent_skills' => $independent_skills,
                'family' => $family,
                'missing' => $missing,
                'area_of_progress' => $area_of_progress,
                'staff' => $staff,
                'social_worker' => $social_worker,
                'duration' => $duration,
                'created_date' => $date
            );
            
            $insert = $this->Reporting_model->insert_reporting($array);
            
            if($insert){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/house/reporting/view/'.$house_code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/house/reporting/view/'.$house_code); ?>";
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
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['staff'] = $this->Reporting_model->display_all_staff();
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $summary = $this->input->post('summary');
                    $area_of_risk = $this->input->post('area_of_risk');
                    $self_care = $this->input->post('self_care');
                    $education = $this->input->post('education');
                    $independent_skills = $this->input->post('independent_skills');
                    $family = $this->input->post('family');
                    $missing = $this->input->post('missing');
                    $area_of_progress = $this->input->post('area_of_progress');
                    $staff = $this->input->post('staff');
                    $social_worker = $this->input->post('social_worker');
                    $duration = $this->input->post('duration');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        //'title' => $title,
                        'summary' => $summary,
                        'area_of_risk' => $area_of_risk,
                        'self_care' => $self_care,
                        'education' => $education,
                        'independent_skills' => $independent_skills,
                        'family' => $family,
                        'missing' => $missing,
                        'area_of_progress' => $area_of_progress,
                        'staff' => $staff,
                        'social_worker' => $social_worker,
                        'duration' => $duration
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function summary($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/summary', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $summary = $this->input->post('summary');
                    
                    $array = array(
                        'title' => $title,
                        'summary' => $summary
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function area_of_risk($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/area_risk', $data);
                
                if(isset($btn_submit)){
                    $area_of_risk = $this->input->post('area_of_risk');
                    
                    $array = array(
                        'area_of_risk' => $area_of_risk
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function keywork_session($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/keywork_session', $data);
                
                if(isset($btn_submit)){
                    $keywork_session = $this->input->post('keywork_session');
                    
                    $array = array(
                        'keywork_session' => $keywork_session
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function self_care($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/self_care', $data);
                
                if(isset($btn_submit)){
                    $self_care = $this->input->post('self_care');
                    
                    $array = array(
                        'self_care' => $self_care
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function education($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/education', $data);
                
                if(isset($btn_submit)){
                    $education = $this->input->post('education');
                    
                    $array = array(
                        'education' => $education
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function independent_skill($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/independent_skill', $data);
                
                if(isset($btn_submit)){
                    $independent_skill = $this->input->post('independent_skills');
                    
                    $array = array(
                        'independent_skills' => $independent_skill
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function family($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/family', $data);
                
                if(isset($btn_submit)){
                    $family = $this->input->post('family');
                    
                    $array = array(
                        'family' => $family
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function missing($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/missing', $data);
                
                if(isset($btn_submit)){
                    $missing = $this->input->post('missing');
                    
                    $array = array(
                        'missing' => $missing
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function area_of_progress($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/area_progress', $data);
                
                if(isset($btn_submit)){
                    $area_of_progress = $this->input->post('area_of_progress');
                    
                    $array = array(
                        'area_of_progress' => $area_of_progress
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function staff($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                $data['staff'] = $this->Reporting_model->display_all_staff();
                
                $this->load->view('admin/house/reporting/staff', $data);
                
                if(isset($btn_submit)){
                    $staff = $this->input->post('staff');
                    
                    $array = array(
                        'staff' => $staff
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function social_worker($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/social_worker', $data);
                
                if(isset($btn_submit)){
                    $social_worker = $this->input->post('social_worker');
                    
                    $array = array(
                        'social_worker' => $social_worker
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function duration($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Reporting_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['reporting'] = $this->Reporting_model->display_reporting_by_id($id);
                $data['children'] = $this->Reporting_model->display_all_children();
                $data['staff'] = $this->Reporting_model->display_all_staff();
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('admin/house/reporting/duration', $data);
                
                if(isset($btn_submit)){
                    $duration = $this->input->post('duration');

                    $query = $this->db->query("SELECT fullname FROM children WHERE code = '$code' ")->result();
                    foreach($query as $qry){
                        $child_name = $qry->fullname;
                    }
                    
                    $array = array(
                        'duration' => $duration
                    );
                    
                    $update = $this->Reporting_model->update_reporting($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Reporting_model');
           $this->Reporting_model->delete_reporting($id); 
        }
        
        public function send_mail($id, $code){
          $email = $this->input->post('email');       

          $subject = "Reporting";
          $body = "Please find below attached the Reporting document";

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
         
         $this->load->model('Reporting_model');
         $data['detail'] = $this->Reporting_model->display_reporting_by_id($id);
         $detail = $data['detail'];
         
         foreach($detail as $det){
             $pdf = $det->pdf;
         }
         
         $atch = base_url('uploads/reporting/'.$pdf);

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
            window.location.href="<?php echo site_url('admin/house/reporting/view/'.$code); ?>";
        </script> 
 <?php }
 
        public function edit_document($id, $code){
            
            $this->load->model('Reporting_model');
            
            $files = $_FILES;
            $cpt1 = count($_FILES['userFiles1']['name']);
    
            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config1 = array(
                    'upload_path'   => "./uploads/reporting/",
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
            
            $update = $this->Reporting_model->update_reporting($id, $array);
            
            if($update){ ?>
                <script>
                    alert('Added Document Successfully');
                    window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/house/reporting/detail/'.$id.'/'.$code); ?>";
                </script> 
      <?php }
        }
    
    }

?>