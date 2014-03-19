<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 6/7/11
 * Time: 6:05 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Clients_Model extends CI_Model {

    function legacy_get_dm_schools_by_email($email)
    {
        $DB1 = $this->load->database('QualityLeads', TRUE);

        $DB1->select('school_id')
            ->where('lead_email', $email)
            ->where('qualified', 'Q')
            ->not_like('AG', 'DM');
        $sitetrax_schools = $DB1->get('SiteTrax');

        $school_names = array();

        if($sitetrax_schools)
        {
            foreach ($sitetrax_schools->result_array() as $row)
            {
                $school_name    = explode(" | ", $row[0]);
                $num_names      = count($school_name);
                if (is_array($school_name) && ($num_names > 0)) {
					$school = trim($school_name[0]);
					if (!array_key_exists($school, $school_names)) {
						$school_names[$school] = array();
					}
					$school_names[$school][($num_names > 1) ? trim($school_name[1]) : $school] = 1;
				}

            }
        }

        $offer_count = 0;
		foreach ($school_names as $school => $campuses) {
			foreach ($campuses as $campus => $is_one) {
				$offer_count++;
			}
        }

        $good_offers["offer_count"]	= $offer_count;
        $good_offers["schools"]		= $school_names;
        return $good_offers;



    }

}
