<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_MENU;?>" style="text-decoration:none;"><?php if(isset($this->phrases['menu'])) echo $this->phrases['menu'];?></a>  &gt;  <?php if(isset($this->phrases['add menu'])) echo $this->phrases['add menu'];?>
   </div>
</div>
<div class="col-md-10">
<div class="admin-body">
<div class="inner-elements">
   <div class="col-md-12">
      <div class="panel">
         <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['add menu'])) echo $this->phrases['add menu'];?> <i class="fa fa-plus"></i> </div>
         <div class="panel-body paddig">
            <div class="inner-pages-forms">
			  
               <div class="col-md-6">
                
                  <?php $attributes = array('name'=>'add_menu','id'=>'add_menu');
                     echo form_open_multipart(URL_ADD_MENU,$attributes) ?>
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?><span style="color:red;">*</span></label>
                     <?php echo form_input('menu_name',set_value('menu_name')); ?>
                     <?php echo form_error('menu_name'); ?>
                  </div>
				  <div class="form-group">
                     <label><?php if(isset($this->phrases['punch line'])) echo $this->phrases['punch line'];?><span style="color:red;">*</span></label>
                     <?php echo form_input('punch_line',set_value('punch_line')); ?>
                     <?php echo form_error('punch_line'); ?>
                  </div>
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?><span style="color:red;">*</span></label>
                     <?php echo form_textarea('description',set_value('description')); ?>
                     <?php echo form_error('description'); ?>
                  </div>
                  
                  <div class="form-group">
                     <label><?php if(isset($this->phrases['menu image'])) echo $this->phrases['menu image'];?><span style="color:red;">*</span></label>
                     <?php echo form_upload('userfile',set_value('userfile')); ?>
                     <?php echo form_error('userfile'); ?>                       	
                  </div>
				  <div class="form-group">
                     <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status']; ?></label>
                     <?php $options = array(
							  'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
                              'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
                              );
                        
                        $select = set_value('status');
                        
                        echo form_dropdown('status', $options,$select,'class="chzn-select"'); ?>
                  </div>
                  <div class="buttos">
                     <button type="submit" class="butto" name="add" value="add"><i class="fa fa-plus"></i> <?php if(isset($this->phrases['add'])) echo $this->phrases['add'];?></button>
                     
                  </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
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
              $("#add_menu").validate({
				rules: {
					menu_name: {
					  required: true
					},
					punch_line: {
					  required: true
					},
					userfile:{
						required: true,
						extension: "png|jpg|jpeg"
					},
					description: {
					  required: true 
					}                   

				},
   				messages: {
					menu_name: {
						required: "<?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'].' '.$this->phrases['required'];?>"
					},
					punch_line: {
						required: "<?php if(isset($this->phrases['punch line'])) echo $this->phrases['punch line'].' '.$this->phrases['required'];?>"
					},
					userfile:{
						required: "<?php if(isset($this->phrases['menu image'])) echo $this->phrases['menu image'].' '.$this->phrases['required'];?>",
						extension: "<?php if(isset($this->phrases['please upload only jpg|jpeg|png'])) echo $this->phrases['please upload only jpg|jpeg|png'];?>"
					},
					description: {
                        required: "<?php if(isset($this->phrases['description'])) echo $this->phrases['description'].' '.$this->phrases['required'];?>"
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