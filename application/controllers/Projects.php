<?php
class Projects extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Project');
        $this->load->model('Musician'); // To get the musicians
    }

    public function index() {
        $projects = $this->Project->getAll(); // Get all projects
        $musicians = $this->Musician->getAll(); // Get all musicians
        $data['projects'] = $projects;
        $data['musicians'] = $musicians;
        $data['project'] = null; // Selected project, if necessary
        $this->load->view('header');
        $this->load->view('Projects/index', $data);
        $this->load->view('footer');
    }

    public function save() {
        $data = array(
            'id_mus' => $this->input->post('id_mus'),
            'name_proj' => $this->input->post('name_proj'),
            'description_proj' => $this->input->post('description_proj'),
            'type_proj' => $this->input->post('type_proj')
        );
        $this->Project->insert($data);
        redirect('Projects/index');
    }

    public function update() {
        $id = $this->input->post('id_proj');
        $data = array(
            'id_mus' => $this->input->post('id_mus'),
            'name_proj' => $this->input->post('name_proj'),
            'description_proj' => $this->input->post('description_proj'),
            'type_proj' => $this->input->post('type_proj')
        );
        $this->Project->updateById($id, $data);
        redirect('Projects/index');
    }

    public function delete($id) {
        $this->Project->deleteById($id);
        redirect('Projects/index');
    }

    public function select($id) {
        $projects = $this->Project->getAll(); // Get all projects
        $musicians = $this->Musician->getAll(); // Get all musicians
        $project = $this->Project->getById($id); // Get the selected project
        $data['projects'] = $projects;
        $data['musicians'] = $musicians;
        $data['project'] = $project; // Move selected project to view
        $this->load->view('header');
        $this->load->view('Projects/index', $data);
        $this->load->view('footer');
    }
}
?>
