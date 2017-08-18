<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_GALLERY;?>"><?php if(isset($this->phrases['gallery'])) echo $this->phrases['gallery'];?></a> &gt;  <?php if(isset($this->phrases['add gallery'])) echo $this->phrases['add gallery'];?>
   </div>
</div> 
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['add gallery'])) echo $this->phrases['add gallery']; ?> <i class="fa fa-plus"></i> </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                        <?php $attributes = array('name'=>'add_gallery','id'=>'add_gallery');
                           echo form_open_multipart(URL_ADD_GALLERY,$attributes) ?>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['image'])) echo $this->phrases['image'];?><span style="color:red;">*</span></label>
                           <?php echo form_upload('userfile',set_value('userfile')); ?>
                           <?php echo form_error('userfile'); ?> 
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['alt text'])) echo $this->phrases['alt text'];?></label> 
                           <?php echo form_input('alt_text',set_value('alt_text')); ?>
                           <?php echo form_error('alt_text'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></label>
                           <?php 
							$options = array(
							 ''			=> (isset($this->phrases['select'])) ? $this->phrases['select'] : 'Select',		
							  'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
							  'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
							  );
                              
                              echo form_dropdown('status', $options,'','class="chzn-select"'); ?>
                        </div>
                        <div class="form-group">
                           <div class="buttos">
                             <?php echo form_submit('add',(isset($this->phrases['add'])) ? $this->phrases['add']:'Add','class="butto"'); ?>
                             
                           </div>
                        </div>
                        <?php echo form_close(); ?>
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
                 		
			//form validation rules
              $("#add_gallery").validate({
				  ignore:"",
   	  			  rules: {
                     userfile: {
						required: true,
						extension: "png|jpg|jpeg"
					 },
					 alt_text :{
						 required: true
					 },
					 status:{
						required:true
					 }
   		                     
                  },
   			
				messages: {
					userfile: {
						  required: "<?php if(isset($this->phrases['image required'])) echo $this->phrases['image required'];?>",
						  extension: "<?php if(isset($this->phrases['please upload only jpg|jpeg|png'])) echo $this->phrases['please upload only jpg|jpeg|png'];?>"
					  },
					alt_text: {
						  required: "<?php if(isset($this->phrases['alt text required'])) echo $this->phrases['alt text required'];?>"
					  },
					status: {
						required: "<?php if(isset($this->phrases['status'])) echo $this->phrases['status'].' '.$this->phrases['required'];?>"
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