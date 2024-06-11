<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('template/auth_header');
		$this->load->view('/template/login_view');
		$this->load->view('template/auth_footer');

	}

	public function register()
	{
		$this->load->view('template/auth_header');
		$this->load->view('/template/register_view');
		$this->load->view('template/auth_footer');

	}

	public function forgot_password()
	{
		$this->load->view('template/auth_header');
		$this->load->view('/template/forgot_password_view');
		$this->load->view('template/auth_footer');

	}
}

