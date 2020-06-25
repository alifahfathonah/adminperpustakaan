<?php 
//definisi kode log_type session pada saat.
// 0 = login;
// 1 = logout;
// 2 = add data;
// 3 = edit data;
// 4 = hapus data;
// 5 = gagal;
function log_session($tipe="",$str="")
{

	$CI =& get_instance();
	
	if (strtolower($tipe) == "login") {
		$log_type = 0;
		$label = '<span class="label label-success">Login</span>';
	}elseif (strtolower($tipe) == "logout" ) {
		$log_type = 1;
		$label = '<span class="label label-warning">Logout</span>';	
	}elseif (strtolower($tipe) == "tambah" ) {
		$log_type = 2;
		$label = '<span class="label label-primary">Tambah</span>';
	}elseif (strtolower($tipe) == "edit" ) {
		$log_type = 3;
		$label = '<span class="label label-info">Edit</span>';
	}elseif (strtolower($tipe) == "hapus" ) {
		$log_type = 4;
		$label = '<span class="label label-danger">Hapus</span>';
	}elseif (strtolower($tipe) == "gagal" ) {
		$log_type = 5;
		$label = '<span class="label label-warning">Gagal</span>';
	}

	//parameter data
	$param['log_user'] = $CI->nativesession->get('username');
	$param['log_tipe'] = $log_type;
	$param['log_desc'] = $label.' '.$str;

	$sql = $CI->db->insert('table_log',$param);
	return $CI->db->affected_rows($sql);
	// $CI->login->insert_data($param);

}

/*function log_activity()
{
	$CI =& get_instance();
	$CI->load->model('Model_login','login',true);

	$activity = $CI->login->logActivity();
	return $activity;
}*/