<?php
class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User');
    }

    public function index(){
        $users = $this->User->getAll();
        $data['users'] = $users;
        $data['user'] = null; // Field for selected user
        $this->load->view('header');
        $this->load->view('Users/index', $data);
        $this->load->view('footer');
    }

    public function save(){
        $data = array(
            'first_name_us' => $this->input->post('first_name_us'),
            'last_name_us' => $this->input->post('last_name_us'),
            'email_us' => $this->input->post('email_us'),
            'password_us' => $this->input->post('password_us'),
            'role_us' => $this->input->post('role_us')
        );
        $this->User->insert($data);
        redirect('Users/index');
    }

    public function update(){
        $id = $this->input->post('id_us');
        $data = array(
            'first_name_us' => $this->input->post('first_name_us'),
            'last_name_us' => $this->input->post('last_name_us'),
            'email_us' => $this->input->post('email_us'),
            'password_us' => $this->input->post('password_us'),
            'role_us' => $this->input->post('role_us')
        );
        $this->User->updateById($id, $data);
        redirect('Users/index');
    }

    public function delete($id) {
        $this->User->deleteById($id);
        redirect('Users/index');
    }
    
    public function select($id){
        $users = $this->User->getAll();
        $user = $this->User->getById($id); // selected user
        $data['users'] = $users;
        $data['user'] = $user;
        $this->load->view('header');
        $this->load->view('Users/index', $data);
        $this->load->view('footer');
    }
}
?>
