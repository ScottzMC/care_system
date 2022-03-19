<?php
    
    class Staff_communication extends CI_Controller{
        
        public function detail($id, $code){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Staff_communication_model');
            $this->load->model('House_model');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
                $data['house'] = $this->House_model->display_home($code);
                $data['code'] = $code;
                
                $this->load->view('staff/house/staff_communication/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function send_mail($code){
          $email = $this->input->post('email');
          
          $title = $this->input->post('title');
          $request = $this->input->post('request');
          $time = $this->input->post('time');   
          $date = $this->input->post('created_date');    

          $subject = "Staff Communication";
          $body = "
            Please find below the information of the Staff Communication - 
            Title - $title 
            Request - $request
            Time - $time 
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