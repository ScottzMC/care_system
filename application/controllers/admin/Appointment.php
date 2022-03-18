<?php 
    
    class Appointment extends CI_Controller{
        
        public function __construct(){
          parent::__construct();
          $this->load->model('Appointment_model');
          $this->load->model('Children_model');
        }
        
        public function index(){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['calendar'] = $this->Appointment_model->display_all_calendar_events();
                $data['children'] = $this->Appointment_model->display_all_children();
                $data['house'] = $this->Children_model->display_all_property();
            
                $this->load->view('admin/appointment/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Appointment_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Appointment_model->display_calendar_events_by_id($id);

                $this->load->view('admin/appointment/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function add(){
            $title = $this->input->post('title');
            $young_person = $this->input->post('young_person');
            $house_name = $this->input->post('house_name');
            $type = $this->input->post('type');
            $address = $this->input->post('address');
            $support = $this->input->post('support');
            
            $time = $this->input->post('time');
            $date = $this->input->post('date');

            $array = array(
                'title' => $title,
                'young_person' => $young_person,
                'house_name' => $house_name,
                'type' => $type,
                'address' => $address,
                'support' => $support,
                'time' => $time,
                'date' => $date,
            );
            
            $insert = $this->Appointment_model->insert_calendar_events($array);
            
            if($insert){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/appointment'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/appointment'); ?>";
                </script> 
      <?php }
        }
        
        function load(){
          $event_data = $this->Appointment_model->fetch_all_event();
          
          foreach($event_data->result_array() as $row){
           $data[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'date' => $row['date'],
           );
          }
          
          echo json_encode($data);
        }
        
        public function delete_event(){
           $id = $this->input->post('del_id');
           $this->load->model('Appointment_model');
           
           $this->Appointment_model->delete_calendar_event($id); 
        }
        
        public function send_mail(){
          $email = $this->input->post('email');
          
          $title = $this->input->post('title');
          $young_person = $this->input->post('young_person');
          $house_name = $this->input->post('house_name');
          $type = $this->input->post('type');
          $address = $this->input->post('address');
          $support = $this->input->post('support');
            
          $time = $this->input->post('time');
          $date = $this->input->post('date'); 

          $subject = "Appointments";
          $body = "
            Please find below the information of the Appointments - 
            Title - $title
            Young Person - $young_person
            House Name - $house_name
            Type of Appointment - $type
            Support for Young Person - $support
            Time for Appointment - $time
            Date of Appointment - $date
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
                window.location.href="<?php echo site_url('admin/appointment'); ?>";
            </script> 
 <?php }
    }

?>