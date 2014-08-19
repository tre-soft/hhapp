<?php
function order(){
    $TemplateVars = array();
<<<<<<< .mine
    require_once('trellian/paybox_payment.php');
    require_once('trellian/db.php');
    require_once('/var/www/common/lib/php/trellian/country_phone_codes.php');
    require_once('/var/www/common/lib/php/trellian/countries.php');
    
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    $rego_dbh = trellian_db_connect('rego', 'rego_website');
    
    if(isset($_REQUEST['product_id'])){
	$_SESSION['product_id']=$_REQUEST['product_id'];
    }
    if(isset($_REQUEST['hashrate'])){
	$_SESSION['hashrate']=$_REQUEST['hashrate'];
    }
    
    if(isset($_REQUEST['bgt'])){
	$_SESSION['bgt']=$_REQUEST['bgt'];
    }
    
    if(isset($_REQUEST['hardware_unit']))
	$_SESSION['hardware_unit']=$_REQUEST['hardware_unit'];
=======
    require_once('trellian/paybox_payment.php');
    require_once('trellian/db.php');
   # require_once('/var/www/common/lib/php/trellian/country_phone_codes.php');
   # require_once('/var/www/common/lib/php/trellian/countries.php');

    $country_phone_codes = array(
	'AF' => "93",
	'AL' => "355",
	'DZ' => "213",
	'AS' => "684",
	'AD' => "376",
	'AO' => "244",
	'AI' => "809",
	'AQ' => "672",
	'AG' => "809",
	'AR' => "54",
	'AM' => "374",
	'AW' => "297",
	'AU' => "61",
	'AT' => "43",
	'AZ' => "994",
	'BS' => "809",
	'BH' => "973",
	'BD' => "880",
	'BB' => "809",
	'BY' => "375",
	'BE' => "32",
	'BZ' => "501",
	'BJ' => "229",
	'BM' => "809",
	'BT' => "975",
	'BO' => "591",
	'BW' => "267",
	'BV' => "0",
	'BR' => "55",
	'IO' => "245",
	'BG' => "359",
	'BF' => "226",
	'BI' => "257",
	'KH' => "855",
	'CM' => "237",
	'CA' => "1",
	'CV' => "809",
	'KY' => "1",
	'CF' => "236",
	'TD' => "235",
	'CL' => "56",
	'CN' => "86",
	'CX' => "672",
	'CO' => "57",
	'KM' => "269",
	'CG' => "242",
	'CD' => "242",
	'CK' => "682",
	'CR' => "506",
	'CI' => "225",
	'HR' => "385",
	'CU' => "53",
	'CY' => "357",
	'CZ' => "420",
	'DK' => "45",
	'DJ' => "253",
	'DM' => "809",
	'DO' => "809",
	'EC' => "592",
	'EG' => "20",
	'SV' => "503",
	'GQ' => "240",
	'ER' => "291",
	'EE' => "372",
	'ET' => "251",
	'FK' => "500",
	'FO' => "298",
	'FJ' => "679",
	'FI' => "358",
	'FR' => "33",
	'GF' => "594",
	'PF' => "689",
	'TF' => "0",
	'GA' => "241",
	'GM' => "220",
	'GE' => "995",
	'DE' => "49",
	'GH' => "233",
	'GI' => "350",
	'GR' => "30",
	'GL' => "299",
	'GD' => "809",
	'GP' => "590",
	'GU' => "671",
	'GT' => "502",
	'GN' => "224",
	'GW' => "245",
	'GY' => "592",
	'HT' => "509",
	'HN' => "504",
	'HK' => "852",
	'HU' => "36",
	'IS' => "354",
	'IN' => "91",
	'ID' => "62",
	'IR' => "98",
	'IQ' => "964",
	'IE' => "353",
	'IL' => "972",
	'IT' => "39",
	'JM' => "876",
	'JP' => "81",
	'JO' => "962",
	'KZ' => "7",
	'KE' => "254",
	'KI' => "686",
	'KP' => "850",
	'KR' => "82",
	'KO' => "381",
	'KW' => "965",
	'KG' => "7",
	'LA' => "856",
	'LV' => "371",
	'LB' => "961",
	'LS' => "266",
	'LR' => "231",
	'LY' => "218",
	'LI' => "417",
	'LT' => "370",
	'LU' => "352",
	'MO' => "853",
	'MK' => "389",
	'MG' => "261",
	'MW' => "265",
	'MY' => "60",
	'MV' => "960",
	'ML' => "223",
	'MT' => "356",
	'MH' => "692",
	'MQ' => "596",
	'MR' => "222",
	'MU' => "230",
	'YT' => "269",
	'MX' => "52",
	'FM' => "691",
	'MD' => "373",
	'MC' => "339",
	'MN' => "976",
	'MS' => "809",
	'MA' => "212",
	'MZ' => "258",
	'MM' => "95",
	'NA' => "264",
	'NR' => "674",
	'NP' => "977",
	'NL' => "31",
	'AN' => "599",
	'NC' => "687",
	'NZ' => "64",
	'NI' => "505",
	'NE' => "227",
	'NG' => "234",
	'NU' => "683",
	'NF' => "6723",
	'MP' => "1",
	'NO' => "47",
	'OM' => "968",
	'PK' => "92",
	'PW' => "680",
	'PS' => "0",
	'PA' => "507",
	'PG' => "675",
	'PY' => "595",
	'PE' => "51",
	'PH' => "63",
	'PN' => "872",
	'PL' => "48",
	'PT' => "351",
	'PR' => "787",
	'QA' => "974",
	'RE' => "262",
	'RO' => "40",
	'RU' => "7",
	'RW' => "250",
	'SH' => "290",
	'KN' => "809",
	'LC' => "1",
	'PM' => "508",
	'VC' => "809",
	'WS' => "685",
	'SM' => "395",
	'ST' => "239",
	'SA' => "966",
	'SN' => "221",
	'CS' => "0",
	'SC' => "248",
	'SL' => "232",
	'SG' => "65",
	'SK' => "421",
	'SI' => "386",
	'SB' => "677",
	'SO' => "252",
	'ZA' => "27",
	'GS' => "995",
	'ES' => "34",
	'LK' => "94",
	'SD' => "0",
	'SR' => "597",
	'SJ' => "79",
	'SZ' => "268",
	'SE' => "46",
	'CH' => "41",
	'SY' => "963",
	'TW' => "886",
	'TJ' => "7",
	'TZ' => "255",
	'TH' => "66",
	'TL' => "0",
	'TG' => "228",
	'TK' => "690",
	'TO' => "676",
	'TT' => "868",
	'TN' => "216",
	'TR' => "90",
	'TM' => "7",
	'TC' => "809",
	'TV' => "688",
	'UG' => "256",
	'UA' => "380",
	'AE' => "971",
	'GB' => "44",
	'US' => "1",
	'UM' => "808",
	'UY' => "598",
	'UZ' => "7",
	'VU' => "678",
	'VE' => "58",
	'VN' => "84",
	'VG' => "1",
	'VI' => "1",
	'WF' => "681",
	'EH' => "212",
	'YE' => "967",
	'ZM' => "260",
	'ZW' => "263",
);
    
    $assign_country_array = array(
	'AF' => "AFGHANISTAN",
	'AX' => "ALAND ISLANDS",
	'AL' => "ALBANIA",
	'DZ' => "ALGERIA",
	'AS' => "AMERICAN SAMOA",
	'AD' => "ANDORRA",
	'AO' => "ANGOLA",
	'AI' => "ANGUILLA",
	'AQ' => "ANTARCTICA",
	'AG' => "ANTIGUA AND BARBUDA",
	'AR' => "ARGENTINA",
	'AM' => "ARMENIA",
	'AW' => "ARUBA",
	'AU' => "AUSTRALIA",
	'AT' => "AUSTRIA",
	'AZ' => "AZERBAIJAN",
	'BS' => "BAHAMAS",
	'BH' => "BAHRAIN",
	'BD' => "BANGLADESH",
	'BB' => "BARBADOS",
	'BY' => "BELARUS",
	'BE' => "BELGIUM",
	'BZ' => "BELIZE",
	'BJ' => "BENIN",
	'BM' => "BERMUDA",
	'BT' => "BHUTAN",
	'BO' => "BOLIVIA",
	'BA' => "BOSNIA AND HERZEGOVINA",
	'BW' => "BOTSWANA",
	'BV' => "BOUVET ISLAND",
	'BR' => "BRAZIL",
	'IO' => "BRITISH INDIAN OCEAN TERRITORY",
	'BN' => "BRUNEI DARUSSALAM",
	'BG' => "BULGARIA",
	'BF' => "BURKINA FASO",
	'BI' => "BURUNDI",
	'KH' => "CAMBODIA",
	'CM' => "CAMEROON",
	'CA' => "CANADA",
	'CV' => "CAPE VERDE",
	'KY' => "CAYMAN ISLANDS",
	'CF' => "CENTRAL AFRICAN REPUBLIC",
	'TD' => "CHAD",
	'CL' => "CHILE",
	'CN' => "CHINA",
	'CX' => "CHRISTMAS ISLAND",
	'CC' => "COCOS (KEELING) ISLANDS",
	'CO' => "COLOMBIA",
	'KM' => "COMOROS",
	'CG' => "CONGO",
	'CD' => "CONGO, THE DEMOCRATIC REPUBLIC OF THE",
	'CK' => "COOK ISLANDS",
	'CR' => "COSTA RICA",
	'CI' => "COTE D'IVOIRE",
	'HR' => "CROATIA",
	'CU' => "CUBA",
	'CY' => "CYPRUS",
	'CZ' => "CZECH REPUBLIC",
	'DK' => "DENMARK",
	'DJ' => "DJIBOUTI",
	'DM' => "DOMINICA",
	'DO' => "DOMINICAN REPUBLIC",
	'EC' => "ECUADOR",
	'EG' => "EGYPT",
	'SV' => "EL SALVADOR",
	'GQ' => "EQUATORIAL GUINEA",
	'ER' => "ERITREA",
	'EE' => "ESTONIA",
	'ET' => "ETHIOPIA",
	'FK' => "FALKLAND ISLANDS (MALVINAS)",
	'FO' => "FAROE ISLANDS",
	'FJ' => "FIJI",
	'FI' => "FINLAND",
	'FR' => "FRANCE",
	'GF' => "FRENCH GUIANA",
	'PF' => "FRENCH POLYNESIA",
	'TF' => "FRENCH SOUTHERN TERRITORIES",
	'GA' => "GABON",
	'GM' => "GAMBIA",
	'GE' => "GEORGIA",
	'DE' => "GERMANY",
	'GH' => "GHANA",
	'GI' => "GIBRALTAR",
	'GR' => "GREECE",
	'GL' => "GREENLAND",
	'GD' => "GRENADA",
	'GP' => "GUADELOUPE",
	'GU' => "GUAM",
	'GT' => "GUATEMALA",
	'GN' => "GUINEA",
	'GW' => "GUINEA-BISSAU",
	'GY' => "GUYANA",
	'HT' => "HAITI",
	'HM' => "HEARD ISLAND AND MCDONALD ISLANDS",
	'VA' => "HOLY SEE (VATICAN CITY STATE)",
	'HN' => "HONDURAS",
	'HK' => "HONG KONG",
	'HU' => "HUNGARY",
	'IS' => "ICELAND",
	'IN' => "INDIA",
	'ID' => "INDONESIA",
	'IR' => "IRAN, ISLAMIC REPUBLIC OF",
	'IQ' => "IRAQ",
	'IE' => "IRELAND",
	'IL' => "ISRAEL",
	'IT' => "ITALY",
	'JM' => "JAMAICA",
	'JP' => "JAPAN",
	'JO' => "JORDAN",
	'KZ' => "KAZAKHSTAN",
	'KE' => "KENYA",
	'KI' => "KIRIBATI",
	'KP' => "KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF",
	'KR' => "KOREA, REPUBLIC OF",
	'KO' => "KOSOVO",
	'KW' => "KUWAIT",
	'KG' => "KYRGYZSTAN",
	'LA' => "LAO PEOPLE'S DEMOCRATIC REPUBLIC",
	'LV' => "LATVIA",
	'LB' => "LEBANON",
	'LS' => "LESOTHO",
	'LR' => "LIBERIA",
	'LY' => "LIBYAN ARAB JAMAHIRIYA",
	'LI' => "LIECHTENSTEIN",
	'LT' => "LITHUANIA",
	'LU' => "LUXEMBOURG",
	'MO' => "MACAO",
	'MK' => "MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF",
	'MG' => "MADAGASCAR",
	'MW' => "MALAWI",
	'MY' => "MALAYSIA",
	'MV' => "MALDIVES",
	'ML' => "MALI",
	'MT' => "MALTA",
	'MH' => "MARSHALL ISLANDS",
	'MQ' => "MARTINIQUE",
	'MR' => "MAURITANIA",
	'MU' => "MAURITIUS",
	'YT' => "MAYOTTE",
	'MX' => "MEXICO",
	'FM' => "MICRONESIA, FEDERATED STATES OF",
	'MD' => "MOLDOVA, REPUBLIC OF",
	'MC' => "MONACO",
	'MN' => "MONGOLIA",
	'MS' => "MONTSERRAT",
	'MA' => "MOROCCO",
	'MZ' => "MOZAMBIQUE",
	'MM' => "MYANMAR",
	'NA' => "NAMIBIA",
	'NR' => "NAURU",
	'NP' => "NEPAL",
	'NL' => "NETHERLANDS",
	'AN' => "NETHERLANDS ANTILLES",
	'NC' => "NEW CALEDONIA",
	'NZ' => "NEW ZEALAND",
	'NI' => "NICARAGUA",
	'NE' => "NIGER",
	'NG' => "NIGERIA",
	'NU' => "NIUE",
	'NF' => "NORFOLK ISLAND",
	'MP' => "NORTHERN MARIANA ISLANDS",
	'NO' => "NORWAY",
	'OM' => "OMAN",
	'PK' => "PAKISTAN",
	'PW' => "PALAU",
	'PS' => "PALESTINIAN TERRITORY, OCCUPIED",
	'PA' => "PANAMA",
	'PG' => "PAPUA NEW GUINEA",
	'PY' => "PARAGUAY",
	'PE' => "PERU",
	'PH' => "PHILIPPINES",
	'PN' => "PITCAIRN",
	'PL' => "POLAND",
	'PT' => "PORTUGAL",
	'PR' => "PUERTO RICO",
	'QA' => "QATAR",
	'RE' => "REUNION",
	'RO' => "ROMANIA",
	'RU' => "RUSSIAN FEDERATION",
	'RW' => "RWANDA",
	'SH' => "SAINT HELENA",
	'KN' => "SAINT KITTS AND NEVIS",
	'LC' => "SAINT LUCIA",
	'PM' => "SAINT PIERRE AND MIQUELON",
	'VC' => "SAINT VINCENT AND THE GRENADINES",
	'WS' => "SAMOA",
	'SM' => "SAN MARINO",
	'ST' => "SAO TOME AND PRINCIPE",
	'SA' => "SAUDI ARABIA",
	'SN' => "SENEGAL",
	'CS' => "SERBIA AND MONTENEGRO",
	'SC' => "SEYCHELLES",
	'SL' => "SIERRA LEONE",
	'SG' => "SINGAPORE",
	'SK' => "SLOVAKIA",
	'SI' => "SLOVENIA",
	'SB' => "SOLOMON ISLANDS",
	'SO' => "SOMALIA",
	'ZA' => "SOUTH AFRICA",
	'GS' => "SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS",
	'ES' => "SPAIN",
	'LK' => "SRI LANKA",
	'SD' => "SUDAN",
	'SR' => "SURINAME",
	'SJ' => "SVALBARD AND JAN MAYEN",
	'SZ' => "SWAZILAND",
	'SE' => "SWEDEN",
	'CH' => "SWITZERLAND",
	'SY' => "SYRIAN ARAB REPUBLIC",
	'TW' => "TAIWAN, PROVINCE OF CHINA",
	'TJ' => "TAJIKISTAN",
	'TZ' => "TANZANIA, UNITED REPUBLIC OF",
	'TH' => "THAILAND",
	'TL' => "TIMOR-LESTE",
	'TG' => "TOGO",
	'TK' => "TOKELAU",
	'TO' => "TONGA",
	'TT' => "TRINIDAD AND TOBAGO",
	'TN' => "TUNISIA",
	'TR' => "TURKEY",
	'TM' => "TURKMENISTAN",
	'TC' => "TURKS AND CAICOS ISLANDS",
	'TV' => "TUVALU",
	'UG' => "UGANDA",
	'UA' => "UKRAINE",
	'AE' => "UNITED ARAB EMIRATES",
	'GB' => "UNITED KINGDOM",
	'US' => "UNITED STATES",
	'UM' => "UNITED STATES MINOR OUTLYING ISLANDS",
	'UY' => "URUGUAY",
	'UZ' => "UZBEKISTAN",
	'VU' => "VANUATU",
	'VE' => "VENEZUELA",
	'VN' => "VIET NAM",
	'VG' => "VIRGIN ISLANDS, BRITISH",
	'VI' => "VIRGIN ISLANDS, U.S.",
	'WF' => "WALLIS AND FUTUNA",
	'EH' => "WESTERN SAHARA",
	'YE' => "YEMEN",
	'ZM' => "ZAMBIA",
	'ZW' => "ZIMBABWE",
);

if(!function_exists('ucwords_strtolower')) {
    function ucwords_strtolower(&$str) {
	    $str = ucwords(strtolower($str));
    }
}

array_walk($assign_country_array, 'ucwords_strtolower');
    
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    
    #this page is shows  only when any product is selected , otherwise redirected to home page
    if(!isset($_SERVER['HTTP_REFERER']))
    {
	header('Location: index.html');
	exit;
    }
    
    if(isset($_REQUEST['hashrate'])){
	$_SESSION['hashrate']=$_REQUEST['hashrate'];
    }
    
    if(isset($_REQUEST['bgt'])){
	$_SESSION['bgt']=$_REQUEST['bgt'];
    }
    
    if(isset($_REQUEST['hardware_unit']))
	$_SESSION['hardware_unit']=$_REQUEST['hardware_unit'];
	
    if(isset($_REQUEST['Harware_USD_price']))
	$_SESSION['Harware_USD_price']=$_REQUEST['Harware_USD_price'];

    $TemplateVars["country_phone_codes"]  = $country_phone_codes;
    $TemplateVars["assign_country_array"]  = $assign_country_array;
    $support_link = "<a href='/contact.html'>Please contact support</a>";
    
    # validate Credit Card number before submit using Ajax
    if(isset($_REQUEST['CardNumber'])){
	$result='';
	try {
	    $result=validate_creditcard($_REQUEST,'CardNumber');
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	if($result != trim($_REQUEST['CardNumber']))
	{
	    echo "Invalid";exit;
	}
	else{
	    echo "valid";exit;
	}
    }
    
    # validate Credit Card expiry before submit using Ajax
    if(isset($_REQUEST['expiry'])){
	require_once("trellian/validation.php");
	$cc_month=substr($_REQUEST['expiry'], 0, 2);
	$cc_year=substr($_REQUEST['expiry'], -2);
	$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
	if (($cc_month < 1  || $cc_month > 12)) {
	    echo "Invalid";exit;
	}
	elseif($cc_year < date('y')){
	    echo "Invalid";exit;
	}
	else{
	    echo "valid";exit;
	}
    }
    
    # validate verification code through Ajax request
    if(isset($_REQUEST['code_by_user'])){
	
	# if user is logged in
	if(isset($_SESSION['logged_in'])){
	    $code = pg_escape_string($_REQUEST['code_by_user']);
	    $userid = pg_escape_string($_SESSION['user_id']);	
	    $query = "SELECT verification_code,mobile,verified_date FROM ps_user_verification_code_log WHERE   user_id=".$userid." ORDER BY created_date DESC LIMIT 1";
	    $code_result_set = trellian_db_query($sub_conn,$query);
	    $res = pg_fetch_assoc($code_result_set);
	
	    if($_REQUEST['code_by_user']!=$res['verification_code']){
		unset($_SESSION['ver_code']);
	       echo 'Invalid';exit; 
	       
	    }
	    else{
	        echo "ok";exit;
	    }
	}
       elseif($_SESSION['ver_code']!=$_REQUEST['code_by_user']){	# user not logged in or may be new user
	    echo 'Invalid';exit;    
        }
	else{
	    echo "ok";exit;
	}
    }
    
    # Send verification code on mobile
    # and give appropriate message to user through Ajax request
    if(isset($_REQUEST['mobileNumber'])){
	if(!isset($_SESSION['user_id'])){
	    $sql = "select user_id from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($_REQUEST['username']))."'";
	    $result = trellian_db_query($sub_conn,$sql);
	    if(pg_num_rows($result) != 0) {
		$res = pg_fetch_assoc($result);
		$userid=$res['user_id'];
		$_SESSION['existing_user']=true;
	    }
	}
	else{
	    $userid=$_SESSION['user_id'];
	    if(isset($_SESSION['limit_error']))
		unset($_SESSION['limit_error']);
	}
	
	if(!isset($userid)){
	    $_SESSION['verified_for_new_user']=true;
	}
	$TemplateVars['mobile_no']=$_REQUEST['mobile_no'];
	$TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['countrycodes']); 
	$mobile_number=$_REQUEST['mobileNumber'];
	
	$country_code = $TemplateVars['country_code1'];
	$error_message='';
	if($country_code == ""){
	    $error_message = "Please select country code";
	}
	elseif($country_code=='Select Country'){
	    $error_message = "Please select country code";
	}
	else if(!preg_match('/^[0-9]*$/',$country_code)) {
	    $error_message = "Please enter valid country code";				
	}
	if($mobile_number == ""){
	    $error_message = "Please enter mobile number";
	}
	else if(!preg_match('/^[0-9]*$/',$mobile_number)){			
	    $error_message = "Please enter valid mobile number";			
	}
	if(isset($userid)){
	    if(get_num_log_today($userid,"M")>10)	
	    {
		if(isset($_SESSION['logged_in'])){
		    $error_message = "Call limit reached. $support_link";    
		}
		else{
		    $_SESSION['limit_error']="Call limit reached. $support_link";    
		}
	    }
	}
	
	if($error_message==""){
		include_once("/var/www/common/lib/php/trellian/send_sms.php");
		# logic to generate 6 digit unique string
		do{			
			$pin = generate_pin();									
		}
		while(checkForUniqueCode($pin)==false);
		$_SESSION['ver_code']=$pin;
		if(!isset($userid)){
		    
		    $_SESSION['verified']=1;
		}
		$message = 'Your HostedHash.com verification code is '.$pin;
		$message = urlencode($message);
		$contact_number =$country_code.$mobile_number;
		$res = send_sms($message,$contact_number);
		if($res>100){
		    if(isset($userid) && !isset($_SESSION['limit_error'])){
		        log_pin_code($userid,$pin,$contact_number,"M");
		    }
		    $error_message="SMS Message has been sent and should be received soon";
		}
		else{
			if(isset($onverify_error_messages[$res]))
			    $error_message = $onverify_error_messages[$res];
			else
			    $error_message = "Internal error. Please try again later";
		}
	}
	echo $error_message;
	exit;
    }
      
    if((isset($_REQUEST['submit_details']) && $_REQUEST['submit_details']=='SUBMIT') || (isset($_SESSION['details_to_submit'])  && isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1)){
	# php validation
	$_SESSION['product_id']=$_REQUEST['product_id'];
	if(isset($_SESSION['details_to_submit']))
	    $_REQUEST=$_SESSION['details_to_submit'];
	
	$error_message='';
	# php validation
	if(isset($_REQUEST['firstname']) && $_REQUEST['firstname']==''){
	    $error_message.="Please Enter Your First Name.<br>";
	}
	else
	    $TemplateVars['first_name']=$_REQUEST['firstname'];
	
	if(isset($_REQUEST['lastname']) && $_REQUEST['lastname']==''){
	    $error_message.="Please Enter Your Last Name.<br>";
	}
	else
	    $TemplateVars['last_name']=$_REQUEST['lastname'];
	
	if(isset($_REQUEST['email'])  && $_REQUEST['email']==''){
	    $error_message.="Please Enter Your Email.<br>";
	}
	else
	    $TemplateVars['email']=$_REQUEST['email'];
	
	if(isset($_REQUEST['wallet']) && $_REQUEST['wallet']=='' ){
	    $error_message.="Please enter your Bitcoin Wallet Address.<br>";    
	}
	elseif(!preg_match("#^[13][a-zA-Z0-9]{26,34}$#is",$_REQUEST['wallet'])){
	    $error_message.="Please Enter Valid Bitcoin Wallet Address.<br>";
	}
	else
	    $TemplateVars['bitcoin_wallet']=$_REQUEST['wallet'];
	
	if (!isset($_REQUEST['option_check'])) {
	    $error_message.="Please Select Payment Option.<br>";
	}
	else{
	    $TemplateVars['option_check']=$_REQUEST['option_check'];
	}
	
	if($error_message!=''){
	    $TemplateVars['err_msg']=$error_message;
	    return $TemplateVars;
	}
	
	# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5121666
	# checked for user placing order witout login
	
	if(!isset($_SESSION['logged_in'])){
	    # check whether user is existing or not.
	    
	    $sql = "select count(*) from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($_REQUEST['email']))."'";
	    
	    $result = trellian_db_query($sub_conn,$sql);
	    $res = pg_fetch_assoc($result,0);
    	
	    if ($res['count'] == 1) {					# existing user , take to login page
		$_SESSION['details_to_submit']=$_REQUEST;		# store all user details to submit orders.
		header("Location: login.html");
	       exit;
	    }
	    else{
		create_user_account($_REQUEST);				# create new user and continue the order submission
	    }
	}    

	# mobile code verification
>>>>>>> .r81067
	
<<<<<<< .mine
    if(isset($_REQUEST['Harware_USD_price']))
	$_SESSION['Harware_USD_price']=$_REQUEST['Harware_USD_price'];

    $TemplateVars["country_phone_codes"]  = $country_phone_codes;
    $TemplateVars["assign_country_array"]  = $assign_country_array;
    $support_link = "<a href='/contact.html'>Please contact support</a>";
    
    if(isset($_REQUEST['mobileNumber'])){
	if(!isset($_SESSION['user_id'])){
	    $sql = "select user_id from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($_REQUEST['username']))."'";
	   // print $sql;
	    $result = trellian_db_query($sub_conn,$sql);
	    if(pg_num_rows($result) != 0) {
		$res = pg_fetch_assoc($result);
		$userid=$res['user_id'];
		$_SESSION['existing_user']=true;
	    }
	}
	else{
	    $userid=$_SESSION['user_id'];
	    if(isset($_SESSION['limit_error']))
		unset($_SESSION['limit_error']);
	}
=======
	if(isset($_REQUEST['ver_code']) && isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='cc option check'){
	    # need to insert mobile verification code into db for new user for future use
	    # if user selects CC processing .
	    if($_REQUEST['option_check'] == 'cc option check' && isset($_SESSION['verified_for_new_user']) && isset($_SESSION['new_user'])){
		log_pin_code($_SESSION['user_id'],$_REQUEST['ver_code'],$_REQUEST['mobile_no'],"M");
	    }
	}
>>>>>>> .r81067
	
<<<<<<< .mine
	if(!isset($userid)){
	    $_SESSION['verified_for_new_user']=true;
	}
	$TemplateVars['mobile_no']=$_REQUEST['mobile_no'];
	$TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['countrycodes']);
	//print_r($TemplateVars);exit;   
	$mobile_number=$_REQUEST['mobileNumber'];
	
	$country_code = $TemplateVars['country_code1'];
	$error_message='';
	if($country_code == "")
	{
	    $error_message = "Please select country code";
	}
	elseif($country_code=='Select Country')
	{
	    $error_message = "Please select country code";
	}
	else if(!preg_match('/^[0-9]*$/',$country_code)) 
	{
	    $error_message = "Please enter valid country code";				
	}
	if($mobile_number == "")
	{
	    $error_message = "Please enter mobile number";
	}
	else if(!preg_match('/^[0-9]*$/',$mobile_number)) 
	{			
	    $error_message = "Please enter valid mobile number";			
	}
	if(isset($userid)){
	    if(get_num_log_today($userid,"M")>30)
	    {
		if(isset($_SESSION['logged_in'])){
		    $error_message = "Call limit reached. $support_link";    
		}
		else
		{
		    $_SESSION['limit_error']="Call limit reached. $support_link";    
		}
	    }
	}
	
	
	if($error_message=="")
	{
		include_once("/var/www/common/lib/php/trellian/send_sms.php");
		# logic to generate 6 digit unique string
		do
		{			
			$pin = generate_pin();									
		}
		while(checkForUniqueCode($pin)==false);
		$_SESSION['ver_code']=$pin;
		if(!$userid){
		    
		    $_SESSION['verified']=1;
		}
		$message = 'Your HostedHash.com verification code is '.$pin;
		$message = urlencode($message);
		$contact_number =$country_code.$mobile_number;
		//echo $contact_number;exit;
		$res = send_sms($message,$contact_number);
		if($res>100)
		{   if(isset($userid) && !isset($_SESSION['limit_error'])){
		        log_pin_code($userid,$pin,$contact_number,"M");
		    }
		    //$TemplateVars['mobile_veriy_message'] = "SMS Message has been sent and should be received soon";
		    $error_message="SMS Message has been sent and should be received soon";
		}
		else
		{
			if(isset($onverify_error_messages[$res]))
			    $error_message = $onverify_error_messages[$res];
			else
			    $error_message = "Internal error. Please try again later";
		}
	}
	echo $error_message;
	exit;
    }
    
    if(isset($_REQUEST['submit_details'])){
	$error_message='';	
	if($_REQUEST['submit_details']=='SUBMIT'){
=======
	if($error_message==''){
	    # As per http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5084289
	    # inserting details to ps_orders table for engine = 'BTHash'
>>>>>>> .r81067
	    
<<<<<<< .mine
	    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5121666
	    # checked for user placing order witout login
	    if(!isset($_SESSION['logged_in'])){
		if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='cc option check'){
		    if($_REQUEST['code']!=$_SESSION['ver_code']){
			$TemplateVars['name_on_card']=$_REQUEST['name_on_card'];
			$TemplateVars['cardtype']=$_REQUEST['cardtype'];
			$TemplateVars['Card_Number']=$_REQUEST['Card_Number'];
			$TemplateVars['expiryDate']=$_REQUEST['expiryDate'];
			$TemplateVars['cvv']=$_REQUEST['cvv'];
			$TemplateVars['mobile_no']=$_REQUEST['mobile_no'];
			$TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['country_code']);
			$TemplateVars['country']=preg_replace("#\d+\s+(.+)#is","$1",$_REQUEST['country_code']);;
			$TemplateVars['addr1']=trim($_REQUEST['addr1']);
			$TemplateVars['addr2']=trim($_REQUEST['addr2']);
			$error_message='Invalid Verification Code.';
			$TemplateVars['error_message']=$error_message;
		    }
		}
		
		$sql = "select count(*) from ps_user pu WHERE lower(username) = '".pg_escape_string(strtolower($_REQUEST['email']))."'";
		$result = trellian_db_query($sub_conn,$sql);
		$res = pg_fetch_assoc($result,0);
		    
		//$num_rows = pg_num_rows($result);
		if ($res['count'] == 1) {
		    $_SESSION['REQUEST']=$_REQUEST;
		    $_SESSION['user_name']=$_REQUEST['email'];
		    header("Location: login.html");
		   exit;
		}
		else{
		    create_user_account($_REQUEST);
		}
	    }    
    
	    /*
	    $TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['country_code']);
	    $TemplateVars['country']=preg_replace("#\d+\s+(.+)#is","$1",$_REQUEST['country_code']);;
	    */
=======
	    $detail='';
    
	    if(isset($_REQUEST['product_type'])){
		$detail.="Product Type : ".$_REQUEST['product_type']."\n";
	    }
		
	    if(isset($_REQUEST['product_price'])){
		$detail.="Product Price : $".$_REQUEST['product_price']."\n";
		$_REQUEST['product_price']=preg_replace("#\,#is","",$_REQUEST['product_price']);
	    }
		
	    if(isset($_REQUEST['firstname']))
		$detail.="First name : ".$_REQUEST['firstname']."\n";
>>>>>>> .r81067
	    
<<<<<<< .mine
	    # code verification
	    if(isset($_REQUEST['code']) && !isset($_REQUEST['use_existing_cc_details']) && isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='cc option check'){
		
		# need to insert mobile verification code into db for new user for future use
		# if user selects CC processing .
		if($_REQUEST['option_check'] == 'cc option check' && isset($_SESSION['verified_for_new_user']) && isset($_SESSION['new_user'])){
		    log_pin_code($_SESSION['user_id'],$_REQUEST['code'],$_REQUEST['mobile_no'],"M"); 
		}
		
		$TemplateVars['name_on_card']=$_REQUEST['name_on_card'];
		$TemplateVars['cardtype']=$_REQUEST['cardtype'];
		$TemplateVars['Card_Number']=$_REQUEST['Card_Number'];
		$TemplateVars['expiryDate']=$_REQUEST['expiryDate'];
		$TemplateVars['cvv']=$_REQUEST['cvv'];
		$TemplateVars['mobile_no']=$_REQUEST['mobile_no'];
		$TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['country_code']);
		$TemplateVars['country']=preg_replace("#\d+\s+(.+)#is","$1",$_REQUEST['country_code']);;
		
		$code = pg_escape_string($_REQUEST['code']);
		$userid = pg_escape_string($_SESSION['user_id']);	
		$query = "SELECT verification_code,mobile,verified_date FROM ps_user_verification_code_log WHERE   user_id=".$userid." ORDER BY created_date DESC LIMIT 1";
		$code_result_set = trellian_db_query($sub_conn,$query);
		$res = pg_fetch_assoc($code_result_set);
=======
>>>>>>> .r81067
	    
<<<<<<< .mine
		if($_REQUEST['code']!=$res['verification_code']){
		   $error_message='Invalid Verification Code.';
		   $TemplateVars['error_message']=$error_message;
		   unset($_SESSION['ver_code']);
		}
	    }
=======
	    if(isset($_REQUEST['lastname']))
		$detail.="Last Name : ".$_REQUEST['lastname']."\n";
		
	    if(isset($_REQUEST['email']))
		$detail.="Email : ".$_REQUEST['email']."\n";
>>>>>>> .r81067
	    
<<<<<<< .mine
	    if($error_message==''){
		# As per http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5084289
		# inserting details to ps_orders table for engine = 'BTHash'
		$detail='';
	
		if(isset($_REQUEST['product_type'])){
		    $detail.="Product Type : ".$_REQUEST['product_type']."\n";
		}
		    
		if(isset($_REQUEST['product_price'])){
		    $detail.="Product Price : $".$_REQUEST['product_price']."\n";
		    $_REQUEST['product_price']=preg_replace("#\,#is","",$_REQUEST['product_price']);
		}
		    
		if(isset($_REQUEST['firstname']))
		    $detail.="First name : ".$_REQUEST['firstname']."\n";
		
		
		if(isset($_REQUEST['lastname']))
		    $detail.="Last Name : ".$_REQUEST['lastname']."\n";
		    
		if(isset($_REQUEST['email']))
		    $detail.="Email : ".$_REQUEST['email']."\n";
		
		if(isset($_REQUEST['wallet']))
		    $detail.="Bitcoin Wallet : ".$_REQUEST['wallet']."\n";
		
		if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='cc option check'){
		    //print_r($_REQUEST);exit;
		    $TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['country_code']);
		    $TemplateVars['country']=preg_replace("#\d+\s+(.+)#is","$1",$_REQUEST['country_code']);;
		
		    $payment_type='CC';
		    $detail_arr=array();
		    $detail_arr['user_id']=$_SESSION['user_id'];
		    $detail_arr['engine']='BTHash';
		    $detail_arr['user_details']['first_name']=$_REQUEST['firstname'];
		    $detail_arr['user_details']['last_name']=$_REQUEST['lastname'];
		    $detail_arr['user_details']['company']=$_REQUEST['company'];
		    $detail_arr['user_details']['address']=$_REQUEST['address'];
		    $detail_arr['user_details']['city']=$_REQUEST['city'];
		    $detail_arr['user_details']['state']=$_REQUEST['state'];
		    $detail_arr['user_details']['zip']=$_REQUEST['zip'];
		    
		    $detail_arr['user_details']['country']=$_REQUEST['billing_country'];
		    $detail_arr['user_details']['email']=$_REQUEST['email'];
		    $detail_arr['prod_name']='Hostedhash';
		    //print_r($detail_arr);exit;
		    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
		    # for automate CC payment gateway for CC based orders
		    # Need to include 2% on top for Visa/MC and 4% on top for Amex cards
		    # as mentioned by David
		    $amt=preg_replace("#\,#is","",$_REQUEST['product_price']);
		    $cc_charge=calculate_CC_charge($_REQUEST['cardtype'],$amt);
		    $amt_with_charge=$amt+$cc_charge;		    
		    $user_vat_amount=calculate_vat_amount($country_code,$vat,$amount);
			$detail_arr['total_amount']=$amt_with_charge;
		/*
		    if(isset($_REQUEST['product_price'])){
			
			if($_REQUEST['cardtype']=='VISA' or $_REQUEST['cardtype']=='MasterCard'){
			    $amt_with_charge=$amt+$amt*0.02;
			}
			elseif($_REQUEST['cardtype']=='AMEX'){
			    $amt_with_charge=$amt+$amt*0.04;
			}
			$detail_arr['total_amount']=$amt_with_charge;
		    }
	        */
		    
		    # valid card numbers for different card type
		    # http://www.paypalobjects.com/en_US/vhelp/paypalmanager_help/credit_card_numbers.htm
		    # master card :      5555555555554444
		    # visa card : 	     4111111111111111
		    # American Express : 378282246310005
		    
		    if(isset($_REQUEST['name_on_card']) && $_REQUEST['name_on_card']!=''){
			$TemplateVars['name_on_card']=$_REQUEST['name_on_card'];
			$detail.="Name on Card : ".$_REQUEST['name_on_card']."\n";
			$detail_arr['cc_details']['cc_name']=$_REQUEST['name_on_card'];		
		    }		
			
		    if(isset($_REQUEST['cardtype']) && $_REQUEST['cardtype']!=''){
			$TemplateVars['cardtype']=$_REQUEST['cardtype'];
			$detail.="Card Type : ".$_REQUEST['cardtype']."\n";
			$detail_arr['cc_details']['cc_type']=$_REQUEST['cardtype'];		
		    }
			
		    if(isset($_REQUEST['Card_Number']) && $_REQUEST['Card_Number']!=''){
			$TemplateVars['Card_Number']=$_REQUEST['Card_Number'];
			$detail.="Card Number : ".$_REQUEST['Card_Number']."\n";		
			$detail_arr['cc_details']['cc_number']=$_REQUEST['Card_Number'];		
		    }
			
		    if(isset($_REQUEST['expiryDate']) && $_REQUEST['expiryDate']!=''){
			$TemplateVars['expiryDate']=$_REQUEST['expiryDate'];
			$detail.="Expiry Date : ".$_REQUEST['expiryDate']."\n";
			$detail_arr['cc_details']['cc_month']=substr($_REQUEST['expiryDate'], 0, 2);
			$detail_arr['cc_details']['cc_year']=substr($_REQUEST['expiryDate'], -2);		
		    }
			
		    if(isset($_REQUEST['cvv']) && $_REQUEST['cvv']!=''){
			$TemplateVars['cvv']=$_REQUEST['cvv'];
			$detail.="Card CVV : ".$_REQUEST['cvv']."\n";
			$detail_arr['cc_details']['cc_code']=$_REQUEST['cvv'];
		    }
			
		    if(isset($_REQUEST['new_wallet_addr'])){
			# insert bitcoin wallet data in bitcoin_order_details table for existing user
			$sql_insert_query="insert into bitcoin_wallet_details (user_id,Bitcoin_Wallet) values (".$_SESSION['user_id'].",'".$_REQUEST['wallet']."')";
			trellian_db_query($sub_conn, $sql_insert_query);
		    }
		  #print_r($TemplateVars);exit;
		 // print_r($_REQUEST);exit;
		    # do payment with cc details that the user already have
		    if(isset($_REQUEST['use_existing_cc_details'])){
			
			$ret_result=make_cc_payment_on_file($_SESSION['user_id'],$detail_arr['total_amount'],$detail_arr['engine'],$detail_arr['prod_name'],NULL,NULL,preg_replace("#\,#is","",$_REQUEST['product_price']));
			if(!$ret_result){
			    $TemplateVars['error']='NO CC Details Available. Please enter CC Details.';
			    return $TemplateVars;
			}
			$query='select cc_type,cc_number,cc_name,cc_month,cc_year,cc_code from ps_orders where order_id='.$ret_result['ps_order_id'];
			$result=trellian_db_query($sub_conn, $query);
			$res = pg_fetch_assoc($result);
			
			if($res){
			    //$detail.="Name on Card : ".$res['cc_name']."\n";
			    //$TemplateVars['name_on_card']=$res['cc_name'];
			    //
			    //$detail.="Card Type : ".$res['cc_type']."\n";
			    //$TemplateVars['cardtype']=$res['cc_type'];
			    //
			    //$detail.="Card Number : ".$res['cc_number']."\n";
			    //$TemplateVars['Card_Number']=$res['cc_number'];
			    //
			    //$detail.="Expiry Date : ".$res['cc_month'].$res['cc_year']."\n";
			    //$TemplateVars['expiryDate']=$res['cc_month'].$res['cc_year'];
			    //
			    //$detail.="Card CVV : ".$res['cc_code']."\n";
			    //$TemplateVars['cvv']=$res['cc_code'];
			}
		    }
		    else{
			# Call paybox_payment for automated CC processing
			# takes user entered cc details
			//print_r($_REQUEST);exit;
			if(isset($_SESSION['new_user']) && $_SESSION['new_user']==1){
			    $country = array_search($TemplateVars['country'], $assign_country_array);
			    $TemplateVars['address'] = pg_escape_string(trim($_REQUEST['addr1']).", ".trim($_REQUEST['addr2']));
			    $TemplateVars['addr1']=trim($_REQUEST['addr1']);
			    $TemplateVars['addr2']=trim($_REQUEST['addr2']);
			    $TemplateVars['city']= pg_escape_string(trim($_REQUEST['city']));
		            $TemplateVars['state']= pg_escape_string(trim($_REQUEST['state']));
		            $TemplateVars['zip']= pg_escape_string(trim($_REQUEST['zip']));
        
			    $query="	UPDATE
					    ps_user_details
					SET
					    country='".$country."',
					    street='".$TemplateVars['address']."',
					    city='".$TemplateVars['city']."',
					    state='".$TemplateVars['state']."',
					    zip='".$TemplateVars['zip']."'
					where
					    user_id=".$_SESSION['user_id'];
			    $result = trellian_db_query($sub_conn, $query);
			}
			
			$ret_result=paybox_payment($detail_arr);
		    }
		    $order_id=$ret_result['ps_order_id'];
		}
		elseif(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='bitcoin option check'){
#print_r($_REQUEST);exit;
		    $payment_type='bitcoin';
		    $detail.='Payment Method : Bitcoin';
		    
		    $get_order_id = "SELECT nextval('ps_orders_seq'::text) as order_id";
		    $result = trellian_db_query($sub_conn, $get_order_id);
		    $order_id = pg_fetch_result($result, 0, 'order_id');
		    
		    $query="insert into ps_orders(order_id,user_id,engine,total_charged,payment_method) values ($order_id,".$_SESSION['user_id'].",'BTHash',".$_REQUEST['product_price'].",' Bitcoin')";
		    $result = trellian_db_query($sub_conn,$query);
/*##################*/
		    # As per http://rt.trellian.com/Ticket/Display.html?id=614701#txn-5105560
		    $total_amount=$_REQUEST['product_price'];
		    
		    $query = " SELECT round($total_amount/rate,2) FROM rate WHERE currency ='USD/AUD'";
		    $result =trellian_db_query($rego_dbh,$query);
		    list($price_aud) = pg_fetch_row($result);
	     
		    $query = "SELECT nextval('rego_id_seq'::regclass) as rego_id";
		    $result = trellian_db_query($rego_dbh,$query);
		    list($rego_id) = pg_fetch_row($result);
		    
		    $name_first=trim($_REQUEST['firstname']);
		    $name_last=trim($_REQUEST['lastname']);
		    
		    $query = "INSERT INTO REGO (id, rego_name,product_name,price_us,price_aud,order_date,cust_name,cust_email,status,comments,v_status,lang)values("
			    ."$rego_id"
			    .",'".$_REQUEST['email']."'"
			    .",'HostedHash'"
			    .",'$total_amount'"
			    .",'$price_aud'"
			    .",now()::date"
			    .",'$name_first $name_last'"
			    .",'".$_REQUEST['email']."'"
			    .",'Y'"
			    .",'$order_id'"
			    .",'Y'"
			    .",'en'"
			    .")";
		    $result =trellian_db_query($rego_dbh,$query);
		    if (!$result) {			
			    mail('vandana@trellian.com', 'paybox_payment.php', "$query: " . pg_last_error());
		}

		$query = "insert into sub_rego(rego_id,product_name,price_us,price_aud)values($rego_id,'Account Balance','$total_amount','$price_aud');";
		$result =trellian_db_query($rego_dbh,$query);
/*##################*/			       
		}
		elseif(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='wire option check'){
		    $payment_type='wire';
		    $detail.='Payment Method : Bank Wire Transfer';
		    
		    $get_order_id = "SELECT nextval('ps_orders_seq'::text) as order_id";
		    $result = trellian_db_query($sub_conn, $get_order_id);
		    $order_id = pg_fetch_result($result, 0, 'order_id');
		    
		    $query="insert into ps_orders(order_id,user_id,engine,total_charged,payment_method) values ($order_id,".$_SESSION['user_id'].",'BTHash',".$_REQUEST['product_price'].",'Bank Wire Transfer')";
		    $result = trellian_db_query($sub_conn,$query);
		    
		    /*##################*/
		    # As per http://rt.trellian.com/Ticket/Display.html?id=614701#txn-5105560
		    $total_amount=$_REQUEST['product_price'];
		    
		    $query = " SELECT round($total_amount/rate,2) FROM rate WHERE currency ='USD/AUD'";
		    $result =trellian_db_query($rego_dbh,$query);
		    list($price_aud) = pg_fetch_row($result);
	     
		    $query = "SELECT nextval('rego_id_seq'::regclass) as rego_id";
		    $result = trellian_db_query($rego_dbh,$query);
		    list($rego_id) = pg_fetch_row($result);
		    
		    $name_first=trim($_REQUEST['firstname']);
		    $name_last=trim($_REQUEST['lastname']);
		    
		    $query = "INSERT INTO REGO (id, rego_name,product_name,price_us,price_aud,order_date,cust_name,cust_email,status,comments,v_status,lang)values("
			    ."$rego_id"
			    .",'".$_REQUEST['email']."'"
			    .",'HostedHash'"
			    .",'$total_amount'"
			    .",'$price_aud'"
			    .",now()::date"
			    .",'$name_first $name_last'"
			    .",'".$_REQUEST['email']."'"
			    .",'Y'"
			    .",'$order_id'"
			    .",'Y'"
			    .",'en'"
			    .")";
		    $result =trellian_db_query($rego_dbh,$query);
		    if (!$result) {			
			    mail('vandana@trellian.com', 'paybox_payment.php', "$query: " . pg_last_error());
		    }

		$query = "insert into sub_rego(rego_id,product_name,price_us,price_aud)values($rego_id,'Account Balance','$total_amount','$price_aud');";
		$result =trellian_db_query($rego_dbh,$query);
/*##################*/
		}
		
		
		# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5093398
		# w.r.t partner setup
		# if user place an order then affiliate id in ps orders table.
		
		if(isset($_COOKIE['entryID']) && isset($_SESSION["set_partner".$_SESSION['user_id']])){
		    $query='UPDATE
				ps_orders
			    SET
				referral_id='.$_COOKIE['entryID'].'
			    WHERE
			       user_id = '.$_SESSION['user_id'].'
			    AND
				order_id='.$order_id;
		    $result = trellian_db_query($sub_conn,$query);
		}
	
		# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
		# set expiry date after 1 year from now
		$query="SELECT now() + INTERVAL '1 year'";
		$result = trellian_db_query($sub_conn,$query);
		$res = pg_fetch_array($result,0);
		$expirydate=$res[0];
		
		$query='insert into bitcoin_order_details (order_id,user_id,order_type,hash_rate,price,bitcoin_wallet,expiry) values (';
		$query.=$order_id.",".$_SESSION['user_id'].",'".$_REQUEST['product_type']."','".$_REQUEST['product_hash_rate']."','".$_REQUEST['product_price']."','".$_REQUEST['wallet']."','".$expirydate."')";
		//print $query;exit;
		$result = trellian_db_query($sub_conn,$query);
			    
		
		
		$headers="From: sales@hostedhash.com \n";
	       // $headers .= 'Bcc: david@trellian.com' . "\r\n";
	
				    //mail('david@trellian.com','Hostedhash order',$detail,$headers);
		
				    //mail('aaron@trellian.com','Hostedhash order',$detail,$headers);
		//mail('sales@trellian.com','Hostedhash order',$detail,$headers);
		# Send mail to sales@trellian.com
		//mail('vandana@trellian.com,chittaranjan@trellian.com','Hostedhash order',$detail,$headers);
		mail('vandana@trellian.com','Hostedhash order',$detail,$headers);
		
		# order confirmation mail to user
		$user_detail="Your Order Details : \n".$detail;
		mail($_REQUEST['email'],'Hostedhash order',$user_detail,$headers);
		
		$url='/confirm.html?product='.$_REQUEST['product_type'].'&cost='.$_REQUEST['product_price'].'&p='.$payment_type;
		if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='bitcoin option check'){
		    $url.='&bitcoin_amt='.$_REQUEST['bitcoin_amt'];
		}
		//print $url;exit;
		header('Location: '.$url);
		exit;
	    }
	    else{
		$TemplateVars['error_message']=$error_message;
	    }    
	}
