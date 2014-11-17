<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('/homepage');
		}
	}

	public function index()
	{
		$this->load->view('partial/header');
		$this->load->view('dashboard/content');
		$this->load->view('partial/footer');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */