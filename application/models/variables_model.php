<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 6/8/11
 * Time: 7:08 AM
 * To change this template use File | Settings | File Templates.
 */
 
class Variables_Model extends CI_Model {

    public function build_bad_schools() {
		$this->variables["bad_schools"] = array();
		$this->build_bad_non_dm_schools();
		$this->build_bad_dm_schools();

		// $this->variables["bad_schools"][] = array("459","Cortiva - Zone A");
		// $this->variables["bad_schools"][] = array("2175","Cortiva - Zone B");
		// $this->variables["bad_schools"][] = array("2750","Cortiva - Zone D - API (0-29)");
		// $this->variables["bad_schools"][] = array("2761","Cortiva - Zone E - API (30-National)");
		// $this->variables["bad_schools"][] = array("942","National Personal Training Institute (NPTI)");
		// $this->variables["bad_schools"][] = array("1495","Utah College of Massage Therapy (UCMT) - Zone B - East");
		// $this->variables["bad_schools"][] = array("877","Utah College of Massage Therapy (UCMT)");
		// $this->variables["bad_schools"][] = array("946","LTD - EDMC - Art Institutes - Schools in the Arts (SITA)");
		// $this->variables["bad_schools"][] = array("1914","EDMC - Art Institutes Online (AIO)");
		// $this->variables["bad_schools"][] = array("762","EDMC - Art Institutes - Tier 2 (51 - 100)");
		// $this->variables["bad_schools"][] = array("2144","LTD - Cortiva - Hot Transfer");
		// $this->variables["bad_schools"][] = array("2560","Cortiva - Zone C - Chat");
		// $this->variables["bad_schools"][] = array("323","EDMC - Argosy University - Graduate");
		// $this->variables["bad_schools"][] = array("344","EDMC - South University");
		// $this->variables["bad_schools"][] = array("762","EDMC - Art Institutes - Tier 2 (51 - 100)");
		// $this->variables["bad_schools"][] = array("946"," LTD - EDMC - Art Institutes - Schools in the Arts (SITA)");
		// $this->variables["bad_schools"][] = array("2134"," LTD - EDMC - South University - Help Center");
		// $this->variables["bad_schools"][] = array("1088","EDMC - Brown Mackie College (BMC)");
		// $this->variables["bad_schools"][] = array("1606"," LTD - EDMC - Art Institutes - Zone C (Affiliate)");
		// $this->variables["bad_schools"][] = array("1882","EDMC - Art Institutes - Culinary");
		// $this->variables["bad_schools"][] = array("1914","EDMC - Art Institutes Online (AIO)");
		// $this->variables["bad_schools"][] = array("2135"," LTD - EDMC - Brown Mackie College (BMC) - Help Center");
		// $this->variables["bad_schools"][] = array("2226","EDMC - Argosy University - Undergraduate");
		// $this->variables["bad_schools"][] = array("2499"," LTD - EDMC - Art Institutes - Zone D (Affiliate)");
		// $this->variables["bad_schools"][] = array("2592","EDMC - Art Institutes - Tier 3 (101 - 500)");
		// $this->variables["bad_schools"][] = array("2652","EDMC - South University - Online (SUO) - Affiliate");
		// $this->variables["bad_schools"][] = array("2334","LTD - EDMC - Art Institutes Online (AIO) - Help Center");
		// $this->variables["bad_schools"][] = array("2548","LTD - EDMC - Art Institutes - Internal Help Center - Green Logo");
		// $this->variables["bad_schools"][] = array("2826","EDMC - Art Institutes - Focus Schools");
		// $this->variables["bad_schools"][] = array("1217","REGIS - Martin's College of Cosmetology");
		// $this->variables["bad_schools"][] = array("1238","REGIS - Hair Design School");
		// $this->variables["bad_schools"][] = array("1247","REGIS - Blaine The School");
		// $this->variables["bad_schools"][] = array("1249","REGIS - Chic University of Cosmetology");
		// $this->variables["bad_schools"][] = array("1250","REGIS - Natural Motion");
		// $this->variables["bad_schools"][] = array("1251","REGIS - Pierre's School of Cosmetology");
		// $this->variables["bad_schools"][] = array("1252","REGIS - Scot Lewis Schools");
		// $this->variables["bad_schools"][] = array("1311","REGIS - Arthur Angelo The Professional School");
		// $this->variables["bad_schools"][] = array("1139","Empire Beauty Schools");
		// $this->variables["bad_schools"][] = array("1339","PLATTFORM - Empire College");
		// $this->variables["bad_schools"][] = array("2684","The Hair Design Schools");
		// $this->variables["bad_schools"][] = array("1539","SETS School of Exercise Training and Science");
		// $this->variables["bad_schools"][] = array("1489","American Academy of Personal Training (AAPT)");
		// $this->variables["bad_schools"][] = array("2509","American Academy of Personal Training (AAPT) - Boston");
		// $this->variables["bad_schools"][] = array("2158","The Academy Waukesha, Paul Mitchell Partner");
		// $this->variables["bad_schools"][] = array("1642","The Salon Professional Academy - Buffalo, NY");
		// $this->variables["bad_schools"][] = array("2753","The Salon Professional Academy - Shorewood, IL");
		// $this->variables["bad_schools"][] = array("1690","Regis University");
		// $this->variables["bad_schools"][] = array("1771","University Alliance - Regis University MBA - Online");
		// $this->variables["bad_schools"][] = array("2504","Empire Beauty Schools - Billing");
		// $this->variables["bad_schools"][] = array("2307","The Salon Professional Academy - Grand Junction");
		// $this->variables["bad_schools"][] = array("1990","The Salon Professional Academy - Inverness");
		// $this->variables["bad_schools"][] = array("2416","The Salon Professional Academy - Boynton Beach, FL");
		// $this->variables["bad_schools"][] = array("2443","The Salon Professional Academy - Orlando/Apopka, FL");
		// $this->variables["bad_schools"][] = array("2479","The Salon Professional Academy - South Plainfield, NJ");
		// $this->variables["bad_schools"][] = array("2521","The Salon Professional Academy - Huntsville");
		// $this->variables["bad_schools"][] = array("1790","American Academy of Personal Training (AAPT)");
		// $this->variables["bad_schools"][] = array("4450","American Academy of Personal Training (AAPT) - Boston");


		// original bad schools
		//$this->variables["bad_schools"][] = "CONNECTICUT CENTER FOR MASSAGE THERAPY";
		//$this->variables["bad_schools"][] = "THE SALON PROFESSIONAL ACADEMY";
		//$this->variables["bad_schools"][] = "NEW YORK CHIROPRACTIC COLLEGE";
		//$this->variables["bad_schools"][] = "DELAWARE LEARNING INSTITUTE OF COSMETOLOGY";
		//$this->variables["bad_schools"][] = "ANTON AESTHETICS ACADEMY";
		//$this->variables["bad_schools"][] = "ADRIAN'S BEAUTY COLLEGE";
		//$this->variables["bad_schools"][] = "THE NATIONAL PERSONAL TRAINING INSTITUTE";
		//$this->variables["bad_schools"][] = "THE AMERICAN ACADEMY OF PERSONAL TRAINING";
		//$this->variables["bad_schools"][] = "HIGH-TECH-INSTITUTE";
		//$this->variables["bad_schools"][] = "ANTHEM-INSTITUTE";
		//$this->variables["bad_schools"][] = "ANTHEM COLLEGE";
		//$this->variables["bad_schools"][] = "EVEREST";
		//$this->variables["bad_schools"][] = "WYOTECH";

		// new bad schools as of email via robert Nov 5 2009
		//$this->variables["bad_schools"][] = "Argosy University - Graduate";
		//$this->variables["bad_schools"][] = "Argosy University - Online (AUO)";
		//$this->variables["bad_schools"][] = "Argosy University - Online (AUO) - Help Center";
		//$this->variables["bad_schools"][] = "Argosy University - Undergraduate";
		//$this->variables["bad_schools"][] = "Art Institutes";
		//$this->variables["bad_schools"][] = "Art Institutes";
		//$this->variables["bad_schools"][] = "Art Institutes";
		//$this->variables["bad_schools"][] = "Art Institutes - Affiliate Help Center";
		//$this->variables["bad_schools"][] = "Art Institutes - Culinary";
		//$this->variables["bad_schools"][] = "Art Institutes - Internal";
		//$this->variables["bad_schools"][] = "Art Institutes - Schools in the Arts (SITA)";
		//$this->variables["bad_schools"][] = "Art Institutes - Zone C";
		//$this->variables["bad_schools"][] = "Art Institutes - Zone D";
		//$this->variables["bad_schools"][] = "Art Institutes Online (AIO)";
		//$this->variables["bad_schools"][] = "Art Institutes Online (AIO) - Help Center";
		//$this->variables["bad_schools"][] = "Brown Mackie College (BMC)";
		//$this->variables["bad_schools"][] = "Brown Mackie College (BMC) - Help Center";
		//$this->variables["bad_schools"][] = "South University";
		//$this->variables["bad_schools"][] = "South University - Help Center";
		//$this->variables["bad_schools"][] = "South University - Online (SUO)";
		//$this->variables["bad_schools"][] = "South University - Online (SUO) - Affiliate";
		//$this->variables["bad_schools"][] = "Utah College of Massage Therapy (UCMT)";
		//$this->variables["bad_schools"][] = "Utah College of Massage Therapy (UCMT) - Zone B - East";
	}

