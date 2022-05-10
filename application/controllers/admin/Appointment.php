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
            $child_code = $this->input->post('child_code');
            $house_name = $this->input->post('house_name');
            $type = $this->input->post('type');
            $address = $this->input->post('address');
            $support = $this->input->post('support');
            
            $time = $this->input->post('time');
            $date = $this->input->post('date');
            
            $query = $this->db->query("SELECT fullname FROM children WHERE code = '$child_code' ")->result();
            foreach($query as $qry){
                $child_name = $qry->fullname;
            }

            $array = array(
                'title' => $title,
                'young_person' => $child_name,
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
    }

?>