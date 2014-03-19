<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 5/26/11
 * Time: 7:26 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Vendor_Model extends CI_Model{

        function postLead($subid, $vendorid, $lead_number, $aim_lead_number, $firstname, $lastname, $street, $city, $state,  $zip, $email, $gradyear, $phone, $career, $ip, $notes, $source, $redirect)
    {
        $aim = $aim_lead_number;
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $success = "";
        $error = "";
        $this->session->set_userdata('submit_success', $success);
        $this->session->set_userdata('submit_error', $error);

        $this->load->helper('date');

        // Get variables from Lists Table
        /*$DB1->select('*')
                    ->where('list_map',$career);
        $f9_info = $DB1->get('Lists');
        foreach ($f9_info->result_array() as $row)
        {
            $list_domain = $row['list_domain'];
            $listname = $row['listname'];
            $list_url = $row['list_url'];
        }*/

        // Check for duplicate email in Backup Table or Phone Number in FireBrand

        if ($aim != 'FIRE')

        {
            $DB1->select('email')
            ->where('email', $email);
            $emailcheck = $DB1->get('BackUp');

            if ($emailcheck->num_rows()>0)
            {
                $success = "";
                $error = 'Duplicate Email Exists: Unable to submit.';
                $this->session->set_userdata('submit_success', $success);
                $this->session->set_userdata('submit_error', $error);
                redirect($redirect);
            }
        }

        else

        {
            $DB1->select('number')
            ->where('number', $phone);
            $phonecheck = $DB1->get('FireBrand');

            if ($phonecheck->num_rows()>0)
            {
                $success = "";
                $error = 'Duplicate Phone Number Exists: Unable to submit.';
                $this->session->set_userdata('submit_success', $success);
                $this->session->set_userdata('submit_error', $error);
                redirect($redirect);
            }

        }

        $datestring = "%Y-%m-%d  %h:%i:%s";
        $time = time();

        $newtime = date("Y-m-d H:i:s");

        // Build The Post Array, This will be posted into LeadTmp
        $post = array
        (
            'lead_number'       => $lead_number,
            'created_date'      => $newtime,
            'first_name'        => $firstname,
            'last_name'         => $lastname,
            'street'            => $street,
            'email'             => $email,
            'zip'               => $zip,
            'grad_year'         => $gradyear,
            'city'              => $city,
            'state'             => $state,
            'number'            => $phone,
//            'F9domain'          => $list_domain,
//            'F9list'            => $listname,
            'WC_SubId'          => $subid,
            'aim_lead_number'   => $aim_lead_number,
            'disposition'       => 'No Party Contact',
            'career'            => strtoupper($career),
            'Full_SubId'        => $vendorid,
            'IP'                => $ip,
            'lead_notes'        => $notes,
        );



        if ($aim != 'FIRE')

        {
            $DB1->insert('BackUp', $post);

            $DB1->select('lead_number')
                ->where('lead_number', $lead_number);
            $query = $DB1->get('BackUp');
        }

        else

        {
            $DB1->insert('FireBrand', $post);

            $DB1->select('number')
                ->where('number', $phone);
            $query = $DB1->get('FireBrand');
        }

        // If the lead was submitted successfully to LeadTmp then give a hooray!
        if ($query->num_rows()>0)
            {
                $error = "";
                $this->session->set_userdata('submit_error', $error);
                $success = "Lead added to system. Thank you!";
                $this->session->set_userdata('submit_success', $success);
                redirect($redirect);

            }

        // If the lead wasn't submitted successfully then Boo!
        else
        {
            $success = "";
            $this->session->set_userdata('submit_success', $success);
            $error = "No record added";
            $this->session->set_userdata('submit_error', $error);
            redirect($redirect);
        }

    }

    function getLeadNumber($vendorid)
    {

    }

}