	public function build_bad_dm_schools() {
		$dm_schools[] = array("826","DATAMARK - ATA Career College");
		$dm_schools[] = array("643","CCI - DATAMARK - Everest College");
		$dm_schools[] = array("644","CCI - DATAMARK - Everest University");
		$dm_schools[] = array("1903","DATAMARK - Marygrove College - AD");
		$dm_schools[] = array("343","DATAMARK - Pioneer Pacific College");
		$dm_schools[] = array("374","DATAMARK - The Center for Digital Imaging Arts (CDIA)");
		$dm_schools[] = array("1178","DATAMARK - Elmira Business Institute");
		$dm_schools[] = array("445","DATAMARK - Kendall College");
		$dm_schools[] = array("447","DATAMARK - Michigan Institute of Aviation and Technology (MIAT)");
		$dm_schools[] = array("450","DATAMARK - Institute of Business & Medical Careers (IBMC)");
		$dm_schools[] = array("473","DATAMARK - YTI Career Institute");
		$dm_schools[] = array("662","DATAMARK - Timberline1");
		$dm_schools[] = array("612","DATAMARK - Concorde Career Colleges");
		$dm_schools[] = array("658","CCI - DATAMARK - WyoTech - Everest");
		$dm_schools[] = array("659","CCI - DATAMARK - Everest College of Business, Technology and Health Care");
		$dm_schools[] = array("798","DATAMARK - Newbridge College");
		$dm_schools[] = array("872","DATAMARK - Nossi College of Art");
		$dm_schools[] = array("929","DATAMARK - Pennco Tech");
		$dm_schools[] = array("934","CCI - DATAMARK - Everest Institute");
		$dm_schools[] = array("1653","DATAMARK - Marygrove College - CES");
		$dm_schools[] = array("1727","DATAMARK - Walden University - Online");
		$dm_schools[] = array("1787","DATAMARK - Jones International University (JIU) - Online");
		$dm_schools[] = array("1845","DATAMARK - Jones International University (JIU)");
		$dm_schools[] = array("2091","DATAMARK - Upper Iowa University");
		$dm_schools[] = array("2105","DATAMARK - Upper Iowa University External Degree");
		$dm_schools[] = array("2187","DATAMARK - Arcadia University");
		$dm_schools[] = array("2193","DATAMARK - Kendall College ECE");
		$dm_schools[] = array("2257","DATAMARK - University of the Rockies - Online");
		$dm_schools[] = array("2269","DATAMARK - Crimson Technical College");
		$dm_schools[] = array("2408","DATAMARK - TEACHSCAPE - Cardinal Stritch University");
		$dm_schools[] = array("2583","DATAMARK - Champlain College");
		$dm_schools[] = array("2674","DATAMARK - Ashford University Online - Grad");
		$dm_schools[] = array("2647","LTD - CCI - DATAMARK - Everest College - API");
		$dm_schools[] = array("2710","LTD - CCI - DATAMARK - Everest College - Call Center");
		$dm_schools[] = array("2711","LTD - CCI - DATAMARK - Everest Institute - Call Center");
		$dm_schools[] = array("2712","LTD - CCI - DATAMARK - Everest University - Call Center");
		$dm_schools[] = array("1117","DATAMARK - Ashford University");
		$dm_schools[] = array("660","DATAMARK - Woodbury College");
		$dm_schools[] = array("1903","DATAMARK - Marygrove College - AD");
		$dm_schools[] = array("647","CCI - DATAMARK - Las Vegas College");
		$dm_schools[] = array("2453","DATAMARK - CEA Global Education Solutions");
		$dm_schools[] = array("776","DATAMARK - University of Redlands");
		$dm_schools[] = array("662","DATAMARK - Timberline1");
		$dm_schools[] = array("661","DATAMARK - Helma Institute of Massage Therapy");
		$dm_schools[] = array("537","DATAMARK - PJA School");
		$dm_schools[] = array("899","DATAMARK - Newbridge College - Burbank");
		$dm_schools[] = array("737","DATAMARK - San Joaquin Valley College (SJVC)");
		$dm_schools[] = array("1164","DATAMARK - New England College of Finance");
		$dm_schools[] = array("796","DATAMARK - Trumbull Business College");
		$dm_schools[] = array("839","DATAMARK - Prism Career Institute");
		$dm_schools[] = array("1300","DATAMARK - Crown College");
		$dm_schools[] = array("1302","DATAMARK - College of Legal Arts (COLA)");
		$dm_schools[] = array("1362","DATAMARK - Video Symphony");
		$dm_schools[] = array("1588","DATAMARK - Valley Career College (VCC)");
		$dm_schools[] = array("1680","DATAMARK - Pepperdine University");
		$dm_schools[] = array("1694","DATAMARK - NCA Business & Technology Center");
		$dm_schools[] = array("1719","DATAMARK - Hensmann Learning");
		$dm_schools[] = array("1729","DATAMARK - Western Governors University - Online (WGU)");
		$dm_schools[] = array("1790","DATAMARK - Polytechnic Institute of New York University (NYU) - Online");
		$dm_schools[] = array("1803","DATAMARK - Liberty University - Residential");
		$dm_schools[] = array("1824","DATAMARK - Chapman University - Orange");
		$dm_schools[] = array("1838","DATAMARK - University of Pennsylvania - UPENN");
		$dm_schools[] = array("1920","DATAMARK - Western Governors University");
		$dm_schools[] = array("1923","DATAMARK - Nichols College");
		$dm_schools[] = array("1937","DATAMARK - Liberty University - Distance Learning");
		$dm_schools[] = array("1970","DATAMARK - Pepperdine University - FEMBA");
		$dm_schools[] = array("1999","DATAMARK - Walden University");
		$dm_schools[] = array("2031","DATAMARK - The University of Pennsylvania Summer Sessions");
		$dm_schools[] = array("2058","DATAMARK - The University of Pennsylvania - Graduate Programs");
		$dm_schools[] = array("2060","DATAMARK - Ivy Bridge College of Tiffin University");
		$dm_schools[] = array("2092","DATAMARK - Upper Iowa University - Online");
		$dm_schools[] = array("2102","DATAMARK - Chapman University Argyros");
		$dm_schools[] = array("2105","DATAMARK - Upper Iowa University External Degree");
		$dm_schools[] = array("2118","DATAMARK - Advanced College");
		$dm_schools[] = array("2236","DATAMARK - Pepperdine University - Graduate School of Education and Psychology (PSY Page)");
		$dm_schools[] = array("2239","DATAMARK - Pepperdine University - Graduate School of Education and Psychology (EDU Page)");
		$dm_schools[] = array("2269","DATAMARK - Crimson Technical College");
		$dm_schools[] = array("2277","DATAMARK - Quinnipiac University - Online");
		$dm_schools[] = array("2282","DATAMARK - Lewis University - Online");
		$dm_schools[] = array("2408","DATAMARK - TEACHSCAPE - Cardinal Stritch University");
		$dm_schools[] = array("2460","CCI - DATAMARK BILLING");
		$dm_schools[] = array("2513","LTD - CCI - DATAMARK - Everest College Phoenix (Online)");
		$dm_schools[] = array("2589","DATAMARK - Alexandria Technical College");
		$dm_schools[] = array("2647","LTD - CCI - DATAMARK - Everest College - API");
		$dm_schools[] = array("2648","LTD - CCI - DATAMARK - Everest Institute - API");
		$dm_schools[] = array("2711","LTD - CCI - DATAMARK - Everest Institute - Call Center");
		$dm_schools[] = array("2713","LTD - CCI - DATAMARK - Everest University Online - Call Center");
		$dm_schools[] = array("2818","DATAMARK - NorthEastern University");
		$dm_schools[] = array("2841","LTD - DATAMARK - Jones International University (JIU) - Call Center");

		foreach ($dm_schools as $school_info) {
			array_push($this->variables["bad_schools"], $school_info);
		}
		return $dm_schools;
	}