=======
	    if(isset($_REQUEST['wallet']))
		$detail.="Bitcoin Wallet : ".$_REQUEST['wallet']."\n";
	    
	    # insert bitcoin wallet data in bitcoin_order_details table for existing user
	    if(isset($_REQUEST['new_wallet_addr'])){
		$sql_insert_query="insert into bitcoin_wallet_details (user_id,Bitcoin_Wallet) values (".pg_escape_string($_SESSION['user_id']).",'".pg_escape_string($_REQUEST['wallet'])."')";
		trellian_db_query($sub_conn, $sql_insert_query);
	    }
	    
	    $detail_arr=array();
	    if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='cc option check'){
		$TemplateVars['country_code1']=preg_replace("#(\d+)\s+.*#is","$1",$_REQUEST['country_code']);
		$TemplateVars['country']=preg_replace("#\d+\s+(.+)#is","$1",$_REQUEST['country_code']);;
	    
		$payment_type='CC';
		
		$detail_arr['user_id']=$_SESSION['user_id'];
		$detail_arr['engine']='BTHash';
		$detail_arr['user_details']['first_name']=$_REQUEST['firstname'];
		$detail_arr['user_details']['last_name']=$_REQUEST['lastname'];
		$detail_arr['user_details']['company']=$_REQUEST['company'];
		$detail_arr['user_details']['street']=trim($_REQUEST['addr1']).", ".trim($_REQUEST['addr2']);
		$detail_arr['user_details']['city']=$_REQUEST['city'];
		$detail_arr['user_details']['state']=$_REQUEST['state'];
		$detail_arr['user_details']['zip']=$_REQUEST['zip'];
		
		$detail_arr['user_details']['country']=$_REQUEST['billing_country'];
		$detail_arr['user_details']['email']=$_REQUEST['email'];
		#$detail_arr['prod_name']='Trellian SAS Hash';
		$detail_arr['prod_name']='Hostedhash';
		
		# http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
		# for automate CC payment gateway for CC based orders
		# Need to include 2% on top for Visa/MC and 4% on top for Amex cards
		# as mentioned by David
		
		$amt=preg_replace("#\,#is","",$_REQUEST['product_price']);
		
		$query='SELECT vat_number from ps_user_details where user_id='.pg_escape_string($_SESSION['user_id']);
		$result = trellian_db_query($sub_conn,$query);
		$res = pg_fetch_assoc($result);
		 
		$vat=trim($res['vat_number']);
		if($vat=='') {
		   $vat=NULL;
		   if(isset($_REQUEST['user_vat_number']) && $_REQUEST['user_vat_number']!=''){
			$vat=trim($_REQUEST['user_vat_number']);
		   }
		}
		$TemplateVars['vat']=$vat;
		
		$detail_arr['vat']=$vat;
		
		$user_vat_amount=calculate_vat_amount($_REQUEST['billing_country'],$vat,$amt);	# calculate vat charge if applicable
		$detail_arr['vat_charge']=$user_vat_amount;
		if($user_vat_amount!=0){
		    $TemplateVars['user_vat_amount']=number_format($user_vat_amount,2);
		}
		$prod_price_with_vat=$amt + $user_vat_amount;
		
		$cc_charge=calculate_CC_charge($_REQUEST['cardtype'],$prod_price_with_vat);	# calculate cc charge
		$TemplateVars['cc_surcharge']=number_format($cc_charge,2);//$cc_charge;
		$detail_arr['merchant_fee']=$cc_charge;
		
		$amt_with_charge=$amt+$cc_charge+$user_vat_amount;
		
		$detail_arr['total_amount']=$amt_with_charge;
			    
		# valid card numbers for different card type
		# http://www.paypalobjects.com/en_US/vhelp/paypalmanager_help/credit_card_numbers.htm
		# master card :      5555555555554444
		# visa card : 	     4111111111111111
		# American Express : 378282246310005
		
		if(isset($_REQUEST['name_on_card']) && $_REQUEST['name_on_card']!=''){
		    $TemplateVars['name_on_card']=$_REQUEST['name_on_card'];
		    $detail.="Name on Card : ".$_REQUEST['name_on_card']."\n";
		    $detail_arr['cc_details']['cc_name']=$_REQUEST['name_on_card'];		
		}		
		    
		if(isset($_REQUEST['cardtype']) && $_REQUEST['cardtype']!=''){
		    $TemplateVars['cardtype']=$_REQUEST['cardtype'];
		    $detail.="Card Type : ".$_REQUEST['cardtype']."\n";
		    $detail_arr['cc_details']['cc_type']=$_REQUEST['cardtype'];		
		}
		    
		if(isset($_REQUEST['Card_Number']) && $_REQUEST['Card_Number']!=''){
		    $TemplateVars['Card_Number']=$_REQUEST['Card_Number'];
		    $detail.="Card Number : ".$_REQUEST['Card_Number']."\n";		
		    $detail_arr['cc_details']['cc_number']=$_REQUEST['Card_Number'];		
		}
		    
		if(isset($_REQUEST['expiryDate']) && $_REQUEST['expiryDate']!=''){
		    $TemplateVars['expiryDate']=$_REQUEST['expiryDate'];
		    $detail.="Expiry Date : ".$_REQUEST['expiryDate']."\n";
		    $detail_arr['cc_details']['cc_month']=substr($_REQUEST['expiryDate'], 0, 2);
		    $detail_arr['cc_details']['cc_year']=substr($_REQUEST['expiryDate'], -2);		
		}
		    
		if(isset($_REQUEST['cvv']) && $_REQUEST['cvv']!=''){
		    $TemplateVars['cvv']=$_REQUEST['cvv'];
		    $detail.="Card CVV : ".$_REQUEST['cvv']."\n";
		    $detail_arr['cc_details']['cc_code']=$_REQUEST['cvv'];
		}
		
		# do payment with cc details that the user already have
		if(isset($_REQUEST['use_existing_cc_details'])){
		    # some existing user do not have first name , last name in db
		    $query = " SELECT first_name ,last_name ,street ,city ,state ,zip ,country ,phone ,email  FROM ps_user_details where user_id =".pg_escape_string($_SESSION['user_id']);
		    $result=trellian_db_query($sub_conn, $query);
		    $res_addr_details = pg_fetch_assoc($result);
		   
		    if($res_addr_details['first_name']=='' && $res_addr_details['last_name']==''){
			$query="UPDATE
				    ps_user_details
				SET
				    first_name='".pg_escape_string($_REQUEST['firstname'])."',
				    last_name='".pg_escape_string($_REQUEST['lastname'])."'";
				    
			if($res_addr_details['street']==''){
			    $query.=",street='".pg_escape_string($_REQUEST['addr1']).",".pg_escape_string($_REQUEST['addr2'])."'";
			}
			
			if($res_addr_details['city']==''){
			    $query.=",city='".pg_escape_string($_REQUEST['city'])."'";
			}
			
			if($res_addr_details['state']==''){
			    $query.=",state='".pg_escape_string($_REQUEST['state'])."'";
			}
			
			if($res_addr_details['zip']==''){
			    $query.=",zip='".pg_escape_string($_REQUEST['zip'])."'";
			}
			
			if($res_addr_details['country']==''){
			    $query.=",country='".pg_escape_string($_REQUEST['country'])."'";
			}
			
			
			$where_clause="where
				    user_id=".pg_escape_string($_SESSION['user_id']);
			$query.=" ".$where_clause;
			$result = trellian_db_query($sub_conn, $query);
		    }
		   
		    $engine_type=preg_replace("#^.*?(\d+\.\d+).*$#is","$1",$_REQUEST['product_hash_rate'])."ghs";
		    $ret_result=make_cc_payment_on_file($_SESSION['user_id'],$detail_arr['total_amount'],$detail_arr['engine'],$detail_arr['prod_name'],$detail_arr['vat'],$detail_arr['vat_charge'],preg_replace("#\,#is","",$_REQUEST['product_price']),$engine_type ,$detail_arr['merchant_fee']);
		    
		    if(!$ret_result){
		       $TemplateVars['error']='CC Payment failed using Existing cc details';
		    }
		}
		else{
		    # if user do not have existing details as well if do not have address  details, need to update address details  for particular user
		    # for future use.
		    
		    if(isset($_REQUEST['do_not_show_cc_chckbox']) && $_REQUEST['do_not_show_cc_chckbox']!=true){
			$query='SELECT street ,city ,state ,zip , vat_number  FROM ps_user_details where user_id ='.pg_escape_string($_SESSION['user_id']);
			$result=trellian_db_query($sub_conn, $query);
			$res_addr_details = pg_fetch_assoc($result);
			
			if($res_addr_details['street']=='' && $res_addr_details['city']=='' && $res_addr_details['state']=='' && $res_addr_details['zip']==''){
			    $country =pg_escape_string(trim($_REQUEST['billing_country']));
			    $TemplateVars['address'] = pg_escape_string(trim($_REQUEST['addr1']).", ".trim($_REQUEST['addr2']));
			    $TemplateVars['addr1']=pg_escape_string(trim($_REQUEST['addr1']));
			    $TemplateVars['addr2']=pg_escape_string(trim($_REQUEST['addr2']));
			    $TemplateVars['city']= pg_escape_string(trim($_REQUEST['city']));
		            $TemplateVars['state']= pg_escape_string(trim($_REQUEST['state']));
		            $TemplateVars['zip']= pg_escape_string(trim($_REQUEST['zip']));
			    $TemplateVars['mobile_no']=pg_escape_string(trim($_REQUEST['mobile_no']));
        
			    $query="	UPDATE
					    ps_user_details
					SET
					    country='".$country."',
					    street='".$TemplateVars['address']."',
					    mobile='".$TemplateVars['mobile_no']."',
					    city='".$TemplateVars['city']."',
					    state='".$TemplateVars['state']."',
					    zip='".$TemplateVars['zip']."'
					where
					    user_id=".$_SESSION['user_id'];
			    $result = trellian_db_query($sub_conn, $query);
			}
			
			if(isset($_REQUEST['user_vat_number']) && trim($_REQUEST['user_vat_number'])!='' && trim($res_addr_details['vat_number']!='')){
					$query=" UPDATE
						    ps_user_details
						  SET
						    vat_number='".pg_escape_string(trim($_REQUEST['user_vat_number']))."'
						where
						    user_id=".pg_escape_string(trim($_SESSION['user_id']));
						 
				$result = trellian_db_query($sub_conn, $query);
			}
		    }
		    # pass entryID to script for
		    # /var/www/common/bin/paybox_orders.php script to insert partner id in rego db
		    if(isset($_COOKIE["entryID"])){
			$detail_arr['entryid']=$_COOKIE["entryID"];
		    }
		    
		    # Call paybox_payment for automated CC processing
		    # takes user entered cc details
		    $ret_result=paybox_payment($detail_arr);
		}
		
		$order_id=$ret_result['ps_order_id'];
		$detail_arr['order_id']=$order_id;
		$detail_arr['pay_box_reference_id']=$ret_result['reference'];
	    }
	    elseif(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='wire option check'){
		# get billing address from account details of user
		$query ='select
			    street, city, state, zip, country
			from
			    ps_user_details
			where
			    ps_user_details.user_id='.pg_escape_string($_SESSION['user_id']);
		$result = trellian_db_query($sub_conn,$query);
		$res = pg_fetch_assoc($result);	
	    
		$detail_arr['user_details']['street']=trim($res['street']);
		$detail_arr['user_details']['city']=$res['city'];
		$detail_arr['user_details']['state']=$res['state'];
		$detail_arr['user_details']['zip']=$res['zip'];
		
		$detail_arr['user_details']['country']=$res['country'];
	    
		$payment_type='wire';
		$detail.='Payment Method : Bank Wire Transfer'."\n";
		
		$get_order_id = "SELECT nextval('ps_orders_seq'::text) as order_id";
		$result = trellian_db_query($sub_conn, $get_order_id);
		$order_id = pg_fetch_result($result, 0, 'order_id');
		$detail_arr['order_id']=$order_id;
		$query="insert into ps_orders(order_id,user_id,engine,total_charged,payment_method) values (".pg_escape_string($order_id).",".pg_escape_string($_SESSION['user_id']).",'BTHash',".pg_escape_string($_REQUEST['product_price']).",'Bank Wire Transfer')";
		$result = trellian_db_query($sub_conn,$query);
		
		# http://rt.trellian.com/Ticket/Display.html?id=614701#txn-5105560
		# need to insert order details in rego db
	    
		insert_into_rego_db($order_id);
	    }
	    
	    # For now bitcoin payment option is disabled.
	    # Commented code needed later when we include bitcoin payment option.
	    /*
	    elseif(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='bitcoin option check'){
		$payment_type='bitcoin';
		$detail.='Payment Method : Bitcoin'."\n";
		
		$get_order_id = "SELECT nextval('ps_orders_seq'::text) as order_id";
		$result = trellian_db_query($sub_conn, $get_order_id);
		$order_id = pg_fetch_result($result, 0, 'order_id');
		$detail_arr['order_id']=$order_id;
		$query="insert into ps_orders(order_id,user_id,engine,total_charged,payment_method) values (".pg_escape_string($order_id).",".pg_escape_string($_SESSION['user_id']).",'BTHash',".pg_escape_string($_REQUEST['product_price']).",'Bitcoin')";
		$result = trellian_db_query($sub_conn,$query);
		
		# http://rt.trellian.com/Ticket/Display.html?id=614701#txn-5105560
		# need to insert order details in rego db
	    
		insert_into_rego_db($order_id);
	    }
	    
	    if(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='bitcoin option check'){
		$url.='&bitcoin_amt='.$_REQUEST['bitcoin_amt'];
	    }
	    
	    */
	    $url='/confirm.html?product='.$_REQUEST['product_type'].'&cost='.number_format($_REQUEST['product_price'],2).'&p='.$payment_type;
	    
	    if(isset($TemplateVars['user_vat_amount'])){
		$url.='&vat='.$TemplateVars['user_vat_amount'];
		$detail.='VAT : '.$TemplateVars['user_vat_amount']."\n";
	    }
	    if(isset($TemplateVars['cc_surcharge'])){
		$url.='&CC_Charge='.$TemplateVars['cc_surcharge'];
		$detail.='CC Surcharge : '.$TemplateVars['cc_surcharge']."\n";
	    }
	    
	    $detail="Order ID : $order_id\n".$detail;
	    
	    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5093398
	    # w.r.t partner setup
	    # if user place an order then affiliate id in ps orders table
	    # while submitting order
	    
	    if(isset($_COOKIE["entryID"])){
		$query='UPDATE
			    ps_orders
			SET
			    referral_id ='.pg_escape_string($_COOKIE["entryID"]).'
			WHERE
			   user_id = '.pg_escape_string($_SESSION['user_id']).'
			AND
			    order_id='.pg_escape_string($order_id);
		$result = trellian_db_query($sub_conn,$query);
	    }
	    	    	    
	    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
	    # set expiry date after 1 year from now
	    $query="SELECT now() + INTERVAL '1 year'";
	    $result = trellian_db_query($sub_conn,$query);
	    $res = pg_fetch_array($result,0);
	    $expirydate=$res[0];
	    
	    $query='insert into bitcoin_order_details (order_id, user_id, order_type, hash_rate, price, bitcoin_wallet, expiry) values (';
	    $query.=pg_escape_string($order_id).",".pg_escape_string($_SESSION['user_id']).",'".pg_escape_string($_REQUEST['product_type'])."','".pg_escape_string($_REQUEST['product_hash_rate'])."','".pg_escape_string($_REQUEST['product_price'])."','".pg_escape_string($_REQUEST['wallet'])."','".pg_escape_string($expirydate)."')";
	    
	    $result = trellian_db_query($sub_conn,$query);
	    
	    send_order_mail_sales($_REQUEST['email'],'Hostedhash order',$detail);
	    send_order_mail_user($_REQUEST['email'],$detail,$detail_arr);
	    unset($_SESSION['ver_code']);
	    unset($_SESSION['product_id']);
	    unset($_SESSION['details_to_submit']);
	    
	    # redirect to confirm page to show order confirmation
	    header('Location: '.$url);
	    exit;
	}
	else{
	    $TemplateVars['error_message']=$error_message;
	}    	
>>>>>>> .r81067
    }
    
<<<<<<< .mine
    if(isset($_SESSION['just_activated'])){
	$TemplateVars['activation_msg']='Congratulations! Your account is now active!';
	unset($_SESSION['just_activated']);
    }
    
    # if user is logged in get details of user for cc processing.
    if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in'])){
	# for user with bitcoin_wallet address
	$query='select
		    first_name , last_name , email, company, street, city, state, zip, country, bitcoin_wallet
		from
		    ps_user_details, bitcoin_wallet_details
		where
		    bitcoin_wallet_details.user_id=ps_user_details.user_id
		and
		    ps_user_details.user_id='.$_SESSION['user_id'];
    
	$result = trellian_db_query($sub_conn,$query);
	$res = pg_fetch_assoc($result);
=======
   $TemplateVars['product_id']=$_REQUEST['product_id'];
    # check which product is selected by user is Starter Pack
    if(isset($_REQUEST['prod_Starter']) || (isset($_REQUEST['product_id']) && $_REQUEST['product_id']==1) ){
	$TemplateVars['hash_rate']=$_SESSION['hash_rate_starter_pack'];
	$TemplateVars['bgt']=$_SESSION['price_starter'];
	$TemplateVars['product']="Starter Pack: ".$_SESSION['hash_rate_starter_pack'].", 12 Months";
    }
    
    # check which product is selected by user is Advance Miner
    if(isset($_REQUEST['prod_Advance']) || (isset($_REQUEST['product_id']) && $_REQUEST['product_id']==2)){
	$TemplateVars['hash_rate']=$_SESSION['hash_rate_advance_pack'];
	$TemplateVars['bgt']=$_SESSION['price_advance'];
	$TemplateVars['product']="Advanced Miner: ".$_SESSION['hash_rate_advance_pack'].", 12 Months";
    }
    
    # check which product is selected by user is Custom Miner
    if(isset($_REQUEST['prod_custom']) || (isset($_REQUEST['product_id']) && $_REQUEST['product_id']==3)){
	if(!isset($_REQUEST['hashrate'])){
	    $_REQUEST['hashrate']=$_SESSION['hashrate'];
	}
>>>>>>> .r81067
	
<<<<<<< .mine
	if(empty($res)){
	    # As existing user do not have bitcoin_wallet address
	    $query ='select
			first_name , last_name , email, company, street, city, state, zip, country
		    from
			ps_user_details
		    where
			ps_user_details.user_id='.$_SESSION['user_id'];
	    $result = trellian_db_query($sub_conn,$query);
	    $res = pg_fetch_assoc($result);
	    $TemplateVars['new_wallet_addr']=true;
	}
=======
	if(!isset($_REQUEST['bgt'])){
	    $_REQUEST['bgt']=$_SESSION['bgt'];
	}
>>>>>>> .r81067
	
<<<<<<< .mine
	//print_r($res_cc);exit;
	$TemplateVars['first_name']=$res['first_name'];
	$TemplateVars['last_name']=$res['last_name'];
	$TemplateVars['email']=$res['email'];
	$TemplateVars['company']=$res['company'];
	$TemplateVars['address']=$res['street'];
	if($TemplateVars['address']!=''){
	    $TemplateVars['addr1']=preg_replace('#(.*?)\,.*#is',"$1",$TemplateVars['address']);
	    $TemplateVars['addr2']=preg_replace('#.*?\,(.*)#is',"$1",$TemplateVars['address']);
	}
	$TemplateVars['city']=$res['city'];
	$TemplateVars['state']=$res['state'];
	$TemplateVars['zip']=$res['zip'];
	$TemplateVars['country']=$res['country'];
	$TemplateVars['bitcoin_wallet']=(isset($res['bitcoin_wallet']))?$res['bitcoin_wallet']:NULL;
#print_r($TemplateVars);exit;	
	# to check  trellian user already have credit cards tied to their accounts or not
	# if yes , need to show "Use Existing Card" checkbox
	
        $query = "  SELECT
			*
		    FROM 
			ps_orders po
		    left join
			ps_order_creditcard_holder pc
		    on
			pc.cardholder_id = po.cardholder_id 
		    WHERE
			user_id=".$_SESSION['user_id']."
		    AND
			cc_number != 'NULL'
		    AND
			dont_use_cc_details='f' 
		    AND
			cc_number IS NOT NULL
		    ORDER BY
			SUBMITTED
		    DESC
		    LIMIT 1;";
	//print $query;exit;	    
        $result =trellian_db_query($sub_conn,$query);
        #if not find latest one will fetch the one that user have stored
        if(pg_num_rows($result) == 0) {
           $query = "	SELECT
			    *
			FROM
			    ps_user_credit_card
			WHERE
			    user_id = ".$_SESSION['user_id'];			    
	    $result =trellian_db_query($sub_conn,$query);
           if(pg_num_rows($result) == 0)
		$TemplateVars['do_not_show_cc_chckbox']=false;
		
        }
	if(pg_num_rows($result) != 0){
	    $TemplateVars['do_not_show_cc_chckbox']=true;
	    $res_cc = pg_fetch_assoc($result);
	    $TemplateVars['name_on_card']=$res_cc['cc_name'];
	    $TemplateVars['cardtype']=$res_cc['cc_type'];
	    $TemplateVars['Card_Number']=$res_cc['cc_number'];
	    $TemplateVars['cvv']=$res_cc['cc_code'];
	    $TemplateVars['expiryDate']=sprintf("%02s",$res_cc['cc_month']).$res_cc['cc_year'];
	}
    }
       //print_r($TemplateVars);exit;
    # check which product is selected by user is Starter Pack
    if(isset($_REQUEST['prod_Starter']) || (isset($_SESSION['product_id']) && $_SESSION['product_id']==1) ){
	$TemplateVars['hash_rate']=$_SESSION['hash_rate_starter_pack'];
	$TemplateVars['bgt']=$_SESSION['price_starter'];
	$TemplateVars['product']="Starter Pack: ".$_SESSION['hash_rate_starter_pack'].", 12 Months";
	//unset($_SESSION['product_id']);
    }
    
    # check which product is selected by user is Advance Miner
    if(isset($_REQUEST['prod_Advance']) || (isset($_SESSION['product_id']) && $_SESSION['product_id']==2)){
	$TemplateVars['hash_rate']=$_SESSION['hash_rate_advance_pack'];
	$TemplateVars['bgt']=$_SESSION['price_advance'];
	$TemplateVars['product']="Advanced Miner: ".$_SESSION['hash_rate_advance_pack'].", 12 Months";
	//unset($_SESSION['product_id']);
    }
    
    # check which product is selected by user is Custom Miner
    if(isset($_REQUEST['prod_custom']) || (isset($_SESSION['product_id']) && $_SESSION['product_id']==3)){
	if(!isset($_REQUEST['hashrate'])){
	    $_REQUEST['hashrate']=$_SESSION['hashrate'];
	   // unset($_SESSION['hashrate']);
	}
	
	if(!isset($_REQUEST['bgt'])){
	    $_REQUEST['bgt']=$_SESSION['bgt'];
	   // unset($_SESSION['bgt']);
	}
	
	$hash_rate_submitted=$_REQUEST['hashrate'];			# get submitted hash rate for custom product
=======
	$hash_rate_submitted=$_REQUEST['hashrate'];			# get submitted hash rate for custom product
>>>>>>> .r81067
	$new_hash_rate=$TemplateVars['hash_rate']=round(($_REQUEST['bgt']/8.95),2);	# calculate hash price
	
	$_REQUEST['bgt']=number_format(round(($_REQUEST['bgt']),2),2, '.', ',');
	$price_custom=$TemplateVars['bgt']=$_REQUEST['bgt'];		# custom price
		
	if($hash_rate_submitted!=$new_hash_rate)		# check whether hash rate submitted tampered or nt
	    $TemplateVars['hash_rate']=$new_hash_rate;
	    
	$TemplateVars['product']='Custom Miner: '.$new_hash_rate.' Gh/s @ $8.95 per Gh/s, 12 Months';
<<<<<<< .mine
	//unset($_SESSION['product_id']);
=======
	
>>>>>>> .r81067
    }
    
