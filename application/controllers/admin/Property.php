<?php 
    
    class Property extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['property'] = $this->Property_model->display_all_property();
                
                $this->load->view('admin/property/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Property_model->display_property_by_id($id);
                $data['file'] = $this->Property_model->display_property_files($code);
                
                $this->load->view('admin/property/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add(){
            $this->load->model('Property_model');
            
            $shuffle = "ABCDEFGHZXCQWE";
            $unique = rand(000, 999);
            $code = $shuffle.$unique;
            $housename = $this->input->post('housename');
            $body = $this->input->post('body');
            $telephone = $this->input->post('telephone');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $postcode = $this->input->post('postcode');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $date = $this->input->post('created_date');
            
            $array = array(
                'code' => $code,
                'housename' => $housename,
                'body' => $body,
                'telephone' => $telephone,
                'mobile' => $mobile,
                'address' => $address,
                'postcode' => $postcode,
                'city' => $city,
                'state' => $state,
                'created_date' => $date
            );
            
            $file_array = array('code' => $code);
            
            $insert_property = $this->Property_model->insert_property($array);
            $insert_file = $this->Property_model->insert_property_file($file_array);
            
            if($insert_property && $insert_file){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/property'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/property'); ?>";
                </script> 
      <?php }
        }
        
        public function form_insurance($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userInsurance']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userInsurance']['name']= $files['userInsurance']['name'][$i];
                        $_FILES['userInsurance']['type']= $files['userInsurance']['type'][$i];
                        $_FILES['userInsurance']['tmp_name']= $files['userInsurance']['tmp_name'][$i];
                        $_FILES['userInsurance']['error']= $files['userInsurance']['error'][$i];
                        $_FILES['userInsurance']['size']= $files['userInsurance']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/insurance/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userInsurance');
                        $fileInsurance = str_replace(' ', '_', $_FILES['userInsurance']['name']);
                      }
                    
                    $array = array(
                        'insurance' => $fileInsurance,
                    );
                    
                    $form_insurance = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_insurance){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function form_electrical($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userElectrical']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userElectrical']['name']= $files['userElectrical']['name'][$i];
                        $_FILES['userElectrical']['type']= $files['userElectrical']['type'][$i];
                        $_FILES['userElectrical']['tmp_name']= $files['userElectrical']['tmp_name'][$i];
                        $_FILES['userElectrical']['error']= $files['userElectrical']['error'][$i];
                        $_FILES['userElectrical']['size']= $files['userElectrical']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/electrical/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userElectrical');
                        $fileElectrical = str_replace(' ', '_', $_FILES['userElectrical']['name']);
                      }
                    
                    $array = array(
                        'electrical' => $fileElectrical,
                    );
                    
                    $form_insurance = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_insurance){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function form_gas($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userGas']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userGas']['name']= $files['userGas']['name'][$i];
                        $_FILES['userGas']['type']= $files['userGas']['type'][$i];
                        $_FILES['userGas']['tmp_name']= $files['userGas']['tmp_name'][$i];
                        $_FILES['userGas']['error']= $files['userGas']['error'][$i];
                        $_FILES['userGas']['size']= $files['userGas']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/gas_safety/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userGas');
                        $fileGas = str_replace(' ', '_', $_FILES['userGas']['name']);
                      }
                    
                    $array = array(
                        'gas_safety' => $fileGas,
                    );
                    
                    $form_gas = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_gas){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function form_fire($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userFire']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userFire']['name']= $files['userFire']['name'][$i];
                        $_FILES['userFire']['type']= $files['userFire']['type'][$i];
                        $_FILES['userFire']['tmp_name']= $files['userFire']['tmp_name'][$i];
                        $_FILES['userFire']['error']= $files['userFire']['error'][$i];
                        $_FILES['userFire']['size']= $files['userFire']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/fire_alarm/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userFire');
                        $fileFire = str_replace(' ', '_', $_FILES['userFire']['name']);
                      }
                    
                    $array = array(
                        'fire_alarm' => $fileFire,
                    );
                    
                    $form_fire = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_fire){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function form_emergency($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userEmergency']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userEmergency']['name']= $files['userEmergency']['name'][$i];
                        $_FILES['userEmergency']['type']= $files['userEmergency']['type'][$i];
                        $_FILES['userEmergency']['tmp_name']= $files['userEmergency']['tmp_name'][$i];
                        $_FILES['userEmergency']['error']= $files['userEmergency']['error'][$i];
                        $_FILES['userEmergency']['size']= $files['userEmergency']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/emergency_light/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userEmergency');
                        $fileEmergency = str_replace(' ', '_', $_FILES['userEmergency']['name']);
                      }
                    
                    $array = array(
                        'emergency_light' => $fileEmergency,
                    );
                    
                    $form_emergency = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_emergency){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function form_pat($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userPat']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userPat']['name']= $files['userPat']['name'][$i];
                        $_FILES['userPat']['type']= $files['userPat']['type'][$i];
                        $_FILES['userPat']['tmp_name']= $files['userPat']['tmp_name'][$i];
                        $_FILES['userPat']['error']= $files['userPat']['error'][$i];
                        $_FILES['userPat']['size']= $files['userPat']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/pat_testing/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userPat');
                        $filePat = str_replace(' ', '_', $_FILES['userPat']['name']);
                      }
                    
                    $array = array(
                        'pat_testing' => $filePat,
                    );
                    
                    $form_pat = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_pat){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function form_area_risk($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userAreaRisk']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userAreaRisk']['name']= $files['userAreaRisk']['name'][$i];
                        $_FILES['userAreaRisk']['type']= $files['userAreaRisk']['type'][$i];
                        $_FILES['userAreaRisk']['tmp_name']= $files['userAreaRisk']['tmp_name'][$i];
                        $_FILES['userAreaRisk']['error']= $files['userAreaRisk']['error'][$i];
                        $_FILES['userAreaRisk']['size']= $files['userAreaRisk']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/area_risk_assessment/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userAreaRisk');
                        $fileArea = str_replace(' ', '_', $_FILES['userAreaRisk']['name']);
                      }
                    
                    $array = array(
                        'area_risk_assessment' => $fileArea,
                    );
                    
                    $form_area = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_area){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function form_health_safety($code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');

            if(!empty($session_role) && $session_role == "Admin"){
                
                $btn_submit = $this->input->post('add');
                
                //if(isset($btn_submit)){
                    
                    $files = $_FILES;
                      $cptd = count($_FILES['userHealth']['name']);
                      
                      for($i=0; $i<$cptd; $i++){
                        $_FILES['userHealth']['name']= $files['userHealth']['name'][$i];
                        $_FILES['userHealth']['type']= $files['userHealth']['type'][$i];
                        $_FILES['userHealth']['tmp_name']= $files['userHealth']['tmp_name'][$i];
                        $_FILES['userHealth']['error']= $files['userHealth']['error'][$i];
                        $_FILES['userHealth']['size']= $files['userHealth']['size'][$i];
            
                        $config1 = array(
                            'upload_path'   => "./uploads/property/health_safety/",
                            //'upload_path'   => "./uploads/../../uploads/community/",
                            'allowed_types' => "jpg|png|docx|pdf",
                            'overwrite'     => TRUE,
                            'max_size'      => "30000",  // Can be set to particular file size
                            //'max_height'    => "768",
                            //'max_width'     => "1024"
                        );
            
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
            
                        $this->upload->do_upload('userHealth');
                        $fileHealth = str_replace(' ', '_', $_FILES['userHealth']['name']);
                      }
                    
                    $array = array(
                        'health_safety' => $fileHealth,
                    );
                    
                    $form_health = $this->Property_model->update_property_form($code, $array);
                    
                    if($form_health){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>    
                <?php }else{ ?>
                        <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                <?php }
                //}
                
            }else{
                redirect('admin/property');    
            }
        }
        
        public function edit($id, $code){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Property_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['property'] = $this->Property_model->display_property_by_id($id);
                $data['file'] = $this->Property_model->display_file_by_id($id);
                
                $this->load->view('admin/property/edit', $data);
                
                if(isset($btn_submit)){
                    $housename = $this->input->post('housename');
                    $body = $this->input->post('body');
                    $telephone = $this->input->post('telephone');
                    $mobile = $this->input->post('mobile');
                    $address = $this->input->post('address');
                    $postcode = $this->input->post('postcode');
                    $city = $this->input->post('city');
                    $state = $this->input->post('state');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                        'housename' => $housename,
                        'body' => $body,
                        'telephone' => $telephone,
                        'mobile' => $mobile,
                        'address' => $address,
                        'postcode' => $postcode,
                        'city' => $city,
                        'state' => $state,
                        'created_date' => $date
                    );
                    
                    $update_property = $this->Property_model->update_property_details($id, $array);
                    
                    if($update_property){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/property'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('admin/property'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
            $this->load->model('Property_model');
           
           $this->Property_model->delete_property($id); 
        }
        
        public function send_mail(){
          $email = $this->input->post('email');
          
          $housename = $this->input->post('housename');
          $body = $this->input->post('body');
          $category = $this->input->post('category');
          $telephone = $this->input->post('telephone');
          $mobile = $this->input->post('mobile');
          $address = $this->input->post('address');
          $postcode = $this->input->post('postcode');
          $city = $this->input->post('city');
          $state = $this->input->post('state');
          $date = $this->input->post('created_date');

          $subject = "Properties";
          $body = "
            Please find below the information of the Properties - 
            House Name - $housename
            
            Body - $body
            
            Category - $category
            
            Telephone Number - $telephone
            
            Mobile Number - $mobile
            
            Address - $address
            
            Postcode - $postcode
            
            City - $city
            
            State - $state
            
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
            window.location.href="<?php echo site_url('admin/property'); ?>";
        </script> 
 <?php }
        
        public function search(){
          $search_query = $this->input->post('search_query');
          
          $this->load->model('Property_model');
          
          $email = $this->session->userdata('uemail');
    
          $data["search"] = $this->Property_model->fetch_search_data($search_query);

          $this->load->view('admin/property/search', $data);
        }
        
        public function form_download_insurance($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT insurance FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/insurance/'.$qry->insurance;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_electrical($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT electrical FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/electrical/'.$qry->electrical;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_gas_safety($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT gas_safety FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/gas_safety/'.$qry->gas_safety;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_fire_alarm($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT fire_alarm FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/fire_alarm/'.$qry->fire_alarm;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_emergency_light($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT emergency_light FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/emergency_light/'.$qry->emergency_light;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_pat_testing($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT pat_testing FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/pat_testing/'.$qry->pat_testing;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_area_risk($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT area_risk_assessment FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/area_risk_assessment/'.$qry->area_risk_assessment;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
        
        public function form_download_health_safety($code){
          //$file_name= $this->input->get('file_name');

          $query = $this->db->query("SELECT health_safety FROM propety_file WHERE code = '$code' ")->result();
          foreach($query as $qry){}
            
          //$data = file_get_contents($file_name);
          $file = 'uploads/property/health_safety/'.$qry->health_safety;
          //$name = $qry->doc; // custom file name for your download

          //force_download($name, $data);
          force_download($file, NULL); //will get the file name for you
        }
    }

?>