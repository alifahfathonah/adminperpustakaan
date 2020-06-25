<?php 

/**
 * 
 */
class Globalvalue
{
	protected $batasuser = '50';
	public function __construct(){
		$batasuser ='50';
		//$lastlive = "-1 minutes";
		/*
		$menitlalu = date('Y-m-d H:i:s', strtotime("-1 minutes"));
    	$tglskrang = date('Y-m-d');
    	*/
    }

    function batas(){
    	$batas = '60';
    	return $batas;
    }

    //  Pass array as an argument to constructor function
    public function __construct($config = array()) {

    //  Create associative array from the passed array
    foreach ($config as $key => $value) {
    $data[$key] = $value;
    }

    // Make instance of CodeIgniter to use its resources
    $CI = & get_instance();

    // Load data into CodeIgniter
    $CI->load->vars($data);
    }

    
}
/*
set value yang di sini harus sama yang di bookless
bookless.id/management/m_upuser.php

batas max user dan batas terakhir update script (kalau tidak update dianggap offline)
*/
