<?php 

    class Training extends CI_Controller{
        
        public function __construct(){
          parent::__construct();
          $this->load->model('Training_model');
        }
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['training'] = $this->Training_model->display_all_event();
            
                $this->load->view('admin/training/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Training_model->display_event_by_id($id);
            
                $this->load->view('admin/training/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add(){
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');

            $array = array(
                'title' => $title,
                'body' => $body,
                'start_date' => $start_date,
                'end_date' => $end_date,
            );
            
            $insert = $this->Training_model->insert_event($array);
            
            //if($insert){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/training'); ?>";
                </script>
      <?php /*}else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/training'); ?>";
                </script> 
      <?php }*/
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
        
        public function delete_event(){
           $id = $this->input->post('del_id');

           $this->Training_model->delete_event($id); 
        }
        
        public function send_mail(){
          $email = $this->input->post('email');    
        
          $title = $this->input->post('title');      
          $summary = $this->input->post('body');    

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
                window.location.href="<?php echo site_url('admin/training'); ?>";
            </script> 
 <?php }
    }

?>