<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['master settings'])) echo $this->phrases['master settings'];?> &gt;<?php if(isset($this->phrases['paypal settings'])) echo $this->phrases['paypal settings'];?> 
   </div>
</div>
<div class="col-md-10">
<div class="admin-body">
<div class="inner-elements">
   <div class="panel">
      <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
      <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['paypal settings'])) echo $this->phrases['paypal settings'];?> </div>
      <div class="panel-body paddig">
         <div class="inner-pages-forms">
            <?php 
               $attributes = array('name' => 'paypal_settings_form', 'id' => 'paypal_settings_form');
               echo form_open(URL_PAYPAL_SETTINGS,$attributes) ?>
            <div class="col-md-6">
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['paypal environment production'])) echo $this->phrases['paypal environment production'];?><span style="color:red;">*</span></label>
                  <?php echo form_input('PayPalEnvironmentProduction',set_value('PayPalEnvironmentProduction',$paypal_settings->PayPalEnvironmentProduction)); ?>
                  <?php echo form_error('PayPalEnvironmentProduction'); ?>
               </div>
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['paypal environment sandbox'])) echo $this->phrases['paypal environment sandbox'];?><span style="color:red;">*</span></label>
                  <?php echo form_input('PayPalEnvironmentSandbox',set_value('twitter',$paypal_settings->PayPalEnvironmentSandbox)); ?>
                  <?php echo form_error('PayPalEnvironmentSandbox'); ?>
               </div>
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['merchant name'])) echo $this->phrases['merchant name'];?><span style="color:red;">*</span></label>
                  <?php echo form_input('merchantName',set_value('merchantName',$paypal_settings->merchantName)); ?>
                  <?php echo form_error('merchantName'); ?>
               </div>
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['merchant privacy policy URL'])) echo $this->phrases['merchant privacy policy URL'];?><span style="color:red;">*</span></label>
                  <?php echo form_input('merchantPrivacyPolicyURL',set_value('merchantPrivacyPolicyURL',$paypal_settings->merchantPrivacyPolicyURL),'placeholder="eg: https://your url"'); ?>
                  <?php echo form_error('merchantPrivacyPolicyURL'); ?>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['merchant user agreement URL'])) echo $this->phrases['merchant user agreement URL'];?><span style="color:red;">*</span></label>
                  <?php echo form_input('merchantUserAgreementURL',set_value('merchantUserAgreementURL',$paypal_settings->merchantUserAgreementURL),'placeholder="eg: https://your url"'); ?>
                  <?php echo form_error('merchantUserAgreementURL'); ?>
               </div>
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['currency'])) echo $this->phrases['currency'];?><span style="color:red;">*</span></label>
                  <?php 
                    
                       	if(isset($paypal_settings->currency)) {
                               	$selectd = array(
                               					$paypal_settings->currency		
                               					);
                            
                               }	
                       	echo form_dropdown('currency',$currency_options,$selectd,'class = "chzn-select"'); ?>
                  <?php echo form_error('currency'); ?>
               </div>
               <div class="form-group">                    
                  <label><?php if(isset($this->phrases['account_type'])) echo $this->phrases['account_type'];?><span style="color:red;">*</span></label>
                  <?php $options = array(
					  'sandbox'  => 'Sandbox',
                     'production'    => 'Production'
                     );
                     $select = "";
                     if(isset($paypal_settings->account_type))
                     $select = $paypal_settings->account_type;
                     
                     echo form_dropdown('account_type', $options,$select,'class="chzn-select"'); ?>
                  <?php echo form_error('account_type'); ?>
               </div>
               <div class="form-group">
                  <label><?php echo $this->phrases['status']?><span style="color:red;">*</span></label>
                  <?php 
						$options = array(
						  'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
						  'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
						  );
                     
                     
                      $select = "";
                     if(isset($paypal_settings->status))
                     $select = $paypal_settings->status;
                     
                     echo form_dropdown('status', $options,$select,'class="chzn-select"'); ?>
                  <?php echo form_error('status'); ?>
               </div>
               <?php echo form_hidden('update_rec_id',set_value('update_rec_id',$paypal_settings->id)); ?>
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
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
             //Additional Methods			
             
             //form validation rules
             $("#paypal_settings_form").validate({
				 ignore:"",
                 rules: {
                     PayPalEnvironmentProduction: {
                     	required: true
                     },
                     PayPalEnvironmentSandbox: {
                     	required: true
                     },
                     merchantName: {
                     	required: true
                     },
                     merchantPrivacyPolicyURL: {
                     	required: true,
                     	url:true
                     },
					 currency:{
						 required: true
					 },
                     merchantUserAgreementURL:{
						required: true,
							url:true
					 }
                 },
                 messages: {
                 	PayPalEnvironmentProduction:{
   		
   			required:"<?php if(isset($this->phrases['paypal environment production'])) echo $this->phrases['paypal environment production'].' '.$this->phrases['required'];?>"				
   		},
   		PayPalEnvironmentSandbox:{
   			required:"<?php if(isset($this->phrases['paypal environment sandbox'])) echo $this->phrases['paypal environment sandbox'].' '.$this->phrases['required'];?>"				
   		},
   		merchantName:{
   			required:"<?php if(isset($this->phrases['merchant name'])) echo $this->phrases['merchant name'].' '.$this->phrases['required'];?>"				
   		},
   		merchantPrivacyPolicyURL:{
   			required:"<?php if(isset($this->phrases['merchant privacy policy URL'])) echo $this->phrases['merchant privacy policy URL'].' '.$this->phrases['required'];?>"
   			
   		},
		currency:{
			required:"<?php if(isset($this->phrases['currency'])) echo $this->phrases['currency'].' '.$this->phrases['required'];?>"
		},
   		merchantUserAgreementURL:{
   			required:"<?php if(isset($this->phrases['merchant user agreement URL'])) echo $this->phrases['merchant user agreement URL'].' '.$this->phrases['required'];?>"
   			
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