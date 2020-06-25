

<?php
//Global Variabel Navbar
$CI = & get_instance();
// Create customized config variables

//Data jumlah log
$data = $CI->db->select('*')
                ->from('table_log')
                ->where('read_status',0)
                ->get()->num_rows();
$config['jumlah'] = $data;

// Data Log
$notif = $CI->db->select('*')
                ->from('table_log')
                ->where('read_status',0)
                ->order_by('log_id','desc')
                ->limit('8','0')
                ->get();
$config['data'] = $notif;

$online = $CI->db->query('SELECT iduser FROM live WHERE time_open LIKE "%'.date('Y-m-d',time()).'%" GROUP BY iduser');

$config['user_online'] = $online;
?>

