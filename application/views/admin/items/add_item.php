<div class="col-md-10 paddig"> 
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_ITEMS;?>" style="text-decoration:none;"><?php if(isset($this->phrases['items'])) echo $this->phrases['items'];?></a>  &gt;  <?php if(isset($this->phrases['add item'])) echo $this->phrases['add item'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['add item'])) echo $this->phrases['add item'];?> <i class="fa fa-plus"></i> </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
					<?php $attributes = array('name'=>'add_item','id'=>'add_item');
                           echo form_open_multipart(URL_ADD_ITEMS,$attributes); ?>
                     <div class="col-md-6">
                        
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['menu name'])) echo $this->phrases['menu name'];?><span style="color:red;">*</span></label>
                           <?php echo form_dropdown('menu_name',$menus,set_select('menu_name'),'class="chzn-select" id="menu_name"'); ?>
                           <?php echo form_error('menu_name'); ?>
                        </div>
                        
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('item_name',set_value('item_name')); ?>
                           <?php echo form_error('item_name'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('item_cost',set_value('item_cost')); ?>
                           <?php echo form_error('item_cost'); ?>
                        </div>
						<div class="form-group">
                           <label><?php if(isset($this->phrases['item type'])) echo $this->phrases['item type'];?><span style="color:red;">*</span></label>
                           <?php $options = array(
							  ''			=> (isset($this->phrases['select'])) ? $this->phrases['select'] : 'Select',	
                              'Veg'  		=> (isset($this->phrases['veg'])) ? $this->phrases['veg'] : 'Veg',
                              'Non-Veg'    	=> (isset($this->phrases['non veg'])) ? $this->phrases['non veg'] : 'Non Veg',
                              'Other'    	=> (isset($this->phrases['other'])) ? $this->phrases['other'] : 'Other',
                              );
                              
                              echo form_dropdown('item_type', $options,set_select('item_type'),'class="chzn-select"'); ?>
                           <?php echo form_error('item_type'); ?>
                        </div>
                        </div>
						<div class="col-md-6">
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['description'])) echo $this->phrases['description'];?><span style="color:red;">*</span></label>
                           <?php echo form_textarea('description',set_value('description')); ?>
                           <?php echo form_error('description'); ?>
                        </div>
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['item image'])) echo $this->phrases['item image'];?><span style="color:red;">*</span></label>
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
                              
                              echo form_dropdown('status', $options,set_select('status'),'class="chzn-select"'); ?>
                        </div>
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
			$("#add_item").validate({
				ignore: " ",
				rules: {
					menu_name: {
						required: true
					},
					item_name:{
						required:true
					},
					item_cost:{
						required:true,
						number:true	
					},
					item_type:{
						required:true
					},
					description: {
						required: true 
					},
					userfile:{
						required:true,
						extension: "png|jpg|jpeg"
					}	
				},

				messages: {
					menu_name: {
						required: "<?php if(isset($this->phrases['menu'])) echo $this->phrases['menu'].' '.$this->phrases['required'];?>"
					},
					item_name: {
						required: "<?php if(isset($this->phrases['item name'])) echo $this->phrases['item name'].' '.$this->phrases['required'];?>"
					},    
					item_cost: {
						required: "<?php if(isset($this->phrases['item cost'])) echo $this->phrases['item cost'].' '.$this->phrases['required'];?>",
						number:"<?php if(isset($this->phrases['please enter numbers only'])) echo $this->phrases['please enter numbers only'];?>"
						
					},
					item_type:{
						required:"<?php if(isset($this->phrases['item type'])) echo $this->phrases['item type'].' '.$this->phrases['required'];?>"
					},	
					userfile:{
						required: "<?php if(isset($this->phrases['item image'])) echo $this->phrases['item image'].' '.$this->phrases['required'];?>",
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
    // $(document).ready(function(){
   
</script>
