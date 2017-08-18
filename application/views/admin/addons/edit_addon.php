<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_ADDONS;?>" style="text-decoration:none;"><?php if(isset($this->phrases['addons'])) echo $this->phrases['addons'];?></a>  &gt;  <?php if(isset($this->phrases['edit addon'])) echo $this->phrases['edit addon'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['edit addon'])) echo $this->phrases['edit addon'];?>  </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                        <?php $attributes = array('name'=>'edit_addon','id'=>'edit_addon');
                           echo form_open_multipart(URL_EDIT_ADDON,$attributes) ?>
                        
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('item_name',set_value('item_name',$addon->addon_name)); ?>
                           <?php echo form_error('item_name'); ?>
                        </div>
						<div class="form-group">
                           <label><?php if(isset($this->phrases['price'])) echo $this->phrases['price'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('price',set_value('price',$addon->price)); ?>
                           <?php echo form_error('price'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?><span style="color:red;">*</span></label>
                           <?php echo form_textarea('description',set_value('description',$addon->description)); ?>
                           <?php echo form_error('description'); ?>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label><?php if(isset($this->phrases['item image'])) echo $this->phrases['item image'];?><span style="color:red;">*</span></label>
                              <?php 
                                 $src = base_url().IMG_DEFAULT;
                                 if(isset($addon->addon_image) && $addon->addon_image!="")
                                 {
                                 	$src = base_url().IMG_ADDONS.$addon->addon_image;
                                 }
                                 ?>
                              <img width="100px;" height="100px;" src="<?php echo $src; ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['change image'])) echo $this->phrases['change image'];?></label>
                           <?php echo form_upload('userfile',set_value('userfile')); ?>
                           <?php echo form_error('userfile'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status']; ?></label>
                           <?php 
							$options = array(
                              'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
                              'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
                              );
                              
                              echo form_dropdown('status', $options,$addon->status,'class="chzn-select"'); ?>
                        </div>
                        <div class="buttos">
                           <?php echo form_hidden('addon_id',$addon->addon_id); ?>
                           <?php echo form_submit('add',$this->phrases['update'],'class="butto"'); ?>
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
        
   		   		
			//form validation rules
              $("#edit_addon").validate({
				rules: {
					item_name:{
						required:true
					},
					price :{
						required:true,
						number:true
					},
					userfile:{
						extension: "png|jpg|jpeg"
					},
					description: {
						required: true 
					}	
				},

				messages: {
					item_name: {
						required: "<?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'].' '.$this->phrases['required'];?>"
					}, 
					price: {
						required: "<?php if(isset($this->phrases['price'])) echo $this->phrases['price'].' '.$this->phrases['required'];?>"
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
