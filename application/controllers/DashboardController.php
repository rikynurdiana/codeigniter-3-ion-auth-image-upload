<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->form_validation->set_error_delimiters(
            $this->config->item('error_start_delimiter', 'ion_auth'),
            $this->config->item('error_end_delimiter', 'ion_auth')
        );
    }


	public function index()
	{
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $this->load->view('dashboard/index');
        }
	}
}
