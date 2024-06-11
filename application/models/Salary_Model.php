<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Salary_model extends CI_Model
{

        // --------------- LOG IN -----------------
        public function fetch_user_login($username, $password)
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

        // ---------------SALARY LIST -----------------
        public function list_all_salary()
        {
                $query = $this->db->get('tbl_salary');
                return $query->result();
        }
        // ---------------ADD SALARY -----------------


        public function insert_salary()
        {
                $data = array(
                        'employee_id' => $this->input->post('employee_id'),
                        'salary_basesalary' => $this->input->post('salary_basesalary'),
                );
                $query = $this->db->insert('tbl_salary', $data);
        }
        // ---------------Get one ID Salary-----------------

        public function getSalaryInfo($employee_id)
        {
            $sql = "
                            SELECT * 
                            FROM tbl_salary
                            WHERE tbl_salary.employee_id = $employee_id;
                    ";
            $query = $this->db->query($sql);
            return $query->row($employee_id);
    
        }

}