	public function build_bad_non_dm_schools() {
		$non_dm_schools[] = array("1312","Georgia Career Institute");
		$non_dm_schools[] = array("863","Allied College");
		$non_dm_schools[] = array("2630","Allied College");
		$non_dm_schools[] = array("862","Anthem College");
		$non_dm_schools[] = array("2622","Anthem College");
		$non_dm_schools[] = array("295","Anthem Institute");
		$non_dm_schools[] = array("2623","Anthem Institute");
		$non_dm_schools[] = array("807","High-Tech Institute");
		$non_dm_schools[] = array("2624","High-Tech Institute");
		$non_dm_schools[] = array("1070","The Bryman School");
		$non_dm_schools[] = array("2631","The Bryman School");
		$non_dm_schools[] = array("2924","Herzing Online");
		$non_dm_schools[] = array("861","The National Personal Training Institute");
		$non_dm_schools[] = array("2300","The National Personal Training Institute - Orlando");
		$non_dm_schools[] = array("1340","New York Chiropractic College (NYCC)");
		$non_dm_schools[] = array("1341","New York Chiropractic College - Acupuncture & Oriental Medicine");
		$non_dm_schools[] = array("942","National Personal Training Institute (NPTI)");
		$non_dm_schools[] = array("2916","National Personal Training Institute (NPTI) - Palm Springs");
		$non_dm_schools[] = array("10047","PLATTFORM - Herzing College Online");
		$non_dm_schools[] = array("10048","PLATTFORM - Herzing College Online - Region 2");
		$non_dm_schools[] = array("10049","PLATTFORM - Herzing College Online - Region 3");
		$non_dm_schools[] = array("886","Heritage College");
		$non_dm_schools[] = array("2510","Heritage Online");
		$non_dm_schools[] = array("342","United Education Institute College (UEI) - Elite");
		$non_dm_schools[] = array("2409","EDMC");
		$non_dm_schools[] = array("4912","EducationDynamics - Independence University Online");
		$non_dm_schools[] = array("1336","Charter College");
		$non_dm_schools[] = array("2253","Santa Barbara Business College (SBBC) Online");
		$non_dm_schools[] = array("391","Everest College Fife");
		$non_dm_schools[] = array("1271","PLATTFORM - North-West College");
		$non_dm_schools[] = array("2432","Central Texas Commercial College");
		$non_dm_schools[] = array("1975","Hands on Therapy");
		$non_dm_schools[] = array("2315","California Coast University (CCU)");
		$non_dm_schools[] = array("1244","Massage Center");
		$non_dm_schools[] = array("1772","Florida Technical University Online");
		$non_dm_schools[] = array("2210","Florida Technical University Online");
		$non_dm_schools[] = array("1087","CuNet - Lincoln Ed - Baran Institute of Technology");
		$non_dm_schools[] = array("1163","CuNet - Lincoln Ed. - Euphoria Institute");
		$non_dm_schools[] = array("1058","CuNet - Lincoln Ed. - Florida Culinary Institute");
		$non_dm_schools[] = array("2137","CuNet - Lincoln Ed. - Lincoln College - ONLINE");
		$non_dm_schools[] = array("2435","CUNet - Lincoln Ed. - Lincoln College of New England - Formally Briarwood College");
		$non_dm_schools[] = array("873","CuNet - Lincoln Ed. - Lincoln College of Technology");
		$non_dm_schools[] = array("2724","CuNet - Lincoln Ed. - Lincoln Culinary Institute");
		$non_dm_schools[] = array("527","CuNet - Lincoln Ed. - Lincoln Technical Institute");
		$non_dm_schools[] = array("540","CuNet - Lincoln Ed. - Nashville Auto-Diesel College (NADC)");
		$non_dm_schools[] = array("534","CuNet - Lincoln Ed. - Southwestern College");
		$non_dm_schools[] = array("2866","CUNet - Lincoln Ed. -Lincoln College of New England");
		$non_dm_schools[] = array("2613","CUNet - Lincoln Ed. -Lincoln College of New England - Formally Clemens College");
		$non_dm_schools[] = array("1932","AIU Homestudy");
		$non_dm_schools[] = array("2743","PLATTFORM - Colorado Christian University – Online");
		$non_dm_schools[] = array("939","Pinnacle Career Institute");
		$non_dm_schools[] = array("2732","Pinnacle Career Institute");
		$non_dm_schools[] = array("3051","Keiser University eCampus - Tier 2");
		$non_dm_schools[] = array("2563","Florida National College");
		$non_dm_schools[] = array("774","Porter and Chester Institute");
		$non_dm_schools[] = array("727","Institute of Technology");
		$non_dm_schools[] = array("1606","Art Institute");
		$non_dm_schools[] = array("859","National Holistic Institute");
		$non_dm_schools[] = array("833","Pennsylvania Institute of Technology");
		$non_dm_schools[] = array("3430","Capella University");
		$non_dm_schools[] = array("3439","Capella University");
		$non_dm_schools[] = array("441","PLATTFORM - IntelliTec Colleges");
		$non_dm_schools[] = array("2588","Ashworth College - Certificate Programs");

		// Dynamic loading of school cap entries from
		// `QLI`.`school_cap` table.
		// Installed 01/21/2011 - JM
/*
		global $mysql;
		$cols[]	     = "school_id";
		$cols[]	     = "school_name";
		$tables[]    = "`QLI`.`school_caps`";
		$where[0][0] = "status";
		$where[0][1] = "B";
		$where[]     = "DATE(expiration_date) > CURDATE()";
		$list	     = $mysql->select($cols, $tables, $where);
		foreach ($list as $block_school)
		{
			$block_school[1] = str_replace("\n", "", $block_school[1]);
			$non_dm_schools[] = array($block_school[0],$block_school[1]);
		}
*/
		/*foreach ($non_dm_schools as $school_info) {
			array_push($this->variables["bad_schools"], $school_info);
		}*/
		return $non_dm_schools;
	}

