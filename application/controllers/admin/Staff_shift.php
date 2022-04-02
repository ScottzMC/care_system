<?php 

    class Staff_shift extends CI_Controller{
        
        public function __construct(){
          parent::__construct();
          $this->load->model('Staff_shift_model');
        }
        
        public function index(){
            $session_email = $this->session->userdata('uemail');
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['all_staff'] = $this->Staff_shift_model->display_all_staff();
                $data['staff_shift'] = $this->Staff_shift_model->display_all_staff_shift();
                $data['house'] = $this->Staff_shift_model->display_all_house();
            
                $this->load->view('admin/staff_shift/view', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function detail($id){
            $session_role = $this->session->userdata('urole');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['detail'] = $this->Staff_shift_model->display_staff_shift_by_id($id);
                
                $this->load->view('admin/staff_shift/detail', $data);
            }else{
                redirect('admin/account/login');    
            }
        }
        
        function load(){
          $event_data = $this->Staff_shift_model->fetch_all_event();
          
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
        
        public function add(){
            $email = $this->input->post('email');
            $house_name = $this->input->post('house_name');
            
            $start_time = $this->input->post('start_time');
            $end_time = $this->input->post('end_time');
            $date = $this->input->post('date');
            
            $query = $this->db->query("SELECT firstname, lastname FROM users WHERE email = '$email' ")->result();
            foreach($query as $qry){
                $firstname = $qry->firstname;
                $lastname = $qry->lastname;
            }
            
            $fullname = $firstname.' '.$lastname;

            $array = array(
                'title' => $fullname,
                'email' => $email,
                'house_name' => $house_name,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'start_date' => $date,
                'end_date' => $date,
            );
            
            $insert = $this->Staff_shift_model->insert_staff_shift($array);
            
            if($insert){ ?>
                <script>
                    alert('Added Successfully');
                    window.location.href="<?php echo site_url('admin/staff_shift'); ?>";
                </script>
      <?php }else{ ?>
               <script>
                    alert('Failed');
                    window.location.href="<?php echo site_url('admin/staff_shift'); ?>";
                </script> 
      <?php }
        }
        
        public function edit($id){
            $btn_submit = $this->input->post('edit');
            
            $session_role = $this->session->userdata('urole');
            
            $this->load->model('Staff_shift_model');
            
            if(!empty($session_role) && $session_role == "Admin"){
                $data['staff_shift'] = $this->Staff_shift_model->display_staff_shift_by_id($id);
                $data['all_staff'] = $this->Staff_shift_model->display_all_staff();

                $this->load->view('admin/staff_shift/edit', $data);
                
                if(isset($btn_submit)){
                    $house_name = $this->input->post('house_name');
                    
                    $start_time = $this->input->post('start_time');
                    $end_time = $this->input->post('end_time');
                    $date = $this->input->post('date');

                    $array = array(
                        'house_name' => $house_name,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'start_date' => $date,
                        'end_date' => $date,
                    );
                    
                    $update = $this->Staff_shift_model->update_staff_shift_details($id, $array);
                    
                    if($update){ ?>
                        <script>
                            alert('Updated Successfully');
                            window.location.href="<?php echo site_url('admin/staff_shift'); ?>";
                        </script>
                  <?php }else{ ?>
                       <script>
                            alert('Failed');
                            window.location.href="<?php echo site_url('admin/staff_shift'); ?>";
                        </script> 
                  <?php }  
                    }
            }else{
                redirect('admin/account/login');    
            }
        }
        
        public function delete_event(){
           $id = $this->input->post('del_id');
            $this->load->model('Staff_shift_model');
           
           $this->Staff_shift_model->delete_staff_shift($id); 
        }
        
    }

?>