<?php
class Album extends CI_Model {
    // Constructor
    function __construct() {
        parent::__construct();
    }

    // Insert a new album into the database
    function insert($data) {
        $this->db->insert('Albums', $data);
    }

    // Retrieve all albums
    function getAll() {
        $albumList = $this->db->get('Albums');
        if ($albumList->num_rows() > 0) {
            return $albumList->result(); // Return list of albums
        } else {
            return false; // No albums found
        }
    }

    // Retrieve a specific album by ID
    function getById($id) {
        $this->db->where('id_alb', $id);
        $album = $this->db->get('Albums');
        if ($album->num_rows() > 0) {
            return $album->row(); // Return the album if it exists
        } else {
            return false; // Album not found
        }
    }

    // Update an album by ID
    function updateById($id, $data) {
        $this->db->where('id_alb', $id);
        return $this->db->update('Albums', $data);
    }

    // Delete an album by ID
    function deleteById($id) {
        $this->db->where('id_alb', $id);
        return $this->db->delete('Albums');
    }
}
?>
