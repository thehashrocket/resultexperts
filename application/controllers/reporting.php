<?php
/**
 * Created by IntelliJ IDEA.
 * User: jason
 * Date: 6/29/11
 * Time: 2:49 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Reporting extends CI_Controller{

    function __construct()
	{
		parent::__construct();

		$this->load->helper('url', 'file');
		$this->load->library('tank_auth');
        $this->load->dbutil();

	}

    function index() {

        $data['page'] = '/reporting/welcome_view';
        $this->load->view('container', $data);

    }

    function leadsearch() {
        $this->load->model('Reporting_Model');

        $firstname  = $this->input->get_post('firstname', TRUE);
        $lastname    = $this->input->get_post('lastname', TRUE);
        $phonenumber    = $this->input->get_post('phonenumber', TRUE);

        $data['firstname'] = 'Start';
        $data['lastname'] = 'End';
        $data['phonenumber'] = 'Lead Status';

        if($_POST)
            {
                $data['start'] = $firstname;
                $data['end'] = $lastname;
                $data['leadstatus'] = $phonenumber;
                $data['results'] = $this->Reporting_Model->individualSearch($firstname, $lastname, $phonenumber);

            }

        $data['page']   = '/reporting/leadsearch_view';
        $this->load->view('container', $data);

    }

    function reporttool() {
        $this->load->model('Reporting_Model');

        $start  = $this->input->get_post('startdate', TRUE);
        $end    = $this->input->get_post('enddate', TRUE);
        $disposition    = $this->input->get_post('disposition', TRUE);

        $data['start'] = 'Start';
        $data['end'] = 'End';
        $data['leadstatus'] = 'Lead Status';

        if($_POST)
            {
                $data['start'] = $start;
                $data['end'] = $end;
                $data['leadstatus'] = $disposition;
                $data['results'] = $this->Reporting_Model->leadSearch($start, $end, $disposition);

            }

        $data['page']   = '/reporting/reporting_view';
        $this->load->view('container', $data);

    }

    function make_report_file() {

        $this->load->model('Reporting_Model');
        $redirect = '/reporting/reporttool';
        $this->Reporting_Model->leadSearch_lead_file($redirect);

    }

}