<<<<<<< .mine
    if(isset($_REQUEST['prod_hardware']) || (isset($_SESSION['product_id']) && $_SESSION['product_id']==4)){
	$TemplateVars['hardware_unit']=$_SESSION['hardware_unit'];
	$TemplateVars['bgt']=$_SESSION['Harware_USD_price'];
	$TemplateVars['product']="Hardware Option : ".$_SESSION['hardware_unit']." Units";
	//unset($_SESSION['product_id']);
=======
    if(isset($_REQUEST['prod_hardware']) || (isset($_REQUEST['product_id']) && $_REQUEST['product_id']==4)){
	$TemplateVars['hardware_unit']=$_SESSION['hardware_unit'];
	$TemplateVars['bgt']=number_format(preg_replace("#\,#is","",$_SESSION['Harware_USD_price']),2);
	$TemplateVars['product']="Hardware Option : ".$_SESSION['hardware_unit']." Units";
	
>>>>>>> .r81067
    }
    
<<<<<<< .mine
    $TemplateVars['bitcoin_amt']=preg_replace('#\,#is','',$TemplateVars['bgt'])/554.3;
//print_r($TemplateVars);exit;
//unset($_SESSION);
    return $TemplateVars;
}

function create_user_account($_REQUEST){
    require_once('trellian/db.php');
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    //print_r($_REQUEST);exit;
    # take random password to create account
    $passwd_str=create_random_passwd();

    # insert details of new user's  username,password
    $sql_insert_query = "INSERT INTO ps_user(username,password) VALUES('". pg_escape_string($_REQUEST['email'])."','" . pg_escape_string($passwd_str)."')";
    //print $sql_insert_query;exit;
    trellian_db_query($sub_conn, $sql_insert_query);
    if(!isset($_SESSION['user_id'])){
	# get newly created user id
	$get_user_id = "SELECT currval('ps_user_seq') as last_register_id";
	$result = trellian_db_query($sub_conn, $get_user_id);
	$user_id = pg_fetch_result($result, 0, 'last_register_id');
	$_SESSION["user_id"]=$user_id;
=======
    $TemplateVars['bitcoin_amt']=preg_replace('#\,#is','',$TemplateVars['bgt'])/554.3;
    
    # if user is logged in get details of user for cc processing.
    if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in'])){
	
	# for user with bitcoin_wallet address
	$query='select
		    first_name , last_name , email, company, street, city, state, zip, country, bitcoin_wallet,vat_number
		from
		    ps_user_details, bitcoin_wallet_details
		where
		    bitcoin_wallet_details.user_id=ps_user_details.user_id
		and
		    ps_user_details.user_id='.pg_escape_string($_SESSION['user_id']);
    
	$result = trellian_db_query($sub_conn,$query);
	$res = pg_fetch_assoc($result);
	
	if(empty($res)){
	    # As existing user do not have bitcoin_wallet address
	    $query ='select
			first_name , last_name , email, company, street, city, state, zip, country,vat_number
		    from
			ps_user_details
		    where
			ps_user_details.user_id='.pg_escape_string($_SESSION['user_id']);
	    $result = trellian_db_query($sub_conn,$query);
	    $res = pg_fetch_assoc($result);
	    $TemplateVars['new_wallet_addr']=true;
	}
	
	# calculate vat if applicable
	$vat=trim($res['vat_number']);
	if($vat=='') {
	    $vat=NULL;
	}
	$user_vat_amount=calculate_vat_amount($res['country'],$vat,preg_replace("#\,#is","",$TemplateVars['bgt']));
	if($user_vat_amount!=0){
	    $TemplateVars['user_vat_amount']=number_format($user_vat_amount,2);;
	}
	    
	$TemplateVars['first_name']=$res['first_name'];
	$TemplateVars['last_name']=$res['last_name'];
	$TemplateVars['email']=$res['email'];
	$TemplateVars['company']=$res['company'];
	$TemplateVars['address']=$res['street'];
	if($TemplateVars['address']!=''){
	    $TemplateVars['addr1']=preg_replace('#(.*?)\,.*#is',"$1",$TemplateVars['address']);
	    $TemplateVars['addr2']=preg_replace('#.*?\,(.*)#is',"$1",$TemplateVars['address']);
	}
	$TemplateVars['city']=$res['city'];
	$TemplateVars['state']=$res['state'];
	$TemplateVars['zip']=$res['zip'];
	$TemplateVars['country']=$res['country'];
	if(isset($res['vat_number']) && trim($res['vat_number'])!=''){
	    $TemplateVars['vat_number']=$res['vat_number'];    
	}
	
	$TemplateVars['bitcoin_wallet']=(isset($res['bitcoin_wallet']))?$res['bitcoin_wallet']:NULL;
	
	$cc_charge=0;
	
	# to check  trellian user already have credit cards tied to their accounts or not
	# if yes , need to show "Use Existing Card" checkbox
	
	$res_cc=cc_on_file($_SESSION['user_id']);
	
	if($res_cc){
	    $TemplateVars['do_not_show_cc_chckbox']=true;
	    $TemplateVars['name_on_card']=trim($res_cc['cc_details']['cc_name']);
	    $TemplateVars['cardtype']=trim($res_cc['cc_details']['cc_type']);
	    $TemplateVars['Card_Number']=trim($res_cc['cc_details']['cc_number']);
	    $TemplateVars['cvv']=trim($res_cc['cc_details']['cc_code']);
	    $TemplateVars['expiryDate']=trim(sprintf("%02s",$res_cc['cc_details']['cc_month']).$res_cc['cc_details']['cc_year']);
	    
	    # calculate cc cahrge depeding on card type
	    $amt_with_vat=preg_replace("#\,#is","",$TemplateVars['bgt'])+$user_vat_amount;
	    $cc_charge=calculate_CC_charge(trim($res_cc['cc_details']['cc_type']),$amt_with_vat);
	    $TemplateVars['cc_surcharge']=number_format($cc_charge,2);
	}
	else{
	    $TemplateVars['do_not_show_cc_chckbox']=false;
	    
	}
	$TemplateVars['total_amount']=preg_replace("#\,#is","",$TemplateVars['bgt'])+$cc_charge+$user_vat_amount;
	
>>>>>>> .r81067
    }
    $TemplateVars['product_id']=$_REQUEST['product_id'];
    $username = pg_escape_string(trim($_REQUEST['email']));
    $name = pg_escape_string(trim($_REQUEST['firstname'])." ".trim($_REQUEST['lastname']));
    $password = pg_escape_string(trim($_REQUEST['passwd']));
    
    $fname = pg_escape_string(trim($_REQUEST['firstname']));
    $lname = pg_escape_string(trim($_REQUEST['lastname']));
    $email = pg_escape_string(trim($_REQUEST['email']));
    
    $signup_host='www.hostedhash.com';
    $ip = $_SERVER['REMOTE_ADDR'];
    $Bitcoin_Wallet=$_REQUEST['wallet'];
    
    # insert user details in ps_user_details
    $sql_insert_query = "INSERT INTO ps_user_details (user_id,name,email,first_name,last_name,signup_host,signup,ip,activated)
    VALUES('".$user_id."','".$name."','".$email."','".$fname."','".$lname."','".$signup_host."', now(), ". (empty($ip) ? "NULL, " : "'".$ip ."'::inet, ") . "now())";
    
    trellian_db_query($sub_conn, $sql_insert_query);
    
    # insert bitcoin wallet data in bitcoin_order_details table            
    $sql_insert_query="insert into bitcoin_wallet_details (user_id,Bitcoin_Wallet) values (".$user_id.",'".$Bitcoin_Wallet."')";
    trellian_db_query($sub_conn, $sql_insert_query);
    
    # include html email class
    include("/var/www/bid.trellian.com/lib/php/class/html_email.php");

    # define subject, from e-mail, etc
    $subject = "Trellian Direct Search Network Login Details";
    $from = "Trellian <sales@trellian.com>";

    # get e-mail templates
    $template_text = file_get_contents("/var/www/bid.trellian.com/lib/templates/email/register_mail.txt");
    $template_html = file_get_contents("/var/www/bid.trellian.com/lib/templates/email/register_mail.html");

    # replace username and password in template
    $template_text = str_replace("%username%", $username, $template_text);
    $template_text = str_replace("%password%", $password, $template_text);
    $template_text = str_replace("%name%", $name, $template_text);
    $template_text=preg_replace("#(Username:\s*\S+)#is","$1\nPassword: $passwd_str",$template_text);
    
    $template_html = str_replace("%username%", $username, $template_html);
    $template_html = str_replace("%encryptedusername%", $username, $template_html);
    $template_html = str_replace("%password%", $password, $template_html);
    $template_html=preg_replace("#(Username:\s*\S+)#is","$1<br>Password: $passwd_str",$template_html);
    $template_html = str_replace("%name%", $name, $template_html);
    

    # create e-mail object
    $message = new Email($email, $from, $subject);

    # attach text version & html version
    $message->SetMultipartAlternative($template_text, $template_html);

    # send e-mail
    $message->Send();
   
   /* ********* NEED TO UNCOMMENT THIS PART WHILE MAKING LIVE
    $contents = "Trellian Direct Search Network Registration" . "\n";
    $contents .= "FORM URL: https://www.hostedhash.com/registration.html" . "\n";
    $contents .= "Firstname: $first_name" . "\n";
    $contents .= "Surname: $last_name" . "\n";
    $contents .= "Username: $username" . "\n";
    $contents .= "Company: $company" . "\n";
    $contents .= "Country: $country" . "\n";
    $contents .= "Email: $email" . "\n";
    $contents .= "Telephone: $phone" . "\n";
    $contents .= "Mobile: $mobile" . "\n";
//  $msgz_to = "david@trellian.com";
    $msgz_to = "vandana@trellian.com";
    $msgz_subject = 'Trellian Direct Search Network Registration';
//$msgz_header = "From: Trellian Direct Search Network Registration <david@trellian.com>\r\nBcc: david@trellian.com\r\n";
    $msgz_header = "From: Trellian Direct Search Network Registration <vandana@trellian.com>\r\nBcc: vandana@trellian.com\r\n";
    mail($msgz_to,$msgz_subject,$contents,$msgz_header);
    */
    
    $TemplateVars['FRIENDLY_ERROR']="You have successfully created a new account. A confirmation email has just been sent to your email address.";
    
    # set new user as logged in and take it order.html if selected product from index.php
   // $_SESSION['logged_in']=1;
    /*if(!isset($_SESSION['activated'])){
	header('Location: activate_acc.html');
	exit;
    }
    else*/
    
   // $_SESSION['logged_in']=1;
    //$_SESSION['username']=trim($_REQUEST['email']);
    $_SESSION['new_user']=1;
   // print_r($_SESSION);
   // echo "new user";
  //  exit;
   /* if(isset($_SESSION['product_id'])){
	header('Location: order.html');   
	exit;
    }
    */
}
<<<<<<< .mine
function calculate_CC_charge($card_type,$amount){
    $merchantfee =  array("VISA" => "2",'MASTERCARD' => "2","AMEX" => "4");
    if(!isset($merchantfee[$card_type]))
        return false;
    return $amount*$merchantfee[$card_type]/100; 
}
function create_random_passwd(){
    # Create random password
    $length=8;
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $passwd_str = ''; $i < $length; $i++) {
	$index = rand(0, $count - 1);
	$passwd_str .= mb_substr($chars, $index, 1);
    }
    return $passwd_str;
}
#Logic to generate 6 digit pin
function generate_pin()
{
	return $pin = sprintf("%s%s%s%s%s%s", rand(1,9), rand(1,9), rand(1,9),rand(1,9),rand(1,9),rand(1,9));
}

