<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 6/7/11
 * Time: 12:32 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Cunet_Model extends CI_Model {

    // Deprecated - Do Not Use
    function cu_career_codes()
    {
        $cu_career_codes = array();
        $cu_career_codes["crm"]["main"]		= "12";
		$cu_career_codes["crm"]["sub"]		= "154,155,156,157,214,370";

        $cu_career_codes["cul"]["main"]		= "19";
		$cu_career_codes["cul"]["sub"]		= "235,241,249";
		$cu_career_codes["cul2"]["main"]	= "19";
		$cu_career_codes["cul2"]["sub"]		= "235,241,249";

        $cu_career_codes["mas"]["main"]		= "10";
		$cu_career_codes["mas"]["sub"]		= "200";

        $cu_career_codes["nur"]["main"]		= "10";
		$cu_career_codes["nur"]["sub"]		= "202,201,192,362,194,196,367,191,205,206,251,275,208";

        $cu_career_codes["it"]["main"]		= "4";
		$cu_career_codes["it"]["sub"]		= "136,137,139,345,140,142,143,145,141,150,151,152,153";

        $cu_career_codes["fas"]["main"]		= "2";
		$cu_career_codes["fas"]["sub"]		= "104";

        $cu_career_codes["art"]["main"]		= "2";
		$cu_career_codes["art"]["sub"]		= "101,252,332,103,307,351,107";

        $cu_career_codes["mt"]["main"]		= "10";
		$cu_career_codes["mt"]["sub"]		= "201";

        return $cu_career_codes;

    }

    function get_career_code($career)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);
        // Get CollegeBound Career Code from career Table

        $DB1->select('cu_main, cu_sub')
            ->where('career_id', $career)
            ->group_by('career_id');
        $query = $DB1->get('career');
        return $query;
    }

}
