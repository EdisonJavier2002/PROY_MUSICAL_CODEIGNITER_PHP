<?php
class Project extends CI_Model {
    // Constructor
    function __construct() {
        parent::__construct();
    }

    // Insert a new project into the database
    function insert($data) {
        $this->db->insert('Projects', $data);
    }

    // Retrieve all projects
    function getAll() {
        $projectList = $this->db->get('Projects');
        if ($projectList->num_rows() > 0) {
            return $projectList->result(); // Return list of projects
        } else {
            return false; // No projects found
        }
    }

    // Retrieve a specific project by ID
    function getById($id) {
        $this->db->where('id_proj', $id);
        $project = $this->db->get('Projects');
        if ($project->num_rows() > 0) {
            return $project->row(); // Return the project if it exists
        } else {
            return false; // Project not found
        }
    }

    // Update a project by ID
    function updateById($id, $data) {
        $this->db->where('id_proj', $id);
        return $this->db->update('Projects', $data);
    }

    // Delete a project by ID
    function deleteById($id) {
        $this->db->where('id_proj', $id);
        return $this->db->delete('Projects');
    }
}
?>
