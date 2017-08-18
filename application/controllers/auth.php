 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller
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
	| MODULE: 			AUTH
	| -----------------------------------------------------
	| This is Auth module controller file.
	| -----------------------------------------------------
	*/
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array(
            'ion_auth',
            'form_validation'
        ));
        $this->load->helper(array(
            'url',
            'language'
        ));
        $this->load->model('base_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }
    // redirect if needed, otherwise display the user list
    function index()
    {
		$this->data['message'] = $this->session->flashdata('message');
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->is_admin()){ 
                
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                redirect(URL_ADMIN);
            }
        } elseif (!$this->ion_auth->logged_in()) {
			
            $this->load->view(URL_SITE_INDEX, $this->data);
        }
    }
    // log the user in
    function login()
    {
        if($this->input->post()){
        $this->form_validation->set_rules('identity', $this->phrases['email'], 'required');
        $this->form_validation->set_rules('password', $this->phrases['password'], 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == true) {
				
				$remember = (bool) $this->input->post('remember');
				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
					
					$this->prepare_flashmessage($this->phrases['login success'],0);
					if (!$this->ion_auth->is_admin()) {
						$this->prepare_flashmessage($this->phrases['invalid credentials'],1);
						redirect(URL_LOGIN, REFRESH);
					}else{
						
						redirect(URL_ADMIN, REFRESH);
					}
				} else {
					
					$this->prepare_flashmessage($this->ion_auth->errors(), 1);
					redirect(URL_LOGIN, REFRESH); 
				}
			}
		}
		$this->data['message'] = $this->session->flashdata('message');
        $this->_render_page(URL_LOGIN, $this->data);
    } 
    // log the user out
     function logout()
    {
        $this->data['title'] = $this->phrases['logout'];
        $logout              = $this->ion_auth->logout();
        $this->prepare_flashmessage($this->phrases['logout successfully'], 0);
        redirect(URL_LOGIN, REFRESH); 
    } 
    
	
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			$this->prepare_flashmessage($this->ion_auth->messages(),0);
			redirect(URL_INDEX, REFRESH); 
		}
		else
		{
			$this->prepare_flashmessage($this->ion_auth->errors(),1);
			redirect(URL_INDEX, REFRESH); 
		}
	} 
	
	// reset password - final step for forgotten password

	 public function reset_password($code = NULL)
	{
		
		if (!$code) {
			show_404();
		}

		
		$user 		= $this->ion_auth->forgotten_password_check($code);
				
		if ($user) {

			$this->form_validation->set_rules('new_password', 
			$this->lang->line('reset_password_validation_new_password_label') , 
			'required|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', 
			$this->lang->line('reset_password_validation_new_password_confirm_label') , 
			'required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() 	== false	) {

				$this->data['message'] 			= $this->session->flashdata('message');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] 	= array(
					'name' 						=> 'new_password',
					'id' 						=> 'new_password',
					'type' 						=> 'password',
					'pattern' 					=> '^.{' . 
					$this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' 						=> 'new_confirm',
					'id' 						=> 'new_confirm',
					'type' 						=> 'password',
					'pattern' 					=> '^.{' . 
					$this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] 			= array(
					'name' 						=> 'user_id',
					'id' 						=> 'user_id',
					'type' 						=> 'hidden',
					'value' 					=> $user->id,
				);
				$this->data['csrf'] 			= $this->_get_csrf_nonce();
				$this->data['code'] 			= $code;
				
				// $this->_render_page(URL_RESET_PASSWORD, $this->data);
				$this->load->view(URL_RESET_PASSWORD, $this->data);
				
			}
			else {

				if ($user->id != $this->input->post('value')) {

					$this->ion_auth->clear_forgotten_password_code($code);
					show_error($this->lang->line('error_csrf'));
				}
				else {

					$identity 					= $user->{$this->config->item('identity', 
					'ion_auth') };
					$change 					= $this->ion_auth->reset_password(
					$identity, $this->input->post('new_password'));
					if ($change) {
						
						$this->session->set_flashdata($this->ion_auth->messages(),0);
						$this->logout();
					}
					else {
						$this->session->set_flashdata($this->ion_auth->errors(),1);
						redirect(URL_RESET_PASSWORD.DS . $code, REFRESH);
						 
					}
				}
			}
		}
		else {

			$this->session->set_flashdata('message', 
			$this->ion_auth->errors());
			redirect(URL_RESET_PASSWORD, REFRESH);
		}
	} 
} 