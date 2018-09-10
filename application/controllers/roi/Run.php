<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Run extends CI_Controller {

	public function __construct()
	{
		parent::__construct(); 
		//wget https://cryptoroyal.co/account/roi/run/bonus_profit_7days

	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function bonus_profit_7days()
	{
		echo $next_profit_date 	=  date('Y-m-d', strtotime('+7 days', strtotime( sekarang() )));

		
		//cek db stacking
		$jml = 0	;
		$this->db->join('tb_users', 'id = stc_userid', 'left');
		$this->db->join('tb_package', 'package_id = stc_package', 'left');
		$this->db->where('stc_date_end >= ', sekarang());
		$ge = $this->db->get('tb_stacking');
		//die(json_encode($ge->result()));
		if ($ge->num_rows() > 0){ 
			foreach ($ge->result() as $get_stc) { 
				$userdata = userdata(array('id' => $get_stc->stc_userid));
				die(var_dump($userdata->next_profit >= $next_profit_date));
				if ($userdata->next_profit >=  $next_profit_date){
					echo $bonus = $get_stc->stc_amount * ($get_stc->package_profit/100);
					if ($get_stc->rollover == '0'){
						$this->bonusmodel->insert_pasif_mode2($get_stc->stc_userid,$bonus);
					}else{
						$this->bonusmodel->insert_pasif($get_stc->stc_userid,$bonus);
					}
					//update next Profit
					$this->db->update('tb_users', [ 'next_profit' => $next_profit_date ], [ 'id' => $userdata->id ]);
				}
			}
		}

		//ini untuk kembalian 
		$jml2 = 0; 
		$this->db->where('stc_date_end <= ', $next_profit_date);
		$ge = $this->db->get('tb_stacking');
		if ($ge->num_rows() > 0){
			foreach ($ge->result() as $key) {
				$bonus = $key->stc_amount * (25/100); 
				$this->bonusmodel->insert_pasif($key->stc_userid,$bonus,'Capital Back After Done Staking'); 
			}
		} 
		
	}

	public function rollover()
	{
		$this->load->model('mainmodel');
		$this->mainmodel->Always_Load();
	}
}