<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		//chk $userdata
		if (!($this->session->userdata('employee_username'))) {
			$this->session->set_flashdata('login_required', TRUE);
			redirect('login/logout', 'refresh');
		}

		$this->load->model('general_model');
		$this->load->model('password_model');
		$this->load->model('employee_model');
		$this->load->model('position_model');
		$this->load->model('payroll_model');

	}

	public function index()
	{
		$data['userData'] = $this->session->userdata;
		$data['employee'] = $this->employee_model->get_employee_info($data['userData']['employee_id']);
		$data['ThDate'] = $this->general_model->ThDate();

		$this->load->view('template/header_employee', $data);
		$this->load->view('employee/dashboard', $data);
		$this->load->view('template/footer');
	}

// ====== Password Menu ======= //
	public function password()
	{
		$data['userData'] = $this->session->userdata;

		$this->load->view('template/header_employee', $data);
		$this->load->view('employee/employee_password', $data);
		$this->load->view('template/footer');
	}

	public function editing_password()
	{
		// echo '<pre>';
		// print_r($_POST);s
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('employee_id', 'id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('employee_password1', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('employee_password2', 'Password Confirmation', 'trim|required|matches[employee_password1]', array('matches' => 'รหัสผ่านไม่ตรงกัน'));

		if ($this->form_validation->run() == FALSE) {

			$data['userData'] = $this->session->userdata;

			$this->load->view('template/header_employee', $data);
			$this->load->view('employee/employee_password', $data);
			$this->load->view('template/footer');
		} else {
			$this->password_model->employee_update_own_password();
			$this->session->set_flashdata('save_success', TRUE);

			redirect('employee', 'refresh');
		}
	}

// ====== Employee Menu ======= //

	public function profile()
	{	
		
		$data['userData'] = $this->session->userdata;
		$data['employee'] = $this->employee_model->get_employee_info($data['userData']['employee_id']);
		$data['error'] = ' ';
		
		$this->load->view('template/header_employee', $data);
		$this->load->view('employee/profile', $data);
		$this->load->view('template/footer');
	}

	// ---------------EDIT EMPLOYEE-----------------
	public function edit_profile()
	{
		$data['userData'] = $this->session->userdata;
		$employee_id = $data['userData']['employee_id'];
		$data['employee'] = $this->employee_model->get_employee_info($employee_id);
		$data['employtype'] = $this->employee_model->list_all_employtype();
		$data['position'] = $this->position_model->list_all_position();
		$data['error'] = '';

		$this->load->view('template/header_employee', $data);
		$this->load->view('employee/employee_form_edit', $data);
		$this->load->view('template/footer');
	}

	public function editing_profile()
	{
		// Form Validation

			$this->form_validation->set_rules(
				'employee_name',
				'ชื่อ-สกุล',
				'trim|required|min_length[4]',
				array(
					'required' => 'กรุณากรอก%s',
					'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว'
				)
			);

			$this->form_validation->set_rules(
				'employee_marital',
				'สถานะสมรส',
				'trim|required',
				array(
					'required' => 'กรุณาเลือก%s',
				)
			);
			$this->form_validation->set_rules('employee_address', 'ที่อยู่', 'trim');
			$this->form_validation->set_rules(
				'employee_phone',
				'เบอร์โทรศัพท์',
				'trim|required|is_natural',
				array('required' => 'กรุณากรอก%s', 'is_natural' => 'กรุณาใส่เฉพาะตัวเลข')
			);
			$this->form_validation->set_rules(
				'employee_email',
				'อีเมลล์',
				'trim|min_length[5]|valid_email|required',
				array('required' => 'กรุณากรอก%s', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว', 'valid_email' => 'รูปแบบ %s ไม่ถูกต้อง')
			);
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			$data['userData'] = $this->session->userdata;
			$employee_id = $data['userData']['employee_id'];
			$data['employee'] = $this->employee_model->get_employee_info($employee_id);
			$data['employtype'] = $this->employee_model->list_all_employtype();
			$data['position'] = $this->position_model->list_all_position();
			$data['error'] = '';

			$this->load->view('template/header_employee', $data);
			$this->load->view('employee/employee_form_edit', $data);
			$this->load->view('template/footer');
		} else {
			// echo '<pre>';
			// print_r($_POST);
			// exit;
			$this->employee_model->editing_own_employee();
			$this->session->set_flashdata('save_success', TRUE);

			redirect('employee/profile', 'refresh');
	} 
	}

	// ====== Payroll Menu ======= //

	public function employee_payroll_list()
	{	

		$data['userData'] = $this->session->userdata;
		$employee_id = $data['userData']['employee_id'];
		$data['latestPayroll'] = $this->payroll_model->LatestPayrollInfo($employee_id);
		$data['error'] = ' ';
		
		$this->load->view('template/header_employee', $data);
		$this->load->view('employee/employee_payroll_list', $data);
		$this->load->view('template/footer');
	}
}
