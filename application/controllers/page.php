<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page extends MY_Controller
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
	| ----------------------------------------------------------
	| WEBSITE:			http://conquerorstech.net
	|                   http://conquerorstech.co.za
	| -----------------------------------------------------
	|
	| MODULE: 			Location
	| -----------------------------------------------------
	| This is Page module controller file.
	| -----------------------------------------------------
	*/
	
	function __construct()
	{
		parent::__construct();
		 $this->load->library(array(
            'ion_auth',
            'form_validation'
        ));
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('base_model');
        $this->load->model('crunchy_model');
        $this->load->library('upload');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
        $this->lang->load('auth');
        $this->load->helper('language');
		check_access('admin');
	}

		
	 function pages($param='')
	 {
		  
		 if($this->input->post()){
			 $param = $this->input->post('id');
			$this->form_validation->set_rules('name',$this->phrases['name'],'required|xss_clean'); 
			$this->form_validation->set_rules('description',$this->phrases['description'],'required|xss_clean'); 
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if($this->form_validation->run()==true){
				$update_data['name'] 		= $this->input->post('name');
				$update_data['description'] = $this->input->post('description');
				$update_data['status'] 		= $this->input->post('status');
				$where['id']				= $this->input->post('id');
				if($this->base_model->update_operation($update_data,TBL_PAGES,$where)){
					$msg = (isset($this->phrases['updated sucessfully'])) ? $this->phrases['updated sucessfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg,0);
					redirect(URL_PAGE.$this->input->post('id'));
				}else{
					$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
					$this->prepare_flashmessage($msg,1);
					redirect(URL_PAGE.$this->input->post('id'));
				}
				
			}
			
		 }
		 
		$page = $this->base_model->fetch_records_from(TBL_PAGES, array('id' => $param));
		$data=array();
		if(count($page)>0){
			
			$data = $page[0];
		}else{
			$msg = (isset($this->phrases['no data available'])) ? $this->phrases['no data available'] : "No data avaialble";
			$this->prepare_flashmessage($msg,2);
			redirect(URL_ADMIN,REFRESH);
		}
		
		$this->data['message']      	= ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')); 
        
		$this->data['page'] 			= $data;
		$this->data['title'] 			= $data->name;
		$this->data['active_class'] 	= ACTIVE_PAGES;
		$this->data['content'] 			= PAGE_PAGES;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
				
	 }	
}