    private function build_campaign_codes() {
		$this->variables["campaign"]["hc"]		= 'HC';
		$this->variables["campaign"]["pnc"]		= 'PNC';
		$this->variables["campaign"]["crm"]		= 'CJ';
		$this->variables["campaign"]["mas"]		= 'MAS';
		$this->variables["campaign"]["cul"]		= 'CUL';
		$this->variables["campaign"]["cul2"]	= 'CUL2';
		$this->variables["campaign"]["nur"] 	= 'NUR';
		$this->variables["campaign"]["it"]		= 'IT';
		$this->variables["campaign"]["fas"]		= 'FAS';
		$this->variables["campaign"]["art"]		= 'ART';
		$this->variables["campaign"]["eddy"]	= 'EDDY';
		$this->variables["campaign"]["mt"]		= 'MT';
		$this->variables["campaign"]["rev"]		= 'REV';
		$this->variables["campaign"]["re"]		= 'RE';
		$this->variables["campaign"]["mort"]		= 'MORT';

		$this->variables["site_name"]["HC"]		= 'hc';
		$this->variables["site_name"]["PNC"]	= 'pnc';
		$this->variables["site_name"]["CJ"]		= 'crm';
		$this->variables["site_name"]["CJ2"]	= 'crm';
		$this->variables["site_name"]["CRM"]	= 'crm';
		$this->variables["site_name"]["MAS"]	= 'mas';
		$this->variables["site_name"]["MAS2"]	= 'mas';
		$this->variables["site_name"]["TMAS"]	= 'mas';
		$this->variables["site_name"]["CUL"]	= 'cul';
		$this->variables["site_name"]["CUL2"]	= 'cul2';
		$this->variables["site_name"]["CUL3"]	= 'cul3';
		$this->variables["site_name"]["TCUL"]	= 'cul';
		$this->variables["site_name"]["TART"]	= 'art';
		$this->variables["site_name"]["TBUS"]	= 'bus';
		$this->variables["site_name"]["NUR"]	= 'nur';
		$this->variables["site_name"]["IT"]		= 'it';
		$this->variables["site_name"]["FAS"]	= 'fas';
		$this->variables["site_name"]["ART"]	= 'art';
		$this->variables["site_name"]["NURS"]	= 'nur';
		$this->variables["site_name"]["NURS2"]	= 'nur';
		$this->variables["site_name"]["EDDY"]	= 'eddy';
		$this->variables["site_name"]["MT"]	= 'mt';
		$this->variables["site_name"]["REV"]	= 'rev';
		$this->variables["site_name"]["RE"]	= 're';
		$this->variables["site_name"]["MORT"]	= 'mort';
	}

