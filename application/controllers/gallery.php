 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends MY_Controller
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
	| MODULE: 			GALLERY
	| -----------------------------------------------------
	| This is Gallery module controller file.
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
    // View Gallery
    function index()
    {
        $this->data['message']      = $this->session->flashdata('message');
        $this->data['gallerys']     = $this->base_model->fetch_records_from(TBL_GALLERY,'','','gallery_id','desc');
        $this->data['active_class'] = ACTIVE_GALLERY;
        $this->data['title']        = (isset($this->phrases['gallery'])) ? $this->phrases['gallery'] : 'gallery';
        $this->data['content']      = PAGE_VIEW_GALLERY;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
    // Add Gallery
    function add_gallery()
    {
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('alt_text', $this->phrases['alt text'], 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($_FILES['userfile']['name']) {
                $f_type  = explode(".", $_FILES['userfile']['name']);
                $last_in = (count($f_type) - 1);
                if (($f_type[$last_in] != "gif") && ($f_type[$last_in] != "jpg") && ($f_type[$last_in] != "png") && ($f_type[$last_in] != "jpeg")) {
					$msg = (isset($this->phrases['invalid file'])) ? $this->phrases['invalid file'] : "Invalid File";
                    $this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADD_GALLERY);
                }
            }
            if ($this->form_validation->run() == TRUE) {
                $input_data['alt_text'] = $this->input->post('alt_text');
                $input_data['status']   = $this->input->post('status');
                $id                     = $this->base_model->insert_operation_id($input_data, TBL_GALLERY);
                if ($id) {
                    if (!empty($_FILES['userfile']['name'])) {
                        $config['upload_path']   = IMG_GALLERY_IMAGES;
                        $config['allowed_types'] = ALLOWED_TYPES;
                        $config['overwrite']     = true;
                        $config['file_name']     = 'crunchy' . "_" . $id . "." . $f_type[$last_in];
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload()) {
                            $where['gallery_id'] = $id;
                            $data['image_name']  = 'crunchy' . "_" . $id . "." . $f_type[$last_in];
                            $this->base_model->update_operation($data, TBL_GALLERY, $where);
							$msg = (isset($this->phrases['added sucessfully'])) ? $this->phrases['added sucessfully'] : "Added Successfully";
                            $this->prepare_flashmessage($msg, 0);
                            redirect(URL_GALLERY);
                        } else {
                            $this->prepare_flashmessage($this->upload->display_errors(), 1);
                            redirect(URL_ADD_GALLERY);
                        }
                    }
                } else {
					$msg = (isset($this->phrases['unable to add'])) ? $this->phrases['unable to add'] : "Unable To Add";
                    $this->prepare_flashmessage($msg, 1);
                    redirect(URL_GALLERY);
                }
            } 
        } 
        $this->data['active_class'] = ACTIVE_GALLERY;
        $this->data['title']        = (isset($this->phrases['add gallery'])) ? $this->phrases['add gallery'] : 'Add Gallery';
        $this->data['content']      = PAGE_ADD_GALLERY;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
    }
	
	/*** Edit Gallery ****/
	function edit_gallery($param=null)
	{
		if($this->input->post()){
			$this->form_validation->set_rules('alt_text', $this->phrases['alt text'], 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($_FILES['userfile']['name']) {
                $f_type  = explode(".", $_FILES['userfile']['name']);
                $last_in = (count($f_type) - 1);
                if (($f_type[$last_in] != "gif") && ($f_type[$last_in] != "jpg") && ($f_type[$last_in] != "png") && ($f_type[$last_in] != "jpeg")) {
					$msg = (isset($this->phrases['invalid file'])) ? $this->phrases['invalid file'] : "Invalid File";
                    $this->prepare_flashmessage($msg, 1);
                    redirect(URL_ADD_GALLERY);
                }
            }
            if ($this->form_validation->run() == TRUE) {
                $update_data['alt_text'] = $this->input->post('alt_text');
                $update_data['status']   = $this->input->post('status');
				$where['gallery_id']	 = $this->input->post('gallery_id');
                
                if ($this->base_model->update_operation($update_data, TBL_GALLERY,$where)) {
                    if (!empty($_FILES['userfile']['name'])) {
						$image_name = $this->input->post('image_name');
                        $config['upload_path']   = IMG_GALLERY_IMAGES;
                        $config['allowed_types'] = ALLOWED_TYPES;
                        $config['overwrite']     = true;
                        $config['file_name']     = $image_name;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload()) {
                            $msg = (isset($this->phrases['updated sucessfully'])) ? $this->phrases['updated sucessfully'] : "Updated Successfully";
                            $this->prepare_flashmessage($msg, 0);
                            redirect(URL_GALLERY,REFRESH);
                        } else {
                            $this->prepare_flashmessage($this->upload->display_errors(), 1);
                            redirect(URL_ADD_GALLERY);
                        }
                    }else{
						$msg = (isset($this->phrases['updated sucessfully'])) ? $this->phrases['updated sucessfully'] : "Updated Successfully";
						$this->prepare_flashmessage($msg, 0);
						redirect(URL_GALLERY,REFRESH);
					}
                } else {
					$msg = (isset($this->phrases['unable to update'])) ? $this->phrases['unable to update'] : "Unable To update";
                    $this->prepare_flashmessage($msg, 1);
                    redirect(URL_GALLERY);
                }
            } 
		}
		
		$image_details = $this->base_model->fetch_records_from(TBL_GALLERY,array('gallery_id'=>$param));
		if(empty($image_details)){
			$msg = (isset($this->phrases['record not found'])) ? $this->phrases['record not found'] : "Record not found";
			$this->prepare_flashmessage($msg, 2);
			redirect(URL_GALLERY);
		}
		$this->data['image_details'] = $image_details[0];
		$this->data['active_class'] = ACTIVE_GALLERY;
        $this->data['title']        = (isset($this->phrases['edit gallery'])) ? $this->phrases['edit gallery'] : 'Edit Gallery';
        $this->data['content']      = PAGE_EDIT_GALLERY;
        $this->_render_page(TEMPLATE_ADMIN, $this->data);
	}
	
    // Delete Gallery 
    function delete_gallery()
    {       
        if ($this->input->post()) {
            $gallery_id          = $this->input->post('gallery_id');
            $where['gallery_id'] = $gallery_id;
            $image_name          = $this->base_model->fetch_single_column_value(TBL_GALLERY, 'image_name', $where);
            if (count($image_name) > 0) {
                if (file_exists(IMG_GALLERY_IMAGES. $image_name)) {
                    if (unlink(IMG_GALLERY_IMAGES. $image_name)) {
                        if ($this->base_model->delete_record(TBL_GALLERY, $where)) {
							$msg = (isset($this->phrases['deleted successfully'])) ? $this->phrases['deleted successfully'] : "Deleted Successfully";
							$this->prepare_flashmessage($msg, 0);
                            redirect(URL_GALLERY, 'refresh');
                        } else {
                            $msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable To Delete";
							$this->prepare_flashmessage($msg, 1);
                            redirect(URL_GALLERY);
                        }
                    }
                }
            } else {
				$msg = (isset($this->phrases['unable to delete'])) ? $this->phrases['unable to delete'] : "Unable To Delete";
                $this->prepare_flashmessage($msg, 1);
                redirect(URL_GALLERY);
            }
        } else {
            redirect(URL_GALLERY);
        }
    }
} 