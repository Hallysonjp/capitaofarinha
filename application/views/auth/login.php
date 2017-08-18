<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title><?php 
         if(isset($site_settings->site_title) && $site_settings->site_title != "") {
         	echo $site_settings->site_title;
         } 
         else
         {
         	echo "Restaurant";
         }?></title>
      <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
      <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script> 
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
     
   </head>
   <body>
      <div class="wrapper">
         <div class="login">
            <div class="lg"></div>
            <div class="textf">
               <!-- Auth Form-->
               <h1><?php if(isset($this->phrases['login'])) echo $this->phrases['login'];?></h1>
               <div id="infoMessage"><?php echo $message;?></div>
			    <?php $attributes = array('name'=>'login','id'=>'login');
                     echo form_open(URL_LOGIN,$attributes) ?>
               
               <div class="col-md-12"> 
                  <label>  <?php if(isset($this->phrases['email'])) echo $this->phrases['email'];?>   </label>
                  <?php echo form_input('identity',set_value('identity'));?>
                  <?php echo form_error('identity');?>
               </div>
               <div class="col-md-12"> 
                  <label> <?php if(isset($this->phrases['password'])) echo $this->phrases['password'];?></label>
                  <?php echo form_password('password');?>
                  <?php echo form_error('password');?>
               </div>
               <button type="submit" class="lobt"><?php if(isset($this->phrases['login'])) echo $this->phrases['login'];?></button>
               <?php echo form_close();?>
               <!-- Auth Form End-->
            </div>
         </div>
      </div>
	  <!--	Validations	-->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              
   		
   		//form validation rules
              $("#login").validate({
				rules: {
					identity: {
					  required: true,
					  email:true
					},
					password: {
					  required: true
					}                  

				},
   				messages: {
					identity: {
						required: "<?php if(isset($this->phrases['email'])) echo $this->phrases['email'].' '.$this->phrases['required'];?>"
					},
					password: {
						required: "<?php if(isset($this->phrases['password'])) echo $this->phrases['password'].' '.$this->phrases['required'];?>"
					}               
   				
   				
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
</script>
   </body>
</html>