<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends MY_Controller {
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
	| MODULE: 			Location
	| -----------------------------------------------------
	| This is Location module controller file.
	| -----------------------------------------------------
	*/
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->database();
		$this->load->model('base_model');
		$this->load->model('crunchy_model');
		$this->load->library('upload');
		$this->form_validation->set_error_delimiters(
		$this->config->item('error_start_delimiter', 'ion_auth') , 
		$this->config->item('error_end_delimiter', 'ion_auth'));

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ? 
		$this->load->library('mongo_db') : $this->load->database();
		$this->lang->load('auth');
		$this->load->helper('language');
		$this->load->helper('date');
		$this->load->helper('dn_helper');
		
		/***check user***/
		check_access(ADMIN);
			
	}	
	
	
	/***FUNCTION FOR CITIES***/
	public function cities($param = '', $param1 = '',$param2='')
	{
		
		$this->data['title'] 					= (isset($this->phrases['cities'])) ? $this->phrases['cities'] : "Cities";
		$this->data['content'] 					= PAGE_CITIES;
		
					
			/*Start*/
				
		if($this->input->post('submit') == "Add" || $this->input->post('submit') == "Update") {
				// FORM VALIDATIONS
				
				$this->form_validation->set_rules('city_name', $this->phrases['city'],'required|xss_clean');
				$this->form_validation->set_rules('status', $this->phrases['status'],'xss_clean');
				
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
								
				$inputdata['city_name'] 	= ucwords($this->input->post('city_name'));
				$inputdata['status'] 		= $this->input->post('status');
					
		}
		
		if ($param == "Add") {
			
			if ($this->input->post('submit') == "Add") {

				if ($this->form_validation->run() == TRUE) {
					
					
					/***check whether the city is existed***/
					
					$existed_city 	= getRecsTable(TBL_CITIES,array('city_name'=>$this->input->post('city_name')));
					
					if(count($existed_city) > 0) {
						$msg = (isset($this->phrases['already existed'])) ? $this->phrases['already existed'] : "Already Existed";
						$this->prepare_flashmessage($msg,2);
						redirect(URL_CITIES,REFRESH);
					}
					
					if ($this->base_model->insert_operation($inputdata, TBL_CITIES)) {
						$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
						$this->prepare_flashmessage($msg , 0);
						redirect(URL_CITIES,REFRESH);
					}
					else {
						$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
						$this->prepare_flashmessage($msg , 1);
						redirect(URL_CITIES,REFRESH);
					}
				}else{
					$this->prepare_flashmessage(validation_errors(), 1);
					redirect(URL_CITIES,REFRESH);
				}
			}
			$this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
									
			$this->data['title'] 				= (isset($this->phrases['add city'])) ? $this->phrases['add city'] : "Add City";
			$this->data['operation']			= "Add";
			$this->data['content'] 				= PAGE_ADD_CITY;
		}
		elseif ($param == "Edit") {
			
			
			 if ($this->input->post('submit') == "Update") {
				 
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
				
					$where['city_id'] 				= $this->input->post('update_rec_id');
					
					if ($this->base_model->update_operation($inputdata, TBL_CITIES, $where)) {
						$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
						$this->prepare_flashmessage($msg , 0);
						redirect(URL_CITIES,REFRESH);
					}
					else {
						$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
						$this->prepare_flashmessage($msg , 1);
						redirect(URL_CITIES, REFRESH);
					}
				}
				
			}
			
			if($param1 == "" || !is_numeric($param1)) {
				redirect(URL_CITIES,REFRESH);
			}
			
			
			$city_rec 							= getRecsTable(TBL_CITIES,array('city_id'=>$param1));
			$this->data['city_rec'] 			= count($city_rec) > 0 ? $city_rec[0] : array();
								
			$this->data['title'] 				= (isset($this->phrases['edit city'])) ? $this->phrases['edit city'] : "Edit City";
			$this->data['operation']			= "Edit";
			$this->data['content'] 				= PAGE_ADD_CITY;
		}
		elseif ($param == "Delete") {
			if($this->ion_auth->is_admin()) {
			
			$where['city_id'] 					= $param1;
			$cond 								= "city_id";
			$cond_val				 			= $param1;
			$locations = $this->base_model->fetch_records_from(TBL_SERVICE_DELIVERED_LOCATIONS, array($cond=>$cond_val));	
			if (count($locations)<1 && is_numeric($param1)) {
				if ($this->base_model->delete_record(TBL_CITIES, $where)) {
					$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
					$this->prepare_flashmessage($msg , 0);
					redirect(URL_CITIES, REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_CITIES,REFRESH);
				}
			}
			else {
				$msg = (isset($this->phrases['you cannot delete cities cause delivered location exist under it'])) ? $this->phrases['you cannot delete cities cause delivered location exist under it'] : "You cannot delete cities cause delivered location exist under it";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_CITIES, REFRESH);
			}
		}
		}
		elseif($param == "cities") {
						
			$this->data['param']					= $param;
			$this->data['title']					= (isset($this->phrases['upload cities'])) ? $this->phrases['upload cities'] : "Upload Cities";
			$this->data['content'] 					= "admin/location/excel_page";
			
		}
			$this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
			$cities = $this->base_model->run_query("select * from ".DBPREFIX."pl_cities order by city_name ");
			
			$this->data['cities'] 		= count($cities) > 0 ? $cities: array();
			$this->data['active_class'] = ACTIVE_LOCATION;
			$this->_render_page(TEMPLATE_ADMIN, $this->data);	
	}
	
	
	/****Read Excel***/
	function readexcel($param = '')
	{
		   
		if ($_FILES['userfile']['name']) {
			$f_type							 = explode(".", $_FILES['userfile']['name']);
			$last_in 						 = (count($f_type) - 1);
			if ($f_type[$last_in] != "xls") {
				$this->prepare_flashmessage($this->phrases['invalid file format'], 1);
				redirect('location/'.$param);
			}
		}
			
		if ($param == "cities"){
		include (FCPATH.'/assets/excelassets/PHPExcel/IOFactory.php');

		$file 									= $_FILES['userfile']['tmp_name'];
		$inputFileName 							= $file;
		$objReader 								= new PHPExcel_Reader_Excel5();
		$objPHPExcel 							= $objReader->load($inputFileName);
		echo '<hr />';
		$sheetData 								= $objPHPExcel->getActiveSheet()->toArray(
		null, true, true, true
		);
		$i 										= 0;
		$j 										= 0;
		$data 									= array();
		$valid 									= 1;

		foreach($sheetData as $r) {
			if ($i++ != 0) {
				if ($valid == 1) {
					if ($param == 'cities') {
						$data[$j++] 			= array(
							'city_id' 			=> $r['A'],
							'city_name' 		=> $r['B'],
							'status' 			=> $r['C'],
						);
					}
					
				}
				else {
					break;
				}
			}
		}

		if ($valid == 1) {
			
			$this->db->insert_batch(DBPREFIX.TBL_CITIES,$data);
			
		}
		else {
			$msg = $this->phrases['invalid operation'];
			$this->prepare_flashmessage($msg, 1);
			redirect('location/'.$param, 'refresh');
		}
		
		if ($this->db->affected_rows() > 0) {
			$msg = $this->phrases['added successfully'];
			$this->prepare_flashmessage($msg, 0);
		}
		else {
			$msg = $this->phrases['unable to add'];
			$this->prepare_flashmessage($msg, 1);
		}
	
		redirect('location/'.$param, 'refresh');
		
		}
		else {
			$this->prepare_flashmessage($this->phrases['invalid operation'],2);
			redirect('location/'.$param);
		} 
	}
	function service_locations($param=null,$param1=null)
	{
		
		$this->data['title'] 					= (isset($this->phrases['service delivery locations'])) ? $this->phrases['service delivery locations'] : 'Service Delivered Locations';
		$this->data['content'] 					= PAGE_SERVICE_LOCATION;
				
		$cities = $this->base_model->run_query("SELECT * FROM ".DBPREFIX.TBL_CITIES." WHERE  status='Active' order by city_name");
					
				$city_options = array(''=> 'Select City');
				if(count($cities)>0 )
				{
					foreach($cities as $c)
						$city_options[$c->city_id] 	= $c->city_name;
						
				}
		
		if($this->input->post('submit') == "Add" || $this->input->post('submit') == "Update") {
					// FORM VALIDATIONS
					
				$this->form_validation->set_rules('city_id', $this->phrases['city'],'required|xss_clean');
				$this->form_validation->set_rules('locality', $this->phrases['locality name'],'required|xss_clean');
				$this->form_validation->set_rules('pincode', $this->phrases['pincode'],'required|numeric|xss_clean');
				$this->form_validation->set_rules('status', $this->phrases['status'],'xss_clean');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				
				$inputdata['city_id'] 		= $this->input->post('city_id');
				$inputdata['locality'] 		= $this->input->post('locality');
				$inputdata['pincode'] 		= $this->input->post('pincode');
				$inputdata['status'] 		= $this->input->post('status');	
		}
		
		if ($param == "add") {
			if ($this->input->post('submit') == "Add") {
				if ($this->form_validation->run() == TRUE) {
					/***check whether the service location is existed***/
					$existed_service_location 	= 
							getRecsTable(
							TBL_SERVICE_DELIVERED_LOCATIONS,
							array(
							'city_id'=>$this->input->post('city_id'),
							'locality'=>$this->input->post('locality'),
							'pincode'=>$this->input->post('pincode'))
							);
					if(count($existed_service_location) > 0) {
						$msg = (isset($this->phrases['already existed'])) ? $this->phrases['already existed'] : "Already Existed";
						$this->prepare_flashmessage($msg,2);
						redirect(URL_SERVICE_LOCATIONS,REFRESH);
					}
					if ($this->base_model->insert_operation($inputdata, TBL_SERVICE_DELIVERED_LOCATIONS)) {
						$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
						$this->prepare_flashmessage($msg , 0);
						redirect(URL_SERVICE_LOCATIONS,REFRESH);
					}
					else {
						$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable to add";
						$this->prepare_flashmessage($msg , 1);
						redirect(URL_SERVICE_LOCATIONS,REFRESH);
					}
				}
			}
			
			$this->data['city_options']		= count($city_options) > 0 ? $city_options : array();
			
			$this->data['title'] 				= (isset($this->phrases['add service delivery location'])) ? $this->phrases['add service delivery location'] : "Add Service Delivery Location";
			$this->data['operation']			= "add";
			$this->data['content'] 				= PAGE_ADD_SERVICE_LOCATION;
		}
		
		elseif ($param == "edit") {
			
			 if ($this->input->post('submit') == "Update") {
				$param1 = $this->input->post('update_rec_id');
				if ($this->form_validation->run() == TRUE) {
					
					/***check whether the service location is existed***/
					$existed_service_location 	= getRecsTable(TBL_SERVICE_DELIVERED_LOCATIONS,array(
								'city_id'=>$this->input->post('city_id'),
								'locality'=>$this->input->post('locality'),
								'pincode'=>$this->input->post('pincode'),
								'service_provide_location_id !='=>$param1));
								
					if(count($existed_service_location) > 0) {
						
						$msg = (isset($this->phrases['already existed'])) ? $this->phrases['already existed'] : "Already Existed";
						$this->prepare_flashmessage($msg,2);
						redirect(URL_SERVICE_LOCATIONS,REFRESH);
					}
					
					
					$where['service_provide_location_id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($inputdata, TBL_SERVICE_DELIVERED_LOCATIONS, $where)) {
						$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
						$this->prepare_flashmessage($msg, 0);
						redirect(URL_SERVICE_LOCATIONS,REFRESH);
					}
					else {
						$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
						$this->prepare_flashmessage($msg, 1);
						redirect(URL_SERVICE_LOCATIONS,REFRESH);
					}
				}
			} 
			
			if($param1 == "" || !is_numeric($param1)) {
				redirect(URL_SERVICE_LOCATIONS,REFRESH);
			} 
			$record 							= getRecsTable(TBL_SERVICE_DELIVERED_LOCATIONS,array('service_provide_location_id'=>$param1));
											
			$this->data['record'] 				= count($record) > 0 ? $record[0] : array();
			
			$this->data['city_options']		= count($city_options) > 0 ? $city_options : array();
			
			$this->data['title'] 				= (isset($this->phrases['edit service delivery locations'])) ? $this->phrases['edit service delivery locations'] : 'Edit Service Delivery Location';
			$this->data['operation']			= "edit";
			$this->data['content'] 				= PAGE_ADD_SERVICE_LOCATION;
		}
		elseif ($param == "delete") {
			
			$where['service_provide_location_id']= $param1;
			$cond 								= "service_provide_location_id";
			$cond_val				 			= $param1;
			
			if ($this->base_model->check_duplicate(TBL_SERVICE_DELIVERED_LOCATIONS, $cond, $cond_val) && 
				is_numeric($param1)) {
				if ($this->base_model->delete_record(TBL_SERVICE_DELIVERED_LOCATIONS, $where)) {
					$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_SERVICE_LOCATIONS,REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_SERVICE_LOCATIONS,REFRESH);
				}
			} 
			else {
				$msg = (isset($this->phrases['invalid operation'])) ? $this->phrases['invalid operation'] : "Invalid operation";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_SERVICE_LOCATIONS,REFRESH);
			}
		
		}
		
		$service_locations = $this->base_model->run_query('SELECT sl.*,c.city_name FROM '.DBPREFIX.'service_provide_locations sl,'.DBPREFIX.'pl_cities c WHERE  c.city_id=sl.city_id');
		
		$this->data['message']      		= (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['service_locations'] 	= count($service_locations) > 0 ? $service_locations: array();
		$this->data['active_class'] 		= ACTIVE_LOCATION;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);	
	}
	
	/***get cities through ajax call based on state id***/
	function get_cities()
	{
		$id = $this->input->get('id');
		
		$cities = $this->crunchy_model->getCities($id);
		$no_data_avialable = (isset($this->phrases['no data available'])) ? $this->phrases['no data available'] : "No data available";
		
		if(count($cities)>0){
		$options = '<option value="">Select City</option>';
			foreach($cities as $s ) { 
			$options .= '<option value="'.$s->city_id.'">'
						.ucwords($s->city_name).'</option>';
			}	
		}
		else
		{
			$options = '<option value="">'.$no_data_avialable.'</option>';
		}
		echo $options;
	}
	
	
}
?>