	private function build_cb_campaign_codes() {
		$this->variables["cb_campaign_code"]["pnc"]["direct_submission"]	= "11647844";
		$this->variables["cb_campaign_code"]["crm"]["direct_submission"]	= "12374124";
		$this->variables["cb_campaign_code"]["cul"]["direct_submission"]	= "12224472";
		$this->variables["cb_campaign_code"]["cul2"]["direct_submission"]	= "12224472";
		$this->variables["cb_campaign_code"]["mas"]["direct_submission"]	= "12224471";
		$this->variables["cb_campaign_code"]["nur"]["direct_submission"]	= "12376295";
		$this->variables["cb_campaign_code"]["it"]["direct_submission"]		= "12288267";
		$this->variables["cb_campaign_code"]["fas"]["direct_submission"]	= "12288266";
		$this->variables["cb_campaign_code"]["art"]["direct_submission"]	= "12288266";
		$this->variables["cb_campaign_code"]["tmas"]["direct_submission"]	= "12288264";
		$this->variables["cb_campaign_code"]["tcul"]["direct_submission"]	= "12288265";
		$this->variables["cb_campaign_code"]["tart"]["direct_submission"]	= "12288266";
		$this->variables["cb_campaign_code"]["tbus"]["direct_submission"]	= "12288267";
		$this->variables["cb_campaign_code"]["nurs"]["direct_submission"]	= "12376295";
		$this->variables["cb_campaign_code"]["mt"]["direct_submission"]		= "12376295";

		$this->variables["cb_campaign_code"]["pnc"]["call_center"]			= "11707584";
		$this->variables["cb_campaign_code"]["crm"]["call_center"]			= "12374126";
		$this->variables["cb_campaign_code"]["cul"]["call_center"]			= "11707584";
		$this->variables["cb_campaign_code"]["cul2"]["call_center"]			= "11707584";
		$this->variables["cb_campaign_code"]["mas"]["call_center"]			= "11647844";
		$this->variables["cb_campaign_code"]["nur"]["call_center"]			= "12376296";
		$this->variables["cb_campaign_code"]["it"]["call_center"]			= "12288262";
		$this->variables["cb_campaign_code"]["fas"]["call_center"]			= "12288261";
		$this->variables["cb_campaign_code"]["art"]["call_center"]			= "12288261";
		$this->variables["cb_campaign_code"]["tmas"]["call_center"]			= "12288263";
		$this->variables["cb_campaign_code"]["tcul"]["call_center"]			= "12288260";
		$this->variables["cb_campaign_code"]["tart"]["call_center"]			= "12288261";
		$this->variables["cb_campaign_code"]["tbus"]["call_center"]			= "12288262";
		$this->variables["cb_campaign_code"]["nurs"]["call_center"]			= "12376296";
		$this->variables["cb_campaign_code"]["mt"]["call_center"]			= "12376295";
	}

