<?php
class Project extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function add_solution_view($project_id, $student_course_id)
    {
        $this->load->helper('form'); 
        $this->load->library('form_validation');
        
        $data['form_css'] = array('class' => 'navbar-form navbar-left');
    	$data['project_id'] = $project_id;
    	$data['student_course_id'] = $student_course_id;
    	$data['dynamic_template'] = 'students/add_solution';

        $this->load->view('templates/main_template', $data);
    }

    public function add_solution_submit(){
    	$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('cm_solutions_model');

        $project_id = $this->input->post('project_id');
        $student_course_id = $this->input->post('student_course_id');

        $this->form_validation->set_rules('student_solution', 'Решение (линк)', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $this->add_solution_view($project_id, $student_course_id);
        }
        else
        {
        	$this->cm_solutions_model->add_student_solution();
        	$this->project_details($project_id, $student_course_id);
        }
    }
}