// logic to check for unqiue code
function checkForUniqueCode($code)
{
    require_once('trellian/db.php');
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    $query = "SELECT verification_code FROM ps_user_verification_code_log WHERE verification_code='".$code."'";
    $code_result_set = trellian_db_query($sub_conn,$query);
    
    $code_object = pg_fetch_object($code_result_set);	
    if(!empty($code_object) && $code_object->verification_code!="")
    {
	    return false;
    }
    else	
    return true;
}

# Logic to log data from sms verification
function log_pin_code($userid,$pin,$mobile,$auto_verify_type)
{	
	//global $_DB_SUB_CONN;
	require_once('trellian/db.php');
	$sub_conn = trellian_db_connect('submissions', 'www-data');
	$created_date = date('Y-m-d H:i:s');	
	$query = "INSERT INTO ps_user_verification_code_log (user_id,verification_code,mobile,created_date,auto_verify_type) VALUES ($userid,'$pin','$mobile','$created_date','$auto_verify_type')";
	trellian_db_query($sub_conn,$query);	
}

#logic to find number of sms per day
function get_num_log_today($user_id,$auto_type)
{
	#global $_DB_SUB_CONN;
	require_once('trellian/db.php');
	$sub_conn = trellian_db_connect('submissions', 'www-data');
	$today_date = date('Y-m-d');
	$sql = "SELECT COUNT(*) as no FROM ps_user_verification_code_log WHERE created_date::date='".$today_date."' AND user_id=".$user_id." AND auto_verify_type='".$auto_type."'";
	//print $sql;exit;
	$res  = trellian_db_query($sub_conn,$sql);
	$obj = pg_fetch_object($res);
	return $obj->no;	
}
=======

