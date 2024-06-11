<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Position_model extends CI_Model
{

    public function list_all_position()
    {
        $query = $this->db->get('tbl_position');
        return $query->result();
    }

    public function get_position_info($position_id)
    {
        $this->db->where('position_id', $position_id);
        $query = $this->db->get('tbl_position');
        return $query->row();
    }
    
    public function adding_position()
    {
        $data = array(
            'position_name' => $this->input->post('position_name'),
            'position_department' => $this->input->post('position_department'),
        );
        $query = $this->db->insert('tbl_position', $data);
    }

    public function delete_position($position_id)
    {
        $this->db->delete('tbl_position', array('position_id' => $position_id));
    }

}
