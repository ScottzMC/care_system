<?php

    class Support_work_model extends CI_Model {
        
        // Support Work
        
        public function display_all_support_work(){
            $query = $this->db->get('support_work')->result();
            return $query;
        }
        
        public function display_all_support_work_task(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('support_work_task')->result();
            return $query;
        }
        
        public function display_support_work_subtask(){
            $this->db->order_by('subtitle', 'ASC');
            $query = $this->db->get('support_work_subtask')->result();
            return $query;
        }
        
        public function display_all_support_task(){
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('support_work')->result();
            return $query;
        }
        
        public function display_all_support_task_by_id($id){
            $this->db->where('id', $id);
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get('support_work_task')->result();
            return $query;
        }
        
        public function display_all_support_subtask_by_id($id){
            $this->db->where('id', $id);
            $this->db->order_by('subtitle', 'ASC');
            $query = $this->db->get('support_work_subtask')->result();
            return $query;
        }
        
        public function display_all_support_work_subtask(){
            //$id = explode(',', $id);
            //$this->db->where('task_id', $id);
            $query = $this->db->get('support_work_subtask')->result();
            /*$this->db->select('*');
    		$this->db->from('support_work');
    		$this->db->join('support_work_subtask', 'support_work.task_id = support_work_subtask.task_id');
    		$this->db->where('support_work_subtask.task_id', $id);
    		$this->db->order_by('support_work_subtask.subtitle', 'ASC');
    		return $this->db->get()->result();*/
            //$query = $this->db->query("SELECT support_work_task.id, support_work_task.title, support_work_subtask.task_id, support_work_subtask.subtitle FROM support_work_task INNER JOIN support_work_subtask ON support_work_task.id = support_work_subtask.task_id WHERE support_work_subtask.task_id = '$id' ORDER BY support_work_subtask.subtitle ASC")->result();
            return $query;
        }
        
        public function display_all_house(){
            $this->db->order_by('housename', 'ASC');
            $query = $this->db->get('properties')->result();
            return $query;
        }
        
        public function display_support_work_by_id($id){
            $this->db->where('id', $id);
            $query = $this->db->get('support_work')->result();
            return $query;
        }
        
        public function get_support_work() {
            $query = $this->db->get('support_work');
            return $query->result_array();
        }
        
        public function insert_task($data){
            $query = $this->db->insert('support_work_task', $data);
            return $query;
        }
        
        public function insert_subtask($data){
            $query = $this->db->insert('support_work_subtask', $data);
            return $query;
        }
        
        public function insert_support_work($data){
            $query = $this->db->insert('support_work', $data);
            return $query;
        }
        
        public function delete_support_work($id){
            $query = $this->db->query("DELETE FROM support_work WHERE id = '$id' ");
        }
        
        public function delete_task($id){
            $query = $this->db->query("DELETE FROM support_work_task WHERE id = '$id' ");
        }
        
        public function delete_subtask($id){
            $query = $this->db->query("DELETE FROM support_work_subtask WHERE id = '$id' ");
        }
        
        public function update_support_work_details($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('support_work', $data);
          return $query;
        }
        
        public function update_task($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('support_work_task', $data);
          return $query;
        }
        
        public function update_subtask($id, $data){
          $this->db->where('id', $id);
          $query = $this->db->update('support_work_subtask', $data);
          return $query;
        }
        
        public function display_all_children(){
            $query = $this->db->get('children')->result();
            return $query;
        }
        
       // End of Support Work
    }

?>