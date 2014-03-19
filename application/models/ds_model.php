<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 5/23/11
 * Time: 12:59 PM
 * To change this template use File | Settings | File Templates.
 */
 
class DS_Model extends CI_Model {

    function __construct()
       {
           // Call the Model constructor
           parent::__construct();
       }

    function checksubmit($number,$email)
    {
        
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('lead_number');
        $DB1->from('BackUp');
        $DB1->where('email', $email);
        $DB1->or_where('number', $number);
        $query = $DB1->get();

        if ($query->num_rows()>0)
        {
            $count = '1';
            return $count;
        }

        else
        {
            $count = '0';
            return $count;
        }

    }

    function dsubmit($fname,$lname,$number,$email,$street,$city,$state,$zip,$q1,$q2,$q3)
    {

    }
    

}
