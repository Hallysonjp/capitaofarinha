<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MY_Controller
{
	/*
	| -----------------------------------------------------
	| PRODUCT NAME: 	RESTAURENT APP
	| -----------------------------------------------------
	| AUTHOR:			CONQUERORS SOFTWARE TECHNOLOGIES PVT LTD
	| -----------------------------------------------------
	| EMAIL:			samson@conquerorstech.net
	| -----------------------------------------------------
	| COPYRIGHTS:		CONQUERORS SOFTWARE TECHNOLOGIES PVT LTD
	| -----------------------------------------------------
	| WEBSITE:			http://conquerorstech.net
	|                   http://conquerorstech.co.za
	| -----------------------------------------------------
	|
	| MODULE: 			SETTINGS
	| -----------------------------------------------------
	| This is settings module controller file.
	| -----------------------------------------------------
	*/
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('base_model');
		$this->load->library('upload');
		$this->form_validation->set_error_delimiters(
		$this->config->item('error_start_delimiter', 'ion_auth') , 
		$this->config->item('error_end_delimiter', 'ion_auth'));

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ? 
		$this->load->library('mongo_db') : $this->load->database();
		$this->lang->load('auth');
		$this->load->helper('language');
		check_access(ADMIN);
	}

	/*** FUNCTION FOR SITE SETTGINS***/
	function app_settings()
	{
				
	$this->data['message'] 	= ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'));
		if ($this->input->post()) 
		{
			/*echo "<pre>";
			print_r($this->input->post()); die();	*/
			$this->form_validation->set_rules(
			'site_title', 
			$this->phrases['site title'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'sitename', 
			$this->phrases['site name'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'address', 
			$this->phrases['address'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'city', 
			$this->phrases['city'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'state', 
			$this->phrases['state'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'country', 
			$this->phrases['country'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'latitude', 
			$this->phrases['latitude'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'longitude', 
			$this->phrases['longitude'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'zip', 
			$this->phrases['zip code'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'phone', 
			$this->phrases['phone'], 
			'xss_clean|required|min_length[10])|max_length[11]');
			$this->form_validation->set_rules(
			'portal_email', 
			$this->phrases['contact email'], 
			'xss_clean|required|valid_email');
			$this->form_validation->set_rules(
			'land_line', 
			$this->phrases['land line'], 
			'xss_clean');
			$this->form_validation->set_rules(
			'fax', 
			$this->phrases['fax'], 
			'xss_clean');
			$this->form_validation->set_rules(
			'language_id', 
			$this->phrases['select language'], 
			'xss_clean|required');
			$this->form_validation->set_rules(
			'design_by', 
			$this->phrases['design by'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'rights_reserved_content', 
			$this->phrases['rights reserved'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'ios_url', 
			$this->phrases['ios url'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'android_url', 
			$this->phrases['android url'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'from_time', 
			$this->phrases['from time'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'to_time', 
			$this->phrases['to time'], 
			'required|xss_clean');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if (!empty($_FILES['userfile']['name'])) {
				$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				
				if (($ext != "gif") && ($ext != "jpg") && ($ext != "png") && ($ext != "jpeg")) {
					$msg = (isset($this->phrases['invalid file'])) ? $this->phrases['invalid file'] : "Invalid File";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_SITE_SETTINGS);
				}
			}

			if ($this->form_validation->run() 	== TRUE	) {
				
				$inputdata['site_title'] 		= $this->input->post('site_title');
				$inputdata['site_name'] 		= $this->input->post('sitename');
				$inputdata['address'] 			= $this->input->post('address');
				$inputdata['city'] 				= $this->input->post('city');
				$inputdata['state'] 			= $this->input->post('state');
				$inputdata['country'] 			= $this->input->post('country');
				$inputdata['longitude'] 		= $this->input->post('longitude');
				$inputdata['latitude'] 			= $this->input->post('latitude');
				$inputdata['zip'] 				= $this->input->post('zip');
				$inputdata['phone'] 			= $this->input->post('phone');
				$inputdata['from_time'] 		= $this->input->post('from_time');
				$inputdata['to_time'] 			= $this->input->post('to_time');
				$inputdata['land_line'] 		= $this->input->post('land_line');
				$inputdata['fax'] 				= $this->input->post('fax');
				$inputdata['portal_email'] 		= $this->input->post('portal_email');
				$inputdata['language_id'] 		= $this->input->post('language_id');
				$inputdata['currency'] 			= $this->input->post('currency');
				$inputdata['currency_symbol'] 	= $this->input->post('currency_symbol');
				$inputdata['ios_url'] 			= $this->input->post('ios_url');
				$inputdata['android_url'] 		= $this->input->post('android_url');
				$inputdata['design_by'] 		= $this->input->post('design_by');
				$inputdata['rights_reserved_content'] = $this->input->post(
				'rights_reserved_content');
							
				$inputdata['facebook_api'] 		= $this->input->post('facebook_api');
				$inputdata['google_api'] 		= $this->input->post('google_api');
				
				$where['id'] 					= $this->input->post('update_record_id');
				
				if ($this->base_model->update_operation(
				$inputdata, TBL_SITE_SETTINGS, $where)) 
				{
					if (!empty($_FILES['userfile']['name'])) {
						$config['upload_path'] 	 = IMG_SITE_LOGO;
						$config['allowed_types'] = ALLOWED_TYPES;
						$config['over_write']    = 'TRUE';
						$config['file_name'] 	 = 'site_logo.'. $ext;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						
						if (!$this->upload->do_upload()) {
							$this->prepare_flashmessage(
							$this->upload->display_errors() , 1);
							redirect(URL_SITE_SETTINGS,REFRESH);
						}
						else {
							$input1['site_logo']= 'site_logo.'. $ext;
							$this->base_model->update_operation(
							$input1, TBL_SITE_SETTINGS, $where);
							$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
							$this->prepare_flashmessage($msg, 0);
							redirect(URL_SITE_SETTINGS,REFRESH);
						}
					}

					$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_SITE_SETTINGS,REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_SITE_SETTINGS,REFRESH);
				}
			}
			else
			{
				$this->prepare_flashmessage(validation_errors(),1);
				redirect(URL_SITE_SETTINGS,REFRESH);
			}
		}
		
		$site_settings 	= $this->base_model->fetch_records_from(TBL_SITE_SETTINGS);
		if (count($site_settings) > 0) 
			$this->data['site_settings'] 		= $site_settings[0];
		else 
			$this->data['site_settings'] 		= array();
		
		// LANGUAGE OPTIONS
		$lang_options 							= array('' => $this->phrases['select language']);
		$languages 								= $this->base_model->fetch_records_from(TBL_LANGUAGES,array('status'=>'Active'));
		foreach($languages as $row):
			$lang_options[$row->id] 			= ucfirst($row->lang_name);
		endforeach;
		
		// CURRENCY OPTIONS
		
		$currency_options  = array(''=>$this->phrases['select currency']);
		
		$currencies = $this->base_model->fetch_records_from(TBL_CURRENCY);
		foreach($currencies as $row):
			$currency_options[$row->currency_code_alpha] = ucfirst($row->currency_name);
		endforeach;
		
		$this->data['lang_options'] 			= $lang_options;
		$this->data['currency_options'] 		= $currency_options;
		$this->data['active_class'] 			= ACTIVE_MASTER_SETTINGS;
		$this->data['title'] 					= (isset($this->phrases['app settings'])) ? $this->phrases['app settings'] : "App Settings";
		$this->data['content'] 					= PAGE_SITE_SETTINGS;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	
	/*** FUNCTION FOR EMAILSETTINGS***/
	public function email_settings()
	{
		
		$this->data['message'] 					= (validation_errors()) ? 
		validation_errors() : $this->session->flashdata('message');
		
		if ($this->input->post('update_record_id')) {
			
			$this->form_validation->set_rules(
			'mail_config', 
			$this->phrases['web mail'],
			 'required');
			if($this->input->post('mail_config')=='mandrill'){
				$this->form_validation->set_rules(
				'api_key',
				$this->phrases['api key'],
				'required');
			}else{
					$this->form_validation->set_rules(
				'smtp_host', 
				$this->phrases['host'], 
				'trim|required');
				$this->form_validation->set_rules(
				'smtp_user', 
				$this->phrases['email'], 
				'trim|required|xss_clean');
				$this->form_validation->set_rules(
				'smtp_port', 
				$this->phrases['port'], 
				'trim|required');
			}
			
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() 	== TRUE	) {
				
				$inputdata['smtp_host'] 		= $this->input->post('smtp_host');
				$inputdata['smtp_user'] 		= $this->input->post('smtp_user');
				$inputdata['smtp_password'] 	= $this->input->post('smtp_password');
				$inputdata['smtp_port'] 		= $this->input->post('smtp_port');
				$inputdata['api_key'] 			= $this->input->post('api_key');
				$inputdata['mail_config'] 		= $this->input->post('mail_config');
				
				$where['id'] 					= $this->input->post('update_record_id');
				if ($this->base_model->update_operation(
				$inputdata, TBL_EMAIL_SETTINGS, $where)) {
					$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_EMAIL_SETTINGS,REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_EMAIL_SETTINGS,REFRESH);
				}
			}
		}

		$email_settings 						= $this->base_model->fetch_records_from(
		TBL_EMAIL_SETTINGS);
		if (count($email_settings) > 0) 
			$this->data['email_settings'] 		= $email_settings[0];
		else $this->data['email_settings'] 		= array();
		
		$this->data['active_class'] 			= ACTIVE_MASTER_SETTINGS;
		$this->data['title'] 					= (isset($this->phrases['email settings'])) ? $this->phrases['email settings'] : "Email Settings";
		$this->data['content'] 					= PAGE_EMAIL_SETTINGS;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	
	
	/****** Change Language ******/
	function change_language($language_id = null)
	{		
		if($language_id > 0) {
			
			$check_strings = $this->base_model->fetch_records_from(TBL_MULTI_LANG,array('lang_id'=>$language_id,'phrase_type'=>'web'));
			
			
			if(count($check_strings)>0){
					if($this->base_model->update_operation(array('language_id' => $language_id), 'site_settings')) {
					$msg = (isset($this->phrases['language changed successfully'])) ? $this->phrases['language changed successfully'] : "Language Changed Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_ADMIN);				
				}
			}else{
				$language_name = $this->base_model->fetch_records_from(TBL_LANGUAGES,array('id'=>$language_id));
				$msg = "Please update ".$language_name[0]->lang_name." language strings";
					$this->prepare_flashmessage($msg, 2);
					redirect(URL_ADMIN);	
			}
			
		}
	}
	
	/****** Paypal Settings ******/
	function paypal_settings()
	{
		
		if ($this->input->post()) 
		{
			$this->form_validation->set_rules(
			'PayPalEnvironmentProduction', 
			$this->phrases['paypal environment production'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'PayPalEnvironmentSandbox', 
			$this->phrases['paypal environment sandbox'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'merchantName', 
			$this->phrases['merchant name'], 
			'required|xss_clean');
			$this->form_validation->set_rules(
			'merchantPrivacyPolicyURL', 
			$this->phrases['merchant privacy policy URL'], 
			'required|trim|url|xss_clean');
			$this->form_validation->set_rules(
			'merchantUserAgreementURL', 
			$this->phrases['merchant user agreement URL'], 
			'required|trim|url|xss_clean');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() 	== TRUE	) 
			{
				$inputdata['PayPalEnvironmentProduction'] 	= $this->input->post('PayPalEnvironmentProduction');
				$inputdata['PayPalEnvironmentSandbox'] 	= $this->input->post('PayPalEnvironmentSandbox');
				$inputdata['merchantName'] 			    = $this->input->post('merchantName');
				$inputdata['merchantPrivacyPolicyURL'] 	= $this->input->post('merchantPrivacyPolicyURL');
				$inputdata['merchantUserAgreementURL'] 	= $this->input->post('merchantUserAgreementURL');
				$inputdata['currency'] 					= $this->input->post('currency');
				$inputdata['account_type'] 				= $this->input->post('account_type');
				$inputdata['status'] 					= $this->input->post('status');
				$where['id'] 							= $this->input->post('update_rec_id');
				if ($this->base_model->update_operation(
				$inputdata, TBL_PAYPAL_SETTINGS, $where)) {
					$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_PAYPAL_SETTINGS,REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_PAYPAL_SETTINGS,REFRESH);
				}
			}
		}
		$this->data['message'] 	= $this->session->flashdata('message');
		
		$paypal_settings = $this->base_model->fetch_records_from(TBL_PAYPAL_SETTINGS);
		
		$currency_options  = array(''=>$this->phrases['select currency']);
		
		$currencies = $this->base_model->fetch_records_from(TBL_CURRENCY);
		foreach($currencies as $row):
			$currency_options[$row->currency_code_alpha] 			= ucfirst($row->currency_name);
		endforeach;	
	
		if (count($paypal_settings) > 0) 
			$this->data['paypal_settings'] 	= $paypal_settings[0];
		else 
			$this->data['paypal_settings'] 	= array();
		
		 $this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');	
		$this->data['currency_options'] 	= $currency_options;
		
		$this->data['active_class'] 		= ACTIVE_MASTER_SETTINGS;
		$this->data['title'] 				= (isset($this->phrases['paypal settings'])) ? $this->phrases['paypal settings'] : 'Paypal Settings';
		$this->data['content'] 				= PAGE_PAYPAL_SETTINGS;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	 
	public function email_templates($param = '', $param1 = '')
	{
		$email_templates 						= getRecsTable(TBL_EMAIL_TEMPLATES);
		$this->data['email_templates'] 			= count($email_templates)>0 ? $email_templates : array();
		$this->data['title'] 				= (isset($this->phrases['email template settings'])) ? $this->phrases['email template settings'] : 'Email Template Settings';
			
		$this->data['content'] 					= PAGE_EMAIL_TEMPLATES;
		
		if ($param == "edit") {
		
			$template							= getRecsTable(TBL_EMAIL_TEMPLATES,array('id'=>$param1));
			$this->data['template_info'] 		= count($template) > 0 ? $template[0] : array();
			
			$this->data['opt']					= UPDATE;
			$this->data['title'] 				= (isset($this->phrases['edit email template'])) ? $this->phrases['edit email template'] : 'Edit Email Template Settings';
			$this->data['content'] 				= PAGE_EDIT_EMAIL_TEMPLATE;
		}
		elseif ($param == "update" || $this->input->post('submit') == 'update') {
			$this->form_validation->set_rules(
			'email_template', 
			$this->phrases['email template'], 
			'required|xss_clean');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() == True) {
				
				$inputdata['email_template'] 	= $this->input->post('email_template');
				$inputdata['status'] 			= $this->input->post('status');
				
				$where['id'] 					= $this->input->post('id');
				if ($this->base_model->update_operation($inputdata, TBL_EMAIL_TEMPLATES, $where)) {
					$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_EMAIL_TEMPLATE_SETTINGS,REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_EMAIL_TEMPLATE_SETTINGS,REFRESH);
				}
			}
			
			$template 							= getRecsTable(TBL_EMAIL_TEMPLATES,array('id'=>$this->input->post('id')));
			$this->data['template_info'] 		= count($template) > 0 ? $template[0] : array();
			
			$this->data['opt']					= UPDATE;
			
			$this->data['content'] 				= PAGE_EDIT_EMAIL_TEMPLATE;
		}
		 $this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		 
		 $this->data['active_class'] 		= ACTIVE_MASTER_SETTINGS;
		 $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	

}
?>