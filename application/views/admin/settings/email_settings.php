<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['master settings'])) echo $this->phrases['master settings'];?> &gt; <?php if(isset($this->phrases['email settings'])) echo $this->phrases['email settings'];?>
   </div>
</div>
<div class="col-md-10">
<div class="admin-body">
<div class="inner-elements">
   <div class="panel">
      <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
      <div class="panel-heading ele-hea"> 
         <?php if(isset($this->phrases['email settings'])) echo $this->phrases['email settings']?> 
      </div>
      <div class="panel-body paddig">
         <div class="inner-pages-forms">
            <?php $attributes = array('name'=>'email_setting_form','id'=>'email_setting_form');
               echo form_open(URL_EMAIL_SETTINGS,$attributes) ?>
            <div class="col-md-12">
               <div class="col-md-6">
                  <label> <?php if(isset($this->phrases['web mail'])) echo $this->phrases['web mail'];?> </label>
                  <input type="radio" name="mail_config" value="webmail" 
                     <?php if (isset($email_settings->mail_config) && 
                        $email_settings->mail_config == 'webmail') 
                        echo 'checked="checked" '; ?>/>
               </div>
               <div class="col-md-6">
                  <label> <?php if(isset($this->phrases['mandrill'])) echo $this->phrases['mandrill'];?> </label>
                  <input type="radio" name="mail_config" value="mandrill" 
                     <?php if (isset($email_settings->mail_config) && 
                        $email_settings->mail_config == 'mandrill') 
                        echo 'checked="checked" '; ?>/>
               </div>
            </div>
            <div class="col-md-6">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['email settings'])) echo $this->phrases['email settings']?></div>
               <div class="form-group">  
                  <label><?php if(isset($this->phrases['host'])) echo $this->phrases['host'];?><span style="color:red;">*</span></label> 
                  <?php echo form_input('smtp_host',set_value('smtp_host',$email_settings->smtp_host));?>
                  <?php echo form_error('smtp_host');?>
               </div>
               <div class="form-group">  
                  <label><?php if(isset($this->phrases['email'])) echo $this->phrases['email'];?> <span style="color:red;">*</span></label>
                  <?php echo form_input('smtp_user',set_value('smtp_user',$email_settings->smtp_user));?>	
                  <?php echo form_error('smtp_user');?>
               </div>
               <div class="form-group">  
                  <label><?php if(isset($this->phrases['password'])) echo $this->phrases['password'];?> <span style="color:red;">*</span></label>
                  <?php echo form_password('smtp_password',set_value('smtp_password',$email_settings->smtp_password));?>
                  <?php form_error('smtp_password'); ?>
               </div>
               <div class="form-group">  
                  <label><?php if(isset($this->phrases['port'])) echo $this->phrases['port'];?><span style="color:red;">*</span></label>
                  <?php echo form_input('smtp_port',set_value('smtp_port',$email_settings->smtp_port)); ?>
                  <?php echo form_error('smtp_port');?>
               </div>
               <?php echo form_hidden('update_record_id',set_value('update_record_id',$email_settings->id)); ?>
               <div class="buttos">
                  <?php echo form_submit('update',$this->phrases['update'],'class="butto"'); ?>
               </div>
            </div>
            <div class="col-md-6">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['mandrill key'])) echo $this->phrases['mandrill key']?></div>
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['api key'])) echo $this->phrases['api key']?> <span style="color:red;">*</span></label>  
                  <?php echo form_input('api_key',set_value('api_key',$email_settings->api_key),'id="api_key"'); ?>
                  <?php echo form_error('api_key');?>
               </div>
               <?php echo form_hidden('update_record_id',set_value('update_record_id',$email_settings->id)); ?>
               <div class="buttos">
                  <?php echo form_submit('update',$this->phrases['update'],'class="butto"'); ?>
               </div>
            </div>
            <?php echo form_close();?>         
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.js"></script>
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
             setupFormValidation: function() {
                 // Additional Method
	 $.validator.addMethod('cheradio', function(apiKey,element) {
		 var config = $("input[name='mail_config']:checked").val();
		 	return (this.optional(element) || (config =='mandrill' && apiKey!=''));	
	}, 'Please Enter API Key');
				 
                 //form validation rules
                 $("#email_setting_form").validate({
   		  
                     rules: {
                         smtp_host: {
                             required: true
                         },
                         smtp_port: {
                             required: true
                         },
                         smtp_user: {
                             required: true,
							 email : true
                         },
                         smtp_password: {
                             required: true
                         },
						 api_key:{
							 cheradio:true
						 }
						 
   
                     },
                     messages: {
                         smtp_host: {
                             required: "<?php if(isset($this->phrases['host'])) echo $this->phrases['host'].' '.$this->phrases['required'];?>"
                         },
                         smtp_port: {
                             required: "<?php if(isset($this->phrases['port'])) echo $this->phrases['port'].' '.$this->phrases['required'];?>"
                         },
                         smtp_user: {
                             required: "<?php if(isset($this->phrases['email'])) echo $this->phrases['email'].' '.$this->phrases['required'];?>"
                         },
                         smtp_password: {
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