function insert_into_rego_db($order_id){
    
    # As per http://rt.trellian.com/Ticket/Display.html?id=614701#txn-5105560
   
    $rego_dbh = trellian_db_connect('rego', 'rego_website');
    $total_amount=$_REQUEST['product_price'];
    
    $query = " SELECT round($total_amount/rate,2) FROM rate WHERE currency ='USD/AUD'";
    $result =trellian_db_query($rego_dbh,$query);
    list($price_aud) = pg_fetch_row($result);
    
    $query = "SELECT nextval('rego_id_seq'::regclass) as rego_id";
    $result = trellian_db_query($rego_dbh,$query);
    list($rego_id) = pg_fetch_row($result);
    
    $name_first=trim($_REQUEST['firstname']);
    $name_last=trim($_REQUEST['lastname']);
    
    if(isset($_COOKIE["entryID"])){
	$query = "INSERT INTO REGO (id,v_id, rego_name,product_name,price_us,price_aud,order_date,cust_name,cust_email,status,comments,v_status,lang)values("
	    .pg_escape_string($rego_id)
	    .",'".pg_escape_string($_COOKIE["entryID"])."'"
	    .",'".pg_escape_string($_REQUEST['email'])."'"
	    .",'HostedHash'"
	    .",'".pg_escape_string($total_amount)."'"
	    .",'".pg_escape_string($price_aud)."'"
	    .",now()::date"
	    .",'".pg_escape_string($name_first)." ".pg_escape_string($name_last)."'"
	    .",'".pg_escape_string($_REQUEST['email'])."'"
	    .",'Y'"
	    .",'".pg_escape_string($order_id)."'"
	    .",'Y'"
	    .",'en'"
	    .")";
    }
    else{
	$query = "INSERT INTO REGO (id,rego_name,product_name,price_us,price_aud,order_date,cust_name,cust_email,status,comments,v_status,lang)values("
	    .pg_escape_string($rego_id)
	    .",'".pg_escape_string($_REQUEST['email'])."'"
	    .",'HostedHash'"
	    .",'".pg_escape_string($total_amount)."'"
	    .",'".pg_escape_string($price_aud)."'"
	    .",now()::date"
	    .",'".pg_escape_string($name_first)." ".pg_escape_string($name_last)."'"
	    .",'".pg_escape_string($_REQUEST['email'])."'"
	    .",'Y'"
	    .",'".pg_escape_string($order_id)."'"
	    .",'Y'"
	    .",'en'"
	    .")";
    }
    
    $result =trellian_db_query($rego_dbh,$query);
    
    $query = "insert into sub_rego(rego_id,product_name,price_us,price_aud)values(".pg_escape_string($rego_id).",'Account Balance','".pg_escape_string($total_amount)."','".pg_escape_string($price_aud)."');";
    $result =trellian_db_query($rego_dbh,$query);   
}

