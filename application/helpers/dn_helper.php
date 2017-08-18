<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI = & get_instance();
$CI->phrases = $CI->config->item('words');
/****** Send Email ******/
if ( ! function_exists('sendEmail'))
{ 
 function sendEmail($from = null, $to = null, $sub = null, $msg = null, $cc = null, $bcc = null, $attachment = null,$multi_user=null)
  	{

		
		/**sendEmail through Webmail settings **/
		if($msg != "") {
			
			$CI = & get_instance();
			$CI->load->library('email');
		//	$CI->email->clear();
			// $config = Array(
			// 			'protocol' 	=> 'smtp',
			// 			'smtp_host' => $CI->config->item('emailSettings')->smtp_host,
			// 			'smtp_port' => $CI->config->item('emailSettings')->smtp_port,
			// 			'smtp_user' => $CI->config->item('emailSettings')->smtp_user,
			// 			'smtp_pass' => $CI->config->item('emailSettings')->smtp_password,
			// 			'charset' 	=> 'utf-8',
			// 			'mailtype' 	=> 'html',
			// 			'newline' 	=> "\r\n",
			// 			'wordwrap' 	=> TRUE
			// 		);		

			if($CI->config->item('emailSettings')->mail_config == "webmail"){


			$result = $CI->email
                ->from($CI->config->item('emailSettings')->smtp_user, $CI->config->item('site_settings')->site_title)
                ->reply_to($CI->config->item('emailSettings')->smtp_user)    // Optional, an account where a human being reads.
                ->to($to)
                ->subject($sub)
                ->message($msg)
                ->send();
                return $result;
		}
		
		/**end of  sendEmail through Web mail settings**/
		else {
		$CI->load->config('mandrill');
		
		$CI->load->library('mandrill');	
		
		$mandrill_ready = NULL;
		
		try {
		    $CI->mandrill->init( $CI->config->item('mandrill_api_key') );
		    $mandrill_ready = TRUE;
		} catch(Mandrill_Exception $e) {
		    $mandrill_ready = FALSE;
		}

		if( $mandrill_ready ) {

		    //Send us some email!
		    $to_list =  array(array('email' => $to ));
		    if($multi_user)
		    $to_list = $to;
		    
		    $email = array(
		        'html' => $msg, //Consider using a view file
				'text' => '',
		        'subject' => $sub,
		        'from_email' => $from,
		        'from_name' => $CI->config->item('site_settings')->site_title,
		        'to' => $to_list,
		        'attachments' =>$attachment
		        );

				$result = $CI->mandrill->messages_send($email);
				//print_r($result);
				if($result[0]['status']=='sent')
				return TRUE;
				else
				return FALSE;
		}
	}
    }else {
		return false;
	}
}

	
	
	
}



if ( ! function_exists('cleanString'))
{
	function cleanString($str) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

	return $clean;
}
}

//Prepare DDL
if( ! function_exists('prepareDropDown')){
	function prepareDropDown($table_name='', $isSelect='',$col_value='',$col_text, $cond = array()){
		
		$CI =& get_instance();
		
		$catRecords = $CI->base_model->fetch_records_from(
		$table_name, is_array($cond)? $cond : '' );
		if($isSelect) {
			$catOptions[''] = 'Select';
		}
		
		foreach ($catRecords as $key => $val) {
		    $catOptions[$val->$col_value]=$val->$col_text;	
		}
		
	
		return $catOptions;
	}
}

//Get User INfo
if( ! function_exists('getUserRec')){
	function getUserRec($userId=''){
		
		$CI =& get_instance();
		$user = $CI->ion_auth->user()->row();
		if($userId!='' && is_numeric($userId)) {
			$user = $CI->ion_auth->user($userId)->row();
		}
		
		return $user;
	}
}



//GET IMAGE PATH
if( ! function_exists('imageExists')){
	function imageExists($name='',$path=''){
		
		$CI =& get_instance();
		$default_path = base_url()."assets/images/blank.png";
		if($name=='' || $path=='')
		return $default_path;
		
		$image_path = base_url().$path.$name;
		return $image_path;
		
	}
}