	private function build_cb_career_codes() {
		$this->variables["cb_career_code"]["crm"]	= "279";
		$this->variables["cb_career_code"]["mas"]	= "256";//"37";
		$this->variables["cb_career_code"]["cul"]	= "3";
		$this->variables["cb_career_code"]["cul2"]	= "3";
		$this->variables["cb_career_code"]["bus"]	= "2";
		$this->variables["cb_career_code"]["nur"]	= "4";
		$this->variables["cb_career_code"]["it"]	= "5";
		$this->variables["cb_career_code"]["fas"]	= "1";
		$this->variables["cb_career_code"]["art"]	= "1";
		$this->variables["cb_career_code"]["mt"]	= "4";
	}

	private function build_cb_degree_codes() {
		$this->variables["cb_degree_code"]["crm"]	= "391,269,142,151,26,341,390,190,204,192";
		$this->variables["cb_degree_code"]["cul"]	= "76,300,79,78,77,243";
		$this->variables["cb_degree_code"]["cul2"]	= "76,300,79,78,77,243";
		$this->variables["cb_degree_code"]["mas"]	= "37,257,291,292,276,308,260,268,340,412,266,258,262,72";
		$this->variables["cb_degree_code"]["nur"]	= "267,41,225,45,46,238,332,51,49,50,48,136,178,52,56,57,58,60,44,62,227,53,207,63,64,171,65,326,239,67,68,69,205,70,236,71,328,170,73,206,74";
		$this->variables["cb_degree_code"]["it"]	= "83,81,84,274,38,87,185,90,214,186,92,93,85,94,105,330,95,96,97,98,99,100,102,103,104,106,179,285,220,111,112,117,118,119,335,121,122,218,184,125,127,129,101,219,130,180,131,89";
		$this->variables["cb_degree_code"]["fas"]	= "18,19,176";
		$this->variables["cb_degree_code"]["art"]	= "289,13,187,199,14,27,16,";
		$this->variables["cb_degree_code"]["mt"]	= "64";
	}