# send order details to sales team
function send_order_mail_sales($email,$subject,$detail){
    $headers="From: sales@hostedhash.com \n";
    $headers .= 'Bcc: david@trellian.com' . "\r\n";

    # Send mail to sales@trellian.com
    mail('sales@trellian.com','Hostedhash order',$detail,$headers);
   
     
}

# send order confirmation email  to user
function send_order_mail_user($email,$detail,$detail_arr){
    
    # define subject, from e-mail, etc
    $subject = "HostedHash.com Order Confirmation";
    $headers 	= "From: HostedHash.com <sales@hostedhash.com>\r\n";
    $headers 	.= "MIME-Version: 1.0\r\n";
    $headers 	.= "Content-Type: text/html\r\n";

    if($_REQUEST['option_check'] == 'cc option check'){
	$template_text = file_get_contents("/var/www/www.hostedhash.com/lib/templates/en/email/cc_order_confirmation_email.html");
	$template_text = str_replace("%DATE%", date("r"), $template_text);
	$template_text = str_replace("%TO%",$email, $template_text);
	$template_text = str_replace("%ORDERID%",$detail_arr['order_id'], $template_text);
	$template_text = str_replace("%AMOUNT%",number_format($detail_arr['total_amount'],2), $template_text);
	$template_text = str_replace("%ORDER DETAILS%","<br>".preg_replace("#\n#is","<br>",$detail), $template_text);
	$template_text = str_replace("%PAYBOX REF ID%",$detail_arr['pay_box_reference_id'], $template_text);
	$template_text = str_replace("%USERNAME1%",$email, $template_text);
	$template_text = str_replace("%COUNTRY%",$_REQUEST['billing_country'] , $template_text);
	$template_text = str_replace("%TOTAL%",number_format($detail_arr['total_amount'],2), $template_text);
	$template_text = str_replace("%CC_TYPE%",$detail_arr['cc_details']['cc_type'], $template_text);
	$template_text = str_replace("%CC_NUMBER%",'XXXXXXXXXXXX'.substr($detail_arr['cc_details']['cc_number'],-4), $template_text);
	
	if(isset($detail_arr['vat_charge']) && $detail_arr['vat_charge']!=0){
	    $node='
              <tr>
                <td align="right"><strong>VAT :  </strong></td>
                <td align="right"> $%vat% </td>
              </tr>
	    ';
	    $template_text=preg_replace("#(</tbody>\s+<tfoot>)#","$node$1",$template_text);
	    $template_text = str_replace("%vat%",number_format($detail_arr['vat_charge'],2), $template_text);
	}
	if(isset($detail_arr['merchant_fee'])){
	    $node='
              <tr>
                <td align="right"><strong>Credit card surcharge : </strong></td>
                <td align="right"> $%merchant_fee% </td>
              </tr>
	    ';
	    $template_text=preg_replace("#(</tbody>\s+<tfoot>)#","$node$1",$template_text);
	    $template_text = str_replace("%merchant_fee%",number_format($detail_arr['merchant_fee'],2), $template_text);
	}
    }
    elseif(isset($_REQUEST['option_check']) && $_REQUEST['option_check']=='wire option check'){
	$template_text = file_get_contents("/var/www/www.hostedhash.com/lib/templates/en/email/bankwire_order_confirmation_email.html"); 
    }
    
    $template_text = str_replace("%USERNAME%", $_REQUEST['firstname'], $template_text);
    $template_text = str_replace("%ORDER NUMBER%",$detail_arr['order_id'] , $template_text);
    $template_text = str_replace("%ORDER DATE%", date('d-m-Y'), $template_text);
    $template_text = str_replace("%NAME%",$_REQUEST['firstname']." ".$_REQUEST['lastname'] , $template_text);
    $template_text = str_replace("%STREET%",$detail_arr['user_details']['street'], $template_text);
    $template_text = str_replace("%CITY% %ZIP%",$detail_arr['user_details']['city']." ".$detail_arr['user_details']['zip'] , $template_text);
    $template_text = str_replace("%COUNTRY%",$detail_arr['user_details']['country'] , $template_text);
    $template_text = str_replace("%PRODUCT%",$_REQUEST['product_type'] , $template_text);
    $template_text = str_replace("%COST%",number_format($_REQUEST['product_price'],2) , $template_text);
    $template_text = str_replace("%TOTAL%",number_format($_REQUEST['product_price'],2), $template_text);
    
    # For now bitcoin payment option is disabled.
    # Commented code needed later when we include bitcoin payment option
    
    /*
    elseif($_REQUEST['option_check'] == 'bitcoin option check'){
	$template_text = file_get_contents("/var/www/www.hostedhash.com/lib/templates/en/email/bitcoin_order_confirmation_email.html");
    }
    */
      
     mail($email, $subject, $template_text, $headers);
    
    
}
function create_user_account($user_details){
    require_once('trellian/db.php');
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    
    # get random password to create account
    $passwd_str=create_random_passwd();

    # insert details of new user's  username,password
        
    $sql_insert_query = "INSERT INTO ps_user(username,password";
    $sql_insert_query_clause=") VALUES('".pg_escape_string($user_details['email'])."','" . pg_escape_string($passwd_str)."'";
    
    # As per http://phabricator.trellian.com/D400#comment-13
    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5093398
    # set cookie entryID as partner id in respective tables as mentioned
    
    if(isset($_COOKIE['entryID'])){
       $sql_insert_query.=",partner";
       $sql_insert_query_clause.=",'".trim(pg_escape_string($_COOKIE['entryID']))."'";
    }
    $sql_insert_query_clause.=")";
    $sql_insert_query=$sql_insert_query.$sql_insert_query_clause;
	
    trellian_db_query($sub_conn, $sql_insert_query);
    
    # get newly created user id
    $get_user_id = "SELECT currval('ps_user_seq') as last_register_id";
    $result = trellian_db_query($sub_conn, $get_user_id);
    $user_id = pg_fetch_result($result, 0, 'last_register_id');
    $_SESSION["user_id"]=$user_id;

    $username = pg_escape_string(trim($user_details['email']));
    $name = pg_escape_string(trim($user_details['firstname'])." ".trim($user_details['lastname']));
    $password = pg_escape_string(trim($user_details['passwd']));
    
    $fname = pg_escape_string(trim($user_details['firstname']));
    $lname = pg_escape_string(trim($user_details['lastname']));
    $email = pg_escape_string(trim($user_details['email']));
    
    $signup_host='www.hostedhash.com';
    $ip = $_SERVER['REMOTE_ADDR'];
    $Bitcoin_Wallet=$user_details['wallet'];
    $sql_insert_query = "INSERT INTO ps_user_details (user_id,name,email,first_name,last_name,signup_host,signup,ip,activated";
    $values="VALUES('".$user_id."','".$name."','".$email."','".$fname."','".$lname."','".$signup_host."', now(), ". (empty($ip) ? "NULL, " : "'".$ip ."'::inet, ") . "now()";
    if(isset($user_details['option_check']) && $user_details['option_check']=='cc option check'){
	$sql_insert_query.=",street,city,state,country,zip,mobile";
	$street =  pg_escape_string(trim($user_details['addr1']).", ".trim($user_details['addr2']));
	$city =  pg_escape_string(trim($user_details['city']));
	$state =  pg_escape_string(trim($user_details['state']));
	$country = $user_details['billing_country'];
	$zip =  pg_escape_string(trim($user_details['zip']));
	$mobile=$user_details['mobile_no'];
	
	$values.=",'$street','$city','$state','$country','$zip','$mobile'";
	
	if(isset($user_details['user_vat_number']) && trim($user_details['user_vat_number']!='')){
	    $sql_insert_query.=",vat_number";
	    $values.=",'".trim($user_details['user_vat_number'])."'";
	}
    }
    
    # As per http://phabricator.trellian.com/D400#comment-13
    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5093398
    # set cookie entryID as partner id in respective tables as mentioned
    if(isset($_COOKIE['entryID'])){
       $sql_insert_query.=",referral_id";
       $values.=",'".trim(pg_escape_string($_COOKIE['entryID']))."'";
    }
    
    $sql_insert_query.=") ".$values.");";
    trellian_db_query($sub_conn, $sql_insert_query);
    
    # insert bitcoin wallet data in bitcoin_order_details table            
    $sql_insert_query="insert into bitcoin_wallet_details (user_id,Bitcoin_Wallet) values (".pg_escape_string($user_id).",'".pg_escape_string($Bitcoin_Wallet)."')";
    trellian_db_query($sub_conn, $sql_insert_query);
    
    # define subject, from e-mail, etc
    $subject = "HostedHash Login Details";
    $from = "Trellian <sales@trellian.com>";

    $headers 	= "From: HostedHash.com <sales@hostedhash.com>\r\n";
    $headers 	.= "MIME-Version: 1.0\r\n";
    $headers 	.= "Content-Type: text/html\r\n";
    
    # get e-mail templates
    $template_html = file_get_contents("/var/www/www.hostedhash.com/lib/templates/en/email/register_mail.html");
    
    $template_html = str_replace("%username%", $username, $template_html);
    $template_html = str_replace("%password%", $passwd_str, $template_html);
    $template_html = str_replace("%name%", $name, $template_html);

    mail($email, $subject, $template_html, $headers);
       
    $contents = "HostedHash Registration" . "\n";
    $contents .= "FORM URL: https://www.hostedhash.com/order.html" . "\n";
    $contents .= "Firstname: $fname" . "\n";
    $contents .= "Surname: $lname" . "\n";
    $contents .= "Username: $username" . "\n";
    
    if(isset($country) && $country!='')
	$contents .= "Country: $country" . "\n";
    $contents .= "Email: $email" . "\n";
    if(isset($mobile) && $mobile!='')
        $contents .= "Mobile: $mobile" . "\n";
	
    $msgz_to = "david@trellian.com";
    $msgz_subject = 'HostedHash Registration';
    $msgz_header = "From: HostedHash Registration <sales@hostedhash.com>\r\nBcc: david@trellian.com\r\n";
    
    mail($msgz_to,$msgz_subject,$contents,$msgz_header);
    
    
    $_SESSION['new_user']=1;
  
}
function calculate_CC_charge($card_type,$amount){
    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5083182
    # function calculate and returns CC charges 
    $merchantfee =  array("VISA" => "2",'MasterCard' => "2","AMEX" => "4");
    if(!isset($merchantfee[$card_type]))
        return false;
    return $amount*$merchantfee[$card_type]/100; 
}

