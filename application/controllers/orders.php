 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends MY_Controller
{
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
    | MODULE:             Orders
    | -----------------------------------------------------
    | This is Orders module controller file.
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
        $this->load->library('upload');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
        $this->lang->load('auth');
        $this->load->helper('language');
		check_access(ADMIN);
    }
    function index($param = "new")
    {
        
        $orders   = $this->base_model->run_query("SELECT order_id,order_date,order_time,total_cost,customer_name,phone,date_created,status,CONCAT(house_no,' ',apartment_name,' ',other,' ',landmark,' ',city) as address   FROM " . DBPREFIX.TBL_ORDERS . " WHERE status='" . $param . "' order by order_id desc");
        
		$this->data['orders'] = array();
        
		if (count($orders) > 0) {
            $this->data['orders'] = $orders;
        }
         $this->data['message']      = $this->session->flashdata('message');
		$this->data['active_class'] = ACTIVE_ORDERS;
		$this->data['title']        = ucfirst($param).' '.$this->phrases['orders'];
        $this->data['content']      = PAGE_ORDERS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    // View Order Details
    function view_order($order_id = false)
    {
        
        if ($order_id == false && !$this->input->post()) {
            redirect(URL_ORDERS);
        }
        $orderDetails = $this->base_model->fetch_records_from(TBL_ORDERS, array(
            'order_id' => $order_id
        ));
        if (count($orderDetails) > 0) {
            $this->data['orderDetails'] = $orderDetails[0];
            $orderProducts = $this->base_model->fetch_records_from(TBL_ORDER_PRODUCTS,array('order_id'=>$order_id));
			
            if (count($orderProducts) > 0) {
                $this->data['orderProducts'] = $orderProducts;
            } else {
                $this->data['orderProducts'] = array();
            }
			
			$orderAddons = $this->base_model->fetch_records_from(TBL_ORDER_ADDONS,array('order_id'=>$order_id));
			if (count($orderAddons) > 0) {
                $this->data['orderAddons'] = $orderAddons;
            } else {
                $this->data['orderAddons'] = array();
            }
			
			$order_status = array(''=>'Select');
			   if($orderDetails[0]->status=='new'){
				   $status = array(
				   'process'=>isset($this->phrases['process']) ? $this->phrases['process'] : 'Process',
				   'delivered'=>isset($this->phrases['delivered']) ? $this->phrases['delivered'] : 'Delivered',
				   'cancelled'=>isset($this->phrases['cancelled']) ? $this->phrases['cancelled'] : 'Cancelled'
				   );
				  $order_status = array_merge($order_status,$status);
				}else if($orderDetails[0]->status=='process'){
					 $status = array(
				   'delivered'=>isset($this->phrases['delivered']) ? $this->phrases['delivered'] : 'Delivered',
				   'cancelled'=>isset($this->phrases['cancelled']) ? $this->phrases['cancelled'] : 'Cancelled'
				   );
				   $order_status = array_merge($order_status,$status);
				}else if($orderDetails[0]->status=='cancelled'){
					 $status = array(
				   'new'=>isset($this->phrases['new']) ? $this->phrases['new'] : 'New',
				   'process'=>isset($this->phrases['process']) ? $this->phrases['process'] : 'Process',
				   );
				   $order_status = array_merge($order_status,$status);
				}
			$this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message'); 
			$this->data['orderStatus']  = $order_status;
            $this->data['active_class'] = ACTIVE_ORDERS;
			
            $this->data['title']        = $orderDetails[0]->status.' '.$this->phrases['orders'];
			
            $this->data['content']      = PAGE_VIEW_ORDERS;
            $this->_render_page(TEMPLATE_ADMIN, $this->data);
        } else {
			$msg = (isset($this->phrases['details not found'])) ? $this->phrases['details not found'] : "Details not found";
			$this->prepare_flashmessage($msg, 1);
            redirect(URL_ORDERS);
        }
    }
	
    // Order Update Status
    function update_order() 
    {       
        if ($this->input->post()) {
            $data['status']    = $this->input->post('status');
            $data['message']    = $this->input->post('message');
            $where['order_id'] = $this->input->post('order_id');
            if ($this->base_model->update_operation($data, TBL_ORDERS, $where)) {
				
				$order_details = $this->base_model->fetch_records_from(TBL_ORDERS,array('order_id'=>$this->input->post('order_id')));
				
				$user = $this->base_model->fetch_records_from(TBL_USERS,array('id'=>$order_details[0]->user_id));
				/**send email to user**/
				$email_template = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES,array('subject'=>'order_status_changed','status'=>'Active'));
				
				if(count($email_template)>0) 
				{
					
					$from 	= $this->config->item('site_settings')->portal_email;
					$to 	= $user[0]->email;
					$sub 	= $this->config->item('site_settings')->site_title 
				. ' - ' . (isset($this->phrases['order'])) ? $this->	phrases['order'] : " ORDER ";
				
					$email_template = $email_template[0];			
					$content 		= $email_template->email_template;
					
					$content     	= str_replace("__NAME__", $order_details[0]->customer_name,$content);

					$content     	= str_replace("__ORDER__NO__", $order_details[0]->order_id,$content);
					
					$content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
					
					
					$content 	= str_replace("__NO_OF_ITEMS__", $order_details[0]->no_of_items,$content);

					$content 		= str_replace("__ORDER_TIME__", $order_details[0]->order_time,$content);
				
					$content 		= str_replace("__TOTAL_COST__", $order_details[0]->total_cost .' '.$this->config->item('site_settings')->currency_symbol,$content);
				
					$content 		= str_replace("__PAYMENT_MODE__", ucfirst($order_details[0]->payment_type),$content);
					
									
					$content 		= str_replace("__STATUS__",ucfirst($order_details[0]->status),$content);
					
					$content 		= str_replace("__MESSAGE__",ucfirst($this->input->post('message')),$content);
					
					$content 		= str_replace("__CONTACT__EMAIL__", $this->config->item('site_settings')->portal_email,$content);
					$content 		= str_replace("__CONTACT__NO__", $this->config->item('site_settings')->land_line,$content);
				
					$content 		= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
				
					$content 		= str_replace("__COPY_RIGHTS__", $this->config->item('site_settings')->rights_reserved_content,$content);
					
					sendEmail($from, $to, $sub, $content);
				}
				$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
				$this->prepare_flashmessage($msg, 0);
                redirect(URL_ORDERS_INDEX . $this->input->post('status'));
				
            } else {
                $msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
				$this->prepare_flashmessage($msg, 1);
                redirect(URL_ORDERS_INDEX . $this->input->post('status'));
            }
        } else {
            redirect(URL_ORDERS);
        }
    }
	
	// DELETE ORDER ITEM
	
	function delete_order_item()
	{
		if($this->input->post()){
			$item_recorde_id = $this->input->post('item_record_id');
			$order_id = $this->input->post('order_id');
			$order_type = $this->input->post('order_type');
			if($order_type=='product'){
			$item_details = $this->base_model->fetch_records_from(TBL_ORDER_PRODUCTS,array('op_id'=>$item_recorde_id));
			
			if(!empty($item_details)){
			$update_data['is_deleted']  = 1;
			$where['op_id'] = $item_recorde_id;
			if($this->base_model->update_operation($update_data,TBL_ORDER_PRODUCTS,$where))
			{
				$this->db->where('order_id',$order_id);
				$this->db->set('no_of_items', 'no_of_items-1', FALSE);
				$this->db->set('total_cost', 'total_cost-'.$item_details[0]->final_cost, FALSE);
				if($this->db->update(DBPREFIX.TBL_ORDERS)){
					// SEND CONFIRMATION EMAIL TO CUSTOMER ON CANCELLED ITEMS
					$order_details = $this->base_model->fetch_records_from(TBL_ORDERS,array('order_id'=>$order_id));
				
					$user = $this->base_model->fetch_records_from(TBL_USERS,array('id'=>$order_details[0]->user_id));
				/**send email to user**/
				$email_template = $this->base_model->fetch_records_from(TBL_EMAIL_TEMPLATES,array('subject'=>'order_cancelled','status'=>'Active'));
				
				if(count($email_template)>0) 
				{
					
					$from 	= $this->config->item('site_settings')->portal_email;
					$to 	= $user[0]->email;
					$sub 	= $this->config->item('site_settings')->site_title 
				. ' - ' . (isset($this->phrases['order'])) ? $this->	phrases['order'] : " ORDER ";
				
					$email_template = $email_template[0];			
					$content 		= $email_template->email_template;
					
					$content     	= str_replace("__NAME__", $order_details[0]->customer_name,$content);

					$content     	= str_replace("__ORDER__NO__", $order_details[0]->order_id,$content);
					
					$content     	= str_replace("__SITE_TITLE__",$this->config->item('site_settings')->site_title,$content);
					
					
					$content 	= str_replace("__ITEM_NAME__", $item_details[0]->item_name,$content);
				
					
					$content 		= str_replace("__CONTACT__EMAIL__", $this->config->item('site_settings')->portal_email,$content);
					$content 		= str_replace("__CONTACT__NO__", $this->config->item('site_settings')->land_line,$content);
				
					$content 		= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
				
					$content 		= str_replace("__COPY_RIGHTS__", $this->config->item('site_settings')->rights_reserved_content,$content);
					
					sendEmail($from, $to, $sub, $content);
				}
					
					$msg = (isset($this->phrases['deleted item from order'])) ? $this->phrases['deleted item from order'] : "Deleted item from order";
					$this->prepare_flashmessage($msg, 0);
				}else{
					$update_data['is_deleted']  = 0;
					$where['op_id'] = $item_recorde_id;
					$this->base_model->update_operation($update_data,TBL_ORDER_PRODUCTS,$where);
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
					$this->prepare_flashmessage($msg, 1);
				}
							
			}else{
				$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
				$this->prepare_flashmessage($msg, 1);
				
			}
		 }else{
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
			$this->prepare_flashmessage($msg, 2);
		 }
		 }else{
			 $item_details = $this->base_model->fetch_records_from(TBL_ORDER_ADDONS,array('oa_id'=>$item_recorde_id));
			 
			 if(!empty($item_details)){
				 $update_data['is_deleted']  = 1;
				$where['oa_id'] = $item_recorde_id;
				if($this->base_model->update_operation($update_data,TBL_ORDER_ADDONS,$where))
				{
					$this->db->where('order_id',$order_id);
					$this->db->set('no_of_items', 'no_of_items-1', FALSE);
					$this->db->set('total_cost', 'total_cost-'.$item_details[0]->final_cost, FALSE);
					if($this->db->update(DBPREFIX.TBL_ORDERS)){
						$msg = (isset($this->phrases['deleted addon from order'])) ? $this->phrases['deleted addon from order'] : "Deleted addon from order";
						$this->prepare_flashmessage($msg, 0);
					}else{
						$update_data['is_deleted']  = 0;
						$where['oa_id'] = $item_recorde_id;
						$this->base_model->update_operation($update_data,TBL_ORDER_ADDONS,$where);
						$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
						$this->prepare_flashmessage($msg, 1);
					}
				}else{
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
					$this->prepare_flashmessage($msg, 1);
				}
			 }else{
				 $msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
				 $this->prepare_flashmessage($msg, 2);
			 }
		 }
		}
		
//		SEND EMAIL REGARDING THE ORDER CANCELLED ITEMS

		redirect(URL_VIEW_ORDERS .DS. $order_id);
	}
} 