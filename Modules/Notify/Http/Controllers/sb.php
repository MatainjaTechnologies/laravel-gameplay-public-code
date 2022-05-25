<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
The follwing tasks are handled by this controller:-
1. Check user credentials when loggin in.
2. Destroy user session when logged out. 
*/
class Notify extends CI_controller {
	
	/*
	"__construct()" function is used for loading the
	required models, libraries and helpers.
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->reconnect();
		$this->load->model(array("notify_model"));
		$this->load->library('form_validation');
		$this->load->helper('url');
	}
	
	public function index(){
		$id = $this->input->get('id');
		$msisdn = ltrim($this->input->get('msisdn'), '0');
		$event = $this->input->get('event');
		
		$status = $this->input->get('status');
		$timestamp = $this->input->get('timestamp');
		$password = mt_rand(100000,999999);
		if((isset($id) && is_numeric($id)) && (isset($msisdn) && is_numeric($msisdn)) && (isset($event) && is_numeric($event)) && (isset($status) && is_numeric($status) && $status==1) && (isset($timestamp) && is_numeric($timestamp))){
			$subscribe_data = array();
			$subscribe_date = date('Y-m-d H:i:s', strtotime($timestamp));
			$password = mt_rand(1000,9999);
			if($event==7){
				$check_subscriber = $this->notify_model->check_subscriber($msisdn);	
				if(empty($check_subscriber))		
				{	
					$nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 4 day'));
					$subscribe_data = array(
												'phone_no' => $msisdn,
												'password' => md5($password),
												'package' => 1,
												'status' 		=> 'yes', 
												'lastcharge' => $subscribe_date,
												'nextcharge' => $nextcharge,
												'token' => 6,
												'token_status' => 1
											);
					$insert_user_data = $this->notify_model->insert_user_data($subscribe_data);
					if($insert_user_data){
						echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
					}else{
						echo json_encode(array('state'=>'FAILED','error'=>'Data not inserted.','params'=>$_GET));
					}
				}else{
					echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is ACTIVE.','params'=>$_GET));
				}
			}else if($event==1){
				$check_subscriber = $this->notify_model->check_subscriber($msisdn);			
				if(empty($check_subscriber))		
				{
					$nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 2 day'));
				$subscribe_data = array(
											'phone_no' => $msisdn,
											'password' => md5($password),
											'package' => 1,
											'status' 		=> 'yes', 
											'lastcharge' => $subscribe_date,
											'nextcharge' => $nextcharge,
											'token' => 2,
											'token_status' => 1
										);
				$insert_user_data = $this->notify_model->insert_user_data($subscribe_data);
				if($insert_user_data){
					echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
				}else{
					echo json_encode(array('state'=>'FAILED','error'=>'Data not inserted.','params'=>$_GET));
				}
				}else{
					echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is ACTIVE.','params'=>$_GET));
				}
			}else if($event==2){
				$check_subscriber = $this->notify_model->check_subscriber($msisdn);			
				if(empty($check_subscriber))		
				{
					$nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 8 day'));
					$subscribe_data = array(
												'phone_no' => $msisdn,
												'password' => md5($password),
												'package'  => 2,
												'status'   => 'yes', 
												'lastcharge' => $subscribe_date,
												'nextcharge' => $nextcharge,
												'token' => 12,
												'token_status' => 1
											);
					$insert_user_data = $this->notify_model->insert_user_data($subscribe_data);
					if($insert_user_data){
						echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
					}else{
						echo json_encode(array('state'=>'FAILED','error'=>'Data not inserted.','params'=>$_GET));
					}
				}else if(!empty($check_subscriber) && $check_subscriber[0]['status']=="no"){
					$nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 8 day'));
					$renew_data = array(
											'password' => md5($password),
											'package' => 2,
											'status' => 'yes', 
											'lastcharge' => $subscribe_date,
											'nextcharge' => $nextcharge,
											'token' => 12,
											'token_status' => 1
										);
					$renew_user = $this->notify_model->renew_user($msisdn,$renew_data);
					if($renew_user){
						echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
					}else{
						echo json_encode(array('state'=>'FAILED','error'=>'Data not updated.','params'=>$_GET));
					}
				}else{
					echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is ACTIVE.','params'=>$_GET));
				}
			}else if($event==3){
				$check_subscriber = $this->notify_model->check_subscriber($msisdn);
				if(!empty($check_subscriber) && $check_subscriber[0]['status']=="no"){
					$nextcharge = date('Y-m-d H:i:s',strtotime($subscribe_date.' + 1 day'));
					$renew_data = array(
											'password' => md5($password),
											'package' => 1,
											'status' => 'yes', 
											'lastcharge' => $subscribe_date,
											'nextcharge' => $nextcharge,
											'token' => 1,
											'token_status' => 1
										);
					$renew_user = $this->notify_model->renew_user($msisdn,$renew_data);
					if($renew_user){
						echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
					}else{
						echo json_encode(array('state'=>'FAILED','error'=>'Data not updated.','params'=>$_GET));
					}
				}else{
					echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is ACTIVE.','params'=>$_GET));
				}
			}else if($event==5){
				$check_subscriber = $this->notify_model->check_subscriber($msisdn);
				if(!empty($check_subscriber) && $check_subscriber[0]['status']=="yes"){
					$update_status = $this->notify_model->update_user_status($msisdn);
					if($update_status){
						echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
					}else{
						echo json_encode(array('state'=>'FAILED','error'=>'Data not updated.','params'=>$_GET));
					}
				}else{
					echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is INACTIVE.','params'=>$_GET));
				}
			}else if($event==9){
				$check_subscriber = $this->notify_model->check_subscriber($msisdn);
				if(!empty($check_subscriber) && $check_subscriber[0]['status']=="yes"){
					$update_status = $this->notify_model->update_user_status($msisdn);
					if($update_status){
						echo json_encode(array('state'=>'SUCCESS','params'=>$_GET));
					}else{
						echo json_encode(array('state'=>'FAILED','error'=>'Data not updated.','params'=>$_GET));
					}
				}else{
					echo json_encode(array('state'=>'FAILED','error'=>'MSISDN is INACTIVE.','params'=>$_GET));
				}
			}
		}else{
			echo json_encode(array('state'=>'FAILED','error'=>'Enter valid params.','params'=>$_GET));
		}
	}

}
