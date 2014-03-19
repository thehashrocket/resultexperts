<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 6/7/11
 * Time: 7:27 AM
 * To change this template use File | Settings | File Templates.
 */
 
class Collegebound_Model extends CI_Model{

    function build_cb_offers($zip,$cb_career_code,$grad_year,$email)
    {
        $this->load->library('curl');
        $this->load->model('Transformer_Model');
        
        $request = array(
            'id'         => '434',
            'code'       => 'f16e5d03f52ac',
            'zip'        => $zip,
            'career'     => $cb_career_code,
        );

        $url = "http://www.collegesurfing.com/a3/xmlcapsulecreate.php?";
		$url .= "id=434";
		$url .= "&code=f16e5d03f52ac";
		$url .= "&zip=$zip";
		$url .= "&career=3";
		$url .= "&gradyear=$grad_year";
        
        $xml = simplexml_load_string($this->curl->simple_post('http://www.collegesurfing.com/a3/xmlcapsulecreate.php', $request));
        $cb_info["xml"] = $xml;

        $offers = $this->Transformer_Model->xml_to_array($xml);

        $query = $offers['searchresults']['capsule'];
        return $query;
        
        $cb_info["offers"] = $offers;

    }

    public function get_career_code($career)
    {
        $cb_career_code = '256';
        $DB1 = $this->load->database('QualityLeads', TRUE);
        // Get CollegeBound Career Code from career Table

        $DB1->select('cb_career_code')
            ->where('career_id', $career);
        $query = $DB1->get('career');
        foreach ($query->result_array() as $row)
        {
            $cb_career_code = $row['cb_career_code'];
        }
        return $cb_career_code;
    }

}
