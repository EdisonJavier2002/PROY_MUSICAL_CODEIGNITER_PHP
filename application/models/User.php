<?php
class User extends CI_Model{
    // Constructor
    function __construct()
    {
        parent::__construct();
    }

    // Insert a new user into the database
    function insert($data){
        $this->db->insert('Users', $data);
    }

    // Retrieve all users
    function getAll(){
        $userList = $this->db->get('Users'); // SELECT * FROM Users
        if ($userList->num_rows() > 0){
            return $userList->result(); // Return the list of users if they exist
        } else {
            return false; // When no users are registered
        }
    }

    // Delete a user by ID
    function deleteById($id){
        $this->db->where('id_us', $id);
        return $this->db->delete('Users');
    }

    // Retrieve a specific user by ID
    function getById($id){
        $this->db->where('id_us', $id); // SELECT * FROM Users WHERE id_us = 6;
        $user = $this->db->get('Users');
        if ($user->num_rows() > 0){
            return $user->row(); // Return the user if they exist
        } else {
            return false; // When the user is not found
        }
    }

    // Update a user by ID
    function updateById($id, $data){
        $this->db->where('id_us', $id);
        return $this->db->update('Users', $data);
    }
}
?>