<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_MENU;?>" style="text-decoration:none;"><?php if(isset($this->phrases['menu'])) echo $this->phrases['menu'];?> </a>&gt;  <?php if(isset($this->phrases['edit menu'])) echo $this->phrases['edit menu'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['edit menu'])) echo $this->phrases['edit menu'];?> </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                        <?php $attributes = array('name'=>'edit_menu','id'=>'edit_menu');
                           echo form_open_multipart(URL_EDIT_MENU,$attributes) ?>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('menu_name',set_value('menu_name',$result->menu_name)); ?>
                           <?php echo form_error('menu_name'); ?>
                        </div>
						<div class="form-group">
                           <label><?php if(isset($this->phrases['punch line'])) echo $this->phrases['punch line'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('punch_line',set_value('punch_line',$result->punch_line)); ?>
                           <?php echo form_error('punch_line'); ?>
                        </div>
						
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?><span style="color:red;">*</span></label>
                           <?php echo form_textarea('description',set_value('category_name',$result->description)); ?>
                           <?php echo form_error('description'); ?>
                        </div>
                        
                        
                        <div class="col-md-4">
                           <div class="form-group">
                              <label><?php if(isset($this->phrases['menu image'])) echo $this->phrases['menu image'];?></label>
                              <?php if(isset($result->menu_image_name) && $result->menu_image_name!='')
                                 $image_url = base_url().IMG_MENU.$result->menu_image_name;
                                 else
                                 $image_url = base_url().IMG_DEFAULT;
                                 
                                  ?>
                              <img src="<?php echo $image_url; ?>" width="100px;" height="100px;"/>
                           </div>
                        </div>
						<div class="form-group">
                           <label><?php if(isset($this->phrases['change image'])) echo $this->phrases['change image'];?></label>
                           <?php echo form_upload('userfile',set_value('userfile')); ?>
                           <?php echo form_error('userfile'); ?>                      	
                        </div>
						<div class="form-group">
                           <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status']; ?></label>
                           <?php $options = array(
							  'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
                              'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
                              );
                              
                              $select = array();
                              if(isset($result->status)){
                              $select = $result->status;
                              }
                              
                              echo form_dropdown('status', $options,$select,'class="chzn-select"'); ?>
                        </div>
                        <?php echo form_hidden('menu_id',set_value('menu_id',$result->menu_id));?>
                        <div class="buttos">
                           <button type="submit" class="butto"><i class="fa fa"></i><?php if(isset($this->phrases['update'])) echo $this->phrases['update'];?></button>
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
              //Additional Methods			
   		
   		//form validation rules
             $("#edit_menu").validate({
				rules: {
					menu_name: {
					  required: true
					},
					punch_line: {
					  required: true
					},
					userfile:{
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