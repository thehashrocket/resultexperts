<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 5/25/11
 * Time: 1:00 PM
 * To change this template use File | Settings | File Templates.
 */


/*This Model is used for uploading files and processing them. Two functions were available.
One is to allow a file upload and change a vendor. The other is to upload a file
and input leads into the database.*/

class Script_Model extends CI_Model {

    function changeVendor($csvName, $origVendor, $newVendor)
    {
        $filePath = './uploads/' . $csvName;
        $csvData = $this->csvreader->parse_file($filePath);

        $DB1 = $this->load->database('QualityLeads', TRUE);

        $ucount = 0;
        $bcount = 0;
        $field['email'] = "";

        foreach($csvData as $field)
        {
            $DB1->select('lead_number','email', 'Full_SubId');
            $DB1->from('BackUp');
            $DB1->where('email', $field['email']);
            $DB1->where('Full_SubId', $origVendor);
            $query = $DB1->get();

            if ($query->num_rows()>0)
            {
                
                $data = array
                (
                    'email' => $field['email'],
                    'Full_SubId' => $newVendor,
                );

                $DB1->where('email', $field['email']);
                $DB1->update('BackUp', $data);
                $ucount = $ucount ++;
            }

            else
            {
                $bcount = $bcount ++;

            }


        }

        $this->session->set_userdata('updated', $ucount);
        $this->session->set_userdata('unupdated', $bcount);

        $this->Script->success($ucount, $bcount);


    }

function uploadLeads($csvName)
    {
        $filePath = './uploads/' . $csvName;
        $csvData = $this->csvreader->parse_file($filePath);

        $DB1 = $this->load->database('QualityLeads', TRUE);

        $ucount = 0;
        $bcount = 0;
        $field['email'] = "";

        $success = "";
        $error = "";
        $this->session->set_userdata('submit_success', $success);
        $this->session->set_userdata('submit_error', $error);

        $this->load->helper('date');

        foreach($csvData as $field)
        {



            // Check for duplicate email in Backup Table
            $DB1->select('email')
                ->where('email', $field['email']);
             $emailcheck = $DB1->get('BackUp');

            if ($emailcheck->num_rows()>0)
            {
                $error .= 'Duplicate Email Exists' . $field['email'] . ': Unable to submit.';
            }

            else
            {
                $datestring = "%Y-%m-%d  %h:%i:%s";
                $time = time();
                $newtime = date("Y-m-d H:i:s");

                // Get variables from Lists Table
                $DB1->select('*')
                            ->where('list_map',$field['career']);
                $f9_info = $DB1->get('Lists');
                foreach ($f9_info->result_array() as $row)
                {
                    $list_domain = $row['list_domain'];
                    $listname = $row['listname'];
                    $list_url = $row['list_url'];
                }

                $lead_number = uniqid(rand());

                // Build The Post Array, This will be posted into BackUp
                $post = array
                (
                    'lead_number'       => $lead_number,
                    'created_date'      => $newtime,
                    'first_name'        => $field['firstname'],
                    'last_name'         => $field['lastname'],
                    'street'            => $field['street'],
                    'email'             => $field['email'],
                    'grad_year'         => $field['grad'],
                    'city'              => $field['city'],
                    'state'             => $field['state'],
                    'zip'               => $field['zip'],
                    'number'            => $field['number'],
                    'F9domain'          => $list_domain,
                    'F9list'            => $listname,
                    'WC_SubId'          => $field['subid'],
                    'aim_lead_number'   => $field['aim'],
                    'career'            => $field['career'],
                    'Full_SubId'        => $field['vendor'],
                    'IP'                => $field['ip'],
                    'lead_notes'        => 'Direct Upload',
                );

                $DB1->insert('BackUp', $post);

                $DB1->select('lead_number')
                    ->where('lead_number', $lead_number);
                $query = $DB1->get('BackUp');

                // If the lead was submitted successfully to LeadTmp then give a hooray!
                if ($query->num_rows()>0)
                {
                    $success .= 'Email Address' . $field['email'] . 'was added.';
                }

                // If the lead wasn't submitted successfully then Boo!
                else
                {
                    $error .= 'Email Address' . $field['email'] . 'was not added.';
                }
            }



        }

        print_r($success);
        print_r($error);



    }

}