function create_random_passwd(){
    # http://rt.trellian.com/Ticket/Display.html?id=612601#txn-5125279
    # Create random password
    
    $length=8;
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $passwd_str = ''; $i < $length; $i++) {
	$index = rand(0, $count - 1);
	$passwd_str .= mb_substr($chars, $index, 1);
    }
    return $passwd_str;
}

#Logic to generate 6 digit pin
function generate_pin()
{
	return $pin = sprintf("%s%s%s%s%s%s", rand(1,9), rand(1,9), rand(1,9),rand(1,9),rand(1,9),rand(1,9));
}

# logic to check for unqiue code
function checkForUniqueCode($code)
{
    require_once('trellian/db.php');
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    $query = "SELECT verification_code FROM ps_user_verification_code_log WHERE verification_code='".pg_escape_string($code)."'";
    $code_result_set = trellian_db_query($sub_conn,$query);
    
    $code_object = pg_fetch_object($code_result_set);	
    if(!empty($code_object) && $code_object->verification_code!="")
    {
	return false;
    }
    else	
    return true;
}

# Logic to log data from sms verification
function log_pin_code($userid,$pin,$mobile,$auto_verify_type)
{
    require_once('trellian/db.php');
    $userid=pg_escape_string($userid);
    $pin=pg_escape_string($pin);
    $mobile=pg_escape_string($mobile);
    $auto_verify_type=pg_escape_string($auto_verify_type);
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    $created_date = date('Y-m-d H:i:s');	
    $query = "INSERT INTO ps_user_verification_code_log (user_id,verification_code,mobile,created_date,auto_verify_type) VALUES ($userid,'$pin','$mobile','$created_date','$auto_verify_type')";
    trellian_db_query($sub_conn,$query);	
}

#logic to find number of sms per day
function get_num_log_today($user_id,$auto_type)
{
    require_once('trellian/db.php');
    $user_id=pg_escape_string($user_id);
    $auto_type=pg_escape_string($auto_type);
    $sub_conn = trellian_db_connect('submissions', 'www-data');
    $today_date = date('Y-m-d');
    $sql = "SELECT COUNT(*) as no FROM ps_user_verification_code_log WHERE created_date::date='".$today_date."' AND user_id=".$user_id." AND auto_verify_type='".$auto_type."'";
    $res  = trellian_db_query($sub_conn,$sql);
    $obj = pg_fetch_object($res);
    return $obj->no;	
}
>>>>>>> .r81067
?>

