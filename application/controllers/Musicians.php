<?php
class Musicians extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Musician');
    }

    public function index(){
        $musicians = $this->Musician->getAll();
        $users = $this->db->get('Users')->result();  // Get all users from the Users table
        $data['musicians'] = $musicians;
        $data['users'] = $users;  // Pass users to view
        $data['musician'] = null; // Field for selected musician
        $this->load->view('header');
        $this->load->view('Musicians/index', $data);
        $this->load->view('footer');
    }
    

    public function save(){
        $data = array(
            'id_us' => $this->input->post('id_us'),
            'stage_name_mus' => $this->input->post('stage_name_mus'),
            'biography_mus' => $this->input->post('biography_mus')
        );
        $this->Musician->insert($data);
        redirect('Musicians/index');
    }

    public function update(){
        $id = $this->input->post('id_mus');
        $data = array(
            'id_us' => $this->input->post('id_us'),
            'stage_name_mus' => $this->input->post('stage_name_mus'),
            'biography_mus' => $this->input->post('biography_mus')
        );
        $this->Musician->updateById($id, $data);
        redirect('Musicians/index');
    }

    public function delete($id) {
        $this->Musician->deleteById($id);
        redirect('Musicians/index');
    }
    
    public function select($id){
        $musicians = $this->Musician->getAll();
        $user = $this->db->get_where('Users', ['id_us' => $id])->row();  // Get the user related to the musician
        $musician = $this->Musician->getById($id);  // Get the details of the musician
        $data['musicians'] = $musicians;
        $data['users'] = $this->db->get('Users')->result();  // Get all users
        $data['musician'] = $musician;
        $data['user'] = $user;  // Pass the associated user to the musician
        $this->load->view('header');
        $this->load->view('Musicians/index', $data);
        $this->load->view('footer');
    }
    
}
?>
