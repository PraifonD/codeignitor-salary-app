<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('login/login_view');
        $this->load->view('template/footer');
    }

    public function authen()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('login_error', TRUE);
            redirect('login', 'refresh');

        } else {
            //chk user & password from tables
            $user = $this->security->xss_clean($this->input->post('username'));

            $pwd = hash('sha1', $this->security->xss_clean($this->input->post('password')));

            $isAdmin = $this->login_model->fetch_admin_login($user, $pwd);
            $isEmployee = $this->login_model->fetch_employee_login($user, $pwd);

            if (!empty($isEmployee)) {

                //create session var & value
                $dataSession = array(
                    'employee_id'          => $isEmployee->employee_id,
                    'employee_status'      => $isEmployee->employee_status,
                    'employee_username'    => $isEmployee->employee_username,
                    'employee_profile_img'    => $isEmployee->employee_profile_img
                );

                //คำสั่งสร้าง session
                $this->session->set_userdata($dataSession);
                
                //chk if active employee
                $employee_status = $_SESSION['employee_status'];

                if ($employee_status == 1) {
                    redirect('employee', 'refresh');

                } else { //login ไม่ active
                    $this->session->set_flashdata('login_notactive', TRUE);
                    $this->session->unset_userdata(array('employee_id', 'employee_status', 'employee_username', 'employee_profile_img'));
                    redirect('login', 'refresh');
                }
            } else if (!empty($isAdmin)) {

                //create session var & value
                $dataSession = array(
                    'admin_id'          => $isAdmin->admin_id,
                    'employee_status'   => $isAdmin->employee_status,
                    'employee_profile_img'   => $isAdmin->employee_profile_img,
                    'admin_username'    => $isAdmin->admin_username
                );

                //คำสั่งสร้าง session
                $this->session->set_userdata($dataSession);

                //chk if active employee
                $employee_status = $_SESSION['employee_status'];

                if ($employee_status == 1) {
                    //chk if active employee;
                    redirect('admin', 'refresh');
                } else { 
                    //login ไม่ active
                    $this->session->set_flashdata('login_notactive', TRUE);
                    $this->session->unset_userdata(array('employee_id', 'employee_status', 'admin_username', 'employee_profile_img'));
                    redirect('login', 'refresh');
                }

            } 
            else { //login ไม่ถูกต้อง
                $this->session->set_flashdata('login_notactive', TRUE);
                redirect('login', 'refresh');
            }
        } 
    }

    public function logout()
    {
        $this->session->set_flashdata('logout_success', TRUE);
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }


}