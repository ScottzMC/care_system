<?php 

    class Account extends CI_Controller{
        
        public function login(){
            $this->load->model('Account_model');
            
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
          
            $form_valid = $this->form_validation->run();
            $submit_btn = $this->input->post('login');
            
            if($form_valid == FALSE){
                $this->load->view('staff/account/login');
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
                      window.location.href="<?php echo site_url('staff/dashboard'); ?>";
                  </script> 
                  <?php
                  redirect('staff/dashboard');
                  /*if(isset($_SERVER['HTTP_REFERER'])){
                    redirect($_SERVER['HTTP_REFERER']);
                  }*/
              }else{
                $statusMsg = '<span class="text-danger">Wrong Email-ID or Password!</span>';
                $this->session->set_flashdata('msgError', $statusMsg);
                
                $this->load->view('staff/account/login');
               }
            }
        }
        
        public function forgot_password(){
            
            $this->load->model('Account_model');

            $email = $this->input->post('email');
            $submit = $this->input->post('forgot');
            
            $this->load->view('staff/account/forgot_password');
            
            $query = $this->db->query("SELECT email FROM users WHERE email = '$email' ")->result();
              foreach($query as $qry){
                 $query_email = $qry->email;
              }
    
          if(isset($submit) && $email == $query_email){
              
              $code = str_shuffle("ABCDEFXJKZAG");
    
              $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'smtp.scottnnaghor.com',
                 'smtp_port' => 25,
                 'smtp_user' => 'admin@scottnnaghor.com', // change it to account email
                 'smtp_pass' => 'TigerPhenix100', // change it to account email password
                 'mailtype' => 'html',
                 'priority' => 1,
                 'starttls'  => true,
                 'newline'   => "\r\n",
              );
              
              $data = array('code' => $code);
              
              
              $subject = "Forgot Password";
              $body = "
                The reset code - $code
                Upon clicking the link, put your reset code and new password in the reset page. 
                If you want to reset your password, please click the link to reset the password - https://scottnnaghor.com/care_system/staff/account/reset";
               //$body = $this->load->view('email/forgot',$data,TRUE);
              $time = time();
              $date = date('Y-m-d H:i:s');
    
             $this->load->library('email', $config);
             $this->email->set_mailtype("html");
             $this->email->from('admin@scottnnaghor.com', "Care System Team");
             $this->email->to("$email");
             //$this->email->cc("testcc@domainname.com");
             $this->email->subject("$subject");
             $this->email->message("$body");
    
            if($this->email->send()){ ?>
            <script>
                alert('Mail sent successfully. Please check your mail to reset your Password');
                window.location.href="<?php echo base_url('staff/account/login'); ?>";
            </script>    
            <?php }else{ ?>
            <script>
                alert("Email does not exist ");
                window.location.href="<?php echo site_url('staff/account/login'); ?>";
            </script>
       <?php }
           }
       }
       
       public function reset(){
          $session_email = $this->session->userdata('uemail');
          
          $this->load->model('Account_model');
            
          $submit_code = $this->input->post('code');
          $email = $this->input->post('email');
          $submit = $this->input->post('reset');
          
          $query = $this->db->query("SELECT email FROM users WHERE email = '$email' ")->result();
          foreach($query as $qry){
              $query_email = $qry->email;
          }
          
          $this->load->view('staff/account/reset');
          
          if(isset($submit)){
            if(!empty($query_email) && $query_email == $email){
            $password = $this->input->post('password');
            $hashed_password = $this->bcrypt->hash_password($password);
            
            $update_detail = $this->Account_model->update_user_password($query_email, $hashed_password);
    
            if($update_detail){ ?>
              <script>
                alert('Account updated successfully. Please login with your new details');
                window.location.href="<?php echo base_url('staff/account/login'); ?>";
              </script> 
      <?php }else{ ?>
              <script>
                alert('Reset Password Failed');
                window.location.href="<?php echo base_url('staff/account/login'); ?>";
              </script> 
        <?php }
           }else{ ?>
              <script>
                alert("Email does not exist");
                window.location.href="<?php echo site_url('staff/account/login'); ?>";
              </script>
           <?php }
          }
        }
        
        public function logout(){
          // destroy session
          $data = array('login' => '', 'uid' => '', 'ufirstname' => '', 'ulastname' => '', 'uemail' => '', 'urole' => '');
          $this->session->unset_userdata($data);
          $this->session->sess_destroy();
          redirect('staff/account/login');
        }
    }

?>