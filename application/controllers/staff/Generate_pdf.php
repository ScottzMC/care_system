<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_pdf extends CI_Controller {
    
    // Procedure 
    
    function procedure($id){
        $this->load->model('Procedure_model');
        $data['detail'] = $this->Procedure_model->display_procedure_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/procedure', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'procedure_'.$code, false);
    }
    
    // End of Procdure
    
    // Children 
    
    function medical_history($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_medical_report_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/medical_history', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'medical_history_'.$unique_code, false);
    }
    
    function personal_education($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_personal_education_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/personal_education', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'personal_education_'.$code, false);
    }
    
    function finance_information($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_finance_information_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/finance_information', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'finance_information_'.$unique_code, false);
    }
    
    function foster_care($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_foster_care_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/foster_care', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'foster_care_'.$unique_code, false);
    }
    
    function incident($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_incident_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/incident', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'incident_'.$unique_code, false);
    }
    
    function edt($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_absences_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/edt', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'edt_'.$unique_code, false);
    }
    
    function abilities_evaluation($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_abilities_evaluation_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/abilities_evaluation', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'abilities_evaluation_'.$unique_code, false);
    }
    
    function contact_detail($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_contact_detail_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/contact_detail', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'contact_detail_'.$unique_code, false);
    }
    
    function case_recording($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_case_recording_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/case_recording', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'case_recording_'.$unique_code, false);
    }
    
    function sanction_reward($code){
        $this->load->model('Children_model');
        $data['detail'] = $this->Children_model->display_sanction_rewards_by_code($code);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $unique_code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/sanction_reward', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'sanction_reward_'.$unique_code, false);
    }
    
    // End of Children 
    
    // House
    
    function daily_log($id){
        $this->load->model('Daily_log_model');
        $data['detail'] = $this->Daily_log_model->display_daily_log_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/daily_log', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'daily_log_'.$code, false);
    }
    
    function handover($id){
        $this->load->model('Handover_model');
        $data['detail'] = $this->Handover_model->display_handover_by_handover_id($id);
        $data['ingoing'] = $this->Handover_model->display_ingoing_by_handover_id($id);
        $data['outgoing'] = $this->Handover_model->display_outgoing_by_handover_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/handover', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'handover_'.$code, false);
    }
    
    function health_safety($id){
        $this->load->model('Health_safety_model');
        $data['detail'] = $this->Health_safety_model->display_health_safety_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/health_safety', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'health_safety_'.$code, false);
    }

    function reporting($id){
        $this->load->model('Reporting_model');
        $data['detail'] = $this->Reporting_model->display_reporting_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/reporting', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'reporting_'.$code, false);
    }
    
    function staff_communication($id){
        $this->load->model('Staff_communication_model');
        $data['detail'] = $this->Staff_communication_model->display_staff_communication_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/staff_communication', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'staff_communication_'.$code, false);
    }
    
    function guest_ban($id){
        $this->load->model('Guest_ban_model');
        $data['detail'] = $this->Guest_ban_model->display_guest_ban_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/guest_ban', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'guest_ban_'.$code, false);
    }
    
    function support_work($id){
        $this->load->model('Support_work_model');
        $data['detail'] = $this->Support_work_model->display_support_work_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/support_work', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'support_work_'.$code, false);
    }
    
    function support_plan($id, $code){
        $this->load->model('Support_plan_model');
        $data['detail'] = $this->Support_plan_model->display_support_plan_by_id($id);
        $data['support_comment'] = $this->Support_plan_model->display_area_of_support_comment($code);
        
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/support_plan', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'support_plan_'.$code, false);
    }
    
    function risk_assessment($id){
        $this->load->model('Risk_assessment_model');
        $data['detail'] = $this->Risk_assessment_model->display_risk_assessment_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/risk_assessment', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'risk_assessment_'.$code, false);
    }
    
    function keywork_session($id){
        $this->load->model('Keywork_session_model');
        $data['detail'] = $this->Keywork_session_model->display_keywork_session_by_id($id);
        $shuffle = strtolower(str_shuffle("ABCDTUVXY"));
        $unique = rand(000, 999);
        $code = $shuffle.$unique;
            
        $this->load->library('pdf');
        $view = $this->load->view('pdf/keywork_session', $data, true);
        //$html = $this->load->view('admin/house/reporting/pdf', [], true);
        $this->pdf->createPDF($view, 'keywork_session_'.$code, false);
    }
    
    // End of House
}
?>