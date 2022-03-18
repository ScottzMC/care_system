<?php 

    class Account extends CI_Controller{
        
        public function login(){
            $this->load->model('Account_model');
            
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
          
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('login');
            
            if($form_valid == FALSE){
                $this->load->view('admin/account/login');
            }
            
            if(isset($submit_btn)){
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $time = time();
                $date = date('Y-m-d H:i:s');
                
                $query = $this->db->query("SELECT email FROM users WHERE email = '$email'")->result();
                foreach($query as $qry){
                    $query_email = $qry->email;
                }
                
                $uresult = $this->Account_model->validate($email, $password);
                if(count($uresult) > 0){
                  $sess_data = array(
                  'login' => TRUE,
                  'uid' => $uresult[0]->id,
                  'uemail' => $uresult[0]->email,
                  'ufirstname' => $uresult[0]->firstname,
                  'ulastname' => $uresult[0]->lastname,
                  'urole' => $uresult[0]->role
                 );
        
                  $this->session->set_userdata($sess_data);
                  $status = $this->session->userdata('ustatus'); 
                  
                  $array = array(
                    'logged_in_time' => $time,
                    'logged_in_date' => $date
                  );
                  
                  $this->Account_model->update_login_activity($email, $array);
                ?>
                  <script>
                      alert('Login successfully');
                      window.location.href="<?php echo site_url('admin/dashboard'); ?>";
                  </script> 
                  <?php
                  /*if(isset($_SERVER['HTTP_REFERER'])){
                    redirect($_SERVER['HTTP_REFERER']);
                  }*/
              }else{
                $statusMsg = '<span class="text-danger">Wrong Email-ID or Password!</span>';
                $this->session->set_flashdata('msgError', $statusMsg);
                
                $this->load->view('admin/account/login');
               }
            }
        }
        
        public function logout(){
          // destroy session
          $data = array('login' => '', 'uid' => '', 'ufirstname' => '', 'ulastname' => '', 'uemail' => '', 'urole' => '');
          $this->session->unset_userdata($data);
          $this->session->sess_destroy();
          redirect('admin/account/login');
        }
    }

?>