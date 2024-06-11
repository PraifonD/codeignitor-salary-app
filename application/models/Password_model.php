<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Password_model extends CI_Model {


// ---------------UPDATE OWN PASSWORD -----------------
        public function admin_update_own_password()
        {
                $data = array(
                        'admin_password' => hash('sha1', $this->input->post('admin_password1'))
                );
                $this->db->where('admin_id', $this->input->post('admin_id'));

                $this->db->update('tbl_admin', $data);

        }
        public function employee_update_own_password()
        {
                $data = array(
                        'employee_password' => hash('sha1', $this->input->post('employee_password1'))
                );
                $this->db->where('employee_id', $this->input->post('employee_id'));

                $this->db->update('tbl_employee', $data);

        }
}