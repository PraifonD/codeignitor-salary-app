<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
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



        // --------------- ADMIN INFO -----------------
        public function list_all_admin()
        {
                $sql = "
                        SELECT * 
                        FROM tbl_admin
                        JOIN tbl_employee
                        ON tbl_employee.employee_id = tbl_admin.employee_id;
                ";
                $rs = $this->db->query($sql)->result();
                return $rs;
        }

        public function active_admin_count()
        {
                $sql = "
                        SELECT COUNT(*) AS admin_count
                        FROM tbl_admin
                        JOIN tbl_employee
                        ON tbl_employee.employee_id = tbl_admin.employee_id;
                        WHERE employee_status = 1
                ";

                $query = $this->db->query($sql);

                if (!$query) {
                        echo $this->db->error();
                        return 0;
                }
                $result = $query->row();
                return $result->admin_count;
        }
        // --------------- EMPLOYEE INFO --------------- 

        public function list_all_employee()
        {
                $sql = "
                        SELECT * 
                        FROM tbl_employee
                        JOIN tbl_position
                        ON tbl_employee.employee_position_id = tbl_position.position_id;
                ";
                $rs = $this->db->query($sql)->result();
                return $rs;
        }

        public function active_employee_count()
        {
                $sql = "
                        SELECT COUNT(*) AS employee_count
                        FROM tbl_employee
                        WHERE employee_employstatus = 1
                ";

                $query = $this->db->query($sql);

                if (!$query) {
                        echo $this->db->error();
                        return 0;
                }
                $result = $query->row();
                return $result->employee_count;
        }

        // ---------- payroll info ---------- 
        public function list_all_payroll()
        {
                $sql = "



                SELECT e.employee_id, p.payroll_month, e.employee_name, s.salary_basesalary, p.payroll_tax, r.status_name,r.color , max(p.dateCreate) as dateCreate, max(s.dateCreate) as sdateCreate, p.payroll_status

                FROM tbl_payroll as p
                JOIN tbl_employee as e
                ON p.employee_id  = e.employee_id
                JOIN tbl_salary as s
                ON p.salary_id = s.salary_id
                JOIN tbl_payroll_status as r
                ON p.payroll_status = r.id
                GROUP BY p.employee_id;

                ";
                $rs = $this->db->query($sql)->result();
                return $rs;
        }

        public function insert_admin()
        {
                $data = array(
                        'admin_name' => $this->input->post('admin_name'),
                        'admin_email' => $this->input->post('admin_email'),
                        'admin_pwd' => sha1($this->input->post('admin_pwd'))
                );
                $query = $this->db->insert('tbl_admin', $data);
        }


        //show form edit
        public function read($id)
        {
                $this->db->where('id', $id);
                $query = $this->db->get('tbl_admin');
                if ($query->num_rows() > 0) {
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }

        public function update_admin()
        {
                $data = array(
                        'admin_name' => $this->input->post('admin_name'),
                        'admin_status' => $this->input->post('admin_status')
                );
                $this->db->where('id', $this->input->post('id'));
                $query = $this->db->update('tbl_admin', $data);
        }

        
}
