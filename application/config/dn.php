<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


		$CI =& get_instance();
     	$CI->load->database();
		$CI->load->model('base_model');
		$CI->load->library('ion_auth');
		$CI->load->helper('inflector');
		
		/****** Get Site Settings ******/
		$results = $CI->db->get_where('site_settings')->result();

		if(isset($results) && count($results) > 0)
			$CI->config->set_item('site_settings', $results[0]);


		/****** Get Email Settings ******/
		$emailSettings = $CI->db->get('email_settings')->row();
		$CI->config->set_item('emailSettings', $emailSettings);

		/****** Load Words of Selected Language ******/
		if(isset($CI->config->item('site_settings')->language_id))
		 $lang_words = $CI->base_model->getLanguageWords($CI->config->item('site_settings')->language_id);
		
			
		if(isset($lang_words) && count($lang_words) > 0) {

			foreach($lang_words as $word) {

				$config['words'][$word->phrase]	= humanize($word->text);

			}
		}




/* End of file dn.php */

/* Location: ./application/config/dn.php */

