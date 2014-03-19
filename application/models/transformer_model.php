<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 6/8/11
 * Time: 6:34 AM
 * To change this template use File | Settings | File Templates.
 */
 
class Transformer_Model extends CI_Model {

    private $max_recursion = 25;
	private $xml_attr = "@attributes";
	private $xml_class_name = "SimpleXMLElement";
	private $original_xml;

    	public function clean_xml($xml) {
	    $xml = str_replace(':', '_', $xml);
	    $xml = str_replace('http_', 'http:', $xml);
	    $xml = str_replace('Ü', "", $xml);
	    $xml = str_replace('á', "", $xml);
	    $xml = str_replace('í', "'", $xml);
	    $xml = preg_replace("/<(\/)?(font|span|del|ins)[^>]*>/","",$xml);
	    $xml = preg_replace("/<([^>]*)(class|lang|style|size|face)=(\"[^\"]*\"|'[^']*'|[^>]+)([^>]*)>/","<$1>",$xml);
	    return $xml;
	}

	// takes a string in the format mm-dd-yyyy
	public function datepicker_string_to_mysql_datetime($datepicker_string) {
		$error_txt[] = 'Transformer->datepicker_string_to_mysql_datetime($datepicker_string) Exception:';
		$matches = $this->grep("/^(\d{2})-(\d{2})-(\d{4})$/", $datepicker_string, true);
		if (!$matches || !is_array($matches) || count($matches) != 4) {
			$error_txt[] = "invalid value";
			$error_txt[] = "datepicker_string did not match";
			$error_txt[] = "datepicker_string: '$datepicker_string'";
			$this->except($error_txt);
		}
		$datepicker_string = $matches[0];
		$month = $matches[1];
		$day = $matches[2];
		$year = $matches[3];
		$start_of_day = true;
		$args = func_get_args();
		if (isset($args[1])) {
			$start_of_day = false;
		}
		$time = $start_of_day ? "00:00:00" : "23:59:59";
		return "{$year}-${month}-${day} $time";
	}

	public function extract_phone($phone) {
		$phone_match = $this->grep("/\D*(\d{3})\D*(\d{3})\D*(\d{4})/", $phone, true);
		if (!$phone_match) {
			return false;
		}
		return $phone_match[1] . $phone_match[2] . $phone_match[3];
	}

	public function merge_array($array1, $array2, $recursive = false) {
		if (is_array($array1) && is_array($array2)) {
			if ($recursive) {
				return array_merge_recursive($array1, $array2);
			}
			return array_merge($array1, $array2);
		}
		if (is_array($array1)) {
			return array_merge($array1);
		}
		elseif (is_array($array2)) {
			return array_merge($array2);
		}
		return false;
	}

	public function xml_to_array($xml, &$depth = 0) {
		$error_txt[] = 'Transformer->xml_to_array($xml, &$depth = 0) Exception';
		if ($xml == null) {
			$this->except("invalid value xml: null");
		}
		if ($depth > $this->max_recursion) {
			$this->except("recursion depth exceeded maximum depth: '$depth' max_recursion: '" . $this->max_recursion . "'");
		}
		if ($depth == 0) {
			if (!($xml instanceof $this->xml_class_name)) {
				$error_txt[] = "invalid value xml: '$xml'";
				$error_txt[] = "this->xml_class_name: " . $this->xml_class_name;
				$this->except($error_txt);
			}
			$this->original_xml = $xml;
		}
		if ($xml instanceof $this->xml_class_name) {
			$copy_xml	= $xml;
			$xml		= get_object_vars($xml);
		}
		if (is_array($xml)) {
			$result = array();
			if (count($xml) <= 0) {
				return (trim(strval($copy_xml)));
			}
			foreach ($xml as $key => $value) {
				// For turning off element attributes
				// if (is_string($key) && ($key == $xml_attr))
				// {
				// 	continue;
				// }

				$depth++;
				$result[$key] = $this->xml_to_array($value,$depth);
				$depth--;
			}
			if ($depth == 0) {
				$temp_result					= $result;
				$result							= array();
				$org_xml						= $this->original_xml;
				$result[$org_xml->getName()]	= $temp_result;
			}
			return $result;
		}
		else
		{
			return (trim(strval($xml)));
		}
	}

}