	private function build_cb_directory_codes() {
		$this->variables["cb_directory_code"]["pnc"]	= "";
		$this->variables["cb_directory_code"]["crm"]	= "QualityLeadsCJ";
		$this->variables["cb_directory_code"]["cul"]	= "QualityLeads2";
		$this->variables["cb_directory_code"]["cul2"]	= "QualityLeads2";
		$this->variables["cb_directory_code"]["mas"]	= "QualityLeads";
		$this->variables["cb_directory_code"]["nur"]	= "QualityLeads";
		$this->variables["cb_directory_code"]["it"]		= "QualityLeads";
		$this->variables["cb_directory_code"]["fas"]	= "QualityLeads";
		$this->variables["cb_directory_code"]["art"]	= "QualityLeads";
		$this->variables["cb_directory_code"]["mt"]		= "QualityLeads";
	}

	private function build_cb_program_keys() {
		$this->variables["cb_program_key"]["crm"]	= "Criminal Justice";
		$this->variables["cb_program_key"]["cul"]	= "Culinary Arts";
		$this->variables["cb_program_key"]["cul2"]	= "Culinary Arts";
		$this->variables["cb_program_key"]["mas"]	= "Massage Therapy";
		$this->variables["cb_program_key"]["nur"]	= "Nursing - Health Care";
		$this->variables["cb_program_key"]["it"]	= "Business - IT";
		$this->variables["cb_program_key"]["fas"]	= "Fashion";
		$this->variables["cb_program_key"]["art"]	= "Art - Design";
		$this->variables["cb_program_key"]["mt"]	= "Medical Transcription";
		$this->variables["cb_program_key"]["rev"]	= "Revenue Share";
		$this->variables["cb_program_key"]["re"]	= "Real Estate";
		$this->variables["cb_program_key"]["mort"]	= "Mortgage";
	}

	private function build_datamark_codes() {
		// $this->variables["dm"]["submit"]				= "http://ulm.datamark.com/services/lead_submission";
		$this->variables["dm"]["submit"]				= "https://cci.sparkroom.com:8601/Sparkroom/submitLead/CCi/lp";
		$this->variables["dm"]["query"]					= "http://ulm.datamark.com/public/vendors/findstatus";
		$this->variables["dm"]["adkey"]					= "IND02928";
		$this->variables["dm"]["campaign_code"]			= "USG";
		$this->variables["dm"]["client_code"]			= "COR0001";
		$this->variables["dm"]["source_code"]			= "CCI0112";
		$this->variables["dm"]["payout"]				= "25";
		$this->variables["dm"]["usg"]["cap"]			= 0;
		$this->variables["dm"]["evuol"]["cap"]			= 1;
		$this->variables["dm"]["tiffin"]["cap"]			= 100;
		$this->variables["dm"]["usg"]["campus_limits"]	= array("692", "341", "343", "349", "375", "345", "347", "116", "390", "394", "395", "397", "647", "548", "155", "173", "186", "243", "246");
		$this->variables["dm"]["usg"]["limit_state"]	= false;
		$this->variables["online"]["adkey"]				= "IND02929";
		$this->variables["online"]["campaign_code"]		= "EVUOL";
		$this->variables["tiffin"]["source_code"]		= "QUALIT";
		$this->variables["tiffin"]["client_code"]		= "TIF0001";
		$this->variables["tiffin"]["campaign_code"]		= "TIFFIN";
	}

