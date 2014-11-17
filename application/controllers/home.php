<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();			
		if (!$this->session->userdata('logged_in')) { 
			redirect('/auth/login'); 
		}
	}

	public function index()
	{
		$dashboard = '#/dashboard';
		$data['dashboard_url'] = $dashboard;

		$this->load->view('partial/header');
		$this->load->view('dashboard/content', $data);
		$this->load->view('partial/footer', $data);
	}
	
	public function dashboard()
	{
			$this->load->view('dashboard/main_dashboard');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */