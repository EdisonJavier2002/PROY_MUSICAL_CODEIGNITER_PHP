<?php
class Musician extends CI_Model{
    // Constructor
    function __construct(){
        parent::__construct();
    }

    // Insert a new musician into the database
    function insert($data){
        $this->db->insert('Musicians', $data);
    }

    // Retrieve all musicians
    function getAll(){
        $musicianList = $this->db->get('Musicians'); // SELECT * FROM Musicians
        if ($musicianList->num_rows() > 0){
            return $musicianList->result(); // Return list of musicians
        } else {
            return false; // No musicians found
        }
    }

    // Delete a musician by ID
    function deleteById($id){
        $this->db->where('id_mus', $id);
        return $this->db->delete('Musicians');
    }

    // Retrieve a specific musician by ID
    function getById($id){
        $this->db->where('id_mus', $id); // SELECT * FROM Musicians WHERE id_mus = 6;
        $musician = $this->db->get('Musicians');
        if ($musician->num_rows() > 0){
            return $musician->row(); // Return the musician if it exists
        } else {
            return false; // No musician found
        }
    }

    // Update a musician by ID
    function updateById($id, $data){
        $this->db->where('id_mus', $id);
        return $this->db->update('Musicians', $data);
    }
}
?>
