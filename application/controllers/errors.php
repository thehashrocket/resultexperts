<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function page_missing()
    {
        $data['rerouted'] = $this->uri->ruri_string();
        $data['page']   = 'errors/404error';
        $this->load->view('container', $data);
    }

    public function error_page()
    {
        $data['error_message'] = $this->session->userdata('error');
                $data['page']   = 'errors/errorPage';
        $this->load->view('container', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */