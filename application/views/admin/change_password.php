<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>">
	  <?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['change password'])) echo $this->phrases['change password'];?>			
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['change password'])) echo $this->phrases['change password'];?>  </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     
                    
                     <div class="col-md-6">
					 <div id="infoMessage">
                        <?php if(isset($message)) echo $message;?>
                     </div>
					  <?php 
                        $attributes = array('name'=>'change_password_form','id'=>'change_password_form');
						
                        echo form_open(URL_ADMIN_CHANGE_PASSWORD,$attributes); ?>
                        <div class="form-group">
                           <label> <?php if(isset($this->phrases['old password'])) echo $this->phrases['old password'];?> <span style="color:red;">*</span> </label>                     
                           <?php echo form_password('old'); ?>
                           <?php echo form_error('old'); ?>       
                        </div>
                        <div class="form-group">   
                           <label> <?php if(isset($this->phrases['new password'])) echo $this->phrases['new password'];?>  <span style="color:red;">*</span> </label>                  
                           <?php echo form_password('new_password','','id="new_password"'); ?>
                           <?php echo form_error('new_password'); ?>       
                        </div>
                        <div class="form-group">  
                           <label> <?php if(isset($this->phrases['confirm new password'])) echo $this->phrases['confirm new password'];?> <span style="color:red;">*</span> </label>                   
                           <?php echo form_password('new_confirm'); ?>
                           <?php echo form_error('new_confirm'); ?>
                        </div>
                        
                        <div class="buttos">
                           <button type="submit" class="butto"><i class="fa fa"></i> <?php if(isset($this->phrases['change password'])) echo $this->phrases['change password'];?></button>
                        </div>
						 <?php echo form_close();?>  
                     </div>
                                        
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Validations	-->

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
              //Additional Methods			
			$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd= $('#new_password').val();
   			return (this.optional(element) || repwd==pwd);
   		},"<?php echo $this->phrases['password and confirm password does not match'];?>");
   		//form validation rules
			$("#change_password_form").validate({
				rules: {
					old: {
						required: true
					},
					new_password:{
						required:true
					},
					new_confirm:{
						required:true,
						pwdmatch:true	
					}	
				},

				messages: {
					old: {
						required: "<?php if(isset($this->phrases['old password'])) echo $this->phrases['old password'].' '.$this->phrases['required'];?>"
					},
					new_password: {
						required: "<?php if(isset($this->phrases['new password'])) echo $this->phrases['new password'].' '.$this->phrases['required'];?>"
					},    
					new_confirm: {
						required: "<?php if(isset($this->phrases['confirm new password'])) echo $this->phrases['confirm new password'].' '.$this->phrases['required'];?>"
						
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