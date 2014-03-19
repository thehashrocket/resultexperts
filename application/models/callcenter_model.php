<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 6/2/11
 * Time: 11:39 PM
 * To change this template use File | Settings | File Templates.
 */


/*
 * This model handles posting leads to the database and posting leads to ConnectFirst Lists
 * It also handles retrieving leads from the database for call center agents
 */
class Callcenter_Model extends CI_Model {

    function getAgentFullName($userid)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('*')
            ->from('users')
            ->where('id',$userid);
        $query = $DB1->get();

        foreach ($query->result_array() as $row)
        {
            $firstname = $row['firstname'];
            $lastname   = $row['lastname'];
        }

        $fullname = $firstname . ' ' . $lastname;

        return $fullname;
    }

    function getAgents()
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('*')
            ->from('agents');
        return $DB1->get();
    }

    function getFireBrand($number)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('*')
            ->from('FireBrand')
            ->where('number', $number);
        return $DB1->get();
    }

    function getPrevSubmissions($leadnumber)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('*')
            ->from('conversions')
            ->where('lead_number', $leadnumber);
        return $DB1->get();
    }

    function getUniversal($leadnumber)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('*')
            ->from('BackUp')
            ->where('lead_number', $leadnumber);
        return $DB1->get();
    }

    function postLead($subid, $vendorid, $lead_number, $aim_lead_number, $firstname, $lastname, $street, $city, $state,  $zip, $email, $gradyear, $phone, $career, $disposition, $agent, $ip, $notes, $source, $redirect)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $success = "";
        $error = "";
        $this->session->set_userdata('submit_success', $success);
        $this->session->set_userdata('submit_error', $error);

        $this->load->helper('date');

        // Get variables from Lists Table
        $DB1->select('*')
                    ->where('list_map',$career);
        $f9_info = $DB1->get('Lists');
        foreach ($f9_info->result_array() as $row)
        {
            $list_domain = $row['list_domain'];
            $listname = $row['listname'];
            $list_url = $row['list_url'];
        }

        $datestring = "%Y-%m-%d  %h:%i:%s";
        $time = time();

        $newtime = date("Y-m-d H:i:s");

        // Build The Post Array, This will be posted into BackUp
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
            'F9domain'          => $list_domain,
            'F9list'            => $listname,
            'WC_SubId'          => $subid,
            'aim_lead_number'   => $aim_lead_number,
            'disposition'       => $disposition,
            'disposition_date'  => $newtime,
            'call_agent'        => $agent,
            'career'            => strtoupper($career),
            'call_agent'        => $agent,
            'Full_SubId'        => $vendorid,
            'IP'                => $ip,
            'lead_notes'        => $notes,
        );

                // Check for duplicate lead number in Backup Table
        $DB1->select('lead_number')
            ->where('lead_number', $lead_number)
            ->or_where('email', $email);
         $leadcheck = $DB1->get('BackUp');

        if ($leadcheck->num_rows()>0)
        {
            $success = "Record Updated";
            $error = '';
            $this->session->set_userdata('submit_success', $success);
            $this->session->set_userdata('submit_error', $error);

            $DB1->where('lead_number', $lead_number)
                ->update('BackUp', $post);
            redirect($redirect);
        }

        else
        {
            $DB1->insert('BackUp', $post);

            $DB1->select('lead_number')
                ->where('lead_number', $lead_number);
            $query = $DB1->get('BackUp');

        }




        // If the lead was submitted successfully to BackUp then give a hooray!
        if ($query->num_rows()>0)
        {
            // Begin HTTP Post to ConnectFirst using Curl library http://philsturgeon.co.uk/code/codeigniter-curl
            $this->load->library('curl');
//            $this->curl->create('http://www.virtualacd.biz/system/listloader/ListLoader.cfm');

            // Build Post array
            $post = array(
                'security_key'  =>  'c2e0365dd9cd90738dc11a51a253da15',
                'campaign_id'   =>  '57916',
                'extern_id'     =>  $lead_number,
                'phone'         =>  $phone,
                'first_name'    =>  $firstname,
                'last_name'     =>  $lastname,
                'zip'           =>  $zip,
                'aux_data1'     =>  $career,
                'email'         =>  $email
            );

            // Submit Post
//            $this->curl->simple_post($post);
            $this->curl->simple_post('http://www.virtualacd.biz/system/listloader/ListLoader.cfm', $post);
            $curlpost = $this->curl->execute();


            $error = "";
            $this->session->set_userdata('submit_error', $error);
            $success = "Lead added to system. Thank you!";
            $this->session->set_userdata('submit_success', $success);
            $this->session->set_userdata('curlpost', $curlpost);
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

    function submitToSchool($lead_number, $agent, $network, $school, $type, $client_id, $id, $link, $source, $redirect)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('*')
            ->where('lead_number', $lead_number);
        $query = $DB1->get('BackUp');

        if ($query->num_rows()>0)
        {
                foreach ($query->result_array() as $row)
            {
                $first_name = $row['first_name'];
                $last_name  = $row['last_name'];
                $email      = $row['email'];
                $grad_year  = $row['grad_year'];
                $street     = $row['street'];
                $city       = $row['city'];
                $state      = $row['state'];
                $zip        = $row['zip'];
                $number     = $row['number'];
            }
        }

        else
        {
            echo "no lead found for " . $lead_number;
        }
        

        // Get time for Click Event
        $newtime = date("Y-m-d H:i:s");

        $post = array(
            'network'           => $network,
            'school'            => $school,
            'type'              => $type,
            'client_id'         => $client_id,
            'cb_id'             => $id,
            'link'              => $link,
            'lead_number'       => $lead_number,
            'lead_email'        => $email,
            'agent'             => $agent,
            'first_name'        => $first_name,
            'last_name'         => $last_name,
            'grad_year'         => $grad_year,
            'zip'               => $zip,
            'lead_source'       => $source,
            'converted'         => '1'
        );

        $DB1->insert('conversions', $post);

        $DB1->select('lead_number')
                ->where('lead_number', $lead_number);
        $query = $DB1->get('conversions');

        // If the lead was submitted successfully to BackUp then give a hooray!
        if ($query->num_rows()>0)
        {
            $error = "";
            $this->session->set_userdata('submit_error', $error);
            $success = "Lead converted and added to system. Thank you!";
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

/*        $this->load->library('curl');

        $url    = '&firstname=' . $first_name;
        $url    .= '&lastname=' . $last_name;
        $url    .= '&email=' . $email;
        $url    .= '&gradyear=' . $grad_year;
        $url    .= '&phone=' . $number;
        $url    .= '&address1=' . $street;
        $url    .= '&thankyou=http://www.qualityleads-inc.com/callcenter/thankyou.phtml';
        $url    .= '&nothankyou=http://www.qualityleads-inc.com/callcenter/thankyou.phtml';

        header('Location: ' . $link . $url . '"' );*/



        
    }

}
