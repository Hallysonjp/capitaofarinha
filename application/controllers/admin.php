 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller
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
	| MODULE: 			ADMIN
	| -----------------------------------------------------
	| This is Admin module controller file.
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
		$this->load->helper('inflector');
        $this->load->library('upload');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
        $this->lang->load('auth');
        $this->load->helper('language');
		check_access(ADMIN);
    }
    public function index()
    {
        $query  = "SELECT customer_name,order_id,date_created AS posted_date FROM " . DBPREFIX.TBL_ORDERS . " WHERE status='new' ORDER BY order_id DESC LIMIT 4 ";
        $orders = $this->db->query($query)->result();
        if (count($orders) > 0)
            $this->data['orders'] = $orders;
        else
            $this->data['orders'] = array();
		
        $query  = "SELECT offer_name,offer_id,date_of_offer_created AS posted_date FROM " . DBPREFIX.TBL_OFFERS . " WHERE status='Active' ORDER BY offer_id DESC LIMIT 4 ";
        $offers = $this->db->query($query)->result();
        if (count($offers) > 0)
            $this->data['offers'] = $offers;
        else
            $this->data['offers'] = array();
		
        $this->data['active_class'] = ACTIVE_DASHBOARD;
        $this->data['title']        = (isset($this->phrases['dashboard'])) ? $this->phrases['dashboard'] : "";
        $this->data['content']      = PAGE_DASHBOARD;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** Function for Registered Users ***/
    function users()
    {
       
        $users = $this->base_model->fetch_records_from(TBL_USERS, array(
            'id !=' => '1'),'','id','desc');
        if (!empty($users))
            $this->data['users'] = $users;
        else
            $this->data['users'] = array();
		
		 $this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['active_class'] = ACTIVE_USERS;
        $this->data['title']        = (isset($this->phrases['users'])) ? $this->phrases['users'] : "Users";
        $this->data['content']      = PAGE_USERS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
	
    /*** Function for View Users ***/
    function user_details($user_id)
    {
        $usersDetails = $this->base_model->fetch_records_from(TBL_USERS, array('id' => $user_id));
        if (count($usersDetails) > 0)
            $this->data['usersDetails'] = $usersDetails[0];
        else{
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
            $this->prepare_flashmessage($msg, 2);
            redirect(URL_ADMIN_USERS);
		}
            
        $this->data['active_class'] = ACTIVE_USERS;
        $this->data['title']        = (isset($this->phrases['users'])) ? $this->phrases['users'] : "Users";
        $this->data['content']      = PAGE_USER_DETAILS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** Function for End of View Users ***/
	
    /*** Function for Add Menu ***/
    function add_menu()
    {
		
        if ($this->input->post()) 
		{
           
            $this->form_validation->set_rules('menu_name', $this->phrases['menu name'], 'required|xss_clean|is_unique[' . DBPREFIX.TBL_MENU . '.menu_name]');
            $this->form_validation->set_rules('punch_line', $this->phrases['punch line'], 'required|xss_clean');
            $this->form_validation->set_rules('description', $this->phrases['description'], 'required|xss_clean');
			if(empty($_FILES['userfile']['name']))
			{
				$this->form_validation->set_rules('userfile', $this->phrases['menu image'], 'required');
			}
			
			if(!empty($_FILES['userfile']['name'])){
				$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				if(!$ext='jpg'|| !$ext='png' || !$ext='jpeg'){
								
					$this->prepare_flashmessage($this->phrases['invalid file'],2);
					redirect(URL_ADD_MENU,REFRESH);
				}
			}
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if ($this->form_validation->run() == TRUE) {
                $input_data['menu_name'] 	 = $this->input->post('menu_name');
                $input_data['punch_line'] 	 = $this->input->post('punch_line');
                $input_data['description']   = $this->input->post('description');
                $input_data['status']        = $this->input->post('status');
                $id                          = $this->base_model->insert_operation_id($input_data, TBL_MENU);
                if ($id) {
                    if (!empty($_FILES['userfile']['name'])) {
                        
                        $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
							$config['file_name'] 		= MENU.'_'.$id.'.' . $ext;
							$config['upload_path']   = IMG_MENU;
							$config['allowed_types'] = ALLOWED_TYPES;
							$config['overwrite'] = true;
							$this->load->library('upload');
							$this->upload->initialize($config);
                        if ($this->upload->do_upload()) {
                            $where['menu_id']        = $id;
                            $data['menu_image_name'] 	 = MENU.'_'.$id.'.' . $ext;
                            $this->base_model->update_operation($data, TBL_MENU, $where);
							
							$this->create_thumbnail(IMG_MENU.MENU.'_'.$id.'.' . $ext,IMG_MENU_THUMB,100,100);
														
							$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
                            $this->prepare_flashmessage($msg,0);
                            
							redirect(URL_ADMIN_MENU);
                        } else {
                            $this->prepare_flashmessage($this->upload->display_errors(), 1);
                        
                        }
                    }
                } else {
					$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADMIN_MENU);
                }
            }
			
        }
		
        
        $this->data['active_class'] = ACTIVE_MENU;
        $this->data['title']        = (isset($this->phrases['add menu'])) ? $this->phrases['add menu'] : "Add Menu";
        $this->data['content']      = PAGE_ADD_MENU;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** Function for Edit Menu ***/
    function edit_menu($menu_id = false)
    {
        if ($this->input->post()) {
             $menu_id = $this->input->post('menu_id');									
            $this->form_validation->set_rules('menu_name', $this->phrases['menu name'], 'required|xss_clean|callback_checkduplicate[menu_name,'.TBL_MENU.']');
			
            $this->form_validation->set_rules('punch_line', $this->phrases['punch line'], 'required|xss_clean');
            $this->form_validation->set_rules('description', $this->phrases['description'], 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run()==true){
            $update_data['menu_name'] 	  = $this->input->post('menu_name');
            $update_data['punch_line'] 	  = $this->input->post('punch_line');
            $update_data['description']   = $this->input->post('description');
            $update_data['status']        = $this->input->post('status');
            $id                           = $this->input->post('menu_id');
            $where['menu_id']         	  = $id;
            if ($this->base_model->update_operation($update_data, TBL_MENU, $where)) {
                if (!empty($_FILES['userfile']['name'])) {
					 $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                    $config['upload_path']   = IMG_MENU;
                    $config['allowed_types'] = ALLOWED_TYPES;
                    $config['overwrite']     = true;
                    $config['file_name'] 	 = MENU.'_'.$id.'.' . $ext;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload()) {
                        $data['menu_image_name'] = MENU.'_'.$id.'.' . $ext;
						$this->create_thumbnail(IMG_MENU.MENU.'_'.$id.'.' . $ext,IMG_MENU_THUMB,100,100);
                        if ($this->base_model->update_operation($data, TBL_MENU, $where)) {
                           $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_ADMIN_MENU, REFRESH);
                        }
                    } else {
                        $this->prepare_flashmessage($this->upload->display_errors(), 1);
                        $menu_id = $this->input->post('menu_id');
                    }
                } else {
                    $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
                    redirect(URL_ADMIN_MENU, REFRESH);
                }
            } else {
                $msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
				$this->prepare_flashmessage($msg, 1);
                redirect(URL_ADMIN_MENU, REFRESH);
            }
			}
			else{
				$this->prepare_flashmessage(validation_errors(),1);
			}
        }
        $result = $this->base_model->fetch_records_from(TBL_MENU, array(
            'menu_id' => $menu_id
        ));
        if (count($result) > 0) {
            $this->data['result'] = $result[0];
        } else {
           $msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
		   $this->prepare_flashmessage($msg, 2);
            redirect(URL_ADMIN_MENU, REFRESH);
        }
        
        $this->data['active_class'] = ACTIVE_MENU;
        $this->data['title']        = (isset($this->phrases['edit menu'])) ? $this->phrases['edit menu'] : "Edit Menu";
        $this->data['content']      = PAGE_EDIT_MENU;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** Function to List Menus ***/
    function menu()
    {
       
	   $this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
        $this->data['menus']   		= $this->base_model->fetch_records_from(TBL_MENU,'','','menu_id','desc');
		
        $this->data['active_class'] = ACTIVE_MENU;
        $this->data['title']        = (isset($this->phrases['menu'])) ? $this->phrases['menu'] : "Menu";
        $this->data['content']      = PAGE_MENUS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** Function for Delete Categories ***/
    function delete_menu()
    {
       
        $menu_id        = $this->input->post('menu_id');
		
        $items = $this->base_model->fetch_records_from(TBL_ITEMS,array('menu_id'=>$menu_id));
               
        if (count($items) > 0 ) {
            $this->prepare_flashmessage('You cannot delete the Menu, since items are there for this menu', 2);
            redirect(URL_ADMIN_MENU, REFRESH);
        } else {
           
            if ($this->base_model->check_duplicate(TBL_MENU, 'menu_id', $menu_id) && is_numeric($menu_id)) {
				$where['menu_id'] 		= $menu_id;
                $res = $this->base_model->fetch_single_column_value(TBL_MENU, 'menu_image_name', $where);
				if(count($res)>0 && $res!=''){
					
					if (file_exists(IMG_MENU . $res)) {
						unlink(IMG_MENU . $res);
						if (file_exists(IMG_MENU_THUMB . $res)){
							unlink(IMG_MENU_THUMB . $res);
						}
					}
				}
                if ($this->base_model->delete_record(TBL_MENU, $where)) {
					$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
					$this->prepare_flashmessage($msg, 0);
                    redirect(URL_ADMIN_MENU, REFRESH);
                } else {
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
                    $this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADMIN_MENU, REFRESH);
                }
            } else {
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
                    $this->prepare_flashmessage($msg, 1);
					redirect(URL_ADMIN_MENU, REFRESH);
            }
        }
    } 
   
    
    /*** Function For Adding Items ****/
    function add_item()
    {
        if ($this->input->post()) {
			
            $this->form_validation->set_rules('menu_name', $this->phrases['menu'], 'required|xss_clean');
            $this->form_validation->set_rules('item_name', $this->phrases['item name'], 'required|xss_clean');
            $this->form_validation->set_rules('item_cost', $this->phrases['item cost'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('item_type', $this->phrases['item type'], 'required|xss_clean');
            $this->form_validation->set_rules('description', $this->phrases['description'], 'required|xss_clean');
            
            if(empty($_FILES['userfile']['name']))
			{
				$this->form_validation->set_rules('userfile', $this->phrases['item image'], 'required');
			}
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
            if ($this->form_validation->run() == TRUE) {
                $input_data['menu_id']      	= $this->input->post('menu_name');
                $input_data['item_name']        = $this->input->post('item_name');
                $input_data['item_cost']        = $this->input->post('item_cost');
                $input_data['item_type']        = $this->input->post('item_type');
                $input_data['item_description'] = $this->input->post('description');
                $input_data['status']           = $this->input->post('status');
                $id                             = $this->base_model->insert_operation_id($input_data, TBL_ITEMS);
                if ($id) {
                    if (!empty($_FILES['userfile']['name'])) {
						 $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                        $config['upload_path']   = IMG_ITEMS;
                        $config['allowed_types'] = ALLOWED_TYPES;
                        $config['overwrite']     = true;
                        $config['file_name']     = ITEM . "_" . $id . "." . $ext;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload()) {
                            $where['item_id']          = $id;
                            $update_data['item_image_name'] = ITEM . "_" . $id . "." . $ext;
							
							$this->create_thumbnail(IMG_ITEMS.ITEM.'_'.$id.'.' . $ext,IMG_ITEMS_THUMB,100,100);
							
                            $this->base_model->update_operation($update_data, TBL_ITEMS, $where);
							$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_ADMIN_ITEMS, REFRESH);
                        } else {
                            $this->prepare_flashmessage($this->upload->display_errors(), 1);
                            redirect(URL_ADMIN_ITEMS);
                        }
                    }
                } else {
					$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
                    $this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADMIN_ITEMS, REFRESH);
                }
            }
        }
       
        $this->data['menus']   		= $this->base_model->prepareDropdown(TBL_MENU, 'menu_id', 'menu_name', array(
            'status' => 'Active'
        ));
        $this->data['active_class'] = ACTIVE_ITEMS;
        $this->data['title']        = (isset($this->phrases['add item'])) ? $this->phrases['add item'] : "Add Item";
        $this->data['content']      = PAGE_ADD_ITEM;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** End Of Adding Items ****/
    /*** Editing Items ****/
    function edit_item($item_id = null)
    {
        if ($this->input->post()) {
			
			// FOR SAVING THE OPTIONS DATA
			if($this->input->post('option')){
								
			$item_id = $this->input->post('item_id');
			 $this->form_validation->set_rules('option_counts','Option Count' , 'required|numeric|xss_clean');
			  $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
             if ($this->form_validation->run() == TRUE) {
				 $option_count = $this->input->post('option_count');
				if($this->crunchy_model->addOptions($item_id,$option_count,$this->input->post())){
					$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_EDIT_ITEMS.DS.$item_id);
				}else{
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_EDIT_ITEMS.DS.$item_id);
				}
			 }else{
				 $this->prepare_flashmessage(validation_errors(),1);
				 redirect(URL_EDIT_ITEMS.DS.$item_id);
			 }
			}
			
			// FOR SAVING THE ADDONS ITEM DATA
			if($this->input->post('addon'))
			{
				$item_id = $this->input->post('item_id');
				$this->form_validation->set_rules('addon_counts','Option Count' , 'required|numeric|xss_clean');
			  $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == TRUE) {
				$addon_count = $this->input->post('addon_count');
				if($this->crunchy_model->addAddons($item_id,$addon_count,$this->input->post())){
					$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_EDIT_ITEMS.DS.$item_id);
				}else{
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_EDIT_ITEMS.DS.$item_id);
				}
			 }else{
				 $this->prepare_flashmessage(validation_errors(),1);
				 redirect(URL_EDIT_ITEMS.DS.$item_id.'#addons');
			 }
			}
			
			$item_id = $this->input->post('item_id');
            $this->form_validation->set_rules('menu_name', $this->phrases['menu name'], 'required|xss_clean');
            $this->form_validation->set_rules('item_name', $this->phrases['item name'], 'required|xss_clean|callback_checkduplicate[item_name,'.TBL_ITEMS.']');
            $this->form_validation->set_rules('item_cost', $this->phrases['item cost'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('item_type', $this->phrases['item type'], 'required|xss_clean');
            $this->form_validation->set_rules('description', $this->phrases['description'], 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if ($this->form_validation->run() == TRUE) {
                $input_data['menu_id']      	= $this->input->post('menu_name');
                $input_data['item_name']        = $this->input->post('item_name');
                $input_data['item_cost']        = $this->input->post('item_cost');
                $input_data['item_type']        = $this->input->post('item_type');
                $input_data['item_description'] = $this->input->post('description');
                $input_data['status']           = $this->input->post('status');
                $id                             = $this->input->post('item_id');
                $where['item_id']               = $id;
                if ($this->base_model->update_operation($input_data, TBL_ITEMS, $where)) {
                    if (!empty($_FILES['userfile']['name'])) {
                         $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                        $config['upload_path']   = IMG_ITEMS;
                        $config['allowed_types'] = ALLOWED_TYPES;
                        $config['overwrite']     = true;
                        $config['file_name']     = ITEM . "_" . $id . "." . $ext;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
										
                        if ($this->upload->do_upload()) {
							$data['item_image_name'] = ITEM.'_'.$id.'.' . $ext;
							$this->create_thumbnail(IMG_ITEMS.ITEM.'_'.$id.'.' . $ext,IMG_ITEMS_THUMB,100,100);
                        if ($this->base_model->update_operation($data, TBL_ITEMS, $where)) {
							$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_EDIT_ITEMS.DS.$item_id);
						}
                        } else {
							$this->prepare_flashmessage($this->upload->display_errors(), 1);
                            $item_id = $this->input->post('item_id');
                        }
                    } else {
                        $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
						$this->prepare_flashmessage($msg, 0);
                        redirect(URL_EDIT_ITEMS.DS.$item_id);
                    }
                } else {
                    $msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_EDIT_ITEMS.DS.$item_id);
                }
            }
        }
        
       
        $item   = $this->base_model->fetch_records_from(TBL_ITEMS, array(
            'item_id' => $item_id
        ));
        if (count($item) < 1) {
            $msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
			$this->prepare_flashmessage($msg, 2);
            redirect(URL_ADMIN_ITEMS, REFRESH);
        }
		$this->data['menus'] = $this->base_model->prepareDropdown(TBL_MENU, 'menu_id', 'menu_name', array(
            'status' => 'Active'
        ));
		
		$this->data['option'] = $this->base_model->prepareDropdown(TBL_OPTIONS, 'option_id', 'option_name', array(
            'status' => 'Active'
        ));
		
		$this->data['addons'] = $this->base_model->prepareDropdownAddon();
		
		$this->data['item_options'] = $this->crunchy_model->getItemOptions($item_id);
		$this->data['item_addons'] = $this->crunchy_model->getItemAddons($item_id);
		$this->data['message']  = $this->session->flashdata('message');
        $this->data['item']         = $item[0];
        $this->data['active_class'] = ACTIVE_ITEMS;
        $this->data['title']        = (isset($this->phrases['edit item'])) ? $this->phrases['edit item'] : "Edit Item";
        $this->data['content']      = PAGE_EDIT_ITEM;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** End of Editing Items ****/
    /*** Delete Item ****/
    function delete_item()
    {
        if ($this->input->post()) {
			
			$item_id = $this->input->post('item_id');
						
				$item_id          = $this->input->post('item_id');
				$where['item_id'] = $item_id;
				$res              = $this->base_model->fetch_single_column_value(TBL_ITEMS, 'item_image_name', $where);
				if (file_exists(IMG_ITEMS . $res)) {
					unlink(IMG_ITEMS . $res);
					if (file_exists(IMG_ITEMS_THUMB . $res)){
							unlink(IMG_ITEMS_THUMB . $res);
						}
				}
				
				$where['item_id'] = $this->input->post('item_id');
				if ($this->base_model->delete_record(TBL_ITEMS, $where)) {
					$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_ADMIN_ITEMS, REFRESH);
				} else {
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_ADMIN_ITEMS, REFRESH);
				}
			
			
        } else {
            redirect(URL_ADMIN_ITEMS, REFRESH);
        }
    }
    /*** End of Delete Item ****/
    /*** Items ****/
    function items()
    {
      
        $this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$items = $this->base_model->run_query('SELECT i.*,m.menu_name from '.DBPREFIX.TBL_ITEMS.' i,'.DBPREFIX.TBL_MENU.' m WHERE i.menu_id=m.menu_id order by item_id desc');
		if(count($items)>0){
			$items = $items;
		}else{
			$items = array();
		}
        $this->data['items']        = $items;
        $this->data['active_class'] = ACTIVE_ITEMS;
        $this->data['title']        = (isset($this->phrases['items'])) ? $this->phrases['items'] : "Items";
        $this->data['content']      = PAGE_ITEMS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** End Of Items ****/
   
    /*** Create Offer ****/
    function create_offer()
    {
       
        if ($this->input->post()) {
            $this->form_validation->set_rules('offer_name', $this->phrases['offer name'], 'required|xss_clean');
            $this->form_validation->set_rules('offer_cost', $this->phrases['offer cost'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('offer_start_date', $this->phrases['offer start date'], 'required|xss_clean');
            $this->form_validation->set_rules('offer_valid_date', $this->phrases['offer valid date'], 'required|xss_clean');
            $this->form_validation->set_rules('offer_conditions', $this->phrases['offer conditions'], 'required|xss_clean');
            $this->form_validation->set_rules('serve_no_of_people', $this->phrases['serve no of people'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('product_count', $this->phrases['product count'], 'required|numeric|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if ($this->form_validation->run() == TRUE) {
                $id = $this->crunchy_model->createOffer($this->input->post());
                if ($id) {
                    if (!empty($_FILES['userfile']['name'])) {
						$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                        $config['upload_path']   = IMG_OFFER;
                        $config['allowed_types'] = ALLOWED_TYPES;
                        $config['overwrite']     = true;
                        $config['file_name']     = OFFER. "_" . $id . "." . $ext;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload()) {
                            $where['offer_id']          = $id;
                            $update_data['offer_image_name'] =  OFFER. "_" . $id . "." . $ext;
                            $this->base_model->update_operation($update_data, TBL_OFFERS, $where);
                            $msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_ADMIN_OFFERS,REFRESH);
                        } else {
                            $this->prepare_flashmessage($this->upload->display_errors(), 1);
                            redirect(URL_ADMIN_OFFERS);
                        }
                    }
                } else {
                    $msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADMIN_OFFERS,REFRESH);
                }
            }
        }
        
        $this->data['categories']   = $this->base_model->prepareDropdown(TBL_MENU, 'menu_id', 'menu_name', array(
            'status' => 'Active'
        ));
        $this->data['active_class'] = ACTIVE_OFFERS;
        $this->data['title']        = (isset($this->phrases['create offer'])) ? $this->phrases['create offer'] : "Create Offer";
        $this->data['content']      = PAGE_CREATE_OFFER;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** End of Create Offer ****/
    /*** Edit Offer ****/
     function edit_offer($offerId = null)
    {
        if ($this->input->post()) {
            $offerId = $this->input->post('offer_id');
            $this->form_validation->set_rules('offer_name', $this->phrases['offer name'], 'required|xss_clean');
            $this->form_validation->set_rules('offer_cost', $this->phrases['offer cost'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('offer_start_date', $this->phrases['offer start date'], 'required|xss_clean');
            $this->form_validation->set_rules('offer_valid_date', $this->phrases['offer valid date'], 'required|xss_clean');
            $this->form_validation->set_rules('offer_conditions', $this->phrases['offer conditions'], 'required|xss_clean');
            $this->form_validation->set_rules('serve_no_of_people', $this->phrases['serve no of people'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('product_count', $this->phrases['product count'], 'required|numeric|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('offer_id');
                if ($this->crunchy_model->editOffer($id, $this->input->post())) {
                    if (!empty($_FILES['userfile']['name'])) {
                        $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                        $config['upload_path']   = IMG_OFFER;
                        $config['allowed_types'] = ALLOWED_TYPES;
                        $config['overwrite']     = true;
                        $config['file_name']     = OFFER. "_" . $id . "." . $ext;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload()) {
                            $where['offer_id']          = $id;
                            $update_data['offer_image_name'] = OFFER. "_" . $id . "." . $ext;
                            $this->base_model->update_operation($update_data, TBL_OFFERS, $where);
                            $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_ADMIN_OFFERS,REFRESH);
                        } else {
                            $this->prepare_flashmessage($this->upload->display_errors(), 1);
                            redirect(URL_ADMIN_OFFERS);
                        }
                    } else {
                        $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
						$this->prepare_flashmessage($msg, 0);
                        redirect(URL_ADMIN_OFFERS,REFRESH);
                    }
                } else {
                    $msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADMIN_OFFERS,REFRESH);
                }
            }
        } 
		
        if ($offerId == null) {
            redirect(URL_ADMIN_OFFERS);
        }
		
        $this->data['message'] = $this->session->flashdata('message');
        $offer                 = $this->base_model->fetch_records_from(TBL_OFFERS, array(
            'offer_id' => $offerId
        ));
        if (count($offer) > 0) {
            $this->data['offer']         = $offer[0];
            $this->data['offerProducts'] = $this->base_model->fetch_records_from(TBL_OFFER_PRODUCTS, array('offer_id' => $offerId));
        }else{
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
			$this->prepare_flashmessage($msg, 2);
			redirect(URL_ADMIN_OFFERS);	
		}
        $this->data['categories']   = $this->base_model->prepareDropdown(TBL_MENU, 'menu_id', 'menu_name', array(
            'status' => 'Active'
        ));
        $this->data['active_class'] = ACTIVE_OFFERS;
        $this->data['title']        = (isset($this->phrases['edit offer'])) ? $this->phrases['edit offer'] : "Edit Offer";
        $this->data['content']      = PAGE_EDIT_OFFER;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    } 
    /*** End of Edit Offer ****/
    /*** Delete Offer ****/
    function delete_offer()
    {
        $offer_id          = $this->input->post('offer_id');
        $where['offer_id'] = $offer_id;
        $res               = $this->base_model->fetch_single_column_value('offers', 'offer_image_name', $where);
        if (file_exists(IMG_OFFER . $res)) {
            unlink(".".DS.IMG_OFFER . $res);
        }
        $this->db->where('offer_id', $offer_id);
        if ($this->db->delete($this->db->dbprefix('offers'))) {
            $this->db->where('offer_id', $offer_id);
            if ($this->db->delete($this->db->dbprefix('offer_products'))) {
                $msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
				$this->prepare_flashmessage($msg, 0);
                redirect(URL_ADMIN_OFFERS);
            } else {
                $msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
                $this->prepare_flashmessage($msg, 1);
                redirect(URL_ADMIN_OFFERS);
            }
        } else {
            $msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
            $this->prepare_flashmessage($msg, 1);
            redirect(URL_ADMIN_OFFERS);
        }
    }
    /*** End of Delete Offer ****/
    /*** View Offers ****/
    function offers()
    {
        $this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['offers']       = $this->base_model->fetch_records_from('offers','','','offer_id','desc');
        $this->data['active_class'] = ACTIVE_OFFERS;
        $this->data['title']        = (isset($this->phrases['offers'])) ? $this->phrases['offers'] : "";
        $this->data['content']      = PAGE_OFFERS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    /*** End of View Offers ****/
	
	/*** View Offer Details ****/
	function offer_details($offer_id)
	{
		$offer_details = $this->base_model->fetch_records_from(TBL_OFFERS,array('offer_id'=>$offer_id));
		
		if(!empty($offer_details)){
			$offer_products = $this->base_model->fetch_records_from(TBL_OFFER_PRODUCTS,array('offer_id'=>$offer_id));
			if(!empty($offer_products)){
				$this->data['offer_products'] = $offer_products;
			}else{
				$this->data['offer_products'] = array();
			}
			
			$this->data['offer_details'] = $offer_details[0];
			$this->data['active_class'] = ACTIVE_OFFERS;
			$this->data['title']        = (isset($this->phrases['offers'])) ? $this->phrases['offers'] : "Offers";
			$this->data['content']      = PAGE_OFFER_DETAILS;
			$this->_render_page(TEMPLATE_ADMIN, $this->data);
		}else{
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
            $this->prepare_flashmessage($msg, 2);
            redirect(URL_ADMIN_OFFERS);
		}
	}
	/*** End of View Offer Details ****/
	
	/*** Change Profile ****/
	 function profile()
	{
		if($this->input->post()){
			$this->form_validation->set_rules('first_name', $this->phrases['first name'], 'required|xss_clean');	
			$this->form_validation->set_rules('last_name', $this->phrases['last name'], 'required|xss_clean');	
			$this->form_validation->set_rules('phone', $this->phrases['phone'], 'required|numeric|xss_clean');
			
			if($this->form_validation->run()==true)
			{
				$update_data['first_name'] 	= $this->input->post('first_name'); 
				$update_data['last_name'] 	= $this->input->post('last_name'); 
				$update_data['username']   = $this->input->post('first_name').' '.$this->input->post('last_name');
				$update_data['phone'] 		= $this->input->post('phone'); 
				$where['id']                = $this->ion_auth->get_user_id();
				if($this->base_model->update_operation($update_data,TBL_USERS,$where)){
					 $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_PROFILE, REFRESH);
				}else{
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_PROFILE, REFRESH);
				}
			}else{
				$this->prepare_flashmessage(validation_errors(),1);
			}				
		}
		$user_id = $this->ion_auth->get_user_id();
		 $user	=	$this->base_model->fetch_records_from(TBL_USERS,array('id'=>$user_id));
		 if(count($user)>0){
			 $this->data['user'] = $user[0];
		 }
		  $this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		 $this->data['title']	= (isset($this->phrases['profile'])) ? $this->phrases['profile'] : "Profile";
		 
		$this->data['content'] = PAGE_PROFILE;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
		  
	} 
	
    /*** Function for Change Password ***/
    function change_password()
    {        
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new_password', $this->lang->line('change_password_validation_new_password_label'), 'required|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $user = $this->ion_auth->user()->row();
        if ($this->form_validation->run() == false) {
            // display the form
            // set the flash data error message if there is one
            $this->data['message'] = $this->session->flashdata('message');
            
            $this->data['title']   = (isset($this->phrases['change password'])) ? $this->phrases['change password'] : "Change Password";
            $this->data['content'] = PAGE_CHANGE_PASSWORD;
            $this->_render_page(TEMPLATE_ADMIN, $this->data);
        } else {
            $identity = $this->session->userdata('identity');
            $change   = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new_password'));
            if ($change) {
                // if the password was successfully changed
                $this->prepare_flashmessage($this->ion_auth->messages(), 0);
                redirect(URL_LOGIN,REFRESH);
            } else {
                $this->prepare_flashmessage($this->ion_auth->errors(), 1);
                redirect(URL_ADMIN_CHANGE_PASSWORD, REFRESH);
            }
        }
    }
    
    //Get Items on Ajax call
    function get_items()
    {
        $menu_id    = $this->input->post('menu_id');
        
        $res      = $this->base_model->fetch_records_from(TBL_ITEMS, array(
            'menu_id' => $menu_id,
            'status' => 'Active'
        ));
        $options  = "";
        foreach ($res as $l) {
            $options = $options . "<option value='" . $l->item_id . "'>" . $l->item_name . "</option>";
        }
        if ($options != "")
            echo "<option value=''>" . $this->phrases['select item'] . "</option>" . $options;
        else
            echo "<option value=''>" . $this->phrases['no items available'] . "</option>";
    }
	
	function languages($param = '', $param1 = '')
	{		
		$this->data['message'] 					= (validation_errors()) ? 
		validation_errors() : $this->session->flashdata('message');
		
		if ($param 								== "delete") {
			$where['id'] 						= $param1;
			$cond 								= "id";
			$cond_val 							= $param1;
			if ($this->base_model->check_duplicate(
			TBL_LANGUAGES, $cond, $cond_val) && is_numeric($param1)) {
				if ($this->base_model->delete_record(TBL_LANGUAGES, $where)) {
					$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_LANGUAGES, REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to Delete";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_LANGUAGES, REFRESH);
				}
			}
			else {
				$msg = (isset($this->phrases['invalid operation'])) ? $this->phrases['invalid operation'] : "Invalid Operation";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_LANGUAGES, REFRESH);
			}
		}
		elseif ($param 							== "") {
			$this->data['langs'] 				= $this->base_model->fetch_records_from(TBL_LANGUAGES);
			$this->data['active_class'] 		= ACTIVE_LANGUAGES;
			$this->data['title'] 				= (isset($this->phrases['languages'])) ? $this->phrases['languages'] : 'Languages';
			$this->data['content'] 				= PAGE_LIST_LANG;
		}

		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	/*** Function for Add Language ***/
	function add_edit_lang($param = '')
	{		
		$this->data['message'] 					= (validation_errors()) ? 
		validation_errors() : $this->session->flashdata('message');
		
		if ($this->input->post()) {
			$this->form_validation->set_rules(
			'language_name', 
			$this->phrases['language name'], 
			'required|xss_clean');
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() 	== TRUE) {
				$input_data['lang_name'] 		= strtolower(
				$this->input->post('language_name'));
				$input_data['lang_code'] 			= strtolower($this->input->post('lang_code'));
				$input_data['status'] 			= $this->input->post('status');

				// check whether the language is already exist or not--
				if(!$this->input->post('update_rec_id')){
					$languages 						= $this->base_model->fetch_records_from(TBL_LANGUAGES,array('lang_name'=>$this->input->post('language_name')));
									
					if (count($languages) > 0) {
						$msg = (isset($this->phrases['already existed'])) ? $this->phrases['already existed'] : "Already existed";
						$this->prepare_flashmessage($msg, 2);
						redirect(URL_ADMIN_ADD_LANG, REFRESH);
					}
					
					if ($this->base_model->insert_operation($input_data,TBL_LANGUAGES)) 
					{
						$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
						$this->prepare_flashmessage($msg, 0);
						redirect(URL_LANGUAGES, REFRESH);
					}
					else {
						$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
						$this->prepare_flashmessage($msg, 1);
						redirect(URL_LANGUAGES, REFRESH);
					}
				}else{
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($input_data,TBL_LANGUAGES,$where)) 
					{
						$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
						$this->prepare_flashmessage($msg, 0);
						redirect(URL_LANGUAGES, REFRESH);
					}
					else {
						$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
						$this->prepare_flashmessage($msg, 1);
						redirect(URL_LANGUAGES, REFRESH);
					}
				}
				
			}
		}
		$this->data['title'] 					= (isset($this->phrases['add language'])) ? $this->phrases['add language'] : 'Add Language';
		if($param!=''){
			$lang_rec 						= $this->base_model->fetch_records_from(TBL_LANGUAGES,array('id'=>$param));
			if(count($lang_rec)>0)
			{
				$this->data['lang_rec'] = $lang_rec[0]; 
				$this->data['title'] 					= (isset($this->phrases['edit language'])) ? $this->phrases['edit language'] : 'Edit Language';
			}else{
				$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
				$this->prepare_flashmessage($msg, 2);
				redirect(URL_LANGUAGES);
			}
		}
		
		$this->data['active_class'] 			= ACTIVE_LANGUAGES;
		
		$this->data['content'] 					= PAGE_ADD_LANG;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	/*** Function for listing phrases ****/
	function phrases($param = '', $param1 = '')
	{
		
		$this->data['message'] 					= (validation_errors()) ? 
		validation_errors() : $this->session->flashdata('message');
		
		$this->data['phrases'] 				= $this->base_model->fetch_records_from(TBL_PHRASES,'','','id','desc');
		$this->data['active_class'] 		= ACTIVE_LANGUAGES;
		$this->data['title'] 				= (isset($this->phrases['phrases'])) ? $this->phrases['phrases'] : 'Phrases';
		$this->data['content'] 				= PAGE_LIST_PHRASES;
		

		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	/*** Function for Add Phrase ***/
	function add_edit_phrase($param = '')
	{
		
		$this->data['message'] 					= (validation_errors()) ? 
		validation_errors() : $this->session->flashdata('message');
		
		if ($this->input->post()) {
			$this->form_validation->set_rules(
			'phrase_name', 
			$this->phrases['phrase'],
			'required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if ($this->form_validation->run() 	== TRUE) {
				$input_data['text'] 			= $this->input->post('phrase_name');
				if($this->input->post('phrase_type')=='app'){
					$input_data['text'] 			= camelize($this->input->post('phrase_name'));
				}
				
				$input_data['phrase_type'] 		= $this->input->post('phrase_type');
				
				if(!$this->input->post('update_rec_id')){
				$phrases 						= $this->base_model->fetch_records_from(TBL_PHRASES,array('text'=>$input_data['text'],'phrase_type'=>$this->input->post('phrase_type')));
								
				if (count($phrases) > 0) {
					$msg = (isset($this->phrases['already existed'])) ? $this->input->post('phrase_name').' '.$this->phrases['phrase'].' '.$this->phrases['already existed'] : "Already Existed";
					$this->prepare_flashmessage($msg, 2);
					redirect(URL_ADMIN_ADD_PHRASE);
				}
				$id = 	$this->base_model->insert_operation_id($input_data,TBL_PHRASES );
				if ($id ) {
					$this->base_model->insert_operation( 
					array('lang_id' 			=> 1,
						'phrase_id' 			=> $id,
						'phrase_type'			=> $this->input->post('phrase_type'),
						'text' 					=> $this->input->post('phrase_name')
					),TBL_MULTI_LANG);
					$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_PHRASES, REFRESH);
				}
				else {
					$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_PHRASES);
				}
			 }else{
					$where['id'] = $this->input->post('update_rec_id');
					if ($this->base_model->update_operation($input_data,TBL_PHRASES,$where)) 
					{
						$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
						$this->prepare_flashmessage($msg, 0);
						redirect(URL_PHRASES, REFRESH);
					}
					else {
						$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
						$this->prepare_flashmessage($msg, 1);
						redirect(URL_PHRASES, REFRESH);
					}
			 }
			}
		}
		
		$this->data['title']					= (isset($this->phrases['add phrase'])) ? $this->phrases['add phrase'] : "Add Phrase";
		if($param!='' && is_numeric($param)){
			$phrase_rec = $this->base_model->fetch_records_from(TBL_PHRASES,array('id'=>$param));
			if(count($phrase_rec)>0){
				$this->data['phrase_rec'] = $phrase_rec[0];
				$this->data['title']					= (isset($this->phrases['edit phrase'])) ? $this->phrases['edit phrase'] : "Edit Phrase";
			}else{
				$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
					$this->prepare_flashmessage($msg, 2);
					redirect(URL_PHRASES);
			}
		}
		
		$this->data['active_class'] 			= ACTIVE_LANGUAGES;
			
		$this->data['content'] 					= PAGE_ADD_PHRASE;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}

	/*** Function for Edit Phrases ***/
	function update_web_phrases($param = '', $param1 = 1)
	{
		
		$this->data['message'] 					= (validation_errors()) ? 
		validation_errors() : $this->session->flashdata('message');
		if ($this->input->post()) {

			// check whether existed phrases are present in table and delete them.
			$existed_phrases 					= $this->base_model->fetch_records_from(TBL_MULTI_LANG,array('lang_id'=>$param,'phrase_type'=>'web'));
						
			if (count($existed_phrases) > 0) {
				foreach($existed_phrases as $r) {
					$this->base_model->delete_record(DBPREFIX.TBL_MULTI_LANG, array('id'=> ($r->id)));
				}
			}

			// inserting new phrases

			$records 							= array();
			$data 								= $this->input->post();
			foreach( $data as $key 				=> $value ) {
				array_push($records, array(
					"lang_id" 					=> $param,
					"phrase_id" 				=> $key,
					"phrase_type" 				=> 'web',
					"text" 						=> $value
				));
			}

			if ($this->db->insert_batch(DBPREFIX.TBL_MULTI_LANG,$records)) {
				$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
				$this->prepare_flashmessage($msg, 0);
				redirect(URL_LANGUAGES, REFRESH);
			}
			else {
				$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_LANGUAGES);
			}
		}

		$language_id 							= $param1;
		$phrases 								= $this->base_model->run_query(
		"SELECT p.id,p.text, ml.text as existing_text FROM " . DBPREFIX.TBL_PHRASES
		 . " p LEFT OUTER JOIN " . 
		DBPREFIX.TBL_MULTI_LANG . " ml ON ml.phrase_id=p.id 
		AND  ml.lang_id=" . $language_id." WHERE p.phrase_type='web'");
		
		if (count($phrases) 					== 0) {
			echo "True";
			$phrases 							= $this->base_model->run_query(
			"SELECT p.*, p.text AS existing_text FROM " . 
			DBPREFIX.TBL_MULTI_LANG . " p");
		}
			
			
		$lang_name 				= $this->base_model->fetch_records_from(
		TBL_LANGUAGES, array('id'=> $language_id));
		
		if(empty($lang_name)){
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
			$this->prepare_flashmessage($msg, 2);	
			redirect(URL_LANGUAGES);
		}
		$this->data['language_id'] 				= $language_id;
		$this->data['language_name'] 			= $lang_name[0]->lang_name;
		$this->data['phrases'] 					= $phrases;
		
		$this->data['active_class'] 			= ACTIVE_LANGUAGES;
		$this->data['title'] 					= (isset($this->phrases['edit web phrases'])) ? $this->phrases['edit web phrases'] : 'Edit Web Phrases';
		$this->data['content'] 					= PAGE_WEB_PHRASE_LIST;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	// APP PHRASES List
	function update_app_phrases($param = '', $param1 = 1)
	{
		
		$this->data['message'] 					= (validation_errors()) ? 
		validation_errors() : $this->session->flashdata('message');
		if ($this->input->post()) {

			// check whether existed phrases are present in table and delete them.
			$existed_phrases 					= $this->base_model->fetch_records_from(TBL_MULTI_LANG,array('lang_id'=>$param,'phrase_type'=>'app'));
						
			if (count($existed_phrases) > 0) {
				foreach($existed_phrases as $r) {
					$this->base_model->delete_record(DBPREFIX.TBL_MULTI_LANG, array('id'=> ($r->id)));
				}
			}

			// inserting new phrases

			$records 							= array();
			$data 								= $this->input->post();
			foreach( $data as $key 				=> $value ) {
				array_push($records, array(
					"lang_id" 					=> $param,
					"phrase_id" 				=> $key,
					"phrase_type" 				=> 'app',
					"text" 						=> $value
				));
			}

			if ($this->db->insert_batch(DBPREFIX.TBL_MULTI_LANG,$records)) {
				$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
				$this->prepare_flashmessage($msg, 0);
				redirect(URL_LANGUAGES, REFRESH);
			}
			else {
				$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_LANGUAGES);
			}
		}

		$language_id = $param1;
		$phrases = $this->base_model->run_query("SELECT p.id,p.text, ml.text as existing_text FROM ".DBPREFIX.TBL_PHRASES. " p LEFT JOIN ".DBPREFIX.TBL_MULTI_LANG." ml ON ml.phrase_id=p.id 
		AND ml.lang_id=".$language_id." WHERE p.phrase_type='app'");
		// echo "<pre>";print_r($phrases);die();
		if(empty($phrases)){
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
			$this->prepare_flashmessage($msg, 2);
			redirect(URL_LANGUAGES);
		}
		
			
			
		$lang_name 	= $this->base_model->fetch_records_from(TBL_LANGUAGES,array('id'=> $language_id));
		if(empty($lang_name)){
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
            $this->prepare_flashmessage($msg, 2);
			redirect(URL_LANGUAGES);
		}
		
		$this->data['language_id'] 				= $language_id;
		$this->data['language_name'] 			= $lang_name[0]->lang_name;
		$this->data['phrases'] 					= $phrases;
		
		$this->data['active_class'] 			= ACTIVE_LANGUAGES;
		$this->data['title'] 					= (isset($this->phrases['edit app phrases'])) ? $this->phrases['edit app phrases'] : 'Edit App Phrases';
		$this->data['content'] 					= PAGE_APP_PHRASE_LIST;
		$this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	function checkduplicate($menu_name,$table)
	{
		$table = explode(',', $table);
		$table = $table[1];
		if($table === TBL_MENU){
			$column = 'menu_name';
			$value  = $this->input->post('menu_name');
			$id 	= 'menu_id';
			$id_value = $this->input->post('menu_id');
			$message = 'Duplicate Menu Name';
			$cond = array($column=>$value,$id.' !='=>$id_value);
		}else if($table === TBL_ITEMS){
			$column = 'item_name';
			$value  = $this->input->post('item_name');
			$id 	= 'item_id';
			$menu = 'menu_id';
			$menu_id = $this->input->post('menu_name');
			$id_value = $this->input->post('item_id');
			$message = 'Duplicate Item Name';
			$cond = array($column=>$value,$menu=>$menu_id,$id.' !='=>$id_value);
		}else if($table === TBL_ADDONS){
			$column = 'addon_name';
			$value  = $this->input->post('item_name');
			$id 	= 'addon_id';
			$id_value = $this->input->post('addon_id');
			$message = 'Duplicate Item Name';
			$cond = array($column=>$value,$id.' !='=>$id_value);
		}else if($table === TBL_OPTIONS){
			$column = 'option_name';
			$value  = $this->input->post('option_name');
			$id 	= 'option_id';
			$id_value = $this->input->post('option_id');
			$message = 'Duplicate Option Name';
			$cond = array($column=>$value,$id.' !='=>$id_value);
		}
	
		
		$records = $this->base_model->fetch_records_from($table,$cond);
		
		if(count($records)>0)
		{
			 $this->form_validation->set_message('checkduplicate', $message);
			return false;
		}else{
			return true;
		} 
	}
	
	/* 
	 ADD ADDONS 
	 UPDATED ON 21-06-2016 
	*/
	function addons()
	{
		$this->data['message']      = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
        $this->data['addons']   		= $this->base_model->fetch_records_from(TBL_ADDONS,'','','addon_id','desc');
        $this->data['active_class'] = ACTIVE_ADDONS;
        $this->data['title']        = (isset($this->phrases['addons'])) ? $this->phrases['addons'] : "Addons";
        $this->data['content']      = PAGE_ADDONS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	function add_addon()
	{
		if ($this->input->post()) 
		{
            $this->form_validation->set_rules('item_name', $this->phrases['item name'], 'required|xss_clean|is_unique[' . DBPREFIX.TBL_ADDONS . '.addon_name]');
			$this->form_validation->set_rules('price', $this->phrases['price'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('description', $this->phrases['description'], 'required|xss_clean');
			if(empty($_FILES['userfile']['name']))
			{
				$this->form_validation->set_rules('userfile', $this->phrases['item image'], 'required');
			}
			
			if(!empty($_FILES['userfile']['name'])){
				$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				if(!$ext='jpg'|| !$ext='png' || !$ext='jpeg'){
								
					$this->prepare_flashmessage($this->phrases['invalid file'],2);
					redirect(URL_ADD_ADDON,REFRESH);
				}
			}
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if ($this->form_validation->run() == TRUE) {
                $input_data['addon_name'] 	= $this->input->post('item_name');
                $input_data['price'] 	 	= $this->input->post('price');
                $input_data['description']  = $this->input->post('description');
                $input_data['status']       = $this->input->post('status');
                $id                         = $this->base_model->insert_operation_id($input_data, TBL_ADDONS);
                if ($id) {
                    if (!empty($_FILES['userfile']['name'])) {
                        
                        $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
							$config['file_name'] 		= ADDON.'_'.$id.'.' . $ext;
							$config['upload_path']   = IMG_ADDONS;
							$config['allowed_types'] = ALLOWED_TYPES;
							$config['overwrite'] = true;
							$this->load->library('upload');
							$this->upload->initialize($config);
                        if ($this->upload->do_upload()) {
                            $where['addon_id']        = $id;
                            $data['addon_image'] 	 = ADDON.'_'.$id.'.' . $ext;
							$this->create_thumbnail(IMG_ADDONS.ADDON.'_'.$id.'.' . $ext,IMG_ADDONS_THUMB,100,100);
                            $this->base_model->update_operation($data, TBL_ADDONS, $where);
							
							$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
                            $this->prepare_flashmessage($msg,0);
                            
							redirect(URL_ADMIN_ADDONS);
                        } else {
                            $this->prepare_flashmessage($this->upload->display_errors(), 1);
                        
                        }
                    }
                } else {
					$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADMIN_ADDONS);
                }
            }
			
        }
		
        $this->data['active_class'] = ACTIVE_ADDONS;
        $this->data['title']        = (isset($this->phrases['add addon'])) ? $this->phrases['add addon'] : "Add Addon";
        $this->data['content']      = PAGE_ADD_ADDON;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	function edit_addon($addon_id = false)
	{
		if ($this->input->post()) {
			
            $addon_id = $this->input->post('addon_id');									
            $this->form_validation->set_rules('item_name', $this->phrases['item name'], 'required|xss_clean|callback_checkduplicate[item_name,'.TBL_ADDONS.']');
		    $this->form_validation->set_rules('price', $this->phrases['price'], 'required|numeric|xss_clean');
            $this->form_validation->set_rules('description', $this->phrases['description'], 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run()==true){
            $update_data['addon_name'] 	  = $this->input->post('item_name');
            $update_data['price'] 	      = $this->input->post('price');
            $update_data['description']   = $this->input->post('description');
            $update_data['status']        = $this->input->post('status');
            
            $where['addon_id']         	  = $addon_id;
            if ($this->base_model->update_operation($update_data, TBL_ADDONS, $where)) {
                if (!empty($_FILES['userfile']['name'])) {
					 $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                    $config['upload_path']   = IMG_ADDONS;
                    $config['allowed_types'] = ALLOWED_TYPES;
                    $config['overwrite']     = true;
                    $config['file_name'] 	 = ADDON.'_'.$addon_id.'.' . $ext;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload()) {
                        $data['addon_image'] = ADDON.'_'.$addon_id.'.' . $ext;
						$this->create_thumbnail(IMG_ADDONS.ADDON.'_'.$id.'.' . $ext,IMG_ADDONS_THUMB,100,100);
                        if ($this->base_model->update_operation($data, TBL_ADDONS, $where)) {
                           $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_ADMIN_ADDONS, REFRESH);
                        }
                    } else {
                        $this->prepare_flashmessage($this->upload->display_errors(), 1);
                      
                    }
                } else {
                    $msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
                    redirect(URL_ADMIN_ADDONS, REFRESH);
                }
            } else {
                $msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
				$this->prepare_flashmessage($msg, 1);
                redirect(URL_ADMIN_ADDONS, REFRESH);
            }
			}
			else{
				$this->prepare_flashmessage(validation_errors(),1);
				redirect(URL_EDIT_ADDON.DS.$addon_id);
			}
        }
        $result = $this->base_model->fetch_records_from(TBL_ADDONS, array(
            'addon_id' => $addon_id
        ));
        if (count($result) > 0) {
            $this->data['addon'] = $result[0];
        } else {
           $msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
		   $this->prepare_flashmessage($msg, 2);
            redirect(URL_ADMIN_ADDONS, REFRESH);
        }
        
        $this->data['active_class'] = ACTIVE_ADDONS;
        $this->data['title']        = (isset($this->phrases['edit addon'])) ? $this->phrases['edit addon'] : "Edit Addon";
        $this->data['content']      = PAGE_EDIT_ADDON;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	function delete_addon()
	{
		$addon_id        = $this->input->post('addon_id');

		if ($this->base_model->check_duplicate(TBL_ADDONS, 'addon_id', $addon_id) && is_numeric($addon_id)) {
			$where['addon_id'] 		= $addon_id;
			$res = $this->base_model->fetch_single_column_value(TBL_ADDONS, 'addon_image', $where);
			
			if(count($res)>0 && $res!=''){
				
				if (file_exists(IMG_ADDONS . $res)) {
					
					unlink(IMG_ADDONS . $res);
					if (file_exists(IMG_ADDONS_THUMB . $res)) {
					
					unlink(IMG_ADDONS_THUMB . $res);
					
				   }
				}
			}
			
			
			if ($this->base_model->delete_record(TBL_ADDONS, $where)) {
				$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
				$this->prepare_flashmessage($msg, 0);
				redirect(URL_ADMIN_ADDONS, REFRESH);
			} else {
				$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_ADMIN_ADDONS, REFRESH);
			}
		} else {
				$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_ADMIN_ADDONS, REFRESH);
		}
        
	}
	
	/*
	* ADD OPTIONS 
	* DATE 21-06-2016
	*/
	
	function options()
	{
		$options = $this->base_model->fetch_records_from(TBL_OPTIONS);
		if(!empty($options)){
			$this->data['options'] = $options;
		}else{
			$this->data['options'] = array();
		}
		$this->data['message']      = ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'));
        $this->data['active_class'] = ACTIVE_OPTIONS;
        $this->data['title']        = (isset($this->phrases['options'])) ? $this->phrases['options'] : "Options";
        $this->data['content']      = PAGE_OPTIONS;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	function add_option()
	{
		if ($this->input->post()) 
		{
            $this->form_validation->set_rules('option_name', $this->phrases['option name'], 'required|xss_clean|is_unique[' . DBPREFIX.TBL_OPTIONS . '.option_name]');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if ($this->form_validation->run() == TRUE) {
                $input_data['option_name'] 	 = $this->input->post('option_name');
                $input_data['status']        = $this->input->post('status');
               
                if ($this->base_model->insert_operation($input_data, TBL_OPTIONS)) {
					$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
					$this->prepare_flashmessage($msg,0);
                    redirect(URL_ADMIN_OPTIONS);
                    
                } else {
					$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
					$this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADMIN_OPTIONS);
                }
            }
			
        }
		
        $this->data['active_class'] = ACTIVE_OPTIONS;
        $this->data['title']        = (isset($this->phrases['add option'])) ? $this->phrases['add option'] : "Add Option";
        $this->data['content']      = PAGE_ADD_OPTION;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	function edit_option($option_id=false)
	{
		if ($this->input->post()) {
            $option_id = $this->input->post('option_id');									
            $this->form_validation->set_rules('option_name', $this->phrases['option name'], 'required|xss_clean|callback_checkduplicate[option_name,'.TBL_OPTIONS.']');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run()==true){
				$update_data['option_name'] 	  = $this->input->post('option_name');
				$update_data['status']        = $this->input->post('status');
				$where['option_id']           = $option_id;
				if ($this->base_model->update_operation($update_data, TBL_OPTIONS, $where)) {
					$msg = (isset($this->phrases['updated successfully'])) ? $this->phrases['updated successfully'] : "Updated Successfully";
					$this->prepare_flashmessage($msg, 0);
					redirect(URL_ADMIN_OPTIONS, REFRESH);
				} else {
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable to update";
					$this->prepare_flashmessage($msg, 1);
					redirect(URL_ADMIN_OPTIONS, REFRESH);
				}
			}
			
        }
		
		$options = $this->base_model->fetch_records_from(TBL_OPTIONS,array('option_id'=>$option_id));
		if(empty($options)){
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
		   $this->prepare_flashmessage($msg, 2);
            redirect(URL_ADMIN_SIZES, REFRESH);
		}else{
			$this->data['option'] = $options[0];
		}
		
        $this->data['active_class'] = ACTIVE_OPTIONS;
        $this->data['title']        = (isset($this->phrases['edit option'])) ? $this->phrases['edit option'] : "Edit option";
        $this->data['content']      = PAGE_EDIT_OPTION;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
	function delete_option()
	{
		$option_id        = $this->input->post('option_id');

		if ($this->base_model->check_duplicate(TBL_OPTIONS, 'option_id', $option_id) && is_numeric($option_id)) {
			$where['option_id']  = $option_id;
			if ($this->base_model->delete_record(TBL_OPTIONS, $where)) {
				$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
				$this->prepare_flashmessage($msg, 0);
				redirect(URL_ADMIN_OPTIONS, REFRESH);
			} else {
				$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_ADMIN_OPTIONS, REFRESH);
			}
		} else {
				$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable to delete";
				$this->prepare_flashmessage($msg, 1);
				redirect(URL_ADMIN_OPTIONS, REFRESH);
		}
	}
	
	function statustoggle()
	{
		
		if($this->input->post())
		{
			$id = $this->input->post('id');
			$user_status = $this->input->post('status');
			$filedata = array();
			$message = '';
			if($user_status == 'false')
			{
				$filedata['active'] = '0';
				$message = (isset($this->phrases['user deactivated'])) ? $this->phrases['user deactivated'] : "User Deactivated";
			}
			else
			{
				$filedata['active'] = '1';				
				$message = (isset($this->phrases['user activated'])) ? $this->phrases['user activated'] : "User Activated";
			}	
			$this->base_model->update_operation( $filedata, TBL_USERS, array('id' => $id) );
			
			echo json_encode(array('status' => 1, 'message' => $message));
		} 
		else
		{
			$message = $message = (isset($this->phrases['wrong operation'])) ? $this->phrases['wrong operation'] : "Wrong Operation";
			echo json_encode(array('status' => 0, 'message' => $message));			
		}
	}
} 