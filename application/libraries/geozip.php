<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Copyright 2010 Nelson Wells
 * CI Class based on code by Micah Carrick at the following url:
 * http://www.micahcarrick.com/04-19-2005/php-zip-code-range-and-distance-calculation.html
 * 
 * Distributed under GPL Version 3.  See included gpl.txt for license.
 * 
 * http://www.nelsonwells.net
 */

//constant for convering to kilometers from miles
define('M2KM_FACTOR', 1.609344);

// constants for passing $sort to get_zips_in_range()
define('SORT_BY_DISTANCE_ASC', 1);
define('SORT_BY_DISTANCE_DESC', 2);
define('SORT_BY_ZIP_ASC', 3);
define('SORT_BY_ZIP_DESC', 4);

class Geozip 
{
    var $units;
	var $decimals;
	var $last_error;
	var $CI;
	
	function __construct()
    {
		$this->CI = get_instance();
		
		$this->units = "miles";
		$this->decimals = 2;
    }
	
	function get_zip_details($zip)
	{
		$this->CI->db->select("lat AS lattitude, lon AS longitude, city, county, state_prefix");
		$this->CI->db->select("state_name, area_code, time_zone");
		$this->CI->db->where("zip_code", $zip);
		$results = $this->CI->db->get("zip_code");
		
		if($results->num_rows() < 1)
		{
			$this->set_last_error("Zip not found in database");
			return false;
		}
		else
		{
			return $results->row();
		}
	}
	
	function get_zips_in_range($zip, $range, $sort=1, $include_base=true)
	{
		//get base zip details
		$details = $this->get_zip_point($zip);
		
		if( ! $details)
		{
			return false;
		}
		
		//find max - min lat / long for radius and zero point and query
		//only zips in that range.
		$lat_range = $range/69.172;
		$lon_range = abs($range/(cos($details->lat) * 69.172));
		$min_lat = number_format($details->lat - $lat_range, "4", ".", "");
		$max_lat = number_format($details->lat + $lat_range, "4", ".", "");
		$min_lon = number_format($details->lon - $lon_range, "4", ".", "");
		$max_lon = number_format($details->lon + $lon_range, "4", ".", "");
		
		//build the sql query
		$this->CI->db->select("zip_code, lat, lon");
		
		if( ! $include_base)
		{
			$this->CI->db->where("zip_code <>", $zip);
		}
		
		$this->CI->db->where("lat BETWEEN '$min_lat' AND '$max_lat'");
		$this->CI->db->where("lon BETWEEN '$min_lon' AND '$max_lon'");
		
		$result = $this->CI->db->get("zip_code");
		
		if($result->num_rows() < 1)
		{
			$this->set_last_error("SQL error in get_zips_in_range");
			return false;
		}
		else
		{
			//loop through all 40 some thousand zip codes and determine whether
            //or not it's within the specified range.
			
			foreach($result->result() as $row)
			{
				$distance = $this->calculate_mileage($details->lat,$row->lat,$details->lon,$row->lon);
				
				if($this->units == "kilos")
				{
					$distance *= M2KM_FACTOR;
				}
				
				if($distance <= $range)
				{
					$zips[$row->zip_code] = $distance;
				}
			}
		}
		
		//sort the zips as selected
		switch($sort)
		{
			case SORT_BY_DISTANCE_ASC:
				asort($zips);
				break;
			
			case SORT_BY_DISTANCE_DESC:
				arsort($zips);
				break;
			
			case SORT_BY_ZIP_ASC:
				ksort($zips);
				break;
			
			case SORT_BY_ZIP_DESC:
				krsort($zips);
				break; 
		}
		
		return $zips;
		
	}
	
	/*
	 * Get the distance between 2 zip codes.
	 */
	function get_distance($zip1, $zip2)
	{
		//return 0 miles / kilos if its the same zip
		if($zip1 == $zip2)
		{
			return 0;
		}

		//get the details from the database and exit if there is an error
		$details1 = $this->get_zip_point($zip1);
		$details2 = $this->get_zip_point($zip2);
		
		if($details1 === false || $details2 === false)
		{
			return false;
		}
		
		//calculate the distance between the 2 zip codes based on
		//the latitude and longitude pulled from the database
		$miles = $this->calculate_mileage($details1->lat,
										 $details2->lat, 
										 $details1->lon, 
										 $details2->lon);
										 
										 
		if($this->units == "kilos")
		{
			return round($miles * M2KM_FACTOR, $this->decimals);
		}
		else
		{
			return round($miles, $this->decimals);
		}	
	}
	
	/*
	 * Set the units to describe distance
	 * Accepts "miles" or "kilos"
	 */
	function set_units($units = "miles")
	{
		if($units != "kilos" || $units != "miles")
		{
			$this->units = "miles";
		}
		else
		{
			$this->units = $units;
		}
	}
	
	function get_last_error()
	{
		return $this->last_error();
	}
	
	/*
	 * Pull latitude and longitude from the database
	 */
	private function get_zip_point($zip)
	{
		$this->CI->db->select("lat, lon")->where("zip_code", $zip);
		$result = $this->CI->db->get("zip_code");
		
		if($result->num_rows() < 1)
		{
			$this->set_last_error("Zip code not found in db: $zip");
			return false;
		}
		else
		{
			return $result->row();
		}
	}
	
	private function calculate_mileage($lat1, $lat2, $lon1, $lon2)
	{
		//convert lattitude/longitude (degrees) to radians for calculations
		$lat1 = deg2rad($lat1);
	    $lon1 = deg2rad($lon1);
	    $lat2 = deg2rad($lat2);
	    $lon2 = deg2rad($lon2);
	      
	    //find the deltas
	    $delta_lat = $lat2 - $lat1;
	    $delta_lon = $lon2 - $lon1;
		
	    //find the Great Circle distance 
	    $temp = pow(sin($delta_lat/2.0),2) + cos($lat1) * cos($lat2) * pow(sin($delta_lon/2.0),2);
	    $distance = 3956 * 2 * atan2(sqrt($temp),sqrt(1-$temp));
		
		return $distance;
	}
	
	private function set_last_error($error)
	{
		$this->last_error = $error;
	}
}