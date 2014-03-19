<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 5/26/11
 * Time: 4:05 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Vendor extends CI_Controller {

    function maxBounty()
    {
        $this->load->model('States_Model');
        $data['states'] = $this->States_Model->states();
        $this->load->library('form_validation');
        $data['redirect']       = '/vendor/maxBounty';
        $data['vendorid']       = '400021';
        $data['lead_number']    = uniqid(rand());
        $data['aim_lead_number']= 'MAX';
        $data['subid']          = '37';
        $data['notes']          = 'Submitted Through /vendor/maxBounty';
        $data['careers'] = array(
                        'BUS'   => 'Business',
                        'CJ'    => 'Criminal Justice',
                        'CUL'   => 'Culinary',
                        'IT'    => 'Info Tech',
                        'MAS'   => 'Massage Therapy',
                        'NURS'  => 'Nursing',
                        'UNK'   => 'Unknown'
                );
        
        $data['error_message'] = $this->session->userdata('submit_error');
        $data['success_message'] = $this->session->userdata('submit_success');
        $data['page']   = '/vendor/maxBounty';
        $this->load->view('container', $data);
    }

    function lead_post()
    {
        $this->load->model('Vendor_Model');
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
        $this->form_validation->set_rules('phone', 'Telephone must be 10 digits, no dashes', 'trim|required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('career', 'Career', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $data['redirect']       = '/vendor/maxBounty';
            $this->load->model('States_Model');
            $data['states'] = $this->States_Model->states();
            $data['vendorid']       = '400021';
            $data['aim_lead_number']= 'MAX';
            $data['subid']          = '37';
            $data['notes']          = 'Submitted Through /vendor/maxBounty';
            $data['careers'] = array(
                        'BUS'   => 'Business',
                        'CJ'    => 'Criminal Justice',
                        'CUL'   => 'Culinary',
                        'IT'    => 'Info Tech',
                        'MAS'   => 'Massage Therapy',
                        'NURS'  => 'Nursing',
                        'UNK'   => 'Unknown'
                );

            $data['page']   = '/vendor/maxBounty';
            $this->load->view('container', $data);
        }
        else
        {
            $lead_number        = uniqid(rand());
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
            $redirect           = (string)$this->input->post('redirect', TRUE);
            $notes              = (string)$this->input->post('notes', TRUE);
            $ip                 = (string)$this->input->ip_address();
            $source             = '';

            $this->Vendor_Model->postLead($subid, $vendorid, $lead_number, $aim_lead_number, $firstname, $lastname, $street, $city, $state,  $zip, $email, $gradyear, $phone, $career, $ip, $notes, $source, $redirect);
        }

    }
}
