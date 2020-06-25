<?php 

class Async extends AdminController {
    
	function __construct(){
        parent::__construct();
        $this->load->library('globalvalue');
        
    }
    //$lastlive1 = $this->globalvalue->lastlive();
    // $menitlalu = date('Y-m-d H:i:s', strtotime("-1 minutes"));
    // $tglskrang = date('Y-m-d');

	public function loadactiveuser(){
        /*$this->load->database();
        $c1 = $this->db->query("SELECT * FROM `live` WHERE `time_live` > '".$this->globalvalue->menitlalu()."' AND `logout`=1");
        $c2 = $this->db->query("SELECT DISTINCT `id_device` FROM `live` WHERE `time_open` LIKE '".$this->globalvalue->tglskrang()."%' ");
        $c3 = $this->db->query("SELECT SUM(TIMESTAMPDIFF(MINUTE, `time_open`, `time_live`)) FROM live WHERE time_open LIKE '".$this->globalvalue->tglskrang()."%'");

        $totalonline = $c1->num_rows();
        $totalhariini = $c2->num_rows();
        $data['f_c3'] = $c3->result(); 
        print_r($data['f_c3']);*/
        //$f_c3 = mysqli_fetch_array($c3);
        //echo $totalonline.",".$totalhariini.",".$f_c3[0]/*.",".$f_c4[0]*/;
        //echo "4,2,0";
        echo $this->globalvalue->batasuser();
    }

    public function loadpengunjunghariini(){

    }

    public function loadjambaca(){

    }

    public function loadseminggu(){
        
    }
}