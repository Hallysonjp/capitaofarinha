<div class="col-md-10 paddig"> 
   <div class="brade">
      <a href="<?php echo base_url().URL_ADMIN;?>" style="text-decoration:none;"><?php if(isset($this->phrases['home'])) echo $this->phrases['home'];?></a> 
      &gt; <a href="<?php echo base_url().URL_ADMIN_OPTIONS;?>" style="text-decoration:none;"><?php if(isset($this->phrases['options'])) echo $this->phrases['options'];?></a>  &gt;  <?php if(isset($this->phrases['add option'])) echo $this->phrases['add option'];?>
   </div>
</div>
<div class="col-md-10">
   <div class="admin-body">
      <div class="inner-elements">
         <div class="col-md-12">
            <div class="panel">
               <div class="panel-heading ele-hea"> <?php if(isset($this->phrases['add option'])) echo $this->phrases['add option'];?> <i class="fa fa-plus"></i> </div>
               <div class="panel-body paddig">
                  <div class="inner-pages-forms">
                     <div class="col-md-6">
                        <?php $attributes = array('name'=>'add_option','id'=>'add_option');
                           echo form_open(URL_ADD_OPTION,$attributes) ?>
                       
                        
                        <div class="form-group">
                           <label><?php if(isset($this->phrases['name'])) echo $this->phrases['name'];?><span style="color:red;">*</span></label>
                           <?php echo form_input('option_name',set_value('option_name')); ?>
                           <?php echo form_error('option_name'); ?>
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
			$("#add_option").validate({
				rules: {
					option_name:{
						required:true
					}	
				},

				messages: {
					option_name: {
						required: "<?php if(isset($this->phrases['name'])) echo $this->phrases['name'].' '.$this->phrases['required'];?>"
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
