<?php
/**
 * Created by IntelliJ IDEA.
 * User: jason
 * Date: 6/29/11
 * Time: 3:24 PM
 * To change this template use File | Settings | File Templates.
 */

     /*This Model handles reporting data. It allows the user to
     search for leads in the database by different criteria or methods. */

class Reporting_Model extends CI_Model {

    function __construct()
       {
           // Call the Model constructor
           parent::__construct();
           $this->load->dbutil();
           $this->load->helper('file');
           $this->load->helper('download');
       }

    function individualSearch($firstname, $lastname, $phonenumber) {

        $DB1 = $this->load->database('QualityLeads', TRUE);

        $this->session->set_userdata('first_name', $firstname);
        $this->session->set_userdata('last_name', $lastname);
        $this->session->set_userdata('number', $phonenumber);

        $DB1->select('BackUp.lead_number,
                        BackUp.number,
                        BackUp.first_name,
                        BackUp.last_name,
                        BackUp.email,
                        BackUp.zip,
                        BackUp.disposition,
                        BackUp.career,
                        BackUp.aim_lead_number,
                        BackUp.Full_SubId')
            ->from('BackUp');


            $DB1->like('BackUp.first_name', $firstname);
            $DB1->like('BackUp.last_name', $lastname);
            $DB1->like('BackUp.number', $phonenumber);

        return $DB1->get();

    }

    function leadSearch($start, $end, $disposition) {

        $start = $start;
        $end    = $end;

        $array = array('created_date >' => $start);



        $DB1 = $this->load->database('QualityLeads', TRUE);

        $this->session->set_userdata('start_date', $start);
        $this->session->set_userdata('end_date', $end);
        $this->session->set_userdata('disposition', $disposition);

        $DB1->select('BackUp.lead_number,
                        BackUp.number,
                        BackUp.first_name,
                        BackUp.last_name,
                        BackUp.email,
                        BackUp.zip,
                        BackUp.disposition,
                        BackUp.career,
                        BackUp.aim_lead_number,
                        BackUp.Full_SubId')
            ->from('BackUp');

        if ($disposition == 'NULL') {
            $where = array('BackUp.disposition' => null);
            $DB1->where($where, TRUE);
        }

        elseif ($disposition == 'ALL') {

            $DB1->like('BackUp.disposition', '');
        }

        elseif ($disposition == 'ALLNotQualified') {

            $DB1->or_not_like('BackUp.disposition', 'Qualified');
        }

        else
        {
            $DB1->where('BackUp.disposition', $disposition);
        }

            $DB1->where('BackUp.created_date >', $start);
            $DB1->where('BackUp.created_date <', $end);
            $DB1->group_by('BackUp.lead_number');

        return $DB1->get();

    }

    function leadSearch_lead_file($redirect) {

        $start = $this->session->userdata('start_date');
        $end    = $this->session->userdata('end_date');
        $disposition = $this->session->userdata('disposition');

        $array = array('created_date >' => $start);

        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('BackUp.lead_number,
                        BackUp.number,
                        BackUp.created_date,
                        BackUp.first_name,
                        BackUp.last_name,
                        BackUp.email,
                        BackUp.zip,
                        BackUp.disposition,
                        BackUp.career,
                        BackUp.aim_lead_number,
                        BackUp.Full_SubId')
            ->from('BackUp');

        if ($disposition == 'NULL') {
            $where = array('BackUp.disposition' => null);
            $DB1->where($where, TRUE);
        }

        elseif ($disposition == 'ALL') {

            $DB1->like('BackUp.disposition', '');
        }

        elseif ($disposition == 'ALLNotQualified') {

            $DB1->or_not_like('BackUp.disposition', 'Qualified');
        }

        else
        {
            $DB1->where('BackUp.disposition', $disposition);
        }

            $DB1->where('BackUp.created_date >', $start);
            $DB1->where('BackUp.created_date <', $end);
            $DB1->group_by('BackUp.lead_number');

        $query = $DB1->get();

        $data = $this->dbutil->csv_from_result($query);

        $name = rand().'_remarket_legacy_'.date('Y-m-d').'.csv';



        if ( ! write_file('./data/'.$name, $data, 'w+'))
        {
             echo 'Unable to write the file';
        }
        else
        {
            $data = file_get_contents("./data/".$name); // Read the file's contents

            force_download($name, $data);

            redirect($redirect);


        }
    }



}
