<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Payroll_model extends CI_Model
{
    // ---------------QUERY-----------------       
    public function list_all_payroll()
    {
        $sql = "
        SELECT p.payroll_id, e.employee_id, p.payroll_month, e.employee_name, p.payroll_tax, r.status_name,r.color ,  p.dateCreate as dateCreate,  p.payroll_status, p.base_salary, p.payroll_tax, p.payroll_ss, p.payroll_total

        FROM tbl_payroll as p
        JOIN tbl_employee as e
        ON p.employee_id  = e.employee_id
        JOIN tbl_payroll_status as r
        ON p.payroll_status = r.id
        ORDER BY p.payroll_id DESC;

                ";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

    // ------ Adding Payroll ------

    public function add_payroll()
    {
        $data = array(
            'payroll_month' => $this->input->post('payroll_month') . "-01",
            'employee_id' => $this->input->post('employee_id'),
            'base_salary' => $this->input->post('base_salary'),            
            'payroll_ss' => $this->input->post('payroll_ss'),            
            'payroll_tax' => $this->input->post('payroll_tax'),            
            'payroll_total' => $this->input->post('payroll_total'),            
            'payroll_status' => $this->input->post('payroll_status'),
        );
        $query = $this->db->insert('tbl_payroll', $data);
    }

    public function getPayrollInfo($employee_id)
    {
        $sql = "
                        SELECT * 
                        FROM tbl_payroll 
                        WHERE tbl_payroll.employee_id = $employee_id
                        ORDER BY tbl_payroll.payroll_id DESC;
                ";
        $query = $this->db->query($sql);
        return $query->row($employee_id);

    }

    public function LatestPayrollInfo($employee_id)
    {


                $sql = "
                SELECT p.payroll_id, e.employee_id, p.payroll_month, e.employee_name, p.payroll_tax, r.status_name,r.color ,  p.dateCreate as dateCreate,  p.payroll_status, p.base_salary, p.payroll_tax, p.payroll_ss, p.payroll_total
                FROM tbl_payroll as p
                JOIN tbl_employee as e
                ON p.employee_id  = e.employee_id
                JOIN tbl_payroll_status as r
                ON p.payroll_status = r.id
                WHERE p.employee_id = $employee_id
                ORDER BY p.payroll_id DESC;
        
                        ";
        $query = $this->db->query($sql)->result();
        return $query;

    }
    // ---------------DELETE PAYROLL-----------------
    public function delete_payroll($payroll_id)
    {
            $this->db->delete('tbl_payroll', array('payroll_id' => $payroll_id));
    }

        // ---------------DELETE PAYROLL-----------------
        public function approve_payroll()
        {
                $data = array(
                        
                        'payroll_status' => $this->input->post('payroll_status'),
                );
                $this->db->where('payroll_id', $this->input->post('payroll_id'));
                $this->db->update('tbl_payroll', $data);
        }


        public function sumUnpay()
        {
           $sql = "SELECT SUM(payroll_total) as totalUnpay
           FROM tbl_payroll
           WHERE MONTH(payroll_month) = MONTH(CURRENT_DATE)
           AND YEAR(payroll_month) = YEAR(CURRENT_DATE)
           AND `payroll_status` = 2;
           ";
           $query = $this->db->query($sql);
           return $query->row();
        }


        public function sumPaid()
        {
           $sql = "SELECT SUM(payroll_total) as totalPaid
           FROM tbl_payroll
           WHERE MONTH(payroll_month) = MONTH(CURRENT_DATE)
           AND YEAR(payroll_month) = YEAR(CURRENT_DATE)
           AND `payroll_status` = 1;
           ";
           $query = $this->db->query($sql);
           return $query->row();
        }


}
