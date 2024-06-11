<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//chk $userdata
		if (!($this->session->userdata('admin_username'))) {
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
		$data['ThDate'] = $this->general_model->ThDate();
		$data['queryFull']=$this->employee_model->countFull(); 
		$data['queryPart']=$this->employee_model->countPart(); 
		$data['queryTrainee']=$this->employee_model->countTrainee(); 
		$data['queryUnpay']=$this->payroll_model->sumUnpay(); 
		$data['queryPaid']=$this->payroll_model->sumPaid(); 




		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}

	// ====== Password Menu ======= //
	public function password()
	{
		$data['userData'] = $this->session->userdata;

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/admin_password', $data);
		$this->load->view('template/footer');
	}

	public function editing_password()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
		$this->form_validation->set_rules('admin_id', 'id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('admin_password1', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('admin_password2', 'Password Confirmation', 'trim|required|matches[admin_password1]', array('matches' => 'รหัสผ่านไม่ตรงกัน'));

		if ($this->form_validation->run() == FALSE) {

			$data['userData'] = $this->session->userdata;

			$this->load->view('template/header_admin', $data);
			$this->load->view('admin/admin_password', $data);
			$this->load->view('template/footer');
		} else {
			$this->password_model->admin_update_own_password();
			$this->session->set_flashdata('save_success', TRUE);

			redirect('admin', 'refresh');
		}
	}


	// ====== Position Menu ======= //

	public function position()
	{
		$data['userData'] = $this->session->userdata;
		$data['allPosition'] = $this->position_model->list_all_position();
		$data['error'] = ' ';

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/position_list', $data);
		$this->load->view('template/footer');
	}

	public function add_position()
	{
		$data['userData'] = $this->session->userdata;
		$data['error'] = '';
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/position_form_add', $data);
		$this->load->view('template/footer');
	}
	public function adding_position()
	{
		// Form Validation
		$this->form_validation->set_rules(
			'position_name',
			'ชื่อตำแหน่ง',
			'trim|required|min_length[1]|is_unique[tbl_position.position_name]',
			array(
				'required' => 'กรุณากรอก%s',
				'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว',
				'is_unique' => 'มี%sนี้อยู่ในระบบแล้ว'
			)
		);
		$this->form_validation->set_rules(
			'position_department',
			'ชื่อแผนก',
			'trim|required|min_length[1]',
			array(
				'required' => 'กรุณากรอก%s',
				'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 1 ตัว'
			)
		);
		// End Form Validation

		if ($this->form_validation->run() == FALSE) {

			$data['userData'] = $this->session->userdata;
			$data['error'] = '';
			$this->load->view('template/header_admin', $data);
			$this->load->view('admin/position_form_add', $data);
			$this->load->view('template/footer');
		} else {
			$this->position_model->adding_position();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('admin/add_position', 'refresh');
		}
	}

	public function delete_position($position_id)
	{
		$data['employee'] = $this->employee_model->get_employee_info($position_id);
		$this->position_model->delete_position($position_id);
		$this->session->set_flashdata('del_success', TRUE); //เรียก Sweet Alert มาแสดง
		redirect('admin/position', 'refresh');
	}

	// ====== Employee Menu ======= //
	// -----Employee-----
	public function employee()
	{
		$data['userData'] = $this->session->userdata;
		$data['allEmployee'] = $this->employee_model->list_all_employee();
		$data['activeEmployeeCount'] = $this->employee_model->active_employee_count();
		$data['error'] = ' ';

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/employee_list', $data);
		$this->load->view('template/footer');
	}

	// ---------------ADD EMPLOYEE-----------------
	public function add_employee()
	{
		$data['userData'] = $this->session->userdata;
		$data['position'] = $this->position_model->list_all_position();
		$data['employtype'] = $this->employee_model->list_all_employtype();
		$data['error'] = '';
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/employee_form_add', $data);
		$this->load->view('template/footer');
	}

	public function adding_employee()
	{
		// Form Validation
		$this->form_validation->set_rules(
			'employee_username',
			'Username',
			'trim|required|min_length[2]|is_unique[tbl_employee.employee_username]',
			array(
				'required' => 'กรุณากรอก%s',
				'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 2 ตัว',
				'is_unique' => 'มี%sนี้อยู่ในระบบแล้ว'
			)
		);
		$this->form_validation->set_rules(
			'employee_password',
			'รหัสผ่าน',
			'trim|required|min_length[4]',
			array(
				'required' => 'กรุณากรอก%s',
				'min_length' => 'กรุณากรอก%sขั้นต่ำ 4 ตัว'
			)
		);
		$this->form_validation->set_rules(
			'password_conf',
			'ยืนยันรหัสผ่าน',
			'trim|required|matches[employee_password]',
			array('required' => 'กรุณา%s', 'matches' => 'รหัสผ่านไม่ตรงกัน')
		);
		$this->form_validation->set_rules(
			'employee_name',
			'ชื่อ-สกุล',
			'trim|required|min_length[4]|is_unique[tbl_employee.employee_name]',
			array(
				'required' => 'กรุณากรอก%s',
				'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 4 ตัว',
				'is_unique' => 'มี%sอยู่ในระบบแล้ว'
			)
		);
		$this->form_validation->set_rules(
			'employee_citizen_id',
			'เลขบัตรประชาชน',
			'trim|required|min_length[13]|max_length[13]|is_unique[tbl_employee.employee_citizen_id]',
			array(
				'required' => 'กรุณากรอก%s',
				'min_length' => 'กรุณากรอกข้อมูลให้ครบ 13 หลัก',
				'max_length' => 'กรุณากรอกข้อมูลให้ครบ 13 หลัก',
				'is_unique' => 'มี%sนี้อยู่ในระบบแล้ว'
			)
		);
		$this->form_validation->set_rules(
			'employee_birthdate',
			'วันเกิด',
			'trim|required',
			array(
				'required' => 'กรุณาเลือก%s',
			)
		);
		$this->form_validation->set_rules(
			'employee_gender',
			'เพศ',
			'trim|required',
			array(
				'required' => 'กรุณาเลือก%s',
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
			'trim|required|is_natural|is_unique[tbl_employee.employee_phone]',
			array('required' => 'กรุณากรอก%s', 'is_unique' => 'มี%sนี้อยู่ในระบบแล้ว', 'is_natural' => 'กรุณาใส่เฉพาะตัวเลข')
		);
		$this->form_validation->set_rules(
			'employee_email',
			'อีเมลล์',
			'trim|min_length[5]|valid_email|required|is_unique[tbl_employee.employee_email]',
			array('required' => 'กรุณากรอก%s', 'min_length' => 'กรุณากรอกข้อมูลขั้นต่ำ 5 ตัว', 'valid_email' => 'รูปแบบ %s ไม่ถูกต้อง', 'is_unique' => 'มี%sนี้อยู่ในระบบแล้ว')
		);
		$this->form_validation->set_rules(
			'employee_employtype',
			'ประเภทการจ้าง',
			'trim|required',
			array(
				'required' => 'กรุณาเลือก%s',
			)
		);
		$this->form_validation->set_rules(
			'employee_position_id',
			'ตำแหน่ง',
			'trim|required',
			array('required' => 'กรุณาเลือก%s')
		);
		$this->form_validation->set_rules(
			'salary_basesalary',
			'เงินเดือน',
			'trim|required|numeric',
			array('required' => 'กรุณากรอก%s', 'numeric' => 'กรุณาใส่เฉพาะตัวเลข')
		);
		// End Form Validation

		if ($this->form_validation->run() == FALSE) {

			$data['userData'] = $this->session->userdata;
			$data['position'] = $this->position_model->list_all_position();
			$data['employtype'] = $this->employee_model->list_all_employtype();
			$data['error'] = '';
			$this->load->view('template/header_admin', $data);
			$this->load->view('admin/employee_form_add', $data);
			$this->load->view('template/footer');
		} else {
			$config['upload_path'] = 'assets/employee_profile_img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 800;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('employee_profile_img')) {
				$data['userData'] = $this->session->userdata;
				$data['position'] = $this->position_model->list_all_position();
				$data['employtype'] = $this->employee_model->list_all_employtype();
				$data['error'] = $this->upload->display_errors();
				$this->load->view('template/header_admin', $data);
				$this->load->view('admin/employee_form_add', $data);
				$this->load->view('template/footer');
			} else {
				$this->employee_model->add_employee();
				$this->session->set_flashdata('save_success', TRUE);
				redirect('admin/employee', 'refresh');
			}
		}
	}

	// ---------------EDIT EMPLOYEE-----------------
	public function edit_employee($employee_id)
	{
		$data['userData'] = $this->session->userdata;
		$data['employee'] = $this->employee_model->get_employee_info($employee_id);
		$data['employtype'] = $this->employee_model->list_all_employtype();
		$data['position'] = $this->position_model->list_all_position();
		$data['error'] = '';

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/employee_form_edit', $data);
		$this->load->view('template/footer');
	}

	public function editing_employee()
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
			'employee_citizen_id',
			'เลขบัตรประชาชน',
			'trim|required|min_length[13]|max_length[13]',
			array(
				'required' => 'กรุณากรอก%s',
				'min_length' => 'กรุณากรอกข้อมูลให้ครบ 13 หลัก',
				'max_length' => 'กรุณากรอกข้อมูลให้ครบ 13 หลัก'
			)
		);
		$this->form_validation->set_rules(
			'employee_birthdate',
			'วันเกิด',
			'trim|required',
			array(
				'required' => 'กรุณาเลือก%s',
			)
		);
		$this->form_validation->set_rules(
			'employee_gender',
			'เพศ',
			'trim|required',
			array(
				'required' => 'กรุณาเลือก%s',
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
		$this->form_validation->set_rules(
			'employee_employtype',
			'ประเภทการจ้าง',
			'trim|required',
			array(
				'required' => 'กรุณาเลือก%s',
			)
		);
		$this->form_validation->set_rules(
			'employee_position_id',
			'ตำแหน่ง',
			'trim|required',
			array('required' => 'กรุณาเลือก%s')
		);
		$this->form_validation->set_rules(
			'salary_basesalary',
			'เงินเดือน',
			'trim|required|numeric',
			array('required' => 'กรุณากรอก%s', 'numeric' => 'กรุณาใส่เฉพาะตัวเลข')
		);
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			$employee_id = $this->input->post('employee_id');
			$data['employee'] = $this->employee_model->get_employee_info($employee_id);
			$data['userData'] = $this->session->userdata;
			$data['position'] = $this->position_model->list_all_position();
			$data['employtype'] = $this->employee_model->list_all_employtype();
			$data['error'] = '';

			$this->load->view('template/header_admin', $data);
			$this->load->view('admin/employee_form_edit', $data);
			$this->load->view('template/footer');
		} else {
			// Check if there's image uploaded
			if ($_FILES['employee_profile_img']['name'] == '') {
				//no img uploaded
				$this->employee_model->editing_employee();
				$this->session->set_flashdata('save_success', TRUE);

				redirect('admin/employee', 'refresh');
			} else {
				//img
				// echo 'img';
				$config['upload_path'] = 'assets/employee_profile_img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = 800;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('employee_profile_img')) {
					//failed img upload
					// echo 'upload failed';
					$employee_id = $this->input->post('employee_id');
					$data['userData'] = $this->session->userdata;
					$data['employee'] = $this->employee_model->get_employee_info($employee_id);
					$data['position'] = $this->position_model->list_all_position();
					$data['employtype'] = $this->employee_model->list_all_employtype();
					$data['$error'] = $this->upload->display_errors();
					$this->load->view('template/header_admin', $data);
					$this->load->view('admin/employee_form_edit', $data);
					$this->load->view('template/footer');
				} else {
					$this->employee_model->editing_employee_with_img();
					// Delete old image
					unlink('assets/employee_profile_img/' . $this->input->post('current_employee_profile_img'));
					$this->session->set_flashdata('save_success', TRUE);

					redirect('admin/employee', 'refresh');
				} //img
			}
		}
	}

	// ---------------EDIT EMPLOYEE PASSWORD-----------------
	public function edit_employee_password($employee_id)
	{
		$data['userData'] = $this->session->userdata;
		$data['employee'] = $this->employee_model->get_employee_info($employee_id);
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/employee_password', $data);
		$this->load->view('template/footer');
	}

	public function editing_employee_password()
	{
		$this->form_validation->set_rules('employee_id', 'employee_id', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('employee_password1', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('employee_password2', 'Password Confirmation', 'trim|required|matches[employee_password1]', array('matches' => 'รหัสผ่านไม่ตรงกัน'));

		if ($this->form_validation->run() == FALSE) {
			$employee_id = $this->input->post('employee_id');
			$data['userData'] = $this->session->userdata;
			$data['employee'] = $this->employee_model->get_employee_info($employee_id);
			$this->load->view('template/header_admin', $data);
			$this->load->view('backend/employee_form_edit_password', $data);
			$this->load->view('template/footer');
		} else {
			$this->employee_model->update_password_employee();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('admin/employee', 'refresh');
		}
	}

	// ---------------DELETE EMPLOYEE-----------------
	public function delete_employee($employee_id)
	{
		$data['employee'] = $this->employee_model->get_employee_info($employee_id);
		unlink('assets/employee_profile_img/' . $data['employee']->employee_profile_img);

		$this->employee_model->delete_employee($employee_id);
		$this->session->set_flashdata('del_success', TRUE); //เรียก Sweet Alert มาแสดง
		redirect('admin/employee', 'refresh');
	}



	// ====== Payroll Menu ======= //
	public function payroll()

	{		

		$data['userData'] = $this->session->userdata;
		$data['allPayroll'] = $this->payroll_model->list_all_payroll();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/admin_payroll_list', $data);
		$this->load->view('template/footer');
	}


		public function show_emp_payroll()
	{
		$data['userData'] = $this->session->userdata;
		$data['allEmployee'] = $this->employee_model->list_all_employee();
		$data['allPayroll'] = $this->payroll_model->list_all_payroll();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/payroll_emp_list', $data);
		$this->load->view('template/footer');
	}


	public function add_payroll($employee_id)
	{
		$data['userData'] = $this->session->userdata;
		$data['employee'] = $this->employee_model->get_employee_info($employee_id);
		$data['getPayroll'] = $this->payroll_model->getPayrollInfo($employee_id);
		$data['allEmployee'] = $this->employee_model->list_all_employee();
		$data['employeeID'] = $employee_id;
		

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/payroll_form_add', $data);
		$this->load->view('template/footer');
	}

	public function conf_payroll($employee_id)
	{

		// ตรวจสอบว่ามีข้อมูลถูกส่งมาผ่าน POST หรือไม่
		if (isset($_POST['employee_id']) && isset($_POST['payroll_month']) && isset($_POST['base_salary'])) {
			$employee_id = $_POST['employee_id'];
			$data['employeeID'] = $_POST['employee_id'];
			$data['payrollMonth'] = $_POST['payroll_month'];
			$data['baseSalary'] = $_POST['base_salary'];
			$data['userData'] = $this->session->userdata;
			$data['employee'] = $this->employee_model->get_employee_info($employee_id);
			$data['allEmployee'] = $this->employee_model->list_all_employee();

			$this->load->view('template/header_admin', $data);
			$this->load->view('admin/payroll_form_conf', $data);
			$this->load->view('template/footer');
			// ตัวอย่างเท่านั้น:
		} else {
			// echo "ไม่ได้รับข้อมูล Employee ID ผ่านทาง POST";
			$data['userData'] = $this->session->userdata;
			$data['allEmployee'] = $this->employee_model->list_all_employee();
			$data['allPayroll'] = $this->payroll_model->list_all_payroll();
			$this->load->view('template/header_admin', $data);
			$this->load->view('admin/payroll_form_add', $data);
			$this->load->view('template/footer');
		}
	}

	public function adding_payroll()
	{

		// ตรวจสอบว่ามีข้อมูลถูกส่งมาผ่าน POST หรือไม่
		$this->payroll_model->add_payroll();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('admin/payroll', 'refresh');
	}
	public function delete_payroll($payroll_id)
	{
		$this->payroll_model->delete_payroll($payroll_id);
		$this->session->set_flashdata('del_success', TRUE); //เรียก Sweet Alert มาแสดง
		redirect('admin/payroll', 'refresh');
	}
	
	public function approvePayroll($payroll_id)
	{
		$this->payroll_model->approve_payroll($payroll_id);
		$this->session->set_flashdata('payroll_approve_success', TRUE); //เรียก Sweet Alert มาแสดง
		redirect('admin/payroll', 'refresh');
	}
	
	public function employee_payroll_list($employee_id)
	{	
		
		$data['latestPayroll'] = $this->payroll_model->LatestPayrollInfo($employee_id);
		$data['userData'] = $this->session->userdata;
		$data['allPayroll'] = $this->payroll_model->list_all_payroll();

		$this->load->view('template/header_admin', $data);
		$this->load->view('employee/employee_payroll_list', $data);
		$this->load->view('template/footer');


	}

}