	private function build_lead_status_text() {
		$this->variables["lead_status"]["no_session"]["text"] = "No Session ID";
		$this->variables["lead_status"]["no_key"]["text"] = "No Session Index Key";
		$this->variables["lead_status"]["is_dup"]["text"] = "Record Already Exists";
		$this->variables["lead_status"]["is_dup"]["ls_code"] = "D";
		$this->variables["lead_status"]["is_bad_affid"]["text"] = "Isolated Lead";
		$this->variables["lead_status"]["is_bad_affid"]["ls_code"] = "I";
		$this->variables["lead_status"]["is_bad_year"]["text"] = "Graduation Year Not Applicable";
		$this->variables["lead_status"]["is_bad_year"]["ls_code"] = "G";
		$this->variables["lead_status"]["is_scrub"]["text"] = "Scrubbed Lead";
		$this->variables["lead_status"]["is_scrub"]["ls_code"] = "V";
	}

	private function build_legacy_career_codes() {

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

		$dm_career_codes["crm"]		= "CJ:CIN:PL:HMLS:LAA:LS";
		$dm_career_codes["cul"]		= "HR";
		$dm_career_codes["cul2"]	= "HR";
		$dm_career_codes["mas"]		= "MSGT:MSGTA:SPA";
		$dm_career_codes["nur"]		= "MAA:MA:MDBL:RP:PTECH:SRGT:MSGT:MSGTA:SPA";
		$dm_career_codes["it"]		= "EL:CT:CI:MPMBA:AC:BKP:BU";
		$dm_career_codes["fas"]		= "";
		$dm_career_codes["art"]		= "VF";
		$dm_career_codes["mt"]		= "MAA";

		$this->variables["legacy"]["cu"]["career_codes"] = $cu_career_codes;
		$this->variables["legacy"]["dm"]["career_codes"] = $dm_career_codes;
	}

	private function build_titles() {
		$this->variables["title"]["ds"]		= "Direct Submit Careers";
		$this->variables["title"]["hc"]		= "Health Care Careers";
		$this->variables["title"]["pnc"]	= "Project New Careers";
		$this->variables["title"]["crm"]	= "Criminal Justice Schools";
		$this->variables["title"]["mas"]	= "Massage Schools";
		$this->variables["title"]["cul"]	= "Culinary Art Schools";
		$this->variables["title"]["cul2"]	= "Culinary Art Schools";
		$this->variables["title"]["nur"]	= "Nursing - Health Care Schools";
		$this->variables["title"]["it"]		= "Business / IT Schools";
		$this->variables["title"]["fas"]	= "Fashion Schools";
		$this->variables["title"]["art"]	= "Art and Design Schools";
		$this->variables["title"]["mt"]		= "Medical Transcription Schools";
		$this->variables["title"]["rev"]	= "Revenue Share";

		$this->variables["page_info"]["title"]["ds"]		= "Direct Submit";
		$this->variables["page_info"]["title"]["hc"]		= "Health Care";
		$this->variables["page_info"]["title"]["pnc"]		= "Project New Careers";
		$this->variables["page_info"]["title"]["crm"]		= "Criminal Justice";
		$this->variables["page_info"]["title"]["mas"]		= "Massage";
		$this->variables["page_info"]["title"]["cul"]		= "Culinary Art";
		$this->variables["page_info"]["title"]["cul2"]		= "Culinary Art 2";
		$this->variables["page_info"]["title"]["nur"]		= "Nursing - Health Care";
		$this->variables["page_info"]["title"]["it"]		= "Business / IT";
		$this->variables["page_info"]["title"]["fas"]		= "Fashion";
		$this->variables["page_info"]["title"]["art"]		= "Art and Design";
		$this->variables["page_info"]["title"]["mt"]		= "Medical Transcription";

		$this->variables["page_info"]["req_type"]["idx"]	= "Index";
		$this->variables["page_info"]["req_type"]["eml"]	= "Email Re-Submit";
		$this->variables["page_info"]["req_type"]["smt"]	= "Form Submit";
		$this->variables["page_info"]["req_type"]["auto"]	= "Form Auto-Submit";
		$this->variables["page_info"]["req_type"]["thk"]	= "Thank You";
	}

	private function build_tdmk_codes() {
		$this->variables["tdmk"]["url"] = "http://www.education-for-careers.com/SearchSchools/SubmissionManager_Direct.aspx";
		$this->variables["tdmk"]["affiliate_id"] = "CD196";
		$this->variables["tdmk"]["campaign_id"] = "28";
	}

	private function build_leadverifier_codes() {
		// LEADVERIFIER TEST URL
//		$this->variables["verifier"]["url"] = "http://12.40.108.25/LeadVerifierWebService/lead.asmx/PostLead?XMLString=";
		$this->variables["verifier"]["url"] = "https://ws.leadverifier.com/leadverifierwebservice/lead.asmx/PostLead?XMLString=";
		$this->variables["verifier"]["id"] = "Quality";
	}

	public function get($variable) {
		if (isset($this->variables[$variable])) {
			return $this->variables[$variable];
		}
	}

}
