<?php 
    
    class Support_work extends CI_Controller{
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_work_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['support_work'] = $this->Support_work_model->display_all_support_work();
                $data['house'] = $this->Support_work_model->display_all_house();
                $data['children'] = $this->Support_work_model->display_all_children();
                $data['task'] = $this->Support_work_model->display_all_support_work_task();
                $data['subtask'] = $this->Support_work_model->display_support_work_subtask();
                $this->load->view('staff/support_work/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_work_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Support_work_model->display_support_work_by_id($id);
                $data['task'] = $this->Support_work_model->display_all_support_task();

                $this->load->view('staff/support_work/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add(){
            $this->load->model('Support_work_model');
            
            $title = $this->input->post('title');
            $child_code = $this->input->post('child_code');
            $body = $this->input->post('body');
            $house_name = $this->input->post('house_name');
            $review_period = $this->input->post('review_period');
            $task = $this->input->post('task');
            $imp_task = implode(',', $task);
            $task_id = $this->input->post('task_id');
            $imp_task_id = implode(',', $task_id);
            
            $start_date = $this->input->post('start_date');
            $target_date = $this->input->post('target_date');
            $completed_date = $this->input->post('completed_date');
            $date = $this->input->post('created_date');
            
            $query = $this->db->query("SELECT fullname FROM children WHERE code = '$child_code' ")->result();
            foreach($query as $qry){
                $child_name = $qry->fullname;
            }
            
            $files = $_FILES;
            
            $cpt1 = count($_FILES['userFiles1']['name']);

            for($i=0; $i<$cpt1; $i++){
                $_FILES['userFiles1']['name']= $files['userFiles1']['name'][$i];
                $_FILES['userFiles1']['type']= $files['userFiles1']['type'][$i];
                $_FILES['userFiles1']['tmp_name']= $files['userFiles1']['tmp_name'][$i];
                $_FILES['userFiles1']['error']= $files['userFiles1']['error'][$i];
                $_FILES['userFiles1']['size']= $files['userFiles1']['size'][$i];
    
                $config = array(
                    'upload_path'   => "./uploads/support_work/",
                    'allowed_types' => "png|jpg|jpeg",
                    'overwrite'     => TRUE,
                    'max_size'      => "30000",  // Can be set to particular file size
                    //'max_height'    => "768",
                    //'max_width'     => "1024"
                );
    
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
    
                $this->upload->do_upload('userFiles1');
                $fileName = $_FILES['userFiles1']['name'];
            }
            
            $array = array(
                'title' => $title,
                'body' => $body,
                'code' => $child_code,
                'child_name' => $child_name,
                'house_name' => $house_name,
                'image' => $fileName,
                'review_period' => $review_period,
                'task_id' => $imp_task_id,
                'task' => $imp_task,
                'start_date' => $start_date,
                'target_date' => $target_date,
                'completed_date' => $completed_date,
                'created_date' => $date
            );
            
            $insert_support_work = $this->Support_work_model->insert_support_work($array);
            
            if($insert_support_work){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('staff/support_work'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/support_work'); ?>";
                </script> 
      <?php }
        }
        
        public function add_task(){
            $this->load->model('Support_work_model');
            
            $title = $this->input->post('title');
            
            $array = array(
                'title' => $title
            );
            
            $insert = $this->Support_work_model->insert_task($array);
            
            if($insert){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('staff/support_work'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/support_work'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_task($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_work_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['task'] = $this->Support_work_model->display_all_support_task_by_id($id);
                
                $this->load->view('staff/support_work/edit_task', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    
                    $array = array(
                        'title' => $title
                    );
                    
                    $update = $this->Support_work_model->update_task($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/support_work'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/support_work'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function add_subtask(){
            $this->load->model('Support_work_model');
            
            $task_id = $this->input->post('task_id');
            $title = $this->input->post('title');
            
            $array = array(
                'task_id' => $task_id,
                'subtitle' => $title
            );
            
            $insert = $this->Support_work_model->insert_subtask($array);
            
            if($insert){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('staff/support_work'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('staff/support_work'); ?>";
                </script> 
      <?php }
        }
        
        public function edit_subtask($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_work_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['subtask'] = $this->Support_work_model->display_all_support_subtask_by_id($id);
                
                $this->load->view('staff/support_work/edit_subtask', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    
                    $array = array(
                        'subtitle' => $title
                    );
                    
                    $update = $this->Support_work_model->update_subtask($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/support_work'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/support_work'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
  
        public function edit($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Support_work_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['support_work'] = $this->Support_work_model->display_support_work_by_id($id);
                $data['house'] = $this->Support_work_model->display_all_house();
                $data['children'] = $this->Support_work_model->display_all_children();
                //$data['achieve_target'] = $this->Support_work_model->display_achieve_target();

                $this->load->view('staff/support_work/edit', $data);
                
                if(isset($btn_submit)){
                    $title = $this->input->post('title');
                    $children = $this->input->post('children');
                    $body = $this->input->post('body');
                    $house_name = $this->input->post('house_name');
                    
                    $review_period = $this->input->post('review_period');
                    $start_date = $this->input->post('start_date');
                    $target_date = $this->input->post('target_date');
                    $completed_date = $this->input->post('completed_date');
                    $date = $this->input->post('created_date');
                    
                    $array = array(
                    'title' => $title,
                    'body' => $body,
                    'children' => $children,
                    'house_name' => $house_name,
                    'review_period' => $review_period,
                    'start_date' => $start_date,
                    'target_date' => $target_date,
                    'completed_date' => $completed_date,
                    'created_date' => $date
                    ); 
                    
                    $update_independent = $this->Support_work_model->update_support_work_details($id, $array);
                
                    if($update_independent){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('staff/support_work'); ?>";
                        </script>
                  <?php }else{ ?>
                           <script>
                                alert('Failed');
                                window.location.href="<?php echo site_url('staff/support_work'); ?>";
                            </script> 
                  <?php }  
                    }
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function delete(){
           $id = $this->input->post('del_id');
           $this->load->model('Support_work_model');
           
           $this->Support_work_model->delete_support_work($id); 
        }
        
        public function delete_task(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Support_work_model');
           $this->Support_work_model->delete_task($id); 
        }
        
        public function delete_subtask(){
           $id = $this->input->post('del_id');
           
            $this->load->model('Support_work_model');
           $this->Support_work_model->delete_subtask($id); 
        }
        
        public function send_mail(){
          $email = $this->input->post('email');
          
          $children = $this->input->post('children');
          $body = $this->input->post('body');
          $house_name = $this->input->post('house_name');
          $target_completed = $this->input->post('target_completed');
          $review_period = $this->input->post('review_period');
          $start_date = $this->input->post('start_date');
          $target_date = $this->input->post('target_date');
          $completed_date = $this->input->post('completed_date');
          $date = $this->input->post('created_date');

          $subject = "Support Work";
          $body = "
            Please find below the information of the Support Work - 
            Child name - $children
            
            Body - $body
            
            House Name - $house_name
            
            Review Period - $review_period
            
            Start Date - $start_date
            
            Target Date - $target_date
            
            Completed Date - $completed_date
            
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
            window.location.href="<?php echo site_url('staff/support_work'); ?>";
        </script> 
 <?php }
        
        public function download()  {
    		//$this->load->library('phpword');
    		
    		$this->load->model('Support_work_model');
    
    		$support = $this->Support_work_model->get_support_work();
    
    		//  create new file and remove Compatibility mode from word title
    
    		$phpWord = new \PhpOffice\PhpWord\PhpWord();
    		$phpWord->getCompatibility()->setOoxmlVersion(14);
    		$phpWord->getCompatibility()->setOoxmlVersion(15);
    
    		$targetFile = "./uploads/";
    		$filename = 'support_work.docx';
    
    		// add style settings for the title and paragraph
    		foreach($support as $s){
    
    			$section = $phpWord->addSection();
    			$section->addText($s['title'], array('bold' => true,'underline' => 'single','name'=> 'arial','size' => 21,'color' =>'red'),array('align' => 'center', 'spaceAfter' => 10));
    			$section->addTextBreak(1);
    			/*if(!empty($r['ne_img'])){
    				$section->addImage($targetFile.$n['ne_img'], array('align' => 'center','width'=>200, 'height'=>200));
    			}*/
    			$section->addTextBreak(1);
    			$section->addText($s['body'], array('name'=> 'arial','size' => 14),array('align' => 'left', 'spaceAfter' => 100));
    		}
    		
    		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    		$objWriter->save($filename);
    		// send results to browser to download
    		header('Content-Description: File Transfer');
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; filename='.$filename);
    		header('Content-Transfer-Encoding: binary');
    		header('Expires: 0');
    		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    		header('Pragma: public');
    		header('Content-Length: ' . filesize($filename));
    		flush();
    		readfile($filename);
    		unlink($filename); // deletes the temporary file
    		exit;
    		//redirect('risk_assessment');
    	}
    }

?>