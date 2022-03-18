<?php 

    class Staff_shift extends CI_Controller{
        
        public function __construct(){
          parent::__construct();
          $this->load->model('Staff_shift_model');
        }
        
        public function index(){
            $session_email = $this->session->userdata('uemail');
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['staff_shift'] = $this->Staff_shift_model->display_staff_shift_by_email($session_email);

                $this->load->view('staff/staff_shift/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Staff_shift_model->display_staff_shift_by_id($id);
                
                $this->load->view('staff/staff_shift/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        function load(){
          $email = $this->session->userdata('uemail');
          
          $event_data = $this->Staff_shift_model->fetch_event_by_email($email);
          
          foreach($event_data->result_array() as $row){
           $data[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start_date'],
            'end' => $row['end_date']
           );
          }
          
          echo json_encode($data);
        }
        
        public function send_mail(){
          $fullname = $this->input->post('fullname');
          $email = $this->input->post('email');
          $house_name = $this->input->post('house_name');
          
          $start_time = $this->input->post('start_time');
          $end_time = $this->input->post('end_time');
          
          $start_date = $this->input->post('start_date');
          $end_date = $this->input->post('end_date');
          
          $email = $this->input->post('email');
          
          $subject = "Staff Shift";
          $body = "
            Please find below the information of the Staff Shift - 
            Staff - $fullname
            
            Email Address - $email
            
            House Name - $house_name
            
            Shift Start Time - $start_time
            
            Shift End Time - $end_time
            
            Start Date - $start_date
            
            End Date - $end_date
            
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
            window.location.href="<?php echo site_url('staff/staff_shift'); ?>";
        </script> 
 <?php }
    }

?>