//stringtoID
if( ! function_exists('stringToID')){
	function stringToID($table_name='',$col_name='',$col_value=''){
		
		$CI =& get_instance();
	
		$primary_key = $CI->base_model->run_query("SHOW KEYS FROM ".$CI->db->dbprefix($table_name)." WHERE Key_name = 'PRIMARY' ");
	
		if(count($primary_key) > 0) 
		$primary_key_column_name = $primary_key[0]->Column_name;
		else
			return false;
		
		
		$query = $CI->db->query("SELECT ".$primary_key_column_name." FROM ".$CI->db->dbprefix($table_name)." WHERE ".$col_name." = '".$col_value."' ")->result();
		
		if(count($query)>0) {
		foreach($query[0] as $result) {
			return $result;
		} 
		}else
			return false;
		

	}
}



//IdtoString
if( ! function_exists('idToString')){
	function idToString($table_name='',$col_name='',$primary_key_value=''){
		
		$CI =& get_instance();
		
		
		
		$primary_key = $CI->base_model->run_query("SHOW KEYS FROM ".$CI->db->dbprefix($table_name)." WHERE Key_name = 'PRIMARY' ");
		
		if(count($primary_key) > 0)
		$primary_key_column_name = $primary_key[0]->Column_name;
		else
			return false;
		
		$query = $CI->db->query("SELECT ".$col_name." FROM ".$CI->db->dbprefix($table_name)." WHERE ".$primary_key_column_name."='".$primary_key_value."'  ")->result();
		
		if(count($query)>0) {
		foreach($query[0] as $result) {
			return $result;
		}
		}else
			return false;

	}
}



//Get Records From Table
if( ! function_exists('getRecsTable')){
	function getRecsTable($table_name='', $cond = array(),$order_by_column=''){
		
		$CI =& get_instance();
		
		$records = $CI->base_model->fetch_records_from(
		$table_name, is_array($cond)? $cond : '','',$order_by_column );
		
		return $records;
	}
}

	
//Get Records From Table
if( ! function_exists('getUniqueId')){
	function getUniqueId(){
		
		return uniqid();
	}
}

//Get User Type
if( ! function_exists('getUserType')){
	function getUserType($user_id=''){
		$CI =& get_instance();
		$user_type='';
		if($user_id=='') {
			$user_id = getUserRec()->id;
		}
          	$user_groups = $CI->ion_auth->get_users_groups($user_id)->result();
          	
          	switch($user_groups[0]->id){
			  	case 1: $user_type='admin';
			  		break;
			  	case 2: $user_type='member';
			  		break;
			  	default:
			  		break;
			  } 
			  return $user_type;
	}
}


//Get User Type
if( ! function_exists('getTemplate')){
	function getTemplate($user_id=''){
		$CI =& get_instance();
		$user_type='';
		if($user_id=='') {
			$user_id = getUserRec()->id;
		}
          	$user_groups = $CI->ion_auth->get_users_groups($user_id)->result();
          	
          	switch($user_groups[0]->id){
			  	case 1: $user_type='admin';
			  		break;
			  	case 2: $user_type='member';
			  		break;
			  	default:
			  		break;
			  } 
			  return $user_type.'_template';
	}
}




//Get Records From Table Order by Given Column
if( ! function_exists('getRecsOrderby')){
	function getRecsOrderby($table_name='', $cond = array(),$order_by_column='',$order_type='asc'){
		
		
		$CI =& get_instance();
	
		$records = $CI->base_model->fetch_records_from($table_name,is_array($cond)? $cond : '','*',$order_by_column,$order_type);
		
		
		return $records;
	}
}


if ( ! function_exists('check_access'))
	{
		function check_access( $type = 'admin')
		{
			$CI	=&	get_instance();
			if (!$CI->ion_auth->logged_in())
			{
				$CI->prepare_flashmessage($CI->phrases['please login'],2);
				redirect(URL_LOGIN, 'refresh');
			}
			elseif($type == 'admin')
			{
				if (!$CI->ion_auth->is_admin())
				{
					$CI->prepare_flashmessage($CI->phrases['unauthorised user'],2);
					redirect(getUserType());
				}
			}
			
		}
	}

?>