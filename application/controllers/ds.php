<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ds extends CI_Controller {

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


    public function query()
    {

        $subid              = $this->input->get_post('subid', TRUE);
        $vendorid           = $this->input->get_post('vendorid', TRUE);
        $aim_lead_number    = $this->input->get_post('aim_lead_number', TRUE);
        $firstname          = $this->input->get_post('firstname', TRUE);
        $lastname           = $this->input->get_post('lastname', TRUE);
        $street             = $this->input->get_post('street', TRUE);
        $city               = $this->input->get_post('city', TRUE);
        $state              = $this->input->get_post('state', TRUE);
        $zip                = $this->input->get_post('zip', TRUE);
        $email              = $this->input->get_post('email', TRUE);
        $gradyear           = $this->input->get_post('gradyear', TRUE);
        $phone              = $this->input->get_post('phone', TRUE);
        $career             = $this->input->get_post('career', TRUE);


        $this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('DS_Model');
        $this->load->model('Vendor_Model');

            $check = $this->DS_Model->checksubmit($phone, $email);

            if ($check == '1')
            {
                $success = "";
                $error = 'Duplicate Email Exists: Unable to submit.';
                $this->session->set_userdata('submit_success', $success);
                $this->session->set_userdata('submit_error', $error);
                redirect('/ds/result_page');
            }

            else
            {
                $lead_number        = uniqid(rand());
                $ip                 = (string)$this->input->ip_address();
                $source             = 'DirectSubmit';
                $notes              = 'Direct Submission';
                $redirect           = '/ds/result_page';


                $this->Vendor_Model->postLead($subid, $vendorid, $lead_number, $aim_lead_number, $firstname, $lastname, $street, $city, $state,  $zip, $email, $gradyear, $phone, $career, $ip, $notes, $source, $redirect);
            }

    }

    public function test()
    {
        $this->load->view('test');
    }

    public function result_page()
    {
        $data['error_message'] = $this->session->userdata('submit_error');
        $data['success_message'] = $this->session->userdata('submit_success');
        $data['curl_post']  = $this->session->userdata('curlpost');
        $this->load->view('vendor/dsresultPage', $data);
    }

}

