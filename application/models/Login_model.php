<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

        public function fetch_admin_login($username, $password)
        {
                $sql = "
                        SELECT *
                        FROM tbl_admin
                        JOIN tbl_employee ON tbl_admin.employee_id = tbl_employee.employee_id
                        WHERE tbl_admin.admin_username = ? AND tbl_admin.admin_password = ?;
                ";
                $query = $this->db->query($sql, array($username, $password))->row();
                return $query;
        }

        public function fetch_employee_login($username, $password)
        {
                $this->db->where('employee_username', $username);
                $this->db->where('employee_password', $password);
                $query = $this->db->get('tbl_employee');
                return $query->row();
        }

}