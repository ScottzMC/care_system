<?php 

    class Training extends CI_Controller{
        
        public function __construct(){
          parent::__construct();
          $this->load->model('Training_model');
        }
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['training'] = $this->Training_model->display_all_event();
            
                $this->load->view('staff/training/view', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Staff"){
                $data['detail'] = $this->Training_model->display_event_by_id($id);
            
                $this->load->view('staff/training/detail', $data);
            }else{
                redirect('staff/account/login');    
            }
        }
        
        function load(){
          $event_data = $this->Training_model->fetch_all_event();
          
          foreach($event_data->result_array() as $row){
           $data[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'body' => $row['body'],
            'start' => $row['start_date'],
            'end' => $row['end_date']
           );
          }
          
          echo json_encode($data);
        }
        
        public function send_mail(){
          $title = $this->input->post('title');      
          $summary = $this->input->post('body');    
          
          $email = $this->input->post('email');

          $subject = "Training Calendar";
          $body = "
            Please find below the information of the Training Calendar - 
            Title - $title
            Comments and further actions - $summary
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
                window.location.href="<?php echo site_url('staff/training'); ?>";
            </script> 
 <?php }
    }

?>