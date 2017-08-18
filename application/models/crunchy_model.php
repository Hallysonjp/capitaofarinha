<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Model
*
* Version: 2.5.2
*
* Author:  Ben Edmunds
* 		   ben.edmunds@gmail.com
*	  	   @benedmunds
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  10.01.2009
*
* Last Change: 3.22.13
*
* Changelog:
* * 3-22-13 - Additional entropy added - 52aa456eef8b60ad6754b31fbdcc77bb
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

class Crunchy_model extends CI_Model
{
	/**
	 * Holds an array of tables used
	 *
	 * @var array
	 **/
	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->lang->load('ion_auth');

	}
	
	// Create Offer
    function createOffer($offerData = array())
    {
        $input_data['offer_name']            = $offerData['offer_name'];
        $input_data['offer_cost']            = $offerData['offer_cost'];
        $input_data['offer_start_date']      = date('Y-m-d', strtotime($offerData['offer_start_date']));
        $input_data['offer_valid_date']      = date('Y-m-d', strtotime($offerData['offer_valid_date']));
        $input_data['offer_conditions']      = $offerData['offer_conditions'];
        $input_data['serve_no_of_people']    = $offerData['serve_no_of_people'];
        $no_of_products                      = $offerData['product_count'];
        $input_data['no_of_products']        = $no_of_products - 1;
        $input_data['status']                = $offerData['status'];
        $id                                  = $this->base_model->insert_operation_id($input_data, TBL_OFFERS);
        if ($id) {
            if ($no_of_products > 1) {
                $batch_data = array();
                for ($i = 1; $i < $no_of_products; $i++) {
                    $data['offer_id']    = $id;
                    $data['menu_name']   = $offerData['menu' . $i];
                    $data['item_name']   = $offerData['item_name' . $i];
                    $data['item_id']     = $offerData['item_id' . $i];
                    $data['quantity']    = $offerData['quantity' . $i];
                    array_push($batch_data, $data);
                }
                if ($this->db->insert_batch(DBPREFIX.TBL_OFFER_PRODUCTS, $batch_data)) {
                    return $id;
                }
            }
        } else {
            return false;
        }
    }
    //Edit Offer
    function editOffer($offerId, $offerData = array())
    {
        $input_data['offer_name']         = $offerData['offer_name'];
        $input_data['offer_cost']         = $offerData['offer_cost'];
        $input_data['offer_start_date']   = date('Y-m-d', strtotime($offerData['offer_start_date']));
        $input_data['offer_valid_date']   = date('Y-m-d', strtotime($offerData['offer_valid_date']));
        $input_data['offer_conditions']   = $offerData['offer_conditions'];
        $input_data['serve_no_of_people'] = $offerData['serve_no_of_people'];
        $no_of_products                   = $offerData['product_count'];
        $input_data['no_of_products']     = $no_of_products - 1;
        $input_data['status']             = $offerData['status'];
        $where['offer_id']                = $offerId;
        if ($this->base_model->update_operation($input_data, TBL_OFFERS, $where)) {
            if ($no_of_products > 1) {
                $this->db->where('offer_id', $offerId);
                if ($this->db->delete(DBPREFIX.TBL_OFFER_PRODUCTS)) {
                    $batch_data = array();
                    for ($i = 1; $i < $no_of_products; $i++) {
                        $data['offer_id']    = $offerId;
					    $data['menu_name']   = $offerData['menu' . $i];
						$data['item_id']     = $offerData['item_id' . $i];
                        $data['item_name']   = $offerData['item_name' . $i];
                        $data['quantity']    = $offerData['quantity' . $i];
                        array_push($batch_data, $data);
                    }
                    if ($this->db->insert_batch(DBPREFIX.TBL_OFFER_PRODUCTS, $batch_data)) {
                        return true;
                    }
                }
            }
        } else {
            return false;
        }
    }
	
	/*** Add Options to Item ****/
	
	function addOptions($item_id,$option_count,$options_data = array())
	{
		$item_details = $this->base_model->fetch_records_from(TBL_ITEMS,array('item_id'=>$item_id));
		if (!empty($item_details)) {
			$option_details = $this->base_model->fetch_records_from(TBL_ITEM_OPTIONS,array('item_id'=>$item_id));
			if(!empty($option_details)){
				$where['item_id'] = $item_id;
				$this->base_model->delete_record(DBPREFIX.TBL_ITEM_OPTIONS,$where);
			}
			   
				$batch_data = array();
				for ($i = 1; $i < $option_count; $i++) {
					$data['option_id']      = $options_data['option_id' . $i];
					$data['item_id']     	= $item_id;
					$data['price']          = $options_data['price' . $i];
					
					array_push($batch_data, $data);
				}
				if ($this->db->insert_batch(DBPREFIX.TBL_ITEM_OPTIONS, $batch_data)) {
					return true;
				}else{
					return false;
				}
			
		}else{
			return false;
		}
        
	}
	
	/*** Add Addons to Item ****/
	
	function addAddons($item_id,$addon_count,$addon_data = array())
	{
		$item_details = $this->base_model->fetch_records_from(TBL_ITEMS,array('item_id'=>$item_id));
		if (!empty($item_details)) {
			$addon_details = $this->base_model->fetch_records_from(TBL_ITEM_ADDONS,array('item_id'=>$item_id));
			if(!empty($addon_details)){
				$where['item_id'] = $item_id;
				$this->base_model->delete_record(DBPREFIX.TBL_ITEM_ADDONS,$where);
			}
			   
				$batch_data = array();
				for ($i = 1; $i < $addon_count; $i++) {
					$data['addon_id']       = $addon_data['addon_id' . $i];
					$data['item_id']     	= $item_id;
					
					array_push($batch_data, $data);
				}
				if ($this->db->insert_batch(DBPREFIX.TBL_ITEM_ADDONS, $batch_data)) {
					return true;
				}else{
					return false;
				}
			
		}else{
			return false;
		}
        
	}
	
	function getItemAddons($item_id)
	{
		return $this->base_model->run_query('SELECT a.*,ia.* FROM '.DBPREFIX.TBL_ADDONS.' a,'.DBPREFIX.TBL_ITEM_ADDONS.' ia WHERE ia.item_id='.$item_id.' AND a.status="Active" AND ia.addon_id=a.addon_id');
	}
	
	function getItemOptions($item_id)
	{
		return $this->base_model->run_query('SELECT o.*,io.* FROM '.DBPREFIX.TBL_OPTIONS.' o,'.DBPREFIX.TBL_ITEM_OPTIONS.' io WHERE io.item_id='.$item_id.' AND o.status="Active" AND io.option_id=o.option_id');
	}
	
	
	/*GET CITIES*/
	public function getCities($param = '')
	{
		$cities_rec =  $this->base_model->run_query("SELECT * FROM ".DBPREFIX."pl_cities WHERE  and status = 'Active' order by city_name ");
		
		return $cities_rec; 
		
	}
		
	/* GET SERVICE DELEIVERY LOCATIONS */
	
	function getServiceDeliveryLocation()
	{
		return $serviceLocations = $this->base_model->run_query('SELECT sl.*,c.city_name FROM '.DBPREFIX.'service_provide_locations sl,'.DBPREFIX.'pl_cities c WHERE sl.status="Active" AND c.city_id=sl.city_id AND c.status="Active"');
   }
	
	/* GET SERVICE DELEIVERY CITIES */
	
	function getServiceDeliveryCities()
	{
		return $serviceLocations = $this->base_model->run_query('SELECT distinct c.city_name,c.city_id FROM '.DBPREFIX.'service_provide_locations sl,'.DBPREFIX.'pl_cities c WHERE  sl.status="Active" AND c.city_id=sl.city_id AND c.status="Active"');
	}
}
?>