<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();			
		if (!$this->session->userdata('logged_in')){
			redirect('/auth/login');
		}
	}

	public function index() {
		$this->load->view('dashboard/main_dashboard');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */