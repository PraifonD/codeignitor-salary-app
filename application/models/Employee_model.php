<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_model extends CI_Model
{

// ---------------QUERY-----------------   
        public function list_all_employtype()
        {
                $query = $this->db->get('tbl_employtype');
                return $query->result();
        }
        
        public function list_all_employee()
        {       
                $sql = "
                        SELECT * 
                        FROM tbl_employee
                        JOIN tbl_position ON tbl_employee.employee_position_id = tbl_position.position_id
                        JOIN tbl_employtype ON tbl_employee.employee_employtype = tbl_employtype.employtype_id
                ";
                $rs = $this->db->query($sql)->result();
                return $rs;

        }

        // ------ Specific Query
        public function get_employee_info($employee_id)
        {
                $sql = "
                        SELECT * 
                        FROM tbl_employee
                        JOIN tbl_position ON tbl_employee.employee_position_id = tbl_position.position_id
                        JOIN tbl_employtype ON tbl_employee.employee_employtype = tbl_employtype.employtype_id
                        WHERE tbl_employee.employee_id = ?
                ";
                $query = $this->db->query($sql, array($employee_id));
                return $query->row();
        }

        public function active_employee_count()
        {
                $sql = "
                        SELECT COUNT(*) AS employee_count
                        FROM tbl_employee
                        WHERE employee_status = 1
                ";

                $query = $this->db->query($sql);

                if (!$query) {
                        echo $this->db->error();
                        return 0;
                }
                $result = $query->row();
                return $result->employee_count;
        }

// ---------------ADD EMPLOYEE-----------------
        public function add_employee()
        {
                $data = array(
                        'employee_username' => $this->input->post('employee_username'),
                        'employee_password' => hash('sha1', $this->input->post('employee_password')),
                        'employee_name' => $this->input->post('employee_name'),
                        'employee_citizen_id' => $this->input->post('employee_citizen_id'),
                        'employee_birthdate' => $this->input->post('employee_birthdate'),
                        'employee_gender' => $this->input->post('employee_gender'),
                        'employee_marital' => $this->input->post('employee_marital'),
                        'employee_address' => $this->input->post('employee_address'),
                        'employee_phone' => $this->input->post('employee_phone'),
                        'employee_email' => $this->input->post('employee_email'),
                        'employee_employtype' => $this->input->post('employee_employtype'),
                        'employee_position_id' => $this->input->post('employee_position_id'),
                        'employee_profile_img' => $this->upload->file_name
                );

                $this->db->insert('tbl_employee', $data);

                // Retrieve the auto-incremented employee id
                $employee_id = $this->db->insert_id();
                $salary_data = array(
                        'employee_id' => $employee_id,
                        'salary_basesalary' => $this->input->post('salary_basesalary'),
                );

                $this->db->insert('tbl_salary', $salary_data);
        }

// ---------------EDIT EMPLOYEE-----------------

        public function editing_own_employee()
        {
                $data = array(
                        'employee_name' => $this->input->post('employee_name'),
                        'employee_marital' => $this->input->post('employee_marital'),
                        'employee_address' => $this->input->post('employee_address'),
                        'employee_phone' => $this->input->post('employee_phone'),
                        'employee_email' => $this->input->post('employee_email')
                );
                $this->db->where('employee_id', $this->input->post('employee_id'));
                $this->db->update('tbl_employee', $data);
        }

        public function editing_employee()
        {
                $data = array(
                        'employee_name' => $this->input->post('employee_name'),
                        'employee_citizen_id' => $this->input->post('employee_citizen_id'),
                        'employee_birthdate' => $this->input->post('employee_birthdate'),
                        'employee_gender' => $this->input->post('employee_gender'),
                        'employee_marital' => $this->input->post('employee_marital'),
                        'employee_address' => $this->input->post('employee_address'),
                        'employee_phone' => $this->input->post('employee_phone'),
                        'employee_email' => $this->input->post('employee_email'),
                        'employee_employtype' => $this->input->post('employee_employtype'),
                        'employee_position_id' => $this->input->post('employee_position_id'),
                );
                $this->db->where('employee_id', $this->input->post('employee_id'));
                $this->db->update('tbl_employee', $data);
        }

        public function editing_employee_with_img()
        {  
                $data = array(
                        'employee_name' => $this->input->post('employee_name'),
                        'employee_citizen_id' => $this->input->post('employee_citizen_id'),
                        'employee_birthdate' => $this->input->post('employee_birthdate'),
                        'employee_gender' => $this->input->post('employee_gender'),
                        'employee_marital' => $this->input->post('employee_marital'),
                        'employee_address' => $this->input->post('employee_address'),
                        'employee_phone' => $this->input->post('employee_phone'),
                        'employee_email' => $this->input->post('employee_email'),
                        'employee_employtype' => $this->input->post('employee_employtype'),
                        'employee_position_id' => $this->input->post('employee_position_id'),
                        'employee_profile_img' => $this->upload->file_name
                );
                $this->db->where('employee_id', $this->input->post('employee_id'));
                $this->db->update('tbl_employee', $data);
        }

// ---------------EDIT PASSWORD EMPLOYEE-----------------
        public function update_password_employee()
        {
                $data = array(
                        'employee_password' => hash('sha1', $this->input->post('employee_password1'))
                );
                $this->db->where('employee_id', $this->input->post('employee_id'));
                $this->db->update('tbl_employee', $data);
        }

// ---------------DELETE EMPLOYEE-----------------
        public function delete_employee($employee_id)
        {
                $this->db->delete('tbl_employee', array('employee_id' => $employee_id));
        }

        public function countFull()
        {
           $sql = "SELECT COUNT(*) as totalFull  
           FROM tbl_employee
           WHERE employee_employtype = 1 ;
           ";
           $query = $this->db->query($sql);
           return $query->row();
        }

        public function countPart()
        {
           $sql = "SELECT COUNT(*) as totalPart  
           FROM tbl_employee
           WHERE employee_employtype = 2 ;
           ";
           $query = $this->db->query($sql);
           return $query->row();
        }

        public function countTrainee()
        {
           $sql = "SELECT COUNT(*) as totalTrainee  
           FROM tbl_employee
           WHERE employee_employtype = 3 ;
           ";
           $query = $this->db->query($sql);
           return $query->row();
        }
}
