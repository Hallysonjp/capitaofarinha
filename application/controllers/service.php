<?php defined('BASEPATH') OR exit('No direct script access allowed');

 /*
    | -----------------------------------------------------
    | PRODUCT NAME:     DIGI RESTAURENT APP SYSTEM (DRAS)
    | -----------------------------------------------------
    | AUTHOR:            DIGITAL VIDHYA TEAM
    | -----------------------------------------------------
    | EMAIL:            digitalvidhya4u@gmail.com
    | -----------------------------------------------------
    | COPYRIGHTS:        RESERVED BY DIGITAL VIDHYA
    | -----------------------------------------------------
    | WEBSITE:            http://digitalvidhya.com
    |                   http://codecanyon.net/user/digitalvidhya
    | -----------------------------------------------------
    |
    | MODULE:             REST CONTROLLER
    | -----------------------------------------------------
    | This is Orders module controller file.
    | -----------------------------------------------------
    */
require APPPATH.'/libraries/REST_Controller.php';

class Service extends REST_Controller 
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
		 
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('base_model');
		$this->load->model('crunchy_model'); 
		$this->load->helper('security');
		
		/* Loading Language Files */
		$map = $this->config->item('languages');
		if (is_array($this->response->lang)) {
			$this->load->language('auth', $map[$this->response->lang[1]]);
			$this->load->language('ion_auth', $map[$this->response->lang[1]]);
		}
        
        /* Configure limits on our controller methods. Ensure
		you have created the 'limits' table and enabled 'limits'
        within application/config/rest.php	*/
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
		
		/* Check Whether User logged in and is a member */
		$this->phrases = $this->config->item('words');	
    }

	 //User Authentication
    function authenticateUser($identity = NULL, $password = NULL)
    {
        if ($identity == "" || $password == "") {
            $this->response(array(
                'status' => 'Please provide Email and Password'
            ), 400);
        }
        
        return $this->ion_auth->login($identity, $password, false);
    }
	
	
	 // Manage Profile
    function edit_profile_post()
    {
        if (!$this->post('first_name') || !$this->post('last_name') || !$this->post('phone') || !$this->post('address') || !$this->post('city') || !$this->post('landmark') || !$this->post('id')) {
            $response = 'All fields are mandatory';
			$this->serviceResponse($data = array(),$response,0);
        }
		
        $user_id  = $this->post('id');
        $username = strtolower($this->post('first_name')) . ' ' . strtolower($this->post('last_name'));
        $update_data     = array(
            'first_name' => $this->post('first_name'),
            'last_name' => $this->post('last_name'),
            'username' => $username,
            'address' => $this->post('address'),
            'phone' => $this->post('phone'),
            'city' => $this->post('city'),
            // 'state' => $this->post('state'),
            // 'pincode' => $this->post('pincode'),
            'landmark' => $this->post('landmark'),
            'updated_on' => date('Y-m-d')
        );
        $where['id'] = $this->post('id');
        if ($this->base_model->update_operation($update_data,TBL_USERS,$where)) {
            $response = 'Updated successfully';
            $this->serviceResponse($data = array(),$response,1);
        } else {
            $response = $this->ion_auth->errors();
            $this->serviceResponse($data = array(),$response,0);
        }
    }
	
	function add_user_address_post()
	{
		$data['user_id'] 		= $this->post('user_id');
		$data['house_no'] 		= $this->post('house_no');
		$data['apartment_name'] = $this->post('apartment_name');
		$data['other'] 			= $this->post('other');
		$data['landmark'] 		= $this->post('landmark');
		$data['city'] 			= $this->post('city');
		$data['is_default'] 	= $this->post('is_default');
		if($this->post('ua_id')){
			$where['ua_id'] = $this->post('ua_id');
			if($this->base_model->update_operation($data,TBL_USER_ADDRESS,$where)){
			$response 	= 'Address updated successfully';
			$status 	= 1;
			}else{
				$response 	= 'Address not updated successfully';
				$status 	= 0;
			}
		}else{
			if($this->base_model->insert_operation($data,TBL_USER_ADDRESS)){
			$response 	= 'Address added successfully';
			$status 	= 1;
			}else{
				$response 	= 'Address not added successfully';
				$status 	= 0;
			}
		}
		
		$this->serviceResponse(array(),$response,$status);
	}
	
	function delete_user_address_post()
	{
		$where['ua_id'] = $this->post('ua_id');
		if($this->base_model->delete_record(DBPREFIX.TBL_USER_ADDRESS,$where)){
			$response 	= 'Address deleted successfully';
			$status 	= 1;
		}else{
			$response 	= 'Address not deleted successfully';
			$status 	= 0;
		}
		$this->serviceResponse(array(),$response,$status);
	}
	
	//Get All Menus
    function get_menu_card_post()
    {        
        $menus = $this->base_model->fetch_records_from(TBL_MENU, array(
            'status' => 'Active'
        )); 
        $addons = $this->base_model->fetch_records_from(TBL_ADDONS,array('status'=>'Active'));
		$addons = (!empty($addons)) ? $addons : array();	
		$menus  = (!empty($menus)) ? $menus : array();	
		
        $data = array('menu'=>$menus,'addons'=>$addons);
		$this->serviceResponse($data,'Menus and Addons List',1);
    }
	
	
    // Get Offers 
    function get_offers_post()
    {
       		
		$offers = $this->base_model->fetch_records_from(TBL_OFFERS,array('status'=>'Active','offer_valid_date >='=>date('Y-m-d')));
		
        if (count($offers) > 0) {
			$offers = $offers;
            $response = "Offers Found";
		} else {
            $offers = array();
            $response = "Empty Offers Found";
        }
		
		$this->serviceResponse($offers,$response,1);
    }
    //Get Offer Details
    function get_offer_details_post()
    {
        $offer_id = $this->post('offer_id');
        
        $offer_details = $this->base_model->fetch_records_from(TBL_OFFERS,array('offer_id'=>$offer_id));
		
		
         if (count($offer_details) > 0) {
				
			/* OFFER PRODUCTS  */
			$offer_products = $this->base_model->run_query('SELECT o.*,i.item_image_name FROM '.DBPREFIX.TBL_OFFER_PRODUCTS.' o,'.DBPREFIX.TBL_ITEMS.' i WHERE o.item_id=i.item_id AND o.offer_id="'.$offer_id.'"');
			 

				if (count($offer_products) > 0) {
					$offer_products = $offer_products;
				} else {
					$offer_products = array();
				}
			
				$offer_details = array(
								'products'=>$offer_products
								);
				$response = "Offer details found";
			
			
        }else{
			$offer_details = array(
								'products'=>array()
								);
			$response = 'Offer details not found';
		}
		
		 $this->serviceResponse($offer_details,$response,1);
        
    }
    //Get Items
    function get_items_post()
    {
		$menu_id = $this->post('menu_id');
        if ($menu_id == "" || !is_numeric($menu_id)) {
            $response = 'Please select valid menu';
			$this->serviceResponse($data=array(),$response,0);
        }
        
        $items           = $this->base_model->fetch_records_from(TBL_ITEMS, array(
            'menu_id' => $menu_id,
            'status' => 'Active'
        ));
		
        if (count($items) > 0) {
			foreach($items as $index => $item){
			$items[$index]->options = $this->crunchy_model->getItemOptions($item->item_id);
			}
			
			foreach($items as $index => $item){
			$items[$index]->addons = $this->crunchy_model->getItemAddons($item->item_id);
			}
            $items = $items;
			$response = 'Items Found';
			
        } else {
            $items = array();
			$response = 'Items Found Empty';
        }
		
		$item_types = $this->base_model->run_query('SELECT distinct(item_type) FROM '.DBPREFIX.TBL_ITEMS.' WHERE menu_id="'.$menu_id.'" and status="Active"');
		
			if(count($item_types)>0){
				$item_types = $item_types;
			}else{
				$item_types = array();
			}
		
		$data = array('items'=>$items,'item_types'=>$item_types);
		$this->serviceResponse($data,$response,1);
    }
    // Get Item Details
    function get_item_details_post()
    {
        $item_id      = $this->post('item_id');
		
        if ($item_id == "" || !is_numeric($item_id)) {
            $response = 'Please Provide Valid Item';
			$this->serviceResponse($data=array(),$response,0);
        }
		
        $item_details = $this->base_model->run_query("select i.*,avg(r.rating) as average_rate from " . DBPREFIX.TBL_ITEMS . " i, " . DBPREFIX.TBL_ITEM_REVIEW . " r where i.item_id=r.item_id and i.item_id='" . $item_id . "'");
		
        if (count($item_details) > 0) {
            $item_reviews = $this->base_model->run_query("select r.*,u.username from " . DBPREFIX.TBL_USERS . " u, " . DBPREFIX.TBL_ITEM_REVIEW . " r where u.id=r.user_id and r.item_id='" . $item_id . "'");
			
            if (count($item_reviews) > 0) {
               $item_reviews	=	$item_reviews;
            } else {
                $item_reviews = array();
            }
			
			$data = array(
					'item_details' => $item_details,
					'item_reviews' => $item_reviews,
					);
            $response		=	'Items Found';
        } else {
            $data	=	array();
			$response		=	'Items Found Empty';
        }
		
		$this->serviceResponse($data,$response,1);
    }
    /***Item Reviews ****/
    function item_review_post()
    {
        $input_data['user_id']        = $this->post('user_id');
        $input_data['item_id']        = $this->post('item_id');
        $input_data['rating']         = $this->post('rating');
        $input_data['comment']        = $this->post('comment');
        $input_data['date_of_rating'] = date('Y-m-d');
        
		if($this->base_model->insert_operation($input_data, TBL_ITEM_REVIEW)) {
            $response 	= 'Thank You! Review Taken Successfully';
            $status 	= 1;
        }else {
            $response 	= 'Unable to take review';
            $status 	= 0;
        }
		$this->serviceResponse($data = array(),$response,$status);
    }
    /***Item Reviews ****/
    /***Order Reviews ****/
    function offer_review_post()
    {
        $input_data['user_id']        = $this->post('user_id');
        $input_data['offer_id']       = $this->post('offer_id');
        $input_data['rating']         = $this->post('rating');
        $input_data['comment']        = $this->post('comment');
        $input_data['date_of_rating'] = date('Y-m-d');
        if ($this->base_model->insert_operation($input_data, TBL_OFFER_REVIEWS)) {
           $response 	= 'Thank You! Review Taken Successfully';
            $status 	= 1;
        } else {
            $response 	= 'Unable to take review';
            $status 	= 0;
        }
		$this->serviceResponse($data = array(),$response,$status);
    }
    /***Order Reviews ****/
   
    /***Save Order Information ****/
    function save_order_post()
    {
        if (!$this->post('user_id') || !$this->post('order_date') || !$this->post('order_time') || !$this->post('total_cost') || !$this->post('customer_name') || !$this->post('phone') ||  !$this->post('landmark') || !$this->post('city') || !$this->post('order_summary')) {
            $data = array();
			$response = 'All Fields are mandatory';
            $this->serviceResponse($data,$response,0);
        }
		
        $input_data['user_id']          = $this->post('user_id');
        $input_data['order_date']       = date("Y-m-d", strtotime($this->post('order_date')));
        $input_data['order_time']       = $this->post('order_time');
        $input_data['total_cost']       = $this->post('total_cost');
        $input_data['customer_name']    = $this->post('customer_name');
        $input_data['phone']            = $this->post('phone');
        $input_data['house_no']         = $this->post('house_no');
        $input_data['apartment_name']   = $this->post('apartment_name');
        $input_data['other']   			= $this->post('other');
        $input_data['landmark']         = $this->post('landmark');
        $input_data['city']             = $this->post('city');
        
        $input_data['order_type']     	= $this->post('order_type');
        $input_data['status']           = "new";
        $input_data['payment_type']     = $this->post('payment_type');
        $input_data['no_of_items']      = $this->post('no_of_items');
        
        $input_data['date_updated']     = date('Y-m-d');
		
		if($this->post('payment_type')=='cash')
		{
			$input_data['paid_date']      	= NULL;
			$input_data['transaction_id']   = NULL;
			$input_data['payer_email']      = NULL;
			$input_data['payer_name']      	= NULL;
			$input_data['payment_status']   = NULL;
		}
		else if($this->post('payment_type')=='online')
		{
			$input_data['transaction_id']   = $this->post('transaction_id');
			$input_data['paid_date']      	= $this->post('paid_date');
			$input_data['paid_amount']     	= $this->post('total_cost');
			$input_data['payer_name']      	= $this->post('payer_name');
			$input_data['payer_email']      = $this->post('payer_email');
			$input_data['payment_status']   = $this->post('payment_status');
		}
		
        if ($this->base_model->insert_operation($input_data,TBL_ORDERS)) {
            $order_id = $this->db->insert_id();
            
           
			if($this->post('isAddons')!=0){
				 $addons_summarys = json_decode($this->post('addons_summary'));
				 $summary_data     = array();
				foreach ($addons_summarys as $addon) {
                
					array_push($summary_data, array(
						"order_id" => $order_id,
						"addon_name" => $addon->addon_name,
						"addon_image"=>$addon->addon_image,
						"price"=>$addon->price,
						"quantity"=>$addon->quantity,
						"final_cost"=>$addon->finalCost,
						"is_deleted"=>0
					));
				}
				$this->db->insert_batch(DBPREFIX.TBL_ORDER_ADDONS, $summary_data);
			}
            
			$summarys = json_decode($this->post('order_summary'));
            $products_data     = array();
            foreach ($summarys as $summary) {
                
                array_push($products_data, array(
                    "order_id" => $order_id,
                    "item_name" => $summary->item_name,
					"item_image_name"=>$summary->item_image_name,
					"size_id"=>$summary->size_id,
					"size_name"=>$summary->size_name,
					"item_size_id"=>$summary->item_size_id,
					"size_price"=>$summary->size_price,
                    "item_qty" => $summary->quantity,
                    "item_cost" => $summary->item_cost,
                    "final_cost" => $summary->finalCost
                ));
            }
			
            if ($this->db->insert_batch(DBPREFIX.TBL_ORDER_PRODUCTS, $products_data)) {
				
				/**send email to user**/
				$email_template = $this->db->get_where(DBPREFIX.TBL_EMAIL_TEMPLATES,array('subject'=>'when_user_order_booked_template_mail_to_user','status'=>'Active'))->result();
				
				if(count($email_template)>0) 
				{
					
					$from 	= $this->config->item('site_settings')->portal_email;
					$to 	= $this->post('email');
					$sub 	= $this->config->item('site_settings')->site_title 
				. ' - ' . (isset($this->phrases['order'])) ? $this->	phrases['order'] : " ORDER ";
				
					$email_template = $email_template[0];			
					$content 		= $email_template->email_template;
					
					$content     	= str_replace("__USER_NAME__",ucwords($this->post('customer_name')),$content);
					
					$content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
					
					$content 		= str_replace("__ORDER_TYPE__",ucfirst($this->post('order_type')),$content);
					
					$content 	= str_replace("__NO_OF_ITEMS__", $this->post('no_of_items'),$content);

					$content 		= str_replace("__ORDER_TIME__", $this->post('order_time'),$content);
				
					$content 		= str_replace("__TOTAL_COST__", $this->post('total_cost').' '.$this->config->item('site_settings')->currency_symbol,$content);
				
					$content 		= str_replace("__PAYMENT_MODE__",ucfirst($this->post('payment_type')),$content);
					
					$content 		= str_replace("__CONTACT_US__",$this->config->item('site_settings')->land_line,$content);
				
					$content 		= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
				
					$content 		= str_replace("__COPY_RIGHTS__", $this->config->item('site_settings')->rights_reserved_content,$content);
					
					sendEmail($from, $to, $sub, $content);
				}
				
				
				$email_template = $this->db->get_where(DBPREFIX.TBL_EMAIL_TEMPLATES,array('subject'=>'when_user_order_booked_template_mail_to_admin','status'=>'Active'))->result();
				
				if(count($email_template)>0) 
				{
					
					$from 	= $this->post('email');
					$to 	= $this->config->item('site_settings')->portal_email;
					$sub 	= $this->config->item('site_settings')->site_title 
				. ' - ' . (isset($this->phrases['order'])) ? $this->	phrases['order'] : " ORDER ";
				
					$email_template = $email_template[0];			
					$content 		= $email_template->email_template;
					
					$content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
					
					$content     	= str_replace("__USER_NAME__", $this->post('customer_name'),$content);
					
					
					$content     	= str_replace("__EMAIL__", $this->post('email'),$content);
					
					$content     	= str_replace("__PHONE__", $this->post('phone'),$content);
					
					$content     	= str_replace("__ADDRESS__", $this->post('address'),$content);
					
					$content     	= str_replace("__LAND_MARK__", $this->post('landmark'),$content);
					
					$content     	= str_replace("__CITY__", $this->post('city'),$content);
										
					$content     	= str_replace("__PIN_CODE__", $this->post('pincode'),$content);
					
					$content 		= str_replace("__ORDER_TYPE__", $this->post('order_type') ,$content);
					
					$content 	= str_replace("__NO_OF_ITEMS__", $this->post('no_of_items'),$content);

					$content 		= str_replace("__ORDER_TIME__", $this->post('order_time'),$content);
				
					$content 		= str_replace("__TOTAL_COST__", $this->post('total_cost'),$content);
				
					$content 		= str_replace("__PAYMENT_MODE__", $this->post('payment_type'),$content);
					
					$content 		= str_replace("__CONTACT_US__", $this->config->item('site_settings')->address,$content);
				
					$content 		= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
				
					$content1 		= str_replace("__COPY_RIGHTS__", $this->config->item('site_settings')->rights_reserved_content,$content);
					
					sendEmail($from, $to, $sub, $content1);
				}
				
				
                $data 		= array('order_id'=>$order_id);
				$response 	= "Order Saved Successfully";
				$status		= 1;
            } else {
					$this->base_model->delete_record(TBL_ORDERS,array('order_id'=>$order_id));
					$data = array();
					$response = 'Unable To Save Order';
					$status	=	0;
            }
        } else {
				$data = array();
				$response = 'Unable To Save Order';
				$status	=	0;
            
        }
		$this->serviceResponse($data,$response,$status);
    }
    /***Order History ****/
    function order_history_post()
    {
        
        $user_id       = $this->post('id');
        $order_history = $this->base_model->fetch_records_from(TBL_ORDERS, array('user_id' => $user_id),'','order_id','desc');
		
        if (count($order_history) > 0) {
			$order_history = $order_history;
            $response = "Order History Found";
        } else {
            $order_history = array();
            $response = "Empty Order History Found";
        }
		$this->serviceResponse($order_history,$response,1);
    }
    /***Order History Details ****/
    function order_item_details_post()
    {
        
        $order_id      = $this->post('order_id');
				
        $order_history = $this->base_model->fetch_records_from(TBL_ORDER_PRODUCTS,array('order_id'=>$order_id));
		
        if (count($order_history) > 0) {
            $order_history = $order_history;
			$response = 'Order Details Found';
        } else {
            $order_history = array();
			$response = 'Empty Order Details';
        }
		$this->serviceResponse($order_history,$response,1);
    }
      
    /*** Get Site Setting Details ****/
    function get_site_settings_post()
    {
    	$siteDetails = $this->base_model->run_query("select s.*,s.currency as site_currency,p.* from " . DBPREFIX.TBL_SITE_SETTINGS . " s," . DBPREFIX.TBL_PAYPAL_SETTINGS . " p");
		
        if (count($siteDetails) > 0) {
            $siteDetails	=	$siteDetails;
			
			$languages = $this->base_model->fetch_records_from(TBL_LANGUAGES,array('status'=>'Active'));
				
				if(count($languages)>0){
					
					$lang = array();
					foreach($languages as $language)
					{	
						
						$language_strings =  $this->base_model->run_query(
						"SELECT p.id,p.text, ml.text as existing_text FROM " . DBPREFIX.TBL_PHRASES. " p," . DBPREFIX.TBL_MULTI_LANG . " ml," .DBPREFIX.TBL_LANGUAGES." l WHERE ml.phrase_id=p.id AND ml.lang_id=l.id AND ml.lang_id=" . $language->id." AND p.phrase_type='app' AND ml.phrase_type='app'");
						$option = array();
						if(count($language_strings)>0){
							 foreach ($language_strings as $key => $val) {
								$option[$val->text] = $val->existing_text;
							}
							
						}
						$option_data = array(
						'language_name'=>$language->lang_name,
						'language_code'=>$language->lang_code,
						'id'=>$language->id,
						'language_strings'=>$option
						);
						array_push($lang,$option_data);
					}
				}else{
					$lang = array();
				}
					
			$response		=	'Site details found'; 
        } else {
            $siteDetails	=	array();
			$response		=	'Site details found empty'; 
        }
		$data = array(
					'siteDetails'=>$siteDetails,
					'language_types'=>$lang
					);
		$this->serviceResponse($data,$response,1);
    }
    
	
	/**
	* Change Password
	* @author John Peter
	* @return
	*/
	function change_password_post()
	{
					
		$identity 							= $this->post('email');
		$change 							= $this->ion_auth->change_password(
		$identity, $this->post('current_password') , $this->post('new_password'));
		if ($change) {

				$response = strip_tags($this->ion_auth->messages());
				$status = 1;
		}
		else {
				
				$response = strip_tags($this->ion_auth->errors());
				$status = 0;
		}
		
		$this->serviceResponse($data = array(),$response,$status);
		
	}
	
    
   /***Gallery ****/
    function get_gallery_post()
    {
        $gallery = $this->base_model->fetch_records_from(TBL_GALLERY);
        if (count($gallery) > 0) {
			$gallery	=	$gallery;
			$response	=	'Gallery found';
        } else {
            $gallery	=	array();
			$response	=	'Gallery found empty';
        }
		$this->serviceResponse($gallery,$response,1);
    }
	
	function get_service_location_post()
	{
		$serviceLocations = $this->crunchy_model->getServiceDeliveryLocation();
		if(count($serviceLocations)>0){
			$serviceLocations = $serviceLocations;	
			$serviceCities	=	$this->crunchy_model->getServiceDeliveryCities();
			if(count($serviceCities)>0){
				$data  = array(
							'locations'=>$serviceLocations,
							'cities'=>$serviceCities
						 );
			}
		}else{
			$data  = array(
							'locations'=>array(),
							'cities'=>array()
						 );
		}
		$response	=	'Service Locations Found';
		$this->serviceResponse($data,$response,1);
	}
	
	// Dynamic Pages
	
	function pages_post()
	{
		$page_details	= $this->base_model->fetch_records_from('pages',array('status'=>'Active'));
		
		if(count($page_details)>0){
			$page_details = $page_details;
			$response		=	'Page Detials found';
		}else{
			$page_details = array();
			$response		=	'Page Detials found empty';
		}
		$this->serviceResponse($page_details,$response,1);
	}
	
	function get_languages_post()
	{
		$languages = $this->base_model->fetch_records_from(TBL_LANGUAGES,array('status'=>'Active'));
		if(count($languages)>0){
			$languages = $languages;
		}else{
			$languages = array();
		}
		$this->serviceResponse($languages,'Languages',1);
	}
	
	function get_language_strings_post()
	{
		$language_id = $this->post('language_id');
		if($language_id!='' || !is_numeric($language_id)){
			$language_id = 1;	
		}
		$phrases 	 = $this->base_model->run_query(
		"SELECT p.id,p.text, ml.text as existing_text FROM " . DBPREFIX.TBL_PHRASES
		 . " p," . DBPREFIX.TBL_MULTI_LANG . " ml WHERE ml.phrase_id=p.id 
		AND ml.lang_id=" . $language_id." AND p.phrase_type='app' AND ml.phrase_type='app'");
		$option_data = array(
            
        );
		if(count($phrases)>0){
			 foreach ($phrases as $key => $val) {
				$option_data[$val->text] = $val->existing_text;
			}
		}
		
		$this->serviceResponse($option_data,$this->phrases['could not found the record'],1);
		
	}
	
	function get_user_address_post()
	{
		$user_id = $this->post('id');
		
		$user_address = $this->base_model->fetch_records_from(TBL_USER_ADDRESS,array('user_id'=>$user_id));
		if(!empty($user_address)){
			$user_address = $user_address;
		}else{
			$user_address = array();	
		}
		$this->serviceResponse($user_address,'User address',1);
	}
	
	// Common Response Method 
	 
	 function serviceResponse($data=array(),$response,$status=0)
	 {
	 		$data = array('data'=>$data);
			$response = array('message'=>$response,'status'=>$status);
			$result = array();
			array_push($result,$data);
			array_push($result,array('response'=>$response));
			$this->response(json_decode(json_encode ($result), true), 200);	
	 }	
}
