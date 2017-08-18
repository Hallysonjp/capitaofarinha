<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url();?>admin" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <?php if(isset($this->phrases['profile'])) echo $this->phrases['profile'];?>			
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['profile'])) echo $this->phrases['profile'];?>  </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div id="infoMessage">
                        <?php if(isset($message)) echo $message;?>
                     </div>
                     <?php 
                        $attributes = array("name"=>'profile_form',"id"=>'profile_form');
                        echo form_open_multipart(URL_PROFILE,$attributes); ?>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label> <?php if(isset($this->phrases['first name'])) echo $this->phrases['first name'];?> <span style="color:red;">*</span> </label>                     
                           <?php echo form_input('first_name',$user->first_name); ?>
                           <?php echo form_error('first_name'); ?>       
                        </div>
                        <div class="form-group">   
                           <label> <?php if(isset($this->phrases['last name'])) echo $this->phrases['last name'];?>  <span style="color:red;">*</span> </label>                  
                           <?php echo form_input('last_name',$user->last_name); ?>
                           <?php echo form_error('last_name'); ?>       
                        </div>
                        <div class="form-group">  
                           <label> <?php if(isset($this->phrases['email'])) echo $this->phrases['email'];?>  </label>                   
                           <?php echo form_input('email',$user->email,'readonly'); ?>
                           <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
							<label> <?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'];?>  <span style="color:red;">*</span> </label> 
                           <?php echo form_input('phone',$user->phone); ?>
                           <?php echo form_error('phone'); ?>    
                        </div>
                        <div class="buttos">
							<?php echo form_hidden('user_id',$user->id);?>
                           <button type="submit" class="butto"><i class="fa fa"></i> <?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?></button>
                        </div>
                     </div>
                     <?php echo form_close();?>                      
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
        
   		
   		//form validation rules
              $("#profile_form").validate({
                  rules: {
                first_name: {
                          required: true      
                      },
			   	last_name: {
			   			  required: true
			   			  
			   		},
   				phone: {
                          required: true,
   			  			  number: true
                      }
                  },
   			
   			messages: {
   				first_name: {
                          required: "<?php if(isset($this->phrases['first name'])) echo $this->phrases['first name'].' '.$this->phrases['required'];?>"
                      },
				last_name: {
                          required: "<?php if(isset($this->phrases['last name'])) echo $this->phrases['last name'].' '.$this->phrases['required'];?>"
                      },
   				phone: {
                          required: "<?php if(isset($this->phrases['phone'])) echo $this->phrases['phone'].' '.$this->phrases['required'];?>"
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