<div class="col-md-10 paddig">
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_GALLERY;?>"><?php if(isset($this->phrases['gallery'])) echo $this->phrases['gallery'];?></a> &gt;  <?php if(isset($this->phrases['edit gallery'])) echo $this->phrases['edit gallery'];?>
   </div>
</div> 
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['edit gallery'])) echo $this->phrases['edit gallery']; ?> <i class="fa fa-plus"></i> </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <div id="infoMessage"><?php if(isset($message)) echo $message;?></div>
                        <?php $attributes = array('name'=>'edit_gallery','id'=>'edit_gallery');
                           echo form_open_multipart(URL_EDIT_GALLERY,$attributes) ?>
						   <div class="col-md-6">
                           <div class="form-group">
                              <label><?php if(isset($this->phrases['item image'])) echo $this->phrases['item image'];?><span style="color:red;">*</span></label>
                              <?php 
                                 $src = base_url().IMG_DEFAULT;
                                 if(isset($image_details->image_name) && $image_details->image_name!="")
                                 {
                                 	$src = base_url().IMG_GALLERY_IMAGES.$image_details->image_name;
                                 }
                                 ?>
                              <img width="100px;" height="100px;" src="<?php echo $src; ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['image'])) echo $this->phrases['image'];?></label>
                           <?php echo form_upload('userfile',set_value('userfile')); ?>
                           <?php echo form_error('userfile'); ?> 
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['alt text'])) echo $this->phrases['alt text'];?></label> 
                           <?php echo form_input('alt_text',set_value('alt_text',$image_details->alt_text)); ?>
                           <?php echo form_error('alt_text'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['status'])) echo $this->phrases['status'];?></label>
                           <?php 
							$options = array(
							  'Active'  => (isset($this->phrases['active'])) ? $this->phrases['active'] : 'Active',
							  'Inactive'    => (isset($this->phrases['inactive'])) ? $this->phrases['inactive'] : 'Active'
							  );
                              $select = '';
							  if(isset($image_details)){
								  $select = $image_details->status;
							  }
                              echo form_dropdown('status', $options,$select,'class="chzn-select"'); ?>
							  <?php echo form_hidden('gallery_id',$image_details->gallery_id)?>
							  <?php echo form_hidden('image_name',$image_details->image_name)?>
                        </div>
                        <div class="form-group">
                           <div class="buttos">
                             <?php echo form_submit('add',(isset($this->phrases['update'])) ? $this->phrases['update']:'Update','class="butto"'); ?>
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
              $("#edit_gallery").validate({
				  rules: {
                     userfile: {
						extension: "png|jpg|jpeg"
					 },
					 alt_text :{
						 required: true
					 }
   		                     
                  },
   			
				messages: {
					userfile: {
						  extension: "<?php if(isset($this->phrases['please upload only jpg|jpeg|png'])) echo $this->phrases['please upload only jpg|jpeg|png'];?>"
					  },
					alt_text: {
						  required: "<?php if(isset($this->phrases['alt text required'])) echo $this->phrases['alt text required'];?>"
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