<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 6/2/11
 * Time: 11:31 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Callcenter extends CI_Controller {

    	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');

	}

    function index()
	{
        // CuNet Variables (STATIC)
        $data['cu_direct_submission_id']    = '1545';
        $data['cu_cc_submission_id']        = '1382';
        $data['cu_login']                   = 'QualityLeads';
        $data['cu_password']                = 'letmein42';

        // Get Success or Error Session Data
        $data['error_message'] = $this->session->userdata('submit_error');
        $data['success_message'] = $this->session->userdata('submit_success');

        // College Bound Variables
        $data['cb_site_id']                 = '233';

        // Static Variables
        $data['redirect']   = '/callcenter/';


        // Load the Models, Libraries
        $this->load->library('form_validation');

        $this->load->model('Callcenter_Model');
        $this->load->model('Collegebound_Model');
        $this->load->model('Cunet_Model');
        $this->load->helper(array('form', 'url'));


        // Data from Get_Post
        $source             = $this->input->get_post('source', TRUE);
        $number             = $this->input->get_post('number', TRUE);
        $leadnumber         = $this->input->get_post('uid', TRUE);



        // Set Session Data
        $this->session->set_userdata('source', $source);
        $this->session->set_userdata('number', $number);
        $this->session->set_userdata('leadnumber', $leadnumber);

        // Get Lead Data from Either Firebrand or Universal
        if ($source == 'firebrand' || 'FireBrand')
        {
            $firedata           = $this->Callcenter_Model->getFireBrand($number);
            $data['firedata']   = $firedata;

            foreach ($firedata->result() as $row)
            {
                $data['zip']            = $row->zip;
                $data['career']         = $row->career;
                $data['lead_number']    = $row->lead_number;
                $data['first_name']     = $row->first_name;
                $data['last_name']      = $row->last_name;
                $data['number']         = $row->number;
                $data['email']          = $row->email;
                $data['street']         = $row->street;
                $data['city']           = $row->city;
                $data['state']          = $row->state;
                $data['zip']            = $row->zip;
                $data['grad_year']      = $row->grad_year;
                $data['career']         = $row->career;
                $data['source']         = 'FIREBRAND';
                $zip                    = $row->zip;
                $career                 = $row->career;
                $email                  = $row->email;
                $grad_year              = $row->grad_year;
            }


        }

        if ($source == 'universal')
        {
            $firedata           = $this->Callcenter_Model->getUniversal($leadnumber);

            $data['prevsub']    = $this->Callcenter_Model->getPrevSubmissions($leadnumber);

            $data['firedata']   = $firedata;


            foreach ($firedata->result() as $row)
            {
                $data['zip']            = $row->zip;
                $data['career']         = $row->career;
                $data['lead_number']    = $row->lead_number;
                $data['first_name']     = $row->first_name;
                $data['last_name']      = $row->last_name;
                $data['number']         = $row->number;
                $data['email']          = $row->email;
                $data['street']         = $row->street;
                $data['city']           = $row->city;
                $data['state']          = $row->state;
                $data['zip']            = $row->zip;
                $data['grad_year']      = $row->grad_year;
                $data['career']         = $row->career;
                $data['disposition']    = $row->disposition;
                $data['source']         = 'UNIVERSAL';
                $zip                    = $row->zip;
                $career                 = $row->career;
                $email                  = $row->email;
                $grad_year              = $row->grad_year;
            }
        }



        $first_name         = $this->input->get_post('first_name', TRUE);
        $last_name          = $this->input->get_post('last_name', TRUE);



            // cb_career_code is needed for College Bound Manual Search Page
        $data['cb_career_code'] = $this->Collegebound_Model->get_career_code($career);
        $cb_career_code         = $this->Collegebound_Model->get_career_code($career);


        $data['agents']         = $this->Callcenter_Model->getAgents();



        $cunet                  = $this->Cunet_Model->get_career_code($career);

        foreach ($cunet->result() as $row)
        {
            $data['cu_main']    = $row->cu_main;
            $cu_sub             = $row->cu_sub;

            $cu_pieces          = explode(",", $cu_sub);
            $cat_cnt            = count($cu_pieces);

            $cu_sub_catagory = "";
            for ($i = 0; $i < $cat_cnt; $i++) {
                $cu_sub_catagory .= "SubCatID[]=" . $cu_pieces[$i] . "&";
            }
            $data['cu_sub_catagory'] = substr_replace($cu_sub_catagory, '', -1, 1);

        }

        $data['cb_offers'] =  $this->Collegebound_Model->build_cb_offers($zip,$cb_career_code,$grad_year,$email);


        $data['page']   = '/callcenter/fire_view';
        $this->load->view('container', $data);

        //$data['cb_offers'] = $this->Collegebound_Model->legacy_school_list_filter($email, $this->Collegebound_Model->build_cb_offers($zip,$career,$grad_year,$email));


    }

    public function fireView()
    {
        if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {

    }
    }

    function lead_post()
    {
        $this->load->model('Callcenter_Model');
        $this->load->library('form_validation');

        // field name, error message, validation rules

        $this->form_validation->set_rules('subid', 'Sub Id', 'trim');
        $this->form_validation->set_rules('vendorid', 'Vendor Id', 'trim');
        $this->form_validation->set_rules('firstname', 'First Name Required', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name Required', 'trim|required');
        $this->form_validation->set_rules('street', 'Street Address Required', 'trim|required');
        $this->form_validation->set_rules('city', 'City is required', 'trim|required');
        $this->form_validation->set_rules('state', 'State is required', 'trim');
        $this->form_validation->set_rules('zip', 'Zip Code must be 5 digits', 'trim|required|min_length[5]|max_length[5]');
        $this->form_validation->set_rules('email', 'Email Address Invalid', 'trim|required|valid_email');
        $this->form_validation->set_rules('gradyear', 'Graduation Year must be 4 digits', 'trim|required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('phone', 'Telephone must be 10 digits, no dashes', 'trim|required');
        $this->form_validation->set_rules('career', 'Career', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->model('Callcenter_Model');
            $this->load->model('Collegebound_Model');
            // College Bound Variables
            $data['cb_site_id']                 = '233';
            
            $number                 = $this->session->userdata('number');
            $source                 = $this->session->userdata('source');
            $leadnumber            = $this->session->userdata('leadnumber');
            $data['redirect']       = (string)$this->input->post('redirect', TRUE);



                    // Get Lead Data from Either Firebrand or Universal
        if ($source == 'firebrand' || 'FireBrand')
        {
            $firedata           = $this->Callcenter_Model->getFireBrand($number);
            $data['firedata']   = $firedata;

            foreach ($firedata->result() as $row)
            {
                $data['zip']            = $row->zip;
                $data['career']         = $row->career;
                $data['lead_number']    = $row->lead_number;
                $data['first_name']     = $row->first_name;
                $data['last_name']      = $row->last_name;
                $data['number']         = $row->number;
                $data['email']          = $row->email;
                $data['street']         = $row->street;
                $data['city']           = $row->city;
                $data['state']          = $row->state;
                $data['zip']            = $row->zip;
                $data['grad_year']      = $row->grad_year;
                $data['career']         = $row->career;
                $data['source']         = 'FIREBRAND';
                $zip                    = $row->zip;
                $career                 = $row->career;
                $email                  = $row->email;
                $grad_year              = $row->grad_year;
            }


        }

        if ($source == 'universal')
        {
            $firedata           = $this->Callcenter_Model->getUniversal($leadnumber);
            $data['firedata']   = $firedata;


            foreach ($firedata->result() as $row)
            {
                $data['zip']            = $row->zip;
                $data['career']         = $row->career;
                $data['lead_number']    = $row->lead_number;
                $data['first_name']     = $row->first_name;
                $data['last_name']      = $row->last_name;
                $data['number']         = $row->number;
                $data['email']          = $row->email;
                $data['street']         = $row->street;
                $data['city']           = $row->city;
                $data['state']          = $row->state;
                $data['zip']            = $row->zip;
                $data['grad_year']      = $row->grad_year;
                $data['career']         = $row->career;
                $data['disposition']    = $row->disposition;
                $data['source']         = 'UNIVERSAL';
                $zip                    = $row->zip;
                $career                 = $row->career;
                $email                  = $row->email;
                $grad_year              = $row->grad_year;
            }
        }

            $data['agents']         = $this->Callcenter_Model->getAgents();
            $data['page']   = '/callcenter/fire_view';
            $this->load->view('container', $data);
        }
        else
        {
            $lead_number        = (string)$this->input->post('lead_number', TRUE);
            $subid              = (string)$this->input->post('subid', TRUE);
            $vendorid           = (string)$this->input->post('vendorid', TRUE);
            $aim_lead_number    = (string)$this->input->post('aim_lead_number', TRUE);
            $firstname          = (string)$this->input->post('firstname', TRUE);
            $lastname           = (string)$this->input->post('lastname', TRUE);
            $street             = (string)$this->input->post('street', TRUE);
            $city               = (string)$this->input->post('city', TRUE);
            $state              = (string)$this->input->post('state', TRUE);
            $zip                = (string)$this->input->post('zip', TRUE);
            $email              = (string)$this->input->post('email', TRUE);
            $gradyear           = (string)$this->input->post('gradyear', TRUE);
            $phone              = (string)$this->input->post('phone', TRUE);
            $career             = (string)$this->input->post('career', TRUE);
            $disposition        = (string)$this->input->post('disposition', TRUE);
            $agent              = (string)$this->input->post('agent', TRUE);
            $redirect           = (string)$this->input->post('redirect', TRUE);
            $notes              = (string)$this->input->post('notes', TRUE);
            $ip                 = (string)$this->input->ip_address();
            $source             = '';
            $redirect           = '/callcenter?source=universal&uid=' . $lead_number;

            $this->Callcenter_Model->postLead($subid, $vendorid, $lead_number, $aim_lead_number, $firstname, $lastname, $street, $city, $state,  $zip, $email, $gradyear, $phone, $career, $disposition, $agent, $ip, $notes, $source, $redirect);
        }

    }

    function school_submit()
    {
        $this->load->model('Callcenter_Model');

        $lead_number        = (string)$this->input->post('lead_number', TRUE);
        $agent              = (string)$this->input->post('agent', TRUE);
        $network            = (string)$this->input->post('network', TRUE);
        $school             = (string)$this->input->post('school', TRUE);
        $type               = (string)$this->input->post('type', true);
        $client_id          = (string)$this->input->post('client_id', TRUE);
        $id                 = (string)$this->input->post('id', true);
        $link               = (string)$this->input->post('link', true);
        $source             = (string)$this->input->post('source', TRUE);
        $redirect           = '/callcenter?source=universal&uid=' . $lead_number;

        $this->Callcenter_Model->submitToSchool($lead_number, $agent, $network, $school, $type, $client_id, $id, $link, $source, $redirect);

    }

}
