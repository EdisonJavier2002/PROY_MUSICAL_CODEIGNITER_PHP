<?php
class Albums extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Album');
        $this->load->model('Project'); // For fetching related projects
    }

    public function index() {
        $albums = $this->Album->getAll(); // Get all albums
        $projects = $this->Project->getAll(); // Get all projects
        $data['albums'] = $albums;
        $data['projects'] = $projects;
        $data['album'] = null; // Selected album if necessary
        $this->load->view('header');
        $this->load->view('Albums/index', $data);
        $this->load->view('footer');
    }

    public function save() {
        $data = array(
            'id_proj' => $this->input->post('id_proj'),
            'name_alb' => $this->input->post('name_alb'),
            'release_date_alb' => $this->input->post('release_date_alb'),
            'cover_alb' => $this->input->post('cover_alb')
        );
        $this->Album->insert($data);
        redirect('Albums/index');
    }

    public function update() {
        $id = $this->input->post('id_alb');
        $data = array(
            'id_proj' => $this->input->post('id_proj'),
            'name_alb' => $this->input->post('name_alb'),
            'release_date_alb' => $this->input->post('release_date_alb'),
            'cover_alb' => $this->input->post('cover_alb')
        );
        $this->Album->updateById($id, $data);
        redirect('Albums/index');
    }

    public function delete($id) {
        $this->Album->deleteById($id);
        redirect('Albums/index');
    }

    public function select($id) {
        $albums = $this->Album->getAll(); // Get all albums
        $projects = $this->Project->getAll(); // Get all projects
        $album = $this->Album->getById($id); // Get selected album
        $data['albums'] = $albums;
        $data['projects'] = $projects;
        $data['album'] = $album; // Pass selected album to the view
        $this->load->view('header');
        $this->load->view('Albums/index', $data);
        $this->load->view('footer');
    }
}
?>
